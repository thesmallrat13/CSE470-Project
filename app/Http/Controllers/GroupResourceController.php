<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Group;
use App\Models\GroupRequest;

class GroupRequestController extends Controller
{
    // Send a request to join a group
    public function requestJoin(Group $group)
    {
        $existing = GroupRequest::where('group_id', $group->id)
                                ->where('user_id', auth()->id())
                                ->first();

        if ($existing) {
            return redirect()->back()->with('info', 'You have already requested to join this group.');
        }

        GroupRequest::create([
            'group_id' => $group->id,
            'user_id' => auth()->id(),
            'status' => 'pending'
        ]);

        return redirect()->back()->with('success', 'Join request submitted!');
    }

    // Approve a join request (only group owner can approve)
    public function approve(GroupRequest $request)
    {
        $this->authorize('manage', $request->group); // Optional: use policy for authorization

        $request->update(['status' => 'approved']);
        $request->group->members()->attach($request->user_id);

        return redirect()->back()->with('success', 'Request approved!');
    }

    // Reject a join request
    public function reject(GroupRequest $request)
    {
        $this->authorize('manage', $request->group); // Optional: use policy

        $request->update(['status' => 'rejected']);

        return redirect()->back()->with('success', 'Request rejected!');
    }
}
