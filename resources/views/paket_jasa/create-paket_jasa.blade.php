@extends('seller.layout_seller.layout')

@section('judul')
    Unit Jet
@endsection

@section('sub-judul')
    Tambah Unit Jet
@endsection

@section('content')
    @include('seller.layout_seller.alert')

    <form enctype="multipart/form-data" action="{{ route('unit.store') }}" method="post">
        @csrf
        <div class=" bg-lightGrey rounded-xl p-14 text-white">
            <div class="col-span-2 flex rounded-xl mb-6 justify-between items-center ">
                <h1 class="font-bold text-3xl mb-5 text-white">Detail Unit Jet</h1>
                <a href="{{ route('admin.dashboard') }}"
                    class="inline-block px-6 py-2.5  rounded-md bg-red-400 text-white bg-red duration-300 hover:bg-red-200 font-medium">
                    X Batalkan Penambahan </a>
            </div>
            <div class="w-full ">
                <form class="">
                    <div class=" grid grid-cols-2 gap-14 ">
                        <div class="">
                            <div class="mb-4">
                                <label for="title" class="block mb-2 text-sm font-medium text-white">
                                    Kode Jet</label>
                                <input type="text" id="default-input"" name="unit_code"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Isikan Kode unit.." />
                                @error('unit_code')
                                    <span class="text-red-500 s text-xs"> {{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="title" class="block mb-2 text-sm font-medium text-white">
                                    Nama Jet</label>
                                <input type="text" id="default-input"" name="name"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Isikan Nama Unit.." />
                                @error('name')
                                    <span class="text-red-500 s text-xs"> {{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="title" class="block mb-2 text-sm font-medium text-white">
                                    Brand Jet</label>
                                <input type="text" id="default-input"" name="brand"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Isikan Brand Unit.." />
                                @error('brand')
                                    <span class="text-red-500 s text-xs"> {{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="category_id" class="block mb-2 text-sm font-medium text-white">Pilih
                                    Kategori </label>
                                @foreach ($categories as $category)
                                    <div>
                                        <input type="checkbox" id="category_{{ $category->id }}" name="categories[]"
                                            value="{{ $category->id }}">
                                        <label for="category_{{ $category->id }}">{{ $category->name }}</label>
                                    </div>
                                @endforeach

                                @error('category_1')
                                    <span class="text-red-500  text-xs"> {{ $message }}</span>
                                @enderror

                            </div>


                            <div class="mb-4">
                                <label for="deskripsi" class="block mb-2 text-sm font-medium text-white">
                                    Deskripsi Unit</label>
                                <textarea id="deskripsi" rows="4" name="desc"
                                    class="block p-2.5 w-full text-md text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Isikan Deskripsi Unit..."></textarea>
                                @error('desc')
                                    <span class="text-red-500  text-xs"> {{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-5">
                                <label for="min_price" class="block mb-2 text-sm font-medium text-white">Harga
                                    Sewa</label>
                                <input type="text" id="min_price" aria-describedby="helper-text-explanation"
                                    x-model="minPrice" x-on:input="minPrice = formatCurrency(minPrice)" name="price"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="5000000" />
                                @error('price')
                                    <span class="text-red-500  text-xs"> {{ $message }}</span>
                                @enderror
                            </div>

                            <button type="submit" id="submit"
                                class="text-white bg-shotlanceTosca hover:bg-hoverTosca focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                        </div>
                        <div class="">
                            <div x-data="{ image: '' }">
                                <div class="mb-5">
                                    <label class="block mb-2 text-sm font-medium text-white" for="thumbnail">Foto
                                        Unit Jet</label>
                                    <input x-on:change="image = URL.createObjectURL($event.target.files[0])" name="photo"
                                        class="block w-full mb-5 text-xs text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                        id="small_size" type="file">
                                    <img x-show="image" :src="image" class="w-auto h-[500px] mb-3"
                                        alt="Preview Image">
                                    <img x-show="!image" src="{{ asset('images/background-hero.jpg') }}"
                                        class="w-auto h-[500px] mb-3" alt="Placeholder Image">
                                    @error('photo')
                                        <span class="text-red-500 text-xs"> {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
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
