<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class Client extends Authenticatable
{
    use HasApiTokens, HasFactory, HasRoles, Notifiable, SoftDeletes;

    protected $fillable = [
        'name', 'email', 'phone', 'd_o_b', 'last_donation_date',
        'pin_code', 'is_active', 'password', 'city_id', 'blood_type_id', 'fcm_token', 'status', 'governorate_id',
    ];

    protected $hidden = [
        'password',
        'api_token',
    ];

    public function bloodType(): BelongsTo
    {
        return $this->belongsTo(BloodType::class);
    }

    public function donationRequests(): HasMany
    {
        return $this->hasMany(DonationRequest::class);
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    public function posts(): MorphToMany
    {
        return $this->morphToMany(Post::class, 'clientable');
    }

    public function notifications(): MorphToMany
    {
        return $this->morphToMany(Notification::class, 'clientable');
    }

    public function contacts(): MorphToMany
    {
        return $this->morphToMany(Contact::class, 'clientable');
    }

    public function governorates(): MorphToMany
    {
        return $this->morphedByMany(Governorate::class, 'clientable');
    }

    public function tokens(): HasMany
    {
        return $this->hasMany(Token::class);
    }

    public function scopeFilter($query, $filters)
    {
        return $query->when($filters['name'] ?? null, function ($query, $name) {
            $query->where('name', 'like', '%'.$name.'%')->orWhere('email', 'like', '%'.$name.'%');
        })->when($filters['status'] ?? null, function ($query, $status) {
            $query->where('status', $status);
        });
    }

    public function favorites(): BelongsToMany
    {
        return $this->belongsToMany(Post::class, 'favorites');
    }
}
