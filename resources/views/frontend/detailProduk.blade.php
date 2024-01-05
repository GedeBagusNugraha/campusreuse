<x-home-layout>
    <div class="max-w-screen-lg mx-auto mt-6 p-4 bg-white rounded-lg shadow-md font-sans">
        <div class="flex flex-wrap">
            <div class="w-1/4">
                <img src="{{ asset($data->foto_produk) }}" class="w-full h-auto object-cover rounded-lg" alt="foto_produk">
            </div>
            <div class="md:px-4 py-4 w-3/4">
                <h2 class="text-2xl font-bold text-blue-700">{{$data->nama_produk}}</h2>
                <p><strong>Kategori :</strong> <span class="">{{ $kategori->nama_kategori }}</span></p>
                <p><strong>Harga :</strong> <span class="">Rp {{ number_format($harga->nama_rate, 0, ',', '.') }}</span></p>

                <p class="mt-4">
                    <?php echo htmlspecialchars_decode($data['desc_produk']);?>
                </p>

                <div class="flex items-center mt-4">
                    <button class="bg-blue-700 text-white font-semibold px-4 py-2 rounded-lg ml-2" onclick="addToCart()">Add to Cart</button>
                </div>
            </div>
        </div>

        <div class="mt-6">
            <h3 class="text-lg font-semibold mb-4">Masukkan Review:</h3>
            <form id="reviewForm">
                <div class="mb-3">
                    <label for="name" class="block font-semibold mb-1">Nama:</label>
                    <input type="text" id="name" class="block w-full px-3 py-2 rounded-lg border focus:border-blue-700 focus:outline-none" placeholder="Nama Anda" required>
                </div>
                <div class="mb-3">
                    <label for="rating" class="block font-semibold mb-1">Rating:</label>
                    <select id="rating" class="block w-full px-3 py-2 rounded-lg border focus:border-blue-700 focus:outline-none">
                        <option value="5">5 Bintang</option>
                        <option value="4">4 Bintang</option>
                        <option value="3">3 Bintang</option>
                        <option value="2">2 Bintang</option>
                        <option value="1">1 Bintang</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="comment" class="block font-semibold mb-1">Komentar:</label>
                    <textarea id="comment" class="block w-full px-3 py-2 rounded-lg border focus:border-blue-700 focus:outline-none" rows="4" placeholder="Tulis komentar Anda" required></textarea>
                </div>
                <button type="button" class="bg-blue-700 text-white font-semibold px-4 py-2 rounded-full" onclick="submitReview()">Submit Review</button>
            </form>
        </div>

        <div class="mt-6">
            <h3 class="text-lg font-semibold mb-4">Review:</h3>
            <div id="reviewList">
                <!-- Daftar ulasan akan ditampilkan di sini -->
            </div>
        </div>
    </div>
    
    <script>
        function addToCart() {
            // Implementasikan logika untuk menambahkan ke keranjang di sini
            var quantity = document.getElementById("quantity").value;
            // Contoh: Update nilai keranjang di sini
            document.getElementById("cartNotification").innerText = quantity;

            // Mengosongkan nilai input pada form setelah menambahkan ke keranjang
            document.getElementById("quantity").value = ""; // Mengosongkan input jumlah tiket
        }

        function submitReview() {
            // Implementasikan logika untuk menambahkan ulasan ke dalam daftar ulasan di sini
            var name = document.getElementById("name").value;
            var rating = document.getElementById("rating").value;
            var comment = document.getElementById("comment").value;
            // Contoh: Menampilkan ulasan ke dalam daftar ulasan
            var reviewList = document.getElementById("reviewList");
            var newReview = document.createElement("div");
            newReview.innerHTML = "<strong>" + name + "</strong> - Rating: " + rating + "<br>" + comment + "<hr>";
            reviewList.appendChild(newReview);

            // Mengosongkan nilai input pada form setelah submit review
            document.getElementById("name").value = ""; // Mengosongkan input nama
            document.getElementById("rating").value = "5"; // Mengatur nilai default rating kembali ke 5 Bintang
            document.getElementById("comment").value = ""; // Mengosongkan input komentar
        }
    </script>
</x-home-layout>