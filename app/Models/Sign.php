<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sign extends Model
{
    use HasFactory;
    protected $table = "signs";
    protected $primaryKey = "id";
    protected $fillable = [
        'user_id',
        'sign',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
