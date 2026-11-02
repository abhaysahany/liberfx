<?php

namespace App\Http\Controllers;

use App\Models\CopyAccount;
use App\Models\CopyTrade;
use App\Models\CourseDetail;
use App\Models\LendingDetail;
use App\Models\LendingMonthlyReturn;
use App\Models\LevelIncome;
use App\Models\LendingIncome;
use App\Models\LightLevelIncome;
use App\Models\MemberDetail;
use App\Models\MonthlyBiz;
use App\Models\RankRatio;
use App\Models\RewardIncome;
use App\Models\RoiIncome;
use App\Models\SummaryCopyDetail;
use Illuminate\Http\Request;

class TempController extends Controller
{
    //daily Command
    public function monthlyReturn()
    {
        $basics = LendingDetail::where([['status', 'Active'], ['break_status', 'Active']])->whereDay('start_date', date('d'))->get();
        foreach ($basics as $value) {
            $memberid = $value->memberid;
            $plan = $value->plan;
            $lock_time = $value->lock_time;
            $interest = $value->interest;
            $amount = $value->amount / 100 * $value->interest;
            $share = number_format($amount / 30, 4);

            if ($value->total_duration < $lock_time && $plan != 'Loyal') {
                $oldLend = LendingMonthlyReturn::where([['memberid', $memberid], ['status', 'Active'], ['plan', '!=', 'Loyal']])->update(['status' => 'Deactive']);

                $var = new LendingMonthlyReturn();
                $var->invest_id = $value['id'];
                $var->pay_time = $value['start_date'];
                $var->plan = $plan;
                $var->memberid = $memberid;
                $var->total_amount = $amount;
                $var->share = $share;
                $var->save();

                $qry = LendingDetail::find($value['id']);
                $qry->total_duration += 1;
                $qry->start_date = date('Y-m-d H:i:s', strtotime($value->start_date . '+30 days'));
                $qry->interest = $interest;
                $qry->save();
            } else {
                if ($plan == 'Core') {
                    $oldLend = LendingMonthlyReturn::where([['memberid', $memberid], ['status', 'Active'], ['plan', $plan]])->update(['status' => 'Deactive']);

                    $var = new LendingMonthlyReturn();
                    $var->invest_id = $value['id'];
                    $var->pay_time = $value['start_date'];
                    $var->plan = $plan;
                    $var->memberid = $memberid;
                    $var->total_amount = $amount;
                    $var->share = $share;
                    $var->save();

                    $qry = LendingDetail::find($value['id']);
                    $qry->total_duration += 1;
                    $qry->start_date = date('Y-m-d H:i:s', strtotime($value->start_date . '+30 days'));
                    $qry->interest = $interest;
                    $qry->save();
                } else {
                    $oldLend = LendingMonthlyReturn::where([['memberid', $memberid], ['status', 'Active'], ['plan', 'Loyal']])->update(['status' => 'Deactive']);

                    $var = new LendingMonthlyReturn();
                    $var->invest_id = $value['id'];
                    $var->pay_time = $value['start_date'];
                    $var->plan = $plan;
                    $var->memberid = $memberid;
                    $var->total_amount = $amount;
                    $var->share = $share;
                    $var->save();

                    $qry = LendingDetail::find($value['id']);
                    $qry->total_duration += 1;
                    $qry->start_date = date('Y-m-d H:i:s', strtotime($value->start_date . '+30 days'));
                    $qry->interest = $interest;
                    $qry->save();
                }
            }
        }
    }


    //daily Command
    // public function lendingIncome()
    // {
    //     // if (date('D') != 'Sun') {
    //         $time = date('H:i:s');
    //         $incomes = LendingMonthlyReturn::where([['status', 'Active'], ['installment', '<', 30]])->get();
    //         // $incomes = LendingMonthlyReturn::where([['memberid', 'LFX873471'], ['status', 'Active']])->get();
    //         foreach ($incomes as $value) {
    //             $memberid = $value->memberid;
    //             $var = MemberDetail::where('memberid', $memberid)->first();
    //             if ($var->status == 'Active') {

