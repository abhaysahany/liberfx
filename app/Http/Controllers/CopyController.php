<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\CopyAccount;
use App\Models\CopyTrade;
use App\Models\MemberDetail;
use App\Models\PayCopyCharge;
use App\Models\PayProfitCharge;
use App\Models\SummaryCopyDetail;
use App\Models\TradeDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CopyController extends Controller
{

    public function accountsDetail()
    {
        $result['admin'] = Admin::find(1);
        $result['accounts'] = CopyAccount::all();
        return view('admin.trade.account-details')->with($result);
    }

    public function createTrade()
    {
        $result['admin'] = Admin::find(1);
        return view('admin.trade.create-trade')->with($result);
    }

    public function tradingDetail()
    {
        $result['admin'] = Admin::find(1);
        $result['tdata'] = TradeDetail::all();
        return view('admin.trade.trading-detail')->with($result);
    }

    public function insertTrade(Request $request)
    {
        $request->validate([
            'trade_id' => 'required|unique:trade_details,trade_id',
            'date_time' => 'required',
            'pair' => 'required',
            'volume' => 'required|numeric|gt:0',
            'buy_amount' => 'required|numeric|gt:0',
            'sell_amount' => 'required|numeric|gt:0',
            'type' => 'required',
            'profit_loss' => 'required|numeric'
        ]);
        $tradeId = $request->post('trade_id');
        // $amount = $request->post('amount');
        $check = TradeDetail::where('trade_id', $tradeId)->first();
        if ($check) {
            session()->flash('failedMsg', 'This trade is already submitted');
            return redirect()->back();
        }
        // if ($amount < 0) {
        //     session()->flash('failedMsg', 'Invalid amount entered');
        //     return redirect()->back();
        // }

        $var = new TradeDetail();
        $var->trade_id = $tradeId;
        $var->datetime = $request->post('date_time');
        $var->pair = $request->post('pair');
        $var->type = $request->post('type');
        $var->volume = $request->post('volume');
        $var->buy_amount = $request->post('buy_amount');
        $var->sell_amount = $request->post('sell_amount');
        $var->profit_loss = $request->post('profit_loss');
        $var->save();

        session()->flash('successMsg', 'Trade Details inserted successfully');
        return redirect()->back();
    }



    public function weeklyDetail()
    {
        $result['admin'] = Admin::find(1);
        return view('admin.trade.weekly-detail')->with($result);
    }

    public function memberDeposit()
    {
        $result['admin'] = Admin::find(1);
        return view('admin.trade.member-deposit')->with($result);
    }

    public function addMembers(Request $request, $id)
    {
        $result['admin'] = Admin::find(1);
        $cpAccounts = CopyAccount::all()->pluck('memberid');
        $result['members'] = MemberDetail::whereIn('memberid', $cpAccounts)->get();
        $result['tradeId'] = $id;
        // foreach ($cpAccounts as $value) {
        //     echo  $result['members'] = MemberDetail::where('memberid', $value->memberid)->first();
        // }
        return view('admin.trade.add-members')->with($result);
    }

    public function addCopyMembers(Request $request)
    {
        $members = $request->post('memberid');
        $tradeId = $request->post('trade_id');

        if ($members) {
            $tradeData = TradeDetail::where('trade_id', $tradeId)->first();
            foreach ($members as $value) {
                // echo $value . '--' . $tradeId;
                // echo "<br>";

                $var = new CopyTrade();
                $var->memberid = $value;
                $var->trade_id = $tradeId;
                $var->datetime = $tradeData->datetime;
                $var->pair = $tradeData->pair;
                $var->volume = $tradeData->volume;
                $var->buy_amount = $tradeData->buy_amount;
                $var->sell_amount = $tradeData->sell_amount;
                $var->type = $tradeData->type;
                $var->profit_loss = $tradeData->profit_loss;
                $var->save();
            }

            session()->flash('successMsg', 'Member added successfully');
            return redirect()->back();
        } else {
            session()->flash('failedMsg', 'No Member selected');
            return redirect()->back();
        }
    }

    public function copySummary()
    {
        $result['admin'] = Admin::find(1);
        $result['cpData'] = SummaryCopyDetail::where('status', 'Open')->get();
        return view('admin.trade.copy-summary')->with($result);
    }

    public function copySummaryHistory()
    {
        $result['admin'] = Admin::find(1);
        $result['cpData'] = SummaryCopyDetail::where('status', 'Closed')->get();
        return view('admin.trade.copy-history')->with($result);
    }

    public function newPaySlips()
    {
        $result['admin'] = Admin::find(1);
        $result['payData'] = PayProfitCharge::where('status', 'Requested')->get();
        return view('admin.trade.new-pay-slips')->with($result);
    }

    public function slipHistory()
    {
        $result['admin'] = Admin::find(1);
        $result['payData'] = PayProfitCharge::where('status', 'Approved')->get();
        return view('admin.trade.slip-history')->with($result);
    }

    public function acceptPaySlip(Request $request, $id)
    {
        $var = PayProfitCharge::find($id);
        $var->status = 'Approved';
        $var->save();

        session()->flash('successMsg', 'Payment Slip accepted successfully!');
        return redirect()->back();
    }

    public function copySummaryDetails()
    {
        $id = session('USER_ID');
        $result['data'] = MemberDetail::find($id);
        $result['cpData'] = SummaryCopyDetail::where([['memberid', $result['data']['memberid']], ['status', 'Open']])->get();
        return view('member.copyTrade.copy-summary-details')->with($result);
    }

    public function copyNowPage(Request $request, $cpId)
    {
        $id = session('USER_ID');
        $result['data'] = MemberDetail::find($id);
        $result['cpData'] = SummaryCopyDetail::where([['id', $cpId], ['memberid', $result['data']['memberid']]])->first();
        return view('member.copyTrade.pay-now')->with($result);
    }

    public function payCopyPayment(Request $request)
    {
        $request->validate([
            'memberid' => 'required',
            'cpId' => 'required',
            'pay_slip' => 'required',
            'txn_password' => 'required'
        ]);
        $cpId = $request->post('cpId');
        $txnpass = $request->post('txn_password');
        $id = session('USER_ID');
        $memCheck = MemberDetail::find($id);
        $memberid = $memCheck->memberid;
        if (!Hash::check($txnpass, $memCheck->txn_password)) {
            session()->flash('failedMsg', 'Entered Transaction Password do not match.');
            return redirect()->back();
        }

        $cpData = SummaryCopyDetail::where([['id', $cpId], ['memberid', $memberid]])->first();
        $amount = $cpData->balance / 2;

        $qry = new PayProfitCharge();
        $qry->memberid = $memberid;
        $qry->cp_trade_id = $cpData->id;
        $qry->total_profit = $cpData->total_profit;
        $qry->amount = $amount;
        $qry->memberid = $memberid;
        $file = $request->file('pay_slip');
        $ext = $file->getClientOriginalExtension();
        if ($ext != 'png' && $ext != 'jpg' && $ext != 'jpeg') {
            session()->flash('failedMsg', 'Allowed image type is jpg, jpeg, png. Please change image type');
            return redirect()->back();
        }
        $filename = 'PAY' . time() . '.' . $ext;

        $file->move(public_path('uploads'), $filename);
        $qry->payment_slip = $filename;
        $qry->save();

        $cpData->status = 'Closed';
        $cpData->save();

        session()->flash('successMsg', 'Request created successfully for admin');
        return redirect()->to('/member/copy-summary-details');
    }
}
