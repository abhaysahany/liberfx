<?php

namespace App\Console\Commands;

use App\Models\MemberDetail;
use App\Models\MonthlyBiz;
use Illuminate\Console\Command;

class CreateMonthlyInvest extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create-monthly-invest';

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
}
