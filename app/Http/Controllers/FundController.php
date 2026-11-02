<?php

namespace App\Http\Controllers;

use App\Models\ConvertPrize;
use App\Models\Deduction;
use App\Models\FundRequestStat;
use App\Models\TableFundRequest;
use App\Models\MemberDetail;
use App\Models\WithdrawalRequest;
use App\Models\NowpaymentsPayment;
use App\Models\PaymentData;
use App\Models\ImportFund;
use App\Models\WalletTransfer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class FundController extends Controller
{
    public function acceptReq($id)
    {
        $result = DB::transaction(function () use ($id) {
            // Lock the request so two approval clicks cannot credit it twice.
            $fundRequest = TableFundRequest::whereKey($id)->lockForUpdate()->first();

            if (!$fundRequest) {
                return ['error' => 'Fund request could not be found.'];
            }

            if ($fundRequest->status !== 'Requested') {
                return ['error' => 'Only pending fund requests can be accepted.'];
            }

            /*
             * The form stores the real member_details column name. The legacy
             * Main/Trade entries keep older pending requests compatible.
             */
            $walletMap = [
                'p2p_wallet' => [
                    'column' => 'p2p_wallet',
                    'label' => 'Fund Wallet',
                    'history_type' => 'Funds Requested',
                ],
                'exng_wallet' => [
                    'column' => 'exng_wallet',
                    'label' => 'Trading Wallet',
                    'history_type' => 'Trade Funds Requested',
                ],
                'Main' => [
                    'column' => 'p2p_wallet',
                    'label' => 'Fund Wallet',
                    'history_type' => 'Funds Requested',
                ],
                'Trade' => [
                    'column' => 'exng_wallet',
                    'label' => 'Trading Wallet',
                    'history_type' => 'Trade Funds Requested',
                ],
            ];

            $selectedWallet = $walletMap[$fundRequest->wallet_type] ?? null;

            if (!$selectedWallet) {
                return ['error' => 'The request does not contain a valid wallet selection.'];
            }

            $coinRates = ConvertPrize::find(1);

            if (!$coinRates) {
                return ['error' => 'Coin conversion rates are not configured.'];
            }

            // Convert the submitted coin amount to the USDT amount being credited.
            if ($fundRequest->coin === 'BTC') {
                $convertedAmount = $coinRates->btc * $fundRequest->amount;
            } elseif ($fundRequest->coin === 'Tron') {
                $convertedAmount = $coinRates->tron * $fundRequest->amount;
            } else {
                $convertedAmount = $fundRequest->amount;
            }

            $member = MemberDetail::where('memberid', $fundRequest->memberid)
                ->lockForUpdate()
                ->first();

            if (!$member) {
                return ['error' => 'The member for this fund request could not be found.'];
            }

            $walletColumn = $selectedWallet['column'];
            $startingBalance = $member->{$walletColumn};

            // Only the explicitly mapped Fund or Trading wallet can be updated.
            $member->{$walletColumn} += $convertedAmount;
            $member->save();

            $fundRequest->usdt_amount = $convertedAmount;
            $fundRequest->status = 'Accepted';
            $fundRequest->save();

            walletTransfer(
                $fundRequest->memberid,
                $convertedAmount,
                'debit',
                $startingBalance,
                $selectedWallet['history_type'],
                'Requested fund added into ' . $selectedWallet['label']
            );

            return ['wallet_label' => $selectedWallet['label']];
        });

        if (isset($result['error'])) {
            session()->flash('failedMsg', $result['error']);
            return redirect()->back();
        }

        session()->flash(
            'successMsg',
            'Funds Request has been accepted and added to the ' . $result['wallet_label'] . ' successfully.'
        );

        return redirect()->back();
    }

    public function rejectReq($id)
    {
        $var = TableFundRequest::find($id);
        $var->status = 'Cancelled';
        $var->save();

        session()->flash('failedMsg', 'Funds Request has been rejected successfully.');
        return redirect()->back();
    }

    public function withdrawal(Request $request)
    {
        $request->validate([
            'amount' => 'required|gt:4|numeric',
            'pin' => 'required',
            'wallet_type' => 'required',
            // 'exng_type' => 'required'
        ]);

        $amount = $request->post('amount');
        $payopt = $request->post('paymentInFirst');
        // $exng_type = $request->post('exng_type');
        $wallet_type = $request->post('wallet_type');
        $memberData = MemberDetail::find(session('USER_ID'));
        $memberid = $memberData->memberid;

        if ($payopt == 'wallet_address') {
            $wallet_address = $request->post('wallet');
            if ($wallet_address == '') {
                session()->flash('failedMsg', 'Wallet Address should not be null. Please try again');
                return redirect()->back();
            }
        } elseif ($payopt == 'qr_code') {
            $qr_code = $memberData->usdt_qr;
            if ($qr_code == '') {
                session()->flash('failedMsg', 'Usdt QR not be submitted.Please submit QR for withdrawl');
                return redirect()->back();
            }
        } else {
            session()->flash('failedMsg', 'Please select payment option for withdrawal');
            return redirect()->back();
        }
        if (is_int($amount) == false) {
            if (!is_double($amount) == false) {
                session()->flash('failedMsg', 'An integer value is required in amount field');
                return redirect()->back();
            }
        }
        $txnid = $request->post('pin');
        $requestId = $request->post('requestId');
        if ($amount < 5) {
            session()->flash('failedMsg', 'Minimum withdrawal amount is $5.');
            return redirect()->back();
        }

        $check = WithdrawalRequest::where('request_id', $requestId)->first();
        if (!$check) {
            $var_rate = Deduction::find(1);
            $netrate  = 100 - $var_rate['rate'];
            $service = $amount / 100 * $var_rate->rate;
            $netAmount = $amount / 100 *  $netrate;
            $totalAmount = $amount;
            date_default_timezone_set('Asia/Kolkata');
            $date = date('Y-m-d');
            if (!Hash::check($txnid, $memberData->txn_password)) {
                session()->flash('failedMsg', 'Entered PIN do not match. Please try again');
                return redirect()->back();
            }
            // if ($memberData->wallet_address == Null || $memberData->wallet_address == '') {
            //     session()->flash('failedMsg', 'Your Wallet Address is not submitted. Please submit your wallet address');
            //     return redirect()->back();
            // }
            if ($memberData->status != 'Active') {
                session()->flash('failedMsg', 'Your status is not Active. Please contact admin to activate your account');
                return redirect()->back();
            }
            if ($memberData->kyc_status != 'Verified') {
                session()->flash('failedMsg', 'Your KYC is either not Submitted or Approved. Please submit you KYC in case of No KYC done');
                return redirect()->back();
            }
            if ($amount < 0) {
                session()->flash('failedMsg', 'Invalid amount entered.');
                return redirect()->back();
            }
            if ($wallet_type == 'Trading') {
                if ($amount > $memberData->exng_wallet) {
                    session()->flash('failedMsg', 'Not Enough balance in trading wallet to withdrawal this amount.');
                    return redirect()->back();
                }
            } elseif ($wallet_type == 'Course') {
                if ($amount > $memberData->course_wallet) {
                    session()->flash('failedMsg', 'Not Enough balance in course wallet to withdrawal this amount.');
                    return redirect()->back();
                }
            } elseif ($wallet_type == 'Lending') {
                if ($amount > $memberData->lending_wallet) {
                    session()->flash('failedMsg', 'Not Enough balance in lending wallet to withdrawal this amount.');
                    return redirect()->back();
                }
            }

            if ($wallet_type == 'Trading') {
                $wallet = $memberData->exng_wallet;
                $memberData->exng_wallet -= $totalAmount;
                $memberData->save();
            } elseif ($wallet_type == 'Course') {
                $wallet = $memberData->course_wallet;
                $memberData->course_wallet -= $totalAmount;
                $memberData->save();
            } elseif ($wallet_type == 'Lending') {
                $wallet = $memberData->lending_wallet;
                $memberData->lending_wallet -= $totalAmount;
                $memberData->save();
            }

            $var = new WithdrawalRequest();
            $var->request_date = $date;
            //$var->payment_date = $date;
            $var->request_id = $requestId;
            $var->txnid = $txnid;
            $var->memberid = $memberid;
            $var->name = $memberData['first_name'] . ' ' . $memberData['last_name'];
            if ($payopt == 'wallet_address') {
                $var->wallet_address = $wallet_address;
            } elseif ($payopt == 'qr_code') {
                $var->qr_image = $qr_code;
            }
            $var->payment_option = $payopt;
            $var->usdt = $amount;
            $var->gross_amount = $totalAmount;
            $var->service_charge = $service;
            $var->net_amount = $netAmount;
            $var->type = 'User';
            $var->wallet_type = $wallet_type;
            // $var->exng_type = $exng_type;
            $var->save();

            walletTransfer($memberid, $totalAmount, 'credit', $wallet, 'Withdrawal', ' $ ' . $amount . ' have been withdrawn by Member from ' . $wallet_type . ' Wallet. Payment Id-' . $requestId);
        }

        session()->flash('successMsg', 'Withdrawal request has been created successfully.');
        return redirect()->back();
    }

    public function withdrawalTrx(Request $request)
    {
        $request->validate([
            'amount' => 'required|gt:4|numeric',
            'trx_amount' => 'required|min:0',
            'pin' => 'required',
            'wallet_type' => 'required',
            // 'exng_type' => 'required'

        ]);

        $amount = $request->post('amount');
        $trx_amount = $request->post('trx_amount');
        // $exng_type = $request->post('exng_type');
        $wallet_type = $request->post('wallet_type');
        $txnid = $request->post('pin');
        $requestId = $request->post('requestId');
        $payopt = $request->post('paymentInSecond');
        $memberData = MemberDetail::find(session('USER_ID'));
        $memberid = $memberData->memberid;
        if ($payopt == 'wallet_address') {
            $wallet_address = $request->post('wallet');
            if ($wallet_address == '') {
                session()->flash('failedMsg', 'Wallet Address should not be null. Please try again');
                return redirect()->back();
            }
        } elseif ($payopt == 'qr_code') {
            $qr_code = $memberData->tron_qr;
            if ($qr_code == '') {
                session()->flash('failedMsg', 'Tron QR not be submitted.Please submit QR for withdrawl');
                return redirect()->back();
            }
        } else {
            session()->flash('failedMsg', 'Please select payment option for withdrawal');
            return redirect()->back();
        }
        if (is_int($amount) == false) {
            if (!is_double($amount) == false) {
                session()->flash('failedMsg', 'An integer value is required in amount field');
                return redirect()->back();
            }
        }
        if ($amount < 5) {
            session()->flash('failedMsg', 'Minimum withdrawal amount is $5.');
            return redirect()->back();
        }

        $check = WithdrawalRequest::where('request_id', $requestId)->first();
        if (!$check) {
            $rate = Deduction::find(1);
            $netrate = 100 - $rate->rate;
            $service = $trx_amount / 100 * $rate->rate;
            $netAmount = $trx_amount / 100 * $netrate;
            $totalAmount = $trx_amount;
            date_default_timezone_set('Asia/Kolkata');
            $date = date('Y-m-d');
            if (!Hash::check($txnid, $memberData->txn_password)) {
                session()->flash('failedMsg', 'Entered PIN do not match. Please try again');
                return redirect()->back();
            }
            // if ($memberData->wallet_address == Null || $memberData->wallet_address == '') {
            //     session()->flash('failedMsg', 'Your Wallet Address is not submitted. Please submit your wallet address');
            //     return redirect()->back();
            // }
            if ($memberData->status != 'Active') {
                session()->flash('failedMsg', 'Your status is not Active. Please contact admin to activate your account');
                return redirect()->back();
            }
            if ($memberData->kyc_status != 'Verified') {
                session()->flash('failedMsg', 'Your KYC is either not Submitted or Approved. Please submit you KYC in case of No KYC done');
                return redirect()->back();
            }
            if ($amount < 0) {
                session()->flash('failedMsg', 'Invalid amount entered.');
                return redirect()->back();
            }
            if ($wallet_type == 'Trading') {
                if ($amount > $memberData->exng_wallet) {
                    session()->flash('failedMsg', 'Not Enough balance in trading wallet to withdrawal this amount.');
                    return redirect()->back();
                }
            } elseif ($wallet_type == 'Course') {
                if ($amount > $memberData->course_wallet) {
                    session()->flash('failedMsg', 'Not Enough balance in course wallet to withdrawal this amount.');
                    return redirect()->back();
                }
            } elseif ($wallet_type == 'Lending') {
                if ($amount > $memberData->lending_wallet) {
                    session()->flash('failedMsg', 'Not Enough balance in lending wallet to withdrawal this amount.');
                    return redirect()->back();
                }
            }

            if ($wallet_type == 'Trading') {
                $wallet = $memberData->exng_wallet;
                $memberData->exng_wallet -= $amount;
                $memberData->save();
            } elseif ($wallet_type == 'Course') {
                $wallet = $memberData->course_wallet;
                $memberData->course_wallet -= $amount;
                $memberData->save();
            } elseif ($wallet_type == 'Lending') {
                $wallet = $memberData->lending_wallet;
                $memberData->lending_wallet -= $amount;
                $memberData->save();
            }

            $var = new WithdrawalRequest();
            $var->request_date = $date;
            $var->request_id = $requestId;
            $var->txnid = $txnid;
            $var->memberid = $memberid;
            $var->name = $memberData['first_name'] . ' ' . $memberData['last_name'];
            if ($payopt == 'wallet_address') {
                $var->wallet_address = $wallet_address;
            } elseif ($payopt == 'qr_code') {
                $var->qr_image = $qr_code;
            }
            $var->payment_option = $payopt;
            $var->usdt = $amount;
            $var->gross_amount = $totalAmount;
            $var->service_charge = $service;
            $var->net_amount = $netAmount;
            $var->coin = 'TRON';
            $var->type = 'User';
            $var->wallet_type = $wallet_type;
            // $var->exng_type = $exng_type;
            $var->save();

            walletTransfer($memberid, $totalAmount, 'credit', $wallet, 'Withdrawal', ' $ ' . $amount . ' have been withdrawn by Member from ' . $wallet_type . ' Wallet. Payment Id-' . $requestId);
        }

        session()->flash('successMsg', 'Withdrawal request has been created successfully.');
        return redirect()->back();
    }

    public function withdrawalBtc(Request $request)
    {
        $request->validate([
            'amount' => 'required|gt:4|numeric',
            'btc_amount' => 'required|min:0',
            'pin' => 'required',
            'wallet_type' => 'required',
            // 'exng_type' => 'required'
        ]);

        $amount = $request->post('amount');
        $btc_amount = $request->post('btc_amount');
        // $exng_type = $request->post('exng_type');
        $wallet_type = $request->post('wallet_type');
        $txnid = $request->post('pin');
        $requestId = $request->post('requestId');
        $payopt = $request->post('paymentInThird');
        $memberData = MemberDetail::find(session('USER_ID'));
        $memberid = $memberData->memberid;
        if ($payopt == 'wallet_address') {
            $wallet_address = $request->post('wallet');
            if ($wallet_address == '') {
                session()->flash('failedMsg', 'Wallet Address should not be null. Please try again');
                return redirect()->back();
            }
        } elseif ($payopt == 'qr_code') {
            $qr_code = $memberData->btc_qr;
            if ($qr_code == '') {
                session()->flash('failedMsg', 'BTC QR not be submitted.Please submit QR for withdrawl');
                return redirect()->back();
            }
        } else {
            session()->flash('failedMsg', 'Please select payment option for withdrawal');
            return redirect()->back();
        }
        if (is_int($amount) == false) {
            if (!is_double($amount) == false) {
                session()->flash('failedMsg', 'An integer value is required in amount field');
                return redirect()->back();
            }
        }
        if ($amount < 5) {
            session()->flash('failedMsg', 'Minimum withdrawal amount is $5.');
            return redirect()->back();
        }

        $check = WithdrawalRequest::where('request_id', $requestId)->first();
        if (!$check) {
            $rate = Deduction::find(1);
            $netrate = 100 - $rate->rate;
            $service = $btc_amount / 100 * $rate->rate;
            $netAmount = $btc_amount / 100 * $netrate;
            $totalAmount = $btc_amount;
            date_default_timezone_set('Asia/Kolkata');
            $date = date('Y-m-d');
            if (!Hash::check($txnid, $memberData->txn_password)) {
                session()->flash('failedMsg', 'Entered PIN do not match. Please try again');
                return redirect()->back();
            }
            // if ($memberData->wallet_address == Null || $memberData->wallet_address == '') {
            //     session()->flash('failedMsg', 'Your Wallet Address is not submitted. Please submit your wallet address');
            //     return redirect()->back();
            // }
            if ($memberData->status != 'Active') {
                session()->flash('failedMsg', 'Your status is not Active. Please contact admin to activate your account');
                return redirect()->back();
            }
            if ($memberData->kyc_status != 'Verified') {
                session()->flash('failedMsg', 'Your KYC is either not Submitted or Approved. Please submit you KYC in case of No KYC done');
                return redirect()->back();
            }
            if ($amount < 0) {
                session()->flash('failedMsg', 'Invalid amount entered.');
                return redirect()->back();
            }
            if ($wallet_type == 'Trading') {
                if ($amount > $memberData->exng_wallet) {
                    session()->flash('failedMsg', 'Not Enough balance in trading wallet to withdrawal this amount.');
                    return redirect()->back();
                }
            } elseif ($wallet_type == 'Course') {
                if ($amount > $memberData->course_wallet) {
                    session()->flash('failedMsg', 'Not Enough balance in course wallet to withdrawal this amount.');
                    return redirect()->back();
                }
            } elseif ($wallet_type == 'Lending') {
                if ($amount > $memberData->lending_wallet) {
                    session()->flash('failedMsg', 'Not Enough balance in lending wallet to withdrawal this amount.');
                    return redirect()->back();
                }
            }

            if ($wallet_type == 'Trading') {
                $wallet = $memberData->exng_wallet;
                $memberData->exng_wallet -= $amount;
                $memberData->save();
            } elseif ($wallet_type == 'Course') {
                $wallet = $memberData->course_wallet;
                $memberData->course_wallet -= $amount;
                $memberData->save();
            } elseif ($wallet_type == 'Lending') {
                $wallet = $memberData->lending_wallet;
                $memberData->lending_wallet -= $amount;
                $memberData->save();
            }

            $var = new WithdrawalRequest();
            $var->request_date = $date;
            //$var->payment_date = $date;
            $var->request_id = $requestId;
            $var->txnid = $txnid;
            $var->memberid = $memberid;
            $var->name = $memberData['first_name'] . ' ' . $memberData['last_name'];
            if ($payopt == 'wallet_address') {
                $var->wallet_address = $wallet_address;
            } elseif ($payopt == 'qr_code') {
                $var->qr_image = $qr_code;
            }
            $var->payment_option = $payopt;
            $var->usdt = $amount;
            $var->gross_amount = $totalAmount;
            $var->service_charge = $service;
            $var->net_amount = $netAmount;
            $var->coin = 'BTC';
            $var->type = 'User';
            $var->wallet_type = $wallet_type;
            // $var->exng_type = $exng_type;
            $var->save();

            walletTransfer($memberid, $totalAmount, 'credit', $wallet, 'Withdrawal', ' $ ' . $amount . ' have been withdrawn by Member from ' . $wallet_type . ' Wallet. Payment Id-' . $requestId);
        }

        session()->flash('successMsg', 'Withdrawal request has been created successfully.');
        return redirect()->back();
    }
    
    public function withdrawalTrc20(Request $request)
    {
        $request->validate([
            'amount' => 'required|gt:4|numeric',
            'pin' => 'required',
            'wallet_type' => 'required',
            // 'exng_type' => 'required'
        ]);

        $amount = $request->post('amount');
        $payopt = $request->post('paymentInFourth');
        // $exng_type = $request->post('exng_type');
        $wallet_type = $request->post('wallet_type');
        $memberData = MemberDetail::find(session('USER_ID'));
        $memberid = $memberData->memberid;

        if ($payopt == 'wallet_address') {
            $wallet_address = $request->post('wallet');
            if ($wallet_address == '') {
                session()->flash('failedMsg', 'Wallet Address should not be null. Please try again');
                return redirect()->back();
            }
        } elseif ($payopt == 'qr_code') {
            $qr_code = $memberData->usdt_qr;
            if ($qr_code == '') {
                session()->flash('failedMsg', 'Usdt QR not be submitted.Please submit QR for withdrawl');
                return redirect()->back();
            }
        } else {
            session()->flash('failedMsg', 'Please select payment option for withdrawal');
            return redirect()->back();
        }
        if (is_int($amount) == false) {
            if (!is_double($amount) == false) {
                session()->flash('failedMsg', 'An integer value is required in amount field');
                return redirect()->back();
            }
        }
        $txnid = $request->post('pin');
        $requestId = $request->post('requestId');
        if ($amount < 5) {
            session()->flash('failedMsg', 'Minimum withdrawal amount is $5.');
            return redirect()->back();
        }

        $check = WithdrawalRequest::where('request_id', $requestId)->first();
        if (!$check) {
            $var_rate = Deduction::find(1);
            $netrate  = 100 - $var_rate['rate'];
            $service = $amount / 100 * $var_rate->rate;
            $netAmount = $amount / 100 *  $netrate;
            $totalAmount = $amount;
            date_default_timezone_set('Asia/Kolkata');
            $date = date('Y-m-d');
            if (!Hash::check($txnid, $memberData->txn_password)) {
                session()->flash('failedMsg', 'Entered PIN do not match. Please try again');
                return redirect()->back();
            }
            // if ($memberData->wallet_address == Null || $memberData->wallet_address == '') {
            //     session()->flash('failedMsg', 'Your Wallet Address is not submitted. Please submit your wallet address');
            //     return redirect()->back();
            // }
            if ($memberData->status != 'Active') {
                session()->flash('failedMsg', 'Your status is not Active. Please contact admin to activate your account');
                return redirect()->back();
            }
            if ($memberData->kyc_status != 'Verified') {
                session()->flash('failedMsg', 'Your KYC is either not Submitted or Approved. Please submit you KYC in case of No KYC done');
                return redirect()->back();
            }
            if ($amount < 0) {
                session()->flash('failedMsg', 'Invalid amount entered.');
                return redirect()->back();
            }
            if ($wallet_type == 'Trading') {
                if ($amount > $memberData->exng_wallet) {
                    session()->flash('failedMsg', 'Not Enough balance in trading wallet to withdrawal this amount.');
                    return redirect()->back();
                }
            } elseif ($wallet_type == 'Course') {
                if ($amount > $memberData->course_wallet) {
                    session()->flash('failedMsg', 'Not Enough balance in course wallet to withdrawal this amount.');
                    return redirect()->back();
                }
            } elseif ($wallet_type == 'Lending') {
                if ($amount > $memberData->lending_wallet) {
                    session()->flash('failedMsg', 'Not Enough balance in lending wallet to withdrawal this amount.');
                    return redirect()->back();
                }
            }

            if ($wallet_type == 'Trading') {
                $wallet = $memberData->exng_wallet;
                $memberData->exng_wallet -= $totalAmount;
                $memberData->save();
            } elseif ($wallet_type == 'Course') {
                $wallet = $memberData->course_wallet;
                $memberData->course_wallet -= $totalAmount;
                $memberData->save();
            } elseif ($wallet_type == 'Lending') {
                $wallet = $memberData->lending_wallet;
                $memberData->lending_wallet -= $totalAmount;
                $memberData->save();
            }

            $var = new WithdrawalRequest();
            $var->request_date = $date;
            //$var->payment_date = $date;
            $var->request_id = $requestId;
            $var->txnid = $txnid;
            $var->memberid = $memberid;
            $var->name = $memberData['first_name'] . ' ' . $memberData['last_name'];
            if ($payopt == 'wallet_address') {
                $var->wallet_address = $wallet_address;
            } elseif ($payopt == 'qr_code') {
                $var->qr_image = $qr_code;
            }
            $var->payment_option = $payopt;
            $var->usdt = $amount;
            $var->gross_amount = $totalAmount;
            $var->service_charge = $service;
            $var->net_amount = $netAmount;
            $var->coin = 'USDT TRC20';
            $var->type = 'User';
            $var->wallet_type = $wallet_type;
            // $var->exng_type = $exng_type;
            $var->save();

            walletTransfer($memberid, $totalAmount, 'credit', $wallet, 'Withdrawal', ' $ ' . $amount . ' have been withdrawn by Member from ' . $wallet_type . ' Wallet. Payment Id-' . $requestId);
        }

        session()->flash('successMsg', 'Withdrawal request has been created successfully.');
        return redirect()->back();
    }
    
    public function addFund(Request $request)
    {

        $memberid = $request->post('memberid');
        $txnid = $request->post('txnid');
        $amount = $request->post('amount');
        // if(ImportFund::where('txnid',$txnid)->first()){
        //     return response()->json([
        //               'code'=>0
        //            ]);
        // }
        $data = MemberDetail::where('memberid', $memberid)->first();

        $var = new ImportFund();
        $var->memberid = $memberid;
        $var->orderid = "OD" . time();
        $var->amount = $amount;
        $var->txnid = $txnid;
        $var->type = 'Add';
        $var->mode = 'Online';
        $var->added_by = 'User';
        $var->wallet_type = 'P2P Wallet';
        $var->save();

        $wallet = $data->p2p_wallet;
        $data->p2p_wallet += $amount;
        $data->save();
        p2pwalletTransfer($memberid, $amount, 'debit', $wallet, 'Fund Added', '' . $amount . ' USDT added to fund wallet');
        return response()->json([
            'code' => 1
        ]);
    }

    public function instantFunds(Request $request)
    {
        $request->validate([
            'amount' => 'required|gt:0',
            'pin' => 'required'
        ]);

        $amount = $request->post('amount');
        $txn_password = $request->post('pin');
        $orderid = Str::random(20) . rand(1000, 9999);

        $result = MemberDetail::find(session('USER_ID'));
        $memberid = $result['memberid'];
        $Hashpass = $result['txn_password'];
        if ($amount <= 0) {
            session()->flash('failedMsg', 'Please enter valid Amount.');
            return redirect()->back();
        }
        if (!Hash::check($txn_password, $Hashpass)) {
            session()->flash('failedMsg', 'Entered PIN do not match. Please try again');
            return redirect()->back();
        }

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.nowpayments.io/v1/invoice");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $post = array(
            "price_amount" => $amount,
            "price_currency" => "usd",
            "order_id" => $orderid,
            "order_description" => "Deposit Request From " . $memberid,
            "ipn_callback_url" => "https://nowpayments.io",
            "success_url" => "https://liberfx.com/member/payment-success/" . $orderid,
            "cancel_url" => "https://liberfx.com/member/payment-cancel/" . $orderid,
            "partially_paid_url" => "https://liberfx.com/member/payment-success/" . $orderid
        );

        $post = json_encode($post);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        curl_setopt($ch, CURLOPT_POST, 1);

        $headers = array();
        $headers[] = "Content-Type: application/json";
        $headers[] = "x-api-key: D7X3YPG-XV9MPJT-H5HXZPV-8RR40DP";
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($result, true);
        //print_R($response);
        $var = new NowpaymentsPayment();
        $var->memberid = $memberid;
        $var->status = 'WAITING';
        $var->payment_id = $response['id'];
        $var->order_id = $orderid;
        $var->amount = $amount;
        $var->save();

        return redirect()->to($response['invoice_url']);
    }

    public function paySuccess($orderid)
    {
        $orderid;
        $jwt = getJWttoken();
        $datefirst = date('Y-m-d', strtotime('-1day'));
        $datelast = date('Y-m-d', strtotime('+1day'));
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.nowpayments.io/v1/payment/?limit=20&page=0&sortBy=created_at&orderBy=desc&dateFrom=' . $datefirst . '&dateTo=' . $datelast . '',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'x-api-key: D7X3YPG-XV9MPJT-H5HXZPV-8RR40DP',
                'Authorization: Bearer ' . $jwt . ''
            ),
        ));

        $response = curl_exec($curl);
        $data = json_decode($response, true);
        curl_close($curl);
        //print_r($data['data']);
        foreach ($data['data'] as $value) {
            echo $value['order_id'] . '- ' . $value['created_at'];
            echo "<br>";
            if ($orderid == $value['order_id']) {
                $value['order_id'];
                $qry = new PaymentData();
                $qry->payment_id = $value['payment_id'];
                $qry->payment_status = $value['payment_status'];
                $qry->price_amount = $value['price_amount'];
                $qry->pay_amount = $value['pay_amount'];
                $qry->actually_paid = $value['actually_paid'];
                $qry->order_id = $value['order_id'];
                $qry->purchase_id = $value['purchase_id'];
                $qry->outcome_amount = $value['outcome_amount'];
                $qry->save();
            }
        }
        $check = PaymentData::where('order_id', $orderid)->first();
        $paid_amount = $check['actually_paid'];
        $status = $check['payment_status'];
        $payment_id = $check['payment_id'];
        $var = NowpaymentsPayment::where([['order_id', $orderid], ['status', 'WAITING']])->first();
        if (!$var) {
            session()->flash('failedMsg', 'Invalid OrderId Passed');
            return redirect('member/add-funds');
        }
        $var->status = strtoupper($status);
        $var->payment_id = $payment_id;
        $var->save();

        $memberid = $var->memberid;

        $qry = MemberDetail::where('memberid', $memberid)->first();
        $wallet = $qry->p2p_wallet;
        $qry->p2p_wallet += $paid_amount;
        $qry->save();

        walletTransfer($memberid, $paid_amount, 'debit', $wallet, 'Import Funds', 'Impoter fund added into wallet');

        $varimp = new ImportFund();
        $varimp->memberid = $memberid;
        $varimp->amount = $paid_amount;
        $varimp->orderid = $orderid;
        $varimp->txnid = $payment_id;
        $varimp->status = 'Approved';
        $varimp->mode = 'Online';
        $varimp->save();

        session()->flash('successMsg', 'Amount has been imported into wallet successfully');
        return redirect('member/add-funds');
    }

    public function payCancel($memberid)
    {
        $var = NowpaymentsPayment::where('memberid', $memberid)->orderBy('created_at', 'desc')->first();
        $var->status = 'CANCELLED';
        $var->save();

        session()->flash('failedMsg', 'Import Funds request has been Cancelled. Please try again');
        return redirect('member/import-funds');
    }


    public function fundTransfer()
    {
        $result['data'] = MemberDetail::find(session('USER_ID'));
        $result['passdata'] = WalletTransfer::where([['memberid', $result['data']['memberid']], ['walletType', 'P2P Fund Transfer']])->orderBy('created_at', 'desc')->get();
        return view('member.p2p.fund_transfer')->with($result);
    }

    public function passbook()
    {
        $result['data'] = MemberDetail::find(session('USER_ID'));
        $result['passdata'] = WalletTransfer::where([['memberid', $result['data']['memberid']], ['walletType', 'P2P Fund Transfer']])->orderBy('created_at', 'desc')->get();
        return view('member.p2p.transfer-passbook')->with($result);
    }

    public function fundTrans(Request $request)
    {
        $request->validate([
            'amount' => 'required|gt:0',
            'member' => 'required',
            'pin' => 'required'
        ]);

        $memberid = strtoupper($request->post('member'));
        $val_id = MemberDetail::where('memberid', $memberid)->first();
        if ($val_id && $val_id->status != 'Blocked') {

            $senderid = $request->post('sender');
            $var = MemberDetail::where('memberid', $senderid)->first();
            $txn_password = $request->post('pin');
            $amount = $request->post('amount');
            if ($amount < 0) {
                session()->flash('failMsg', 'Negative value is not allowed');
                return redirect()->back();
            }
            if ($amount > $var['p2p_wallet']) {
                session()->flash('failMsg', 'You do not have enough balance to transfer this amount ');
                return redirect()->back();
            }
            if ($memberid == $senderid) {
                session()->flash('otpMsg', 'You can not transfer money to your own account');
                return redirect()->back();
            } else {
                $var = MemberDetail::where('memberid', $senderid)->first();
                $txnpassword = $var->txn_password;
                if (Hash::check($txn_password, $txnpassword)) {
                    //sending Money
                    $qry = MemberDetail::where('memberid', $memberid)->first();
                    $p2p_wallet = $qry->p2p_wallet;
                    $qry->p2p_wallet += $amount;
                    $qry->save();
                    p2pwalletTransfer($memberid, $amount, 'debit', $p2p_wallet, 'P2P Fund Transfer', '$ ' . $amount . ' has been transferred to your p2p wallet by ' . $senderid . '');

                    $query = MemberDetail::where('memberid', $senderid)->first();
                    $senderwallet = $query->p2p_wallet;
                    $query->p2p_wallet -= $amount;
                    $query->save();

                    p2pwalletTransfer($senderid, $amount, 'credit', $senderwallet, 'P2P Fund Transfer', '$ ' . $amount . ' has been transferred by you to ' . $memberid . ' p2p wallet');

                    // $trans = new P2pFundTransfers();
                    // $trans->senderid = $senderid;
                    // $trans->amount = $amount;
                    // $trans->deduction = 0;
                    // $trans->net_amount = $amount;
                    // $trans->receiverid = $memberid;
                    // $trans->save();

                    session()->flash('sucMsg', 'Amount has been transferred successfully');
                    return redirect()->back();
                } else {
                    session()->flash('failMsg', 'Entered PIN do not match. Please try again');
                    return redirect()->back();
                }
            }
        } else {
            session()->flash('failMsg', 'Entered Memberid is either blocked or unavailable');
            return redirect()->back();
        }
    }

    public function walletToP2P(Request $request)
    {
        $result['data'] = MemberDetail::find(session('USER_ID'));
        $result['passdata'] = WalletTransfer::where([['memberid', $result['data']['memberid']], ['walletType', 'P2P Fund Transfer']])->orderBy('created_at', 'desc')->get();
        return view('member/wallet/wallet-to-p2p')->with($result);
    }

    // public function walletP2pTransfer(Request $request)
    // {
    //     $request->validate([
    //         'amount' => 'required',
    //         'member' => 'required',
    //         'txn_password' => 'required'
    //     ]);

    //     $memberid = strtoupper($request->post('member'));
    //     $senderid = $request->post('sender');
    //     $var = MemberDetail::where('memberid', $senderid)->first();
    //     $txn_password = $request->post('txn_password');
    //     $amount = $request->post('amount');

    //     $ded = Deduction::find(1);
    //     $rate = $ded->p2p;

    //     $deduction = $amount / 100 * $rate;
    //     $totalAmount = $deduction + $amount;
    //     $balance = $var->wallet;
    //     if ($memberid == $senderid) {
    //         session()->flash('failedMsg', 'Amount can not be transferred to same wallet ');
    //         return redirect()->back();
    //     }
    //     if ($totalAmount > $balance) {
    //         session()->flash('failedMsg', 'You do not have enough balance to transfer this amount ');
    //         return redirect()->back();
    //     } elseif ($amount < 0) {
    //         session()->flash('failedMsg', 'Negative value is not allowed');
    //         return redirect()->back();
    //     }

    //     $txnpassword = $var->txn_password;
    //     if (Hash::check($txn_password, $txnpassword)) {
    //         //sending Money
    //         $qry = MemberDetail::where('memberid', $memberid)->first();
    //         if ($qry && $qry->status == 'Active') {

    //             $wallet = $qry->wallet;
    //             $qry->wallet += $amount;
    //             $qry->save();
    //             p2pwalletTransfer($memberid, $amount, 'debit', $wallet, 'P2P Fund Transfer', '$ ' . $amount . ' has been transferred to your wallet by ' . $senderid . '');
    //             // $p2p_wallet = $qry->p2p_wallet + $deduction;
    //             // p2pwalletTransfer($memberid, $deduction, 'credit', $p2p_wallet, 'P2P Fund Deduction', '$ ' . $deduction . ' has been deducted for transfer charges');

    //             $query = MemberDetail::where('memberid', $senderid)->first();
    //             $senderwallet = $query->wallet;
    //             $query->wallet -= $totalAmount;
    //             $query->save();

    //             walletTransfer($senderid, $totalAmount, 'credit', $senderwallet, 'P2P Fund Transfer', '$ ' . $amount . 'with $' . $deduction . ' deduction, has been transferred by you to ' . $memberid . '  wallet');

    //             session()->flash('successMsg', 'Amount has been transferred successfully');
    //             return redirect()->back();
    //         } else {
    //             session()->flash('successMsg', 'Entered Memberid is either not active or unavailable');
    //             return redirect()->back();
    //         }
    //     } else {
    //         session()->flash('failedMsg', 'Entered Transaction Password donot match');
    //         return redirect()->back();
    //     }
    // }


    public function walletP2pTransfer(Request $request)
    {
        $request->validate([
            'amount' => 'required|gt:0',
            'pin' => 'required',
            'wallet_type' => 'required'
        ]);
        $var = MemberDetail::find(session('USER_ID'));
        $memberid = $var->memberid;
        $txn_password = $request->post('pin');
        $amount = $request->post('amount');
        $wallet_type = $request->post('wallet_type');

        $email = $var['email'];
        $name = $var['first_name'] . ' ' . $var['last_name'];

        $ded = Deduction::find(1);
        $rate = $ded->p2p;

        $deduction = $amount / 100 * $rate;
        $totalAmount = $deduction + $amount;
        if ($wallet_type == 'Trading') {
            $balance = $var->exng_wallet;
        } elseif ($wallet_type == 'Course') {
            $balance = $var->course_wallet;
        } elseif ($wallet_type == 'Lending') {
            $balance = $var->lending_wallet;
        }
        if (!$var) {
            session()->flash('failedMsg', 'Entered Memberid is either not active or unavailable');
            return redirect()->back();
        }
        if ($var->kyc_status != 'Verified') {
            session()->flash('failedMsg', 'Your KYC has either not been submitted or verified');
            return redirect()->back();
        }
        if ($totalAmount > $balance) {
            session()->flash('failedMsg', 'Not Enough balance in ' . $wallet_type . ' Wallet to transfer this amount ');
            return redirect()->back();
        }
        if ($amount < 0) {
            session()->flash('failedMsg', 'Negative value is not allowed');
            return redirect()->back();
        }

        $txnpassword = $var->txn_password;
        if (Hash::check($txn_password, $txnpassword)) {

            $otp = rand(100000, 999999);
            $request->session()->put('p2p_wallet_otp', $otp);
            $request->session()->put('amount', $amount);
            $request->session()->put('memberid', $memberid);
            $request->session()->put('totalAmount', $totalAmount);
            $request->session()->put('deduction', $deduction);
            $request->session()->put('wallet_type', $wallet_type);
            if ($email != '') {
                $mailData = [
                    'name' => $name,
                    'email' => $email,
                    'memberid' => $memberid,
                    'otp' => $otp,
                    'type' => 'P2P Transfer'
                ];
                $user['to'] = $email;
                Mail::send('member.mails.otp-mail', $mailData, function ($message) use ($user) {

                    $message->to($user['to']);
                    $message->subject('Liberfx P2P Transfer OTP');
                });
            }

            session()->flash('successMsg', 'OTP has been sent to your email id');
            return redirect()->back();
        } else {
            session()->flash('failedMsg', 'Entered PIN do not match. Please try again');
            return redirect()->back();
        }
    }

    public function walletP2pOtpVerify(Request $request)
    {
        $request->validate([
            'otp' => 'required'
        ]);
        $otp = $request->post('otp');
        if ($otp == session()->get('p2p_wallet_otp')) {
            $amount = $request->session()->get('amount');
            $memberid = $request->session()->get('memberid');
            $totalAmount = $request->session()->get('totalAmount');
            $deduction = $request->session()->get('deduction');
            $wallet_type = $request->session()->get('wallet_type');
            //sending Money
            $qry = MemberDetail::where('memberid', $memberid)->first();
            if ($qry && $qry->status == 'Active') {
                if (!$qry) {
                    session()->forget('p2p_wallet_otp');
                    session()->flash('failedMsg', 'Entered Memberid is either not active or unavailable');
                    return redirect()->back();
                }
                if ($qry->kyc_status != 'Verified') {
                    session()->forget('p2p_wallet_otp');
                    session()->flash('failedMsg', 'Your KYC has either not been submitted or verified');
                    return redirect()->back();
                }
                if ($amount < 0) {
                    session()->forget('p2p_wallet_otp');
                    session()->flash('failedMsg', 'Negative value is not allowed');
                    return redirect()->back();
                }

                if ($wallet_type == 'Trading') {
                    $balance = $qry->exng_wallet;
                } elseif ($wallet_type == 'Course') {
                    $balance = $qry->course_wallet;
                } elseif ($wallet_type == 'Lending') {
                    $balance = $qry->lending_wallet;
                }
                if ($totalAmount > $balance) {
                    session()->forget('p2p_wallet_otp');
                    session()->flash('failedMsg', 'Not Enough balance in ' . $wallet_type . ' Wallet to transfer this amount ');
                    return redirect()->back();
                }

                $query = MemberDetail::where('memberid', $memberid)->first();
                if ($wallet_type == 'Trading') {
                    $wallet = $query->exng_wallet;
                    $query->exng_wallet -= $totalAmount;
                } elseif ($wallet_type == 'Course') {
                    $wallet = $query->course_wallet;
                    $query->course_wallet -= $totalAmount;
                } elseif ($wallet_type == 'Lending') {
                    $wallet = $query->lending_wallet;
                    $query->lending_wallet -= $totalAmount;
                }
                $query->p2p_wallet += $amount;
                $query->save();

                walletTransfer($memberid, $amount, 'credit', $wallet - $deduction, 'P2P Fund Transfer', '$ ' . $amount . ' has been transferred from
                ' . $wallet_type . ' Wallet to P2P Wallet');

                session()->forget('p2p_wallet_otp');
                session()->flash('successMsg', 'Amount has been transferred successfully');
                return redirect()->back();
            } else {
                session()->flash('failedMsg', 'Entered Memberid is either not active or unavailable');
                return redirect()->back();
            }
        } else {
            session()->flash('failedMsg', 'Entered OTP does not match');
            return redirect()->back();
        }
    }

    public function walletTransfer()
    {
        $result['data'] = MemberDetail::find(session('USER_ID'));
        $result['passdata'] = WalletTransfer::where('memberid', $result['data']['memberid'])->whereNotIn('walletType', ['Funds Requested', 'Import Funds', 'Exchange Fund Transfer'])->orderBy('created_at', 'desc')->get();
        return view('member/wallet/wallet-transfer')->with($result);
    }

    public function walletToExchange(Request $request)
    {
        $result['data'] = MemberDetail::find(session('USER_ID'));
        $result['passdata'] = WalletTransfer::where([['memberid', $result['data']['memberid']], ['walletType', 'Exchange Fund Transfer']])->orderBy('created_at', 'desc')->get();
        return view('member/wallet/wallet-to-exchange')->with($result);
    }

    public function walletExchangeTransfer(Request $request)
    {
        $request->validate([
            'amount' => 'required|gt:0',
            'pin' => 'required'
        ]);
        $var = MemberDetail::find(session('USER_ID'));
        $memberid = $var->memberid;
        $txn_password = $request->post('pin');
        $amount = $request->post('amount');
        $wallet = $var->wallet;
        $email = $var['email'];
        $name = $var['first_name'] . ' ' . $var['last_name'];

        if ($var->kyc_status != 'Verified') {
            session()->flash('failedMsg', 'Your KYC has either not been submitted or verified');
            return redirect()->back();
        }
        if ($amount < 0) {
            session()->flash('failedMsg', 'Negative value is not allowed');
            return redirect()->back();
        }
        if ($amount > $wallet) {
            session()->flash('failedMsg', 'You do not have enough balance to transfer this amount ');
            return redirect()->back();
        }

        $txnpassword = $var->txn_password;
        if (Hash::check($txn_password, $txnpassword)) {

            $otp = rand(100000, 999999);
            $request->session()->put('exng_wallet_otp', $otp);
            $request->session()->put('amount', $amount);
            $request->session()->put('memberid', $memberid);
            if ($email != '') {
                $mailData = [
                    'name' => $name,
                    'email' => $email,
                    'memberid' => $memberid,
                    'otp' => $otp,
                    'type' => 'Exchange Transfer'
                ];
                $user['to'] = $email;
                Mail::send('member.mails.otp-mail', $mailData, function ($message) use ($user) {

                    $message->to($user['to']);
                    $message->subject('Liberfx Exchange Transfer OTP');
                });
            }

            session()->flash('successMsg', 'OTP has been sent to your email id');
            return redirect()->back();
        } else {
            session()->flash('failedMsg', 'Entered PIN do not match. Please try again');
            return redirect()->back();
        }
    }

    public function walletExngOtpVerify(Request $request)
    {
        $request->validate([
            'otp' => 'required'
        ]);
        $otp = $request->post('otp');
        if ($otp == session()->get('exng_wallet_otp')) {
            $amount = $request->session()->get('amount');
            $memberid = $request->session()->get('memberid');
            //sending Money
            $qry = MemberDetail::where('memberid', $memberid)->first();
            if ($qry && $qry->status == 'Active') {

                $exnWallet = $qry->exng_wallet;
                $qry->exng_wallet += $amount;
                $qry->save();

                walletTransfer($memberid, $amount, 'debit', $exnWallet, 'Exchange Fund Transfer', '$ ' . $amount . ' has been received from main wallet');

                $wallet = $qry->wallet;
                $qry->wallet -= $amount;
                $qry->save();

                walletTransfer($memberid, $amount, 'credit', $wallet, 'Wallet Transfer', '$ ' . $amount . ' has been transferred to exchange wallet');

                session()->forget('exng_wallet_otp');
                session()->flash('successMsg', 'Amount has been transferred successfully');
                return redirect()->back();
            } else {
                session()->flash('failedMsg', 'Entered Memberid is either not active or unavailable');
                return redirect()->back();
            }
        } else {
            session()->flash('failedMsg', 'Entered OTP does not match');
            return redirect()->back();
        }
    }

    public function p2pwallet(Request $request)
    {
        $id = session('USER_ID');
        $result['data'] = MemberDetail::find($id);
        $memberid = $result['data']['memberid'];
        $result['passdata'] = WalletTransfer::where([['memberid', $result['data']['memberid']], ['walletType', 'P2P Fund Transfer']])->orderBy('created_at', 'desc')->get();
        return view('member.p2p.p2p-wallet')->with($result);
    }

    public function p2pHistory(Request $request)
    {
        $id = session('USER_ID');
        $result['data'] = MemberDetail::find($id);
        $memberid = $result['data']['memberid'];
        $result['passdata'] = WalletTransfer::where([['memberid', $result['data']['memberid']], ['walletType', 'P2P Fund Transfer']])->orderBy('created_at', 'desc')->get();
        return view('member.p2p.p2p-history')->with($result);
    }

    public function p2pToExchange(Request $request)
    {
        $id = session('USER_ID');
        $result['data'] = MemberDetail::find($id);
        $memberid = $result['data']['memberid'];
        $result['passdata'] = WalletTransfer::where([['memberid', $result['data']['memberid']], ['walletType', 'P2P Fund Transfer']])->orderBy('created_at', 'desc')->get();
        return view('member.p2p.p2p-to-exchange')->with($result);
    }

    public function fundExngTrans(Request $request)
    {
        $request->validate([
            'amount' => 'required|gt:0',
            'pin' => 'required',
            'wallet_type' => 'required'
        ]);
        $var = MemberDetail::find(session('USER_ID'));
        $memberid = $var->memberid;
        $txn_password = $request->post('pin');
        $wallet_type = $request->post('wallet_type');
        $amount = $request->post('amount');
        $p2pWallet = $var->p2p_wallet;

        if ($var->kyc_status != 'Verified') {
            session()->flash('failedMsg', 'Your KYC has either not been submitted or verified');
            return redirect()->back();
        }
        if ($amount < 0) {
            session()->flash('failedMsg', 'Negative value is not allowed');
            return redirect()->back();
        }
        if ($amount > $p2pWallet) {
            session()->flash('failedMsg', 'You do not have enough balance to transfer this amount ');
            return redirect()->back();
        }

        $txnpassword = $var->txn_password;
        if (Hash::check($txn_password, $txnpassword)) {
            $qry = MemberDetail::where('memberid', $memberid)->first();
            if ($qry && $qry->status == 'Active') {

                if ($wallet_type == 'Trading') {
                    $wallet = $qry->exng_wallet;
                    $qry->exng_wallet += $amount;
                    $qry->save();
                } elseif ($wallet_type == 'Course') {
                    $wallet = $qry->course_wallet;
                    $qry->course_wallet += $amount;
                    $qry->save();
                } elseif ($wallet_type == 'Lending') {
                    $wallet = $qry->lending_wallet;
                    $qry->lending_wallet += $amount;
                    $qry->save();
                }

                // walletTransfer($memberid, $amount, 'debit', $wallet, 'Exchange Fund Transfer', '$ ' . $amount . ' has been received from p2p wallet');

                $p2pWallet = $qry->p2p_wallet;
                $qry->p2p_wallet -= $amount;
                $qry->save();

                walletTransfer($memberid, $amount, 'credit', $p2pWallet, 'P2P Fund Transfer', '$ ' . $amount . ' has been transferred from P2P to ' . $wallet_type . ' Wallet');

                session()->flash('successMsg', 'Amount has been transferred successfully');
                return redirect()->back();
            } else {
                session()->flash('failedMsg', 'Entered Memberid is either not active or unavailable');
                return redirect()->back();
            }
        } else {
            session()->flash('failedMsg', 'Entered PIN do not match. Please try again');
            return redirect()->back();
        }
    }

    public function fundRequest(Request $request)
    {
        $id = session('USER_ID');
        $result['data'] = MemberDetail::find($id);
        $result['walletdata'] = FundRequestStat::all();
        $result['fundData'] = TableFundRequest::where('memberid', $result['data']['memberid'])
            ->whereIn('wallet_type', ['Main', 'p2p_wallet', 'exng_wallet'])
            ->orderBy('created_at', 'Desc')
            ->get();
        return view('member.fund-request')->with($result);
    }

    public function FundReq(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|gt:0',
            'txnid' => 'required|string|max:100',
            'coin' => 'required|in:USDT BEP20,USDT TRC20,BTC,Tron',
            'wallet_type' => 'required|in:p2p_wallet,exng_wallet',
            'image' => 'required|file|mimes:jpg,jpeg,png',
        ]);

        $amount = $request->post('amount');
        $check = TableFundRequest::where('tran_id', $request->post('txnid'))->first();

        if ($check) {
            session()->flash('failedMsg', 'Transaction id has already been used. Please check and try again');
            return redirect()->back();
        }

        // Always identify the member from the authenticated session, never from form input.
        $id = session('USER_ID');
        $qry = MemberDetail::find($id);

        if (!$qry) {
            session()->flash('failedMsg', 'Member account could not be found.');
            return redirect()->back();
        }

        $memberid = $qry->memberid;

        $var = new TableFundRequest();
        $var->date = date('Y-m-d');
        $var->memberid = $memberid;
        $var->coin = $request->post('coin');
        $var->amount = $amount;
        $var->tran_id = $request->post('txnid');
        $var->wallet_type = $request->post('wallet_type');

        $file = $request->file('image');
        $ext = $file->getClientOriginalExtension();
        // A unique filename prevents two requests uploaded together from colliding.
        $filename = 'txn-' . Str::uuid() . '.' . $ext;

        $file->move(public_path('uploads'), $filename);
        $var->image = $filename;
        $var->status = 'Requested';
        $var->save();

        session()->flash('successMsg', 'Your request has been created successfully.');
        return redirect()->back();
    }
}
