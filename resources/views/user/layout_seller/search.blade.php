<form action="" method="get">

    <div class="relative flex flex-wrap items-stretch w-full transition-all rounded-lg ease">
        <button type="submit"
            class="text-sm ease leading-5.6 absolute z-50 -ml-px flex h-full items-center whitespace-nowrap rounded-lg rounded-tr-none rounded-br-none border border-r-0 border-transparent bg-transparent py-2 px-2.5 text-center font-normal text-slate-500 transition-all">
            <span>
                <i class="fas fa-search"></i>
            </span>
        </button>

        <input type="search" name="search" value="{{ request('search', '') }}"
            class="pl-9 text-sm focus:shadow-primary-outline ease w-1/100 leading-5.6 relative -ml-px block min-w-0 flex-auto rounded-lg border border-solid border-gray-300 dark:bg-slate-850 dark:text-white bg-white bg-clip-padding py-2 pr-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none focus:transition-shadow"
            placeholder="Type here..." />
    </div>
</form>