    //                 $plan = $value->plan;
    //                 $share = $value->share;
    //                 $installment = $value->installment + 1;

    //                 $qry = new LendingIncome();
    //                 $qry->invest_id = $value['invest_id'];
    //                 $qry->plan = $plan;
    //                 $qry->memberid = $memberid;
    //                 $qry->amount = $share;
    //                 $qry->installment = $installment;
    //                 // $qry->created_at = date('Y-06-08 H:i:s');
    //                 $qry->save();

    //                 $update = LendingMonthlyReturn::find($value['id']);
    //                 //$update->last_pay_date = date('Y-m-d');
    //                 $update->paid_amount += $share;
    //                 $update->installment += 1;
    //                 if ($installment == 30) {
    //                     $update->status = 'Deactive';
    //                 }
    //                 $update->save();


    //                 $lending_wallet = $var->lending_wallet;
    //                 $var->lending_wallet += $share;
    //                 $var->save();

    //                 walletTransfer($memberid, $share, 'debit', $lending_wallet, 'Lending Daily Income', 'Lending Daily Income amount added into lending wallet');
    //             }
    //         }
    //     // }
    // }

    public function lendingIncome()
    {
        if (date('D') != 'Sun') {
            $time = date('H:i:s');
            $incomes = LendingMonthlyReturn::where([['status', 'Active'],['memberid', 'LFX319013'],['plan', 'Lime'], ['installment', '<', 30]])->get();
            foreach ($incomes as $value) {
                $memberid = $value->memberid;
                $var = MemberDetail::where('memberid', $memberid)->first();
                if ($var->status == 'Active') {

                    $plan = $value->plan;
                    $share = $value->share;
                    $installment = $value->installment + 1;

                    $qry = new LendingIncome();
                    $qry->invest_id = $value['invest_id'];
                    $qry->plan = $plan;
                    $qry->memberid = $memberid;
                    $qry->amount = $share;
                    $qry->installment = $installment;
                    $qry->save();

                    $update = LendingMonthlyReturn::find($value['id']);
                    $update->last_pay_date = date('Y-m-d');
                    $update->paid_amount += $share;
                    $update->installment += 1;
                    if ($installment == 30) {
                        $update->status = 'Deactive';
                    }
                    $update->save();


                    $lending_wallet = $var->lending_wallet;
                    $var->lending_wallet += $share;
                    $var->save();

                    walletTransfer($memberid, $share, 'debit', $lending_wallet, 'Lending Daily Income', 'Lending Daily Income amount added into lending wallet');
                }
            }
        }
    }
    
    
    //daily command
    public function LevelIncome()
    {
        $incomes = LendingMonthlyReturn::where([['status', 'Deactive'], ['level_pay', 0]])->get();
        foreach ($incomes as $value) {
            $memberid = $value['memberid'];
            $name = getName($memberid);
            $share = $value['total_amount'];
            $sponsorid = getSponsorid($memberid);
            $limit = 21;
            for ($i = 1; $i < $limit; $i++) {
                $level = $i;
                $levelamount = levelamount($level, $share);

                $direct = 2; //levelDirect($level);

                if ($sponsorid != 'Root') {
                    $var = MemberDetail::where('memberid', $sponsorid)->first();
                    $status = $var->status;
                    if ($status == 'Active') {
                        $capping = totalInvestment($sponsorid);
                        $achieved = todaysLevelIncome($sponsorid);
                        $balance = $capping - $achieved;
                        if ($levelamount > $balance) {
                            $amount = $balance;
                        } else {
                            $amount = $levelamount;
                        }

                        if ($amount > 0) {
                            $insert = new LevelIncome();
                            $insert->memberid = $sponsorid;
                            $insert->level = $level;
                            $insert->amount = $amount;
                            $insert->level_id = $memberid;
                            $insert->name = $name;
                            $insert->trade_fee = $share;
                            if ($var->pdownline >= $direct) {
                                $insert->status = 'Paid';
                            } else {
                                $insert->status = 'Flushed';
                            }

                            $insert->save();

                            if ($var->pdownline >= $direct) {
                                $lending_wallet = $var->lending_wallet;
                                $var->lending_wallet += $amount;
                                $var->save();

                                walletTransfer($sponsorid, $amount, 'debit', $lending_wallet, 'Level Income', '' . $i . ' Level Income Amount Added into lending wallet. Payment Id-' . $insert->id);
                            }
                        }
                    }

                    $inc = MemberDetail::where('memberid', $sponsorid)->first();
                    $sponsorid = $inc['sponsorid'];
                } else {
                    break;
                }
            }

            $update = LendingMonthlyReturn::find($value['id']);
            $update->level_pay = 1;
            $update->save();
        }
    }

