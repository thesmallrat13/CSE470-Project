<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupNote extends Model
{
    use HasFactory;

    protected $table = 'group_notes'; // ✅ fix
    protected $fillable = ['group_id', 'content', 'created_by'];

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
