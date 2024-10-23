{{-- Start Finalisasi --}}
<details class="finalisasi bg-[#292f3a] p-3 space-y-4 rounded-sm" id="finalisasi"
    @if ($step === 4) open @endif>
    <summary class="text-white font-semibold text-lg hover:cursor-pointer">Finalisasi</summary>
    <p>Upload Hasil Kerja -> Finalisasi Client -> Selesai </p>
    {{-- <details> --}}
        <summary> Upload Hasil Kerja</summary>
        <div class="evidance space-y-3">
            @if ($order->work_link)
                <div class="text-sm flex items-center"> <span
                        class="material-symbols-rounded text-sm me-2 text-green-500">check</span> Anda (seller) telah
                    mengirim
                    Hasil Kerja </div>
            @else
                <div class="text-sm flex items-center"> <span
                        class="material-symbols-rounded text-sm me-2 text-red-600">close</span> Anda (seller) belum
                    mengirim
                    Hasil Kerja </div>
            @endif

            @if ($order->status_id == 9)
                <div class="text-sm flex items-center"> <span
                        class="material-symbols-rounded text-sm me-2 text-green-500">check</span> Buyer telah
                    menyelesaikan
                    transaksi </div>
            @else
                <div class="text-sm flex items-center"> <span
                        class="material-symbols-rounded text-sm me-2 text-red-600">close</span> Buyer belum
                    menyelesaikan
                    Transaksi </div>
            @endif

            @if (session()->has('successEvidance'))
                <div class="bg-slate-700 p-2 flex items-center rounded-lg font-medium text-sm" role="alert">
                    <span class="material-symbols-rounded me-2">info</span>
                    {{ session('successEvidance') }}
                </div>
            @endif
            @if ($order->status_id <= 8)
                @if ($order->work_link)
                    <form action="{{ route('dashboardSellerDestroyHasilKerja', $order->id) }}" method="POST"
                        class="block mt-3">
                        @csrf
                        @method('put')
                        <div class="p-3 border rounded-md">
                            <label for="work_link" class="block text-xs mb-2">Link Hasil Kerja Seller</label>
                            <input type="text" class="rounded-md text-sm bg-slate-600 border px-3 py-1"
                                name="work_link" id="work_link" value="{{ $order->work_link }}" disabled>
                            <a href="{{ $order->work_link }}" target="_blank"
                                class="px-2 py-1.5 bg-blue-600 rounded-md font-medium text-sm ms-2 "><span
                                    class="material-symbols-rounded text-sm align-middle">open_in_new</span></a>
                            <button type="submit" class="px-3 py-1 bg-red-600 rounded-md font-medium text-sm ms-2"
                                onclick="return deleteConfirm()">Hapus</button>
                            @error('work_link')
                                <div class="text-xs text-red-500 mt-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </form>
                @else
                    <form action="{{ route('dashboardSellerStoreHasilKerja', $order->id) }}" method="POST"
                        class="block mt-3">
                        @csrf
                        <div class="p-3 border rounded-md">
                            <label for="work_link" class="block text-xs mb-2">Link Hasil Kerja Seller</label>
                            <input type="text" class="rounded-md text-sm bg-slate-600 border px-3 py-1"
                                name="work_link" id="work_link" value="{{ old('work_link' ?? '') }}">
                            <button type="submit"
                                class="px-3 py-1 bg-green-600 rounded-md font-medium text-sm ms-2">Submit</button>
                            @error('work_link')
                                <div class="text-xs text-red-500 mt-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </form>
                @endif
            @else
                <div class="p-3 border rounded-md">
                    <label for="work_link" class="block text-xs mb-2">Link Hasil Kerja Seller</label>
                    <input type="text" class="rounded-md text-sm bg-slate-600 border px-3 py-1" name="work_link"
                        id="work_link" value="{{ $order->work_link }}" disabled>
                    <a href="{{ $order->work_link }}" target="_blank"
                        class="px-2 py-1.5 bg-blue-600 rounded-md font-medium text-sm ms-2 "><span
                            class="material-symbols-rounded text-sm align-middle">open_in_new</span></a>

                </div>
            @endif

        </div>
    </details>
    @if ($order->complaint && $order->complaint->status_id == 2)
        <details class="">
            <summary> Pesanan dikomplain</summary>
            <div class="p-2">
                <h1 class=" mb-4 text-md text-red-600">Hasil Kerjamu tidak sesuai kesepakatan, Mohon lakukan
                    diskusi
                    bersama buyer dan admin !</h1>
                <h1 class="text-white mb-2 text-sm">Alasan Buyer Aju Banding</h1>
                <textarea id="description" rows="4"
                    class="block p-2.5 mb-3 w-[50%] text-sm text-gray-900 bg-gray-300 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    disabled>{{ $order->complaint->body }}</textarea>

                <h1 class="text-white mb-2 text-sm">Alasan Admin Acc Aju Banding</h1>
                <textarea id="description" rows="4"
                    class="block p-2.5 mb-3 w-[50%] text-sm text-gray-900 bg-gray-300 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    disabled>{{ $order->complaint->admin_reason }}</textarea>

                <button type="button"
                    class="text-white bg-shotlanceTosca hover:bg-hoverTosca focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2  focus:outline-none ">Buka
                    Halaman Diskusi</button>
            </div>

        </details>
    @endif
</details>
