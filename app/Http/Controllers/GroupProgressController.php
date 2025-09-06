<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GroupProgress;
use App\Models\Group;

class GroupProgressController extends Controller
{
    // List all progress stages for a group
    public function index($groupId)
    {
        $group = Group::findOrFail($groupId);
        $progresses = $group->progress()->get();

        return view('groups.progress.index', compact('group', 'progresses'));
    }

    // Add a new progress stage
    public function store(Request $request, $groupId)
    {
        $request->validate([
            'stage' => 'required|string|max:255'
        ]);

        $group = Group::findOrFail($groupId);

        GroupProgress::create([
            'group_id' => $group->id,
            'stage'    => $request->stage,
            'completed'=> false
        ]);

        return redirect()->back()->with('success', 'Progress stage added.');
    }

    // Toggle completion of a progress stage
    public function toggle($id)
    {
        $progress = GroupProgress::findOrFail($id);
        $progress->completed = !$progress->completed;
        $progress->save();

        return redirect()->back();
    }
}