    //every hour
    public function llstatusGen()
    {
        $members = MemberDetail::where([['status', 'Active'], ['pdownline', '>', 0]])->get();
        foreach ($members as $value) {
            $memberid = $value->memberid;
            $biz = MemberDetail::where('sponsorid', $memberid)->sum('self_invest');

            $var = MemberDetail::find($value['id']);
            if ($biz >= 10000 && $biz < 20000) {
                $var->ll_status = 1;
            } elseif ($biz >= 20000 && $biz < 35000) {
                $var->ll_status = 2;
            } elseif ($biz >= 35000 && $biz < 45000) {
                $var->ll_status = 3;
            } elseif ($biz >= 45000 && $biz < 55000) {
                $var->ll_status = 4;
            } elseif ($biz >= 55000 && $biz < 65000) {
                $var->ll_status = 5;
            } elseif ($biz >= 65000 && $biz < 75000) {
                $var->ll_status = 6;
            } elseif ($biz >= 75000 && $biz < 85000) {
                $var->ll_status = 7;
            } elseif ($biz >= 85000 && $biz < 95000) {
                $var->ll_status = 8;
            } elseif ($biz >= 95000 && $biz < 105000) {
                $var->ll_status = 9;
            } elseif ($biz >= 105000 && $biz < 115000) {
                $var->ll_status = 10;
            } elseif ($biz >= 115000 && $biz < 125000) {
                $var->ll_status = 11;
            } elseif ($biz >= 125000 && $biz < 135000) {
                $var->ll_status = 12;
            } elseif ($biz >= 135000 && $biz < 145000) {
                $var->ll_status = 13;
            } elseif ($biz >= 145000 && $biz < 155000) {
                $var->ll_status = 14;
            } elseif ($biz >= 155000 && $biz < 165000) {
                $var->ll_status = 15;
            } elseif ($biz >= 165000 && $biz < 175000) {
                $var->ll_status = 16;
            } elseif ($biz >= 175000 && $biz < 185000) {
                $var->ll_status = 17;
            } elseif ($biz >= 185000 && $biz < 195000) {
                $var->ll_status = 18;
            } elseif ($biz >= 195000 && $biz < 200000) {
                $var->ll_status = 19;
            } elseif ($biz >= 200000) {
                $var->ll_status = 20;
            } else {
                $var->ll_status = 0;
            }
            $var->save();
        }
    }

    public function lightLevelDis()
    {
        $mem = MemberDetail::where([['status', 'Active'], ['ll_status', '>', 0]])->get();
        foreach ($mem as $value) {
            $memberid = $value->memberid;
            $llstatus = $value->ll_status;
            $count = LightLevelIncome::where([['memberid', $memberid], ['level', $llstatus]])->count();
            if ($count < 6) {
                $amount = getLightLevelAmount($llstatus);
                $var = new LightLevelIncome();
                $var->memberid = $memberid;
                $var->installment = $count + 1;
                $var->amount = $amount;
                $var->level = $llstatus;
                $var->status = 'Paid';
                $var->save();

                $qry = MemberDetail::find($value->id);
                $lending_wallet = $qry->lending_wallet;
                $qry->lending_wallet += $amount;
                $qry->save();

                walletTransfer($memberid, $amount, 'debit', $lending_wallet, 'Light Level Income', 'Light Level Income amount added into lending wallet');
            }
        }
    }


