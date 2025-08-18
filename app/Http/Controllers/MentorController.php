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

    // List all mentors (for dropdown view)
    public function index()
    {
        $mentors = User::where('is_mentor', true)->get();
        return view('mentor.index', compact('mentors'));
    }
}
