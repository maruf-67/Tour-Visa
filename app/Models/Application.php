<?php

namespace App\Models;

use App\Models\Country;
use App\Models\Order;
use App\Models\Service;
use App\Models\Transaction;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Application extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'reference_id',
        'first_name',
        'last_name',
        'dob',
        'sex',
        'birth_country_id',
        'passport_country_id',
        'passport_number',
        'passport_issue',
        'passport_expiry',
        'intended_date',
        'image',
        'passport_bio_data',
        'visa_image',
        'is_payment',
        'is_refund',
        'service_id',
        'transaction_id',
        'status',
    ];

    protected $dates = [
        'dob',
        'passport_issue',
        'passport_expiry',
        'intended_date',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class,'reference_id','reference_id');
    }

    public function birthCountry()
    {
        return $this->belongsTo(Country::class, 'birth_country_id');
    }

    public function passportCountry()
    {
        return $this->belongsTo(Country::class, 'passport_country_id');
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }
}
