<?php

use App\Models\DirectIncome;
use App\Models\LevelStat;
use App\Models\UserAsset;
use App\Models\WalletTransfer;
use App\Models\MemberDetail;
use App\Models\Deduction;

function walletTransfer($memberid, $amount, $type, $wallet, $walletType, $text)
{
    if ($type == 'debit') {
        $ins = new WalletTransfer();
        $ins->memberid = $memberid;
        $ins->walletType = $walletType;
        $ins->debit = $amount;
        $ins->balance = $wallet + $amount;
        $ins->particular = $text;
        $ins->save();
    } elseif ($type == 'credit') {
        $ins = new WalletTransfer();
        $ins->memberid = $memberid;
        $ins->walletType = $walletType;
        $ins->credit = $amount;
        $ins->balance = $wallet - $amount;
        $ins->particular = $text;
        $ins->save();
    }
}

function directIncome($sponsorid, $fee, $memberid)
{

    if ($sponsorid != 'Root') {
        $var = MemberDetail::where('memberid', $sponsorid)->first();
        $status = $var->status;
        if ($status == 'Active') {
            $qry  = new DirectIncome();
            $qry->memberid = $sponsorid;
            $qry->amount = $fee / 100 * 30;
            $qry->fee = $fee;
            $qry->trade_value = $fee / 0.5 * 100;
            $qry->trade_memberid = $memberid;
            $qry->save();

            $share =  $fee / 100 * 30;

            $wallet = $var->exng_wallet;
            $var->exng_wallet += $share;
            $var->save();

            walletTransfer($sponsorid, $share, 'debit', $wallet, 'Trade Direct Income', 'Trade Direct Income amount added into wallet');
        }
    }
}

function levelamount($level, $share)
{
    $qry = LevelStat::where('level', $level)->first();
    $rate = $qry->share;
    $amount = $share / 100 * $rate;
    return $amount;
}

function levelDirect($level)
{
    $qry = LevelStat::where('level', $level)->first();
    $direct = $qry->direct;
    return $direct;
}

function getTotalInvesment($memberid)
{
    $var = UserAsset::where('memberid', $memberid)->sum('total_value');
    return number_format($var, 4);
}

function team_invest_update($sponsorid, $amount)
{

    $limit = 1000;
    for ($i = 1; $i < $limit; $i++) {
        if ($sponsorid != 'Root') {
            $query = MemberDetail::where('memberid', $sponsorid)->first();
            $query->team_invest += $amount;
            $query->save();
            $sponsorid = $query->sponsorid;
        } else {
            break;
        }
    }
}

function team_deinvest_update($sponsorid, $amount)
{

    $limit = 1000;
    for ($i = 1; $i < $limit; $i++) {
        if ($sponsorid != 'Root') {
            $query = MemberDetail::where('memberid', $sponsorid)->first();
            $query->team_invest -= $amount;
            $query->save();
            $sponsorid = $query->sponsorid;
        } else {
            break;
        }
    }
}

function monthly_invest_update($sponsorid, $amount)
{

    $limit = 1000;
    for ($i = 1; $i < $limit; $i++) {
        if ($sponsorid != 'Root') {
            $query = MemberDetail::where('memberid', $sponsorid)->first();
            $query->monthly_invest += $amount;
            $query->save();
            $sponsorid = $query->sponsorid;
        } else {
            break;
        }
    }
}

function monthly_deinvest_update($sponsorid, $amount)
{

    $limit = 1000;
    for ($i = 1; $i < $limit; $i++) {
        if ($sponsorid != 'Root') {
            $query = MemberDetail::where('memberid', $sponsorid)->first();
            $query->monthly_invest -= $amount;
            $query->save();
            $sponsorid = $query->sponsorid;
        } else {
            break;
        }
    }
}

function totalTeamInvest($memberid)
{
    $query = MemberDetail::where('sponsorid', $memberid)->sum('team_invest');
    return $query;
}

