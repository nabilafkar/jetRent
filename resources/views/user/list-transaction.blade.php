@extends('user.layout_seller.layout')

@section('judul')
    List Transaksi
@endsection

@section('sub-judul')
    Lihat Transaksi
@endsection


@section('content')
    @include('seller.layout_seller.alert')
    <div class="flex rounded-xl mb-6 justify-between items-center">
        <h1 class="text-3xl text-white font-medium">List Detail Transaksi</h1>

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
                </tr>
            </thead>
            <tbody>
                @forelse ($rentals as $rental)
                    <tr class=" border-b bg-gray-800 border-gray-700">
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
