<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Cart</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    /* Style to hide number input spinner in Chrome, Safari, and Edge */
    input[type="number"]::-webkit-inner-spin-button,
    input[type="number"]::-webkit-outer-spin-button {
      -webkit-appearance: none;
      margin: 0;
    }

    /* Style to hide number input spinner in Firefox */
    input[type="number"] {
      -moz-appearance: textfield;
    }
  </style>
  <script>
    function goBack() {
        window.history.back();
    }
  </script>
</head>
<body>
  <header>
    <div class="flex place-items-center px-8 py-3 space-x-2">
      <a href="#" onclick="goBack()">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
          <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
        </svg>
      </a>
      <h1 class="text-2xl font-bold text-center">Keranjang Saya</h1>
    </div>
  </header>
  <main>
    <div class="flex">
      <div class="basis-3/5 mx-4">
        <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
          <thead>
            <tr>
              <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Gambar</th>
              <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Produk</th>
              <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Total</th>
              <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Action</th>
            </tr>
          </thead>
          <tbody>
            @if(session('cart'))
              @foreach(session('cart') as $id => $details)
              {{ $details['id_cart'] }}
              <tr data-id="{{ $id_cart }}">
                <td class="p-2 w-1/6 text-sm leading-normal text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                  <img src="{{ $details['foto_produk'] }}" class="rounded flex mx-auto" style="width: 150px">
                </td>
                <td class="p-2 w-1/4 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent pl-5 text-wrap space-y-2">
                    <div class="flex flex-col justify-center space-y-1">
                        <h6 class="mb-0 text-sm leading-normal">{{ $details['nama_produk']}}</h6>
                        <p class="mb-0 text-xs leading-tight text-slate-400"></p>
                        @if(isset($details['nama_rate']))
                          <span class="text-sm font-semibold leading-tight text-slate-400">Rp {{ number_format($details['nama_rate'], 0, ',', '.') }}</span>
                        @else
                          <span class="text-sm font-semibold leading-tight text-slate-400">Rp 0</span>
                        @endif
                    </div>
                    <div class="flex grid-cols-3 bg-white border-2 text-center w-36">
                      <button class="px-1 border-r-2"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14" />
                      </svg>
                      </button>
                      <input type="number" value="1" min="1" name="" id="" class="w-10 mx-auto text-center">
                      <button class="px-1 border-l-2"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                      </svg>
                      </button>
                    </div>
                </td>
                
              </tr>
              @endforeach
            @endif
          </tbody>
        </table>
      </div>

      <div class="w-2/5 bg-slate-200 mr-4 h-min p-4 rounded-lg">
        <h6 class="text-xl font-semibold mb-4">Summary</h6>
        <div class="grid grid-cols-2 gap-x-56">
            <span class="font-semibold">Subtotal</span>
            <span class="text-blue-500 font-semibold">Rp.</span>
        </div>
        <div class="mt-4 flex justify-end">
            <button class="bg-blue-500 text-white px-4 py-2 rounded">Checkout</button>
        </div>
      </div>    
    </div>
  </main>
</body>
</html>
