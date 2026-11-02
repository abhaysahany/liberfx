<?php

namespace App\Console\Commands;

use App\Models\LendingMonthlyReturn;
use App\Models\LevelIncome;
use App\Models\MemberDetail;
use Illuminate\Console\Command;

class LevelIncomeGen extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:level-income-gen';

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
        $incomes = LendingMonthlyReturn::where([['status', 'Deactive'],['type', 'Normal'], ['level_pay', 0]])->get();
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
}