    //daily command
    public function renewLendingDetail()
    {
        $basics = LendingDetail::where([['status', 'Active'], ['plan', '!=', 'Core'], ['close_date', '<', date('Y-m-d')]])->get();
        count($basics);
        foreach ($basics as $value) {
            $renewDate = date('Y-m-d', strtotime($value->close_date . '+7days'));
            if ($renewDate == date('Y-m-d')) {

                $memberid = $value->memberid;
                $plan = $value->plan;
                $amount = $value->amount;
                $interest = $value->interest;

                if ($plan == 'Lime' && $interest < 17.5 || $plan == 'Droid' && $interest < 19) {
                    $qry = new LendingDetail();
                    $qry->start_date = date('Y-m-d H:i:s', strtotime('+ 1 day'));
                    $qry->memberid = $memberid;
                    $qry->plan = $plan;
                    $qry->amount = $amount;
                    $qry->total_duration = 0;

                    if ($plan == 'Lime') {
                        $qry->interest = $interest + 1.5;
                        $qry->lock_time = 6;
                        $qry->close_date = date('Y-m-d H:i:s', strtotime($qry->start_date . '+180 days'));
                    } elseif ($plan == 'Droid') {
                        $qry->interest = $interest + 3;
                        $qry->lock_time = 12;
                        $qry->close_date = date('Y-m-d H:i:s', strtotime($qry->start_date . '+360 days'));
                    }
                    $qry->status = 'Active';
                    $qry->save();
                } else {
                    $var = MemberDetail::where('memberid', $memberid)->first();
                    $lending_wallet = $var->lending_wallet;
                    $var->lending_wallet += $amount;
                    $var->save();

                    walletTransfer($memberid, $amount, 'debit', $lending_wallet, 'Lending Break', 'Lending Break amount added into lending wallet');
                }

                $lenddetail = LendingDetail::find($value['id']);
                $lenddetail->status = 'Deactive';
                $lenddetail->save();
            }
        }
    }

    // daily command
    public function courseRoiDis()
    {
        $incomes = CourseDetail::where([['status', 'Active'], ['start_date', date('Y-m-d')], ['installment', '<', 12]])->get();
        foreach ($incomes as $value) {
            $interest = $value->intrest;
            $amount = $value->amount / 100 * $interest;
            $memberid = $value->memberid;

            $insert = new RoiIncome();
            $insert->memberid = $memberid;
            $insert->course = $value->course;
            $insert->amount = $amount;
            $insert->intrest = $interest;
            $insert->month = date('M');
            $insert->year = date('Y');
            $insert->status = 'Paid';
            $insert->save();

            $qry = MemberDetail::where('memberid', $memberid)->first();
            $wallet = $qry->course_wallet;
            $qry->course_wallet += $amount;
            $qry->save();

            walletTransfer($memberid, $amount, 'debit', $wallet, 'Roi Income', 'Roi Income amount added into course wallet');

            $var = CourseDetail::find($value->id);
            $var->installment += 1;
            if ($var->installment == 12) {
                $var->status = 'Deactive';
            }
            $var->start_date = date('Y-m-d', strtotime('+ 1 month'));
            $var->save();
        }
    }

