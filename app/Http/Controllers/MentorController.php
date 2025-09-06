<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class MentorController extends Controller
{
    // Show the "Become a Mentor" form
    public function create()
    {
        return view('mentor.become');
    }

    // Store mentor details
    public function store(Request $request)
    {
        $request->validate([
            'bio' => 'required|string',
            'experience_years' => 'required|integer|min:0',
            'google_scholar' => 'nullable|url',
            'publications' => 'nullable|string',
            'available_for_collab' => 'required|boolean',
        ]);

        $user = Auth::user();
        $user->is_mentor = true;
        $user->bio = $request->bio;
        $user->experience_years = $request->experience_years;
        $user->google_scholar = $request->google_scholar;
        $user->publications = $request->publications;
        $user->available_for_collab = $request->available_for_collab;
        $user->save();

        return redirect()->route('dashboard')->with('success', 'You are now listed as a mentor!');
    }

    public function getMentorship($mentorId)
{
    $mentor = User::findOrFail($mentorId);

    if (!Auth::user()->mentors()->where('mentor_id', $mentor->id)->exists()) {
        Auth::user()->mentors()->attach($mentor->id);
    }

    return redirect()->back()->with('success', 'Mentorship added successfully!');
}


    // List all mentors
    public function index()
    {
        $mentors = User::where('is_mentor', true)->get();
        return view('mentor.index', compact('mentors'));
    }
}
