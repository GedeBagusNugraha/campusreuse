<x-admin-layout>
    <div class="p-4 w-full">
        <div class="font-bold text-lg mb-4">
            {{ $title }}
        </div>

        <div class="flex w-full space-x-2">
            <!--Produk-->
            <form enctype="multipart/form-data" action="{{(isset($data))?route('admin.update', $data->id_produk):route('admin.store') }}" method="POST" class="bg-white rounded-xl w-1/2">
                @csrf
                @if (isset($data))@method('PUT')@endif
    
                <div class="mb-4 mx-4 pt-4">
                    <label for="nama_produk" class="block text-sm font-medium text-gray-600">Nama Produk</label>
                    <input type="text" name="nama_produk" value="{{(isset($data))?$data->nama_produk:old('nama_produk')}}" placeholder="Nama Produk" required class="mt-1 p-2 w-full border rounded-md shadow-md">
                    @error('nama_produk')
                        <div class="text-xs text-red-800">{{ $message }}</div>
                    @enderror
                </div>
    
                <div class="mb-4 mx-4">
                    <label for="desc_produk" class="block text-sm font-medium text-gray-600">Deskripsi</label>
                    <textarea class="form-control @error('desc_produk') is-invalid @enderror w-full" id="desc_produk" name="desc_produk" rows="5" placeholder="Masukkan Deskripsi">{{ (isset($data)) ? $data->desc_produk : old('desc_produk') }}</textarea>
                    @error('desc_produk')
                        <div class="text-xs text-red-800">{{ $message }}</div>
                    @enderror
                </div>
    
                <div class="mb-4 mx-4">
                    <label for="foto_produk" class="block text-sm font-medium text-gray-600">Gambar</label>
                    @if (isset($data) && $data->foto_produk)
                        <div class="mb-2">
                            <img src="{{ asset($data->foto_produk) }}" alt="Gambar Produk Lama" class="w-32 h-32 object-cover rounded-md">
                        </div>
                    @endif
                    <input type="file" name="foto_produk" id="foto_produk" class="w-1/2">
                    @error('foto_produk')
                        <div class="text-xs text-red-800">{{ $message }}</div>
                    @enderror
                </div>
    
                <div class= "col-span-6 sm:col-span-3 mx-4 mb-4">
                    <label for="id_kategori" class= "block text-sm font-medium text-gray-700">Kategori</label>
                    <select id="id_kategori" name="id_kategori"  class= "mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md">
                        <option value="">Choose Kategori</option>
                        @foreach ($kategori as $item)
                        <option {{ ((isset($data) && $data->id_kategori == $item->id_kategori) || old('id_kategori') == $item->id_kategori) ? 'selected' : '' }} value="{{ $item->id_kategori }}"> {{ $item->nama_kategori }}</option>
                        @endforeach
                    </select>
                    @error ('id_kategori')
                    <div class="text-xs text-red-800">{{$message}}</div>
                    @enderror
                </div>    

                <div class="mb-4 mx-4 pt-4">
                    <label for="nama_rate" class="block text-sm font-medium text-gray-600">Harga</label>
                    <div class="relative grid-cols-2 gap-2  flex items-center">
                        <span class="text-gray-500 sm:text-sm">Rp.</span>
                        <input type="text" name="nama_rate" id="nama_rate" value="{{ (isset($data) && $data->rates->isNotEmpty()) ? $data->rates->first()->nama_rate : old('nama_rate') }}" placeholder=" Harga" required class="mt-1 p-2 w-full border rounded-md shadow-md" autocomplete="off">
                        @error('nama_rate')
                            <div class="text-xs text-red-800">{{ $message }}</div>
                        @enderror
                    </div>
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
    <!--<script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#desc_produk' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>-->
    <script>
        // Fungsi untuk menghapus titik (.) dan koma (,) dari input harga
        function removeDotComma(value) {
            return value.replace(/[.,]/g, '');
        }
    
        // Fungsi untuk menambah titik (.) sebagai pemisah ribuan
        function addThousandSeparator(value) {
            return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        }
    
        // Event listener untuk memformat input harga saat berubah
        document.getElementById('nama_rate').addEventListener('input', function (event) {
            let inputValue = removeDotComma(event.target.value);
            event.target.value = addThousandSeparator(inputValue);
        });
    </script>
</x-admin-layout>