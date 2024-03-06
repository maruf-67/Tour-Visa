<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Homepage extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'fav_icon',
        'logo',
        'description',
        'keywords',
        'head_tag',
        'author_name',
    ];
}
