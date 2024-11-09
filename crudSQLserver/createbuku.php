<?php
require_once("connect.php");
// Memproses form ketika ada request POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {    // Mengecek apakah request menggunakan metode POST
    // Mengambil data dari form
    $judul = $_POST['judul'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    // Query INSERT dengan parameter binding untuk keamanan
    $sql = "INSERT INTO penjualan_buku (judul_buku, deskripsi, harga, stok)
            VALUES (?, ?, ?, ?)";

    
    $params = array($judul, $deskripsi, $harga, $stok);  // Array parameter untuk binding
    $stmt = sqlsrv_query($conn, $sql, $params);          // Eksekusi query dengan parameter

    // Penanganan error
    if ($stmt === false) {                               // Jika query gagal
        die(print_r(sqlsrv_errors(), true));            // Tampilkan error dan hentikan eksekusi
    }

    // Redirect setelah berhasil
    header("Location: buku.php");        // Mengarahkan ke halaman daftar buku
    exit();                             // Menghentikan eksekusi script
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Buku</title>
    <link rel="stylesheet" href="createbuku.css">
</head>
<body>
    <h2>Tambah Buku Baru</h2>
    <!-- Form untuk menambah buku dengan metode POST -->
    <form method="POST" action="<?php echo htmlspecialchars('createbuku.php'); ?>">
        <!-- form untuk judul buku -->
        <div class="form-group">
            <label>Judul Buku:</label>
            <!-- Input judul dengan nilai default dari POST jika ada, kosong jika tidak ada -->
            <input type="text" name="judul"
                   value="<?php echo htmlspecialchars($_POST['judul'] ?? ''); ?>"
                   required>
        </div>
        <!-- form untuk deskripsi -->
        <div class="form-group">
            <label>Deskripsi:</label>
            <input type="text" name="deskripsi"
                   value="<?php echo htmlspecialchars($_POST['deskripsi'] ?? ''); ?>"
                   required>
        </div>
        <!-- form untuk harga -->
        <div class="form-group">
            <label>Harga:</label>
            <input type="number" name="harga"
                   value="<?php echo htmlspecialchars($_POST['harga'] ?? ''); ?>"
                   required>
        </div>
        <!-- form untuk stok -->
        <div class="form-group">
            <label>Stok:</label>
            <input type="number" name="stok"
                   value="<?php echo htmlspecialchars($_POST['stok'] ?? ''); ?>"
                   required>
        </div>
        <!-- Tombol submit -->
        <button type="submit">Simpan</button>
        <!-- Tombol batal dengan link ke halaman daftar buku -->
        <a href="<?php echo htmlspecialchars('buku.php'); ?>"
           class="btn-cancel">Batal</a>
    </form>
</body>
</html>