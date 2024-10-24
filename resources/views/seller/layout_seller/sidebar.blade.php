<!-- sidenav  -->
<aside
    class="fixed z-10 inset-y-0 flex-wrap items-center justify-between block w-full p-0 my-4 overflow-y-auto antialiased transition-transform duration-200 -translate-x-full bg-lightGrey border-0 shadow-xl dark:shadow-none dark:bg-slate-850 max-w-64 ease-nav-brand z-990 xl:ml-6 rounded-2xl xl:left-0 xl:translate-x-0"
    aria-expanded="false">
    <div class="h-19">
        <i class="absolute top-0 right-0 p-4 opacity-50 cursor-pointer fas fa-times dark:text-white text-slate-400 xl:hidden"
            sidenav-close></i>
        <a href="/" class="block px-8 py-6 m-0 text-sm whitespace-nowrap dark:text-white text-slate-700"
            href="" target="_blank">
            <img src="{{ asset('images/logo.png') }}"
                class="inline h-full max-w-full transition-all duration-200 dark:hidden ease-nav-brand max-h-8"
                alt="main_logo" />
            <img src="{{ asset('images/logo.png') }}"
                class="hidden h-full max-w-full transition-all duration-200 dark:inline ease-nav-brand max-h-8"
                alt="main_logo" />
            {{-- <span class="ml-1 font-semibold transition-all duration-200 ease-nav-brand">Arwana Construction</span> --}}
        </a>
    </div>

    <hr
        class="h-px mt-0 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent" />

    <div class="">
        <ul class="flex flex-col pl-0 mb-0">
            <li class="mt-0.5 w-full">
                <a class="{{ Request::is('*unit') ? 'text-black bg-slate-200 rounded-xl' : '' }}hover:bg-slate-200 rounded-xl duration-300 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors group"
                    href="">
                    <div
                        class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                        <i class="relative top-0 text-sm leading-normal text-blue-500 ni ni-tv-2"></i>
                    </div>
                    <span
                        class="ml-1 duration-300 opacity-100 pointer-events-none ease group-hover:text-gray-900">Unit</span>
                </a>
            </li>

            <li class="mt-0.5 w-full">
                <a class=" hover:bg-slate-200 group rounded-xl duration-300 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors {{ Request::is('seller/orders*') ? 'text-black bg-slate-200 rounded-xl' : '' }}"
                    href="">
                    <div
                        class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center fill-current stroke-0 text-center xl:p-2.5">
                        <i class="relative top-0 text-sm leading-normal text-emerald-500 fa fa-envelope"></i>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease group-hover:text-gray-900 ">List
                        Rental</span>
                </a>
            </li>

            {{-- <li class="mt-0.5 w-full">
                <a class=" hover:bg-slate-200 group rounded-xl duration-300 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors {{ Request::is('seller/wallet*') ? 'text-black bg-slate-200 rounded-xl' : '' }}"
                    href="/seller/wallet">
                    <div
                        class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center fill-current stroke-0 text-center xl:p-2.5">
                        <i class="relative top-0 text-sm leading-normal text-emerald-500 fa fa-money"></i>
                    </div>
                    <span
                        class="ml-1 duration-300 opacity-100 pointer-events-none ease group-hover:text-gray-900 ">Penghasilan</span>
                </a>
            </li> --}}

            <li class="mt-0.5 w-full">
                <a class="hover:bg-slate-200 group rounded-xl duration-300 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors {{ Request::is('seller/package*') ? 'text-black bg-slate-200 rounded-xl' : '' }}"
                    href="">
                    <div
                        class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                        <i class="relative top-0 text-sm leading-normal text-orange-500 fa fa-briefcase"></i>
                    </div>
                    <span
                        class="ml-1 duration-300 opacity-100 pointer-events-none ease group-hover:text-gray-900">Unit</span>
                </a>
            </li>

            {{-- <li class="mt-0.5 w-full">
                <a class="  hover:bg-slate-200 rounded-xl duration-300 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors {{ Request::is('answer*') ? 'text-black bg-slate-200 rounded-xl' : '' }}"
                    href="/answer">
                    <div
                        class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                        <i class="relative top-0 text-sm leading-normal text-cyan-500 fa fa-comments-o"></i>
                    </div>
                    <span
                        class="ml-1 duration-300 opacity-100 pointer-events-none group-hover:text-gray-900 ease">Diskusi
                        Umum</span>
                </a>
            </li> --}}




        </ul>
    </div>


</aside>

<!-- end sidenav -->
