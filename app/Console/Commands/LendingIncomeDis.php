<?php

namespace App\Console\Commands;

use App\Models\LendingIncome;
use App\Models\LendingMonthlyReturn;
use App\Models\MemberDetail;
use Illuminate\Console\Command;

class LendingIncomeDis extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:lending-income-dis';

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
        if (date('D') != 'Sun') {
            $time = date('H:i:s');
            $incomes = LendingMonthlyReturn::where([['status', 'Active'], ['installment', '<', 30]])->get();
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
}
