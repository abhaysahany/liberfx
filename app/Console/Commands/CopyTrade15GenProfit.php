<?php

namespace App\Console\Commands;

use App\Models\CopyAccount;
use App\Models\CopyTrade;
use App\Models\SummaryCopyDetail;
use Illuminate\Console\Command;

class CopyTrade15GenProfit extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:copy-trade15-gen-profit';

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

            echo  $carried = SummaryCopyDetail::where('memberid', $memberid)->orderBy('created_at', 'DESC')->first();

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
}
