<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;
    protected $table = "position";
    protected $primaryKey = "id";
    protected $fillable = [
        'position_code',
        'position_name',
        'superior_code',
        'superior_name',
        'department',
        'a',
        'dept_code',
    ];

    public function employee()
    {
        return $this->hasMany(User::class);
    }

    public function subordinates()
    {
        return $this->hasMany(Position::class, 'superior_code', 'position_code');
    }
}
