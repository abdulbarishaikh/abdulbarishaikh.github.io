<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professional extends Model
{
    use HasFactory;
    protected $table = 'professional_skills';
    protected $fillable = [
        'title', 
        'type',
        'percentage'
    ];
}
