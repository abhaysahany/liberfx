<?php

namespace App\Console\Commands;

use App\Models\CourseDetail;
use App\Models\MemberDetail;
use App\Models\RoiIncome;
use Illuminate\Console\Command;

class CourseRoiDis extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:course-roi-dis';

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
}
