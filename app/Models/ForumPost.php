<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ForumPost extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'content',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(ForumComment::class, 'post_id'); // explicit FK
    }

    public function votes()
    {
        return $this->hasMany(ForumVote::class, 'post_id'); // explicit FK
    }


    public function score()
    {
        return $this->votes()->sum('vote'); // +1 or -1
    }
}
