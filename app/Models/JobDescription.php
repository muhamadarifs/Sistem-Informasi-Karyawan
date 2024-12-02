<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class JobDescription extends Model
{
    use HasFactory;
    protected $table = "job_descriptions";
    protected $primaryKey = "id";
    protected $fillable = [
        'job_code',
        'job_name',
        'job_file',
    ];
}
