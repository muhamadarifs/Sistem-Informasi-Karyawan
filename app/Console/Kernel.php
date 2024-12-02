<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Console\Commands\AddLeaveBalance;
use Illuminate\Support\Facades\Log;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected $commands =[
        Commands\AddLeaveBalance::class,
    ];
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('leave-balance:add')->daily();
        // $schedule->command(AddLeaveBalance::class)->everyFiveMinutes();
        // $schedule->command('leave-balance:add')
        //          ->everyTwoMinutes()
        //          ->before(function () {
        //             Log::info('Leave balance command is about to run.');
        //          })
        //          ->after(function () {
        //             Log::info('Leave balance command has completed.');
        //          });
        // $schedule->call(function () {
        //         Log::info('Cronjob tes berhasil dijalankan');
        //     })->everyTwoMinutes();
        // $schedule->command('inspire')->hourly();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
