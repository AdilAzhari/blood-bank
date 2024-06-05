<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $fillable = [
        'about_app',
        'phone_number',
        'email',
        'fb_link',
        'tw_link',
        'insta_link',
        'notification_setting_text',
    ];
}
