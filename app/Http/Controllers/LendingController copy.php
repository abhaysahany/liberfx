<?php

namespace App\Http\Controllers;

use App\Models\Deduction;
use App\Models\LendingDetail;
use App\Models\MemberDetail;
use App\Models\MonthlyBiz;
use App\Models\RankRatio;
use App\Models\TetoLending;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LendingController extends Controller
{
    public function lending()
    {
        $id = session('USER_ID');
        $result['data'] = MemberDetail::find($id);
        return view('member.investments.lending')->with($result);
    }

    public function lendingDetails()
    {
        $id = session('USER_ID');
        $result['data'] = MemberDetail::find($id);
        $result['ldata'] = LendingDetail::where('memberid', $result['data']['memberid'])->get();
        $result['tdata'] = TetoLending::where('memberid', $result['data']['memberid'])->get();
        return view('member.investments.lending-details')->with($result);
    }

    // public function basiclending(Request $request)
    // {
    //     $request->validate([
    //         'amount' => 'required',
    //         'txn_password' => 'required',
    //     ]);

    //     $type = 'Basic';
    //     $amount = $request->post('amount');
    //     $txn_password = $request->post('txn_password');
    //     $memberid = $request->post('memberid');
    //     $mdata = MemberDetail::where('memberid', $memberid)->first();
    //     $sponsorid = $mdata->sponsorid;
    //     if (!Hash::check($txn_password, $mdata->txn_password)) {
    //         session()->flash('ErrorMsg', 'Transaction password donot match.');
    //         return redirect()->back();
    //     }
    //     if ($amount < 70) {
    //         session()->flash('ErrorMsg', 'Minimum investment amount is $70.');
    //         return redirect()->back();
    //     }
    //     if ($amount > $mdata->trade_wallet) {
    //         session()->flash('ErrorMsg', 'You donot have enough amount in your wallet.');
    //         return redirect()->back();
    //     }

    //     $qry = new LendingDetail();
    //     $qry->start_date = date('Y-m-d H:i:s', strtotime('+1day'));
    //     $qry->memberid = $memberid;
    //     $qry->plan = $type;
    //     $qry->amount = $amount;
    //     $qry->total_duration = 0;
    //     $qry->interest = 10;
    //     $qry->status = 'Active';
    //     $qry->save();

    //     $wallet = $mdata->trade_wallet;
    //     $mdata->trade_wallet -= $amount;
    //     $mdata->team_invest += $amount;
    //     $mdata->save();
    //     walletTransfer($memberid, $amount, 'credit', $wallet, 'Lending Created', 'Lending amount deducted from wallet');
    //     team_invest_update($sponsorid, $amount);
    //     monthly_invest_update($sponsorid, $amount);
    //   //  pl_downline_update($memberid);

    //     session()->flash('PassMsg', 'Basic Lending created successfully.');
    //     return redirect()->back();
    // }

    // public function renolending(Request $request)
    // {
    //     $request->validate([
    //         'amount' => 'required',
    //         'txn_password' => 'required',
    //     ]);

    //     $type = 'Reno';
    //     $amount = $request->post('amount');
    //     $txn_password = $request->post('txn_password');
    //     $memberid = $request->post('memberid');
    //     $mdata = MemberDetail::where('memberid', $memberid)->first();
    //     $sponsorid = $mdata->sponsorid;
    //     if (!Hash::check($txn_password, $mdata->txn_password)) {
    //         session()->flash('ErrorMsg', 'Transaction password donot match.');
    //         return redirect()->back();
    //     }
    //     if ($amount < 70) {
    //         session()->flash('ErrorMsg', 'Minimum investment amount is $70.');
    //         return redirect()->back();
    //     }
    //     if ($amount > $mdata->trade_wallet) {
    //         session()->flash('ErrorMsg', 'You donot have enough amount in your wallet.');
    //         return redirect()->back();
    //     }

    //     $qry = new LendingDetail();
    //     $qry->start_date = date('Y-m-d H:i:s', strtotime('+1day'));
    //     $qry->memberid = $memberid;
    //     $qry->plan = $type;
    //     $qry->amount = $amount;
    //     $qry->total_duration = 0;
    //     $qry->interest = 10;
    //     $qry->status = 'Active';
    //     $qry->save();

    //     $wallet = $mdata->trade_wallet;
    //     $mdata->team_invest += $amount;
    //     $mdata->trade_wallet -= $amount;
    //     $mdata->save();
    //     walletTransfer($memberid, $amount, 'credit', $wallet, 'Reno Lending Created', 'Reno Lending amount deducted from wallet');
    //     team_invest_update($sponsorid, $amount);
    //     monthly_invest_update($sponsorid, $amount);
    // //    pl_downline_update($memberid);

    //     session()->flash('PassMsg', 'Reno Lending created successfully.');
    //     return redirect()->back();
    // }

    // public function tetolending(Request $request)
    // {
    //     $request->validate([
    //         'amount' => 'required',
    //         'duration' => 'required',
    //         'txn_password' => 'required',
    //     ]);

    //     $type = 'Teto';
    //     $amount = $request->post('amount');
    //     $duration = $request->post('duration');
    //     $txn_password = $request->post('txn_password');
    //     $memberid = $request->post('memberid');
    //     $mdata = MemberDetail::where('memberid', $memberid)->first();
    //     $sponsorid = $mdata->sponsorid;
    //     if (!Hash::check($txn_password, $mdata->txn_password)) {
    //         session()->flash('ErrorMsg', 'Transaction password donot match.');
    //         return redirect()->back();
    //     }
    //     if ($amount < 70) {
    //         session()->flash('ErrorMsg', 'Minimum investment amount is $70.');
    //         return redirect()->back();
    //     }
    //     if ($amount > $mdata->trade_wallet) {
    //         session()->flash('ErrorMsg', 'You donot have enough amount in your wallet.');
    //         return redirect()->back();
    //     }

    //     if ($duration == 12) {
    //         $return = 150;
    //         $mamount = $amount * 1.5;
    //     } elseif ($duration == 24) {
    //         $return = 300;
    //         $mamount = $amount * 3;
    //     } elseif ($duration == 36) {
    //         $return = 450;
    //         $mamount = $amount * 4.5;
    //     }

    //     $qry = new TetoLending();
    //     $qry->invest_date = date('Y-m-d');
    //     $qry->memberid = $memberid;
    //     $qry->duration = $duration;
    //     $qry->amount = $amount;
    //     $qry->total_return = $return;
    //     $qry->maturity_amount = $amount + $mamount;
    //     $qry->maturity_date = date('Y-m-d', strtotime('+' . $duration . 'months'));
    //     $qry->status = 'Active';
    //     $qry->save();

    //     $wallet = $mdata->trade_wallet;
    //     $mdata->team_invest += $amount;
    //     $mdata->trade_wallet -= $amount;
    //     $mdata->save();
    //     walletTransfer($memberid, $amount, 'credit', $wallet, 'Teto Lending Created', 'Teto Lending amount deducted from wallet');
    //     team_invest_update($sponsorid, $amount);
    //     monthly_invest_update($sponsorid, $amount);
    // //    pl_downline_update($memberid);

    //     session()->flash('PassMsg', 'Teto Lending created successfully.');
    //     return redirect()->back();
    // }

    public function lendingIncomes()
    {
        $result['data'] = MemberDetail::find(session('USER_ID'));
        $memberid = $result['data']['memberid'];
        // $result['lendata'] = LendingIncome::where([['memberid', $memberid], ['status', 'Paid']])->get();
        // $result['tetodata'] = TetoIncome::where([['memberid', $memberid], ['status', 'Paid']])->get();
        return view('member.income.lending-income')->with($result);
    }

    public function monthlyInvest()
    {
        $result['data'] = MemberDetail::find(session('USER_ID'));
        $memberid = $result['data']['memberid'];
        $result['ratio'] = RankRatio::find(1);
        $result['first'] = MemberDetail::where('sponsorid', $memberid)->orderBy('monthly_invest', 'DESC')->first();
        if ($result['first']) {
            $first_memb = $result['first']['memberid'];
            $result['rest'] = MemberDetail::where([['sponsorid', $memberid], ['memberid', '!=', $first_memb]])->sum('monthly_invest');
        } else {
            $result['rest'] = 0;
        }

        $result['rewdata'] = MonthlyBiz::where('memberid', $memberid)->get();
        return view('member.income.monthly-invest')->with($result);
    }

    public function memlending()
    {
        $id = session('USER_ID');
        $result['data'] = MemberDetail::find($id);
        return view('member.investments.member-lending')->with($result);
    }

    public function memBasiclending(Request $request)
    {
        $request->validate([
            'amount' => 'required',
            'txn_password' => 'required',
            'memberid' => 'required'
        ]);

        $type = 'Basic';
        $amount = $request->post('amount');
        $ded = Deduction::find(1);
        $rate = $ded->lending;

        $deduction = $amount / 100 * $rate;
        $total_amount = $amount + $deduction;
        $txn_password = $request->post('txn_password');
        $memberid = strtoupper($request->post('memberid'));
        $senderid = strtoupper($request->post('senderid'));
        $mdata = MemberDetail::where('memberid', $memberid)->first();
        if (!$mdata) {
            session()->flash('ErrorMsg', 'Memberid does not exist.');
            return redirect()->back();
        }
        $sponsorid = $mdata->sponsorid;
        $sdata = MemberDetail::where('memberid', $senderid)->first();

        if (!Hash::check($txn_password, $sdata->txn_password)) {
            session()->flash('ErrorMsg', 'Transaction password donot match.');
            return redirect()->back();
        }
        if ($amount < 70) {
            session()->flash('ErrorMsg', 'Minimum investment amount is $70.');
            return redirect()->back();
        }
        if ($total_amount > $sdata->trade_wallet) {
            session()->flash('ErrorMsg', 'You donot have enough amount in your wallet. You need ' . $total_amount);
            return redirect()->back();
        }

        $qry = new LendingDetail();
        $qry->start_date = date('Y-m-d H:i:s', strtotime('+1day'));
        $qry->memberid = $memberid;
        $qry->plan = $type;
        $qry->amount = $amount;
        $qry->total_duration = 0;
        $qry->interest = 10;
        $qry->status = 'Active';
        $qry->save();

        $wallet = $sdata->trade_wallet;
        $sdata->trade_wallet -= $total_amount;
        $sdata->save();

        $mdata->team_invest += $amount;
        $mdata->save();
        walletTransfer($senderid, $total_amount, 'credit', $wallet, 'Member Lending Created', '' . $memberid . 'Baisc Lending amount deducted from wallet');
        team_invest_update($sponsorid, $amount);
        monthly_invest_update($sponsorid, $amount);
        //    pl_downline_update($memberid);

        session()->flash('PassMsg', 'Basic Lending created successfully.');
        return redirect()->back();
    }

    public function memRenolending(Request $request)
    {
        $request->validate([
            'amount' => 'required',
            'txn_password' => 'required',
            'memberid' => 'required'
        ]);

        $type = 'Reno';
        $amount = $request->post('amount');
        $ded = Deduction::find(1);
        $rate = $ded->lending;
        $deduction = $amount / 100 * $rate;
        $total_amount = $amount + $deduction;
        $txn_password = $request->post('txn_password');
        $memberid = $request->post('memberid');
        $senderid = $request->post('senderid');
        $mdata = MemberDetail::where('memberid', $memberid)->first();
        if (!$mdata) {
            session()->flash('ErrorMsg', 'Memberid does not exist.');
            return redirect()->back();
        }
        $sponsorid = $mdata->sponsorid;
        $sdata = MemberDetail::where('memberid', $senderid)->first();
        if (!Hash::check($txn_password, $sdata->txn_password)) {
            session()->flash('ErrorMsg', 'Transaction password donot match.');
            return redirect()->back();
        }
        if ($amount < 70) {
            session()->flash('ErrorMsg', 'Minimum investment amount is $70.');
            return redirect()->back();
        }
        if ($total_amount > $sdata->trade_wallet) {
            session()->flash('ErrorMsg', 'You donot have enough amount in your wallet. You need ' . $total_amount);
            return redirect()->back();
        }

        $qry = new LendingDetail();
        $qry->start_date = date('Y-m-d H:i:s', strtotime('+1day'));
        $qry->memberid = $memberid;
        $qry->plan = $type;
        $qry->amount = $amount;
        $qry->total_duration = 0;
        $qry->interest = 10;
        $qry->status = 'Active';
        $qry->save();

        $wallet = $sdata->trade_wallet;
        $sdata->trade_wallet -= $total_amount;
        $sdata->save();

        $mdata->team_invest += $amount;
        $mdata->save();

        walletTransfer($senderid, $total_amount, 'credit', $wallet, 'Member Reno Lending Created', '' . $memberid . 'Reno Lending amount deducted from wallet');
        team_invest_update($sponsorid, $amount);
        monthly_invest_update($sponsorid, $amount);
        //   pl_downline_update($memberid);

        session()->flash('PassMsg', 'Reno Lending created successfully.');
        return redirect()->back();
    }

    public function memTetolending(Request $request)
    {
        $request->validate([
            'amount' => 'required',
            'duration' => 'required',
            'txn_password' => 'required',
            'memberid' => 'required'
        ]);

        $type = 'Teto';
        $amount = $request->post('amount');
        $ded = Deduction::find(1);
        $rate = $ded->lending;
        $deduction = $amount / 100 * $rate;
        $total_amount = $amount + $deduction;
        $duration = $request->post('duration');
        $txn_password = $request->post('txn_password');
        $memberid = $request->post('memberid');
        $senderid = $request->post('senderid');
        $mdata = MemberDetail::where('memberid', $memberid)->first();
        if (!$mdata) {
            session()->flash('ErrorMsg', 'Memberid does not exist.');
            return redirect()->back();
        }
        $sponsorid = $mdata->sponsorid;
        $sdata = MemberDetail::where('memberid', $senderid)->first();
        if (!Hash::check($txn_password, $sdata->txn_password)) {
            session()->flash('ErrorMsg', 'Transaction password donot match.');
            return redirect()->back();
        }
        if ($amount < 70) {
            session()->flash('ErrorMsg', 'Minimum investment amount is $70.');
            return redirect()->back();
        }
        if ($total_amount > $sdata->trade_wallet) {
            session()->flash('ErrorMsg', 'You donot have enough amount in your wallet. You need ' . $total_amount);
            return redirect()->back();
        }

        if ($duration == 12) {
            $return = 150;
            $mamount = $amount * 1.5;
        } elseif ($duration == 24) {
            $return = 300;
            $mamount = $amount * 3;
        } elseif ($duration == 36) {
            $return = 450;
            $mamount = $amount * 4.5;
        }

        $qry = new TetoLending();
        $qry->invest_date = date('Y-m-d');
        $qry->memberid = $memberid;
        $qry->duration = $duration;
        $qry->amount = $amount;
        $qry->total_return = $return;
        $qry->maturity_amount = $amount + $mamount;
        $qry->maturity_date = date('Y-m-d', strtotime('+' . $duration . 'months'));
        $qry->status = 'Active';
        $qry->save();

        $wallet = $sdata->trade_wallet;
        $sdata->trade_wallet -= $total_amount;
        $sdata->save();

        $mdata->team_invest += $amount;
        $mdata->save();

        walletTransfer($senderid, $total_amount, 'credit', $wallet, 'Member Teto Lending Created', '' . $memberid . ' Teto Lending amount deducted from wallet');
        team_invest_update($sponsorid, $amount);
        monthly_invest_update($sponsorid, $amount);
        //    pl_downline_update($memberid);

        session()->flash('PassMsg', 'Teto Lending created successfully.');
        return redirect()->back();
    }

    public function CoreLending()
    {
    }

    public function LimeLending()
    {
    }

    public function DroidLending()
    {
    }
}
