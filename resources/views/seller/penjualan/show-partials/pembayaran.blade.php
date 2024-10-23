<details class="pembayaran bg-[#292f3a] p-3 space-y-4 rounded-sm" id="pembayaran"
    @if ($step === 3) open @endif>
    <summary class="text-white font-semibold text-lg hover:cursor-pointer">Pembayaran</summary>
    @if ($order->payment)
        <div class="text-sm flex items-center"> <span
                class="material-symbols-rounded text-sm me-2 text-green-500">check</span> Buyer Telah Melakuakan
            Pembayaran, Harap Segera Menyelesaikan Pekerjaan Sesuai Kesepakatan </div>
    @else
        <div class="text-sm flex items-center"> <span
                class="material-symbols-rounded text-sm me-2 text-red-600">close</span> Buyer Belum Melakuakan
            Pembayaran, Harap Menunggu Pembayaran </div>
    @endif


</details>
