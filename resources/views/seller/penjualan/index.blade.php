@extends('seller.layout_seller.layout')

@section('judul')
    orders
@endsection

@section('sub-judul')
    Semua Penjualan
@endsection

@section('content')
    @include('seller.layout_seller.alert')

    <div class="nav-tabs my-1">

        <div class="search mb-3">
            <form action="/seller/orders" id="filter">
                @csrf
                @if (request('status'))
                    <input type="hidden" name="status" value="{{ request('status') }}">
                @endif
                @if (request('start_date'))
                    <input type="hidden" name="start_date" value="{{ request('start_date') }}">
                @endif
                @if (request('end_date'))
                    <input type="hidden" name="end_date" value="{{ request('end_date') }}">
                @endif
                <label class="relative block">
                    <span class="sr-only">Search</span>
                    <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                        <span class="material-symbols-rounded text-gray-300 text-md">search</span>
                    </span>
                    <input
                        class="text-black placeholder:italic placeholder:text-slate-400 block bg-white w-full border border-slate-300 rounded-md py-2 pl-9 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm"
                        placeholder="Cari berdasarkan paket atau buyer.." type="text" name="search" id="search"
                        value="{{ request('search') }}" />
                </label>
            </form>
        </div>
        <div class="mb-2 text-xs font-semibold">Filter by status : </div>
        <form action="/seller/orders" id="filters" class="mb-3">
            @csrf
            @if (request('search'))
                <input type="hidden" name="search" value="{{ request('search') }}">
            @endif
            @if (request('start_date'))
                <input type="hidden" name="start_date" value="{{ request('start_date') }}">
            @endif
            @if (request('end_date'))
                <input type="hidden" name="end_date" value="{{ request('end_date') }}">
            @endif
            <div
                class="flex space-x-2 *:px-2 *:py-0.5 *:border *:border-sky-500/15 *:rounded-full *:text-sm *:font-medium *:self-center *:text-sky-300">
                <a href="/seller/orders"
                    class="hover:bg-sky-500/10 hover:shadow-inner @if (request('status') == null) bg-sky-500/30 pointer-events-none @endif">All</a>
                <button type="submit" name="status" id="status" value="briefing"
                    class="hover:bg-sky-500/10 hover:shadow-inner  @if (request('status') == 'briefing') bg-sky-500/30 pointer-events-none @endif">Briefing</button>
                <button type="submit" name="status" id="status" value="kesepakatan"
                    class="hover:bg-sky-500/10 hover:shadow-inner  @if (request('status') == 'kesepakatan') bg-sky-500/30 pointer-events-none @endif">Kesepakatan</button>
                <button type="submit" name="status" id="status" value="pembayaran"
                    class="hover:bg-sky-500/10 hover:shadow-inner  @if (request('status') == 'pembayaran') bg-sky-500/30 pointer-events-none @endif">Pembayaran</button>
                <button type="submit" name="status" id="status" value="finalisasi"
                    class="hover:bg-sky-500/10 hover:shadow-inner  @if (request('status') == 'finalisasi') bg-sky-500/30 pointer-events-none @endif">Finalisasi</button>
                <button type="submit" name="status" id="status" value="selesai"
                    class="hover:bg-sky-500/10 hover:shadow-inner  @if (request('status') == 'selesai') bg-sky-500/30 pointer-events-none @endif">Selesai</button>
                <button type="submit" name="status" id="status" value="dibatalkan"
                    class="hover:bg-sky-500/10 hover:shadow-inner  @if (request('status') == 'dibatalkan') bg-sky-500/30 pointer-events-none @endif">Dibatalkan</button>
            </div>
        </form>

        @if (true)
            <div class="mb-2 text-xs font-semibold">Filter by order date : </div>
            <form action="/seller/orders" id="filters" class="mb-3">
                @csrf
                @if (request('search'))
                    <input type="hidden" name="search" value="{{ request('search') }}">
                @endif
                @if (request('status'))
                    <input type="hidden" name="status" value="{{ request('status') }}">
                @endif
                <div
                    class="flex space-x-2 *:px-2 *:py-0.5 *:border *:border-sky-500/15 *:rounded-md *:text-sm *:font-medium *:self-center *:text-sky-300">
                    <input type="date" name="start_date" id="start_date"
                        class="bg-transparent hover:bg-sky-500/10 hover:shadow-inner" value="{{ request('start_date') }}"
                        onchange="return limitDate()">
                    <input type="date" name="end_date" id="end_date"
                        class="bg-transparent hover:bg-sky-500/10 hover:shadow-inner" value="{{ request('end_date') }}"
                        onchange="return limitDate()">
                    <button type="submit" class="bg-sky-500/50">Submit</button>
                </div>
            </form>
        @endif
    </div>

    <div class="italic text-gray-500 text-xs">Menampilkan {{ count($orders) }} order</div>

    @forelse ($orders as $order)
        <div class="card group shadow-sm bg-lightGrey hover:bg-gray-600 p-3 mt-3 rounded-md text-white">
            <a href="/seller/orders/{{ $order->id }}">
                <div class="card-body">
                    <div class="flex space-x-3">
                        <div class="flex-none w-32 items-center ">
                            <img src="{{ asset('images/banner-verifikasi.jpg') }}" alt=""
                                class="mt-1 mb-2 rounded-md">
                            <div class="text-xs border rounded-md px-2 py-0.5 text-center bg-slate-400/50 font-semibold">
                                {{ $order->status->title }}
                            </div>
                        </div>
                        <div class="flex-1">
                            {{-- info orderan --}}
                            <div class="font-semibold text-2xl block">order #{{ $order->id }}</div>
                            <div class="flex space-x-10">
                                <div class="flex-initial *:items-center *:flex">
                                    <div class="text-sm"><span class="material-symbols-rounded text-sm me-2">person</span>
                                        {{ $order->user->fname }}</div>
                                    <div class="text-sm"><span
                                            class="material-symbols-rounded text-sm me-2">package</span>
                                        {{ $order->package->title }}</div>
                                    <div class="text-sm"><span class="material-symbols-rounded text-sm me-2">sell</span>
                                        {{ $order->agreement->price ?? '-' }}</div>
                                    <div class="text-sm mb-0"><span
                                            class="material-symbols-rounded text-sm me-2">schedule</span>{{ $order->created_at ? $order->created_at->diffForHumans() : '' }}
                                    </div>
                                </div>
                                <div class="flex-initial *:items-center *:flex">
                                    {{-- info jadwal --}}
                                    <div class="text-sm"><span
                                            class="material-symbols-rounded text-sm me-2">contact_phone</span>
                                        {{ $order->brief->meet_date ?? '-' }}</div>
                                    <div class="text-sm"><span
                                            class="material-symbols-rounded text-sm me-2">work_history</span>
                                        {{ $order->agreement->project_start_date ?? ($order->brief->project_start_date ?? '') }}
                                        -
                                        {{ $order->agreement->project_end_date ?? ($order->brief->project_end_date ?? '') }}
                                    </div>
                                    <div class="text-sm"><span
                                            class="material-symbols-rounded text-sm me-2">pin_drop</span>
                                        {{ $order->agreement->address ?? 'City A' }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="w-32 hidden group-hover:flex items-center justify-center">
                            <div class="font-semibold flex items-center text-sm hover:text-blue-600">Detail <span
                                    class="material-symbols-rounded text-sm ms-2">chevron_right</span></div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    @empty
        <div class="text-slate-500 font-semibold">Belum ada order masuk :(</div>
    @endforelse

    <script>
        function limitDate() {
            const startField = document.querySelector('#start_date');
            const endField = document.querySelector('#end_date');

            const startDate = startField.value;
            const endDate = endField.value;

            endField.setAttribute('min', startDate);
            startField.setAttribute('max', endDate);
        }
    </script>

@endsection
