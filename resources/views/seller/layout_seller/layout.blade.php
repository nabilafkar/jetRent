<!DOCTYPE html>
<html class="light">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('../assetsSeller/img/apple-icon.png') }} " />
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}" />
    <title>Admin Dashboard - JetRent </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Nucleo Icons -->
    <link href="{{ asset('../assetsSeller/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('../assetsSeller/css/nucleo-svg.css') }}" rel="stylesheet" />
    {{-- Google Material Icons --}}
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,1,0" />
    <!-- Popper -->
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script>
    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Main Styling -->
    <link href="{{ asset('../assetsSeller/css/argon-dashboard-tailwind.css?v=1.0.1') }}" rel="stylesheet" />

    <style>
        * {
            font-family: Montserrat;
            letter-spacing: 0em;
        }
    </style>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="m-0 font-sans text-base antialiased font-normal  leading-default bg-midnight text-white">
    <div class="absolute w-full bg-darkGreen dark:hidden min-h-75"></div>
    @include('seller.layout_seller.sidebar')
    <main class="relative h-full max-h-screen transition-all duration-200 ease-in-out xl:ml-68 rounded-xl">
        @include('seller.layout_seller.nav')

        <div class="w-full px-10 py-6 mx-auto">
            @yield('content')
        </div>
    </main>
    {{-- script for ckeditor --}}


</body>
@yield('scripts')

<!-- plugin for charts  -->
<script src="{{ asset('../assetsSeller/js/plugins/chartjs.min.js') }}" async></script>
<!-- plugin for scrollbar  -->
<script src="{{ asset('../assetsSeller/js/plugins/perfect-scrollbar.min.js') }}" async></script>
<!-- main script file  -->
<script src="{{ asset('../assetsSeller/js/argon-dashboard-tailwind.js?v=1.0.1') }}" async></script>
<script src="{{ asset('../path/to/argon-dashboard-tailwind.js') }}"></script>
<script src="{{ asset('../path/to/flowbite/dist/datepicker.js') }}"></script>
<script src="{{ asset('../path/to/flowbite/dist/flowbite.min.js') }}"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/datepicker.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>

</html>
