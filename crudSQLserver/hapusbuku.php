<?php
require_once("connect.php");

// Memeriksa apakah ada ID yang dikirim
if (!isset($_GET['id'])) {
    header("Location: buku.php");
    exit();
}

$id = $_GET['id'];

try {
    // Menyiapkan query DELETE
    $sql = "DELETE FROM penjualan_buku WHERE id_buku = ?";
    
    // Eksekusi query dengan parameter
    $params = array($id);
    $stmt = sqlsrv_query($conn, $sql, $params); // Menggunakan sqlsrv_query untuk mengeksekusi query

    // Mengecek apakah query berhasil dieksekusi
    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true)); // Menampilkan pesan error jika terjadi kesalahan
    }

    // Redirect kembali ke halaman utama
    header("Location: buku.php");
    exit();
} catch(Exception $e) {
    echo "Error: " . $e->getMessage();
}

// Menutup koneksi
sqlsrv_close($conn); // Menutup koneksi SQL Server
?>