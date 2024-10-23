@extends('seller.layout_seller.layout')

@section('judul')
    orders
@endsection

@section('sub-judul')
    Order #{{ $order->id }}
@endsection

@section('content')
    @include('seller.layout_seller.alert')

    @if (session()->has('error'))
        <div class="bg-red-600 p-2 flex items-center rounded-lg font-medium text-sm mb-4" role="alert">
            <span class="material-symbols-rounded me-2">error</span>
            {{ session('error') }}
        </div>
    @endif

    <div class="mb-10" id="stepper">
        <ol class="flex items-center w-full">
            <li
                class="flex w-full group items-center justify-center after:content-[''] after:w-full after:h-1 after:border-b @if ($step > 1) after:border-green-400 @else after:border-gray-100 @endif after:border-4 after:inline-block">
                @if ($step > 1)
                    <span class="flex items-center justify-center w-10 h-10 rounded-full shrink-0 bg-green-400">
                        <span
                            class="material-symbols-rounded text-gray-200 lg:w-5 lg:h-5 flex items-center justify-center">forum</span>
                    </span>
                @else
                    <span class="flex items-center justify-center w-10 h-10 bg-blue-600 rounded-full shrink-0">
                        <span
                            class="material-symbols-rounded text-gray-200 lg:w-5 lg:h-5 flex items-center justify-center">forum</span>
                    </span>
                @endif
                <div class="relative bg-none bg-opacity-0">
                    <div
                        class="absolute left-1 bottom-2 hidden px-3 py-1 text-sm font-semibold text-gray-200 group-hover:flex bg-lightGrey rounded-full rounded-bl-none shadow">
                        Brief</div>
                </div>
            </li>
            <li
                class="flex w-full group items-center justify-center after:content-[''] after:w-full after:h-1 after:border-b @if ($step > 2) after:border-green-400 @else after:border-gray-100 @endif after:border-4 after:inline-block ">
                @if ($step > 2)
                    <span class="flex items-center justify-center w-10 h-10 bg-green-400 rounded-full shrink-0">
                        <span
                            class="material-symbols-rounded text-gray-200 lg:w-5 lg:h-5 flex items-center justify-center">signature</span>
                    </span>
                @endif
                @if ($step == 2)
                    <span class="flex items-center justify-center w-10 h-10 bg-blue-600 rounded-full shrink-0">
                        <span
                            class="material-symbols-rounded text-gray-200 lg:w-5 lg:h-5 flex items-center justify-center">signature</span>
                    </span>
                @endif
                @if ($step < 2 && $step !== 2)
                    <span class="flex items-center justify-center w-10 h-10 bg-gray-100 rounded-full shrink-0">
                        <span
                            class="material-symbols-rounded text-gray-500 lg:w-5 lg:h-5 flex items-center justify-center">signature</span>
                    </span>
                @endif
                <div class="relative bg-none bg-opacity-0">
                    <div
                        class="absolute left-1 bottom-2 hidden px-3 py-1 text-sm font-semibold text-gray-200 group-hover:flex bg-lightGrey rounded-full rounded-bl-none shadow">
                        Kesepakatan</div>
                </div>
            </li>
            <li
                class="flex w-full group items-center justify-center after:content-[''] after:w-full after:h-1 after:border-b @if ($step > 3) after:border-green-400 @else after:border-gray-100 @endif after:border-4 after:inline-block ">
                @if ($step > 3)
                    <span class="flex items-center justify-center w-10 h-10 bg-green-400 rounded-full shrink-0">
                        <span
                            class="material-symbols-rounded text-gray-200 lg:w-5 lg:h-5 flex items-center justify-center">payments</span>
                    </span>
                @endif
                @if ($step == 3)
                    <span class="flex items-center justify-center w-10 h-10 bg-blue-600 rounded-full shrink-0">
                        <span
                            class="material-symbols-rounded text-gray-200 lg:w-5 lg:h-5 flex items-center justify-center">payments</span>
                    </span>
                @endif
                @if ($step < 3 && $step !== 3)
                    <span class="flex items-center justify-center w-10 h-10 bg-gray-100 rounded-full shrink-0">
                        <span
                            class="material-symbols-rounded text-gray-500 lg:w-5 lg:h-5 flex items-center justify-center">payments</span>
                    </span>
                @endif
                <div class="relative bg-none bg-opacity-0">
                    <div
                        class="absolute left-1 bottom-2 hidden px-3 py-1 text-sm font-semibold text-gray-200 group-hover:flex bg-lightGrey rounded-full rounded-bl-none shadow">
                        Pembayaran</div>
                </div>
            </li>
            <li
                class="flex w-full group @if ($step > 4) items-center justify-center after:content-[''] after:w-full after:h-1 after:border-b after:border-green-400 after:border-4 after:inline-block @endif ">
                @if ($step == 5)
                    <span class="flex items-center justify-center w-10 h-10 bg-green-400 rounded-full shrink-0">
                        <span
                            class="material-symbols-rounded text-gray-200 lg:w-5 lg:h-5 flex items-center justify-center">package_2</span>
                    </span>
                @endif
                @if ($step == 4)
                    <span class="flex items-center justify-center w-10 h-10 bg-blue-600 rounded-full shrink-0">
                        <span
                            class="material-symbols-rounded text-gray-200 lg:w-5 lg:h-5 flex items-center justify-center">package_2</span>
                    </span>
                @endif
                @if ($step < 4)
                    <span class="flex items-center justify-center w-10 h-10 bg-gray-100 rounded-full shrink-0">
                        <span
                            class="material-symbols-rounded text-gray-500 lg:w-5 lg:h-5 flex items-center justify-center">package_2</span>
                    </span>
                @endif
                <div class="relative bg-none bg-opacity-0">
                    <div
                        class="absolute left-1 bottom-2 hidden px-3 py-1 text-sm font-semibold text-gray-200 group-hover:flex bg-lightGrey rounded-full rounded-bl-none shadow">
                        Finalisasi</div>
                </div>
            </li>
            @if ($step == 5)
                <li class="flex w-full group">
                    <span class="flex items-center justify-center w-10 h-10 bg-green-400 rounded-full shrink-0">
                        <span
                            class="material-symbols-rounded text-gray-200 lg:w-5 lg:h-5 flex items-center justify-center">task_alt</span>
                    </span>
                    <div class="relative bg-none bg-opacity-0">
                        <div
                            class="absolute left-1 bottom-2 hidden px-3 py-1 text-sm font-semibold text-gray-200 group-hover:flex bg-lightGrey rounded-full rounded-bl-none shadow">
                            Order Selesai</div>
                    </div>
                </li>
            @endif
            @if ($step == 6)
                <li class="flex w-full group">
                    <span class="flex items-center justify-center w-10 h-10 bg-red-600 rounded-full shrink-0">
                        <span
                            class="material-symbols-rounded text-gray-200 lg:w-5 lg:h-5 flex items-center justify-center">cancel</span>
                    </span>
                    <div class="relative bg-none bg-opacity-0">
                        <div
                            class="absolute left-1 bottom-2 hidden px-3 py-1 text-sm font-semibold text-gray-200 group-hover:flex bg-lightGrey rounded-full rounded-bl-none shadow">
                            Order Gagal</div>
                    </div>
                </li>
            @endif
        </ol>
    </div>

    <div class="flex space-x-5">
        <div class="flex-none w-[75%] space-y-4">
            @include('seller.penjualan.show-partials.brief')

            @include('seller.penjualan.show-partials.kesepakatan')

            @include('seller.penjualan.show-partials.pembayaran')

            @include('seller.penjualan.show-partials.finalisasi')
        </div>

        <div class="flex-none w-[25%]">
            <div class="space-y-4 sticky top-[16px]">
                @include('seller.penjualan.show-partials.sidebar')
            </div>
        </div>
    </div>

    <script>
        function deleteConfirm() {
            if (!confirm("Yakin ingin menghapus bukti pertemuan?"))
                event.preventDefault();
        }

        function limitDate() {
            const startField = document.querySelector('#project_start_date');
            const endField = document.querySelector('#project_end_date');

            const startDate = startField.value;
            const endDate = endField.value;

            endField.setAttribute('min', startDate);
            startField.setAttribute('max', endDate);
        }
    </script>
@endsection
