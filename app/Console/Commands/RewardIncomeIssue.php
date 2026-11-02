<?php

namespace App\Console\Commands;

use App\Models\MemberDetail;
use App\Models\RewardIncome;
use Illuminate\Console\Command;

class RewardIncomeIssue extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:reward-income-issue';

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
        $members = MemberDetail::where([['status', 'Active'], ['rank', '!=', 'Basic'], ['rank_date', '!=', date('Y-m-d')]])->whereDay('rank_date', date('d'))->get();
        foreach ($members as $value) {
            $rank = $value['rank'];
            $memberid = $value['memberid'];
            $rankamount = getRewardAmount($rank);
            $capping = totalInvestment($memberid);
            $achieved = totalAchieved($memberid);
            $balance = $capping - $achieved;
            if ($rankamount > $balance) {
                $amount = $balance;
            } else {
                $amount = $rankamount;
            }
            if ($capping > 0 && $amount > 0) {

                $var = new RewardIncome();
                $var->memberid = $memberid;
                $var->rank = $rank;
                $var->month = date('M');
                $var->amount = $amount;
                $var->pay_date = date('Y-m-d');
                $var->status = 'Paid';
                $var->save();

                $var = MemberDetail::where('memberid', $memberid)->first();
                $lending_wallet = $var->lending_wallet;
                $var->lending_wallet += $amount;
                $var->save();

                walletTransfer($memberid, $amount, 'debit', $lending_wallet, 'Reward Income', ' Reward Income amount added into lending wallet');
            }
        }
    }
}
