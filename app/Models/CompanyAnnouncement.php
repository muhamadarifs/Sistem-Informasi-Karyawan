<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyAnnouncement extends Model
{
    use HasFactory;
    protected $table = "company_announcements";
    protected $primaryKey = "id";
    protected $fillable = [
        'author',
        'date',
        'jam',
        'title',
        'files',
    ];

    public function scopeLatestOrder($query){
        return $query->orderBy('date', 'desc')->orderBy('jam', 'desc');
    }
}
