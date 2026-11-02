<?php

namespace App\Http\Controllers;

use App\Models\ConvertPrize;
use App\Models\Deduction;
use App\Models\FundRequestStat;
use App\Models\ImportFund;
use App\Models\MemberDetail;
use App\Models\NowpaymentsPayment;
use App\Models\TableFundRequest;
use App\Models\WalletTransfer;
use App\Models\WithdrawalRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class TradeWalletController extends Controller
{
    public function walletTrade(Request $request)
    {
        //CoinValue();
        $id = session('USER_ID');
        $result['data'] = MemberDetail::find($id);
        $memberid = $result['data']['memberid'];
        $result['wdata'] = WithdrawalRequest::where([['memberid', $memberid], ['wallet_type', 'Trade']])->get();
        $result['coindata'] = ConvertPrize::find(1);
        return view('member.trade.trade-wallet')->with($result);
    }

    public function withdrawalTrade(Request $request)
    {
        $request->validate([
            'amount' => 'required|min:0',
            'transaction_password' => 'required'
        ]);

        $amount = $request->post('amount');
        $memberid = $request->post('memberid');
        $payopt = $request->post('paymentInFirst');
        $memberData = MemberDetail::where('memberid', $memberid)->first();
        if ($payopt == 'wallet_address') {
            $wallet_address = $request->post('wallet');
        } elseif ($payopt == 'qr_code') {
            $qr_code = $memberData->usdt_qr;
            if ($qr_code == '') {
                session()->flash('failedMsg', 'Usdt QR not be submitted.Please submit QR for withdrawl');
                return redirect()->back();
            }
        }
        if (is_int($amount) == false) {
            if (!is_double($amount) == false) {
                session()->flash('failedMsg', 'An integer value is required in amount field');
                return redirect()->back();
            }
        }
        $txnid = $request->post('transaction_password');
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
                session()->flash('failedMsg', 'Entered Transaction Password do not match.');
                return redirect()->back();
            }
            // if ($memberData->wallet_address == Null || $memberData->wallet_address == '') {
            //     session()->flash('failedMsg', 'Your Wallet Address is not submitted. Please submit your wallet address');
            //     return redirect()->back();
            // }
            if ($memberData->kyc_status != 'Verified') {
                session()->flash('failedMsg', 'Your KYC is either not Submitted or Approved. Please submit you KYC in case of No KYC done');
                return redirect()->back();
            }
            if ($amount < 0) {
                session()->flash('failedMsg', 'Invalid amount entered.');
                return redirect()->back();
            }
            if ($amount > $memberData->trade_wallet) {
                session()->flash('failedMsg', 'Not Enough balance in your wallet to withdrawal this amount.');
                return redirect()->back();
            }
            $wallet = $memberData->trade_wallet;
            $memberData->trade_wallet -= $totalAmount;
            $memberData->save();

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
            $var->wallet_type = 'Trade';
            $var->save();

            walletTransfer($memberid, $totalAmount, 'credit', $wallet, 'Trade Withdrawal', ' $ ' . $amount . ' have been withdrawn by Member from wallet. Payment Id-' . $requestId);
        }

        session()->flash('successMsg', 'Withdrawal request has been created successfully.');
        return redirect()->back();
    }

    public function withdrawalTrxTrade(Request $request)
    {
        $request->validate([
            'amount' => 'required|min:0',
            'trx_amount' => 'required|min:0',
            'transaction_password' => 'required'
        ]);

        $amount = $request->post('amount');
        $trx_amount = $request->post('trx_amount');
        $memberid = $request->post('memberid');
        $txnid = $request->post('transaction_password');
        $requestId = $request->post('requestId');
        $payopt = $request->post('paymentInSecond');
        $memberData = MemberDetail::where('memberid', $memberid)->first();
        if ($payopt == 'wallet_address') {
            $wallet_address = $request->post('wallet');
        } elseif ($payopt == 'qr_code') {
            $qr_code = $memberData->tron_qr;
            if ($qr_code == '') {
                session()->flash('failedMsg', 'Tron QR not be submitted.Please submit QR for withdrawl');
                return redirect()->back();
            }
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
            $memberData = MemberDetail::where('memberid', $memberid)->first();
            if (!Hash::check($txnid, $memberData->txn_password)) {
                session()->flash('failedMsg', 'Entered Transaction Password do not match.');
                return redirect()->back();
            }
            // if ($memberData->wallet_address == Null || $memberData->wallet_address == '') {
            //     session()->flash('failedMsg', 'Your Wallet Address is not submitted. Please submit your wallet address');
            //     return redirect()->back();
            // }
            if ($memberData->kyc_status != 'Verified') {
                session()->flash('failedMsg', 'Your KYC is either not Submitted or Approved. Please submit you KYC in case of No KYC done');
                return redirect()->back();
            }
            if ($amount < 0) {
                session()->flash('failedMsg', 'Invalid amount entered.');
                return redirect()->back();
            }
            if ($amount > $memberData->trade_wallet) {
                session()->flash('failedMsg', 'Not Enough balance in your wallet to withdrawal this amount.');
                return redirect()->back();
            }
            $wallet = $memberData->trade_wallet;
            $memberData->trade_wallet -= $amount;
            $memberData->save();

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
            $var->wallet_type = 'Trade';
            $var->save();

            walletTransfer($memberid, $totalAmount, 'credit', $wallet, 'Trade Withdrawal', ' $ ' . $amount . ' have been withdrawn by Member from wallet. Payment Id-' . $requestId);
        }

        session()->flash('successMsg', 'Withdrawal request has been created successfully.');
        return redirect()->back();
    }

    public function withdrawalBtcTrade(Request $request)
    {
        $request->validate([
            'amount' => 'required|min:0',
            'btc_amount' => 'required|min:0',
            'transaction_password' => 'required'
        ]);

        $amount = $request->post('amount');
        $btc_amount = $request->post('btc_amount');
        $memberid = $request->post('memberid');
        $txnid = $request->post('transaction_password');
        $requestId = $request->post('requestId');
        $payopt = $request->post('paymentInThird');
        $memberData = MemberDetail::where('memberid', $memberid)->first();
        if ($payopt == 'wallet_address') {
            $wallet_address = $request->post('wallet');
        } elseif ($payopt == 'qr_code') {
            $qr_code = $memberData->btc_qr;
            if ($qr_code == '') {
                session()->flash('failedMsg', 'BTC QR not be submitted.Please submit QR for withdrawl');
                return redirect()->back();
            }
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
            $memberData = MemberDetail::where('memberid', $memberid)->first();
            if (!Hash::check($txnid, $memberData->txn_password)) {
                session()->flash('failedMsg', 'Entered Transaction Password do not match.');
                return redirect()->back();
            }
            // if ($memberData->wallet_address == Null || $memberData->wallet_address == '') {
            //     session()->flash('failedMsg', 'Your Wallet Address is not submitted. Please submit your wallet address');
            //     return redirect()->back();
            // }
            if ($memberData->kyc_status != 'Verified') {
                session()->flash('failedMsg', 'Your KYC is either not Submitted or Approved. Please submit you KYC in case of No KYC done');
                return redirect()->back();
            }
            if ($amount < 0) {
                session()->flash('failedMsg', 'Invalid amount entered.');
                return redirect()->back();
            }
            if ($amount > $memberData->trade_wallet) {
                session()->flash('failedMsg', 'Not Enough balance in your wallet to withdrawal this amount.');
                return redirect()->back();
            }
            $wallet = $memberData->trade_wallet;
            $memberData->trade_wallet -= $amount;
            $memberData->save();

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
            $var->wallet_type = 'Trade';
            $var->save();

            walletTransfer($memberid, $totalAmount, 'credit', $wallet, 'Trade Withdrawal', ' $ ' . $amount . ' have been withdrawn by Member from wallet. Payment Id-' . $requestId);
        }

        session()->flash('successMsg', 'Withdrawal request has been created successfully.');
        return redirect()->back();
    }


    public function addTradefunds(Request $request)
    {
        $id = session('USER_ID');
        $result['data'] = MemberDetail::find($id);
        $result['addfundData'] = ImportFund::where([['memberid', $result['data']['memberid']], ['wallet_type', 'Trade']])->get();
        return view('member.trade.add-trade-funds')->with($result);
    }

    public function instantTradeFunds(Request $request)
    {
        $request->validate([
            'amount' => 'required|min:0',
            'txn_password' => 'required'
        ]);

        $memberid = $request->post('memberid');
        $amount = $request->post('amount');
        $txn_password = $request->post('txn_password');
        $orderid = Str::random(20) . rand(1000, 9999);

        $result = MemberDetail::where('memberid', $memberid)->first();
        $Hashpass = $result['txn_password'];
        if (!Hash::check($txn_password, $Hashpass)) {
            session()->flash('failedMsg', 'Please enter valid Transaction Password .');
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
            "success_url" => "https://voxabitgenix.com/member/payment-success-trade/" . $orderid,
            "cancel_url" => "https://voxabitgenix.com/member/payment-cancel-trade/" . $orderid,
            "partially_paid_url" => "https://voxabitgenix.com/member/payment-success-trade/" . $orderid
        );

        $post = json_encode($post);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        curl_setopt($ch, CURLOPT_POST, 1);

        $headers = array();
        $headers[] = "Content-Type: application/json";
        $headers[] = "x-api-key: 48N4RZT-2S64YD9-HZCZ1SA-Q67T059";
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

    public function walletTradeTransfer()
    {
        $result['data'] = MemberDetail::find(session('USER_ID'));
        $result['tradeData'] = WalletTransfer::where('memberid', $result['data']['memberid'])->whereIn('walletType', ['Trade Withdrawal', 'Trade Funds Requested', 'Import Funds Trade'])->orderBy('created_at', 'desc')->get();
        return view('member.trade.trade-wallet-transfer')->with($result);
    }

    public function fundTradeRequest(Request $request)
    {
        $id = session('USER_ID');
        $result['data'] = MemberDetail::find($id);
        $result['walletdata'] = FundRequestStat::all();
        $result['tfundData'] = TableFundRequest::where([['memberid', $result['data']['memberid']], ['wallet_type', 'Trade']])->get();
        return view('member.trade.trade-fund-request')->with($result);
    }

    public function TradeFundReq(Request $request)
    {
        $request->validate([
            'amount' => 'required',
            'txnid' => 'required',
            'coin' => 'required',
            'image' => 'required'
        ]);

        // print_r($request->post());
        $id = $request->post('id');
        $qry = MemberDetail::find($id);
        $memberid = $qry->memberid;

        $var = new TableFundRequest();
        $var->date = date('Y-m-d');
        $var->memberid = $memberid;
        $var->coin = $request->post('coin');
        $var->amount = $request->post('amount');
        $var->tran_id = $request->post('txnid');
        $file = $request->file('image');
        $ext = $file->getClientOriginalExtension();
        if ($ext != 'png' && $ext != 'jpg' && $ext != 'jpeg') {
            session()->flash('failedMsg', 'Allowed image type is jpg, jpeg, png. Please change image type');
            return redirect()->back();
        }
        $filename = 'txn' . time() . '.' . $ext;

        $file->move(public_path('uploads'), $filename);
        $var->image = $filename;
        $var->status = 'Requested';
        $var->wallet_type = 'Trade';
        $var->save();

        session()->flash('ActiveMsg', 'Your request has been created successfully.');
        return redirect()->back();
    }
}
