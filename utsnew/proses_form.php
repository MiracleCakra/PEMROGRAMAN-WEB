<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data dari form
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $alamat = htmlspecialchars($_POST['alamat']);
    $product = htmlspecialchars($_POST['product']);
    $quantity = isset($_POST['quantity']) ? (int) htmlspecialchars($_POST['quantity']) : 0; // Default ke 0 jika tidak ada

    // Daftar produk dan harganya
    $product_prices = [
        'ps3' => 1500000,
        'ps4' => 3000000,
        'ps5' => 6500000,
        'sewa_ps3' => 5000,
        'sewa_ps4' => 7500,
        'sewa_ps5' => 10000
    ];

    $product_names = [
        'ps3' => 'PlayStation 3',
        'ps4' => 'PlayStation 4',
        'ps5' => 'PlayStation 5',
        'sewa_ps3' => 'Sewa PlayStation 3',
        'sewa_ps4' => 'Sewa PlayStation 4',
        'sewa_ps5' => 'Sewa PlayStation 5'
    ];

    // Menghitung total biaya
    $total_cost = ($product == 'sewa_ps3' || $product == 'sewa_ps4' || $product == 'sewa_ps5') ? $quantity * $product_prices[$product] : $product_prices[$product];
    $product_name = $product_names[$product];

    // Konfirmasi pesanan
    echo "<!DOCTYPE html>
        <h1>Terima Kasih, $name!</h1>";

    // Menampilkan informasi pemesanan sesuai dengan jenis produk
    if (strpos($product, 'sewa_') === 0) {
        echo "<p>Pemesanan Anda untuk $quantity jam $product_name telah diterima.</p>";
    } else {
        echo "<p>Pembelian Anda untuk $product_name telah diterima.</p>";
    }

    echo "<p>Total biaya: Rp" . number_format($total_cost, 0, ',', '.') . "</p>
          <p>Email: $email</p>
          <p>Alamat Pengiriman: $alamat</p>
          <p>Kami akan menghubungi Anda segera untuk konfirmasi lebih lanjut.</p>
          <a href='index.php'>Kembali ke Beranda</a>
    </body>
    </html>";
}
?>
