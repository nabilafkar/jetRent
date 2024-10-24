<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    {{-- Google Material Icons --}}
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0" />

    <title>JetRent</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}" />
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        * {
            font-family: Montserrat
        }
    </style>
</head>

<body class="bg-midnight">
    <div class="bg-midnight h-full text-white">
        <div class="flex h-screen">
            <div class="w-1/2 pt-[6%] px-[10%] items-center space-y-6">
                <img src="{{ asset('images/logo.png') }}" alt="thumbnail" class="h-auto w-[200px]">
                <h1 class="text-4xl ">Registrasi</h1>
                <form class="grid grid-cols-1 space-y-6 " action="{{ route('register') }}" method="post">
                    @csrf
                    <div class="">
                        <input type="text" id="fname" name="name"
                            class="w-full px-4 py-3 border rounded-md focus:outline-none text-black @error('fname') is-invalid @enderror"
                            placeholder="Nama Lengkap">
                        @error('name')
                            <div class="text-xs text-red-500">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="">
                        <input type="text" id="fname" name="phone"
                            class="w-full px-4 py-3 border rounded-md focus:outline-none text-black @error('fname') is-invalid @enderror"
                            placeholder="Nomor Handphone">
                        @error('phone')
                            <div class="text-xs text-red-500">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="">
                        <input type="text" id="fname" name="address"
                            class="w-full px-4 py-3 border rounded-md focus:outline-none text-black @error('fname') is-invalid @enderror"
                            placeholder="Alamat">
                        @error('address')
                            <div class="text-xs text-red-500">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="">
                        <input type="email" id="email" name="email"
                            class="w-full px-4 py-3 border rounded-md focus:outline-none text-black @error('email') is-invalid @enderror"
                            placeholder="Email">
                        @error('email')
                            <div class="text-xs text-red-500">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="">
                        <input type="password" id="password" name="password"
                            class="w-full px-4 py-3 border rounded-md focus:outline-none text-black @error('password') is-invalid @enderror"
                            placeholder="Password">
                        @error('password')
                            <div class="text-xs text-red-500">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <button type="submit"
                        class="mt-8 w-full bg-shotlanceTosca text-white py-3 px-4 rounded-md hover:bg-hoverTosca ease-in duration-300 font-bold">Daftar</button>
                </form>
                <div class="flex justify-end">
                    <a href="/login" class=""> Sudah Punya Akun? Login</a>
                </div>

            </div>
            <div class="w-1/2 bg-cover bg-center" style="background-image: url('{{ asset('images/loginbg.jpg') }}');">
            </div>
        </div>
    </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>
<script>
    // Scroll Position Keeper
    document.addEventListener("DOMContentLoaded", function(event) {
        var scrollpos = localStorage.getItem('scrollpos');
        if (scrollpos) window.scrollTo(0, scrollpos);
    });

    window.onbeforeunload = function(e) {
        localStorage.setItem('scrollpos', window.scrollY);
    };
</script>

</html>
