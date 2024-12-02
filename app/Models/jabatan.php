<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jabatan extends Model
{
    use HasFactory;
    protected $table = "jabatan";
    protected $primaryKey = "id";
    protected $fillable = [
        'id',
        'position_code',
        'jabatan',
        'jobdesk',
    ];

    public function employee()
    {
        return $this->hasMany(User::class);
    }
}