function getRewardAmount($rank)
{
    if ($rank == 'Basic') {
        $amount = 40;
    } elseif ($rank == 'Start') {
        $amount = 70;
    } elseif ($rank == 'Silver') {
        $amount = 110;
    } elseif ($rank == 'Gold') {
        $amount = 250;
    } elseif ($rank == 'Platinum') {
        $amount = 310;
    } elseif ($rank == 'Pearl') {
        $amount = 425;
    } elseif ($rank == 'Ruby') {
        $amount = 610;
    } elseif ($rank == 'Sapphire') {
        $amount = 750;
    } elseif ($rank == 'Emerald') {
        $amount = 1100;
    } elseif ($rank == 'Diamond') {
        $amount = 1500;
    } elseif ($rank == 'Crown') {
        $amount = 3100;
    } elseif ($rank == 'Prince') {
        $amount = 4100;
    } elseif ($rank == 'Imperial Star') {
        $amount = 5100;
    } elseif ($rank == 'Imperial Moon') {
        $amount = 6100;
    } elseif ($rank == 'Imperial king') {
        $amount = 8500;
    } elseif ($rank == 'Ace Ambassador') {
        $amount = 10000;
    } elseif ($rank == 'Star Ambassador') {
        $amount = 12000;
    } elseif ($rank == 'Royal Ambassador') {
        $amount = 15000;
    } elseif ($rank == 'King Club') {
        $amount = 18000;
    } elseif ($rank == 'Universe Club') {
        $amount = 30000;
    }
    return $amount;
}

function setRankCode($rank)
{
    if ($rank == 'General') {
        $code = 1;
    } elseif ($rank == 'PD') {
        $code = 2;
    } elseif ($rank == 'CC') {
        $code = 3;
    } elseif ($rank == 'VP') {
        $code = 4;
    } elseif ($rank == 'GM') {
        $code = 5;
    } elseif ($rank == 'TB') {
        $code = 6;
    } elseif ($rank == 'LN') {
        $code = 7;
    } elseif ($rank == 'BL') {
        $code = 8;
    } elseif ($rank == 'MMP') {
        $code = 9;
    } elseif ($rank == 'LB') {
        $code = 10;
    } elseif ($rank == 'PC') {
        $code = 11;
    } elseif ($rank == 'VOP') {
        $code = 12;
    } elseif ($rank == 'NN') {
        $code = 13;
    } elseif ($rank == 'Master') {
        $code = 14;
    } elseif ($rank == 'Satira') {
        $code = 15;
    } elseif ($rank == 'Emeraild') {
        $code = 16;
    } elseif ($rank == 'Rubi') {
        $code = 17;
    } elseif ($rank == 'Diamond') {
        $code = 18;
    } elseif ($rank == 'Diamond Negro') {
        $code = 19;
    } elseif ($rank == 'TETO') {
        $code = 20;
    } elseif ($rank == 'MD') {
        $code = 21;
    }
    return $code;
}

function getLightLevelAmount($llstatus)
{
    if ($llstatus == 1) {
        $amount = 30;
    } elseif ($llstatus == 2) {
        $amount = 50;
    } elseif ($llstatus == 3) {
        $amount = 70;
    } elseif ($llstatus == 4) {
        $amount = 90;
    } elseif ($llstatus == 5) {
        $amount = 100;
    } elseif ($llstatus == 6) {
        $amount = 200;
    } elseif ($llstatus == 7) {
        $amount = 310;
    } elseif ($llstatus == 8) {
        $amount = 410;
    } elseif ($llstatus == 9) {
        $amount = 510;
    } elseif ($llstatus == 10) {
        $amount = 610;
    } elseif ($llstatus == 11) {
        $amount = 710;
    } elseif ($llstatus == 12) {
        $amount = 810;
    } elseif ($llstatus == 13) {
        $amount = 910;
    } elseif ($llstatus == 14) {
        $amount = 1010;
    } elseif ($llstatus == 15) {
        $amount = 1110;
    } elseif ($llstatus == 16) {
        $amount = 1350;
    } elseif ($llstatus == 17) {
        $amount = 1450;
    } elseif ($llstatus == 18) {
        $amount = 1670;
    } elseif ($llstatus == 19) {
        $amount = 1750;
    } elseif ($llstatus == 20) {
        $amount = 1990;
    }

    return $amount;
}


function p2pwalletTransfer($memberid, $amount, $type, $p2pwallet, $walletType, $text)
{
    if ($type == 'debit') {
        $ins = new WalletTransfer();
        $ins->memberid = $memberid;
        $ins->walletType = $walletType;
        $ins->debit = $amount;
        $ins->balance = $p2pwallet + $amount;
        $ins->particular = $text;
        $ins->save();
    } elseif ($type == 'credit') {
        $ins = new WalletTransfer();
        $ins->memberid = $memberid;
        $ins->walletType = $walletType;
        $ins->credit = $amount;
        $ins->balance = $p2pwallet - $amount;
        $ins->particular = $text;
        $ins->save();
    }
}

function getDeductionRate($type)
{
    $ded = Deduction::find(1);
    if ($type == 'p2p') {
        $rate = $ded->p2p;
    } elseif ($type == 'rate') {
        $rate = $ded->rate;
    } elseif ($type == 'lending') {
        $rate = $ded->lending;
    } elseif ($type == 'break') {
        $rate = $ded->break;
    }
    return $rate;
}
