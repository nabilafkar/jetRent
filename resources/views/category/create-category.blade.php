@extends('seller.layout_seller.layout')

@section('judul')
    Rental Jet
@endsection

@section('sub-judul')
    Tambah Rental
@endsection

@section('content')
    @include('seller.layout_seller.alert')
    <div class="container mx-auto mt-10">
        <h1 class="text-3xl font-bold mb-6 text-white">Tambah Kategori</h1>

        <form action="{{ route('categories.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="name" class="block mb-2 text-sm font-medium">Nama Kategori</label>
                <input type="text" name="name" id="name"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-md rounded-lg block w-full p-2.5" />
                @error('name')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="desc" class="block mb-2 text-sm font-medium">Deskripsi</label>
                <textarea name="desc" id="desc"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-md rounded-lg block w-full p-2.5"></textarea>
                @error('desc')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan Kategori</button>
        </form>
    </div>
@endsection

@section('scripts')
    <script>
        function calculateTotal() {
            // Ambil harga unit
            var unitPrice = parseFloat(document.getElementById('unit_price').value);

            // Ambil penalty max day dari opsi yang dipilih
            var penaltySelect = document.getElementById('penalty_id');
            var selectedOption = penaltySelect.options[penaltySelect.selectedIndex];
            var maxDay = selectedOption.getAttribute('data-max-day') ? parseInt(selectedOption.getAttribute(
                'data-max-day')) : 0;

            // Hitung total harga
            var totalPrice = unitPrice * maxDay;

            // Format dan tampilkan total harga
            document.getElementById('total_price').value = 'Rp ' + totalPrice.toLocaleString('id-ID');
        }
    </script>
@endsection
