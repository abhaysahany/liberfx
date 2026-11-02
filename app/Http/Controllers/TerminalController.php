<?php

namespace App\Http\Controllers;

use App\Models\MemberDetail;
use App\Models\TableCoins;
use App\Models\UserAsset;
use App\Models\UserOrder;
use App\Models\WalletTransfer;
use App\Models\WelcomeImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TerminalController extends Controller
{
    public function exchangeType()
    {
          $id = session('USER_ID');
        $result['data'] = MemberDetail::find($id);
        return view('member.exchange-type')->with($result);
    }

    public function exchange($type, $token)
    {
        if ($type == 'forex') {
            $result['coindata'] = TableCoins::orderBy('coin', 'ASC')->where('id', '<=', 45)->get();
        } else {
            $result['coindata'] = TableCoins::orderBy('coin', 'ASC')->where('id', '>', 45)->get();
        }

        $var = TableCoins::where('coin', $token)->first();
        $result['token'] = $var['coin'];
        $result['code'] = $var['code'];
        $result['event'] = $var['event'];
        $result['type'] = $type;
        $result['prefix'] = $var['prefix'];
        session()->put('token', $result['token']);

        $result['data'] = MemberDetail::find(session('USER_ID'));
        $mData = getMarketPrice($var['coin']);
        $result['coin_price'] = $mData['data'];
        $memberid = $result['data']['memberid'];
        $check = UserAsset::where([['coins', $result['token']], ['memberid', $memberid]])->first();
        if ($check) {
            $result['assets'] = $check['quantity'];
        } else {
            $result['assets'] = 0.0000;
        }
        $result['first_image'] = WelcomeImages::orderby('created_at', 'asc')->first();
        return view('member.exchange')->with($result);
    }

    public function assets(Request $request)
    {
        $id = session('USER_ID');
        $result['data'] = MemberDetail::find($id);
        $result['astdata'] = UserAsset::where('memberid', $result['data']['memberid'])->get();
        return view('member.assets')->with($result);
    }

    // public function placeLimitOrder(Request $request)
    // {
    //     $memberid = $request->post('memberid');
    //     $payamount = $request->post('amount');
    //     $amount = $payamount / 100 * 99.5;
    //     $fee = $payamount / 100 * 0.5;
    //     $price = $request->post('price');
    //     $quantity = $amount / $price;
    //     $coin_token = $request->post('token');

    //     $var = MemberDetail::where('memberid', $memberid)->first();
    //     if ($var->wallet < $payamount || $payamount < 0) {
    //         return response()->json([
    //             'code' => 0,
    //             'message' => 'Invalid Amount Input. Please check carefully'
    //         ]);
    //     }
    //     $var->wallet -= $payamount;
    //     $var->save();

    //     $ord = new UserOrder();
    //     $ord->memberid = $memberid;
    //     $ord->order_id = $memberid . time();
    //     $ord->order_time = date('Y-m-d H:i:s');
    //     $ord->coin_name = $coin_token;
    //     $ord->quantity = $quantity;
    //     $ord->price = $price;
    //     $ord->price_2 = $price;
    //     $ord->total_value = $amount;
    //     $ord->fee_deducted = $fee;
    //     $ord->order_type = 'BUY';
    //     $ord->price_type = 'Limit';
    //     $ord->save();

    //     return response()->json([
    //         'code' => 1,
    //         'message' => 'Order has been placed successfully'
    //     ]);
    // }

    public function placeMarketOrder(Request $request)
    {
        $memberid = $request->post('memberid');
        $payamount = $request->post('amount');
        $amount = $payamount / 100 * 99.5;
        $fee = $payamount / 100 * 0.5;
        $coin_token = $request->post('token');
        $mprice = getMarketPrice($coin_token);
        if ($mprice['code'] == 0) {
            return response()->json([
                'code' => 0,
                'message' => 'Server Error. Try some time later.'
            ]);
        }
        $price = $mprice['data'];
        $quantity = number_format($amount / $price, 6);

        // $coin_check = UserOrder::where('memberid', $memberid)->whereDate('created_at', date('Y-m-d'))->whereIn('coin_name', ['VOXA/USDT', 'BNIX/USDT'])->count();
        // if ($coin_check > 2) {
        //     return response()->json([
        //         'code' => 0,
        //         'message' => 'You have taken todays trades. Only two trades per day is open for now'
        //     ]);
        // }

        $var = MemberDetail::where('memberid', $memberid)->first();
        if ($payamount <= 0) {
            return response()->json([
                'code' => 0,
                'message' => 'Invalid Amount Input. Please check carefully'
            ]);
        } elseif ($var->exng_wallet < $payamount) {
            return response()->json([
                'code' => 0,
                'message' => 'You do not have enough balance for buy this amount'
            ]);
        }
        $var->exng_wallet -= $payamount;
        $var->save();

        $ord = new UserOrder();
        $ord->memberid = $memberid;
        $ord->order_id = $memberid . time();
        $ord->order_time = date('Y-m-d H:i:s');
        $ord->coin_name = $coin_token;
        $ord->quantity = $quantity;
        $ord->price = $price;
        $ord->total_value = $amount;
        $ord->fee_deducted = $fee;
        $ord->order_type = 'BUY';
        $ord->price_type = 'Market';
        $ord->status = 'Finished';
        $ord->save();

        $usrast  = UserAsset::where([['memberid', $memberid], ['coins', $coin_token]])->first();
        if ($usrast) {
            $usrast->quantity += $quantity;
            $usrast->total_value += $amount;
            $usrast->avg_price = $usrast->total_value / $usrast->quantity;
            $usrast->save();
        } else {
            $inst = new UserAsset();
            $inst->memberid = $memberid;
            $inst->coins = $coin_token;
            $inst->quantity = $quantity;
            $inst->avg_price = $price;
            $inst->total_value = $amount;
            $inst->save();
        }
        walletTransfer($memberid, $payamount, 'credit', $var->exng_wallet, 'Buy Order', 'Order Id No ' . $ord->order_id . ' executed at the price ' . $price . ' for ' . $quantity . ' ' . $coin_token . '');

        return response()->json([
            'code' => 1,
            'message' => 'Order has been placed & executed successfully'
        ]);
    }

    public function sellMarketOrder(Request $request)
    {
        $memberid = $request->post('memberid');
        $quantity = $request->post('quantity');
        $coin_token = $request->post('token');
        $mprice = getMarketPrice($coin_token);
        if ($mprice['code'] == 0) {
            return response()->json([
                'code' => 0,
                'message' => 'Server Error. Try some time later.'
            ]);
        }
        if ($quantity <= 0) {
            return response()->json([
                'code' => 0,
                'message' => 'Please enter valid quantity for sell'
            ]);
        }
        $amount = $mprice['data'] * $quantity;
        $price = $mprice['data'];
        $fee = $amount / 100 * 0.5;

        $usrast  = UserAsset::where([['memberid', $memberid], ['coins', $coin_token]])->first();

        if ($usrast) {
            if ($usrast->quantity < $quantity) {
                return response()->json([
                    'code' => 0,
                    'message' => 'This Quantity is not available in your account'
                ]);
            }
            $bal_quntity = $usrast->quantity - $quantity;
            $usrast->quantity -= $quantity;
            $usrast->total_value -= $amount;
            if ($bal_quntity > 0) {
                $usrast->avg_price = $usrast->total_value / $usrast->quantity;
            } else {
                $usrast->avg_price = 0;
                $usrast->total_value = 0;
            }
            $usrast->save();
        } else {
            return response()->json([
                'code' => 0,
                'message' => 'No Holding found'
            ]);
        }

        $ord = new UserOrder();
        $ord->memberid = $memberid;
        $ord->order_id = $memberid . time();
        $ord->order_time = date('Y-m-d H:i:s');
        $ord->coin_name = $coin_token;
        $ord->quantity = $quantity;
        $ord->price = $price;
        $ord->total_value = $amount;
        $ord->fee_deducted = $fee;
        $ord->order_type = 'SELL';
        $ord->price_type = 'Market';
        $ord->status = 'Finished';
        $ord->save();

        $qry = MemberDetail::where('memberid', $memberid)->first();
        $wallet = $qry->exng_wallet;
        $qry->exng_wallet += $amount - $fee;
        $qry->save();

        walletTransfer($memberid, $amount - $fee, 'debit', $wallet, 'Sell Order', 'Order Id No ' . $ord->order_id . ' executed at the price ' . $price . ' for ' . $quantity . ' ' . $coin_token . '');

        return response()->json([
            'code' => 1,
            'message' => 'Order has been executed successfully'
        ]);
    }

    public function excWallet()
    {
        $id = session('USER_ID');
        $result['data'] = MemberDetail::find($id);
        $result['passdata'] = WalletTransfer::where([['memberid', $result['data']['memberid']], ['walletType', 'Exchange Fund Transfer']])->orderBy('created_at', 'desc')->get();
        return view('member.exc.exchange-wallet')->with($result);
    }

    public function excHistory()
    {
        $id = session('USER_ID');
        $result['data'] = MemberDetail::find($id);
        $result['passdata'] = WalletTransfer::where([['memberid', $result['data']['memberid']], ['walletType', 'Exchange Fund Transfer']])->orderBy('created_at', 'desc')->get();
        return view('member.exc.exchange-history')->with($result);
    }

    public function excTransfer(Request $request)
    {
        $request->validate([
            'amount' => 'required|gt:0',
            'wallet_type' => 'required',
            'pin' => 'required'
        ]);
        $id = session('USER_ID');
        $amount = $request->post('amount');
        $type = $request->post('wallet_type');
        $txn_password = $request->post('pin');

        $var = MemberDetail::find($id);
        $memberid = $var->memberid;
        if ($var && $var->status != 'Active') {
            session()->flash('failMsg', 'Entered Memberid is either blocked or unavailable');
            return redirect()->back();
        }
        if ($amount < 0) {
            session()->flash('failMsg', 'Negative value is not allowed');
            return redirect()->back();
        }
        if ($amount > $var['exng_wallet']) {
            session()->flash('failMsg', 'You do not have enough balance to transfer this amount ');
            return redirect()->back();
        }
        $txnpassword = $var->txn_password;
        if (Hash::check($txn_password, $txnpassword)) {
            $exng_wallet = $var->exng_wallet;
            $var->exng_wallet -= $amount;
            $var->save();

            if ($type == 'Main') {
                walletTransfer($memberid, $amount, 'credit', $exng_wallet, 'Exchange Fund Transfer', '$ ' . $amount . ' has been transferred to main wallet');

                $wallet = $var->wallet;
                $var->wallet += $amount;
                $var->save();

                walletTransfer($memberid, $amount, 'debit', $wallet, 'Wallet Transfer', '$ ' . $amount . ' has been received from exchange wallet');
            } elseif ($type == 'P2P') {
                walletTransfer($memberid, $amount, 'credit', $exng_wallet, 'Exchange Fund Transfer', '$ ' . $amount . ' has been transferred to p2p wallet');

                $p2pWallet = $var->p2p_wallet;
                $var->p2p_wallet += $amount;
                $var->save();

                walletTransfer($memberid, $amount, 'debit', $p2pWallet, 'P2P Fund Transfer', '$ ' . $amount . ' has been received from exchange wallet');
            }

            session()->flash('sucMsg', 'Amount has been transferred successfully');
            return redirect()->back();
        } else {
            session()->flash('failMsg', 'Entered PIN do not match. Please try again');
            return redirect()->back();
        }
    }
}
