<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MemberDetailController;
use App\Http\Controllers\TerminalController;
use App\Http\Controllers\ActivationController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\CopyController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\Admin\ManualWithdrawalHistoryController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\FundController;
use App\Http\Controllers\LendingController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\TempController;
use App\Http\Controllers\TradeWalletController;
use Illuminate\Support\Facades\Mail;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [FrontendController::class, 'frontPage']);
Route::get('/about', [FrontendController::class, 'about']);
Route::get('/trading', [FrontendController::class, 'trading']);
Route::get('/course', [FrontendController::class, 'course']);
Route::get('/contact', [FrontendController::class, 'contact']);
Route::get('/terms-&-condition', [FrontendController::class, 'termsCondition']);
Route::get('/privacy-policy', [FrontendController::class, 'privacyPolicy']);


Route::get('/history', [ChartController::class, 'getUDFdata']);
Route::get('/config', [ChartController::class, 'configSet']);
Route::get('/time', [ChartController::class, 'getTime']);
Route::get('/symbols', [ChartController::class, 'getSymbol']);
Route::get('/symbol_info', [ChartController::class, 'getSymbolInfo']);
Route::get('/search', [ChartController::class, 'searchSymbol']);


Route::get('/member', [MemberDetailController::class, 'index']);
Route::get('/member/register/{id}', [MemberDetailController::class, 'signup']);
Route::get('/member/account-created', [MemberDetailController::class, 'accountCreated']);
Route::post('/userLogin', [MemberDetailController::class, 'authenticate'])->name('userLogin');
Route::post('/userRegister', [MemberDetailController::class, 'register'])->name('userRegister');
Route::post('/getSponname', [MemberDetailController::class, 'getSponname']);
Route::post('/getMember', [MemberDetailController::class, 'getMember']);
Route::get('/forget-password', [MemberDetailController::class, 'forgetPassword']);
Route::post('/retrivePassword', [MemberDetailController::class, 'retrivePassword'])->name('retrivePassword');


