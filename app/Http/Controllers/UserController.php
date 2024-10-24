<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Rental;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function index()
    {
        $users = User::paginate(10); // Ambil pengguna dengan paginasi
        return view('user.index-user', compact('users'));
    }

    public function create()
    {
        return view('user.create-user');
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string',
            'role' => 'required|in:admin,user',
        ]);

        User::create(array_merge($request->only(['name', 'email', 'phone', 'address', 'role']), [
            'password' => bcrypt('1-8'),
        ]));

        return redirect()->route('users.index')->with('success', 'Pengguna berhasil ditambahkan.');
    }

    public function edit(User $user)
    {
        return view('user.show-user', compact('user')); // Tampilkan form edit
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string',
            'role' => 'required|in:admin,user', // Misalkan role hanya admin dan user
        ]);

        // Update pengguna
        $user->update($request->only(['name', 'email', 'phone', 'address', 'role']));

        return redirect()->route('users.index')->with('success', 'Pengguna berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete(); // Hapus pengguna
        return redirect()->route('users.index')->with('success', 'Pengguna berhasil dihapus.');
    }


    public function myTransactions()
    {
        // Get the currently authenticated user
        $user = Auth::user();

        // Retrieve rentals for the authenticated user
        $rentals = Rental::with(['user', 'unit', 'penalty'])
            ->where('user_id', $user->id) // Filter by the authenticated user's ID
            ->orderBy('rent_start', 'desc')
            ->paginate(10);

        // Current date
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
                // If not late, total penalty = 0
                $rental->total_penalty = 0;
            }
        }
        return view('user.list-transaction', compact('rentals'));
    }
}
