<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;

class LandingpageController extends Controller
{
    public function index()
    {
        $units = Unit::with('categories')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        return view('landing_page.home', compact('units'));
    }
}
