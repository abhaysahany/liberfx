<?php

namespace App\Console\Commands;

use App\Models\MemberDetail;
use App\Models\RankRatio;
use Illuminate\Console\Command;

class RewardRankGeneration extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:reward-rank-generation';

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
                echo $first_invest = $first->team_invest;
                echo $rest_invest = MemberDetail::where([['sponsorid', $memberid], ['memberid', '!=', $first_memb]])->sum('team_invest');

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
}
