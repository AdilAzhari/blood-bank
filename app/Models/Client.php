<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'email', 'phone', 'd_o_b', 'last_donation_date',
        'pin_code', 'password', 'is_active',

        // 'city_id',
        // 'blood_type_id',
        // 'post_id',
    ];
    protected $hidden = [
        'password',
        'api_token',
    ];
    public function bloodType()
    {
        return $this->belongsTo(BloodType::class);
    }
    public function donationRequests()
    {
        return $this->hasMany(DonationRequest::class);
    }
    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function posts()
    {
        return $this->morphToMany(Post::class, 'clientable');
    }

    public function notifications()
    {
        return $this->morphToMany(Notification::class, 'clientable');
    }

    public function contacts()
    {
        return $this->morphToMany(Contact::class, 'clientable');
    }

    public function governorates()
    {
        return $this->morphToMany(Governorate::class, 'clientable');
    }
}
