<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyRegFM extends Model
{
    use HasFactory;
    protected $table = "company_reg_fm";
    protected $primaryKey = "id";
    protected $fillable = [
        'companyreg_fm',
        'tanggal',
        'jam',
    ];

    public function scopeLatestOrder($query){
        return $query->orderBy('tanggal', 'desc')->orderBy('jam', 'desc');
    }
}
