<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pemesanan PS</title>
    <!-- Link ke file CSS eksternal untuk styling form -->
    <link rel="stylesheet" href="form.css">
    <link rel="icon" type="image/x-icon" href="ps.jpeg">
    <script>
        /* Fungsi untuk menampilkan atau menyembunyikan input jumlah berdasarkan produk yang dipilih */
        function toggleQuantityInput() {
            const productSelect = document.getElementById('product'); // Ambil elemen select produk
            const quantityInput = document.getElementById('quantity-container'); // Ambil elemen input jumlah
            const selectedValue = productSelect.value; // Ambil nilai produk yang dipilih

            /* Jika produk yang dipilih adalah sewa, tampilkan input jumlah */
            if (selectedValue.startsWith('sewa_')) {
                quantityInput.style.display = 'block'; // Tampilkan input jumlah
            } else {
                quantityInput.style.display = 'none'; // Sembunyikan input jumlah
                document.getElementById('quantity').value = ''; // Reset nilai input jumlah
            }
        }
    </script>
</head>
<body>
    <header>
        <nav>
            <!-- Container untuk logo dan judul -->
            <div class="logo-container">
                <img src="picture/ps.jpeg" alt="Logo PS" class="logo">
                <h1>Silahkan Mengisi Formulir Pemesanan Terlebih Dahulu</h1>
            </div>
        </nav>
    </header>

    <!-- Bagian form pemesanan -->
    <section id="form">
        <div class="container-form">
            <h2>Pemesanan Play Station</h2>
            <!-- Formulir pemesanan yang mengirim data menggunakan metode POST ke 'proses_form.php' -->
            <form action="proses_form.php" method="post" id="order-form">
                <!-- Pilihan produk yang akan dipesan, onchange memanggil fungsi toggleQuantityInput() -->
                <label for="product">Pilih Produk:</label>
                <select id="product" name="product" required onchange="toggleQuantityInput()">
                    <option value="" disabled selected>Pilih produk</option> <!-- Placeholder pilihan -->
                    <option value="ps3">PS3 - Rp1.500.000</option>
                    <option value="ps4">PS4 - Rp3.000.000</option>
                    <option value="ps5">PS5 - Rp6.500.000</option>
                    <option value="sewa_ps3">Sewa PS3 - Rp5.000/jam</option>
                    <option value="sewa_ps4">Sewa PS4 - Rp7.500/jam</option>
                    <option value="sewa_ps5">Sewa PS5 - Rp10.000/jam</option>
                </select>

                <!-- Input jumlah atau lama peminjaman yang hanya muncul jika produk sewa dipilih -->
                <div id="quantity-container" style="display: none;">
                    <label for="quantity">Jumlah/ Lama Peminjaman (Jam):</label>
                    <input type="number" id="quantity" name="quantity" min="1">
                </div>
                <label for="name">Nama:</label>
                <input type="text" id="name" name="name" required>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
                <label for="alamat">Alamat:</label>
                <textarea id="alamat" name="alamat" required></textarea>
                <input type="submit" value="Submit">
            </form>
        </div>
    </section>

    <!-- Bagian footer -->
    <footer>
        <div class="container">
            <p>&copy;Cakra Play station. All rights reserved.</p> <!-- Copyright informasi -->
        </div>
    </footer>
</body>
</html>
