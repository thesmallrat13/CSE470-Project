<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'created_by'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'group_user');
    }

    public function resources()
    {
        return $this->hasMany(GroupResource::class);
    }

    public function progress()
    {
        return $this->hasMany(GroupProgress::class);
    }

    public function notes()
    {
        return $this->hasMany(GroupNote::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
