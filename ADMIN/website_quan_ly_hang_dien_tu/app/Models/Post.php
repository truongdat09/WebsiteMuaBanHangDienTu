<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'is_featured', 'status', 'image', 'excerpt', 'content', 'users_id', 'posted_at'];

    public function User()
    {
        return $this->belongsTo(User::class);
    }
}