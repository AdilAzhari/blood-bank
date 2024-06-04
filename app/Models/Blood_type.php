<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blood_type extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
    ];
    public function clients()
    {
        return $this->morphToMany(Client::class, 'clientable');
    }
    public function donations()
    {
        return $this->hasMany(Donation_request::class);
    }
}
