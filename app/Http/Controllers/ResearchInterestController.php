<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ResearchInterest;
use Illuminate\Support\Facades\Auth;

class ResearchInterestController extends Controller
{
    public function edit()
    {
        $categories = ResearchInterest::whereNull('parent_id')->with('children')->get();
        $selected = Auth::user()->researchInterests->pluck('id')->toArray();
        return view('research_interests.edit', compact('categories', 'selected'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $user->researchInterests()->sync($request->input('interests', []));
        return redirect()->route('dashboard')->with('success', 'Research interests updated successfully!');
    }
}
