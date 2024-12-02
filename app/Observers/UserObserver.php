<?php

namespace App\Observers;

use App\Models\EmployeeHistory;
use App\Models\User;

class UserObserver
{
    public function created(User $user)
    {
        EmployeeHistory::create([
            'user_id' => $user->id,
            'employee_id' => $user->employee_id,
            'employee_note' => 'Catatan Default',
        ]);
    }
}
