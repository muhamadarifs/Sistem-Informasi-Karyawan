<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Permit extends Model
{
    use HasFactory;
    protected $table = "permits";
    protected $primaryKey = "id";
    protected $fillable = [
        'user_id',
        'department',
        'position_name',
        'position_code',
        'superior_name',
        'superior_code',
        'permit',
        'jumlah_hari',
        'from_date',
        'to_date',
        'backoffice_date',
        'tujuan',
        'ket_lambat',
        'tanggal_datang_lambat',
        'jam_datang_lambat',
        'ket_cepat',
        'tanggal_pulang_cepat',
        'jam_pulang_cepat',
        'telp',
        'status',
        'request_sign',
        'approve1_name',
        'hod_approver_1',
        'approve1_sign',
        'approve2_name',
        'approve2_sign',
        'approve3_name',
        'approve3_sign',
        'review_name',
        'review_sign',
        'approval1_date',
        'approval2_date',
        'approval3_date',
        'review_date',
        'remarks',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeWithinCurrentPeriod(Builder $query)
    {
        $currentDate = Carbon::now();
        $startOfPeriod = $currentDate->copy()->day(21)->subMonth(1)->startOfDay();
        $endOfPeriod = $currentDate->copy()->day(20)->addMonth(1)->endOfDay();

        if ($currentDate->day >= 21) {
            $startOfPeriod = $currentDate->copy()->day(21)->startOfDay();
            $endOfPeriod = $currentDate->copy()->day(20)->addMonth(1)->endOfDay();
        } else {
            $startOfPeriod = $currentDate->copy()->day(21)->subMonth(1)->startOfDay();
            $endOfPeriod = $currentDate->copy()->day(20)->endOfDay();
        }

        return $query->whereBetween('created_at', [$startOfPeriod, $endOfPeriod]);
    }
}
