<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LinkUser extends Model
{
    use HasFactory;
    protected $table = "link_users";
    protected $primaryKey = "id";
    protected $fillable = [
        'user_id',
        'link_bpjs',
        'link_bpjstk',
    ];
}
