<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ResearchInterest;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $category = $request->input('category');

        // Get all top-level categories (major subjects)
        $categories = ResearchInterest::whereNull('parent_id')->get();

        $users = User::with('researchInterests')
            ->when($search, function ($query) use ($search) {
                $query->whereHas('researchInterests', function ($q) use ($search) {
                    $q->where('name', 'LIKE', "%{$search}%");
                });
            })
            ->when($category, function ($query) use ($category) {
                // Filter users who have research interests whose parent category matches the selected category
                $query->whereHas('researchInterests.parent', function ($q) use ($category) {
                    $q->where('id', $category);
                });
            })
            ->get();

        return view('users.index', compact('users', 'search', 'categories', 'category'));
    }

    public function show($id)
    {
        $user = User::with('researchInterests')->findOrFail($id);
        return view('users.show', compact('user'));
    }
}