Route::get('/admin', [AdminController::class, 'index']);
Route::post('adminLogin', [AdminController::class, 'authenticate'])->name('adminLogin');
Route::group(['prefix' => 'admin', 'middleware' => 'AdminAuth'], function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard']);
    Route::get('/logout', [AdminController::class, 'logout']);
    Route::get('/dash-messages', [AdminController::class, 'dashMessages']);
    Route::post('/dashMsg', [AdminController::class, 'dashMsg'])->name('dashMsg');
    Route::get('/dash-messages/delete/{id}', [AdminController::class, 'dashMsgDelete']);

     //Dash Videoes
    Route::get('/dash-videos', [AdminController::class, 'dashVideos']);
    Route::post('/uploadDashVid', [AdminController::class, 'uploadDashVid'])->name('uploadDashVid');
    Route::get('/dash-video/status-change/{id}', [AdminController::class, 'dashVidStatusChange']);
    Route::get('/dash-video/delete/{id}', [AdminController::class, 'dashVidDelete']);
    
    Route::get('/member-details', [AdminController::class, 'details']);
    Route::get('/member-security', [AdminController::class, 'security']);
    Route::get('/member-investment', [AdminController::class, 'meminvestment']);
    Route::get('/monthly-detailed/{memberid}', [AdminController::class, 'monDetailed']);
    Route::post('securityUpdate', [AdminController::class, 'securityUpdate'])->name('securityUpdate');
    Route::get('member-login/{id}', [AdminController::class, 'memberLogin']);
    Route::get('/account-control', [AdminController::class, 'accountControl']);
    Route::get('/account-control/{id}', [AdminController::class, 'statusChange']);
    Route::get('/members/member-update/{id}', [AdminController::class, 'memberUpdate']);
    Route::post('/updateDetails', [AdminController::class, 'updateDetails'])->name('updateDetails');
    Route::get('/addon-data', [AdminController::class, 'AddonData']);
    Route::get('/addon-data/edit/{id}', [AdminController::class, 'AddonDataEdit']);
    Route::post('/AddonDataInsert', [AdminController::class, 'AddonDataInsert'])->name('AddonDataInsert');
    Route::post('/AddonDataUpdate', [AdminController::class, 'AddonDataUpdate'])->name('AddonDataUpdate');
    Route::get('/run-monthly-return', [AdminController::class, 'runMonthlyReturn']);
    Route::get('/fake-data', [AdminController::class, 'fakeData']);
    Route::post('/addFakeData', [AdminController::class, 'addFakeData'])->name('addFakeData');
    Route::get('/fake-lending-details', [AdminController::class, 'fakeLendingDetails']);
    Route::get('/fake-lending-details/delete/{id}', [AdminController::class, 'fakeLendingDelete'])->name('fakeLendingDelete');

    // Fake Reward Income Data
    Route::get('/fake-reward-income', [AdminController::class, 'fakeRewardIncome']);
    Route::post('/addFakeRewardIncome', [AdminController::class, 'addFakeRewardIncome'])->name('addFakeRewardIncome');
    Route::get('/fake-reward-income/details/{id}', [AdminController::class, 'fakeRewardIncomeDetails']);
    Route::get('/fake-reward-income/edit/{id}', [AdminController::class, 'fakeRewardIncomeEdit']);
    Route::post('/updateFakeRewardIncome', [AdminController::class, 'updateFakeRewardIncome'])->name('updateFakeRewardIncome');

    // Fake Light Level Income Data
    Route::get('/fake-light-level-income', [AdminController::class, 'fakeLightLevelIncome']);
    Route::post('/addFakeLightLevelIncome', [AdminController::class, 'addFakeLightLevelIncome'])->name('addFakeLightLevelIncome');
    Route::get('/fake-light-level-income/details/{id}', [AdminController::class, 'fakeLightLevelIncomeDetails']);
    Route::get('/fake-light-level-income/edit/{id}', [AdminController::class, 'fakeLightLevelIncomeEdit']);
    Route::post('/updateFakeLightLevelIncome', [AdminController::class, 'updateFakeLightLevelIncome'])->name('updateFakeLightLevelIncome');


    // Member KYC Management
    Route::get('/new-kyc-requests', [AdminController::class, 'kycRequests']);
    Route::get('/verified-kyc-requests', [AdminController::class, 'verifiedKyc']);
    Route::post('updateKYC', [AdminController::class, 'updateKYC'])->name('updateKYC');
    Route::post('updatePan', [AdminController::class, 'updatePan'])->name('updatePan');
    Route::post('updateAfront', [AdminController::class, 'updateAfront'])->name('updateAfront');
    Route::post('updateAback', [AdminController::class, 'updateAback'])->name('updateAback');

    Route::get('/KYC/view/{id}', [AdminController::class, 'kycView']);
    Route::get('/kyc/verify/{id}', [AdminController::class, 'kycVerify']);
    Route::get('/kyc/reject/{id}', [AdminController::class, 'kycReject']);
    Route::post('rejectReason', [AdminController::class, 'rejectReason'])->name('rejectReason');

    // Coin management
    Route::get('/coin-change', [AdminController::class, 'coingrowthView']);
    Route::get('/coin-base-price', [AdminController::class, 'coinBasePrice']);
    Route::post('/changeBase', [AdminController::class, 'changeBase'])->name('changeBase');
    Route::get('/change-history', [AdminController::class, 'changehistory']);
    Route::get('/change-history/delete/{id}', [AdminController::class, 'ChangeHistoryDelete']);
    Route::post('/coingrowth', [AdminController::class, 'coingrowth'])->name('coingrowth');
    Route::post('/changeBase', [AdminController::class, 'changeBase'])->name('changeBase');
    Route::get('/fund-request-stat', [AdminController::class, 'fundReqStats']);
    Route::get('/edit-fundreq-stat/{id}', [AdminController::class, 'editFundStat']);
    Route::post('/fundStats', [AdminController::class, 'fundStats'])->name('fundStats');

    Route::get('/funds/add-funds', [AdminController::class, 'addFunds']);
    Route::get('/funds/deduct-funds', [AdminController::class, 'deductFunds']);
    Route::post('addMemFunds', [AdminController::class, 'addMemFunds'])->name('addMemFunds');
    Route::post('deductMemFunds', [AdminController::class, 'deductMemFunds'])->name('deductMemFunds');
    Route::get('/funds/add-funds-details', [AdminController::class, 'addFundsDetails']);
    Route::get('/funds/fund-requets', [AdminController::class, 'fundrequest']);
    Route::get('/funds/request-history', [AdminController::class, 'reqhistory']);
    Route::post('refreshCoins', [AdminController::class, 'refreshCoins'])->name('refreshCoins');
    Route::get('/accept-request/{id}', [FundController::class, 'acceptReq']);
    Route::get('/reject-request/{id}', [FundController::class, 'rejectReq']);

    //Lending Section
    // Route::get('/lending/break-request', [AdminController::class, 'breakData']);
    // Route::get('/lending/break-details', [AdminController::class, 'breakDetail']);
    
    Route::get('/lending/micro-lendings', [AdminController::class, 'MicroLendings']);
    Route::get('/lending/core-lendings', [AdminController::class, 'CoreLendings']);
    Route::get('/lending/lime-lendings', [AdminController::class, 'LimeLendings']);
    Route::get('/lending/droid-lendings', [AdminController::class, 'DroidLendings']);
    Route::get('/lending/new-break-request', [LendingController::class, 'newBreakReq']);
    Route::get('/lending/approved-break-request', [LendingController::class, 'appBreakReq']);
    Route::get('/lending/rejected-break-request', [LendingController::class, 'rejBreakReq']);
    Route::get('/lending/view-image/{id}', [LendingController::class, 'viewImage']);
    Route::get('/lending/approved-request/{id}', [LendingController::class, 'statusApproReq']);
    Route::get('/lending/reject-request/{id}', [LendingController::class, 'statusRejectReq']);
    // Route::get('/investment-break/reno/{id}', [AdminController::class, 'renoAdminbreak']);
    // Route::get('/investment-break/teto/{id}', [AdminController::class, 'tetoAdminbreak']);
    // Route::post('renoBrokenAdmin', [AdminController::class, 'renoBrokenAdmin'])->name('renoBrokenAdmin');
    // Route::post('tetoBrokenAdmin', [AdminController::class, 'tetoBrokenAdmin'])->name('tetoBrokenAdmin');
    
    Route::get('/break/accept/{id}', [AdminController::class, 'bAccept']);
    Route::get('/break/cancel/{id}', [AdminController::class, 'bCancel']);
    
    // Admin force break lending
    Route::get('/lending/force-break/{id}', [AdminController::class, 'forceBreakLendingAdmin'])->name('forceBreakLendingAdmin');

    //Copy Trade 
    Route::get('/create-trade', [CopyController::class, 'createTrade']);
    Route::get('/trading-detail', [CopyController::class, 'tradingDetail']);
    Route::get('/weekly-detail', [CopyController::class, 'weeklyDetail']);
    Route::get('/member-deposit', [CopyController::class, 'memberDeposit']);
    Route::post('insertTrade', [CopyController::class, 'insertTrade'])->name('insertTrade');
    Route::get('/account-details', [CopyController::class, 'accountsDetail']);
    Route::get('/add-members/{id}', [CopyController::class, 'addMembers']);
    Route::post('addCopyMembers', [CopyController::class, 'addCopyMembers'])->name('addCopyMembers');
    Route::get('/copy-summary', [CopyController::class, 'copySummary']);
    Route::get('/copy-history', [CopyController::class, 'copySummaryHistory']);
    Route::get('/new-pay-slip', [CopyController::class, 'newPaySlips']);
    Route::get('/slip-history', [CopyController::class, 'slipHistory']);
    Route::get('/accept-pay-slip/{id}', [CopyController::class, 'acceptPaySlip']);

    //Course Detail
    Route::get('/course/all-courses', [AdminController::class, 'allCourses']);
    Route::get('/course/edit-course/{id}', [AdminController::class, 'editCourse']);
    Route::post('editCourseData', [AdminController::class, 'editCourseData'])->name('editCourseData');
    Route::get('/course/course-detail', [AdminController::class, 'courseDetail']);

    //Income Section
    // Route::get('/income/roi-incomes', [AdminController::class, 'roiIncomes']);
    Route::get('/income/level-incomes', [AdminController::class, 'levelIn']);
    Route::get('/income/reward-incomes', [AdminController::class, 'rewardIn']);
    Route::get('/income/lending-incomes', [AdminController::class, 'lendingIn']);
    Route::get('/income/light-level-incomes', [AdminController::class, 'lightLevelIncomes']);

    //Level Stat
    Route::get('/level-stats', [AdminController::class, 'levelStat']);
    Route::post('levelStats', [AdminController::class, 'levelStats'])->name('levelStats');
    Route::get('/edit-level-stat/{id}', [AdminController::class, 'LevelStatEdit']);

    //Rank Ratio
    Route::get('/rank-ratios', [AdminController::class, 'rankRatio']);
    Route::post('rankRatios', [AdminController::class, 'rankRatios'])->name('rankRatios');

    //Rank Ratio
    Route::get('/deduction', [AdminController::class, 'deduction']);
    Route::post('dedtion', [AdminController::class, 'dedtion'])->name('dedtion');

    //Payment Management
    Route::get('/new-withdrawal-request', [AdminController::class, 'withdrawals']);
    Route::get('/cancelled-request', [AdminController::class, 'cancelledRequest']);
    Route::get('/payment-history', [AdminController::class, 'paymentHistory']);
    Route::get('/manual-withdrawal-history', [ManualWithdrawalHistoryController::class, 'index']);
    Route::post('/manual-withdrawal-history', [ManualWithdrawalHistoryController::class, 'store'])->name('manualWithdrawalHistory.store');
    Route::get('/manual-withdrawal-history/edit/{id}', [ManualWithdrawalHistoryController::class, 'edit']);
    Route::put('/manual-withdrawal-history/{id}', [ManualWithdrawalHistoryController::class, 'update'])->name('manualWithdrawalHistory.update');
    Route::delete('/manual-withdrawal-history/{id}', [ManualWithdrawalHistoryController::class, 'destroy'])->name('manualWithdrawalHistory.destroy');
    Route::get('/manual-withdrawal-history/search-member', [ManualWithdrawalHistoryController::class, 'searchMember'])->name('manualWithdrawalHistory.searchMember');
    Route::get('/trade-wallet-history', [AdminController::class, 'tradeWalletHistory']);
    Route::get('/withdrawal/accept/{id}', [AdminController::class, 'wAccept']);
    Route::get('/withdrawal/cancel-page/{id}', [AdminController::class, 'wCancelPage']);
    Route::post('/withdrawalCancel', [AdminController::class, 'withdrawalCancel'])->name('withdrawalCancel');
    //Route::get('/withdrawal/cancel/{id}', [AdminController::class, 'wCancel']);

    //Achievers Images Section//
    Route::get('/welcome-images', [AdminController::class, 'welcomeImages']);
    Route::post('/acheivImage', [AdminController::class, 'welImage'])->name('acheivImage');
    Route::get('/achv-image/delete/{id}', [AdminController::class, 'welcomeImagesDelete']);

    //News Section
    Route::get('/send-news', [AdminController::class, 'sendNews']);
    Route::post('/insertNews', [AdminController::class, 'insertNews'])->name('insertNews');
    Route::get('/news/edit/{id}', [AdminController::class, 'newsEdit']);
    Route::post('updateNews', [AdminController::class, 'updateNews'])->name('updateNews');
    Route::get('/news/delete/{id}', [AdminController::class, 'newsDelete']);

    //profile admin
    Route::get('/change-password', [AdminController::class, 'changePass']);
    Route::get('/change-email', [AdminController::class, 'chngEmail']);
    Route::post('/changePassword', [AdminController::class, 'change'])->name('changePassword');
    Route::post('/changeEmail', [AdminController::class, 'changeEmail'])->name('changeEmail');

    //Custom Mail
    Route::get('/send-mails', [AdminController::class, 'sendMails']);
    Route::post('/InsertMail', [AdminController::class, 'InsertMail'])->name('InsertMail');

    //support ticket sections
    Route::get('/support/new-support-ticket', [SupportController::class, 'newSupport']);
    Route::get('/support/open-support-ticket', [SupportController::class, 'openSupport']);
    Route::get('/support/close-support-ticket', [SupportController::class, 'closeSupport']);
    Route::get('/support/view-support-ticket/{id}', [SupportController::class, 'viewSupport']);
    Route::get('/support/view-closed-ticket/{id}', [SupportController::class, 'viewClosed']);
    Route::get('/closed-ticket/{id}', [SupportController::class, 'closedTicket']);
    Route::post('/Ticket', [SupportController::class, 'Ticket'])->name('Ticket');
    Route::post('/support/edit-ticket-message', [SupportController::class, 'editTicketMessage'])->name('editTicketMessage');
});


