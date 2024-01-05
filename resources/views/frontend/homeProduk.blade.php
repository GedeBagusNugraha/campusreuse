<x-home-layout>
    <script src="https://cdn.tailwindcss.com"></script>
    <div class="container mx-auto px-6">
        <div class="h-64 rounded-md overflow-hidden bg-cover bg-center" id="image-slider">
            <div class="bg-gray-900 bg-opacity-50 flex items-center h-full">
                <div class="px-10 max-w-xl">
                    <h2 class="text-2xl text-white font-semibold">Spotlight</h2>
                    <p class="mt-2 text-gray-400">CampusReuse Merupakan sebuah E-Commerce yang dapat menjembatani  user yang ingin menjual barang bekas mereka sesuai kategori dan user yang dapat membeli barang yang mereka butuhkan.</p>
                </div>
            </div>
        </div>
        <div class="md:flex mt-8 md:-mx-4">
            <div class="w-full h-64 md:mx-4 rounded-md overflow-hidden bg-cover bg-center md:w-1/2" style="background-image: url('https://akcdn.detik.net.id/visual/2015/01/06/7aeb76f2-5669-46ec-9882-90552bef85ff_169.jpg?w=650&q=90')">
                <div class="bg-gray-900 bg-opacity-50 flex items-center h-full">
                    <div class="px-10 max-w-xl">
                        <h2 class="text-2xl text-white font-semibold">Buku</h2>
                        <p class="mt-2 text-gray-400">Buku adalah penjelasan singkat tentang isi dan karakteristik suatu buku. Buku dapat berbentuk kumpulan kertas atau lembaran yang tertulis, seperti novel, majalah, kamus, komik, ensiklopedia, kitab suci, biografi, naskah, dan sebagainya.</p>
                        <button class="flex items-center mt-4 text-white text-sm uppercase font-medium rounded hover:underline focus:outline-none">
                            <a href="{{route('view.index')}}">Shop Now</a>
                            <svg class="h-5 w-5 mx-2" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                        </button>
                    </div>
                </div>
            </div>
            <div class="w-full h-64 mt-8 md:mx-4 rounded-md overflow-hidden bg-cover bg-center md:mt-0 md:w-1/2" style="background-image: url('https://akcdn.detik.net.id/visual/2021/06/25/microsoft-windows-11-1_169.jpeg?w=650&q=90')">
                <div class="bg-gray-900 bg-opacity-50 flex items-center h-full">
                    <div class="px-10 max-w-xl">
                        <h2 class="text-2xl text-white font-semibold">Elektronik</h2>
                        <p class="mt-2 text-gray-400">Elektronik merujuk pada alat yang dibuat berdasarkan prinsip elektronika dan digunakan dalam kehidupan sehari-hari, seperti elektronik konsumen, media elektronik, dan peralatan elektronik seperti radio, TV, kamera digital, komputer, dan sebagainya.</p>
                        <button class="flex items-center mt-4 text-white text-sm uppercase font-medium rounded hover:underline focus:outline-none">
                            <a href="{{route('view.viewmore2')}}">Shop Now</a>
                            <svg class="h-5 w-5 mx-2" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-16">
            <div class="flex">
                <div class="basis-1/2">
                    <h3 class="text-gray-600 text-2xl font-medium">Buku</h3>
                </div>
                <div class="basis-1/2 flex place-items-center justify-end font-bold group">
                    <a href="{{route('view.index')}}" class="group-hover:text-blue-600">View more</a>
                    <span>
                        <svg class="h-5 w-5 mx-2 group-hover:stroke-blue-600" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                    </span>
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
                                            Rp {{ number_format($rate->nama_rate, 0, ',', '.') }}
                                            @endforeach
                                        </span>
                                    </div>
                                    <div class="flex-none">
                                        <form action="{{ route('cart.addToCart', $item->id_produk) }}" method="post">
                                            @csrf
                                            <button class="p-2 rounded-full bg-blue-600 text-white mx-5 -mb-4 hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                                                <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endif
                @endforeach
            </div>
        </div>

        
        <div class="mt-16">
            <div class="flex">
                <div class="basis-1/2">
                    <h3 class="text-gray-600 text-2xl font-medium">Elektronik</h3>
                </div>
                <div class="basis-1/2 flex place-items-center justify-end font-bold group">
                    <a href="{{route('view.viewmore2')}}" class="group-hover:text-blue-600">View more</a>
                    <span>
                        <svg class="h-5 w-5 mx-2 group-hover:stroke-blue-600" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                    </span>
                </div>
            </div>
            
            <div class="grid gap-6 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 mt-6">
                @foreach ($data2 as $key=>$item)
                    @if ($item->id_kategori == 2)
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
                                            Rp {{ number_format($rate->nama_rate, 0, ',', '.') }}
                                            @endforeach
                                        </span>
                                    </div>
                                    <div class="flex-none">
                                        <form action="{{ route('cart.addToCart', $item->id_produk) }}" method="post">
                                            @csrf
                                            <button class="p-2 rounded-full bg-blue-600 text-white mx-5 -mb-4 hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                                                <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    <script>
        let images = [
            'https://akcdn.detik.net.id/visual/2015/01/06/7aeb76f2-5669-46ec-9882-90552bef85ff_169.jpg?w=650&q=90',
            'https://c.pxhere.com/photos/71/2c/laptop_old_telephone_phone_vintage_notebook_desk_business_coffee-624855.jpg!d',
            'https://akcdn.detik.net.id/visual/2021/06/25/microsoft-windows-11-1_169.jpeg?w=650&q=90'
        ];
    
        let currentIndex = 0;
        const slider = document.getElementById('image-slider');
    
        function changeImage() {
            slider.style.transition = 'background-image 0.5s ease-in-out'; // Add smooth transition
            slider.style.backgroundImage = `url('${images[currentIndex]}')`; // Fix template literal syntax
            currentIndex = (currentIndex + 1) % images.length;
        }
    
        setInterval(changeImage, 3000); // Change image every 3 seconds (3000 milliseconds)
    </script>
</x-home-layout>