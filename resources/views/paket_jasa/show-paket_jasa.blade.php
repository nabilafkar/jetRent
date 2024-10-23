@extends('seller.layout_seller.layout')

@section('judul')
    Paket Jasa
@endsection

@section('sub-judul')
    Tambah Paket Jasa
@endsection

@section('content')
    @include('seller.layout_seller.alert')

    <form enctype="multipart/form-data" action="{{ route('package.update', $package->id) }}" method="post">
        @csrf
        @method('put')
        <div class=" bg-lightGrey rounded-xl p-14 text-white">
            <div class="col-span-2 flex rounded-xl mb-6 justify-between items-center ">
                <h1 class="font-bold text-3xl mb-5 text-white">Detail Paket Jasa</h1>
                <a href="{{ route('package.index') }}"
                    class="inline-block px-6 py-2.5  rounded-md bg-red-400 text-white bg-red duration-300 hover:bg-red-200 font-medium">
                    X Batalkan Penambahan </a>
            </div>
            <div class="w-full ">
                <form class="">
                    <div class=" grid grid-cols-2 gap-14 ">
                        <div class="">
                            <div class="mb-5">
                                <label for="title" class="block mb-2 text-sm font-medium text-white">
                                    Nama Paket Jasa</label>
                                <input type="text" id="default-input"" name="title"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Isikan Judul Paket.." value="{{ $package->title }}" />
                                @error('title')
                                    <span class="text-red-500 s text-xs"> {{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-5">
                                <label for="category_id" class="block mb-2 text-sm font-medium text-white">Pilih
                                    Kategori</label>
                                <select id="category_id" name="category_id"
                                    class="bg-gray-50 border border-gray-300 text-gray-800 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    @foreach ($kategori as $kategori)
                                        <option value="{{ $kategori->id }}"
                                            @if ($kategori->id == $package->category_id) selected @endif>
                                            {{ $kategori->name }}
                                        </option>
                                    @endforeach
                                    @error('category_id')
                                        <span class="text-red-500  text-xs"> {{ $message }}</span>
                                    @enderror
                                </select>
                            </div>

                            <div class="mb-5">
                                <label for="deskripsi" class="block mb-2 text-sm font-medium text-white">
                                    Deskripsi Paket</label>
                                <textarea id="deskripsi" rows="4" name="desc"
                                    class="block p-2.5 w-full text-md text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Isikan Deskripsi Paket...">{{ $package->desc }}</textarea>
                                @error('desc')
                                    <span class="text-red-500  text-xs"> {{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-5 text-black  ">
                                <label for="spesifikasi" class="block mb-2 text-sm font-medium text-white">
                                    List Spesifikasi </label>

                                <textarea id="spesifikasi" rows="5" name="spec_items"
                                    class="w-full text-sm text-gray-900 !important bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 light focus:text-black "
                                    placeholder="Contoh : 1. Saya akan memberikan Video 3 Menit">   {!! $package->spec_items !!}</textarea>
                                @error('spec_items')
                                    <span class="text-red-500  text-xs"> {{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-5 flex justify-between space-x-5">
                                <div class="w-[50%] mb-3" x-data="{ minPrice: '{{ $package->min_price }}' }">
                                    <label for="min_price" class="block mb-2 text-sm font-medium text-white">Harga
                                        Minimum</label>
                                    <input type="text" id="min_price" value="{{ $package->min_price }}"
                                        aria-describedby="helper-text-explanation" name="min_price"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="5000000" required />
                                    @error('min_price')
                                        <span class="text-red-500  text-xs"> {{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="w-[50%] mb-3" x-data="{ maxPrice: '{{ $package->max_price }}' }">
                                    <label for="max_price" class="block mb-2 text-sm font-medium text-white">Harga
                                        Maksimum</label>
                                    <input type="text" id="max_price" value="{{ $package->max_price }}"
                                        aria-describedby="helper-text-explanation" name="max_price"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="5000000" required />
                                    @error('max_price')
                                        <span class="text-red-500  text-xs"> {{ $message }}</span>
                                    @enderror
                                </div>


                            </div>

                            <button type="submit" id="submit"
                                class="text-white bg-shotlanceTosca hover:bg-hoverTosca focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                        </div>
                        <div class="">
                            <div x-data="{ image: '' }">
                                <div class="mb-5">
                                    <label class="block mb-2 text-sm font-medium text-white" for="thumbnail">Thumbnail
                                        Paket Jasa</label>
                                    <input x-on:change="image = URL.createObjectURL($event.target.files[0])"
                                        name="thumbnail"
                                        class="block w-full mb-5 text-xs text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                        id="small_size" type="file">
                                    <img x-show="image" :src="image" class="w-auto h-[500px] mb-3"
                                        alt="Preview Image">
                                    <img x-show="!image" src="{{ $package->getImageURL() }}" class="w-auto h-[500px] mb-3"
                                        alt="Placeholder Image">
                                    @error('thumbnail')
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
