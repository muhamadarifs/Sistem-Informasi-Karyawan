<?php

namespace App\Observers;

use App\Models\LeaveBalance;

class LeaveBalanceObserver
{
    /**
     * Handle the LeaveBalance "created" event.
     */
    public function created(LeaveBalance $leaveBalance): void
    {
        //
    }

    /**
     * Handle the LeaveBalance "updated" event.
     */
    public function updated(LeaveBalance $leaveBalance): void
    {
        if ($leaveBalance->isDirty('bulan')) {
            $previousPeriode = $leaveBalance->getOriginal('bulan');
            $newPeriode = $leaveBalance->periode;

            // Check if the year has changed
            $previousYear = date('Y', strtotime($previousPeriode));
            $newYear = date('Y', strtotime($newPeriode));

            if ($previousYear != $newYear) {
                // Reset total_saldo_cuti to the default value (12) for a new year
                $leaveBalance->total_saldo_cuti = 12;
            } else {
                // Increment total_saldo_cuti by 1 for each monthly change
                $leaveBalance->total_saldo_cuti += 1;
            }
        }
    }

    /**
     * Handle the LeaveBalance "deleted" event.
     */
    public function deleted(LeaveBalance $leaveBalance): void
    {
        //
    }

    /**
     * Handle the LeaveBalance "restored" event.
     */
    public function restored(LeaveBalance $leaveBalance): void
    {
        //
    }

    /**
     * Handle the LeaveBalance "force deleted" event.
     */
    public function forceDeleted(LeaveBalance $leaveBalance): void
    {
        //
    }
}
