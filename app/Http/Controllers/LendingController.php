<?php

namespace App\Http\Controllers;

use App\Models\BreakData;
use App\Models\Deduction;
use App\Models\LendingDetail;
use App\Models\LendingIncome;
use App\Models\LendingMonthlyReturn;
use App\Models\MemberDetail;
use App\Models\MonthlyBiz;
use App\Models\RankRatio;
use App\Models\TetoLending;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

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
        return view('member.investments.lending-details')->with($result);
    }

    public function CoreLending(Request $request)
    {
        $request->validate([
            'amount' => 'required',
            'pin' => 'required',
        ]);

        $type = 'Core';
        $amount = $request->post('amount');
        $txn_password = $request->post('pin');
        $memberid = $request->post('memberid');
        $mdata = MemberDetail::where('memberid', $memberid)->first();
        $sponsorid = $mdata->sponsorid;
        if (!Hash::check($txn_password, $mdata->txn_password)) {
            session()->flash('failedMsg', 'PIN do not match. Please try again');
            return redirect()->back();
        }
        if ($amount < 100) {
            session()->flash('failedMsg', 'Minimum investment amount is $100.');
            return redirect()->back();
        }
        if ($amount % 100 != 0) {
            session()->flash('failedMsg', 'Amount must be multiple of $100');
            return redirect()->back();
        }
        if ($amount > $mdata->p2p_wallet) {
            session()->flash('failedMsg', 'You do not have enough amount in your wallet.');
            return redirect()->back();
        }

        if (date('Y-m-d H:i:s') > date('Y-m-d 23:40:00')) {
            $start_time = date('Y-m-d 23:40:00', strtotime('+1day'));
        } else {
            $start_time = date('Y-m-d H:i:s', strtotime('+1day'));
        }

        $qry = new LendingDetail();
        $qry->start_date = $start_time;
        $qry->memberid = $memberid;
        $qry->plan = $type;
        $qry->amount = $amount;
        $qry->total_duration = 0;
        $qry->interest = 10;
        $qry->lock_time = 0;
        $qry->close_date = null;
        $qry->status = 'Active';
        $qry->save();

        $wallet = $mdata->p2p_wallet;
        $mdata->p2p_wallet -= $amount;
        $mdata->team_invest += $amount;
        $mdata->self_invest += $amount;
        $mdata->monthly_invest += $amount;
        $mdata->save();
        walletTransfer($memberid, $amount, 'credit', $wallet, '' . $type . 'Lending Created', 'Lending amount deducted from wallet');
        team_invest_update($sponsorid, $amount);
        monthly_invest_update($sponsorid, $amount);
        pl_downline_update($memberid);

        session()->flash('successMsg', 'Core Lending created successfully.');
        return redirect()->back();
    }

    public function LimeLending(Request $request)
    {
        $request->validate([
            'amount' => 'required',
            'pin' => 'required',
        ]);

        $type = 'Lime';
        $amount = $request->post('amount');
        $txn_password = $request->post('pin');
        $memberid = $request->post('memberid');
        $mdata = MemberDetail::where('memberid', $memberid)->first();
        $sponsorid = $mdata->sponsorid;
        if (!Hash::check($txn_password, $mdata->txn_password)) {
            session()->flash('failedMsg', 'PIN do not match. Please try again');
            return redirect()->back();
        }
        if ($amount < 200) {
            session()->flash('failedMsg', 'Minimum investment amount is $200.');
            return redirect()->back();
        }
        if ($amount % 200 != 0) {
            session()->flash('failedMsg', 'Amount must be multiple of $200');
            return redirect()->back();
        }
        if ($amount > $mdata->p2p_wallet) {
            session()->flash('failedMsg', 'You do not have enough amount in your wallet.');
            return redirect()->back();
        }

        if (date('Y-m-d H:i:s') > date('Y-m-d 23:40:00')) {
            $start_time = date('Y-m-d 23:40:00', strtotime('+1day'));
        } else {
            $start_time = date('Y-m-d H:i:s', strtotime('+1day'));
        }

        $qry = new LendingDetail();
        $qry->start_date = $start_time;
        $qry->memberid = $memberid;
        $qry->plan = $type;
        $qry->amount = $amount;
        $qry->total_duration = 0;
        $qry->interest = 10;
        $qry->lock_time = 6;
        $qry->close_date = date('Y-m-d H:i:s', strtotime($qry->start_date . '+180 days'));
        ;
        $qry->status = 'Active';
        $qry->save();

        $wallet = $mdata->p2p_wallet;
        $mdata->p2p_wallet -= $amount;
        $mdata->team_invest += $amount;
        $mdata->self_invest += $amount;
        $mdata->monthly_invest += $amount;
        $mdata->save();
        walletTransfer($memberid, $amount, 'credit', $wallet, '' . $type . 'Lending Created', 'Lending amount deducted from wallet');
        team_invest_update($sponsorid, $amount);
        monthly_invest_update($sponsorid, $amount);
        pl_downline_update($memberid);

        session()->flash('successMsg', 'Lime Lending created successfully.');
        return redirect()->back();
    }

    public function DroidLending(Request $request)
    {
        $request->validate([
            'amount' => 'required',
            'pin' => 'required',
        ]);

        $type = 'Droid';
        $amount = $request->post('amount');
        $txn_password = $request->post('pin');
        $memberid = $request->post('memberid');
        $mdata = MemberDetail::where('memberid', $memberid)->first();
        $sponsorid = $mdata->sponsorid;
        if (!Hash::check($txn_password, $mdata->txn_password)) {
            session()->flash('failedMsg', 'PIN do not match. Please try again');
            return redirect()->back();
        }
        if ($amount < 300) {
            session()->flash('failedMsg', 'Minimum investment amount is $300.');
            return redirect()->back();
        }
        if ($amount % 300 != 0) {
            session()->flash('failedMsg', 'Amount must be multiple of $300');
            return redirect()->back();
        }
        if ($amount > $mdata->p2p_wallet) {
            session()->flash('failedMsg', 'You do not have enough amount in your wallet.');
            return redirect()->back();
        }

        if (date('Y-m-d H:i:s') > date('Y-m-d 23:40:00')) {
            $start_time = date('Y-m-d 23:40:00', strtotime('+1day'));
        } else {
            $start_time = date('Y-m-d H:i:s', strtotime('+1day'));
        }

        $qry = new LendingDetail();
        $qry->start_date = $start_time;
        $qry->memberid = $memberid;
        $qry->plan = $type;
        $qry->amount = $amount;
        $qry->total_duration = 0;
        $qry->interest = 10;
        $qry->lock_time = 12;
        $qry->close_date = date('Y-m-d H:i:s', strtotime($qry->start_date . '+360 days'));
        ;
        $qry->status = 'Active';
        $qry->save();

        $wallet = $mdata->p2p_wallet;
        $mdata->p2p_wallet -= $amount;
        $mdata->team_invest += $amount;
        $mdata->self_invest += $amount;
        $mdata->monthly_invest += $amount;
        $mdata->save();
        walletTransfer($memberid, $amount, 'credit', $wallet, '' . $type . 'Lending Created', 'Lending amount deducted from wallet');
        team_invest_update($sponsorid, $amount);
        monthly_invest_update($sponsorid, $amount);
        pl_downline_update($memberid);

        session()->flash('successMsg', 'Droid Lending created successfully.');
        return redirect()->back();
    }

    public function lendingIncomes()
    {
        $result['data'] = MemberDetail::find(session('USER_ID'));
        $memberid = $result['data']['memberid'];
        $result['lendata'] = LendingIncome::where([['memberid', $memberid], ['status', 'Paid']])->orderBy('id', 'desc')->get();
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
            $result['first_biz'] = $result['first']['monthly_invest'];
            $result['rest_biz'] = MemberDetail::where([['sponsorid', $memberid], ['memberid', '!=', $first_memb]])->sum('monthly_invest');
        } else {
            $result['first_biz'] = 0;
            $result['rest_biz'] = 0;
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

    public function memCoreLending()
    {
    }

    public function memLimeLending()
    {
    }

    public function memDroidLending()
    {
    }

    public function InvestBreak()
    {
        $result['data'] = MemberDetail::find(session('USER_ID'));
        $memberid = $result['data']['memberid'];
        $result['lendata'] = LendingDetail::where([['memberid', $memberid], ['status', 'Active'], ['plan', 'Core']])
            ->get()
            ->filter(fn($lending) => $this->canBreakLending($lending))
            ->values();
        $result['Limedata'] = LendingDetail::where([['memberid', $memberid], ['status', 'Active'], ['plan', 'Lime']])
            ->get()
            ->filter(fn($lending) => $this->canBreakLending($lending))
            ->values();
        $result['Droiddata'] = LendingDetail::where([['memberid', $memberid], ['status', 'Active'], ['plan', 'Droid']])
            ->get()
            ->filter(fn($lending) => $this->canBreakLending($lending))
            ->values();
        $result['breakdata'] = BreakData::where([['memberid', $memberid], ['status', '!=','Requested']])->get();
        $result['deduction'] = Deduction::find(1);
        return view('member.investments.investment-break')->with($result);
    }

    public function InvestLendBreak(Request $request, $id)
    {
        $result['data'] = MemberDetail::find(session('USER_ID'));
        $memberid = $result['data']['memberid'];
        $email = $result['data']['email'];
        $name = $result['data']['first_name'] . ' ' . $result['data']['last_name'];
        session()->forget('session_otp');
        if (!session()->has('session_brkotp')) {
            $otp = rand(100000, 999999);
            $request->session()->put('session_otp', $otp);
            if ($email != '') {
                $mailData = [
                    'name' => $name,
                    'email' => $email,
                    'memberid' => $memberid,
                    'otp' => $otp
                ];
                $user['to'] = $email;
                Mail::send('member.mails.break-otp', $mailData, function ($message) use ($user) {

                    $message->to($user['to']);
                    $message->subject('Liberfx Lending break OTP');
                });
            }
        }
        $result['lendData'] = LendingDetail::find($id);
        $created_at = $result['lendData']['created_at'];
        if(date('Y-m-d', strtotime($created_at)) == date('Y-m-d')){
            session()->flash('ErrorMsg', 'This lending is not available for break today.');
            return redirect()->to('/member/investment-break');
        }
        $result['ddata'] = Deduction::find(1);
        if (!$result['ddata'] || !$result['ddata']->lending_break_status || !$result['lendData'] || $result['lendData']->memberid != $memberid || !$this->canBreakLending($result['lendData'])) {
            session()->flash('ErrorMsg', 'This lending is not available for break today.');
            return redirect()->to('/member/investment-break');
        }
        return view('member.investments.lending-break-form')->with($result);
    }

    // public function LendingBroken(Request $request)
    // {
    //     $request->validate([
    //         'break_amount' => 'required|gt:0',
    //         'otp' => 'required',
    //         'identity_image' => 'required'
    //     ]);
    //     $id = $request->post('id');
    //     $break_amount = $request->post('break_amount');
    //     $otp = $request->post('otp');
    //     if ($break_amount < 0) {
    //         session()->flash('ErrorMsg', 'Invalid amount input');
    //         return redirect()->back();
    //     }
    //     if ($break_amount % 50 != 0) {
    //         session()->flash('ErrorMsg', 'Amount must be mutiple of $50');
    //         return redirect()->back();
    //     }

    //     $file = $request->file('identity_image');
    //     $extension = $file->getClientOriginalExtension();
    //     if ($extension != 'png' && $extension != 'jpeg' && $extension != 'jpg') {
    //         session()->flash('ErrorMsg', 'Plese upload valid image. Image must be png, jpg or jpeg type');
    //         return redirect()->back();
    //     }
    //     $var = LendingDetail::find($id);
    //     $memberid = $var->memberid;
    //     $interest = $var->interest;
    //     $invest = $var->amount;
    //     if ($otp != session()->get('session_brkotp')) {
    //         session()->flash('ErrorMsg', 'Entered OTP does not match. Please try again');
    //         return redirect()->back();
    //     }
    //     if ($break_amount > $invest) {
    //         session()->flash('ErrorMsg', 'Break Amount can not greater than Invest Amount');
    //         return redirect()->back();
    //     }
    //     $var->amount = $invest - $break_amount;
    //     $var->break_status = 'Broken';
    //     $var->break_amount += $break_amount;
    //     $var->broke_date = date('Y-m-d');
    //     if ($break_amount == $invest) {
    //         $var->status = 'Deactive';
    //     }
    //     $var->save();

    //     // $ded = Deduction::find(1);
    //     // $rate = $ded->break;
    //     // $net_rate = 100 - $rate;

    //     // $amount = $break_amount / 100 * $net_rate;
    //     // $mdata = MemberDetail::where('memberid', $memberid)->first();
    //     // $sponsorid = $mdata->sponsorid;
    //     // $wallet = $mdata->trade_wallet;
    //     // $mdata->trade_wallet += $amount;
    //     // $mdata->team_invest -= $break_amount;
    //     // $mdata->save();

    //     // if ($break_amount == $invest) {
    //     //     $sqry = LendingMonthlyReturn::where('invest_id', $id)->update(['status' => 'Deactive']);
    //     // } else {
    //     //     $newamount = ($invest - $break_amount) / 100 * $interest;
    //     //     $share = number_format($newamount / 30, 4);
    //     //     $sqry = LendingMonthlyReturn::where('invest_id', $id)->first();
    //     //     $sqry->share = $share;
    //     //     $sqry->save();
    //     // }

    //     $qry = new BreakData();
    //     $qry->memberid = $memberid;
    //     $qry->lending_id = $var->id;
    //     $qry->lending_type = $var->plan;
    //     $qry->investment_date = $var->start_date;
    //     $qry->investment = $var->amount + $var->break_amount;
    //     $qry->invested = $var->amount;
    //     $qry->break_amount = $break_amount;

    //     $filename = time() . 'idimg.' . $extension;
    //     $file->move(public_path('uploads/identity'), $filename);
    //     $qry->identity_image = $filename;
    //     $qry->save();

    //     // team_deinvest_update($sponsorid, $break_amount);
    //     // monthly_deinvest_update($sponsorid, $break_amount);
    //     // walletTransfer($memberid, $amount, 'debit', $wallet, 'Lending Break', 'Lending broke and amount added into main wallet');

    //     session()->flash('successMsg', 'Investment broken request has been created and amount will be added into wallet soon.');
    //     return redirect()->to('/member/investment-break');
    // }


    public function LendingBroken(Request $request)
    {
        $request->validate([
            'otp' => 'required',
            'identity_image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $id = $request->post('id');
        $otp = $request->post('otp');

        $mdata = MemberDetail::find(session('USER_ID'));
        if (!$mdata) {
            session()->flash('ErrorMsg', 'Invalid member session. Please login again.');
            return redirect()->back();
        }

        $var = LendingDetail::where([['id', $id], ['memberid', $mdata->memberid], ['status', 'Active']])->first();
        if (!$var) {
            session()->flash('ErrorMsg', 'Invalid lending selected.');
            return redirect()->back();
        }

        $deduction = Deduction::find(1);
        if (!$deduction || !$deduction->lending_break_status) {
            session()->flash('ErrorMsg', 'Lending break is disabled right now.');
            return redirect()->back();
        }

        $breakWindow = $this->getLendingBreakWindow($var);
        if (!$breakWindow['allowed']) {
            session()->flash('ErrorMsg', 'This lending can be broken on ' . $breakWindow['next_date'] . '.');
            return redirect()->back();
        }

        $memberid = $var->memberid;
        $investment = $var->amount;
        $deductionRate = $deduction->break;
        $deduction_amount = $investment * $deductionRate / 100;
        $amount = $investment - $deduction_amount;

        if ($otp != session()->get('session_brkotp')) {
            session()->flash('ErrorMsg', 'Entered OTP does not match. Please try again');
            return redirect()->back();
        }
       
        $var->break_status = 'Requested';
        $var->break_amount += $amount;
        $var->deduction = $deduction_amount;
        $var->broke_date = $this->getLendingInvestDate($var)->format('Y-m-d');
        $var->save();

        $qry = new BreakData();
        $qry->memberid = $memberid;
        $qry->lending_id = $var->id;
        $qry->lending_type = $var->plan;
        $qry->investment_date = $this->getLendingInvestDate($var)->format('Y-m-d');
        $qry->investment = $investment;
        $qry->break_amount = $amount;
        $qry->deduction = $deduction_amount;
        if ($request->hasfile('identity_image')) {
            $file = $request->file('identity_image');
            $extension = $file->getClientOriginalExtension();
            if ($extension != 'png' && $extension != 'jpg' && $extension != 'jpeg') {
                session()->flash('failedMsg', 'Allowed image type is jpg, jpeg, png. Please change image type');
                return redirect()->back();
            }
            $filename = 'IMG'.time() . '.' . $extension;
            $file->move(public_path('uploads'), $filename);
            $qry->identity_image = $filename;
        }
        $qry->status = 'Requested';
        $qry->save();
        session()->forget('session_brkotp');

        session()->flash('successMsg', 'Investment broken request has been created and amount will be added into wallet soon.');
        return redirect()->to('/member/investment-break');
    }

    private function canBreakLending($lending)
    {
        return $this->getLendingBreakWindow($lending)['allowed'];
    }

    private function getLendingBreakWindow($lending)
    {
        $today = Carbon::today();
        $investDate = $this->getLendingInvestDate($lending);

        if ($today->lt($investDate)) {
            return [
                'allowed' => false,
                'next_date' => $investDate->format('d-m-Y'),
            ];
        }

        if ($lending->plan == 'Core') {
            $allowed = $today->day == $investDate->day;

            return [
                'allowed' => $allowed,
                'next_date' => ($allowed ? $today : $this->nextSameDayOfMonth($investDate, $today))->format('d-m-Y'),
            ];
        }

        if ($lending->plan == 'Lime' || $lending->plan == 'Droid') {
            $windowStart = $investDate->copy();
            $windowEnd = $windowStart->copy()->addDays(6);

            while ($today->gt($windowEnd)) {
                $windowStart->addMonthsNoOverflow(6);
                $windowEnd = $windowStart->copy()->addDays(6);
            }

            return [
                'allowed' => $today->gte($windowStart) && $today->lte($windowEnd),
                'next_date' => $windowStart->format('d-m-Y') . ' to ' . $windowEnd->format('d-m-Y'),
            ];
        }

        return [
            'allowed' => false,
            'next_date' => '-',
        ];
    }

    private function getLendingInvestDate($lending)
    {
        return Carbon::parse($lending->created_at ?: $lending->start_date)->startOfDay();
    }

    private function nextSameDayOfMonth(Carbon $investDate, Carbon $today)
    {
        $year = $today->year;
        $month = $today->month;
        $day = $investDate->day;

        while (true) {
            $candidate = Carbon::create($year, $month, 1)->startOfDay();
            if ($day <= $candidate->daysInMonth) {
                $candidate->day($day);
                if ($candidate->gte($today)) {
                    return $candidate;
                }
            }

            $candidate->addMonthNoOverflow();
            $year = $candidate->year;
            $month = $candidate->month;
        }
    }

    public function breakOtpSend($memberid)
    {
        $result['data'] = MemberDetail::where('memberid', $memberid)->first();

        $email = $result['data']['email'];
        $name = $result['data']['first_name'] . ' ' . $result['data']['last_name'];
        session()->forget('session_otp');
        $otp = rand(100000, 999999);
        session()->put('session_brkotp', $otp);
        if ($email != '') {
            $mailData = [
                'name' => $name,
                'email' => $email,
                'memberid' => $memberid,
                'otp' => $otp
            ];
            $user['to'] = $email;
            Mail::send('member.mails.break-otp', $mailData, function ($message) use ($user) {

                $message->to($user['to']);
                $message->subject('Liberfx Lending break OTP');
            });
        }
        session()->flash('successMsg', 'OTP has been sent to your registered email.');
        return redirect()->back();
    }

    public function newBreakReq()
    {
        $result['breakData'] = BreakData::where('status', 'Requested')->get();
        return view('admin.lending-break.new-break-req')->with($result);
    }

    public function appBreakReq()
    {
        $result['breakData'] = BreakData::where('status', 'Approved')->get();
        return view('admin.lending-break.app-break-req')->with($result);
    }

    public function rejBreakReq()
    {
        $result['breakData'] = BreakData::where('status', 'Rejected')->get();
        return view('admin.lending-break.rej-break-req')->with($result);
    }

    public function viewImage($id)
    {
        $result['breakData'] = BreakData::where('id', $id)->first();
        return view('admin.lending-break.view-image')->with($result);
    }

    public function statusApproReq($id)
    {
        $qry = BreakData::find($id);
        $break_amount = $qry->break_amount;
        $memberid = $qry->memberid;
        $invest = $qry->investment;
        $lendingid = $qry->lending_id;

        $qry->status = 'Approved';
        $qry->save();

        $var = LendingDetail::find($lendingid);
        $interest = $var->interest;
        $var->status = 'Deactive';
        $var->break_status = 'Approved';
        $var->save();

        $ded = Deduction::find(1);
        $rate = $ded->break;
        $net_rate = 100 - $rate;

        $amount = $break_amount / 100 * $net_rate;
        $mdata = MemberDetail::where('memberid', $memberid)->first();
        $sponsorid = $mdata->sponsorid;
        $wallet = $mdata->lending_wallet;
        $mdata->lending_wallet += $amount;
        $mdata->team_invest -= $break_amount;
        $mdata->save();

        if ($break_amount == $invest) {
            $sqry = LendingMonthlyReturn::where('invest_id', $lendingid)->update(['status' => 'Deactive','type'=>'Break']);
        } else {
            $newamount = ($invest - $break_amount) / 100 * $interest;
            $share = number_format(($newamount / 30), 4);
            $sqry = LendingMonthlyReturn::where('invest_id', $lendingid)->first();
            $sqry->share = $share;
            $sqry->save();
        }

        team_deinvest_update($sponsorid, $break_amount);
        monthly_deinvest_update($sponsorid, $break_amount);
        walletTransfer($memberid, $amount, 'debit', $wallet, 'Lending Break', 'Lending broke and amount added into main wallet');

        session()->flash('successMsg', 'Investment has been broken and amount added into wallet successfully.');
        return redirect()->back();
    }

    public function statusRejectReq($id)
    {
        $qry = BreakData::find($id);
        $break_amount = $qry->break_amount;
        $deduction = $qry->deduction;
        $memberid = $qry->memberid;
        $invest = $qry->investment;
        $lendingid = $qry->lending_id;

        $var = LendingDetail::find($lendingid);
        $var->deduction -= $deduction;
        $var->break_status = 'Active';
        $var->break_amount -= $break_amount;
        $var->broke_date = date('Y-m-d');
        if ($break_amount == $invest) {
            $var->status = 'Active';
        }
        $var->save();

        $qry->status = 'Rejected';
        $qry->save();

        session()->flash('successMsg', 'Investment broken request has been rejected successfully.');
        return redirect()->back();
    }
}
