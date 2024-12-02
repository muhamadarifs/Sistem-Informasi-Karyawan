<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CertificateForm extends Model
{
    use HasFactory;
    protected $table = "certificate_forms";
    protected $primaryKey = "id";
    protected $fillable = [
        'user_id',
        'position',
        'keperluan',
        'form_number',
        'create_on',
        'create_name',
        'create_position',
        'create_sign',
        'create_stempel',
        'review_position',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
