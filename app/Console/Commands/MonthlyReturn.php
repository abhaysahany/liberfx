<?php

namespace App\Console\Commands;

use App\Models\LendingDetail;
use App\Models\LendingMonthlyReturn;
use Illuminate\Console\Command;

class MonthlyReturn extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:monthly-return';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
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
}
