<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupRequest extends Model
{
    use HasFactory;

    protected $fillable = ['group_id', 'user_id', 'status'];

    // Related group
    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    // User who sent the request
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
