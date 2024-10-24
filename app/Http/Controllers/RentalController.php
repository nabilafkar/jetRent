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

        $rentals = Rental::with(['user', 'unit', 'penalty'])
            ->orderBy('rent_start', 'desc')
            ->paginate(10);

        // Tanggal sekarang
        $currentDate = now();


        foreach ($rentals as $rental) {

            if ($rental->rent_end < $currentDate) {

                $lateDays = $currentDate->diffInDays($rental->rent_end);

                if ($rental->penalty) {
                    $penaltyAmount = $lateDays * $rental->penalty->price;
                    $rental->total_penalty = $penaltyAmount;


                    $rental->total_price += $penaltyAmount;
                }
            } else {
                // Jika tidak terlambat, total penalty = 0
                $rental->total_penalty = 0;
            }
        }

        // Kirim data ke view
        return view('rental.index-rental', compact('rentals'));
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
        // Ambil data unit
        $unit = Unit::findOrFail($request->unit_id);
        $totalPrice = $unit->price * $penalty->max_day;


        Rental::create([
            'user_id' => $request->user_id,
            'unit_id' => $request->unit_id,
            'rent_start' => $request->rent_start,
            'rent_end' => $rent_end,
            'penalty_id' => $request->penalty_id,
            'total_price' => $totalPrice,
        ]);

        $user->increment('rent_count');


        $unit = Unit::findOrFail($request->unit_id);
        $unit->update(['stock' => false]);

        return redirect()->route('admin.dashboard')->with('success', 'Rental berhasil dibuat.');
    }

    public function returnRental(Rental $rental)
    {

        if ($rental->returned) {
            return back()->with('error', 'Rental sudah dikembalikan.');
        }


        $rental->update([
            'returned' => true,
            'rent_return' => now(),
        ]);

        $rental->user->decrement('rent_count');


        $rental->unit->update(['stock' => true]);

        return back()->with('success', 'Rental berhasil dikembalikan.');
    }
}
