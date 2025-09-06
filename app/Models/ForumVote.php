<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ForumVote extends Model
{
    protected $fillable = ['post_id', 'user_id', 'vote'];

    public function post() {
        return $this->belongsTo(ForumPost::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
