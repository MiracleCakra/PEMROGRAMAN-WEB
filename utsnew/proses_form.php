<?php
// Memeriksa apakah metode request yang digunakan adalah POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data dari form menggunakan metode POST
    // htmlspecialchars() digunakan untuk menghindari serangan XSS dengan mengonversi karakter spesial HTML
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $alamat = htmlspecialchars($_POST['alamat']);
    $product = htmlspecialchars($_POST['product']);
    $quantity = isset($_POST['quantity']) ? (int) htmlspecialchars($_POST['quantity']) : 0; // Mengambil nilai jumlah, jika tidak ada diatur ke 0

    // Daftar harga produk sesuai dengan jenisnya (beli atau sewa)
    $product_prices = [
        'ps3' => 1500000,
        'ps4' => 3000000,
        'ps5' => 6500000,
        'sewa_ps3' => 5000,
        'sewa_ps4' => 7500,
        'sewa_ps5' => 10000
    ];

    // Daftar nama produk untuk ditampilkan dalam konfirmasi pesanan
    $product_names = [
        'ps3' => 'PlayStation 3',
        'ps4' => 'PlayStation 4',
        'ps5' => 'PlayStation 5',
        'sewa_ps3' => 'Sewa PlayStation 3',
        'sewa_ps4' => 'Sewa PlayStation 4',
        'sewa_ps5' => 'Sewa PlayStation 5'
    ];

    // Menghitung total biaya pesanan
    // Jika produk sewa dipilih, biaya dihitung berdasarkan lama peminjaman (quantity * harga per jam)
    // Jika produk pembelian dipilih, langsung menggunakan harga produk
    $total_cost = ($product == 'sewa_ps3' || $product == 'sewa_ps4' || $product == 'sewa_ps5')
    ? $quantity * $product_prices[$product] : $product_prices[$product];
    
    // Mendapatkan nama produk dari daftar nama produk
    $product_name = $product_names[$product];

    // Menampilkan konfirmasi pesanan dalam bentuk HTML
    echo "<!DOCTYPE html>
        <h1>Terima Kasih, $name!</h1>";

    // Jika produk yang dipilih adalah sewa, tampilkan pesan pemesanan sewa
    if (strpos($product, 'sewa_') === 0) {
        echo "<p>Pemesanan Anda untuk $quantity jam $product_name telah diterima.</p>";
    } else {
        // Jika produk yang dipilih adalah pembelian, tampilkan pesan pembelian
        echo "<p>Pembelian Anda untuk $product_name telah diterima.</p>";
    }

    // Menampilkan informasi total biaya, email, dan alamat pengiriman
    echo "<p>Total biaya: Rp" . number_format($total_cost, 0, ',', '.') . "</p>
          <p>Email: $email</p>
          <p>Alamat Pengiriman: $alamat</p>
          <p>Kami akan menghubungi Anda segera untuk konfirmasi lebih lanjut.</p>
          <a href='index.php'>Kembali ke Beranda</a>
    </body>
    </html>";
}
?>
