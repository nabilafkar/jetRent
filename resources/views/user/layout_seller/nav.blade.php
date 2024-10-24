     <!-- Navbar -->
     <nav class="relative flex flex-wrap items-center justify-between px-0 py-2 mx-6 transition-all ease-in shadow-none duration-250 rounded-2xl lg:flex-nowrap lg:justify-start"
         navbar-main navbar-scroll="false">
         <div class="flex items-center justify-between w-full px-4 py-1 mx-auto flex-wrap-inherit">
             <nav>
                 <!-- breadcrumb -->
                 <ol class="flex list-none flex-wrap pt-1 mr-12 bg-transparent rounded-lg sm:mr-16">
                     <li class="text-sm leading-normal">
                         <a class="text-white opacity-50" href="/seller">Admin</a>
                     </li>
                     <li class="text-sm pl-2 capitalize leading-normal text-white before:float-left before:pr-2 before:text-white before:content-['/']"
                         aria-current="page">
                         <a class="text-white opacity-50" href="/Admin/@yield('judul')">@yield('judul')</a>
                     </li>
                     {{-- aria-current="page">Dashboard</li> --}}
                 </ol>
                 <h6 class="mb-0 font-bold text-white capitalize">@yield('sub-judul')</h6>
             </nav>

             <div class="flex items-center mt-2 grow sm:mt-0 sm:mr-6 md:mr-0 lg:flex lg:basis-auto">
                 <div class="flex items-center md:ml-auto md:pr-4">


                 </div>
                 <ul class="flex flex-row justify-end pl-4 mb-0 list-none md-max:w-full">
                     @auth
                         <li class="flex items-center mr-4">
                             <a href="{{ route('profile.edit') }}"
                                 class="block px-0 py-4 text-lg font-semibold text-white transition-all ease-nav-brand">
                                 <i class="fa fa-user sm:mr-1"></i>
                                 <span class="hidden sm:inline"></span>
                             </a>

                         </li>
                     @endauth

                     <li class="flex items-center pl-6 xl:hidden">
                         <a href="javascript:;" class="block p-0 text-sm text-white transition-all ease-nav-brand"
                             sidenav-trigger>
                             <div class="w-4.5 overflow-hidden">
                                 <i class="ease mb-0.75 relative block h-0.5 rounded-sm bg-white transition-all"></i>
                                 <i class="ease mb-0.75 relative block h-0.5 rounded-sm bg-white transition-all"></i>
                                 <i class="ease relative block h-0.5 rounded-sm bg-white transition-all"></i>
                             </div>
                         </a>
                     </li>
                     <li class="flex items-center px-4 font-semibold ">
                         <form action="/logout" method="post">
                             @csrf
                             <button type="submit"
                                 class="text-sm text-white transition-all ease-nav-brand bg-danger py-2 px-3 rounded-lg hover:bg-lightGreen">
                                 Log Out
                             </button>
                         </form>
                     </li>
                 </ul>
             </div>
         </div>
     </nav>

     <!-- end Navbar -->
