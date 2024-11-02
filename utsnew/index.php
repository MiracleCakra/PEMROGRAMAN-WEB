<!DOCTYPE html>
<html lang="id">
<head>
    <!-- Mengatur encoding karakter menjadi UTF-8 dan mendukung tampilan responsif -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Menentukan judul halaman yang tampil di tab browser -->
    <title>Penyewaan & Penjualan PlayStation</title>
    
    <!-- Menghubungkan file HTML ini dengan stylesheet eksternal untuk styling -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Bagian header untuk menyimpan elemen navigasi dan logo -->
    <header>
        <nav>
            <div class="logo-container">
                <h1>Cakra Play Station</h1>
            </div>
        </nav>
    </header>
    
    <!-- Bagian home atau halaman utama -->
    <section id="home" class="home">
        <div class="home-content">
            <h2>Selamat Datang di Cakra Play Station</h2>
            <p style="text-align: center;">Kami menyediakan layanan penyewaan dan penjualan konsol PlayStation 3, 4, dan 5.</p>
        </div>
    </section>

    <!-- Bagian produk yang menampilkan daftar produk yang tersedia -->
    <section id="produk">
        <div class="container">
            <!-- Judul bagian produk -->
            <h2>Produk Kami</h2>
            
            <!-- Daftar produk yang akan ditampilkan -->
            <div class="product-list">
                <div class="product-item">
                    <img src="picture/ps3.jpeg" alt="PS3" class="product-image">
                    <h3>PS3</h3>
                    <p>Harga Beli: Rp2.000.000</p>
                    <p>Sewa: Rp10.000/jam</p>
                </div>
                
                <div class="product-item">
                    <img src="picture/ps4.jpeg" alt="PS4" class="product-image">
                    <h3>PS4</h3>
                    <p>Harga Beli: Rp4.000.000</p>
                    <p>Sewa: Rp15.000/jam</p>
                </div>

                <div class="product-item">
                    <img src="picture/ps5.jpeg" alt="PS5" class="product-image">
                    <h3>PS5</h3>
                    <p>Harga Beli: Rp7.000.000</p>
                    <p>Sewa: Rp20.000/jam</p>
                </div>
            </div>

            <!-- Tombol untuk melakukan pemesanan atau booking -->
            <a href="form.php?produk=PS" class="order-button">BOOKING NOW</a>
        </div>
    </section>

    <!-- Bagian kontak untuk informasi pengunjung jika ingin menghubungi -->
    <section id="contact">
        <div class="container-about">
            <h2>Hubungi Kami Jika Ada Kendala</h2>
            <div class="contact-info">
                <p style="text-align: center;"><strong>Email:</strong> PSCakra@gmail.com</p>
                <p style="text-align: center;"><strong>Telepon:</strong> 0812-6666-9999</p>
            </div>
        </div>
    </section>

    <!-- Bagian footer dengan hak cipta -->
    <footer>
        <div class="container">
            <p>&copy; Cakra Play Station. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
