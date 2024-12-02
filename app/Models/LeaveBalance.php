<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeaveBalance extends Model
{
    use HasFactory;

    protected $table = "balance_leaves";
    protected $primaryKey = "id";
    protected $fillable = [
        'user_id',
        'bulan',
        'tahun',
        'saldo_diberikan',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
