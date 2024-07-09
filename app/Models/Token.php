<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Sanctum\PersonalAccessToken as SanctumPersonalAccessToken;
class Token extends SanctumPersonalAccessToken
{
    use HasFactory;
    protected $fillable = ['client_id', 'token'];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
