<?php

namespace App\Http\Controllers;

use App\Models\ChecklistItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChecklistController extends Controller
{
    protected $defaultItems = [
        "Template is correct",
        "Questionnaire / Dataset is attached",
        "Manuscript revised",
        "Sections and subsections aligned",
        "Manuscript anonymized",
        "References properly formatted",
        "Figures and tables numbered correctly",
        "All authors approved submission",
        "Abstract accurately summarizes the work",
        "Title is clear and concise",
        "Keywords are relevant and consistent",
        "Methods section is detailed enough",
        "Results and analysis are accurate",
        "Discussion interprets results and addresses limitations",
        "Conclusion summarizes key findings",
        "Ethical approvals documented and mentioned",
        "Conflicts of interest disclosed",
        "Grammar, spelling, and punctuation checked",
        "Figures and tables have captions and legends and are clickable",
        "All in-text citations clickable appear in references"
    ];

    public function index()
    {
        foreach ($this->defaultItems as $title) {
            ChecklistItem::firstOrCreate([
                'user_id' => Auth::id(),
                'title'   => $title,
            ]);
        }

        $items = ChecklistItem::where('user_id', Auth::id())->get();

        return view('checklist.index', compact('items'));
    }

    public function toggle(Request $request, ChecklistItem $item)
    {
        if ($item->user_id !== Auth::id()) {
            abort(403);
        }

        $item->update([
            'is_checked' => !$item->is_checked
        ]);

        return response()->json([
            'success' => true,
            'is_checked' => $item->is_checked
        ]);
    }


}
