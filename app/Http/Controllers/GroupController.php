<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Group;
use Illuminate\Support\Facades\Auth;

class GroupController extends Controller
{
    public function __construct()
    {
        // Require login for all group actions
        $this->middleware('auth');
    }

    /**
     * Display all groups.
     */
    public function index()
    {
        // Eager load users for each group
        $groups = Group::with('users')->get();
        return view('groups.index', compact('groups'));
    }

    /**
     * Show the form to create a new group.
     */
    public function create()
    {
        return view('groups.create');
    }

    /**
     * Store a new group in the database.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255|unique:groups,name',
            'description' => 'nullable|string|max:1000',
        ]);

        $group = Group::create([
            'name'        => $validated['name'],
            'description' => $validated['description'] ?? null,
            'created_by'  => Auth::id(),
        ]);

        // Add the creator as a member
        $group->users()->syncWithoutDetaching([Auth::id()]);

        return redirect()
            ->route('groups.show', $group->id)
            ->with('success', 'Group created successfully!');
    }

    /**
     * Show details of a single group.
     */
    public function show($id)
    {
        $group = Group::with([
            'users',
            'resources',
            'progress',
            'notes.creator' // ✅ FIXED: use "creator" instead of "user"
        ])->findOrFail($id);

        return view('groups.show', compact('group'));
    }

    /**
     * Join a group.
     */
    public function join($id)
    {
        $group = Group::findOrFail($id);

        // Sync ensures no duplicate membership
        $group->users()->syncWithoutDetaching([Auth::id()]);

        return redirect()
            ->route('groups.show', $id)
            ->with('success', 'You joined the group successfully!');
    }
}
