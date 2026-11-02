<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\BreakData;
use App\Models\LendingMonthlyReturn;
use App\Models\MemberDetail;
use App\Models\FakeDatas;
use App\Models\Deduction;
use App\Models\LevelStats;
use App\Models\FundRequestStat;
use App\Models\TableFundRequest;
use App\Models\ConvertPrize;
use App\Models\CoinGrowth;
use App\Models\CopyAccount;
use App\Models\CopyTrade;
use App\Models\CourseData;
use App\Models\CourseDetail;
use App\Models\DashMessage;
use App\Models\DashVideo;
use App\Models\RankRatio;
use App\Models\TableCoins;
use App\Models\SetRate;
use App\Models\WelcomeImages;
use App\Models\ImportFund;
use App\Models\LendingDetail;
use App\Models\LendingIncome;
use App\Models\LevelIncome;
use App\Models\LightLevelIncome;
use App\Models\RewardIncome;
use App\Models\NewsData;
use App\Models\RoiIncome;
use App\Models\TradeDetail;
use App\Models\WalletTransfer;
use App\Models\WithdrawalRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    public function index()
    {
        if (session()->has('ADMIN_LOGIN')) {
            return redirect('admin/dashboard');
        }

        $str1 = rand(1, 9);
        $str2 = rand(1, 9);

        session()->put('admin_str1', (int) $str1);
        session()->put('admin_str2', (int) $str2);
        session()->put('str1', (int) $str1);
        session()->put('str2', (int) $str2);
        session()->save();

        return view('admin.login', [
            'str1' => (int) $str1,
            'str2' => (int) $str2,
        ]);
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
            'login-captcha' => 'required|numeric'
        ]);

        $email = $request->post('email');
        $password = $request->post('password');
        $captcha = (int) $request->post('login-captcha');

        $str1 = session()->has('admin_str1') ? (int) session('admin_str1') : (int) session('str1');
        $str2 = session()->has('admin_str2') ? (int) session('admin_str2') : (int) session('str2');
        $total = $str1 + $str2;

        if ($total !== $captcha) {
            session()->forget(['admin_str1', 'admin_str2', 'str1', 'str2']);
            session()->flash('failedMsg', 'Invalid captcha input');
            return redirect('/admin');
        }

        session()->forget(['admin_str1', 'admin_str2', 'str1', 'str2']);

        $result = Admin::where('email', $email)->first();
        if ($result) {
            $hashpass = $result->password;
            if (Hash::check($password, $hashpass)) {
                $request->session()->put('ADMIN_LOGIN', true);
                $request->session()->put('ADMIN_ID', $result->id);
                return redirect('admin/dashboard');
            } else {
                session()->forget(['str1', 'str2']);
                session()->flash('failedMsg', 'Please enter valid password to login');
                return redirect('/admin');
            }
        } else {
            session()->forget(['str1', 'str2']);
            session()->flash('failedMsg', 'Please enter valid email to login');
            return redirect('/admin');
        }
    }

    public function dashboard()
    {
        return view('admin/dashboard');
    }

    public function logout(Request $request)
    {
        $request->session()->forget('ADMIN_LOGIN');
        $request->session()->forget('ADMIN_ID');

        return redirect('/admin');
    }

    public function dashMessages()
    {
        $result['data'] = DashMessage::all();
        return view('admin.dash-messages')->with($result);
    }

    public function dashMsg(Request $request)
    {
        $request->validate([
            'rank' => 'required|unique:dash_messages,rank',
            'message' => 'required',
        ]);
        $var = new DashMessage();
        $var->rank = $request->post('rank');
        $var->message = $request->post('message');
        $var->save();

        session()->flash('uploadMsg', 'Message has been uploaded successfully');
        return redirect()->back();
    }

    // public function contactUs(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required',
    //         'email' => 'required|email',
    //         'message' => 'required',
    //     ]);
    //     $var = new ContactUs();
    //     $var->name = $request->post('name');
    //     $var->email = $request->post('email');
    //     $var->message = $request->post('message');
    //     $var->save();

    //     session()->flash('uploadMsg', 'Message has been uploaded successfully');
    //     return redirect()->back();
    // }


    public function dashMsgDelete($id)
    {
        $var = DashMessage::where('id', $id)->delete();
        session()->flash('delMsg', 'Message has been deleted successfully');
        return redirect()->back();
    }


    public function dashVideos(Request $request)
    {
        $result['data'] = DashVideo::latest()->get();
        $result['editVideo'] = $request->filled('edit')
            ? DashVideo::findOrFail($request->integer('edit'))
            : null;

        return view('admin.dash-videos')->with($result);
    }

    public function uploadDashVid(Request $request)
    {
        $isEditing = $request->filled('id');

        $request->validate([
            'id' => ['nullable', 'integer', 'exists:dash_videos,id'],
            'video' => [
                $isEditing ? 'nullable' : 'required',
                'file',
                'mimes:mp4',
                'mimetypes:video/mp4,video/x-m4v',
                'max:51200',
            ],
            'status' => ['required', Rule::in([
                DashVideo::STATUS_LIVE,
                DashVideo::STATUS_NOT_LIVE,
            ])],
        ], [
            'video.mimes' => 'The video must be an MP4 file.',
            'video.mimetypes' => 'The video must be a valid MP4 file.',
            'video.max' => 'The video must not be larger than 50 MB.',
        ]);

        $dashVideo = $isEditing
            ? DashVideo::findOrFail($request->integer('id'))
            : new DashVideo();
        $previousFilename = $dashVideo->video;
        $uploadedFilename = null;

        if (
            $isEditing
            && ! $request->hasFile('video')
            && $request->string('status')->toString() === DashVideo::STATUS_LIVE
            && ! File::isFile(public_path('uploads/dash-videos/' . basename((string) $previousFilename)))
        ) {
            return redirect()->back()
                ->withErrors(['video' => 'Upload a replacement before setting this video Live.'])
                ->withInput();
        }

        if ($request->hasFile('video')) {
            $file = $request->file('video');
            $uploadDirectory = public_path('uploads/dash-videos');

            File::ensureDirectoryExists($uploadDirectory);

            $uploadedFilename = $file->hashName();
            $file->move($uploadDirectory, $uploadedFilename);
            $dashVideo->video = $uploadedFilename;
        }

        $dashVideo->status = $request->string('status')->toString();

        try {
            $dashVideo->save();
        } catch (\Throwable $exception) {
            if ($uploadedFilename !== null) {
                File::delete(public_path('uploads/dash-videos/' . basename($uploadedFilename)));
            }

            throw $exception;
        }

        if ($uploadedFilename !== null && $previousFilename) {
            File::delete(public_path('uploads/dash-videos/' . basename($previousFilename)));
        }

        $message = $isEditing
            ? 'Video has been updated successfully'
            : 'Video has been uploaded successfully';

        return redirect('admin/dash-videos')->with('uploadMsg', $message);
    }

    public function dashVidStatusChange(Request $request, $id)
    {
        $this->validateDashVideoActionToken($request);

        $dashVideo = DashVideo::findOrFail($id);

        if (
            $dashVideo->status !== DashVideo::STATUS_LIVE
            && ! File::isFile(public_path('uploads/dash-videos/' . basename($dashVideo->video)))
        ) {
            return redirect()->back()->with(
                'failedMsg',
                'Upload a replacement before setting this video Live.'
            );
        }

        $dashVideo->status = $dashVideo->status === DashVideo::STATUS_LIVE
            ? DashVideo::STATUS_NOT_LIVE
            : DashVideo::STATUS_LIVE;
        $dashVideo->save();

        return redirect()->back()->with('uploadMsg', 'Video status has been changed successfully');
    }

    public function dashVidDelete(Request $request, $id)
    {
        $this->validateDashVideoActionToken($request);

        $dashVideo = DashVideo::findOrFail($id);
        $filename = $dashVideo->video;

        $dashVideo->delete();
        File::delete(public_path('uploads/dash-videos/' . basename($filename)));

        return redirect()->back()->with('delMsg', 'Video has been deleted successfully');
    }

    private function validateDashVideoActionToken(Request $request): void
    {
        $requestToken = $request->query('_token');

        abort_unless(
            is_string($requestToken) && hash_equals($request->session()->token(), $requestToken),
            419
        );
    }

    public function details()
    {
        $result['data'] = MemberDetail::orderby('created_at', 'desc')->get();

        return view('admin.member-details')->with($result);
    }

    // public function monthlyReturn()
    // {
    //     $result['lendData'] = LendingDetail::all();
    //     return view('admin.monthly-return')->with($result);
    // }

    public function meminvestment(Request $request)
    {
        $id = session('USER_ID');
        $result['mdata'] = MemberDetail::find($id);
        $result['data'] = MemberDetail::orderby('created_at', 'desc')->get();

        return view('admin.member-investments')->with($result);
    }


    // public function monDetailed($memberid)
    // {
    //     $result['data'] = MonthlyBiz::where('memberid', $memberid)->get();
    //     return view('admin.monthly-detailed')->with($result);
    // }



    public function security()
    {
        $result['data'] = MemberDetail::orderby('created_at', 'desc')->get();

        return view('admin.member-security')->with($result);
    }

    public function securityUpdate(Request $request)
    {
        $password = $request->post('password');
        $txnpassword = $request->post('pin');
        $var = MemberDetail::find($request->post('id'));
        if ($password != '') {
            $var->password = Hash::make($password);
        }
        if ($txnpassword != '') {
            $var->txn_password = Hash::make($txnpassword);
        }
        $var->save();

        session()->flash('message', 'Security Details have been updated successfully!');
        return redirect()->back();
    }

    public function accountControl()
    {
        $result['data'] = MemberDetail::where('status', '!=', 'Temp')->orderby('created_at', 'desc')->get();
        return view('admin.account-control')->with($result);
    }

    public function memberLogin(Request $request, $id)
    {

        $result = MemberDetail::where('memberid', $id)->first();
        if ($result) {
            $request->session()->put('USER_LOGIN', true);
            $request->session()->put('USER_ID', $result->id);
            return redirect('/member');
        }
    }

    public function welcomeImages()
    {
        $result['data'] = WelcomeImages::all();
        return view('admin.welcome-images')->with($result);
    }

    public function welImage(Request $request)
    {
        $request->validate([
            'rank' => 'required|unique:welcome_images,rank',
            'title' => 'required',
            'image' => 'required'
        ]);
        $var = new WelcomeImages();
        $var->rank = $request->post('rank');
        $var->title = $request->post('title');
        $pImage = $request->file('image');
        $ext = $pImage->getClientOriginalExtension();
        if ($ext != 'png' && $ext != 'jpg' && $ext != 'jpeg') {
            session()->flash('failedMsg', 'Allowed image type is jpg, jpeg, png. Please change image type');
            return redirect()->back();
        }
        $imagename = "P" . time() . '.' . $ext;
        $pImage->move(public_path('uploads'), $imagename);
        $var->image = $imagename;
        $var->save();

        session()->flash('uploadMsg', 'Image has been uploaded successfully');
        return redirect()->back();
    }

    public function welcomeImagesDelete($id)
    {
        $var = WelcomeImages::where('id', $id)->delete();
        session()->flash('delMsg', 'Image has been deleted successfully');
        return redirect()->back();
    }

    public function statusChange(Request $request, $id)
    {
        $var = MemberDetail::find($id);
        $status = $var->status;
        if ($status == 'Active') {
            $var->status = 'Blocked';
            $var->save();
            session()->flash('statusDeact', 'Status has been Blocked successfully!');
            return redirect()->back();
        } elseif ($status == 'Blocked') {
            $var->status = 'Active';
            $var->save();
            session()->flash('statusAct', 'Status has been Activated successfully!');
            return redirect()->back();
        }
    }

    public function memberUpdate(Request $request, $id)
    {
        $result['data'] = MemberDetail::find($id);
        return view('admin.members.member-update')->with($result);
    }

    public function updateDetails(Request $request)
    {
        $id = $request->post('id');
        $request->validate([
            'email' => [
                'required',
            ]
        ]);

        $var = MemberDetail::find($id);
        $var->first_name = $request->post('first_name');
        $var->last_name = $request->post('last_name');
        $var->email = $request->post('email');
        $var->mobile = $request->post('mobile');
        $var->wallet_address = $request->post('wallet_address');
        if ($request->hasfile('image')) {

            $file = $request->file('image');
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

        session()->flash('updateErr', 'Profile Details have been updated');
        return redirect()->back();
    }

    public function kycRequests()
    {
        $result['data'] = MemberDetail::where('kyc_status', 'Submitted')->get();

        return view('admin.new-kyc-requests')->with($result);
    }


    public function verifiedKyc()
    {
        $result['data'] = MemberDetail::where('kyc_status', 'Verified')->get();

        return view('admin.verified-kyc')->with($result);
    }

    public function coingrowthView()
    {

        return view('admin.movement.coin-growth');
    }

    public function sendNews()
    {
        $result['data'] = NewsData::all();
        return view('admin.send-news')->with($result);
    }

    public function insertNews(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);

        $var = new NewsData();
        $var->title = $request->post('title');
        $var->description = $request->post('description');
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            if ($extension != 'png' && $extension != 'jpg' && $extension != 'jpeg') {
                session()->flash('failedMsg', 'Allowed image type is jpg, jpeg, png. Please change image type');
                return redirect()->back();
            }
            $filename = time() . '.' . $extension;
            $file->move(public_path('adm_assets/assets/images/news'), $filename);
            $var->image = $filename;
        }
        $var->save();

        session()->flash('successMsg', 'News has been inserted successfully!');
        return redirect()->back();
    }

    public function newsDelete($id)
    {
        $var = NewsData::where('id', $id)->delete();
        session()->flash('delMsg', 'News has been deleted successfully');
        return redirect()->back();
    }

    public function newsEdit(Request $request, $id)
    {
        $result['data'] = NewsData::find($id);
        return view('admin.edit-news')->with($result);
    }

    public function updateNews(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'title' => 'required',
            'description' => 'required'
        ]);

        $id = $request->post('id');
        $var = NewsData::find($id);
        $var->title = $request->post('title');
        $var->description = $request->post('description');
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            if ($extension != 'png' && $extension != 'jpg' && $extension != 'jpeg') {
                session()->flash('failedMsg', 'Allowed image type is jpg, jpeg, png. Please change image type');
                return redirect()->back();
            }
            $filename = time() . '.' . $extension;
            $file->move(public_path('adm_assets/assets/images/news'), $filename);
            $var->image = $filename;
        }
        $var->save();

        session()->flash('successMsg', 'News has been updated successfully!');
        return redirect()->back();
    }

    public function addFunds()
    {
        return view('admin.funds.add-funds');
    }

    public function deductFunds()
    {
        return view('admin.funds.deduct-funds');
    }

    public function addMemFunds(Request $request)
    {
        $request->validate([
            'memberid' => 'required',
            'amount' => 'required|gt:0',
            'wallet_type' => 'required'
        ]);
        $memberid = $request->post('memberid');
        $amount = $request->post('amount');
        $wallet_type = $request->post('wallet_type');
        $var = MemberDetail::where('memberid', $memberid)->first();
        if (!$var) {
            session()->flash('failedMsg', 'Entered Memberid is not Available. Please change memberid');
            return redirect()->back();
        }
        if ($var->status != 'Active') {
            session()->flash('failedMsg', 'Entered Memberid is not Active. Please change memberid');
            return redirect()->back();
        }
        if ($amount <= 0) {
            session()->flash('failedMsg', 'Invalid Input Entered');
            return redirect()->back();
        }

        if ($wallet_type == 'Main') {
            $var->lending_wallet += $amount;
        } else {
            $var->p2p_wallet += $amount;
        }
        $var->save();

        $varimp = new ImportFund();
        $varimp->memberid = $memberid;
        $varimp->amount = $amount;
        $varimp->wallet_type = $wallet_type;
        $varimp->orderid = rand(10000, 99999);
        $varimp->txnid = 'NA';
        $varimp->type = 'Add';
        $varimp->status = 'Approved';
        $varimp->mode = 'Mannual';
        $varimp->save();

        session()->flash('successMsg', 'Amount has been added successfully to Member ' . $wallet_type . ' Wallet');
        return redirect()->back();
    }

    public function deductMemFunds(Request $request)
    {
        $request->validate([
            'memberid' => 'required',
            'amount' => 'required|gt:0',
            'wallet_type' => 'required'
        ]);
        $memberid = $request->post('memberid');
        $amount = $request->post('amount');
        $wallet_type = $request->post('wallet_type');
        $var = MemberDetail::where('memberid', $memberid)->first();
        if (!$var) {
            session()->flash('failedMsg', 'Entered Memberid is not Available. Please change memberid');
            return redirect()->back();
        }
        if ($var->status != 'Active') {
            session()->flash('failedMsg', 'Entered Memberid is not Active. Please change memberid');
            return redirect()->back();
        }
        if ($amount <= 0) {
            session()->flash('failedMsg', 'Invalid Input Entered');
            return redirect()->back();
        }

        if ($wallet_type == 'Main') {
            if ($amount > $var->lending_wallet) {
                session()->flash('failedMsg', 'Member has not enough balance to deduct this amount');
                return redirect()->back();
            }
            $var->lending_wallet -= $amount;
        } else {
            if ($amount > $var->p2p_wallet) {
                session()->flash('failedMsg', 'Member has not enough balance to deduct this amount');
                return redirect()->back();
            }
            $var->p2p_wallet -= $amount;
        }

        $var->save();

        $varimp = new ImportFund();
        $varimp->memberid = $memberid;
        $varimp->amount = $amount;
        $varimp->wallet_type = $wallet_type;
        $varimp->orderid = rand(10000, 99999);
        $varimp->txnid = 'NA';
        $varimp->type = 'Deduct';
        $varimp->status = 'Approved';
        $varimp->mode = 'Mannual';
        $varimp->save();

        session()->flash('successMsg', 'Amount has been deducted successfully from Member ' . $wallet_type . ' Wallet');
        return redirect()->back();
    }

    public function addFundsDetails()
    {
        $result['data'] = ImportFund::where('mode', 'Mannual')->orderBy('created_at', 'Desc')->get();
        return view('admin.funds.add-funds-details')->with($result);
    }

    public function allCourses()
    {
        $result['courses'] = CourseData::all();
        return view('admin.course.all-courses')->with($result);
    }

    public function editCourse(Request $request, $id)
    {
        $result['cData'] = CourseData::find($id);
        return view('admin.course.edit-course')->with($result);
    }

    public function editCourseData(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'course_name' => 'required',
            'price' => 'required|numeric|gt:0',
            'description' => 'required',
            'image' => 'required'
        ]);
        $id = $request->post('id');
        $var = CourseData::find($id);
        $var->course = $request->post('course_name');
        $var->price = $request->post('price');
        $var->description = $request->post('description');
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            if ($extension != 'png' && $extension != 'jpg' && $extension != 'jpeg') {
                session()->flash('failedMsg', 'Allowed image type is jpg, jpeg, png. Please change image type');
                return redirect()->back();
            }
            $filename = time() . '.' . $extension;
            $file->move(public_path('adm_assets/assets/images/courses'), $filename);
            $var->image = $filename;
        }
        $var->save();

        session()->flash('updateErr', 'Course Data has been updated successfully!');
        return redirect()->back();
    }

    public function courseDetail()
    {
        $result['cData'] = CourseDetail::all();
        return view('admin.course.course-details')->with($result);
    }

    public function roiIncomes()
    {
        $result['roiData'] = RoiIncome::all();
        return view('admin.income.roi-incomes')->with($result);
    }

    public function levelIn()
    {
        $result['data'] = LevelIncome::all();
        return view('admin.income.level-incomes')->with($result);
    }

    public function rewardIn()
    {
        $result['rewardData'] = RewardIncome::all();
        return view('admin.income.reward-incomes')->with($result);
    }

    public function lendingIn()
    {
        $result['data'] = lendingIncome::all();
        return view('admin.income.lending-incomes')->with($result);
    }

    public function lightLevelIncomes()
    {
        $result['data'] = LightLevelIncome::all();
        return view('admin.income.light-level-incomes')->with($result);
    }



    public function paymentHistory()
    {
        $result['data'] = WithdrawalRequest::where('status', 'Approved')->orderBy('created_at', 'DESC')->get();
        return view('admin.payment-history')->with($result);
    }

    public function withdrawals()
    {
        $result['data'] = WithdrawalRequest::where('status', 'Pending')->get();

        return view('admin.new-withdrawal-request')->with($result);
    }

    public function cancelledRequest()
    {
        $result['data'] = WithdrawalRequest::where('status', 'Cancelled')->get();

        return view('admin.cancelled-request')->with($result);
    }

    public function wAccept(Request $request, $id)
    {
        $var = WithdrawalRequest::find($id);
        $var->status = 'Approved';
        $var->payment_date = date('Y-m-d H:i:s');
        $var->save();

        $memberid = $var->memberid;
        $qry = MemberDetail::where('memberid', $memberid)->first();
        $email = $qry->email;
        $name = $var->name;
        $requestid = $var->request_id;
        $coin = $var->coin;
        $gross = $var->gross_amount;
        $service = $var->service_charge;
        $net = $var->net_amount;
        $date = $var->request_date;
        $wallet = $var->wallet_address;

        $mailData = [
            'coin' => $coin,
            'request_id' => $requestid,
            'email' => $email,
            'memberid' => $memberid,
            'gross' => $gross,
            'service' => $service,
            'net' => $net,
            'date' => $date,
            'name' => $name,
            'wallet' => $wallet
        ];

        $user['to'] = $email;
        Mail::send('admin.mail.withdwawal-approve', $mailData, function ($message) use ($user) {

            $message->to($user['to']);
            $message->subject('Liberfx Withdrawal Approval Message');
        });

        session()->flash('wMessage', 'Withdrawal request has been accepted successfully!');
        return redirect()->back();
    }

    public function wCancelPage(Request $request, $id)
    {
        $result['data'] = WithdrawalRequest::where('id', $id)->first();
        return view('admin.withdrawal-cancel-page')->with($result);
    }

    public function withdrawalCancel(Request $request)
    {
        $request->validate([
            'reason' => 'required'
        ]);
        $id = $request->post('id');
        $var = WithdrawalRequest::find($id);
        $memberid = $var->memberid;
        $wallet_type = $var->wallet_type;
        $amount = $var->usdt;
        $var->reason = $request->post('reason');
        $var->status = 'Cancelled';
        $var->save();

        $qry = MemberDetail::where('memberid', $memberid)->first();
        if ($wallet_type == 'Trading') {
            $wallet = $qry->exng_wallet;
            $qry->exng_wallet += $amount;
        } elseif ($wallet_type == 'Course') {
            $wallet = $qry->course_wallet;
            $qry->course_wallet += $amount;
        } elseif ($wallet_type == 'Lending') {
            $wallet = $qry->lending_wallet;
            $qry->lending_wallet += $amount;
        }
        $qry->save();

        walletTransfer($memberid, $amount, 'debit', $wallet, 'Withdrawal Rejected', ' $ ' . $amount . ' have been added back to your ' . $wallet_type . ' Wallet.');

        $email = $qry->email;
        $name = $var->name;
        $requestid = $var->request_id;
        $coin = $var->coin;
        $gross = $var->gross_amount;
        $service = $var->service_charge;
        $net = $var->net_amount;
        $date = $var->request_date;
        $wallet = $var->wallet_address;
        $reason = $var->reason;

        $mailData = [
            'coin' => $coin,
            'request_id' => $requestid,
            'email' => $email,
            'memberid' => $memberid,
            'gross' => $gross,
            'service' => $service,
            'net' => $net,
            'date' => $date,
            'name' => $name,
            'reason' => $reason,
            'wallet' => $wallet
        ];

        $user['to'] = $email;
        Mail::send('admin.mail.withdwawal-reject', $mailData, function ($message) use ($user) {

            $message->to($user['to']);
            $message->subject('Liberfx Withdrawal Rejection Message');
        });

        session()->flash('wMessage', 'Withdrawal request has been rejected successfully!');
        return redirect('admin/new-withdrawal-request');
    }

    public function tradeWalletHistory()
    {
        $result['data'] = MemberDetail::find(session('USER_ID'));
        $result['passdata'] = WalletTransfer::whereIn('walletType', ['Trade Withdrawal', 'Trade Funds Requested', 'Import Funds Trade'])->orderBy('created_at', 'desc')->get();
        return view('admin.trade-wallet-history')->with($result);
    }


    public function coinBasePrice()
    {

        $result['coins'] = TableCoins::whereIn('coin', ['BNIX/USDT', 'VOXA/USDT'])->get();
        return view('admin.movement.coin-base-price')->with($result);
    }

    public function changeBase(Request $request)
    {
        $bnix = $request->post('bnixusdt');
        $voxa = $request->post('voxausdt');

        $varvoxa = TableCoins::find(14);
        $varvoxa->base_price = $voxa;
        $varvoxa->save();

        $varbnix = TableCoins::find(15);
        $varbnix->base_price = $bnix;
        $varbnix->save();

        session()->flash('successMsg', 'Coins base price have been updated successfully!');
        return redirect()->back();
    }

    public function coingrowth(Request $request)
    {
        $request->validate([
            'coin' => 'required',
            'type' => 'required',
            'change' => 'required',
            'starttime' => 'required',
            'minutes' => 'required',
        ]);

        $coin = $request->post('coin');
        $type = $request->post('type');
        $change = $request->post('change');
        $starttime = $request->post('starttime');
        $minutes = $request->post('minutes');
        $seconds = (60 * $minutes) / 5;
        $per_secs_change = $change / $seconds;
        $stoptime = date('Y-m-d H:i:0', strtotime($starttime . '+' . $minutes . ' Minutes'));

        if ($starttime < date('Y-m-d H:i:0')) {
            session()->flash('coinFailMsg', 'Change can not be set for past session');
            return redirect()->back();
        }

        if (date('Y-m-d') != date('Y-m-d', strtotime($starttime))) {
            session()->flash('coinFailMsg', 'Change can be set only for current date');
            return redirect()->back();
        }

        $var = new CoinGrowth();
        $var->coin = $coin;
        $var->type = $type;
        $var->price_change = $change;
        $var->starttime = $starttime;
        $var->minutes = $minutes;
        $var->stoptime = $stoptime;
        $var->save();

        if ($type == 'High') {
            $ptime = rand(3, 6);
            for ($i = 0; $i < 5; $i++) {
                $pasttime = date('Y-m-d H:i:0', strtotime($starttime . '-' . $ptime . ' minutes'));
                $qry = SetRate::where([['coin', $coin], ['time', $pasttime]])->first();
                if ($qry) {
                    $qry->flow = 'Low';
                    $qry->save();
                } else {
                    $inst = new SetRate();
                    $inst->coin = $coin;
                    $inst->time = $pasttime;
                    $inst->flow = 'Low';
                    $inst->save();
                }

                $ptime--;
            }


            for ($i = 0; $i < $minutes; $i++) {

                $pasttime = date('Y-m-d H:i:0', strtotime($starttime . '+' . $i . ' minutes'));
                $qry = SetRate::where([['coin', $coin], ['time', $pasttime]])->first();
                if ($qry) {
                    $qry->flow = 'High';
                    $qry->set_by = 'Admin';
                    $qry->change = $per_secs_change;
                    $qry->save();
                } else {
                    $inst = new SetRate();
                    $inst->coin = $coin;
                    $inst->time = $pasttime;
                    $inst->flow = 'High';
                    $inst->set_by = 'Admin';
                    $inst->change = $per_secs_change;
                    $inst->save();
                }
            }
        } else {
            for ($i = 0; $i < $minutes; $i++) {

                $pasttime = date('Y-m-d H:i:0', strtotime($starttime . '+' . $i . ' minutes'));
                $qry = SetRate::where([['coin', $coin], ['time', $pasttime]])->first();
                if ($qry) {
                    $qry->flow = 'Low';
                    $qry->set_by = 'Admin';
                    $qry->change = $per_secs_change;
                    $qry->save();
                } else {
                    $inst = new SetRate();
                    $inst->coin = $coin;
                    $inst->time = $pasttime;
                    $inst->flow = 'Low';
                    $inst->set_by = 'Admin';
                    $inst->change = $per_secs_change;
                    $inst->save();
                }
            }
        }

        session()->flash('coinSuccMsg', 'Growth has been set successfully');
        return redirect()->back();
    }

    public function changehistory()
    {
        $result['data'] = CoinGrowth::orderby('created_at', 'desc')->get();
        return view('admin.change-history')->with($result);
    }

    public function levelStat()
    {
        $result['data'] = LevelStats::orderBy('level', 'asc')->get();
        return view('admin.level-stats')->with($result);
    }

    public function levelStats(Request $request)
    {
        $level = $request->post('level');
        $check = levelStats::where('level', $level)->first();
        if (!$check) {
            session()->flash('failedMsg', 'This Level is already available');
            return redirect()->back();
        }
        $check->share = $request->post('share');
        $check->direct = $request->post('direct');
        $check->save();

        session()->flash('successMsg', 'Level has been updated successfully');
        return redirect()->back();
    }



    public function LevelStatEdit($id)
    {
        $result['ldata'] = LevelStats::where('id', $id)->first();
        return view('admin.edit-level-stat')->with($result);
    }

    public function rankRatio()
    {
        $result['data'] = RankRatio::find(1);
        return view('admin.rank-ratios')->with($result);
    }

    public function rankRatios(Request $request)
    {
        $var = RankRatio::find(1);
        $var->first = $request->post('first');
        $var->rest = $request->post('rest');
        $var->save();

        session()->flash('successMsg', 'Rank Ration has been set successfully');
        return redirect()->back();
    }

    public function deduction()
    {
        $result['data'] = Deduction::find(1);
        return view('admin.deduction')->with($result);
    }

    public function dedtion(Request $request)
    {
        $var = Deduction::find(1);
        $var->rate = $request->post('rate');
        $var->p2p = $request->post('p2p');
        $var->lending = $request->post('lending');
        $var->break = $request->post('break');
        $var->lending_break_status = $request->post('lending_break_status');
        $var->save();

        session()->flash('successMsg', 'Deduction rates have been updated successfully');
        return redirect()->back();
    }

    public function refreshCoins(Request $request)
    {
        $url = 'https://api.binance.com/api/v3/ticker/24hr?symbols=["BTCUSDT","BNBUSDT","TRXUSDT"]';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $result = curl_exec($ch);
        curl_close($ch);
        $cdata = json_decode($result, true);
        $btc = $cdata[0]['lastPrice'];
        $bnb = $cdata[1]['lastPrice'];
        $trx = $cdata[2]['lastPrice'];

        $var = ConvertPrize::find(1);
        $var->btc = $btc;
        $var->tron = $trx;
        // $var->bnb = $bnb;
        $var->save();

        session()->flash('successMsgCoin', 'Coins price has been refreshed successfully');
        return redirect()->back();
    }

    public function fundrequest()
    {
        $result['coins'] = ConvertPrize::find(1);
        $result['data'] = TableFundRequest::where('status', 'Requested')->orderBy('created_at', 'Desc')->get();
        return view('admin.funds.fund-requets')->with($result);
    }

    public function reqhistory()
    {
        $result['coins'] = ConvertPrize::find(1);
        $result['data'] = TableFundRequest::where('status', '!=', 'Requested')->orderBy('created_at', 'Desc')->get();
        return view('admin.funds.request-history')->with($result);
    }

    public function kycView(Request $request, $id)
    {
        $result['data'] = MemberDetail::find($id);
        return view('admin.view-kyc')->with($result);
    }

    public function kycVerify(Request $request, $id)
    {
        $var = MemberDetail::find($id);
        $var->kyc_status = 'Verified';
        $var->save();

        $memberid = $var->memberid;
        $email = $var->email;
        $name = $var->first_name . ' ' . $var->last_name;
        $shortMsg = "KYC Verified";
        $message = "Your KYC details have been reviewed and successfully verified by admin. Now you are eligible to withdrwal amount from your account.";

        $mailData = [
            'email' => $email,
            'memberid' => $memberid,
            'kycmessage' => $message,
            'smsg' => $shortMsg,
            'name' => $name,
        ];

        $user['to'] = $email;
        Mail::send('admin.mail.kyc-mail', $mailData, function ($message) use ($user) {

            $message->to($user['to']);
            $message->subject('Liberfx User KYC Verification');
        });

        session()->flash('kycMesg', 'KYC request has been verified successfully!');
        return redirect('admin/new-kyc-requests');
    }

    public function rejectReason(Request $request)
    {
        $request->validate([
            'reject_reason' => 'required'
        ]);

        $id = $request->post('id');

        $var = MemberDetail::find($id);
        $previousStatus = $var->kyc_status;
        $var->kyc_status = 'Rejected';
        $var->reject_reason = $request->post('reject_reason');
        $var->id_no = '';
        // $var->wallet_address = '';
        $var->front_image = '';
        $var->back_image = '';
        $var->selfie_image = '';
        $var->save();

        $memberid = $var->memberid;
        $email = $var->email;
        $name = $var->first_name . ' ' . $var->last_name;
        $shortMsg = "KYC Rejected";
        $message = "Your KYC details have been reviewed and Rejected by admin. Your kyc data has been deleted and you are requested to resubmit youe KYC again.";

        $mailData = [
            'email' => $email,
            'memberid' => $memberid,
            'smsg' => $shortMsg,
            'kycmessage' => $message,
            'name' => $name,
        ];

        // $user['to'] = $email;
        // Mail::send('admin.mail.kyc-reject', $mailData, function ($message) use ($user) {

        //     $message->to($user['to']);
        //     $message->subject('Liberfx User KYC Rejection');
        // });


        session()->flash('kycMesg', 'KYC request has been rejected successfully!');
        if ($previousStatus == 'Verified') {
            return redirect('admin/verified-kyc-requests');
        }
        return redirect('admin/new-kyc-requests');
    }

    //update kfc function
    public function updateKYC(Request $request)
    {
        $var = MemberDetail::find($request->post('id'));
        $var->id_no = $request->post('idno');
        // $var->wallet_address = $request->post('wallet_address');
        $var->save();
        session()->flash('update', 'KYC Details have been updated successfully.');
        return redirect()->back();
    }

    public function updatePan(Request $request)
    {
        $var = MemberDetail::find($request->post('id'));
        $file =  $request->file('front_image');
        $ext = $file->getClientOriginalExtension();
        if ($ext != 'png' && $ext != 'jpg' && $ext != 'jpeg') {
            session()->flash('failedMsg', 'Allowed image type is jpg, jpeg, png. Please change image type');
            return redirect()->back();
        }
        $filename = time() . '.' . $ext;
        $file->move(public_path('uploads'), $filename);
        $var->front_image = $filename;
        $var->save();
        $oldImage = $request->post('oldImage');
        if ($oldImage != '') {
            $file_path = public_path('uploads/') . $oldImage;
            @unlink($file_path);
        }

        session()->flash('update', 'KYC Details have been updated successfully.');
        return redirect()->back();
    }

    public function updateAfront(Request $request)
    {
        $var = MemberDetail::find($request->post('id'));
        $file =  $request->file('back_image');
        $ext = $file->getClientOriginalExtension();
        if ($ext != 'png' && $ext != 'jpg' && $ext != 'jpeg') {
            session()->flash('failedMsg', 'Allowed image type is jpg, jpeg, png. Please change image type');
            return redirect()->back();
        }
        $filename = time() . '.' . $ext;
        $file->move(public_path('uploads'), $filename);
        $var->back_image = $filename;
        $var->save();
        $oldImage = $request->post('oldImage');
        if ($oldImage != '') {
            $file_path = public_path('uploads/') . $oldImage;
            @unlink($file_path);
        }

        session()->flash('update', 'KYC Details have been updated successfully.');
        return redirect()->back();
    }

    public function updateAback(Request $request)
    {
        $var = MemberDetail::find($request->post('id'));
        $file =  $request->file('selfie_image');
        $ext = $file->getClientOriginalExtension();
        if ($ext != 'png' && $ext != 'jpg' && $ext != 'jpeg') {
            session()->flash('failedMsg', 'Allowed image type is jpg, jpeg, png. Please change image type');
            return redirect()->back();
        }
        $filename = time() . '.' . $ext;
        $file->move(public_path('uploads'), $filename);
        $var->selfie_image = $filename;
        $var->save();
        $oldImage = $request->post('oldImage');
        if ($oldImage != '') {
            $file_path = public_path('uploads/') . $oldImage;
            @unlink($file_path);
        }

        session()->flash('update', 'KYC Details have been updated successfully.');
        return redirect()->back();
    }

    // public function memberLogin(Request $request, $id)
    // {

    //     $result = MemberDetail::where('memberid', $id)->first();
    //     if ($result) {
    //         $request->session()->put('USER_LOGIN', true);
    //         $request->session()->put('USER_ID', $result->id);
    //         return redirect('/member/signin');
    //     }
    // }


    // public function ChangeHistoryDelete($id)
    // {
    //     $var = CoinGrowth::where('id', $id)->delete();
    //     session()->flash('delMsg', 'Id has been deleted successfully');
    //     return redirect()->back();
    // }

    public function fundReqStats()
    {
        $result['statData'] = FundRequestStat::all();
        return view('admin.fund-request-stat')->with($result);
    }

    public function editFundStat(Request $request, $id)
    {
        $result['statData'] = FundRequestStat::find($id);
        return view('admin.edit-fundreq-stat')->with($result);
    }

    public function fundStats(Request $request)
    {
        $request->validate([
            'image' => 'required',
            'address' => 'required'
        ]);

        $id = $request->post('id');
        $var = FundRequestStat::find($id);
        $var->address = $request->post('address');
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            if ($extension != 'png' && $extension != 'jpg' && $extension != 'jpeg') {
                session()->flash('failedMsg', 'Allowed image type is jpg, jpeg, png. Please change image type');
                return redirect()->back();
            }
            $filename = time() . '.' . $extension;
            $file->move(public_path('coin-stat'), $filename);
            $var->image = $filename;
        }
        $var->save();
        return redirect()->back();
    }

    public function CoreLendings()
    {
        $result['lendData'] = LendingDetail::where('plan', 'Core')->get();
        return view('admin.lending.Core-lendings')->with($result);
    }

    public function breakData()
    {
        $result['breakData'] = BreakData::where('status', 'Requested')->get();
        return view('admin.lending.break-request')->with($result);
    }

    public function breakDetail()
    {
        $result['breakData'] = BreakData::all();
        return view('admin.lending.break-data')->with($result);
    }

    public function LimeLendings()
    {
        $result['lendData'] = LendingDetail::where('plan', 'Lime')->get();
        return view('admin.lending.Lime-lendings')->with($result);
    }

    public function DroidLendings()
    {
        $result['lendData'] = LendingDetail::where('plan', 'Droid')->get();
        return view('admin.lending.Droid-lendings')->with($result);
    }

    public function AddonData()
    {
        $result['fakeData'] = FakeDatas::all();
        return view('admin.add-on-data')->with($result);
    }


    public function AddonDataInsert(Request $request)
    {
        $request->validate([
            'memberid' => 'required',
            'team' => 'required',
            'reward' => 'required|numeric',
            'level' => 'required|numeric',
            'lending' => 'required|numeric',
            'direct' => 'required|numeric',
            'withdrawl' => 'required|numeric',
            'fund_wallet' => 'required|numeric',
            'core_investment' => 'required|numeric',
            'lime_investment' => 'required|numeric',
            'droid_investment' => 'required|numeric',
            'total_investment' => 'required|numeric',
            'bonus_income' => 'required|numeric',
            'light_level_income' => 'required|numeric',
            'total_income' => 'required|numeric',
        ]);
        $memberid = $request->post('memberid');
        $team = $request->post('team');
        $level = $request->post('level');
        $reward = $request->post('reward');
        $lending = $request->post('lending');
        $direct = $request->post('direct');
        $withdrawl = $request->post('withdrawl');
        $var = MemberDetail::where('memberid', $memberid)->first();
        if (!$var) {
            session()->flash('failedMsg', 'Entered Memberid is not Available. Please change memberid');
            return redirect()->back();
        }
        if ($var->status != 'Active') {
            session()->flash('failedMsg', 'Entered Memberid is not Active. Please change memberid');
            return redirect()->back();
        }

        if (FakeDatas::where('memberid', $memberid)->exists()) {
            session()->flash('failedMsg', 'Entered Memberid is already available in Addon Data. Please change memberid');
            return redirect()->back();
        }

        $varimp = new FakeDatas();
        $varimp->memberid = $memberid;
        $varimp->team = $team;
        $varimp->level = $level;
        $varimp->rewards = $reward;
        $varimp->lending = $lending;
        $varimp->direct = $direct;
        $varimp->withdrawl = $withdrawl;
        $varimp->fund_wallet = $request->post('fund_wallet');
        $varimp->core_invest = $request->post('core_investment');
        $varimp->lime_invest = $request->post('lime_investment');
        $varimp->droid_invest = $request->post('droid_investment');
        $varimp->total_invest = $request->post('total_investment');
        $varimp->bonus_inc = $request->post('bonus_income');
        $varimp->light_lvl_inc = $request->post('light_level_income');
        $varimp->total_inc = $request->post('total_income');
        $varimp->save();

        session()->flash('successMsg', 'Data Inserted Successfully!');
        return redirect()->back();
    }

    public function AddonDataEdit(Request $request, $id)
    {
        $result['data'] = FakeDatas::where('id', $id)->first();
        return view('admin.addon-data-edit')->with($result);
    }

    public function AddonDataUpdate(Request $request)
    {
        $request->validate([
            'memberid' => 'required',
            'team' => 'required',
            'reward' => 'required',
            'level' => 'required',
            'lending' => 'required',
            'direct' => 'required',
            'withdrawl' => 'required',
            'fund_wallet' => 'required|numeric',
            'core_investment' => 'required|numeric',
            'lime_investment' => 'required|numeric',
            'droid_investment' => 'required|numeric',
            'total_investment' => 'required|numeric',
            'bonus_income' => 'required|numeric',
            'light_level_income' => 'required|numeric',
            'total_income' => 'required|numeric'
        ]);
        $id = $request->post('id');
        $memberid = $request->post('memberid');
        $team = $request->post('team');
        $level = $request->post('level');
        $reward = $request->post('reward');
        $lending = $request->post('lending');
        $direct = $request->post('direct');
        $withdrawl = $request->post('withdrawl');
        $var = MemberDetail::where('memberid', $memberid)->first();
        if (!$var) {
            session()->flash('failedMsg', 'Entered Memberid is not Available. Please change memberid');
            return redirect()->back();
        }
        if ($var->status != 'Active') {
            session()->flash('failedMsg', 'Entered Memberid is not Active. Please change memberid');
            return redirect()->back();
        }

        $qry = FakeDatas::where('id', $id)->first();
        $qry->memberid = $memberid;
        $qry->team = $team;
        $qry->level = $level;
        $qry->rewards = $reward;
        $qry->lending = $lending;
        $qry->direct = $direct;
        $qry->withdrawl = $withdrawl;
        $qry->fund_wallet = $request->post('fund_wallet');
        $qry->core_invest = $request->post('core_investment');
        $qry->lime_invest = $request->post('lime_investment');
        $qry->droid_invest = $request->post('droid_investment');
        $qry->total_invest = $request->post('total_investment');
        $qry->bonus_inc = $request->post('bonus_income');
        $qry->light_lvl_inc = $request->post('light_level_income');
        $qry->total_inc = $request->post('total_income');
        $qry->save();

        session()->flash('successMsg', 'Data updated Successfully!');
        return redirect()->back();
    }

    public function changePass()
    {
        $result['admin'] = Admin::find(1);
        return view('admin.change-password')->with($result);
    }

    public function sendMails()
    {
        return view('admin.send-mails');
    }

    function InsertMail(Request $request)
    {
        $request->validate([
            'memberid' => 'required',
            'subject' => 'required',
            'title' => 'required',
            'message' => 'required'
        ]);
        $memberid = $request->post('memberid');

        $var = MemberDetail::where('memberid', $memberid)->first();
        $name = $var->first_name . ' ' . $var->last_name;
        $email = $var->email;
        $subject = $request->post('subject');
        if ($var) {

            if ($email != '') {
                $mailData = [
                    'name' => $name,
                    'email' => $email,
                    'subject' => $request->post('subject'),
                    'title' => $request->post('title'),
                    'adm_message' => $request->post('message'),
                ];
                $user['to'] = $email;
                Mail::send('admin.mail.custom-mail', $mailData, function ($message) use ($user, $subject) {

                    $message->to($user['to']);
                    $message->subject($subject);
                });
            }

            session()->flash('successMsg', 'Email has been sent to members successfully.');
            return redirect()->back();
        } else {
            session()->flash('ErrorMsg', 'Memberid does not found.');
            return redirect()->back();
        }
    }

    public function chngEmail()
    {
        $result['admin'] = Admin::find(1);
        return view('admin.change-email')->with($result);
    }
    public function change(Request $request)
    {
        $request->validate([
            'password' => 'required|min:6|confirmed'
        ]);

        $var = Admin::find(1);
        $var->password = Hash::make($request->post('password'));
        $var->save();

        session()->flash('successMsg', 'Password has been changed successfully.');
        return redirect()->back();
    }

    public function changeEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        $var = Admin::find(1);
        $var->email = $request->post('email');
        $var->save();

        session()->flash('successMsg', 'Email has been changed successfully.');
        return redirect()->back();
    }



    // public function runMonthlyReturn()
    // {
    //     $basics = LendingDetail::where([['status', 'Active'], ['start_date', '!=', date('Y-m-d')]])->whereDay('start_date', date('d'))->get();
    //     foreach ($basics as $value) {
    //         $memberid = $value->memberid;
    //         $plan = $value->plan;
    //         $amount = $value->amount / 100 * $value->interest;
    //         $share = number_format($amount / 30, 2);

    //         $var = new LendingMonthlyReturn();
    //         $var->invest_id = $value['id'];
    //         $var->pay_time = $value['start_date'];
    //         $var->plan = $plan;
    //         $var->memberid = $memberid;
    //         $var->total_amount = $amount;
    //         $var->share = $share;
    //         $var->save();

    //         $qry = LendingDetail::find($value['id']);
    //         $qry->total_duration += 1;
    //         if ($qry->total_duration == 12) {
    //             $qry->interest = 12;
    //         } elseif ($qry->total_duration == 24) {
    //             $qry->interest = 15;
    //         } elseif ($qry->total_duration == 36) {
    //             $qry->interest = 18;
    //         }
    //         $qry->save();
    //     }

    //     $var = new CronRun();
    //     $var->cron_name = 'Monthly Return';
    //     $var->date = date('Y-m-d');
    //     $var->save();

    //     session()->flash('successMsg', 'Command has been successfully.');
    //     return redirect()->back();
    // }

    // public function renoAdminbreak($id)
    // {

    //     $result['lendData'] = LendingDetail::find($id);
    //     $result['ddata'] = Deduction::find(1);
    //     return view('admin.lending.reno-break-form')->with($result);
    // }

    // public function tetoAdminbreak($id)
    // {
    //     $result['tetoData'] = TetoLending::find($id);
    //     return view('admin.lending.teto-break-form')->with($result);
    // }

    // public function renoBrokenAdmin(Request $request)
    // {
    //     $request->validate([
    //         'break_amount' => 'required',
    //     ]);
    //     $id = $request->post('id');
    //     $break_amount = $request->post('break_amount');
    //     if ($break_amount < 0) {
    //         session()->flash('ErrorMsg', 'Invalid amount input');
    //         return redirect()->back();
    //     }
    //     $var = LendingDetail::find($id);
    //     $memberid = $var->memberid;
    //     $interest = $var->interest;
    //     $mem = MemberDetail::where('memberid', $memberid)->first();
    //     $invest = $request->post('amount');

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

    //     $ded = Deduction::find(1);
    //     $rate = $ded->break;
    //     $net_rate = 100 - $rate;

    //     if ($break_amount == $invest) {
    //         $sqry = LendingMonthlyReturn::where('invest_id', $id)->first();
    //         $sqry->status = 'Deactive';
    //         $sqry->save();
    //     } else {
    //         $newamount = ($invest - $break_amount) / 100 * $interest;
    //         $share = number_format($newamount / 30, 4);
    //         $sqry = LendingMonthlyReturn::where('invest_id', $id)->first();
    //         $sqry->share = $share;
    //         $sqry->save();
    //     }

    //     $amount = $break_amount / 100 * $net_rate;
    //     $mdata = MemberDetail::where('memberid', $memberid)->first();
    //     $sponsorid = $mdata->sponsorid;
    //     $wallet = $mdata->trade_wallet;
    //     $mdata->trade_wallet += $amount;
    //     $mdata->team_invest -= $amount;
    //     $mdata->save();

    //     $qry = new BreakData();
    //     $qry->memberid = $memberid;
    //     $qry->lending_type = $var->plan;
    //     $qry->investment_date = $var->start_date;
    //     $qry->investment = $var->amount + $var->break_amount;
    //     $qry->invested = $var->amount;
    //     $qry->break_amount = $break_amount;
    //     $qry->save();

    //     team_deinvest_update($sponsorid, $break_amount);
    //     monthly_deinvest_update($sponsorid, $break_amount);
    //     walletTransfer($memberid, $amount, 'debit', $wallet, 'Lending Break', 'Lending broke and amount added into trade wallet');

    //     session()->flash('successMsg', 'Investment has been broken and amount added into wallet successfully.');
    //     return redirect()->back();
    // }

    // public function tetoBrokenAdmin(Request $request)
    // {
    //     $request->validate([
    //         'break_amount' => 'required',
    //     ]);
    //     $id = $request->post('id');
    //     $break_amount = $request->post('break_amount');
    //     if ($break_amount < 0) {
    //         session()->flash('ErrorMsg', 'Invalid amount input');
    //         return redirect()->back();
    //     }
    //     $var = TetoLending::find($id);
    //     $memberid = $var->memberid;
    //     $mem = MemberDetail::where('memberid', $memberid)->first();
    //     $invest = $request->post('amount');

    //     $duration = $var->duration;
    //     if ($break_amount > $invest) {
    //         session()->flash('ErrorMsg', 'Break Amount can not greater than Invest Amount');
    //         return redirect()->back();
    //     }
    //     if ($duration == 12) {
    //         $mamount = ($invest - $break_amount) * 1.5;
    //     } elseif ($duration == 24) {
    //         $mamount = ($invest - $break_amount) * 3;
    //     } elseif ($duration == 36) {
    //         $mamount = ($invest - $break_amount) * 4.5;
    //     }
    //     $var->amount = $invest - $break_amount;
    //     $var->maturity_amount = $mamount + $var->amount;
    //     $var->break_status = 'Broken';
    //     $var->break_amount += $break_amount;
    //     $var->broke_date = date('Y-m-d');
    //     if ($break_amount == $invest) {
    //         $var->status = 'Deactive';
    //     }
    //     $var->save();

    //     $ded = Deduction::find(1);
    //     $rate = $ded->break;
    //     $net_rate = 100 - $rate;
    //     $amount = $break_amount / 100 * $net_rate;
    //     $memberid = $var->memberid;
    //     $mdata = MemberDetail::where('memberid', $memberid)->first();
    //     $sponsorid = $mdata->sponsorid;
    //     $wallet = $mdata->trade_wallet;
    //     $mdata->trade_wallet += $amount;
    //     $mdata->team_invest -= $amount;
    //     $mdata->save();

    //     $qry = new BreakData();
    //     $qry->memberid = $memberid;
    //     $qry->lending_type = 'Teto';
    //     $qry->investment_date = $var->invest_date;
    //     $qry->investment = $var->amount + $var->break_amount;
    //     $qry->invested = $var->amount;
    //     $qry->break_amount = $break_amount;
    //     $qry->save();

    //     team_deinvest_update($sponsorid, $break_amount);
    //     monthly_deinvest_update($sponsorid, $break_amount);
    //     walletTransfer($memberid, $amount, 'debit', $wallet, 'Teto Lending Break', 'Teto Lending broke and amount added into trade wallet');

    //     session()->flash('successMsg', 'Investment has been broken and amount added into wallet successfully.');
    //     return redirect()->back();
    // }

    public function bAccept(Request $request, $id)
    {
        $var = BreakData::find($id);
        $memberid = $var->memberid;
        $lending_id = $var->lending_id;
        $amount = $var->break_amount;
        $var->status = 'Approved';
        $var->save();

        $mem = LendingDetail::find($lending_id);
        $mem->break_status = 'Approved';
        $mem->status = 'Deactive';
        $mem->save();
        
        $upd = LendingMonthlyReturn::where('invest_id', $lending_id)->update(['status' => 'Deactive']);

        $qry = MemberDetail::where('memberid', $memberid)->first();

        $wallet = $qry->lending_wallet;
        $qry->lending_wallet += $amount;
        $qry->save();

        walletTransfer($memberid, $amount, 'debit', $wallet, 'Break data Cancelled', ' $ ' . $amount . ' have been added to fund wallet due to break data request cancellation');


        session()->flash('wMessage', 'Break Data request has been accepted successfully!');
        return redirect()->back();
    }

    public function bCancel(Request $request, $id)
    {
        $var = BreakData::find($id);
        $var->status = 'Cancelled';
        $lending_id = $var->lending_id;
        $var->save();

        $mem = LendingDetail::find($lending_id);
        $mem->break_status = 'Cancelled';
        $mem->save();

        session()->flash('wMessage', 'Break data request has been rejected successfully!');
        return redirect()->back();
    }

    public function fakeData()
    {
        return view('admin.fake-data');
    }

     public function addFakeData(Request $request)
    {
        $request->validate([
            'memberid' => 'required',
            'plan_name' => 'required',
            'amount' => 'required|numeric'
        ]);
        $memberid = $request->post('memberid');
        $plan_name = $request->post('plan_name');
        $amount = $request->post('amount');

        $var = MemberDetail::where('memberid', $memberid)->first();

        if (!$var) {
            session()->flash('failedMsg', 'Entered Memberid is not Available. Please change memberid');
            return redirect()->back();
        }

        if ($amount < 0) {
            session()->flash('failedMsg', 'Amount can not be negative. Please change amount');
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
        $qry->plan = $plan_name;
        $qry->type = 'Fake';
        $qry->amount = $amount;
        $qry->total_duration = 0;
        $qry->interest = 10;
        $qry->lock_time = 0;
        $qry->close_date = null;
        $qry->status = 'Active';
        $qry->save();

        session()->flash('successMsg', 'Fake data added successfully!');
        return redirect()->back();
    }

    public function fakeLendingDetails()
    {
        $result['data'] = LendingDetail::where('type', 'Fake')->orderBy('id', 'desc')->get();
        return view('admin.fake-lending-details')->with($result);
    }

    public function fakeLendingDelete($id)
    {
        $entry = LendingDetail::where('id', $id)->where('type', 'Fake')->first();
        if ($entry) {
            $entry->delete();
            session()->flash('successMsg', 'Fake lending entry has been deleted successfully!');
        } else {
            session()->flash('failedMsg', 'Entry not found or already deleted.');
        }
        return redirect()->back();
    }

    // ==========================================
    // Fake Reward Income Data Methods
    // ==========================================
    public function fakeRewardIncome()
    {
        $result['fakeData'] = RewardIncome::where('type', 'Fake')->orderBy('id', 'desc')->get();
        return view('admin.fake-reward-income')->with($result);
    }

    public function addFakeRewardIncome(Request $request)
    {
        $request->validate([
            'memberid' => 'required',
            'rank' => 'required',
            'month' => 'required',
            'amount' => 'required|numeric',
            'pay_date' => 'required|date',
        ]);

        $memberid = $request->post('memberid');
        $var = MemberDetail::where('memberid', $memberid)->first();

        if (!$var) {
            session()->flash('failedMsg', 'Entered Memberid is not Available. Please change memberid');
            return redirect()->back();
        }

        if ($request->post('amount') < 0) {
            session()->flash('failedMsg', 'Amount can not be negative. Please change amount');
            return redirect()->back();
        }

        $qry = new RewardIncome();
        $qry->memberid = $memberid;
        $qry->rank = $request->post('rank');
        $qry->type = 'Fake';
        $qry->month = $request->post('month');
        $qry->amount = $request->post('amount');
        $qry->pay_date = $request->post('pay_date');
        $qry->status = $request->post('status') ?? 'Paid';
        $qry->save();

        session()->flash('successMsg', 'Fake Reward Income data added successfully!');
        return redirect()->back();
    }

    public function fakeRewardIncomeDetails($id)
    {
        $data = RewardIncome::where('type', 'Fake')->where('id', $id)->firstOrFail();
        return view('admin.fake-reward-income-details', compact('data'));
    }

    public function fakeRewardIncomeEdit($id)
    {
        $data = RewardIncome::where('type', 'Fake')->where('id', $id)->firstOrFail();
        return view('admin.fake-reward-income-edit', compact('data'));
    }

    public function updateFakeRewardIncome(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'memberid' => 'required',
            'rank' => 'required',
            'month' => 'required',
            'amount' => 'required|numeric',
            'date' => 'required|date',
        ]);

        $memberid = $request->post('memberid');
        $var = MemberDetail::where('memberid', $memberid)->first();

        if (!$var) {
            session()->flash('failedMsg', 'Entered Memberid is not Available. Please change memberid');
            return redirect()->back();
        }

        if ($request->post('amount') < 0) {
            session()->flash('failedMsg', 'Amount can not be negative. Please change amount');
            return redirect()->back();
        }

        $qry = RewardIncome::where('type', 'Fake')->where('id', $request->post('id'))->firstOrFail();
        $qry->memberid = $memberid;
        $qry->rank = $request->post('rank');
        $qry->month = $request->post('month');
        $qry->amount = $request->post('amount');
        $qry->created_at = $request->post('date');
        $qry->status = $request->post('status') ?? 'Paid';
        $qry->save();

        session()->flash('successMsg', 'Fake Reward Income data updated successfully!');
        return redirect('admin/fake-reward-income/details/' . $qry->id);
    }

    // ==========================================
    // Fake Light Level Income Data Methods
    // ==========================================
    public function fakeLightLevelIncome()
    {
        $result['fakeData'] = LightLevelIncome::where('type', 'Fake')->orderBy('id', 'desc')->get();
        return view('admin.fake-light-level-income')->with($result);
    }

    public function addFakeLightLevelIncome(Request $request)
    {
        $request->validate([
            'memberid' => 'required',
            'level' => 'required',
            'installment' => 'required|integer',
            'amount' => 'required|numeric',
        ]);

        $memberid = $request->post('memberid');
        $var = MemberDetail::where('memberid', $memberid)->first();

        if (!$var) {
            session()->flash('failedMsg', 'Entered Memberid is not Available. Please change memberid');
            return redirect()->back();
        }

        if ($request->post('amount') < 0) {
            session()->flash('failedMsg', 'Amount can not be negative. Please change amount');
            return redirect()->back();
        }

        $qry = new LightLevelIncome();
        $qry->memberid = $memberid;
        $qry->level = $request->post('level');
        $qry->installment = $request->post('installment');
        $qry->amount = $request->post('amount');
        $qry->status = $request->post('status') ?? 'Paid';
        $qry->type = 'Fake';
        $qry->save();

        session()->flash('successMsg', 'Fake Light Level Income data added successfully!');
        return redirect()->back();
    }

    public function fakeLightLevelIncomeDetails($id)
    {
        $data = LightLevelIncome::where('type', 'Fake')->where('id', $id)->firstOrFail();
        return view('admin.fake-light-level-income-details', compact('data'));
    }

    public function fakeLightLevelIncomeEdit($id)
    {
        $data = LightLevelIncome::where('type', 'Fake')->where('id', $id)->firstOrFail();
        return view('admin.fake-light-level-income-edit', compact('data'));
    }

    public function updateFakeLightLevelIncome(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'memberid' => 'required',
            'level' => 'required',
            'installment' => 'required|integer',
            'amount' => 'required|numeric',
            'date' => 'required|date',
        ]);

        $memberid = $request->post('memberid');
        $var = MemberDetail::where('memberid', $memberid)->first();

        if (!$var) {
            session()->flash('failedMsg', 'Entered Memberid is not Available. Please change memberid');
            return redirect()->back();
        }

        if ($request->post('amount') < 0) {
            session()->flash('failedMsg', 'Amount can not be negative. Please change amount');
            return redirect()->back();
        }

        $qry = LightLevelIncome::where('type', 'Fake')->where('id', $request->post('id'))->firstOrFail();
        $qry->memberid = $memberid;
        $qry->level = $request->post('level');
        $qry->installment = $request->post('installment');
        $qry->amount = $request->post('amount');
        $qry->status = $request->post('status') ?? 'Paid';
        if ($request->filled('date')) {
            $inputDate = $request->post('date');
            if (preg_match('/^\d{4}-\d{2}-\d{2}$/', $inputDate)) {
                $timePart = !empty($qry->created_at) ? date('H:i:s', strtotime($qry->created_at)) : date('H:i:s');
                $qry->created_at = $inputDate . ' ' . $timePart;
            } else {
                $qry->created_at = date('Y-m-d H:i:s', strtotime($inputDate));
            }
        }
        $qry->save();

        session()->flash('successMsg', 'Fake Light Level Income data updated successfully!');
        return redirect('admin/fake-light-level-income/details/' . $qry->id);
    }

    public function forceBreakLendingAdmin($id)
    {
        $lending = LendingDetail::find($id);
        if(!$lending || $lending->status != 'Active') {
            session()->flash('failedMsg', 'Lending not found or already broken.');
            return redirect()->back();
        }

        $invest_date = $lending->created_at;
        $investment = $lending->amount;
        $memberid = $lending->memberid;

        $ded = Deduction::find(1);
        $deductionRate = $ded ? $ded->break : 0;
        $deduction_amount = $investment * $deductionRate / 100;
        $net_amount = $investment - $deduction_amount;

        $mdata = MemberDetail::where('memberid', $memberid)->first();
        if(!$mdata) {
            session()->flash('failedMsg', 'Member not found.');
            return redirect()->back();
        }
        $sponsorid = $mdata->sponsorid;
        $wallet = $mdata->lending_wallet;

        $lending->status = 'Deactive';
        $lending->break_status = 'Approved';
        $lending->break_amount += $net_amount;
        $lending->deduction = $deduction_amount;
        $lending->broke_date = date('Y-m-d');
        $lending->save();

        $mdata->lending_wallet += $net_amount;
        $mdata->team_invest -= $investment;
        $mdata->save();
        
        $qry = new BreakData();
        $qry->memberid = $memberid;
        $qry->lending_id = $lending->id;
        $qry->lending_type = $lending->plan;
        $qry->investment_date = $invest_date;
        $qry->investment = $investment;
        $qry->break_amount = $net_amount;
        $qry->deduction = $deduction_amount;
        $qry->status = 'Approved';
        $qry->broken_by = 'Admin';
        $qry->save();

        LendingMonthlyReturn::where('invest_id', $lending->id)->update(['status' => 'Deactive','type'=>'Break']);

        team_deinvest_update($sponsorid, $investment);
        monthly_deinvest_update($sponsorid, $investment);
        walletTransfer($memberid, $net_amount, 'debit', $wallet, 'Admin Lending Break', 'Lending broken by Admin and amount added to lending wallet');

        session()->flash('successMsg', 'Lending successfully broken by Admin. Deduction applied: $'.$deduction_amount);
        return redirect()->back();
    }
}

