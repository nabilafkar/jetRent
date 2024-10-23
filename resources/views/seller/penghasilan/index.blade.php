@extends('seller.layout_seller.layout')

@section('judul')
    wallet
@endsection

@section('sub-judul')
    Penghasilan
@endsection

@section('content')
    {{-- Balance Card Start --}}
    <div class=" bg-gray-600 rounded-lg shadow py-4 px-5 mb-2" id="balance-card">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="flex">
            <div class="flex-none">
                <div class="text-sm font-light text-gray-400 tracking-[2px] mb-2">SALDO</div>
                <div class="text-4xl font-bold mb-10">Rp. {{ number_format($user->balance, 0, ',', '.') }}</div>
                <div class="flex">
                    <div class="mb-2" id="action-button">
                        <button data-modal-target="default-modal" data-modal-toggle="default-modal"
                            class="py-2 px-3 rounded-full bg-gray-200 text-black text-xs font-medium">Tarik Saldo</button>

                        {{-- MODAL TARIK SALDO :start --}}
                        <div id="default-modal" tabindex="-1" aria-hidden="true"
                            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative p-4 w-full max-w-2xl max-h-full">
                                <!-- Modal content -->
                                <div class="relative bg-lightGrey rounded-lg shadow dark:bg-gray-700">
                                    <!-- Modal header -->
                                    <div
                                        class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                        <h3 class="text-xl font-semibold text-white dark:text-white">
                                            Tarik Saldo
                                        </h3>
                                        <button type="button"
                                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                            data-modal-hide="default-modal">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                    </div>
                                    <!-- Modal body -->
                                    <form action="{{ route('withdraw.store') }}" method="post">
                                        @csrf
                                        <div class="p-4 md:p-5 space-y-2">
                                            <div class="mb-3">
                                                <label for="account"
                                                    class="block mb-2 text-sm font-medium text-white dark:text-white">Rekening</label>
                                                <select name="account_id" id="account_id"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg ">
                                                    @foreach ($user->accounts as $acc)
                                                        <option value="{{ $acc->id }}">
                                                            {{ $acc->bank . ' - ' . $acc->account_number . ' ' . $acc->full_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="amount"
                                                    class="block mb-2 text-sm font-medium text-white dark:text-white">Jumlah</label>
                                                <input type="number" id="amount" name="amount"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="50000" required />
                                            </div>
                                        </div>
                                        <!-- Modal footer -->
                                        <div
                                            class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                                            <button data-modal-hide="default-modal" type="submit"
                                                class="text-white bg-shotlanceTosca hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:shotlanceTosca-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I
                                                accept</button>
                                            <button data-modal-hide="default-modal" type="button"
                                                class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Decline</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                        {{-- MODAL TARIK SALDO :end --}}

                    </div>
                    <div class="mx-3" data-modal-target="history-modal" data-modal-toggle="history-modal"><span
                            class="material-symbols-rounded text-gray-400 hover:text-gray-200 hover:cursor-pointer">history</span>
                    </div>
                    <div id="history-modal" tabindex="-1" aria-hidden="true"
                        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative p-4 w-full max-w-2xl max-h-full">
                            <!-- Modal content -->
                            <div class="relative bg-lightGrey rounded-lg shadow dark:bg-gray-700">
                                <!-- Modal header -->
                                <div
                                    class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                    <h3 class="text-xl font-semibold text-white dark:text-white">
                                        History
                                    </h3>
                                    <button type="button"
                                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                        data-modal-hide="history-modal">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                </div>
                                <!-- Modal body -->
                                <div class="p-4 md:p-5 space-y-4">
                                    <div class="card">
                                        <div class="table-responsive">
                                            <table class="table align-items-center mb-0">
                                                <thead>
                                                    <tr>
                                                        <th
                                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">
                                                            ID Withdraw</th>
                                                        <th
                                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">
                                                            Jumlah</th>
                                                        <th
                                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">
                                                            Bank</th>
                                                        <th
                                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">
                                                            No. Rekening</th>
                                                        <th
                                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">
                                                            Tanggal</th>
                                                        <th
                                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">
                                                            Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($withdrawals as $withdrawal)
                                                        <tr>
                                                            <td class="align-middle text-center">
                                                                <span
                                                                    class="text-secondary text-xs font-weight-bold">{{ $withdrawal->id }}</span>
                                                            </td>
                                                            <td class="align-middle text-center">
                                                                <span
                                                                    class="text-secondary text-xs font-weight-bold">{{ $withdrawal->amount }}</span>
                                                            </td>
                                                            <td class="align-middle text-center">
                                                                <span
                                                                    class="text-secondary text-xs font-weight-bold">{{ $withdrawal->userAccount->bank }}</span>
                                                            </td>
                                                            <td class="align-middle text-center">
                                                                <span
                                                                    class="text-secondary text-xs font-weight-bold">{{ $withdrawal->userAccount->account_number }}</span>
                                                            </td>
                                                            <td class="align-middle text-center">
                                                                <span
                                                                    class="text-secondary text-xs font-weight-bold">{{ $withdrawal->created_at->toDateString() }}</span>
                                                            </td>
                                                            <td class="align-middle text-center text-sm">
                                                                <span
                                                                    class="text-secondary text-xs font-weight-bold">{{ $withdrawal->status }}</span>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                </div>
                                <!-- Modal footer -->
                                <div
                                    class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                                    <button data-modal-hide="history-modal" type="button"
                                        class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Close</button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Balance Card End --}}

    {{-- Account Start --}}
    <div class=" mb-4" id="account-saved">
        {{-- <h2 class="font-medium text-white mb-4">Rekening Tersimpan</h2> --}}
        <div class="grid grid-cols-5">
            @foreach ($user->accounts as $account)
                <div class="bg-lightGrey rounded-md shadow p-2 px-2.5 me-2" id="card-riwayat-transaksi">
                    <div class="flex">
                        <div class="flex-initial overflow-hidden">
                            <div class="overflow-x-hidden">
                                <div class="text-sm font-semibold text-nowrap">{{ $account->bank }}</div>
                                <div class="text-xs text-nowrap">{{ $account->account_number }}</div>
                                <div class="text-xs text-nowrap">{{ $account->full_name }}</div>
                            </div>
                        </div>
                        <div class="flex-auto">
                            <form action="/seller/wallet/deleteAccount/{{ $account->id }}" method="POST"
                                class="flex justify-end">
                                @csrf
                                @method('DELETE')
                                <button type="submit">
                                    <span
                                        class="material-symbols-rounded text-gray-400 text-sm hover:text-red-500">delete</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
            <button type="button"
                class="flex items-center justify-center btn  border-gray-400 rounded-md shadow p-2 hover:bg-gray-700 hover:cursor-pointer"
                data-bs-toggle="modal" data-bs-target="#modalRekening">
                <span class="material-symbols-rounded text-gray-400">add_circle</span>
            </button>
        </div>
    </div>
    {{-- Account End --}}

    {{-- Modal Tambah Rekening :start --}}
    <div class="modal fade" id="modalRekening" tabindex="-1" aria-labelledby="modalRekeningLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <form action="/seller/wallet/newAccount" method="POST">
                @csrf
                <div class="modal-content bg-dark">
                    <div class="modal-header py-3 px-4">
                        <h1 class="modal-title fs-5 text-white" id="modalRekeningLabel">Tambah rekening</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div>
                            <input type="hidden" name="user_id" id="user_id" value="{{ $user->id }}">
                            <div class="mb-2">
                                <label for="account_number" class="text-sm">Nomor rekening</label>
                                <br>
                                <input type="text" name="account_number" id="account_number"
                                    placeholder="189236234943" class="rounded-md text-black">
                            </div>
                            <div class="mb-2">
                                <label for="bank" class="text-sm">Bank</label>
                                <br>
                                <input type="text" name="bank" id="bank"
                                    placeholder="Bank Nasional Indonesia" class="rounded-md text-black">
                            </div>
                            <div class="mb-2">
                                <label for="full_name" class="text-sm">Nama lengkap</label>
                                <br>
                                <input type="text" name="full_name" id="full_name" placeholder="Andi Wijaya"
                                    class="rounded-md text-black">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    {{-- Modal Tambah Rekening :end --}}

    <h2 class="font-medium text-white mb-4">Analisis Penghasilan</h2>
    {{-- Filter Waktu start --}}
    <div class="mb-2" id="time-filter">
        {{-- <h3 class="text-gray-400 text-sm mb-2">Filter berdasarkan waktu:</h3> --}}
        <form action="/seller/wallet" id="filters" class="mb-3">
            @csrf
            <div
                class="flex space-x-2 *:px-2 *:py-0.5 *:border *:border-sky-500/15 *:rounded-md *:text-sm *:font-medium *:self-center *:text-sky-300">
                <span class="material-symbols-rounded border-none">filter_alt</span>

                {{-- Filter start date : start --}}
                {{-- <input type="date" name="start_date" id="start_date" class="bg-transparent hover:bg-sky-500/10 hover:shadow-inner" value="{{ request('start_date') }}" onchange="return limitDate()">
            <span class="material-symbols-rounded border-none">arrow_right_alt</span>
            <input type="date" name="end_date" id="end_date" class="bg-transparent hover:bg-sky-500/10 hover:shadow-inner" value="{{ request('end_date') }}" onchange="return limitDate()"> --}}
                {{-- Filter start date : end --}}

                {{-- Filter bulan start --}}
                <select name="month" id="month" class="bg-transparent hover:bg-sky-500/10 hover:shadow-inner"
                    value="{{ request('month') }}">
                    <option class="bg-black text-gray-700" disabled @if (!request('month')) selected @endif>Bulan
                    </option>
                    @foreach ($months as $month)
                        <option class="bg-black" value="{{ $month }}"
                            @if (request('month') == $month) selected @endif>{{ $month }}</option>
                    @endforeach
                </select>
                {{-- Filter bulan end --}}

                {{-- Filter tahun start --}}
                <select name="year" id="year" class="bg-transparent hover:bg-sky-500/10 hover:shadow-inner"
                    value="{{ request('year') }}">
                    <option class="bg-black text-gray-700" disabled @if (!request('year')) selected @endif>Tahun
                    </option>
                    @foreach ($years as $year)
                        <option class="bg-black" value="{{ $year }}"
                            @if (request('year') == $year) selected @endif>{{ $year }}</option>
                    @endforeach
                </select>
                {{-- Filter tahun end --}}

                {{-- Filter paket jasa : start --}}
                <select name='package_id' id="package_id" class="bg-transparent hover:bg-sky-500/10 hover:shadow-inner"
                    value="{{ request('package_title') }}">
                    <option class="bg-black text-gray-700" value="" disabled
                        @if (!request('package_id')) selected @endif>Paket Jasa</option>
                    @foreach ($packages as $package)
                        <option class="bg-black" value="{{ $package->id }}"
                            @if (request('package_id') == $package->id) selected @endif>{{ $package->title }}</option>
                    @endforeach
                </select>
                {{-- Filter paket jasa : end --}}
                <button type="submit" class="bg-sky-500/50">Filter</button>
            </div>
        </form>
    </div>

    <div class="flex space-x-3 mb-3">
        <div class="flex-none w-[75%]">
            {{-- Income Graph Start --}}
            <div class="">
                {{-- Filter Wwaktu end --}}
                <div class="p-4 bg-lightGrey h-[400px] relative w-full rounded-lg">
                    <canvas id="barChart"></canvas>
                </div>
            </div>
            {{-- Income Graph End --}}
        </div>
        <div class="flex-none w-[25%] overflow-y-scroll no-scrollbar" style="max-height: 400px">
            {{-- Riwayat Transaksi Start --}}
            <div class="mb-4" id="transaction-history">
                <h2 class="font-medium text-gray-400 mb-2 text-sm">Riwayat Pembayaran</h2>

                @forelse ($payments as $payment)
                    <div class="bg-lightGrey rounded-lg shadow py-2 px-3 mb-2" id="card-riwayat-transaksi">
                        <div class="flex">
                            <div class="flex-auto">
                                <div class="">order #{{ $payment->order->id }}</div>
                                <div class="text-sm">{{ $payment->order->user->fname }}</div>
                            </div>
                            <div class="flex-auto text-right">
                                <small
                                    class="text-gray-400">{{ \Carbon\Carbon::parse($payment->updated_at)->format('d-m-Y') }}</small>
                                <div class="text-green-500 font-semibold">+ IDR
                                    {{ isset($payment->amount) ? number_format($payment->amount, 0, ',', '.') : '-' }}
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        @empty
            <div class="">kosong</div>
            @endforelse

        </div>
        {{-- Riwayat Transaksi End --}}
    </div>
    <div class="flex space-x-3">
        <div class="p-2 px-3 bg-lightGrey rounded-md">
            <div class="text-sm text-gray-400 mb-2">Total Penghasilan</div>
            <div class="flex space-x-2">
                <div class="flex-auto">
                    <span class="material-symbols-rounded text-2xl">paid</span>
                </div>
                <div class="flex-auto">
                    <div class="font-semibold text-2xl text-gray-300">Rp. {{ $totalIncome ?? 0 }}</div>
                </div>
            </div>
        </div>
        <div class="p-2 px-3 bg-lightGrey rounded-md">
            <div class="text-sm text-gray-400 mb-2">Rata-rata per Order</div>
            <div class="flex space-x-2">
                <div class="flex-auto">
                    <span class="material-symbols-rounded text-2xl">package</span>
                </div>
                <div class="flex-auto">
                    <div class="font-semibold text-2xl text-gray-300">Rp. {{ $avgIncome }}</div>
                </div>
            </div>
        </div>
        @if (request('month') && !request('year'))
            <div class="p-2 px-3 bg-lightGrey rounded-md">
                <div class="text-sm text-gray-400 mb-2">Rata-rata per Pekan</div>
                <div class="flex space-x-2">
                    <div class="flex-auto">
                        <span class="material-symbols-rounded text-2xl">package</span>
                    </div>
                    <div class="flex-auto">
                        <div class="font-semibold text-2xl text-gray-300">Rp. {{ $avgIncomeWeekly }}</div>
                    </div>
                </div>
            </div>
        @endif
        @if (request('year') && !request('month'))
            <div class="p-2 px-3 bg-lightGrey rounded-md">
                <div class="text-sm text-gray-400 mb-2">Rata-rata per Bulan</div>
                <div class="flex space-x-2">
                    <div class="flex-auto">
                        <span class="material-symbols-rounded text-2xl">package</span>
                    </div>
                    <div class="flex-auto">
                        <div class="font-semibold text-2xl text-gray-300">Rp. {{ $avgIncomeMonthly }}</div>
                    </div>
                </div>
            </div>
        @endif
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('barChart');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json($orderDates),
                datasets: [{
                    label: 'Analisis Penghasilan',
                    data: @json($payments->pluck('amount')),
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection
