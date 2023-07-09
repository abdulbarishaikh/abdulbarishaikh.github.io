<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 
        'description',
        'subTitle',
        'project_links',
        'image'
    ];
    protected $hidden = ['created_at', 'updated_at'];
}
