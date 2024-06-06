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
        'bags_num',
        'hospital_name',
        'hospital_address',
        'phone',
        'notes',
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
}
