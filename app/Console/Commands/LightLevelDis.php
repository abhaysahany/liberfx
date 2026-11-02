<?php

namespace App\Console\Commands;

use App\Models\LightLevelIncome;
use App\Models\MemberDetail;
use Illuminate\Console\Command;

class LightLevelDis extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:light-level-dis';

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
}
