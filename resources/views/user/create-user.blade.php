@extends('seller.layout_seller.layout')

@section('judul')
    User
@endsection

@section('sub-judul')
    Tambah User
@endsection

@section('content')
    @include('seller.layout_seller.alert')

    <form action="{{ route('users.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label for="name" class="block mb-2 text-sm font-medium">Nama</label>
            <input type="text" name="name" id="name" required
                class="bg-gray-50 border border-gray-300 text-gray-900 text-md rounded-lg block w-full p-2.5" />
            @error('name')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="email" class="block mb-2 text-sm font-medium">Email</label>
            <input type="email" name="email" id="email" required
                class="bg-gray-50 border border-gray-300 text-gray-900 text-md rounded-lg block w-full p-2.5" />
            @error('email')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="phone" class="block mb-2 text-sm font-medium">Telepon</label>
            <input type="text" name="phone" id="phone"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-md rounded-lg block w-full p-2.5" />
            @error('phone')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="address" class="block mb-2 text-sm font-medium">Alamat</label>
            <textarea name="address" id="address"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-md rounded-lg block w-full p-2.5"></textarea>
            @error('address')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="role" class="block mb-2 text-sm font-medium">Role</label>
            <select name="role" id="role" required
                class="bg-gray-50 border border-gray-300 text-gray-900 text-md rounded-lg block w-full p-2.5">
                <option value="admin">Admin</option>
                <option value="user">User</option>
            </select>
            @error('role')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan Pengguna</button>
    </form>
@endsection


@section('scripts')
    <script>
        ClassicEditor
            .create(document.querySelector('#spesifikasi'), {
                toolbar: ['undo', 'redo', 'bold', 'italic', 'numberedList', 'bulletedList'],
                // Tambahkan konfigurasi untuk mengatur jenis daftar yang dihasilkan oleh tombol 'numberedList'

                list: {
                    // Menggunakan 'ordered' untuk daftar bernomor
                    ordered: 'decimal'
                }
            })
            .catch(error => {
                console.log(error);
            });

        function formatCurrency(value) {
            // Menghapus karakter non-angka
            let numericValue = value.replace(/\D/g, '');
            // Menambahkan separator ribuan
            numericValue = new Intl.NumberFormat('id-ID').format(numericValue);

            return numericValue;
        }
    </script>
@endsection
