<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Log;

class Client extends Authenticatable
{
    use HasFactory, HasApiTokens, Notifiable;
    protected $fillable = [
        'name', 'email', 'phone', 'd_o_b', 'last_donation_date',
        'pin_code', 'is_active', 'password', 'city_id', 'blood_type_id', 'fcm_token', 'cstatus', 'governorate_id'
    ];
    protected $hidden = [
        'password',
        'api_token',
    ];
    public function routeNotificationForMail($notification)
    {
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
        return $this->morphedByMany(Governorate::class, 'clientable');
    }
    public function tokens()
    {
        return $this->hasMany(Token::class);
    }
    public function scopeFilter($query, $filters)
    {
        return $query->when($filters['name'] ?? null, function ($query, $name) {
            $query->where('name', 'like', '%' . $name . '%')->orWhere('email', 'like', '%' . $name . '%');
        })->when($filters['status'] ?? null, function ($query, $status) {
            $query->where('status', $status);
        });
    }
}
