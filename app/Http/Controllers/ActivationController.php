<?php

namespace App\Http\Controllers;

use App\Models\MemberDetail;
use App\Models\PackageDetail;
use App\Models\RewardIncome;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class ActivationController extends Controller
{
    public function accountActivation()
    {
        $result['data'] = MemberDetail::find(session('USER_ID'));
        return view('member.account.account-activation')->with($result);
    }

    public function memberActivation()
    {
        $result['data'] = MemberDetail::find(session('USER_ID'));
        $memberid = $result['data']['memberid'];
        $result['package_data'] = PackageDetail::where([['memberid', $memberid], ['package_type', 'Activation']])->first();
        return view('member.account.member-activation', $result);
    }

    public function activationUpgrade()
    {
        $id = session('USER_ID');
        $result['data'] = MemberDetail::where('id', $id)->first();
        return view('member.account.upgrade-activation', $result);
    }

    public function packageDetails()
    {
        $result['data'] = MemberDetail::find(session('USER_ID'));
        $memberid = $result['data']['memberid'];
        $result['package_data'] = PackageDetail::where('memberid', $memberid)->get();
        return view('member.account.packages-details', $result);
    }

    public function activateUser(Request $request)
    {
        $request->validate([
            'memberid' => 'required',
            'package' => 'required',
            'amount' => 'required',
            'p2p_wallet' => 'required',
            'txn_password' => 'required'
        ]);

        $memberid = $request->post('memberid');
        $rank = $request->post('package');
        $amount = $request->post('amount');
        $value = $amount / 11 * 10;
        $p2p_wallet = $request->post('p2p_wallet');
        $txn_password = $request->post('txn_password');
        $type = 'Activation';


        // $memUpdate = MemberDetail::find($id);
        $memUpdate = MemberDetail::where('memberid', $memberid)->first();
        // Memberid status and existence validation
        if ($memUpdate->status == 'Active') {
            return redirect()->back();
        }
        if ($amount > $memUpdate->p2p_wallet) {
            session()->flash('FailedMsg', 'Not enough balance. Please add funds to fund wallet');
            return redirect()->back();
        }
        if ($amount < 5500) {
            session()->flash('FailedMsg', 'Entered value is not allowed.');
            return redirect()->back();
        }

        if (!Hash::check($txn_password, $memUpdate->txn_password)) {
            session()->flash('FailedMsg', 'Entered transaction password does not match.');
            return redirect()->back();
        }


        $memberid = $memUpdate->memberid;
        $name = $memUpdate->name;
        $sponsorid = $memUpdate->sponsorid;
        $memUpdate->status = 'Active';
        $memUpdate->package = $amount;
        $memUpdate->self_biz += $value;
        $memUpdate->team_biz += $value;
        $memUpdate->rank = $rank;
        $memUpdate->activated_at = date('Y-m-d H:i:s');
        $p2p_wallet = $memUpdate->p2p_wallet;
        $memUpdate->p2p_wallet -= $amount;
        $memUpdate->save();

        walletTransfer($memberid, $amount, 'credit', $p2p_wallet, 'Account Activation', 'Member ' . $memberid . ' Account Activation ' . $value . ' $ deducted from p2p wallet');

        $var = new PackageDetail();
        $var->txn_date = date('Y-m-d H:i:s');
        $var->activation_date = date('Y-m-d H:i:s');
        $var->order_id = "OD" . time();
        $var->package_type = 'Activation';
        $var->memberid = $memberid;
        $var->package = $rank;
        $var->package_value = $amount;
        $var->txnid = time();
        $var->payment_mode = 'P2p Wallet';
        // $var->image = 'NA';
        $var->status = 'Accepted';
        $var->save();


        $qry = new RewardIncome();
        $qry->memberid = $memberid;
        $qry->package = $amount;
        $qry->rate = 1;
        $qry->amount = $value / 100 * 1;
        $qry->paid_amount = 0;
        $qry->total_amount = $value * 2;
        $qry->installments = 0;
        $qry->save();

        updateDownline($sponsorid);
        updateUpline($sponsorid, $memberid);
        // team_biz_update($sponsorid, $value);
        totallevelIncome($sponsorid, $memberid, $name, $value, $type);

        session()->flash('ActiveMsg', 'Your account has been activated successfully.');
        return redirect()->back();
    }

    // public function memberActivate(Request $request)
    // {
    //     $request->validate([
    //         'memberid' => 'required',
    //         'amount' => 'required',
    //         'package' => 'required',
    //         'txn_password' => 'required'

    //     ]);

    //     $value =  $request->post('amount');
    //     $memberid = $request->post('memberid');
    //     $package = $request->post('package');
    //     $txn_password = $request->post('txn_password');
    //     $type = 'Activation';

    //     $myid = MemberDetail::find(session('USER_ID'));
    //     $p2pwallet = $myid->p2p_wallet;
    //     //p2p wallet balance validation
    //     if ($p2pwallet < $value) {
    //         session()->flash('FailedMsg', 'You do not have enough balance to activate account.');
    //         return redirect()->back();
    //     }
    //     if ($value < 0) {
    //         session()->flash('FailedMsg', 'Negative value is not allowed.');
    //         return redirect()->back();
    //     }
    //     if ($value < 20) {
    //         session()->flash('FailedMsg', 'Package amount must be greater than $100');
    //         return redirect()->back();
    //     }

    //     //Transaction password validation
    //     if (Hash::check($txn_password, $myid->txn_password)) {
    //         $memUpdate = MemberDetail::where('memberid', $memberid)->first();
    //         if ($memUpdate->statu == 'Active') {
    //             session()->flash('FailedMsg', 'This memberid is already active.');
    //             return redirect()->back();
    //         }
    //         $memberid = $memUpdate->memberid;
    //         $name = $memUpdate->name;
    //         $sponsorid = $memUpdate->sponsorid;
    //         $memUpdate->status = 'Active';
    //         $memUpdate->package = $value;
    //         $memUpdate->wallet += $value;
    //         // $memUpdate->self_biz += $value;
    //         // $memUpdate->team_biz += $value;
    //         $memUpdate->rank = $package;
    //         $memUpdate->activated_at = date('Y-m-d H:i:s');
    //         $memUpdate->save();

    //         $var = new PackageDetail();
    //         $var->txn_date = date('Y-m-d H:i:s');
    //         $var->activation_date = date('Y-m-d H:i:s');
    //         $var->order_id = "OD" . time();
    //         $var->package_type = 'Activation';
    //         $var->memberid = $memberid;
    //         $var->package = $package;
    //         $var->package_value = $value;
    //         $var->txnid = time();
    //         $var->payment_mode = 'P2p Wallet';
    //         // $var->image = 'NA';
    //         $var->status = 'Accepted';
    //         $var->save();

    //         $rate = getRate($value);
    //     $int_amount = $value / 100 * $rate;
    //     $qry = new TotalRoiIncome();
    //     $qry->memberid = $memberid;
    //     $qry->package = $value;
    //     $qry->rate = $rate;
    //     $qry->amount = $int_amount;
    //     $qry->paid_amount = 0;
    //     $qry->total_amount = $value * 3;
    //     $qry->installments = ($value * 3) / $int_amount;
    //     $qry->save();

    //         $act_memberid = $myid['memberid'];
    //         $p2p_wallet = $myid->p2p_wallet;
    //         $myid->p2p_wallet -= $value;
    //         $myid->save();

    //         walletTransfer($act_memberid, $value, 'credit', $p2p_wallet, 'P2P Fund Transfer', 'Member ' . $memberid . ' Account Activation ' . $value . ' $ deducted from p2p wallet');

    //         // updateDownline($sponsorid);
    //         // updateUpline($sponsorid, $memberid);
    //         // team_biz_update($sponsorid, $value);
    //         // directIncome($sponsorid, $memberid, $name, $value, 'Activation');

    //         session()->flash('ActiveMsg', 'Member account has been activated successfully.');
    //         return redirect()->back();
    //     } else {
    //         session()->flash('FailedMsg', 'Entered Transaction Password donot match.');
    //         return redirect()->back();
    //     }
    // }

    // public function upgradeUser(Request $request)
    // {
    //     $request->validate([
    //         'memberid' => 'required',
    //         'amount' => 'required',
    //         'txn_password' => 'required'
    //     ]);

    //     $id = $request->post('memberid');
    //     $amount = $request->post('amount');
    //     $txn_password = $request->post('txn_password');
    //     $type = 'Upgrade';
    //     $rank = getPackage($amount);
    //     if ($amount == 5500) {
    //         $value = 5000;
    //     } else {
    //         $value = 10000;
    //     }

    //     $memUpdate = MemberDetail::where('memberid', $id)->first();
    //     // Memberid status and existence validation

    //     if ($amount > $memUpdate->p2p_wallet) {
    //         session()->flash('FailedMsg', 'Not enough balance. Please add funds to fund wallet');
    //         return redirect()->back();
    //     }
    //     if ($amount < 5500) {
    //         session()->flash('FailedMsg', 'Invalid value is not allowed.');
    //         return redirect()->back();
    //     }
    //     if (!Hash::check($txn_password, $memUpdate->txn_password)) {
    //         session()->flash('FailedMsg', 'Entered transaction password does not match.');
    //         return redirect()->back();
    //     }

    //     $memberid = $memUpdate->memberid;
    //     $name = $memUpdate->name;
    //     $sponsorid = $memUpdate->sponsorid;
    //     $memUpdate->status = 'Active';
    //     $memUpdate->package = $amount;
    //     $memUpdate->self_biz += $value;
    //     $memUpdate->team_biz += $value;
    //     $memUpdate->rank = $rank;
    //     $p2p_wallet = $memUpdate->p2p_wallet;
    //     $memUpdate->p2p_wallet -= $amount;
    //     $memUpdate->save();

    //     walletTransfer($memberid, $amount, 'credit', $p2p_wallet, 'Account Upgrade', 'Member ' . $memberid . ' Account Upgrade ' . $value . ' $ deducted from p2p wallet');

    //     $var = new PackageDetail();
    //     $var->txn_date = date('Y-m-d H:i:s');
    //     $var->activation_date = date('Y-m-d H:i:s');
    //     $var->order_id = "OD" . time();
    //     $var->package_type = 'Upgrade';
    //     $var->memberid = $memberid;
    //     $var->package_value = $amount;
    //     $var->txnid = time();
    //     $var->payment_mode = 'P2p Wallet';
    //     // $var->image = 'NA';
    //     $var->status = 'Accepted';
    //     $var->save();


    //     $qry = new TotalRoiIncome();
    //     $qry->memberid = $memberid;
    //     $qry->package = $amount;
    //     $qry->rate = 1;
    //     if ($amount == 5500) {
    //         $qry->amount = 50;
    //         $qry->total_amount = 10000;
    //     } else {
    //         $qry->amount = 100;
    //         $qry->total_amount = 20000;
    //     }

    //     $qry->paid_amount = 0;
    //     $qry->installments = 0;
    //     $qry->save();

    //     team_biz_update($sponsorid, $value);
    //     levelIncome($sponsorid, $memberid, $name, $value, $type);

    //     session()->flash('ActiveMsg', 'Your account has been upgraded successfully.');
    //     return redirect()->back();
    // }


    //admin function of activations

    public function mActivation()
    {
        $result['data'] = MemberDetail::where('status', 'Temp')->get();
        return view('admin.member-activation')->with($result);
    }

    // public function activateMemberAdm($memberid, $amount)
    // {
    //     $mdata = MemberDetail::where('memberid', $memberid)->first();
    //     $memberid = $mdata->memberid;
    //     $name = $mdata->name;
    //     $sponsorid = $mdata->sponsorid;
    //     $package = $amount;
    //     $value = $amount / 11 * 10;
    //     $type = 'Activation';



    //     // Memberid status and existence validation
    //     if ($mdata->status == 'Active') {
    //         return redirect()->back();
    //     }


    //     $mdata->status = 'Active';
    //     $mdata->package = $package;
    //     $mdata->self_biz += $value;
    //     $mdata->team_biz += $value;
    //     if ($amount == 5500) {
    //         $mdata->rank = 'Basic';
    //     } else {
    //         $mdata->rank = 'Advance';
    //     }

    //     $mdata->activated_at = date('Y-m-d H:i:s');
    //     $mdata->save();

    //     $var = new PackageDetail();
    //     $var->txn_date = date('Y-m-d H:i:s');
    //     $var->activation_date = date('Y-m-d H:i:s');
    //     $var->order_id = "OD" . time();
    //     $var->package_type = 'Activation';
    //     $var->memberid = $memberid;
    //     $var->package = $package;
    //     $var->package_value = $amount;
    //     $var->txnid = time();
    //     $var->payment_mode = 'Admin';
    //     // $var->image = 'NA';
    //     $var->status = 'Accepted';
    //     $var->save();


    //     $qry = new TotalRoiIncome();
    //     $qry->memberid = $memberid;
    //     $qry->package = $package;
    //     $qry->rate = 1;
    //     $qry->amount = $value / 100 * 1;
    //     $qry->paid_amount = 0;
    //     $qry->total_amount = $value * 2;
    //     $qry->installments = 0;
    //     $qry->save();

    //     updateDownline($sponsorid);
    //     updateUpline($sponsorid, $memberid);
    //     team_biz_update($sponsorid, $value);
    //     levelIncome($sponsorid, $memberid, $name, $value, $type);

    //     session()->flash('ActiveMsg', 'Member account has been activated successfully.');
    //     return redirect()->back();
    // }

    public function mUpgrade()
    {
        return view('admin.member-upgrade');
    }

    // public function upgradeAccountAdm(Request $request)
    // {
    //     $request->validate([
    //         'memberid' => 'required',
    //         'amount' => 'required'
    //     ]);

    //     $memberid = $request->post('memberid');
    //     $amount = $request->post('amount');
    //     $type = 'Upgrade';
    //     if ($amount == 5500) {
    //         $value = 5000;
    //         $package = 'Basic';
    //     } else {
    //         $value = 10000;
    //         $package = 'Advance';
    //     }

    //     $memUpdate = MemberDetail::where('memberid', $memberid)->first();
    //     // Memberid status and existence validation

    //     if ($memUpdate->status == 'Temp') {
    //         session()->flash('failedMsg', 'Member account has been activated so far. Please first activate account');
    //         return redirect()->back();
    //     }

    //     $name = $memUpdate->name;
    //     $sponsorid = $memUpdate->sponsorid;
    //     $memUpdate->status = 'Active';
    //     $memUpdate->package = $amount;
    //     $memUpdate->self_biz += $value;
    //     $memUpdate->team_biz += $value;
    //     $memUpdate->rank = $package;
    //     $memUpdate->save();


    //     $var = new PackageDetail();
    //     $var->txn_date = date('Y-m-d H:i:s');
    //     $var->activation_date = date('Y-m-d H:i:s');
    //     $var->order_id = "OD" . time();
    //     $var->package_type = 'Upgrade';
    //     $var->memberid = $memberid;
    //     $var->package_value = $amount;
    //     $var->txnid = time();
    //     $var->payment_mode = 'Admin';
    //     // $var->image = 'NA';
    //     $var->status = 'Accepted';
    //     $var->save();


    //     $qry = new TotalRoiIncome();
    //     $qry->memberid = $memberid;
    //     $qry->package = $amount;
    //     $qry->rate = 1;
    //     if ($value == 5000) {
    //         $qry->amount = 50;
    //         $qry->total_amount = 10000;
    //     } else {
    //         $qry->amount = 100;
    //         $qry->total_amount = 20000;
    //     }

    //     $qry->paid_amount = 0;
    //     $qry->installments = 0;
    //     $qry->save();

    //     // team_biz_update($sponsorid, $value);
    //     // levelIncome($sponsorid, $memberid, $name, $value, $type);

    //     session()->flash('ActiveMsg', 'Member account has been upgraded successfully.');
    //     return redirect()->back();
    // }
}
