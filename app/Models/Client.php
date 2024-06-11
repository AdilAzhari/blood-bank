<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Client extends Authenticatable
{
    use HasFactory, HasApiTokens, Notifiable;
    protected $fillable = [
        'name', 'email', 'phone', 'd_o_b', 'last_donation_date',
        'pin_code', 'is_active', 'password', 'city_id', 'blood_type_id', 'fcm_token'
    ];
    protected $hidden = [
        'password',
        'api_token',
    ];
    public function routeNotificationForMail($notification)
    {
        // Return the email address where the notification should be sent.
        return $this->email;
    }
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
    public function tokens()
    {
        return $this->hasMany(Token::class);
    }
}
