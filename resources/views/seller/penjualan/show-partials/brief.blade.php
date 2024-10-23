<details class="brief bg-[#292f3a] p-3 space-y-4 rounded-sm" id="brief" @if ($step === 1) open @endif>
    <summary id="brief" class="text-white font-semibold text-lg hover:cursor-pointer">Brief</summary>
    <div class="brief-details">
        <div class="text-sm font-semibold mb-3">Details @if ($order->status->id >= 2 && $order->status->id !== 10)
                <span class="material-symbols-rounded text-md text-green-500 align-middle mb-1 ms-2">done_all</span>
            @else
                <span class="material-symbols-rounded text-md text-gray-500 align-middle mb-1 ms-2">done_all</span>
            @endif
        </div>
        <div class="p-3 border rounded-md mb-2 text-sm">
            <div class="w-full space-y-3 ">
                <div class="flex items-start w-full">
                    <h1 class="w-1/3 text-white">Id Pemesanan</h1>
                    <p class="w-1/3">#{{ $order->id }}shotlance</p>
                </div>
                <div class="flex items-start w-full">
                    <h1 class="w-1/3 text-white">Pengajuan Tanggal Briefing</h1>
                    <p class="w-1/3">{{ $order->brief->meet_date }}</p>
                </div>
                <div class="flex items-start w-full">
                    <h1 class="w-1/3 text-white">Tanggal Project</h1>
                    <p class="w-1/3">{{ $order->brief->project_start_date }} <span>-</span>
                        {{ $order->brief->project_end_date }}</p>
                </div>
                <div class="flex items-start w-full">
                    <h1 class="w-1/3 text-white">Paket yang dipesan</h1>
                    <p class="w-1/3">{{ $order->package->title }}</p>
                </div>

                <div class="flex items-start w-full">
                    <h1 class="w-1/3 text-white">Alamat Briefing</h1>
                    <p class="w-1/3">{{ $order->brief->meet_link }} </p>
                </div>
            </div>
        </div>

        <div
            class="body rounded-sm border py-3 px-4 shadow-md bg-white max-h-[200px] overflow-scroll font-medium text-sm text-black mb-2">
            Deskripsi Buyer: {{ $order->brief->body }}
        </div>
        @if ($order->status->id < 2 && $order->status->id !== 10)
            <div class="flex justify-end space-x-2">
                {{-- start of tombol setuju --}}
                <button data-modal-target="popup-modal-setuju" data-modal-toggle="popup-modal-setuju" type="button"
                    class="px-3 py-1 bg-green-600 rounded-md font-medium text-sm">Setujui</button>
                {{-- start of modal setuju --}}
                <div id="popup-modal-setuju" tabindex="-1"
                    class="light !important hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative p-4 w-full max-w-md max-h-full">
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <button type="button"
                                class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                data-modal-hide="popup-modal">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                            <div class="p-4 md:p-5 text-center">
                                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Apakah Yakin
                                    Menyetujui Brief?</h3>
                                <div class="flex justify-center">

                                    <form action="{{ route('dashboardSellerSetujuibrief', $order->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('put')
                                        <input type="hidden" name="status_id" value="2">
                                        <button data-modal-hide="popup-modal" type="submit"
                                            class="text-white bg-green-600 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                            Setuju
                                        </button>
                                    </form>
                                    <button data-modal-hide="popup-modal" type="button"
                                        class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                        Tidak </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- end of modal setuju --}}
                {{-- end of tombol setuju --}}

                {{-- start of tombol tolak --}}
                <button data-modal-target="popup-modal-tolak" data-modal-toggle="popup-modal-tolak" type="button"
                    class="px-3 py-1 bg-red-600 rounded-md font-medium text-sm">Tolak</button>
                {{-- start of modal tolak --}}
                <div id="popup-modal-tolak" tabindex="-1"
                    class="light !important hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative p-4 w-full max-w-md max-h-full">
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <button type="button"
                                class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                data-modal-hide="popup-modal">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                            <div class="p-4 md:p-5 text-center">
                                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Apakah Yakin
                                    Menyetujui Brief?</h3>
                                <div class="flex justify-center">
                                    <form action="{{ route('dashboardSellerTolakbrief', $order->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('put')
                                        <input type="hidden" name="status_id" value="10">
                                        <button data-modal-hide="popup-modal" type="submit"
                                            class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                            Tolak
                                        </button>
                                    </form>
                                    <button data-modal-hide="popup-modal" type="button"
                                        class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                        Tidak </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- end of modal tolak --}}
                {{-- end of tombol tolak --}}
            </div>
        @endif
    </div>

    <details @if ($order->status->id == 2) open @endif>
        <summary id="bukti-pertemuan" class="text-sm font-semibold mb-3 hover:cursor-pointer">Bukti Pertemuan @if ($order->status->id >= 3 && $order->status->id !== 10)
                <span class="material-symbols-rounded text-md text-green-500 align-middle mb-1 ms-2">done_all</span>
            @else
                <span class="material-symbols-rounded text-md text-gray-500 align-middle mb-1 ms-2">done_all</span>
            @endif
        </summary>
        <div class="evidance space-y-3">
            @if ($order->brief->buyer_evidance)
                <div class="text-sm flex items-center"> <span
                        class="material-symbols-rounded text-sm me-2 text-green-500">check</span> Buyer telah mengirim
                    bukti pertemuan</div>
            @else
                <div class="text-sm flex items-center"> <span
                        class="material-symbols-rounded text-sm me-2 text-red-600">close</span> Buyer belum mengirim
                    bukti pertemuan</div>
            @endif
            @if ($order->brief->seller_evidance)
                <div class="text-sm flex items-center"> <span
                        class="material-symbols-rounded text-sm me-2 text-green-500">check</span> Seller telah mengirim
                    bukti pertemuan</div>
            @else
                <div class="text-sm flex items-center"> <span
                        class="material-symbols-rounded text-sm me-2 text-red-600">close</span> Seller belum mengirim
                    bukti pertemuan</div>
            @endif

            @if (session()->has('successEvidance'))
                <div class="bg-slate-700 p-2 flex items-center rounded-lg font-medium text-sm" role="alert">
                    <span class="material-symbols-rounded me-2">info</span>
                    {{ session('successEvidance') }}
                </div>
            @endif

            @if ($order->brief->seller_evidance)
                <form action="/seller/orders/{{ $order->id }}/destroySellerEvidance" method="POST"
                    class="block mt-3">
                    @csrf
                    <div class="p-3 border rounded-md">
                        <label for="seller_evidance" class="block text-xs mb-2">Link Bukti Pertemuan Seller</label>
                        <input type="text" class="rounded-md text-sm bg-slate-600 border px-3 py-1"
                            name="seller_evidance" id="seller_evidance" value="{{ $order->brief->seller_evidance }}"
                            disabled>
                        <a href="{{ $order->brief->seller_evidance }}" target="_blank"
                            class="px-2 py-1.5 bg-blue-600 rounded-md font-medium text-sm ms-2 "><span
                                class="material-symbols-rounded text-sm align-middle">open_in_new</span></a>
                        <button type="submit" class="px-3 py-1 bg-red-600 rounded-md font-medium text-sm ms-2"
                            onclick="return deleteConfirm()">Hapus</button>
                        @error('seller_evidance')
                            <div class="text-xs text-red-500 mt-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </form>
            @else
                <form action="/seller/orders/{{ $order->id }}/storeSellerEvidance" method="POST"
                    class="block mt-3">
                    @csrf
                    <div class="p-3 border rounded-md">
                        <label for="seller_evidance" class="block text-xs mb-2">Link Bukti Pertemuan Seller</label>
                        <input type="text" class="rounded-md text-sm bg-slate-600 border px-3 py-1"
                            name="seller_evidance" id="seller_evidance" value="{{ old('seller_evidance' ?? '') }}">
                        <button type="submit"
                            class="px-3 py-1 bg-green-600 rounded-md font-medium text-sm ms-2">Submit</button>
                        @error('seller_evidance')
                            <div class="text-xs text-red-500 mt-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </form>
            @endif
        </div>
    </details>
</details>
