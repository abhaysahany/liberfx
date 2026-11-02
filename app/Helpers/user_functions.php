<?php

use App\Models\CopyAccount;
use App\Models\CopyTrade;
use App\Models\CourseDetail;
use App\Models\MemberDetail;
use App\Models\BreakData;
use App\Models\LendingDetail;
use App\Models\LendingIncome;
use App\Models\TetoLending;
use App\Models\UplineMember;
use App\Models\UserAsset;
use App\Models\RewardIncome;
use App\Models\LevelIncome;
use App\Models\LightLevelIncome;
use App\Models\OrderDetail;
use App\Models\RoiIncome;
use App\Models\SummaryCopyDetail;
use App\Models\WithdrawalRequest;

function userId()
{
    $userid = "LFX" . rand(100000, 999999);
    $member = MemberDetail::where('memberid', $userid)->count();
    if ($member > 0) {
        userId();
    } else {
        return $userid;
    }
}

function getSponsorid($memberid)
{
    $member = MemberDetail::where('memberid', $memberid)->first();
    return $member['sponsorid'];
}


function getName($memberid)
{
    $member = MemberDetail::where('memberid', $memberid)->first();
    return $member->first_name . ' ' . $member->last_name;
}

function assetsData($memberid, $coins)
{
    $data = UserAsset::where([['memberid', $memberid], ['coins', $coins]])->first();
    return $data;
}

function updateDownline($sponsorid)
{
    if ($sponsorid != 'Root') {
        $var = MemberDetail::where('memberid', $sponsorid)->first();
        $var->downline += 1;
        $var->save();
    }
}

function updateUpline($sponsorid, $memberid)
{
    $pool = UplineMember::where('memberid', $sponsorid)->first();
    $var = new UplineMember();
    $var->memberid = $memberid;
    $var->upline_1 = $pool->memberid;
    $var->upline_2 = $pool->upline_1;
    $var->upline_3 = $pool->upline_2;
    $var->upline_4 = $pool->upline_3;
    $var->upline_5 = $pool->upline_4;
    $var->upline_6 = $pool->upline_5;
    $var->upline_7 = $pool->upline_6;
    $var->upline_8 = $pool->upline_7;
    $var->upline_9 = $pool->upline_8;
    $var->upline_10 = $pool->upline_9;
    $var->upline_11 = $pool->upline_10;
    $var->upline_12 = $pool->upline_11;
    $var->upline_13 = $pool->upline_12;
    $var->upline_14 = $pool->upline_13;
    $var->upline_15 = $pool->upline_14;
    $var->upline_16 = $pool->upline_15;
    $var->upline_17 = $pool->upline_16;
    $var->upline_18 = $pool->upline_17;
    $var->upline_19 = $pool->upline_18;
    $var->upline_20 = $pool->upline_19;
    $var->save();
}

function getCourses($memberid)
{
    $count = CourseDetail::where([['memberid', $memberid], ['status', 'Active']])->count();
    return $count;
}

function getCourseFee($memberid)
{
    $sum = CourseDetail::where([['memberid', $memberid], ['status', 'Active']])->sum('amount');
    return $sum;
}

function checkAddedMember($memberid, $tradeId)
{
    $count = CopyTrade::where([['memberid', $memberid], ['trade_id', $tradeId]])->count();
    return $count;
}

function getCopyTrades($memberid)
{
    $count = SummaryCopyDetail::where('memberid', $memberid)->count();
    return $count;
}

function getCopyProfit($memberid)
{
    $sum = SummaryCopyDetail::where('memberid', $memberid)->sum('total_profit');
    return $sum;
}

function getCopyLoss($memberid)
{
    $sum = SummaryCopyDetail::where('memberid', $memberid)->sum('total_loss');
    return $sum;
}

function totalInvestment($memberid)
{
    $var1 = MemberDetail::where('memberid', $memberid)->first();
    return $var1->self_invest;
}

function todaysLevelIncome($memberid)
{
    $var = LevelIncome::where('memberid', $memberid)->whereDate('created_at', date('Y-m-d'))->sum('amount');
    return $var;
}

function todaysLightLevelIncome($memberid)
{
    $var = LightLevelIncome::where('memberid', $memberid)->whereDate('created_at', date('Y-m-d'))->sum('amount');
    return $var;
}

function totalCoreInvestment($memberid)
{
    $sum = LendingDetail::where([['plan', 'Core'], ['memberid', $memberid]])->sum('amount');
    return $sum;
}

