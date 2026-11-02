<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected $commands = [
        \App\Console\Commands\MonthlyReturn::class,
        \App\Console\Commands\LendingIncomeDis::class,
        \App\Console\Commands\LevelIncomeGen::class,
        \App\Console\Commands\LlstatusGen::class,
        \App\Console\Commands\LightLevelDis::class,
        \App\Console\Commands\RenewLendingDetail::class,
        \App\Console\Commands\CourseRoiDis::class,
        \App\Console\Commands\RewardRankGeneration::class,
        \App\Console\Commands\RewardIncomeIssue::class,
        \App\Console\Commands\CopyTrade15GenProfit::class,
        \App\Console\Commands\CreateMonthlyInvest::class,

    ];
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        $schedule->command('app:monthly-return')->daily();
        $schedule->command('app:lending-income-dis')->daily();
        $schedule->command('app:level-income-gen')->daily();
        $schedule->command('app:llstatus-gen')->daily();
        $schedule->command('app:light-level-dis')->daily();
        $schedule->command('app:renew-lending-detail')->daily();
        $schedule->command('app:course-roi-dis')->daily();
        $schedule->command('app:reward-rank-generation')->daily();
        $schedule->command('app:reward-income-issue')->daily();
        $schedule->command('app:copy-trade15-gen-profit')->daily();
        $schedule->command('app:create-monthly-invest')->daily();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
