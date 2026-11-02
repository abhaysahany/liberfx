<?php

namespace App\Http\Controllers;


use App\Models\MemberDetail;
use Illuminate\Http\Request;
use App\Models\StakingIncome;
use App\Models\DirectIncome;
use App\Models\BoosterIncome;
use App\Models\RoyaltyIncome;
use App\Models\LevelIncome;
use App\Models\LightLevelIncome;
use App\Models\RankRatio;
use App\Models\RewardIncome;
use App\Models\RoiIncome;
use App\Models\TotalRoiIncome;

class IncomeController extends Controller
{

    public function directIncome()
    {
        $result['data'] = MemberDetail::find(session('USER_ID'));
        $result['directData'] = DirectIncome::where([['memberid', $result['data']['memberid']]])->get();
        return view('member.income.direct-income')->with($result);
    }

    public function roiIncomes()
    {
        $result['data'] = MemberDetail::find(session('USER_ID'));
        $result['roiData'] = RoiIncome::where('memberid', $result['data']['memberid'])->get();
        return view('member.income.roi-income')->with($result);
    }

    public function levelIncome()
    {
        $result['data'] = MemberDetail::find(session('USER_ID'));
        $memberid = $result['data']['memberid'];
        $result['lvlData'] = LevelIncome::where([['memberid', $memberid], ['status', 'Paid']])->orderby('created_at', 'desc')->get();
        return view('member.income.level-income')->with($result);
    }

    public function lightLevIncomes()
    {
        $result['data'] = MemberDetail::find(session('USER_ID'));
        $result['lightLevelData'] = LightLevelIncome::where([['memberid', $result['data']['memberid']]])->get();
        return view('member.income.light-level-incomes')->with($result);
    }

    public function rewardIncomes()
    {
        $result['data'] = MemberDetail::find(session('USER_ID'));
        $memberid = $result['data']['memberid'];
        $result['ratio'] = RankRatio::find(1);
        $result['first'] = MemberDetail::where('sponsorid', $memberid)->orderBy('team_invest', 'DESC')->first();
        if ($result['first']) {
            $first_memb = $result['first']['memberid'];
            $result['rest'] = MemberDetail::where([['sponsorid', $memberid], ['memberid', '!=', $first_memb]])->sum('team_invest');
        } else {
            $result['rest'] = 0;
        }

        $result['rewdata'] = RewardIncome::where([['memberid', $memberid], ['status', 'Paid']])->get();
        return view('member.income.reward-incomes')->with($result);
    }
}
