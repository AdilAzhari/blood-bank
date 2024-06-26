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
    public function client()
    {
        return $this->morphTo(Client::class, 'clientable');
    }
    public function favoritedBy()
    {
        return $this->belongsToMany(Client::class, 'favorites');
    }
}
