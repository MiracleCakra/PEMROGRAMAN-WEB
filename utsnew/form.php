<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pemesanan PS</title>
    <link rel="stylesheet" href="form.css">
    <link rel="icon" type="image/x-icon" href="ps.jpeg">
    <script>
        function toggleQuantityInput() {
            const productSelect = document.getElementById('product');
            const quantityInput = document.getElementById('quantity-container');
            const selectedValue = productSelect.value;

            if (selectedValue.startsWith('sewa_')) {
                quantityInput.style.display = 'block'; // Tampilkan input jumlah
            } else {
                quantityInput.style.display = 'none'; // Sembunyikan input jumlah
                document.getElementById('quantity').value = ''; // Reset value
            }
        }
    </script>
</head>
<body>
    <header>
        <nav>
            <div class="logo-container">
                <img src="picture/ps.jpeg" alt="Logo PS" class="logo">
                <h1>Silahkan Mengisi Formulir Pemesanan Terlebih Dahulu</h1>
            </div>
        </nav>
    </header>

    <section id="form">
        <div class="container-form">
            <h2>Pemesanan Play Station</h2>
            <form action="proses_form.php" method="post" id="order-form">
                <label for="product">Pilih Produk:</label>
                <select id="product" name="product" required onchange="toggleQuantityInput()">
                    <option value="" disabled selected>Pilih produk</option>
                    <option value="ps3">PS3 - Rp1.500.000</option>
                    <option value="ps4">PS4 - Rp3.000.000</option>
                    <option value="ps5">PS5 - Rp6.500.000</option>
                    <option value="sewa_ps3">Sewa PS3 - Rp5.000/jam</option>
                    <option value="sewa_ps4">Sewa PS4 - Rp7.500/jam</option>
                    <option value="sewa_ps5">Sewa PS5 - Rp10.000/jam</option>
                </select>

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

    <footer>
        <div class="container">
            <p>&copy;Sewa dan Jual PS Cakra. Semua Hak Dilindungi.</p>
        </div>
    </footer>
</body>
</html>