Route::group(['prefix' => 'member', 'middleware' => 'MemberAuth'], function () {

    Route::get('/dashboard', [MemberDetailController::class, 'dashboard']);
    Route::get('/course-dashboard', [MemberDetailController::class, 'courseDash']);
    Route::get('/lending-dashboard', [MemberDetailController::class, 'lendingDash']);
    Route::get('/logout', [MemberDetailController::class, 'logout']);
    Route::get('/delete-session/{model}', [MemberDetailController::class, 'deleteModel']);

    //trade routes
    Route::get('/exchange-type', [TerminalController::class, 'exchangeType']);
    Route::get('/exchange/{type}/{token}', [TerminalController::class, 'exchange']);
    Route::get('/assets', [TerminalController::class, 'assets']);
    Route::post('placeLimitOrder', [TerminalController::class, 'placeLimitOrder'])->name('placeLimitOrder');
    Route::post('placeMarketOrder', [TerminalController::class, 'placeMarketOrder'])->name('placeMarketOrder');
    Route::post('sellLimitOrder', [TerminalController::class, 'sellLimitOrder'])->name('sellLimitOrder');
    Route::post('sellMarketOrder', [TerminalController::class, 'sellMarketOrder'])->name('sellMarketOrder');

    //orders View routes
    Route::get('/orders', [MemberDetailController::class, 'orders']);

    //News
    Route::get('/news', [MemberDetailController::class, 'showNews']);

    //Profile Section
    Route::get('/profile', [MemberDetailController::class, 'profile']);
    Route::get('/security', [MemberDetailController::class, 'security']);
    Route::get('/kyc-details', [MemberDetailController::class, 'kycdetails']);
    Route::get('/qr-code', [MemberDetailController::class, 'qrcode']);
    Route::post('insertProfile', [MemberDetailController::class, 'insertPdata'])->name('insertProfile');
    Route::post('updateKyc', [MemberDetailController::class, 'updateKycData'])->name('updateKyc');
    Route::post('qrCodeData', [MemberDetailController::class, 'qrCodeData'])->name('qrCodeData');
    Route::post('txnChange', [MemberDetailController::class, 'txnChange'])->name('txnChange');
    Route::post('otpTxnChange', [MemberDetailController::class, 'otpTxnChange'])->name('otpTxnChange');
    Route::post('passChange', [MemberDetailController::class, 'passChange'])->name('passChange');
    Route::post('otpPassChange', [MemberDetailController::class, 'otpPassChange'])->name('otpPassChange');

    // Route::post('mpassChange', [MemberDetailController::class, 'mpassChange'])->name('mpassChange');
    // Route::post('mtxnChange', [MemberDetailController::class, 'mtxnChange'])->name('mtxnChange');
    Route::get('/profile/mt4-details', [MemberDetailController::class, 'mt4Details']);
    Route::post('mt4Reg', [MemberDetailController::class, 'mt4Reg'])->name('mt4Reg');

    //Wallet Section
    Route::get('/wallet', [MemberDetailController::class, 'wallet']);
    Route::get('/automatic-funds', [MemberDetailController::class, 'automaticFunds']);
    Route::get('/add-funds', [MemberDetailController::class, 'addfunds']);
    Route::post('addFund', [FundController::class, 'addFund'])->name('addFund');
    Route::get('/fund-request', [FundController::class, 'fundRequest']);
    Route::post('FundReq', [FundController::class, 'FundReq'])->name('FundReq');
    Route::get('/wallet/wallet-details', [FundController::class, 'walletTransfer']);
    Route::post('/instantFunds', [FundController::class, 'instantFunds'])->name('instantFunds');

    //wallet to p2p transfer
    Route::get('/wallet/wallet-to-p2p', [FundController::class, 'walletToP2P']);
    Route::post('walletOtpVerify', [FundController::class, 'walletOtpVerify'])->name('walletOtpVerify');
    Route::post('walletP2pOtpVerify', [FundController::class, 'walletP2pOtpVerify'])->name('walletP2pOtpVerify');
    Route::post('walletP2pTransfer', [FundController::class, 'walletP2pTransfer'])->name('walletP2pTransfer');

    //wallet to p2p transfer
    Route::get('/wallet/wallet-to-exchange', [FundController::class, 'walletToExchange']);
    Route::post('walletExchangeTransfer', [FundController::class, 'walletExchangeTransfer'])->name('walletExchangeTransfer');
    Route::post('walletExngOtpVerify', [FundController::class, 'walletExngOtpVerify'])->name('walletExngOtpVerify');

    // Exchange Wallet Section
    // Route::get('/trade-wallet', [TradeWalletController::class, 'walletTrade']);
    // Route::get('/add-trade-funds', [TradeWalletController::class, 'addTradefunds']);
    // Route::post('addTradeFund', [TradeWalletController::class, 'addTradeFund'])->name('addTradeFund');
    // Route::get('/trade-fund-request', [TradeWalletController::class, 'fundTradeRequest']);
    // Route::post('TradeFundReq', [TradeWalletController::class, 'TradeFundReq'])->name('TradeFundReq');
    // Route::post('/instantTradeFunds', [TradeWalletController::class, 'instantTradeFunds'])->name('instantTradeFunds');
    // Route::get('/payment-success-trade/{orderid}', [TradeWalletController::class, 'payTradeSuccess']);
    // Route::get('/payment-cancel-trade/{orderid}', [TradeWalletController::class, 'payTradeCancel']);
    // Route::get('/wallet/trade-wallet-details', [TradeWalletController::class, 'walletTradeTransfer']);

    //Course route
    Route::get('/voxa-course', [CourseController::class, 'voxaCourse']);
    Route::get('/course-buy/{cid}', [CourseController::class, 'courseBuy']);
    Route::post('buyCourse', [CourseController::class, 'buyCourse'])->name('buyCourse');
    Route::get('/product-otp-send/{course_name}/{price}', [CourseController::class, 'productOtpSend']);
    Route::get('/course-history', [CourseController::class, 'courseHistory']);

    //Copy trading route
    Route::get('/account-details', [MemberDetailController::class, 'accountDetails']);
    Route::post('insertAccount', [MemberDetailController::class, 'insertAccount'])->name('insertAccount');
    Route::get('/trading-details', [MemberDetailController::class, 'tradingDetails']);
    Route::get('/weekly-details', [MemberDetailController::class, 'weeklyDetails']);
    Route::get('/copy-summary-details', [CopyController::class, 'copySummaryDetails']);
    Route::get('/pay-now/{id}', [CopyController::class, 'copyNowPage']);
    Route::post('payCopyPayment', [CopyController::class, 'payCopyPayment'])->name('payCopyPayment');

    //lending section
    Route::get('/lending', [LendingController::class, 'lending']);
    Route::get('/lending-details', [LendingController::class, 'lendingDetails']);
    Route::post('MicroLending', [LendingController::class, 'MicroLending'])->name('MicroLending');
    Route::post('CoreLending', [LendingController::class, 'CoreLending'])->name('CoreLending');
    Route::post('LimeLending', [LendingController::class, 'LimeLending'])->name('LimeLending');
    Route::post('DroidLending', [LendingController::class, 'DroidLending'])->name('DroidLending');
    Route::get('/investment-break', [LendingController::class, 'InvestBreak']);
    Route::get('/investment-break/lending/{id}', [LendingController::class, 'InvestLendBreak']);
    Route::post('LendingBroken', [LendingController::class, 'LendingBroken'])->name('LendingBroken');
    Route::get('break-otp-send/{memberid}', [LendingController::class, 'breakOtpSend']);

    //member lending section
    Route::get('/member-lending', [LendingController::class, 'memlending']);
    Route::post('memCoreLending', [LendingController::class, 'memCoreLending'])->name('memCoreLending');
    Route::post('memLimeLending', [LendingController::class, 'memLimeLending'])->name('memLimeLending');
    Route::post('memDroidLending', [LendingController::class, 'memDroidLending'])->name('memDroidLending');

    //withdrawal route
    Route::post('initiate-withdrawal', [FundController::class, 'withdrawal'])->name('initiate-withdrawal');
    Route::post('initiate-withdrawal-trx', [FundController::class, 'withdrawalTrx'])->name('initiate-withdrawal-trx');
    Route::post('initiate-withdrawal-btc', [FundController::class, 'withdrawalBtc'])->name('initiate-withdrawal-btc');
    Route::post('initiate-withdrawal-trc20', [FundController::class, 'withdrawalTrc20'])->name('initiate-withdrawal-trc20');

    Route::get('/income/level-incomes', [IncomeController::class, 'levelIncome']);
    Route::get('/income/direct-incomes', [IncomeController::class, 'directIncome']);
    // Route::get('/income/roi-incomes', [IncomeController::class, 'roiIncomes']);
    Route::get('/income/reward-incomes', [IncomeController::class, 'rewardIncomes']);
    Route::get('/income/light-lev-incomes', [IncomeController::class, 'lightLevIncomes']);
    Route::get('/income/lending-incomes', [LendingController::class, 'lendingIncomes']);
    Route::get('/income/monthly-invest', [LendingController::class, 'monthlyInvest']);

    Route::get('/account/account-activation', [ActivationController::class, 'accountActivation']);
    Route::get('/account/member-activation', [ActivationController::class, 'memberActivation']);
    Route::get('/account/upgrade-activation', [ActivationController::class, 'activationUpgrade']);
    Route::get('/account/packages-details', [ActivationController::class, 'packageDetails']);
    Route::get('/account/member-activation', [ActivationController::class, 'memberActivation']);

    Route::post('activateUser', [ActivationController::class, 'activateUser'])->name('activateUser');
    Route::post('upgradeUser', [ActivationController::class, 'upgradeUser'])->name('upgradeUser');
    Route::post('memberActivate', [ActivationController::class, 'memberActivate'])->name('memberActivate');

    //Geneology Section
    Route::get('/team/geneology', [MemberDetailController::class, 'geneology']);
    Route::get('/team/view-geneology/{id}', [MemberDetailController::class, 'ViewGeneology']);
    Route::get('/direct-team', [MemberDetailController::class, 'directteam']);
    Route::get('/level-details', [MemberDetailController::class, 'leveldetails']);
    Route::get('/level-members-details/{level}', [MemberDetailController::class, 'lelMemDetails']);

    //p2p wallet
    Route::get('/p2p-wallet', [FundController::class, 'p2pwallet']);
    Route::get('/p2p-to-exchange', [FundController::class, 'p2pToExchange']);
    // Route::get('/p2p/fund-transfer', [FundController::class, 'fundTransfer']);
    Route::post('fundTrans', [FundController::class, 'fundTrans'])->name('fundTrans');
    Route::post('fundExngTrans', [FundController::class, 'fundExngTrans'])->name('fundExngTrans');
    Route::get('/p2p-history', [FundController::class, 'p2pHistory']);

    //Exchange Wallet
    Route::get('/exc/exchange-wallet', [TerminalController::class, 'excWallet']);
    Route::post('excTransfer', [TerminalController::class, 'excTransfer'])->name('excTransfer');
    Route::get('/exc/exchange-history', [TerminalController::class, 'excHistory']);

    Route::get('/support/create-ticket', [SupportController::class, 'createTick']);
    Route::get('/support/support-tickets', [SupportController::class, 'supportTickets']);
    Route::get('/support/view-support-ticket/{tid}', [SupportController::class, 'ViewsupportTickets']);
    Route::post('/createTicket', [SupportController::class, 'createTicket'])->name('createTicket');
    Route::post('/MbReplyTicket', [SupportController::class, 'MbReplyTicket'])->name('MbReplyTicket');

    //trade routes
    //Route::get('/exchange/{token}', [TerminalController::class, 'exchange']);
    Route::get('/market', [MemberDetailController::class, 'market']);

    Route::post('getExchangeData', [ChartController::class, 'getExchangeData'])->name('getExchangeData');
});

