@extends('seller.layout_seller.layout')

@section('judul')
    Unit Jet
@endsection

@section('sub-judul')
    Kelola Unit Jet
@endsection


@section('content')
    @include('seller.layout_seller.alert')
    <div class="flex rounded-xl mb-6 justify-between items-center">
        <h1 class="text-3xl text-white font-medium">List Detail Unit Jet</h1>
        <a href="{{ route('unit.create') }}"
            class=" px-6 py-2.5  rounded-md  text-white bg-shotlanceTosca duration-300 hover:bg-lightGreen font-medium">
            + Tambahkan
            Unit Jet</a>
    </div>

    <!-- ====== Table Section Start -->
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500text-gray-400">
            <thead class="text-xs uppercase bg-gray-700 text-gray-200">
                <tr class="text-center">
                    <th scope="col" class="px-6 py-3 ">
                        Foto
                    </th>
                    <th scope="col" class="px-6 py-3 ">
                        Kode Unit
                    </th>
                    <th scope="col" class="px-6 py-3 ">
                        Nama Unit
                    </th>
                    <th scope="col" class="px-6 py-3 ">
                        Kategori
                    </th>
                    <th scope="col" class="px-6 py-3 ">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3 ">
                        Harga
                    </th>
                    <th scope="col" class="px-6 py-3 ">
                        Aksi
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($units as $unit)
                    <tr class=" border-b bg-gray-800 border-gray-700">
                        <td scope="row" class="px-6 py-4 w-1/4 font-medium whitespace-nowrap text-white">
                            <img src="{{ asset('storage/' . $unit->photo) }}" alt="thumbnail Unit Jet" class="">
                        </td>
                        <th class="px-6 py-4">
                            <a target="_blank" href="">{{ $unit->unit_code }}</a>
                            </td>
                        <th class="px-6 py-4">
                            <a target="_blank" href="">{{ $unit->name }}</a>
                            </td>
                        <th class="px-6 py-4">
                            @if ($unit->categories->isEmpty())
                                <em>Tidak ada kategori</em>
                            @else
                                <ul>
                                    @foreach ($unit->categories as $category)
                                        <li>{{ $category->name }},</li>
                                    @endforeach
                                </ul>
                            @endif
                            </td>

                        <td class="px-6 py-4">
                            {{ $unit->stock ? 'Ada' : 'Tidak Ada' }}
                        </td>
                        <td class="px-6 py-4">
                            <span>{{ number_format($unit->price, 0, ',', '.') }}</span>

                        </td>
                        <td class="px-6 py-4">
                            <div class="flex justify-center space-x-2">
                                <a href=""
                                    class="text-white bg-shotlanceTosca hover:bg-hoverTosca focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5  mb-2 focus:outline-none ">Rental</a>
                                <a href="{{ route('unit.edit', $unit->id) }}"
                                    class="text-white bg-shotlanceTosca hover:bg-hoverTosca focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5  mb-2 focus:outline-none ">Edit</a>

                                <button id="buttonHapus-{{ $unit->id }}"
                                    data-modal-target="popup-modal-{{ $unit->id }}"
                                    data-modal-toggle="popup-modal-{{ $unit->id }}"
                                    class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2  text-center"
                                    type="button">
                                    Delete
                                </button>

                                {{-- start modal delete --}}
                                <div id="popup-modal-{{ $unit->id }}" tabindex="-1"
                                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                    <div class="relative p-4 w-full max-w-md max-h-full">
                                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                            <button type="button"
                                                class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                data-modal-hide="popup-modal-{{ $unit->id }}">
                                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                    fill="none" viewBox="0 0 14 14">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                </svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>
                                            <div class="p-4 md:p-5 text-center">
                                                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200"
                                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 20 20">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                </svg>
                                                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Anda
                                                    Yakin ingin menghapus paket {{ $unit->title }} ?</h3>
                                                <div class="flex items-center justify-center">
                                                    <form action="{{ route('unit.destroy', $unit->id) }}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button data-modal-hide="popup-modal-{{ $unit->id }}"
                                                            type="submit"
                                                            class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                                            Iya
                                                        </button>
                                                    </form>
                                                    <button data-modal-hide="popup-modal-{{ $unit->id }}"
                                                        type="button"
                                                        class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                                        Batalkan</button>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- end modal delete --}}
                            </div>

                        </td>
                    </tr>
                @empty
                    <tr class=" border-b bg-gray-800 border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap text-white">
                            Belum Menambahkan Unit Jet/Data Tidak ditemukan
                        </th>
                    </tr>
                @endforelse

            </tbody>
        </table>
    </div>
    <!-- ====== Table Section End -->
    <div class="mt-4 flex items-center justify-center text-white !important">
        {{ $units->links() }}
    </div>
@endsection
