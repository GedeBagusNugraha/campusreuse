<x-admin-layout>
    <div class="p-4 w-full">
        <div class="font-bold text-lg mb-4">
            {{ $title }}
        </div>

        <div class="flex w-full space-x-2">
            <!--Produk-->
            <form enctype="multipart/form-data" action="{{(isset($harga))?route('rate.update', $harga->id_rate):route('rate.store') }}" method="POST" class="bg-white rounded-xl w-1/2">
                @csrf
                @if (isset($harga))@method('PUT')@endif
    
                <div class="mb-4 mx-4 pt-4">
                    <label for="nama_rate" class="block text-sm font-medium text-gray-600">Harga</label>
                    <input type="text" name="nama_rate" value="{{(isset($harga))?$harga->nama_rate:old('nama_rate')}}" placeholder="Harga" required class="mt-1 p-2 w-full border rounded-md">
                    @error('nama_rate')
                        <div class="text-xs text-red-800">{{ $message }}</div>
                    @enderror
                </div>
    
                <div class= "col-span-6 sm:col-span-3 mx-4 mb-4">
                    <label for="id_kategori" class= "block text-sm font-medium text-gray-700">Id Produk</label>
                    <select id="id_produk" name="id_produk"  class= "mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md">
                        <option value="">Choose Produk</option>
                        @foreach ($data as $produk)
                            <option 
                            {{((isset($rate)&&$rate->id_produk==$produk->id_produk) || old('id_produk')==$produk->id_produk)?'selected':''}}
                            value="{{$produk->id_produk}}"> {{$produk->id_produk}}</option>
                        @endforeach
                    </select>
                    @error ('id_produk')
                    <div class="text-xs text-red-800">{{$message}}</div>
                    @enderror
                </div>

                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md mx-4 mb-4">Save</button>
            </form>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'desc_produk' );
    </script>
</x-admin-layout>