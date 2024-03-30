<?php

namespace App\Models;

use App\Models\Country;
use App\Models\Application;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['reference_id', 'citizen_country_id','email', 'phone', 'count'];

    // Define the relationship with the Application model
    public function applications()
    {
        return $this->hasMany(Application::class,'reference_id','reference_id');
    }


    public function citizenCountry()
    {
        return $this->belongsTo(Country::class, 'citizen_country_id');
    }
}
