<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ResearchProgress;
use Illuminate\Support\Facades\Auth;

class ResearchProgressController extends Controller
{
    public function index()
    {
        $progress = ResearchProgress::where('user_id', Auth::id())->get();

        $total = $progress->count();
        $completed = $progress->where('completed', true)->count();
        $percentage = $total > 0 ? round(($completed / $total) * 100) : 0;

        return view('research.timeline', compact('progress', 'percentage'));
    }

    public function store(Request $request)
    {
        ResearchProgress::create([
            'user_id' => Auth::id(),
            'stage' => $request->stage,
            'completed' => false,
        ]);

        return redirect()->route('research.timeline');
    }

    public function update($id)
    {
        $task = ResearchProgress::where('user_id', Auth::id())->findOrFail($id);
        $task->completed = !$task->completed;
        $task->save();

        return redirect()->route('research.timeline');
    }
}
