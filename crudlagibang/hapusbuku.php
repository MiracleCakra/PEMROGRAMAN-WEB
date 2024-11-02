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
    $sql = "DELETE FROM penjualan_buku WHERE id_buku = ?"; // Menggunakan ? sebagai placeholder
    $stmt = $conn->prepare($sql);
    
    // Eksekusi query dengan parameter
    $stmt->execute([$id]); // Langsung masukkan parameter dalam array
    
    // Redirect kembali ke halaman utama
    header("Location: buku.php");
    exit();
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Menutup koneksi
$stmt = null;
$conn = null;
?>