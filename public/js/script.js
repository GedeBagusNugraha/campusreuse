        // Array untuk menyimpan ulasan
        var reviews = [];

        // Fungsi untuk menampilkan ulasan yang telah disubmit
        function displayReviews() {
            var reviewList = document.getElementById("reviewList");
            reviewList.innerHTML = "";

            for (var i = 0; i < reviews.length; i++) {
                var review = reviews[i];
                var reviewElement = document.createElement("div");
                reviewElement.innerHTML = `
                    <p><strong>Nama:</strong> ${review.name}</p>
                    <p><strong>Rating:</strong> ${review.rating} Bintang</p>
                    <p><strong>Komentar:</strong> ${review.comment}</p>
                    <hr>
                `;
                reviewList.appendChild(reviewElement);
            }
        }

        // Fungsi untuk mengirim review
        function submitReview() {
            var name = document.getElementById("name").value;
            var rating = document.getElementById("rating").value;
            var comment = document.getElementById("comment").value;

            // Validasi nama tidak boleh kosong
            if (name.trim() === "") {
                alert("Nama tidak boleh kosong");
                return;
            }

            // Validasi komentar tidak boleh kosong
            if (comment.trim() === "") {
                alert("Komentar tidak boleh kosong");
                return;
            }

            // Buat objek review
            var review = {
                name: name,
                rating: rating,
                comment: comment
            };

            // Tambahkan review ke array
            reviews.push(review);

            // Reset formulir
            document.getElementById("name").value = "";
            document.getElementById("rating").value = "5";
            document.getElementById("comment").value = "";

            // Tampilkan ulasan yang telah disubmit
            displayReviews();
        }
        let cartItems = 0;

        function addToCart() {
            const quantity = parseInt(document.getElementById("quantity").value);
            cartItems += quantity;
            document.getElementById("cartNotification").innerText = cartItems;
        }