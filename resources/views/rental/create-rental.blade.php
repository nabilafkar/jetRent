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
        <h1 class="text-3xl font-bold mb-6 text-white">Rental Unit</h1>

        <form action="{{ route('rentals.store') }}" method="POST" class="grid grid-cols-2 gap-14">
            @csrf
            <!-- Left side form -->
            <div>
                <!-- Select User -->
                <div class="mb-4">
                    <label for="user_id" class="block mb-2 text-sm font-medium text-white">Pilih User</label>
                    <select name="user_id" id="user_id"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                        <option value="">Pilih User</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }} - {{ $user->email }}</option>
                        @endforeach
                    </select>
                    @error('user_id')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Select Penalty -->
                <div class="mb-4">
                    <label for="penalty_id" class="block mb-2 text-sm font-medium text-white">Pilih Penalty</label>
                    <select name="penalty_id" id="penalty_id" onchange="calculateTotal()"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                        <option value="">Pilih Penalty</option>
                        @foreach ($penalties as $penalty)
                            <option value="{{ $penalty->id }}" data-max-day="{{ $penalty->max_day }}">
                                {{ $penalty->penalty_code }} - Max Days: {{ $penalty->max_day }}</option>
                        @endforeach
                    </select>
                    @error('penalty_id')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Rent Start Date -->
                <div class="mb-4">
                    <label for="rent_start" class="block mb-2 text-sm font-medium text-white">Tanggal Mulai Sewa</label>
                    <input type="date" id="rent_start" name="rent_start" min="{{ date('Y-m-d') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                        required>
                    @error('rent_start')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Right side for unit display -->
            <div>
                <div class="mb-4">
                    <label for="unit_code" class="block mb-2 text-sm font-medium text-white">Kode Unit</label>
                    <input type="text" id="unit_code" name="unit_code" value="{{ $unit->unit_code }}" readonly
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                    <input type="hidden" name="unit_id" value="{{ $unit->id }}">
                </div>
                <div class="mb-4">
                    <label for="unit_name" class="block mb-2 text-sm font-medium text-white">Nama Unit</label>
                    <input type="text" id="unit_name" name="unit_name" value="{{ $unit->name }}" readonly
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                </div>
                <div class="mb-4">
                    <label for="unit_price_display" class="block mb-2 text-sm font-medium text-white">Harga Unit</label>
                    <input type="text" id="unit_price_display" name="unit_price_display"
                        value="Rp{{ number_format($unit->price, 0, ',', '.') }} / day" readonly
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                    <!-- Hidden input for price calculation -->
                    <input type="hidden" id="unit_price" value="{{ $unit->price }}">
                </div>
                <!-- Menampilkan Total Harga -->
                <div class="mb-4">
                    <label for="total_price" class="block mb-2 text-sm font-medium text-white">Total Harga Sewa</label>
                    <input type="text" id="total_price" name="total_price" readonly
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                        value="Rp 0">
                </div>
            </div>

            <!-- Submit Button -->
            <div class="col-span-2">
                <button type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2.5 px-4 rounded">
                    Simpan Rental
                </button>
            </div>
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