// Route::get('/copyTrade15GenProfit', [TempController::class, 'copyTrade15GenProfit']);

// Route::get('/monthlyReturn', [TempController::class, 'monthlyReturn']);
// Route::get('/lendingIncome', [TempController::class, 'lendingIncome']);
// Route::get('/LevelIncome', [TempController::class, 'LevelIncome']);
// Route::get('/renewLendingDetail', [TempController::class, 'renewLendingDetail']);

// Route::get('/llstatusGen', [TempController::class, 'llstatusGen']);
// Route::get('/lightLevelDis', [TempController::class, 'lightLevelDis']);

// Route::get('/courseRoiDis', [TempController::class, 'courseRoiDis']);

// Route::get('/rewardRankGeneration', [TempController::class, 'rewardRankGeneration']);
// Route::get('/rewardIncomeIssue', [TempController::class, 'rewardIncomeIssue']);


// Route::get('/check', [TempController::class, 'check']);

Route::get('/temp', function () {
    // $result['name'] = 'ronak';
    // $result['memberid'] = 'LFX123456';
    // $result['password'] = '20060706';

    // $name = 'ronak';
    // $memberid = 'LFX123456';
    // $password = '20060706';
    // if ($email != '') {
    //     $mailData = [
    //         'name' => $name,
    //         'memberid' => $memberid,
    //         'password' => $password,
    //         'email' => $email,
    //     ];
    //     $user['to'] = $email;
    //     Mail::send('member.mails.forget-password-mail', $mailData, function ($message) use ($user) {

    //         $message->to($user['to']);
    //         $message->subject('Liberfx KYC Mail');
    //     });
    // }
    // return view('member.mails.forget-password-mail')->with($result);
});
