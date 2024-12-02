<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeHistory extends Model
{
    use HasFactory;
    protected $table = "employee_histories";
    protected $primaryKey = "id";
    protected $fillable =[
        'user_id',
        'employee_id',
        'employee_note'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}

