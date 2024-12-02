<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\UserCreated;
use App\Models\LeaveBalance;
use Illuminate\Support\Facades\Log;

class CreateLeaveBalance
{
    public function handle(UserCreated $event)
    {
        $user = $event->user;
        Log::info('Listener CreateLeaveBalance running for user: ' . $user->id);
        LeaveBalance::create([
            'user_id' => $user->id,
            'bulan' => now()->format('m'), // Ganti dengan nilai yang sesuai
            'tahun' => now()->format('Y'), // Menggunakan tahun saat ini
            'saldo_diberikan' => 0, // Ganti dengan nilai yang sesuai
        ]);
    }
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */

}
