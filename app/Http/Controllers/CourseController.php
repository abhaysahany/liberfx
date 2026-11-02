<?php

namespace App\Http\Controllers;

use App\Models\CourseData;
use App\Models\CourseDetail;
use App\Models\MemberDetail;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CourseController extends Controller
{

    public function voxaCourse()
    {
        $id = session('USER_ID');
        $result['data'] = MemberDetail::find($id);
        $result['courses'] = CourseData::all();
        return view('member.course.voxa-course')->with($result);
    }

    public function courseBuy($cid)
    {
        $id = session('USER_ID');
        $result['data'] = MemberDetail::find($id);
        $result['cData'] = CourseData::find($cid);
        return view('member.course.course-buy')->with($result);
    }

    public function buyCourse(Request $request)
    {
        $cid = $request->post('cid');
        $otp = $request->post('otp');
        $pro_otp = session()->get('prootp');
        if ($otp == '') {
            return response()->json([
                'code' => 0,
                'message' => 'OTP required'
            ]);
        }
        if ($otp != $pro_otp) {
            return response()->json([
                'code' => 0,
                'message' => 'Entered OTP does not match'
            ]);
        } else {
            session()->forget('prootp');
        }
        if ($cid == 1) {
            $intrest = 5;
        } elseif ($cid == 2) {
            $intrest = 6;
        } elseif ($cid == 3) {
            $intrest = 7;
        } elseif ($cid == 4) {
            $intrest = 8;
        } elseif ($cid == 5) {
            $intrest = 9;
        }
        $courseData = CourseData::find($cid);
        $amount = $courseData->price;
        $course = $courseData->course;

        $id = session('USER_ID');
        $var = MemberDetail::find($id);
        $memberid = $var['memberid'];
        $p2pWallet = $var['p2p_wallet'];

        if ($p2pWallet < $amount) {
            return response()->json([
                'code' => 0,
                'message' => 'You do not have enough balance in your p2p wallet'
            ]);
        }

        $qry = new CourseDetail();
        $qry->memberid = $memberid;
        $qry->start_date = date('Y-m-d', strtotime('+30 days'));
        $qry->course = $course;
        $qry->amount = $amount;
        $qry->intrest = $intrest;
        $qry->installment = 0;
        $qry->status = 'Active';
        $qry->save();


        $p2p_wallet = $var->p2p_wallet;
        $var->p2p_wallet -= $amount;
        $var->save();

        p2pwalletTransfer($memberid, $amount, 'credit', $p2p_wallet, 'Course Enrolled',  $course . ' has been enrolled successfully.');

        return response()->json([
            'code' => 1,
            'message' => $course . ' has been purchased successfully!'
        ]);
    }

    public function productOtpSend($course_name, $price)
    {
        $id = session('USER_ID');
        $result['data'] = MemberDetail::find($id);
        $memberid = $result['data']['memberid'];
        $name = $result['data']['name'];
        $email = $result['data']['email'];
        $otp = rand(100000, 999999);
        session()->put('prootp', $otp);
        if ($email != '') {
            $mailData = [
                'name' => $name,
                'email' => $email,
                'memberid' => $memberid,
                'course_name' => $course_name,
                'price' => $price,
                'otp' => $otp
            ];
            $user['to'] = $email;
            Mail::send('member.mails.product-otp-mail', $mailData, function ($message) use ($user) {
                $message->to($user['to']);
                $message->subject('Liberfx Course Purchase OTP Verification');
            });
            session()->flash('successMsg', 'OTP has been sent to your registered email address');
            return redirect()->back();
        } else {
            session()->flash('failedMsg', 'Email address not found for your account');
            return redirect()->back();
        }
    }

    public function courseHistory()
    {
        $id = session('USER_ID');
        $result['data'] = MemberDetail::find(session('USER_ID'));
        $memberid = $result['data']['memberid'];
        $result['cdata'] = CourseDetail::where('memberid', $memberid)->get();
        return view('member.course.course-history')->with($result);
    }
}
