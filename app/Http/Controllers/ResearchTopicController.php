<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ResearchInterest;

class ResearchTopicController extends Controller
{
    public function index()
    {
        // Get all top-level categories with their subcategories
        $categories = ResearchInterest::whereNull('parent_id')
                        ->with('children') // assumes 'children' relationship exists
                        ->get();

        return view('features.topics', compact('categories'));
    }
}
