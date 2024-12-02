<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TesPayslip extends Model
{
    protected $table = "tes_payslips";
    protected $primaryKey = "id";
    protected $fillable = [
        'user_id',
        'qrpayslip_id',
        'periode',
        'date_print',
        'slip_no',
        'group',
        'work_day',
        'absent',
        'late',
        'cuti',
        'total_ot',
        'basic_salary',
        'allowence',
        'correction',
        'foreman_allow',
        'overtime',
        'shift_allow',
        'addition_allow',
        'bonus',
        'thr',
        'pay_absent',
        'pay_late',
        'pay_cuti',
        'other_deduc',
        'jht',
        'bpjs_kesehatan',
        'bpjs_tk',
        'tax',
        'total_income',
        'total_deduc',
        'take_pay',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public static function getUniqueDates($userid)
    {
        return static::where('user_id', $userid)
        ->select('periode')
        ->take(4)
        ->orderBy('created_at', 'desc')
        ->distinct()
        ->pluck('periode');
    }

    public function qrpayslip(){
        return $this->belongsTo(QrCodePayslips::class);
    }
}
