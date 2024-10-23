<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingpageController extends Controller
{
    public function index()
    {
        $packages = [];
        return view('landing_page.home', compact('packages'));
    }
}
