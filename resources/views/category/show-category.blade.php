@extends('seller.layout_seller.layout')

@section('judul')
    Category Jet
@endsection

@section('sub-judul')
    Edit Category Jet
@endsection

@section('content')
    @include('seller.layout_seller.alert')
    <div class="container mx-auto mt-10">

        <h1 class="text-3xl font-bold mb-6">Edit Kategori</h1>

        <form action="{{ route('categories.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="name" class="block mb-2 text-sm font-medium">Nama Kategori</label>
                <input type="text" name="name" id="name" value="{{ old('name', $category->name) }}" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-md rounded-lg block w-full p-2.5" />
                @error('name')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="desc" class="block mb-2 text-sm font-medium">Deskripsi</label>
                <textarea name="desc" id="desc"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-md rounded-lg block w-full p-2.5">{{ old('desc', $category->desc) }}</textarea>
                @error('desc')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Update Kategori</button>
        </form>
    </div>
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
