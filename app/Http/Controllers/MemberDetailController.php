<?php

namespace App\Http\Controllers;

use App\Models\AchiversImages;
use App\Models\Country;
use App\Models\MemberDetail;
use App\Models\UplineMember;
use App\Models\ConvertPrize;
use App\Models\CopyAccount;
use App\Models\CopyTrade;
use App\Models\DashVideo;
use App\Models\FakeDatas;
use App\Models\DashMessage;
use App\Models\FundRequestStat;
use App\Models\ManualWithdrawalHistory;
use App\Models\ImportFund;
use App\Models\LendingDetail;
use App\Models\TableFundRequest;
use App\Models\UserAsset;
use App\Models\NewsData;
use App\Models\UserOrder;
use App\Models\WelcomeImages;
use App\Models\WithdrawalRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class MemberDetailController extends Controller
{
    public function index()
    {
        if (session()->has('USER_LOGIN')) {
            return redirect('member/dashboard');
        } else {
            $str1 = rand(1, 15);
            $str2 = rand(1, 15);

            session()->put('str1', $str1);
            session()->put('str2', $str2);

            return view('member.signin');
        }
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'login-captcha' => 'required'
        ]);
        $email = $request->post('email');
        $password = $request->post('password');

        $captcha = $request->post('login-captcha');

        $str1 = session('str1');
        $str2 = session('str2');
        $total = $str1 + $str2;
        if ($total != $captcha) {
            session()->flash('loginmsg', 'Invalid captcha input');
            return redirect('/member');
        } else {
            session()->forget(['str1', 'str2']);
        }

        $result = MemberDetail::where('email', $email)->first();
        if ($result) {
            $Hashpass = $result['password'];
            if (Hash::check($password, $Hashpass)) {
                if ($result->status == 'Temp' || $result->status == 'Active' || $result->status == 'Deactive') {
                    session()->flash('model', 'model');
                    $request->session()->put('USER_LOGIN', true);
                    $request->session()->put('USER_ID', $result->id);
                    return redirect('member/exchange-type');
                } else {
                    session()->flash('loginmsg', 'Your account is Blocked. Please contact admin');
                    return redirect('/member');
                }
            } else {
                session()->flash('loginmsg', 'Please enter valid Password to login.');
                return redirect('/member');
            }
        } else {
            session()->flash('loginmsg', 'Please enter valid Emailid to login');
            return redirect('/member');
        }
    }

    public function deleteModel($model)
    {
        session()->forget($model);
        return redirect()->back();
    }

    public function dashboard(Request $request)
    {
        $id = session('USER_ID');
        $result['data'] = MemberDetail::find($id);
        // $result['images'] = AchiversImages::orderby('rank', 'asc')->get();
        $result['memdirects'] = MemberDetail::where('sponsorid', $result['data']['memberid'])->get();
        $result['dashMsg'] = DashMessage::orderby('rank', 'asc')->get();
        $result['assets_data'] = UserAsset::where('memberid', $result['data']['memberid'])->get();
        $result['first_image'] = WelcomeImages::orderby('created_at', 'asc')->first();
        $result['Fdata'] = FakeDatas::where('memberid', $result['data']['memberid'])->first() ?? new FakeDatas();
        $result['dashVideos'] = session()->has('ADMIN_LOGIN')
            ? collect()
            : DashVideo::active()
                ->latest()
                ->get()
                ->filter(fn (DashVideo $dashVideo) => File::isFile(
                    public_path('uploads/dash-videos/' . basename($dashVideo->video))
                ))
                ->values();

        return view('member.dashboard')->with($result);
    }

   public function courseDash(Request $request)
    {
        $id = session('USER_ID');
        $result['data'] = MemberDetail::find($id);
        $result['memdirects'] = MemberDetail::where('sponsorid', $result['data']['memberid'])->get();
        $result['Fdata'] = FakeDatas::where('memberid', $result['data']['memberid'])->first() ?? new FakeDatas();
        $result['dashVideos'] = session()->has('ADMIN_LOGIN')
            ? collect()
            : DashVideo::active()
                ->latest()
                ->get()
                ->filter(fn (DashVideo $dashVideo) => File::isFile(
                    public_path('uploads/dash-videos/' . basename($dashVideo->video))
                ))
                ->values();
        return view('member.course-dashboard')->with($result);
    }

    public function lendingDash(Request $request)
    {
        $id = session('USER_ID');
        $result['data'] = MemberDetail::find($id);
        $result['memdirects'] = MemberDetail::where('sponsorid', $result['data']['memberid'])->get();
        $result['Fdata'] = FakeDatas::where('memberid', $result['data']['memberid'])->first() ?? new FakeDatas();
        $result['dashMsg'] = DashMessage::orderby('rank', 'asc')->get();
        $result['lendata'] = LendingDetail::where([['memberid', $result['data']['memberid']], ['status', 'Active'], ['plan', '!=', 'Loyal']])->whereDate('close_date', '<', date('Y-m-d'))->get();
        $result['dashVideos'] = session()->has('ADMIN_LOGIN')
            ? collect()
            : DashVideo::active()
                ->latest()
                ->get()
                ->filter(fn (DashVideo $dashVideo) => File::isFile(
                    public_path('uploads/dash-videos/' . basename($dashVideo->video))
                ))
                ->values();
        return view('member.lending-dashboard')->with($result);
    }


    public function signup(Request $request, $id)
    {
        $data['sdata'] = $id;
        $data['countries'] = Country::all();
        return view('member.signup')->with($data);
    }

    public function register(Request $request)
    {
        $request->validate([
            'sponsor' => 'required|exists:member_details,memberid',
            'first_name' => 'required',
            'last_name' => 'required',
            'country' => 'required',
            'email' => 'required|email|unique:member_details,email',
            'password' => 'required',
            'mobile' => 'required|min:10|max:10',
        ]);
        $email = $request->post('email');
        $checkemail = MemberDetail::where('email', $email)->first();
        if ($checkemail) {
            session()->flash('signupmsg', 'This email is already registered. Please try changing email');
            return redirect()->back();
        }
        $sponsorid = strtoupper($request->post('sponsor'));
        $country = Country::where('name', $request->post('country'))->first();
        $phone_code = $country->phonecode;
        $spon = MemberDetail::where('memberid', $sponsorid)->first();
        if ($spon['status'] != 'Active') {
            session()->flash('signupmsg', 'This sponsor is not Active. Please change Sponsor id');
            return redirect()->back();
        } else {
            $var  = new MemberDetail;
            $var->memberid = userId();
            $var->sponsorid = $sponsorid;
            $var->first_name = $request->post('first_name');
            $var->last_name = $request->post('last_name');
            $var->email = $request->post('email');
            $var->mobile = $phone_code . ' ' . $request->post('mobile');
            $password = $request->post('password');
            $var->password = Hash::make($password);
            $var->country = $request->post('country');
            $txn_password = rand(1000, 9999);
            $var->txn_password = Hash::make($txn_password);
            $var->save();
            $userid = $var->memberid;
            $email = $var->email;
            $name = $var->first_name . ' ' . $var->last_name;

            updateUpline($sponsorid, $userid);
            updateDownline($sponsorid);

            if ($email != '') {
                $mailData = [
                    'name' => $name,
                    'email' => $email,
                    'mobile' => $var->mobile,
                    'userid' => $userid,
                    'password' => $password,
                    'txn_password' => $txn_password
                ];
                $user['to'] = $email;
                Mail::send('member.mails.register-mail', $mailData, function ($message) use ($user) {

                    $message->to($user['to']);
                    $message->subject('Liberfx Registeration Mail');
                });
            }
            $request->session()->put('name', $name);
            $request->session()->put('userid', $userid);
            $request->session()->put('email', $email);
            $request->session()->put('mobile', $var->mobile);
            $request->session()->put('password', $password);
            $request->session()->put('txn_password', $txn_password);
            session()->flash('account', 'Account has been created Successfully!.');
            return redirect('member/account-created');
        }
    }

    public function accountCreated()
    {
        return view('member.account-created');
    }

    public function forgetPassword()
    {
        return view('member.forget-password');
    }

    public function retrivePassword(Request $request)
    {
        $memberid = $request->post('memberid');
        $data = MemberDetail::where('memberid', $memberid)->first();
        if ($data) {
            $name = $data['first_name'] . ' ' . $data['last_name'];
            $email = $data['email'];
            $password = rand(100000, 999999);
            $data->password = Hash::make($password);
            $data->save();

            $mailData = [
                'name' => $name,
                'email' => $email,
                'memberid' => $memberid,
                'password' => $password
            ];
            $user['to'] = $email;
            Mail::send('member.mails.forget-password-mail', $mailData, function ($message) use ($user) {

                $message->to($user['to']);
                $message->subject('Liberfx Member Account Password');
            });
            session()->flash('forgetPass', 'Your Account Password has been sent to your registered email.');
            return redirect()->back();
        } else {
            session()->flash('forgetPassErr', 'Entered Memberid is not registered with us!');
            return redirect()->back();
        }
    }

    public function profile(Request $request)
    {
        $id = session('USER_ID');
        $result['data'] = MemberDetail::find($id);
        return view('member.profile.profile')->with($result);
    }

    public function security(Request $request)
    {
        $id = session('USER_ID');
        $result['data'] = MemberDetail::find($id);
        return view('member.profile.security')->with($result);
    }

    public function kycdetails(Request $request)
    {
        $id = session('USER_ID');
        $result['data'] = MemberDetail::find($id);
        return view('member.profile.kyc-details')->with($result);
    }

    public function qrcode(Request $request)
    {
        $id = session('USER_ID');
        $result['data'] = MemberDetail::find($id);
        return view('member.profile.qr-code')->with($result);
    }

    public function insertPdata(Request $request)
    {
        //print_r($request->post());

        $id = $request->post('id');
        $var = MemberDetail::find($id);
        if ($request->hasfile('profile_image')) {
            $file = $request->file('profile_image');
            $extension = $file->getClientOriginalExtension();
            if ($extension != 'png' && $extension != 'jpg' && $extension != 'jpeg') {
                session()->flash('failedMsg', 'Allowed image type is jpg, jpeg, png. Please change image type');
                return redirect()->back();
            }
            $filename = time() . '.' . $extension;
            $file->move(public_path('uploads'), $filename);
            $var->profile_image = $filename;
        }
        $var->save();

        session()->flash('successMsg', 'Profile Details have been updated');
        return redirect()->back();
    }

    public function updateKycData(Request $request)
    {

        $request->validate([
            'idproof_no' => 'required',
            'selfie' => 'required',
            'front_image' => 'required',
            'back_image' => 'required',
        ]);
        $id = $request->post('id');
        $id_no = $request->post('idproof_no');

        $var = MemberDetail::find($id);
        $var->id_no = $id_no;
        $file = $request->file('front_image');
        $extension = $file->getClientOriginalExtension();
        if ($extension != 'png' && $extension != 'jpg' && $extension != 'jpeg') {
            session()->flash('failedMsg', 'Allowed image type is jpg, jpeg, png. Please change image type');
            return redirect()->back();
        }
        $filename = time() . 'front.' . $extension;
        $file->move(public_path('uploads'), $filename);
        $var->front_image = $filename;
        if ($request->hasfile('back_image')) {
            $file = $request->file('back_image');
            $extension = $file->getClientOriginalExtension();
            if ($extension != 'png' && $extension != 'jpg' && $extension != 'jpeg') {
                session()->flash('failedMsg', 'Allowed image type is jpg, jpeg, png. Please change image type');
                return redirect()->back();
            }
            $filename = time() . 'back.' . $extension;
            $file->move(public_path('uploads'), $filename);
            $var->back_image = $filename;
        }
        if ($request->hasfile('selfie')) {
            $file = $request->file('selfie');
            $extension = $file->getClientOriginalExtension();
            if ($extension != 'png' && $extension != 'jpg' && $extension != 'jpeg') {
                session()->flash('failedMsg', 'Allowed image type is jpg, jpeg, png. Please change image type');
                return redirect()->back();
            }
            $filename = time() . 'selfie.' . $extension;
            $file->move(public_path('uploads'), $filename);
            $var->selfie_image = $filename;
        }
        $var->kyc_status = 'Submitted';
        $var->save();

        session()->flash('successMsg', 'KYC Details have been submitted successfully!');
        return redirect()->back();
    }

    public function qrCodeData(Request $request)
    {

        $request->validate([
            'usdt_wlt_address' => 'required',
            'usdt_qr' => 'required',
            'tron_qr' => 'required',
            'btc_qr' => 'required',
        ]);

        $id = $request->post('id');
        $var = MemberDetail::find($id);
        $var->usdt_wlt_address = $request->post('usdt_wlt_address');
        if ($request->hasfile('usdt_qr')) {
            $file = $request->file('usdt_qr');
            $extension = $file->getClientOriginalExtension();
            if ($extension != 'png' && $extension != 'jpg' && $extension != 'jpeg') {
                session()->flash('failedMsg', 'Allowed image type is jpg, jpeg, png. Please change image type');
                return redirect()->back();
            }
            $filename = time() . 'usdt_qr.' . $extension;
            $file->move(public_path('uploads/qr_code'), $filename);
            $var->usdt_qr = $filename;
        }
        if ($request->hasfile('tron_qr')) {
            $file = $request->file('tron_qr');
            $extension = $file->getClientOriginalExtension();
            if ($extension != 'png' && $extension != 'jpg' && $extension != 'jpeg') {
                session()->flash('failedMsg', 'Allowed image type is jpg, jpeg, png. Please change image type');
                return redirect()->back();
            }
            $filename = time() . 'tron_qr.' . $extension;
            $file->move(public_path('uploads/qr_code'), $filename);
            $var->tron_qr = $filename;
        }
        if ($request->hasfile('btc_qr')) {
            $file = $request->file('btc_qr');
            $extension = $file->getClientOriginalExtension();
            if ($extension != 'png' && $extension != 'jpg' && $extension != 'jpeg') {
                session()->flash('failedMsg', 'Allowed image type is jpg, jpeg, png. Please change image type');
                return redirect()->back();
            }
            $filename = time() . 'btc_qr.' . $extension;
            $file->move(public_path('uploads/qr_code'), $filename);
            $var->btc_qr = $filename;
        }
        $var->save();

        session()->flash('successMsg', 'QR Codes have been submitted successfully!');
        return redirect()->back();
    }

    public function otpTxnChange(Request $request)
    {
        $request->validate([
            'otp' => 'required|min:6|max:6',
        ]);

        $post_otp = $request->post('otp');
        $txnpassword = session()->get('txn-password');
        $otp = session()->get('txn_otp');

        if ($otp == $post_otp) {
            session()->forget('txn_otp');
            $var = MemberDetail::find(session('USER_ID'));
            $var->txn_password = Hash::make($txnpassword);
            $var->save();

            session()->flash('confirm_passSuccess', 'PIN has been changed successfully');
            return redirect()->back();
        } else {
            session()->flash('failedMsg', 'Entered OTP doesnot match. Please change OTP');
            return redirect()->back();
        }
    }

    public function txnChange(Request $request)
    {
        //print_r($request->post());
        $request->validate([
            'pin' => 'required|required_with:pin_confirmation|same:pin_confirmation',
        ]);

        $otp = rand(100000, 999999);
        session()->put('txn-password', $request->post('pin'));
        session()->put('txn_otp', $otp);
        $id = $request->post('id');
        $var = MemberDetail::find($id);
        $first_name = $var->first_name;
        $last_name = $var->last_name;
        $email = $var->email;
        $memberid = $var->memberid;

        if ($email != '') {
            $mailData = [
                'first_name' => $first_name,
                'last_name' => $last_name,
                'email' => $email,
                'memberid' => $memberid,
                'otp' => $otp,
            ];
            $user['to'] = $email;
            Mail::send('member.txn-otp', $mailData, function ($message) use ($user) {

                $message->to($user['to']);
                $message->subject('Liberfx Member Forget Txn Password OTP');
            });
        }

        session()->flash('confirm_passSuccess', 'OTP has been sent to your registered email successfully');
        return redirect()->back();
    }

    public function otpPassChange(Request $request)
    {
        $request->validate([
            'otp' => 'required|min:6|max:6',
        ]);

        $post_otp = $request->post('otp');
        $password = session()->get('password');
        $otp = session()->get('pass_otp');

        if ($otp == $post_otp) {
            session()->forget('pass_otp');
            $var = MemberDetail::find(session('USER_ID'));
            $var->password = Hash::make($password);
            $var->save();

            session()->flash('confirm_passSuccess', 'Password has been changed successfully');
            return redirect()->back();
        } else {
            session()->flash('failedMsg', 'Entered OTP doesnot match. Please change OTP');
            return redirect()->back();
        }
    }

    public function passChange(Request $request)
    {
        //print_r($request->post());
        $request->validate([
            'password' => 'required|required_with:password_confirmation|same:password_confirmation',
        ]);

        $otp = rand(100000, 999999);
        session()->put('password', $request->post('password'));
        session()->put('pass_otp', $otp);
        $id = $request->post('id');
        $var = MemberDetail::find($id);
        $first_name = $var->first_name;
        $last_name = $var->last_name;
        $email = $var->email;
        $memberid = $var->memberid;

        if ($email != '') {
            $mailData = [
                'first_name' => $first_name,
                'last_name' => $last_name,
                'email' => $email,
                'memberid' => $memberid,
                'otp' => $otp,
            ];
            $user['to'] = $email;
            Mail::send('member.pass-otp', $mailData, function ($message) use ($user) {

                $message->to($user['to']);
                $message->subject('Liberfx Member Forget Password OTP');
            });
        }

        session()->flash('confirm_passSuccess', 'OTP has been sent to your registered email successfully');
        return redirect()->back();
    }

    // public function mtxnChange(Request $request)
    // {
    //     $request->validate([
    //         'old_txnpassword' => 'required',
    //         'txnpassword' => 'required|required_with:password_confirmation|same:password_confirmation|min:6',
    //         'password_confirmation' => 'min:6'
    //     ]);

    //     $id = $request->post('id');
    //     $old = $request->post('old_txnpassword');
    //     $var = MemberDetail::find($id);
    //     if (Hash::check($old, $var['txn_password'])) {
    //         $var->txn_password = Hash::make($request->post('txnpassword'));
    //         $var->save();

    //         session()->flash('confirm_passSuccess', 'Transaction Password has been updated successfully');
    //         return redirect()->back();
    //     } else {
    //         session()->flash('confirm_passError', 'Old Transaction Password is not Correct');
    //         return redirect()->back();
    //     }
    // }

    // public function mpassChange(Request $request)
    // {
    //     $request->validate([
    //         'old_password' => 'required',
    //         'password' => 'required|required_with:password_confirmation|same:password_confirmation|min:6',
    //         'password_confirmation' => 'min:6'
    //     ]);

    //     $id = $request->post('id');
    //     $old = $request->post('old_password');
    //     $var = MemberDetail::find($id);
    //     if ((Hash::check($old, $var['password']))) {
    //         $var->password = Hash::make($request->post('password'));
    //         $var->save();

    //         session()->flash('confirm_pasSuccess', 'Password has been updated successfully');
    //         return redirect()->back();
    //     } else {
    //         session()->flash('confirm_pasError', 'Old Password is not Correct');
    //         return redirect()->back();
    //     }
    // }

    public function wallet(Request $request)
    {
        //CoinValue();
        $id = session('USER_ID');
        $result['data'] = MemberDetail::find($id);
        $memberid = $result['data']['memberid'];

        $withdrawals = WithdrawalRequest::where('memberid', $memberid)->get()->map(function ($request) {
            return [
                'source' => 'withdrawal',
                'request_id' => $request->request_id,
                'coin' => $request->coin,
                'wallet_address' => $request->wallet_address,
                'wallet_type' => $request->wallet_type,
                'usdt' => $request->usdt,
                'gross_amount' => $request->gross_amount,
                'service_charge' => $request->service_charge,
                'net_amount' => $request->net_amount,
                'status' => $request->status,
                'request_date' => $request->request_date,
                'payment_date' => $request->payment_date,
                'reason' => $request->reason ?? '',
            ];
        });

        $manualWithdrawals = ManualWithdrawalHistory::where('member_id', $memberid)->get()->map(function ($history) {
            return [
                'source' => 'manual',
                'request_id' =>  $history->request_id,
                'coin' => $history->coin ?? 'Manual',
                'wallet_address' => $history->wallet_address,
                'wallet_type' => $history->wallet_type,
                'usdt' => $history->usdt,
                'gross_amount' => $history->gross_amount,
                'service_charge' => $history->charges,
                'net_amount' => $history->net_amount,
                'status' => $history->status,
                'request_date' => $history->request_date,
                'payment_date' => $history->payment_date,
                'reason' => $history->remarks ?? '',
            ];
        });

        $result['wdata'] = $withdrawals->concat($manualWithdrawals)->sortByDesc('request_date')->values();
        $result['mdata'] = $manualWithdrawals;
        $result['coindata'] = ConvertPrize::find(1);
        return view('member.wallet.wallet')->with($result);
    }

    public function logout(Request $request)
    {
        $request->session()->forget('USER_LOGIN');
        $request->session()->forget('USER_ID');

        return redirect('/member');
    }
    
    public function showNews()
    {
        $result['data'] = MemberDetail::find(session('USER_ID'));
        $result['news_data'] = NewsData::orderBy('created_at', 'desc')->get();
        return view('member.news')->with($result);
    }

    public function orders()
    {
        $result['data'] = MemberDetail::find(session('USER_ID'));
        $memberid = $result['data']['memberid'];
        $result['open_data'] = UserOrder::where('memberid', $memberid)->whereDate('created_at', date('Y-m-d'))->get();
        $result['finish_data'] = UserOrder::where('memberid', $memberid)->whereDate('created_at', '!=', date('Y-m-d'))->get();
        return view('member.investments.orders')->with($result);
    }

    public function mt4Details()
    {
        $id = session('USER_ID');
        $result['data'] = MemberDetail::find($id);
        return view('member.profile.mt-4')->with($result);
    }

    public function mt4Reg(Request $request)
    {
        $request->validate([

            'mt4_account_no' => 'required',
            'mt-password' => 'required'
        ]);
        $id = $request->post('id');
        $accountno = $request->post('mt4_account_no');
        $password = $request->post('mt-password');

        $var = MemberDetail::find($id);
        $var->mt4_account_no = $accountno;
        $var->mt4_password = $password;
        $var->save();

        session()->flash('sucMsg', 'Your Details Have been submitted');
        return redirect()->back();
    }

    public function geneology()
    {

        $result['data'] = MemberDetail::find(session('USER_ID'));
        $memberid = $result['data']['memberid'];
        $result['directs'] = MemberDetail::where('sponsorid', $memberid)->get();
        return view('member.team.geneology')->with($result);
    }

    public function ViewGeneology($id)
    {
        $result['data'] = MemberDetail::find($id);
        $memberid = $result['data']['memberid'];
        $result['directs'] = MemberDetail::where('sponsorid', $memberid)->get();
        return view('member.team.view-geneology')->with($result);
    }

    public function directteam()
    {
        $result['data'] = MemberDetail::find(session('USER_ID'));
        $result['directData'] = MemberDetail::where('sponsorid', $result['data']['memberid'])->get();
        return view('member.team.direct-team')->with($result);
    }

    public function leveldetails(Request $request)
    {
        $id = session('USER_ID');
        $result['data'] = MemberDetail::find($id);
        return view('member.team.level-directs')->with($result);
    }

    public function lelMemDetails($level)
    {
        $uplines = 'upline_' . $level;
        $result['data'] = MemberDetail::find(session('USER_ID'));
        $memberid = $result['data']['memberid'];
        $ids = UplineMember::where($uplines, $memberid)->pluck('memberid');
        $result['users'] = MemberDetail::whereIn('memberid', $ids)->get();
        $result['levelNo'] = $level;
        return view('member.team.level-members-details')->with($result);
    }
    
    public function automaticFunds(Request $request)
    {
        $id = session('USER_ID');
        $result['data'] = MemberDetail::find($id);
        $result['addfundData'] = ImportFund::where([['memberid', $result['data']['memberid']], ['added_by', 'User']])->get();
        return view('member.automatic-funds')->with($result);
    }

    public function addfunds(Request $request)
    {
        $id = session('USER_ID');
        $result['data'] = MemberDetail::find($id);
        $result['addfundData'] = ImportFund::where([['memberid', $result['data']['memberid']], ['added_by', 'User'],['mode', 'Gateway']])->get();
        return view('member.add-funds')->with($result);
    }

    public function addFund(Request $request)
    {
        $request->validate([
            'amount' => 'required',
            'txnpass' => 'required'
        ]);

        $memberid = $request->post('memberid');
        $amount = $request->post('amount');
        $txnpass = $request->post('txnpass');

        $qry = MemberDetail::where('memberid', $memberid)->first();
        $txn_password = $qry->txn_password;
        if ($amount < 0) {
            session()->flash('ErrorMsg', 'Amount can not be in negative value.');
            return redirect()->back();
        }

        if (Hash::check($txnpass, $txn_password)) {
            $var = new ImportFund();
            $var->memberid = $memberid;
            $var->txnid = 'NA';
            $var->orderid = rand(10000, 99999);
            $var->amount = $amount;
            $var->type = 'Add';
            $var->mode = 'Online';
            $var->status = 'Approved';
            $var->save();

            session()->flash('PassMsg', 'Your Add Fund Request has been submitted.');
            return redirect()->back();
        } else {
            session()->flash('ErrorMsg', 'Your Transaction Password is not correct.');
            return redirect()->back();
        }
    }



    public function getSponname(Request $request)
    {
        $sponsorid = $request->post('sponsorid');
        if ($sponsorid != '') {
            $data = MemberDetail::where('memberid', $sponsorid)->first();
            if ($data) {

                if ($data['status'] == 'Temp') {
                    return response()->json([
                        'code' => 0,
                        'data' => '<span class="text-danger">This Sponsor Id is not active. Please change sponsor id</span>'
                    ]);
                } elseif ($data['status'] == 'Deactive') {
                    return response()->json([
                        'code' => 0,
                        'data' => '<span class="text-danger">This Sponsor Id is Deactive. Please change sponsor id</span>'
                    ]);
                } elseif ($data['status'] == 'Active') {
                    return response()->json([
                        'code' => 1,
                        'data' => '<span class="text-success">Sponsor Name : ' . $data['first_name'] . ' ' . $data['last_name'] . '</span>'
                    ]);
                }
            } else {
                return response()->json([
                    'code' => 1,
                    'data' => '<span class="text-danger">No Data Found with this Id</span>'
                ]);
            }
        } else {
            return response()->json([
                'code' => 1,
                'data' => ''
            ]);
        }
    }

    public function getMember(Request $request)
    {
        $memberid = $request->post('memberid');
        if ($memberid != '') {
            $data = MemberDetail::where('memberid', $memberid)->first();
            if ($data) {
                return response()->json([
                    'code' => 1,
                    'data' => '<span class="text-success">Member Name :' . $data['first_name'] . ' ' . $data['last_name'] . '</span>'
                ]);
            } else {
                return response()->json([
                    'code' => 0,
                    'data' => '<span class="text-danger">No Data Found with this Id</span>'
                ]);
            }
        } else {
            return response()->json([
                'code' => 0,
                'data' => ''
            ]);
        }
    }

    public function market(Request $request)
    {
        $id = session('USER_ID');
        $result['data'] = MemberDetail::find($id);
        return view('member.market')->with($result);
    }

    public function insertAccount(Request $request)
    {
        $request->validate([
            'memberid' => 'required',
            'broker_name' => 'required',
            'server_name' => 'required',
            'account_no' => 'required|unique:copy_accounts,account_no',
            'password' => 'required'
        ]);

        $memberid = $request->post('memberid');
        $accountno = $request->post('account_no');
        $check = CopyAccount::where('memberid', $memberid)->first();
        if ($check) {
            session()->flash('failedMsg', 'You are already inserted account details');
            return redirect()->back();
        }
        $check2 = CopyAccount::where('account_no', $accountno)->first();
        if ($check2) {
            session()->flash('failedMsg', 'This account details is already inserted');
            return redirect()->back();
        }

        $var = new CopyAccount();
        $var->memberid = $memberid;
        $var->broker_name =  $request->post('broker_name');
        $var->server_name =  $request->post('server_name');
        $var->account_no = $request->post('account_no');
        $var->password = $request->post('password');
        $var->save();

        session()->flash('successMsg', 'Your details inserted successfully');
        return redirect()->back();
    }

    public function accountDetails(Request $request)
    {
        $id = session('USER_ID');
        $result['data'] = MemberDetail::find($id);
        $result['accountData'] = CopyAccount::where('memberid', $result['data']['memberid'])->first();
        return view('member.copyTrade.account-details')->with($result);
    }

    public function tradingDetails(Request $request)
    {
        $id = session('USER_ID');
        $result['data'] = MemberDetail::find($id);
        $result['copyData'] = CopyTrade::where('memberid', $result['data']['memberid'])->get();
        return view('member.copyTrade.trading-details')->with($result);
    }

    public function weeklyDetails(Request $request)
    {
        $id = session('USER_ID');
        $result['data'] = MemberDetail::find($id);
        return view('member.copyTrade.weekly-details')->with($result);
    }
}
