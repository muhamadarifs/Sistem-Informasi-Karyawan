<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;
    protected $table = "absensi";
    protected $primaryKey = "id";
    protected $fillable = [
        'employee_id',
        'user_id',
        'tanggal',
        'jam_masuk',
        'jam_keluar',
        'total_wh',
        'late',
        'absent',
        'ot',
        'remarks',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