function totalLimeInvestment($memberid)
{
    $sum = LendingDetail::where([['plan', 'Lime'], ['memberid', $memberid]])->sum('amount');
    return $sum;
}

function totalDroidInvestment($memberid)
{
    $sum = LendingDetail::where([['plan', 'Droid'], ['memberid', $memberid]])->sum('amount');
    return $sum;
}

function totalLevelIncome($memberid)
{
    $var = LevelIncome::where([['memberid', $memberid], ['status', 'Paid']])->sum('amount');
    return $var;
}

function totalRewardIncome($memberid)
{
    $var = RewardIncome::where([['memberid', $memberid], ['status', 'Paid']])->sum('amount');
    return $var;
}

function totalRoiIncome($memberid)
{
    $var = RoiIncome::where([['memberid', $memberid], ['status', 'Paid']])->sum('amount');
    return $var;
}

function totalLightLevelIncome($memberid)
{
    $var = LightLevelIncome::where([['memberid', $memberid], ['status', 'Paid']])->sum('amount');
    return $var;
}

function totalLendingIncome($memberid)
{
    $var = LendingIncome::where([['memberid', $memberid], ['status', 'Paid']])->sum('amount');
    return $var;
}

function todaysRankIncome($memberid)
{
    $var = RewardIncome::where('memberid', $memberid)->whereDate('created_at', date('Y-m-d'))->sum('amount');
    return $var;
}

function totalAchieved($memberid)
{
    $total = todaysLevelIncome($memberid) + todaysRankIncome($memberid) + todaysLightLevelIncome($memberid);
    return $total;
}


function totalIncome($memberid)
{
    $total = totalLevelIncome($memberid)  + totalRewardIncome($memberid) + totalLendingIncome($memberid) + totalLightLevelIncome($memberid) + totalRoiIncome($memberid);
    return $total;
}

function allWalletBalance($memberid)
{
    $var = MemberDetail::where('memberid', $memberid)->first();
    return $var->course_wallet + $var->lending_wallet + $var->exng_wallet;
}

function totalWithdrawals($memberid)
{
    $var = WithdrawalRequest::where([['memberid', $memberid], ['status', 'Approved']])->sum('usdt');
    return $var;
}

function todayWithdrawals($memberid)
{
    $var = WithdrawalRequest::where([['memberid', $memberid], ['status', 'Approved']])->whereDate('created_at', date('Y-m-d'))->sum('usdt');
    return $var;
}

function totalWithdrawalsType($memberid, $type)
{
    $var = WithdrawalRequest::where([['memberid', $memberid], ['status', 'Approved'], ['wallet_type', $type]])->sum('usdt');
    return $var;
}

function todayWithdrawalsType($memberid, $type)
{
    $var = WithdrawalRequest::where([['memberid', $memberid], ['status', 'Approved'], ['wallet_type', $type]])->whereDate('created_at', date('Y-m-d'))->sum('usdt');
    return $var;
}

function totalsingleLevel($memberid, $level)
{
    $upline = 'upline_' . $level;
    $var = UplineMember::where($upline, $memberid)->count();
    return $var;
}

function totalLevelMembers($memberid)
{
    $members = MemberDetail::where('sponsorid', $memberid)->pluck('memberid');
    $total = count($members);
    while (count($members) != 0) {
        $members = MemberDetail::whereIn('sponsorid', $members)->pluck('memberid');
        $total += count($members);
    }

    return $total;
}

function pl_downline_update($memberid)
{
    $var1 = LendingDetail::where('memberid', $memberid)->count();
    $total = $var1;
    if ($total == 1) {
        $sponsorid = getSponsorid($memberid);
        if ($sponsorid != 'Root') {
            $var = MemberDetail::where('memberid', $sponsorid)->first();
            $var->pdownline += 1;
            $var->save();
        }
    }
}

function rewardCheck($memberid)
{
    $mem = MemberDetail::where('memberid', $memberid)->first();
    $rstatus = $mem->reward_status;
    if ($rstatus == 0) {
        $count = OrderDetail::where([['memberid', $memberid], ['status', 'Active']])->count();
        if ($count >= 5) {
            $mem->reward_date = date('d');
            $mem->reward_status = 1;
            $mem->save();
        }
    }
}

function selfBizDeinvest($memberid)
{
    $amount = BreakData::where([['memberid', $memberid], ['status', 'Approved']])->sum('investment');
    return $amount;

}


function selfBizCoreDeinvest($memberid, $type)
{
    $amount = BreakData::where([['memberid', $memberid], ['status', 'Approved'], ['lending_type', $type]])->sum('investment');
    return $amount;

}