    //daily command
    public function rewardRankGeneration()
    {
        ini_set('max_execution_time', 600);
        $ratio = RankRatio::find(1);
        $first_ratio = $ratio->first;
        $rest_ratio = $ratio->rest;
        //Rank Generation
        $members = MemberDetail::where([['status', 'Active'], ['pdownline', '>=', 2]])->get();
        foreach ($members as $value) {
            $memberid = $value['memberid'];

            $first = MemberDetail::where('sponsorid', $memberid)->orderBy('team_invest', 'DESC')->first();
            if ($first) {
                $first_memb = $first['memberid'];
                $first_invest = $first->team_invest;
                $rest_invest = MemberDetail::where([['sponsorid', $memberid], ['memberid', '!=', $first_memb]])->sum('team_invest');

                $rank = 'Temp';

                if ($first_invest >= 3000000 / 100 * $first_ratio && $rest_invest >= 3000000 / 100 * $rest_ratio) {
                    $rank = 'Universe Club';
                } elseif ($first_invest >= 2000000 / 100 * $first_ratio && $rest_invest >= 2000000 / 100 * $rest_ratio) {
                    $rank = 'King Club';
                } elseif ($first_invest >= 1500000 / 100 * $first_ratio && $rest_invest >= 1500000 / 100 * $rest_ratio) {
                    $rank = 'Royal Ambassador';
                } elseif ($first_invest >= 1000000 / 100 * $first_ratio && $rest_invest >= 1000000 / 100 * $rest_ratio) {
                    $rank = 'Star Ambassador';
                } elseif ($first_invest >= 800000 / 100 * $first_ratio && $rest_invest >= 800000 / 100 * $rest_ratio) {
                    $rank = 'Ace Ambassador';
                } elseif ($first_invest >= 650000 / 100 * $first_ratio && $rest_invest >= 650000 / 100 * $rest_ratio) {
                    $rank = 'Imperial King';
                } elseif ($first_invest >= 500000 / 100 * $first_ratio && $rest_invest >= 500000 / 100 * $rest_ratio) {
                    $rank = 'Imperial Moon';
                } elseif ($first_invest >= 450000 / 100 * $first_ratio && $rest_invest >= 450000 / 100 * $rest_ratio) {
                    $rank = 'Imperial Star';
                } elseif ($first_invest >= 300000 / 100 * $first_ratio && $rest_invest >= 300000 / 100 * $rest_ratio) {
                    $rank = 'Prince';
                } elseif ($first_invest >= 255000 / 100 * $first_ratio && $rest_invest >= 255000 / 100 * $rest_ratio) {
                    $rank = 'Crown';
                } elseif ($first_invest >= 230000 / 100 * $first_ratio && $rest_invest >= 230000 / 100 * $rest_ratio) {
                    $rank = 'Diamond';
                } elseif ($first_invest >= 195000 / 100 * $first_ratio && $rest_invest >= 195000 / 100 * $rest_ratio) {
                    $rank = 'Emerald';
                } elseif ($first_invest >= 165000 / 100 * $first_ratio && $rest_invest >= 165000 / 100 * $rest_ratio) {
                    $rank = 'Sapphire';
                } elseif ($first_invest >= 130000 / 100 * $first_ratio && $rest_invest >= 130000 / 100 * $rest_ratio) {
                    $rank = 'Ruby';
                } elseif ($first_invest >= 85000 / 100 * $first_ratio && $rest_invest >= 85000 / 100 * $rest_ratio) {
                    $rank = 'Pearl';
                } elseif ($first_invest >= 75000 / 100 * $first_ratio && $rest_invest >= 75000 / 100 * $rest_ratio) {
                    $rank = 'Platinum';
                } elseif ($first_invest >= 55000 / 100 * $first_ratio && $rest_invest >= 55000 / 100 * $rest_ratio) {
                    $rank = 'Gold';
                } elseif ($first_invest >= 25000 / 100 * $first_ratio && $rest_invest >= 25000 / 100 * $rest_ratio) {
                    $rank = 'Silver';
                } elseif ($first_invest >= 15000 / 100 * $first_ratio && $rest_invest >= 15000 / 100 * $rest_ratio) {
                    $rank = 'Start';
                } elseif ($first_invest >= 7000 / 100 * $first_ratio && $rest_invest >= 7000 / 100 * $rest_ratio) {
                    $rank = 'Basic';
                }

                $var = MemberDetail::find($value['id']);
                $var->rank = $rank;
                if ($var->rank_date == NULL) {
                    $var->rank_date = date('Y-m-d');
                }
                $var->save();
            }
        }
    }

