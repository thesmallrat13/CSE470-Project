<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupResource extends Model
{
    use HasFactory;

    protected $table = 'group_resources'; 
    protected $fillable = ['group_id', 'title', 'link', 'file_path'];

    public function group()
    {
        return $this->belongsTo(Group::class);
    }
}
