@extends('landing_page.layout.layout')
@section('content')
    <div class="mt-44 grid grid-cols-4 gap-4 my-14 container">
        @forelse ($units as $unit)
            <div id="package{{ $unit->id }}"class="w-full max-w-sm rounded-lg  shadow bg-lightGrey border-gray-700 ">
                <a href="packages/{{ $unit->id }}">
                    <img src="{{ asset('storage/' . $unit->photo) }}" alt="thumbnail Jet Pribadi"
                        class="rounded-lg w-full h-60">
                </a>
                <div class="px-5 pb-5 pt-4">
                    <a href="#">
                        <h5 class="text-xl font-semibold tracking-tight text-white">{{ $unit->name }}</h5>
                    </a>
                    {{-- start of rating --}}
                    <div class="flex items-center mt-2.5 mb-2">
                        <div class="flex items-center space-x-1 rtl:space-x-reverse">
                            <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 22 20">
                                <path
                                    d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                            </svg>
                            <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 22 20">
                                <path
                                    d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                            </svg>
                            <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 22 20">
                                <path
                                    d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                            </svg>
                            <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 22 20">
                                <path
                                    d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                            </svg>
                            <svg class="w-4 h-4 text-gray-200 dark:text-gray-600" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                <path
                                    d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                            </svg>
                        </div>
                        <span class=" text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded bg-blue-200 ms-3">5.0</span>
                    </div>
                    {{-- end of rating --}}
                    <div class="text-gray-200 mb-2">

                        <p>{{ $unit->desc }}</p>
                    </div>
                    <div class="mb-2">
                        <span class="text-md font-bold text-white">Rp
                            {{ number_format($unit->price, 0, ',', '.') }}/day
                        </span>
                    </div>
                    <div class="flex items-center justify-between ">
                        @if (Auth::check())
                            <a href="https://wa.me/6282147588138?text=Halo%20saya%20ingin%20pesan%20jet"
                                class="text-white bg-shotlanceTosca hover:bg-hoverTosca focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center  transition ease-in-out delay-75">Pesan</a>
                        @else
                            <a href="{{ route('login') }}"
                                class="text-white bg-gray-500 hover:bg-gray-600 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center  transition ease-in-out delay-75">Login
                                untuk Pesan</a>
                        @endif


                    </div>
                </div>
            </div>
        @empty
            <div class="text-white text-center">
                <h1>Pencarian Jet Pribadi Tidak ditemukan/Tidak ada yang cocok</h1>
            </div>
        @endforelse
    </div>


    <div class="mt-4 flex items-center justify-center text-white !important">
        {{ $units->links() }}
    </div>
@endsection
