<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;
    protected $fillable = [
        'education_name', 
        'college_name',
        'description',
        'start_year',
        'end_year',
        'grade'
    ];
}
