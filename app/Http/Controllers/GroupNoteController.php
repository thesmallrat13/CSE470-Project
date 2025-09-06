<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GroupNote;
use App\Models\Group;
use Illuminate\Support\Facades\Auth;

class GroupNoteController extends Controller
{
    // List notes for a group
    public function index($groupId)
    {
        $group = Group::findOrFail($groupId);
        $notes = $group->notes()->with('user')->get();

        return view('groups.notes.index', compact('group', 'notes'));
    }

    // Add a note to a group
    public function store(Request $request, $groupId)
    {
        $request->validate([
            'note' => 'required|string'
        ]);

        $group = Group::findOrFail($groupId);

        GroupNote::create([
            'group_id' => $group->id,
            'user_id'  => Auth::id(),
            'note'     => $request->note
        ]);

        return redirect()->back()->with('success', 'Note added successfully.');
    }
}
