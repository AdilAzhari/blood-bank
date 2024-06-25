<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonationRequest extends Model
{
    use HasFactory;
    protected $fillable = [
        'patient_name',
        'patient_age',
        'bags_number',
        'hospital_name',
        'hospital_address',
        'patient_phone_number',
        'details',
        'latitude',
        'longitude',
        'client_id',
        'city_id',
        'blood_type_id',
    ];
    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function bloodType()
    {
        return $this->belongsTo(BloodType::class);
    }
    public function notification()
    {
        return $this->hasOne(Notification::class);
    }

    public function scopeFilter($query, $filters)
    {
        return $query->when($filters['city'] ?? null, function ($query, $city) {
            $query->where('city', $city);
        })->when($filters['BloodType'] ?? null, function ($query, $BloodType) {
            $query->where('BloodType', $BloodType);
        });
    }
}
