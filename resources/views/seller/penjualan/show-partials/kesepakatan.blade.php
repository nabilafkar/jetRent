<details class="kesepakatan bg-[#292f3a] p-3 space-y-4 rounded-sm" id="kesepakatan"
    @if ($step === 2) open @endif>
    <summary class="text-white font-semibold text-lg hover:cursor-pointer">Kesepakatan</summary>
    <details @if ($order->status->id >= 3 && $order->status->id <= 5) open @endif>
        <summary class="text-sm font-semibold mb-3 hover:cursor-pointer">Details @if ($order->status->id >= 6 && $order->status->id !== 10)
                <span class="material-symbols-rounded text-md text-green-500 align-middle mb-1 ms-2">done_all</span>
            @else
                <span class="material-symbols-rounded text-md text-gray-500 align-middle mb-1 ms-2">done_all</span>
            @endif
        </summary>
        @if (session()->has('editAgreement'))
            <div class="bg-slate-700 p-2 flex items-center rounded-lg font-medium text-sm mb-4" role="alert">
                <span class="material-symbols-rounded me-2">info</span>
                {{ session('editAgreement') }}
            </div>
        @endif
        <div class="bg-slate-800 px-4 py-3 shadow-md">
            @if (!isset($order->agreement->is_seller_checked))
                <form action="/seller/orders/{{ $order->id }}/storeAgreement" method="POST">
                    @csrf
                    <div class="input-set mb-4 overflow-auto text-black !important text-xs">
                        <label for="body" class="block text-xs mb-1 text-white">Detail dan Ketentuan
                            Pekerjaan</label>
                        <textarea name="body" id="detailKesepakatan" cols="50" rows="20"
                            class="rounded-md text-sm bg-slate-600 text-black !important border px-3 py-1"
                            placeholder="Tuliskan spesifikasi serta persyaratan yang telah disepakati saat pertemuan dengan lengkap">{{ $order->package->spec_items }} <br> {{ old('body') ?? ($order->agreement->body ?? '') }}</textarea>
                        @error('body')
                            <div class="text-xs text-red-500 mt-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="input-set mb-4">
                        <label for="start_date" class="block text-xs mb-1">Waktu Pekerjaan</label>
                        <div class="flex space-x-2">
                            <input type="date"
                                class="rounded-md text-sm bg-slate-600 border px-3 py-1 placeholder-white"
                                name="project_start_date" id="project_start_date"
                                value="{{ old('project_start_date') ?? (\Carbon\Carbon::parse($order->agreement->project_start_date)->format('Y-m-d') ?? '') }} "
                                min="{{ $tomorrow }}" onchange="return limitDate()">
                            <span>-</span>
                            <input type="date" class="rounded-md text-sm bg-slate-600 border px-3 py-1"
                                name="project_end_date" id="project_end_date"
                                value="{{ old('project_end_date') ?? (\Carbon\Carbon::parse($order->agreement->project_end_date)->format('Y-m-d') ?? '') }}"
                                onchange="return limitDate()">
                        </div>
                        @error('start_date')
                            <div class="text-xs text-red-500 mt-1">
                                {{ $message }}
                            </div>
                        @enderror
                        @error('end_date')
                            <div class="text-xs text-red-500 mt-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="input-set mb-4">
                        <label for="price" class="block text-xs mb-1">Nilai Pekerjaan</label>
                        <div class="flex items-center">
                            <span class="me-2 text-sm font-medium align-middle">Rp. </span>
                            <input type="text" class="rounded-md text-sm bg-slate-600 border px-3 py-1"
                                name="price" id="price"
                                value="{{ old('price') ?? ($order->agreement->price ?? '') }}" placeholder="5000000">
                        </div>
                        @error('price')
                            <div class="text-xs text-red-500 mt-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="input-set mb-4">
                        <div class="flex">
                            <input type="checkbox" class="rounded-md text-sm bg-slate-600 border me-2"
                                name="is_seller_checked" id="is_seller_checked" value="1">
                            <label for="is_seller_checked" class=" text-xs mb-1 font-light text-gray-300">Setujui
                                kesepakatan yang diajukan</label>
                        </div>
                        @error('is_seller_checked')
                            <div class="text-xs text-red-500 mt-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button type="submit"
                        class="px-3 py-1 bg-green-600 rounded-md font-medium text-sm flex items-center hover:bg-green-500"><span
                            class="material-symbols-rounded text-sm me-2">save</span>Simpan</button>
                </form>
            @else
                @if ($order->agreement->is_buyer_checked === null)
                    <div class="bg-slate-700 p-2 flex items-center rounded-lg font-medium text-sm mb-4" role="alert">
                        <span class="material-symbols-rounded me-2">pending</span>
                        Menunggu buyer menyetujui kesepakatan
                    </div>
                @endif
                @if ($order->agreement->is_buyer_checked === 0)
                    <div class="bg-slate-700 p-2 flex items-center rounded-lg font-medium text-sm mb-4" role="alert">
                        <span class="material-symbols-rounded me-2">unsubscribe</span>
                        Buyer menolak kesepakatan yang diajukan, silakan edit dan ajukan kembali
                    </div>
                @endif
                <form action="/seller/orders/{{ $order->id }}/editAgreement" method="POST">
                    @csrf
                    <div class="input-set mb-4">
                        <label for="detailKesepakatanDisabled" class="block text-xs mb-1">Detail dan Ketentuan
                            Pekerjaan</label>
                        {{-- <textarea name="body" id="detailKesepakatanDisabled" cols="50" rows="20"
                            class="rounded-md text-sm bg-slate-600 border px-3 py-1 text-gray-300 !important"
                            placeholder="Tuliskan spesifikasi serta persyaratan yang telah disepakati saat pertemuan dengan lengkap" disabled>  {!! $order->agreement->body !!}</textarea> --}}
                        <div
                            class="body rounded-sm border py-3 px-4 shadow-md bg-white max-h-[200px] overflow-scroll font-medium text-sm text-black mb-2">
                            <ol class="list-decimal">
                                {!! $order->agreement->body !!}
                            </ol>

                        </div>

                    </div>
                    <div class="input-set mb-4">
                        <label for="start_date" class="block text-xs mb-1">Waktu Pekerjaan</label>
                        <div class="flex space-x-2">
                            <input type="date" class="rounded-md text-sm bg-slate-600 border px-3 py-1 text-gray-300"
                                name="start_date" id="start_date"
                                value="{{ \Carbon\Carbon::parse($order->agreement->start_date)->format('Y-m-d') }}"
                                min="{{ $tomorrow }}" onchange="return limitDate()" disabled>
                            <span>-</span>
                            <input type="date" class="rounded-md text-sm bg-slate-600 border px-3 py-1 text-gray-300"
                                name="end_date" id="end_date"
                                value="{{ \Carbon\Carbon::parse($order->agreement->end_date)->format('Y-m-d') }}"
                                onchange="return limitDate()" disabled>
                        </div>
                    </div>
                    <div class="input-set mb-4">
                        <label for="price" class="block text-xs mb-1">Nilai Pekerjaan</label>
                        <div class="flex items-center">
                            <span class="me-2 text-sm font-medium align-middle">Rp. </span>
                            <input type="text"
                                class="rounded-md text-sm bg-slate-600 border px-3 py-1 text-gray-300" name="price"
                                id="price" value="{{ $order->agreement->price }}" placeholder="5000000"
                                disabled>
                        </div>
                    </div>
                    <div class="input-set mb-4 flex">
                        <input type="checkbox" class="rounded-md text-sm bg-slate-600 border me-2"
                            name="is_seller_checked" id="is_seller_checked" value="1" disabled checked>
                        <label for="is_seller_checked" class=" text-xs mb-1 font-light text-gray-300">Setujui
                            kesepakatan yang diajukan</label>
                    </div>
                    @if ($order->agreement->is_buyer_checked === 0)
                        <button type="submit"
                            class="px-3 py-1 bg-blue-500 rounded-md font-medium text-sm flex items-center hover:bg-blue-400"><span
                                class="material-symbols-rounded text-sm me-2">edit</span>Edit</button>
                    @endif
                </form>
            @endif
        </div>
    </details>
</details>



@section('scripts')
    <script>
        ClassicEditor
            .create(document.querySelector('#detailKesepakatan'), {
                toolbar: ['undo', 'redo', 'bold', 'italic', 'numberedList', 'bulletedList'],
                // Tambahkan konfigurasi untuk mengatur jenis daftar yang dihasilkan oleh tombol 'numberedList'

                list: {
                    // Menggunakan 'ordered' untuk daftar bernomor
                    ordered: 'decimal'
                }
            })
            .catch(error => {
                console.log(error);
            });



        function formatCurrency(value) {
            // Menghapus karakter non-angka
            let numericValue = value.replace(/\D/g, '');
            // Menambahkan separator ribuan
            numericValue = new Intl.NumberFormat('id-ID').format(numericValue);

            return numericValue;
        }
    </script>
@endsection
