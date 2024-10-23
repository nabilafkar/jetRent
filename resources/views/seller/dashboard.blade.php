@extends('seller.layout_seller.layout')

@section('content')
    @include('seller.layout_seller.alert')
    <div class="mb-2">
        <div class="font-semibold text-lg">Aktivitas hari ini</div>
        <div class="font-medium text-sm text-gray-400">Beberapa hal yang perlu kamu kerjakan</div>
    </div>
    <div class="grid grid-cols-4  gap-x-5 gap-y-5 text-white mb-4">
        <a href="/seller/orders?status=briefing">
            <div
                class="flex items-center max-w-sm py-2 px-3 bg-gray-600 hover:bg-lightGrey hover:cursor-pointer rounded-full shadow-lg text-white">
                <button class="flex-none me-2 rounded-full bg-blue-500 h-7 w-7 font-semibold"></button>
                <div class="flex-auto me-2 font-medium ">Pesanan baru</div>
                <div class="flex-auto flex justify-end items-center"><span
                        class="material-symbols-rounded">arrow_right_alt</span></div>
            </div>
        </a>

        <a href="/seller/orders">
            <div
                class="flex items-center max-w-sm py-2 px-3 bg-gray-600 hover:bg-lightGrey hover:cursor-pointer rounded-full shadow text-white">
                <button class="flex-none me-2 rounded-full bg-blue-500 h-7 w-7 font-semibold"></button>
                <div class="flex-auto me-2 font-medium  ">Pesanan aktif</div>
                <div class="flex-auto flex items-center justify-end"><span
                        class="material-symbols-rounded">arrow_right_alt</span></div>
            </div>
        </a>




    </div>
@endsection
