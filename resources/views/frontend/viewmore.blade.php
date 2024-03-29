<x-home-layout>
    <div class="mt-16 mx-4">
        <div class="flex">
            <div class="basis-1/2">
                <h3 class="text-gray-600 text-2xl font-medium">Buku</h3>
            </div>
        </div>
        
        <div class="grid gap-6 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 mt-6">
            @foreach ($data1 as $key=>$item)
                @if ($item->id_kategori == 1)
                <a href="{{ route('home.show', ['home' => $item->id_produk]) }}" class="flex items-center mt-4 text-white text-sm uppercase font-medium rounded hover:underline focus:outline-none">
                    <div class="w-full max-w-sm mx-auto rounded-md shadow-md overflow-hidden">
                        <div class="flex items-end justify-end h-56 w-full bg-cover">
                            <img src="{{$item->foto_produk}}" alt="" class="object-contain h-full w-full">
                        </div>
                        <div class="px-5 py-3 flex">
                            <div class="flex-1 w-64">
                                <h3 class="text-gray-700 uppercase">{{$item->nama_produk}}</h3>
                                <span class="text-gray-500 mt-2">
                                    @foreach ($item->rates as $rate)
                                    Rp. {{ number_format($rate->nama_rate, 0, ',', '.') }}
                                    @endforeach
                                </span>
                            </div>
                            <div class="flex-none">
                                <button class="p-2 rounded-full bg-blue-600 text-white mx-5 -mb-4 hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                                    <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </a>
                @endif
            @endforeach
        </div>
    </div>
</x-home-layout>