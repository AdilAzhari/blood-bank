<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'phone',
        'dob',
        'last_donation_date',
        'pin_code',
    ];
    public function clientable()
    {
        return $this->morphTo();
    }
    public function city()
    {
        return $this->belongsTo(City::class);
    }
    public function bloodType()
    {
        return $this->belongsTo(Blood_type::class);
    }
    public function donationRequests()
    {
        return $this->hasMany(Donation_request::class);
    }
    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
    public function notifications()
    {
        return $this->belongsToMany(Notification::class);
    }
}
