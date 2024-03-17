<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'time', 'price', 'description', 'status'];

    public function applications()
    {
        return $this->hasMany(Application::class);
    }
}