    //monthly command
    public function rewardIncomeIssue()
    {
        $members = MemberDetail::where([['status', 'Active'], ['rank', '!=', 'Basic'], ['rank_date', '!=', date('Y-m-d')]])->whereDay('rank_date', date('d'))->get();
        foreach ($members as $value) {
            $rank = $value['rank'];
            $memberid = $value['memberid'];
            $rankamount = getRewardAmount($rank);
            $capping = totalInvestment($memberid);
            $achieved = totalAchieved($memberid);
            $balance = $capping - $achieved;
            if ($rankamount > $balance) {
                $amount = $balance;
            } else {
                $amount = $rankamount;
            }
            if ($capping > 0 && $amount > 0) {

                $var = new RewardIncome();
                $var->memberid = $memberid;
                $var->rank = $rank;
                $var->month = date('M');
                $var->amount = $amount;
                $var->pay_date = date('Y-m-d');
                $var->status = 'Paid';
                $var->save();

                $var = MemberDetail::where('memberid', $memberid)->first();
                $lending_wallet = $var->lending_wallet;
                $var->lending_wallet += $amount;
                $var->save();

                walletTransfer($memberid, $amount, 'debit', $lending_wallet, 'Reward Income', ' Reward Income amount added into lending wallet');
            }
        }
    }

    public function copyTrade15GenProfit()
    {
        $cpAccounts = CopyAccount::all();
        $day = date('d');
        if ($day == 8) {
            $first = date('Y-m-16 H:i:s', strtotime('-1 Month'));
            $last = date('Y-m-t H:i:s', strtotime('-1 Month'));
        } elseif ($day == 13) {
            $first = date('Y-m-1 H:i:s');
            $last = date('Y-m-15 H:i:s');
        }
        foreach ($cpAccounts as $value) {
            $memberid = $value['memberid'];

            echo $carried = SummaryCopyDetail::where('memberid', $memberid)->orderBy('created_at', 'DESC')->first();

            $profit = CopyTrade::where([['memberid', $memberid], ['type', 'Profit']])->whereBetween('created_at', [$first, $last])->sum('profit_loss');

            $loss = CopyTrade::where([['memberid', $memberid], ['type', 'Loss']])->whereBetween('created_at', [$first, $last])->sum('profit_loss');

            if ($carried) {
                $total_loss = $loss + $carried->carry_forward;
            } else {
                $total_loss = $loss;
            }

            $var = new SummaryCopyDetail();
            $var->memberid = $memberid;
            $var->start_date = $first;
            $var->end_date = $last;
            $var->total_profit = $profit;
            $var->total_loss = $loss;
            if ($carried) {
                $var->brought_forward = $carried->carry_forward;
            } else {
                $var->brought_forward = 0;
            }
            $var->balance = $profit - $total_loss;
            if ($profit <= $total_loss) {
                $var->carry_forward = $profit - $total_loss;
                $var->status = 'Closed';
            } else {
                $var->carry_forward = 0;
                $var->status = 'Open';
            }
            $var->save();
        }
    }

    public function createMonthlyInvest()
    {
        if (date('d') == '01') {
            $var = MemberDetail::where([['status', 'Active'], ['monthly_invest', '>', 0]])->get();
            foreach ($var as $value) {
                $memberid = $value['memberid'];

                $result['first'] = MemberDetail::where('sponsorid', $memberid)->orderBy('monthly_invest', 'DESC')->first();
                if ($result['first']) {
                    $first_memb = $result['first']['memberid'];
                    $result['first_biz'] = $result['first']['monthly_invest'];
                    $result['rest_biz'] = MemberDetail::where([['sponsorid', $memberid], ['memberid', '!=', $first_memb]])->sum('monthly_invest');
                } else {
                    $result['rest_biz'] = 0;
                }

                $qry = new MonthlyBiz();
                $qry->memberid = $memberid;
                $qry->year = date('Y');
                $qry->month = date('M', strtotime('-1 months'));
                $qry->team_biz_first = $result['first_biz'];
                $qry->team_biz_rest = $result['rest_biz'];
                $qry->save();

                $memUpdate = MemberDetail::where('memberid', $memberid)->update(['monthly_invest' => 0]);
            }
        }
    }
    
    // public function check()
    // {
    //     $oldLend = LendingMonthlyReturn::where([['memberid','LFX541391'],['status', 'Active'], ['plan', '!=', 'Loyal']])->update(['status' => 'Deactive']);
    // }
}
