<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResearchInterest extends Model
{
    protected $fillable = ['name', 'parent_id'];

    public function parent()
    {
        return $this->belongsTo(ResearchInterest::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(ResearchInterest::class, 'parent_id');
    }
}
