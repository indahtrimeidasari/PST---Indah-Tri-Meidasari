<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class C_About extends Controller
{
    public function about()
    {
        return view('about');
    }
}
