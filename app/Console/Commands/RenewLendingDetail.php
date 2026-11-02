<?php

namespace App\Console\Commands;

use App\Models\LendingDetail;
use App\Models\MemberDetail;
use Illuminate\Console\Command;

class RenewLendingDetail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:renew-lending-detail';

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
        $basics = LendingDetail::where([['status', 'Active'], ['plan', '!=', 'Loyal'], ['close_date', '<', date('Y-m-d')]])->get();
        count($basics);
        foreach ($basics as $value) {
            $renewDate = date('Y-m-d', strtotime($value->close_date . '+7days'));
            if ($renewDate == date('Y-m-d')) {

                $memberid = $value->memberid;
                $plan = $value->plan;
                $amount = $value->amount;
                $interest = $value->interest;

                if ($plan == 'Unified' && $interest < 17.5 || $plan == 'Vasted' && $interest < 19) {
                    $qry = new LendingDetail();
                    $qry->start_date = date('Y-m-d H:i:s', strtotime('+ 1 day'));
                    $qry->memberid = $memberid;
                    $qry->plan = $plan;
                    $qry->amount = $amount;
                    $qry->total_duration = 0;

                    if ($plan == 'Unified') {
                        $qry->interest = $interest + 1.5;
                        $qry->lock_time = 6;
                        $qry->close_date = date('Y-m-d H:i:s', strtotime($qry->start_date . '+180 days'));
                    } elseif ($plan == 'Vasted') {
                        $qry->interest = $interest + 3;
                        $qry->lock_time = 12;
                        $qry->close_date = date('Y-m-d H:i:s', strtotime($qry->start_date . '+360 days'));
                    }
                    $qry->status = 'Active';
                    $qry->save();
                } else {
                    $var = MemberDetail::where('memberid', $memberid)->first();
                    $wallet = $var->wallet;
                    $var->wallet += $amount;
                    $var->save();

                    walletTransfer($memberid, $amount, 'debit', $wallet, 'Lending Break', 'Lending Break amount added into wallet');
                }

                $lenddetail = LendingDetail::find($value['id']);
                $lenddetail->status = 'Deactive';
                $lenddetail->save();
            }
        }
    }
}
