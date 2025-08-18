<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResearchTopicController extends Controller
{
    public function index()
    {
        return view('features.topics');
    }
}
