<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'institution',
        'is_mentor',
        'bio',
        'experience_years',
        'google_scholar',
        'publications',
        'available_for_collab'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Relationships
    public function groups()
    {
        return $this->belongsToMany(Group::class, 'group_user', 'user_id', 'group_id')->withTimestamps();
    }

    public function groupRequests()
    {
        return $this->hasMany(GroupRequest::class);
    }

    public function researchInterests()
    {
        return $this->belongsToMany(
            ResearchInterest::class,
            'user_research_interests',
            'user_id',
            'research_interest_id'
        );
    }

    public function mentors()
    {
        return $this->belongsToMany(User::class, 'user_mentors', 'user_id', 'mentor_id')->withTimestamps();
    }
}
