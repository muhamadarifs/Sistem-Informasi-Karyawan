<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataChange extends Model
{
    use HasFactory;
    protected $table = "data_changes";
    protected $primaryKey = "id";
    protected $fillable = [
        'user_id',
        'department',
        'data_change',
        'newdata',
        'pdf_file',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
