<?php

use App\Models\DirectIncome;
use App\Models\LendingDetail;
use App\Models\LendingIncome;
use App\Models\LevelIncome;
use App\Models\MemberDetail;
use App\Models\RewardIncome;
use App\Models\SupportTicket;
use App\Models\TetoIncome;
use App\Models\TetoLending;
use App\Models\WithdrawalRequest;
use App\Models\TicketText;
use App\Models\CronRun;
use App\Models\TableFundRequest;
use App\Models\BreakData;

function totalMembersadmin()
{
    $count = MemberDetail::all();
    return count($count);
}

function totalActiveMembers()
{
    $count = MemberDetail::where('status', 'Active')->get();
    return count($count);
}


function totalLendingMembers()
{
    $count = MemberDetail::where('status', 'Active')->get();
    $members = 0;
    foreach ($count as $value) {
        $memberid = $value['memberid'];
        $investment = totalInvestment($memberid);

        if ($investment > 0) {
            $members += 1;
        }
    }
    return $members;
}

function totalTempMembers()
{
    $count = MemberDetail::where('status', 'Temp')->count();
    return $count;
}

function totalblockedMembers()
{
    $count = MemberDetail::where('status', 'Blocked')->count();
    return $count;
}

function todaysWithdrawal()
{
    $sum = WithdrawalRequest::where('status', 'Approved')->whereDate('payment_date', date('Y-m-d'))->sum('usdt');
    return $sum;
}

function totalWithdrawal()
{
    $sum = WithdrawalRequest::where('status', 'Approved')->sum('usdt');
    return $sum;
}

function NewWithdrawalRequest()
{
    $sum = WithdrawalRequest::where('status', 'pending')->count();
    return $sum;
}

function totalP2PWallet()
{
    $sum = MemberDetail::where('status', 'Active')->sum('p2p_wallet');
    return $sum;
}

function totalTradeWallet()
{
    $sum = MemberDetail::where('status', 'Active')->sum('exng_wallet');
    return $sum;
}

function totalMainWallet()
{
    $sum = MemberDetail::where('status', 'Active')->sum('lending_wallet');
    return $sum;
}

function totalCourseWallet()
{
    $sum = MemberDetail::where('status', 'Active')->sum('course_wallet');
    return $sum;
}



function totalCoreInvest()
{
    $sum = LendingDetail::where('plan', 'Core')->sum('amount');
    return $sum;
}

function todaysCoreInvest()
{
    $sum = LendingDetail::where('plan', 'Core')->whereDate('created_at', date('Y-m-d'))->sum('amount');
    return $sum;
}

function totalLimeInvest()
{
    $sum = LendingDetail::where('plan', 'Lime')->sum('amount');
    return $sum;
}

function todaysLimeInvest()
{
    $sum = LendingDetail::where('plan', 'Lime')->whereDate('created_at', date('Y-m-d'))->sum('amount');
    return $sum;
}

function totalDroidInvest()
{
    $sum = LendingDetail::where('plan', 'Droid')->sum('amount');
    return $sum;
}

function todaysDroidInvest()
{
    $sum = LendingDetail::where('plan', 'Droid')->whereDate('created_at', date('Y-m-d'))->sum('amount');
    return $sum;
}

function todaysTotalInvest()
{
    $total = todaysCoreInvest() + todaysLimeInvest() + todaysDroidInvest();
    return $total;
}


function totaldeductions()
{
    $count = WithdrawalRequest::where('status', 'Approved')->sum('service_charge');
    return $count;
}

function totalDirectIn()
{
    $sum = DirectIncome::where('status', '!=', 'Flushed')->sum('amount');
    return $sum;
}

function totalLevelIn()
{
    $sum = LevelIncome::where('status', '!=', 'Flushed')->sum('amount');
    return $sum;
}

function totalLendingIn()
{
    $sum = LendingIncome::where([['status', '!=', 'Flushed']])->sum('amount');
    return $sum;
}

// function totalTetoIn()
// {
//     $sum = TetoIncome::where([['status', '!=', 'Flushed']])->sum('amount');
//     return $sum;
// }

function totalRewardIn()
{
    $sum = RewardIncome::where([['status', '!=', 'Flushed']])->sum('amount');
    return $sum;
}

function totalgrossAmount()
{
    $count = WithdrawalRequest::where('status', 'Approved')->sum('gross_amount');
    return $count;
}

function totalnetAmount()
{
    $count = WithdrawalRequest::where('status', 'Approved')->sum('net_amount');
    return $count;
}

function newKycRequests()
{
    $count = MemberDetail::where('kyc_status', 'Submitted')->count();
    return $count;
}

function newSupportRequests()
{
    $count = SupportTicket::where('support_status', 'New')->count();
    return $count;
}

function AdmUnread($ticketid)
{
    $count = TicketText::where([['ticket_id', $ticketid], ['written_by', 'Admin'], ['status', 'Unread']])->count();
    return $count;
}
function userUnread($ticketid)
{
    $count = TicketText::where([['ticket_id', $ticketid], ['written_by', 'Member'], ['status', 'Unread']])->count();
    return $count;
}

function getMonthlyreturns()
{
    // $data = CronRun::where([['cron_name', 'Monthly Return'], ['date', date('Y-m-d')]])->first();
    // if ($data) {
    //     $var = 1;
    // } else {
    //     $var = 0;
    // }
    // return $var;
}

function newFundRequests()
{
    $count = TableFundRequest::where('status', 'Requested')->count();
    return $count;
}

function newBreakRequests()
{
    $count = BreakData::where('status', 'Requested')->count();
    return $count;
}
