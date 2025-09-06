<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChecklistItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'is_checked',
    ];

    protected $casts = [
        'is_checked' => 'boolean',
    ];
}
