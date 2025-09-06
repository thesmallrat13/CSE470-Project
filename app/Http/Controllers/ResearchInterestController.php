<?php

namespace App\Http\Controllers;

use App\Models\ResearchInterest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResearchInterestController extends Controller
{
    // Show form to edit user research interests
    public function edit()
    {
        // Get all top-level categories with their subcategories
        $categories = ResearchInterest::whereNull('parent_id')
            ->with('children')
            ->get();

        // Get user's selected interests
        $userInterests = Auth::user()->researchInterests->pluck('id')->toArray();

        return view('research_interests.edit', compact('categories', 'userInterests'));
    }

    // Save selected research interests
    public function update(Request $request)
    {
        $request->validate([
            'interests' => 'array',
        ]);

        Auth::user()->researchInterests()->sync($request->input('interests', []));

        return redirect()->route('dashboard')->with('success', 'Research interests updated!');
    }

    // Browse all research topics
    public function index()
    {
        $categories = ResearchInterest::whereNull('parent_id')
            ->with('children')
            ->get();

        return view('research_interests.index', compact('categories'));
    }
}
