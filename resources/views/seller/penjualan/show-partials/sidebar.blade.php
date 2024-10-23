<div class="order-detail border space-y-4 p-3 rounded-md">
    <h3 class="text-white font-semibold">Order<h3>
            <div class="text-gray-400 text-sm font-medium">Order #{{ $order->id }}</div>
            <div class="text-gray-400 text-sm font-medium">Buyer : {{ $order->user->fname . ' ' . $order->user->lname }}
            </div>
            <div class=" text-white text-sm flex mt-2">
                <span class="text-xs rounded-full px-2 py-0.5 text-center bg-slate-400/50 font-semibold">
                    {{ $order->status->title }}
                </span>
            </div>
            {{-- disini diisi detail ordernya yak --}}
</div>
<div class="package-detail bg-slate-700 rounded-md space-y-4 p-3">
    <h3 class="text-white font-semibold">Package<h3>
            <img src="{{ $order->package->getImageURL() }}" alt="thumbnail-package" class="rounded-md mb-3">
            <div class="body">
                <div class="text-gray-400 text-sm">{{ $order->package->title }}</div>
                <div class=" text-gray-400 text-sm mt-2"><span
                        class="text-xs rounded-full px-2 py-0.5 text-center border border-gray-500 font-semibold">
                        {{ $order->package->category->name ?? 'kategori' }}
                    </span></div>
            </div>
            <a href="{{ route('viewPaketJasa', $order->package->id) }}" target="_blank"
                class="flex items-center mt-3 justify-center font-semibold text-xs p-1 rounded-md bg-shotlanceTosca text-gray-900"><span
                    class="material-symbols-rounded text-xs me-2 font-semibold text-gray-900">open_in_new</span>See
                Detail</a>
</div>
