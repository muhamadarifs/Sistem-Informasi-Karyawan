<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalLeave extends Model
{
    use HasFactory;
    protected $table = "medical_leaves";
    protected $primaryKey = "id";
    protected $fillable = [
        'user_id',
        'department',
        'position_name',
        'position_code',
        'superior_name',
        'superior_code',
        'jumlah_hari',
        'from_date',
        'to_date',
        'backoffice_date',
        'cuti',
        'telp',
        'pdf_file',
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
}
