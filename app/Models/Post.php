<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'content',
        'category_id',
        'image',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function clients()
    {
        return $this->morphToMany(Client::class, 'clientable');
    }
}
