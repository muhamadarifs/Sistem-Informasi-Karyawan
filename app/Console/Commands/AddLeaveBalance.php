<?php

namespace App\Console\Commands;

use App\Models\LeaveBalance;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;

class AddLeaveBalance extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'leave-balance:add';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add leave balance for users';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $today = Carbon::now();
        $users = User::all();

        foreach ($users as $user) {
            $dateHire = Carbon::parse($user->date_hire);

            if ($today->month == $dateHire->month && $today->day == $dateHire->day) {
                $user->increment('saldo_cuti');
                $this->info('Leave balance added successfully.');
            }
        }
        return 0;
    }
}
