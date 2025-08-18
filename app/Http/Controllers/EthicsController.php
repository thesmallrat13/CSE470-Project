<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EthicsController extends Controller
{
    public function checklist()
    {
        return view('features.ethics_checklist');
    }
}
