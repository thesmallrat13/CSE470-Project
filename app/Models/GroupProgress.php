<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupProgress extends Model
{
    use HasFactory;

    protected $table = 'group_progresses';
    protected $fillable = ['group_id', 'stage', 'completed'];

    public function group()
    {
        return $this->belongsTo(Group::class);
    }
}
