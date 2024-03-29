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
        'email',
        'phone',
        'dob',
        'gender',
        'address',
        'birth_country_id',
        'citizen_country_id',
        'details',
        'passport_country_id',
        'passport_number',
        'passport_issue',
        'passport_expiry',
        'passport_image',
        'intended_date',
        'visa_image',
        'is_war_crime',
        'is_criminal_record',
        'is_payment',
        'is_refund',
        'service_id',
        'transaction_id',
        'status',
    ];

    protected $casts = [
        'dob' => 'date',
        'passport_issue' => 'date',
        'passport_expiry' => 'date',
        'intended_date' => 'date',
        'is_war_crime' => 'boolean',
        'is_criminal_record' => 'boolean',
        'is_payment' => 'boolean',
        'is_refund' => 'boolean',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function birthCountry()
    {
        return $this->belongsTo(Country::class, 'birth_country_id');
    }

    public function citizenCountry()
    {
        return $this->belongsTo(Country::class, 'citizen_country_id');
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
