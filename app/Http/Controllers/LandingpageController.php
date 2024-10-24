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

    public function search(Request $request)
    {
        // Validate the search input
        $request->validate([
            'search' => 'nullable|string|max:255',
        ]);

        $search = $request->input('search');

        // Get units based on the search query
        $units = Unit::with('categories')
            ->where('name', 'like', "%{$search}%")
            ->orWhere('unit_code', 'like', "%{$search}%")
            ->orWhereHas('categories', function ($query) use ($search) {
                $query->where('name', 'like', "%{$search}%");
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('landing_page.search', compact('units', 'search'));
    }
}
