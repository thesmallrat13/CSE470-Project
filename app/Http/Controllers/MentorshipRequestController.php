<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\MentorshipRequest;

class MentorshipRequestController extends Controller
{
    public function store($mentorId)
    {
        $mentor = User::findOrFail($mentorId);

        // Create request only if not exists
        MentorshipRequest::firstOrCreate([
            'user_id' => Auth::id(),
            'mentor_id' => $mentor->id,
        ]);

        return back()->with('success', 'Mentorship request sent!');
    }
}
