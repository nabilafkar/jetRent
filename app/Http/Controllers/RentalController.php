<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\User;
use App\Models\Rental;
use App\Models\Penalty;
use Illuminate\Http\Request;

class RentalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Unit $unit)
    {

        $users = User::where('rent_count', '<', 2)->get();
        $penalties = Penalty::all();

        return view('rental.create-rental', compact('users', 'unit', 'penalties'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'user_id' => 'required|exists:users,id',
            'unit_id' => 'required|exists:units,id',
            'penalty_id' => 'required|exists:penalties,id',
            'rent_start' => 'required|date',
        ]);


        $penalty = Penalty::findOrFail($request->penalty_id);


        $user = User::findOrFail($request->user_id);

        if ($user->rent_count >= 2) {
            return back()->with('error', 'User ini sudah mencapai batas maksimal rental (2 rental).');
        }


        $rent_end = date('Y-m-d', strtotime($request->rent_start . " + {$penalty->max_day} days"));

        Rental::create([
            'user_id' => $request->user_id,
            'unit_id' => $request->unit_id,
            'rent_start' => $request->rent_start,
            'rent_end' => $rent_end,
            'penalty_id' => $request->penalty_id,
        ]);

        $user->increment('rent_count');


        $unit = Unit::findOrFail($request->unit_id);
        $unit->update(['stock' => false]);

        return redirect()->route('admin.dashboard')->with('success', 'Rental berhasil dibuat.');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
