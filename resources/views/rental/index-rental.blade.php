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
                        #
                    </th>
                    <th scope="col" class="px-6 py-3 ">
                        Kode Unit
                    </th>
                    <th scope="col" class="px-6 py-3 ">
                        Nama User
                    </th>
                    <th scope="col" class="px-6 py-3 ">
                        Telepon
                    </th>
                    <th scope="col" class="px-6 py-3 ">
                        Tanggal Rental
                    </th>
                    <th scope="col" class="px-6 py-3 ">
                        Tanggal Pengembalian
                    </th>
                    <th scope="col" class="px-6 py-3 ">
                        Status Pengembalian
                    </th>
                    <th scope="col" class="px-6 py-3 ">
                        Harga Total
                    </th>
                    <th scope="col" class="px-6 py-3 ">
                        Denda
                    </th>
                    <th scope="col" class="px-6 py-3 ">
                        Aksi
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($rentals as $rental)
                    <tr class=" border-b text-center bg-gray-800 border-gray-700">
                        <th class="px-6 py-4">
                            <a target="_blank" href="">{{ $loop->iteration }}</a>
                            </td>
                        <th class="px-6 py-4">
                            <a target="_blank" href="">{{ $rental->unit->unit_code }}</a>
                            </td>
                        <th class="px-6 py-4">
                            <a target="_blank" href="">{{ $rental->user->name }}</a>
                            </td>
                        <th class="px-6 py-4">
                            {{ $rental->user->phone }}
                            </td>

                        <th class="px-6 py-4">
                            {{ $rental->rent_start }} - {{ $rental->rent_end }}
                        </th>

                        <th class="px-6 py-4">
                            {{ $rental->rent_return ?? '-' }}

                        </th>
                        <td class="px-6 py-4">
                            {{ $rental->returned ? 'Sudah Dikembalikan' : 'Belum Dikembalikan' }}
                        </td>
                        <td class="px-6 py-4">
                            {{ number_format($rental->total_price, 0, ',', '.') }}
                        </td>
                        <th class="px-6 py-4">
                            {{ number_format($rental->total_penalty, 0, ',', '.') }}
                        </th>
                        <td class="px-6 py-4">
                            <div class="flex justify-center space-x-2">


                                <button id="buttonHapus-{{ $rental->id }}"
                                    data-modal-target="popup-modal-{{ $rental->id }}"
                                    data-modal-toggle="popup-modal-{{ $rental->id }}"
                                    class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2  text-center"
                                    type="button">
                                    Pengembalian
                                </button>

                                {{-- start modal delete --}}
                                <div id="popup-modal-{{ $rental->id }}" tabindex="-1"
                                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                    <div class="relative p-4 w-full max-w-md max-h-full">
                                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                            <button type="button"
                                                class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                data-modal-hide="popup-modal-{{ $rental->id }}">
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
                                                    Yakin ingin Menyetujui Pengembalian {{ $rental->unit->unit_code }} ?
                                                </h3>
                                                <div class="flex items-center justify-center">
                                                    <form action="{{ route('rentals.return', $rental->id) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('put')
                                                        <button data-modal-hide="popup-modal-{{ $rental->id }}"
                                                            type="submit"
                                                            class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                                            Iya
                                                        </button>
                                                    </form>
                                                    <button data-modal-hide="popup-modal-{{ $rental->id }}"
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
        {{ $rentals->links() }}
    </div>
@endsection
