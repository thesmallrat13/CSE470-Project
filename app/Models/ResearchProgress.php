<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResearchProgress extends Model
{
    use HasFactory;

    protected $table = 'research_progresses';

    protected $fillable = ['user_id', 'stage', 'completed'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
