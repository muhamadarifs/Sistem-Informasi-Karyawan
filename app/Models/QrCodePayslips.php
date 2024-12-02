<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QrCodePayslips extends Model
{
    use HasFactory;
    protected $table = "qrpayslip";
    protected $primaryKey = "id";
    protected $fillable = [
        'periode',
        'qrcode'
    ];

    public function payslips()
    {
        return $this->hasMany(TesPayslip::class, 'qrpayslip_id', 'id');
    }
}
