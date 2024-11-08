<?php
require_once("connect.php"); // Memanggil file koneksi SQL Server

if ($_SERVER["REQUEST_METHOD"] == "POST") { // Membuat buku baru
    // Mempersiapkan data untuk diinsert
    $judul = $_POST['judul'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    // Mempersiapkan query SQL untuk menambahkan data buku ke dalam tabel 'penjualan_buku'
    $sql = "INSERT INTO penjualan_buku (judul_buku, deskripsi, harga, stok)
            VALUES (?, ?, ?, ?)";

    // Mempersiapkan statement
    $params = array($judul, $deskripsi, $harga, $stok);
    $stmt = sqlsrv_query($conn, $sql, $params);

    // Mengecek apakah query berhasil dieksekusi
    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true)); // Menampilkan pesan error jika terjadi kesalahan
    }

    // Redirect ke halaman daftar buku
    header("Location: buku.php");
    exit(); // Menghentikan eksekusi script
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
    <form method="POST" action="<?php echo htmlspecialchars('createbuku.php'); ?>">
        <div class="form-group">
            <label>Judul Buku:</label>
            <input type="text" name="judul" value="<?php echo htmlspecialchars($_POST['judul'] ?? ''); ?>" required>
        </div>
        <div class="form-group">
            <label>Deskripsi:</label>
            <input type="text" name="deskripsi" value="<?php echo htmlspecialchars($_POST['deskripsi'] ?? ''); ?>" required>
        </div>
        <div class="form-group">
            <label>Harga:</label>
            <input type="number" name="harga" value="<?php echo htmlspecialchars($_POST['harga'] ?? ''); ?>" required>
        </div>
        <div class="form-group">
            <label>Stok:</label>
            <input type="number" name="stok" value="<?php echo htmlspecialchars($_POST['stok'] ?? ''); ?>" required>
        </div>
        <button type="submit">Simpan</button>
        <a href="<?php echo htmlspecialchars('buku.php'); ?>" class="btn-cancel">Batal</a>
    </form>
</body>
</html>