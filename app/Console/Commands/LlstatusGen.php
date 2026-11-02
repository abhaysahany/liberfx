<?php

namespace App\Console\Commands;

use App\Models\MemberDetail;
use Illuminate\Console\Command;

class LlstatusGen extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:llstatus-gen';

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
        $members = MemberDetail::where([['status', 'Active'], ['pdownline', '>', 0]])->get();
        foreach ($members as $value) {
            $memberid = $value->memberid;
            $biz = MemberDetail::where('sponsorid', $memberid)->sum('self_invest');

            $var = MemberDetail::find($value['id']);
            if ($biz  >= 10000 && $biz  < 20000) {
                $var->ll_status = 1;
            } elseif ($biz  >= 20000 && $biz  < 35000) {
                $var->ll_status = 2;
            } elseif ($biz  >= 35000 && $biz  < 45000) {
                $var->ll_status = 3;
            } elseif ($biz  >= 45000 && $biz  < 55000) {
                $var->ll_status = 4;
            } elseif ($biz  >= 55000 && $biz  < 65000) {
                $var->ll_status = 5;
            } elseif ($biz  >= 65000 && $biz  < 75000) {
                $var->ll_status = 6;
            } elseif ($biz  >= 75000 && $biz  < 85000) {
                $var->ll_status = 7;
            } elseif ($biz  >= 85000 && $biz  < 95000) {
                $var->ll_status = 8;
            } elseif ($biz  >= 95000 && $biz  < 105000) {
                $var->ll_status = 9;
            } elseif ($biz  >= 105000 && $biz  < 115000) {
                $var->ll_status = 10;
            } elseif ($biz  >= 115000 && $biz  < 125000) {
                $var->ll_status = 11;
            } elseif ($biz  >= 125000 && $biz  < 135000) {
                $var->ll_status = 12;
            } elseif ($biz  >= 135000 && $biz  < 145000) {
                $var->ll_status = 13;
            } elseif ($biz  >= 145000 && $biz  < 155000) {
                $var->ll_status = 14;
            } elseif ($biz  >= 155000 && $biz  < 165000) {
                $var->ll_status = 15;
            } elseif ($biz  >= 165000 && $biz  < 175000) {
                $var->ll_status = 16;
            } elseif ($biz  >= 175000 && $biz  < 185000) {
                $var->ll_status = 17;
            } elseif ($biz  >= 185000 && $biz  < 195000) {
                $var->ll_status = 18;
            } elseif ($biz  >= 195000 && $biz  < 200000) {
                $var->ll_status = 19;
            } elseif ($biz  >= 200000) {
                $var->ll_status = 20;
            } else {
                $var->ll_status = 0;
            }
            $var->save();
        }
    }
}
