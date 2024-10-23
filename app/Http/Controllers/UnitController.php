<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $units = Unit::with('categories')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('paket_jasa.index-paket_jasa', compact('units'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('paket_jasa.create-paket_jasa', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data termasuk validasi file photo
        $request->validate([
            'unit_code' => 'required|unique:units,unit_code|max:100',
            'name' => 'required',
            'desc' => 'required',
            'price' => 'required|numeric',
            'brand' => 'required',
            'stock' => 'boolean',
            'categories' => 'required|array', // Validasi untuk multiple categories
            'categories.*' => 'exists:categories,id', // Setiap kategori harus ada di database
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validasi file image
        ]);

        // Inisialisasi data unit
        $unitData = $request->only(['unit_code', 'name', 'desc', 'price', 'brand', 'stock']);

        // Cek apakah ada file photo yang diunggah
        if ($request->hasFile('photo')) {
            // Simpan file photo ke storage/app/public/photos dan ambil path-nya
            $photoPath = $request->file('photo')->store('photos', 'public');

            // Simpan path photo di array unitData
            $unitData['photo'] = $photoPath;
        }

        // Buat unit baru
        $unit = Unit::create($unitData);

        // Simpan relasi dengan kategori
        $unit->categories()->sync($request->categories);

        return redirect()->route('admin.dashboard')->with('success', 'Unit berhasil ditambahkan');
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
    public function edit(Unit $unit)
    {
        // Ambil semua kategori
        $categories = Category::all();

        // Ambil kategori yang sudah dipilih oleh unit
        $selectedCategories = $unit->categories->pluck('id')->toArray();

        return view('paket_jasa.show-paket_jasa', compact('unit', 'categories', 'selectedCategories'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Unit $unit)
    {
        // Validasi input
        $request->validate([
            'unit_code' => 'required|max:100|unique:units,unit_code,' . $unit->id,
            'name' => 'required',
            'desc' => 'required',
            'price' => 'required|numeric',
            'brand' => 'required',
            'stock' => 'boolean',
            'categories' => 'required|array',
            'categories.*' => 'exists:categories,id',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validasi file image
        ]);

        // Update data unit
        $unit->update($request->only(['unit_code', 'name', 'desc', 'price', 'brand', 'stock']));

        // Cek apakah ada file photo baru yang diunggah
        if ($request->hasFile('photo')) {
            // Hapus photo lama jika ada
            if ($unit->photo) {
                Storage::disk('public')->delete($unit->photo);
            }

            // Simpan photo baru ke storage dan update path-nya
            $photoPath = $request->file('photo')->store('photos', 'public');
            $unit->update(['photo' => $photoPath]);
        }

        // Update relasi kategori
        $unit->categories()->sync($request->categories);

        return redirect()->route('admin.dashboard')->with('success', 'Unit berhasil diperbarui');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Unit $unit)
    {
        // Cek apakah unit memiliki photo
        if ($unit->photo) {
            // Hapus file photo dari storage
            Storage::disk('public')->delete($unit->photo);
        }

        // Hapus unit dari database
        $unit->delete();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('admin.dashboard')->with('success', 'Unit dan photo berhasil dihapus');
    }
}
