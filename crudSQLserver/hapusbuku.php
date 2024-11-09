<?php
require_once("connect.php");

// Validasi parameter id
if (!isset($_GET['id'])) {     // Memeriksa apakah parameter id ada dalam URL
   header("Location: buku.php");  // Redirect ke halaman utama jika tidak ada id
   exit();                     // Menghentikan eksekusi script
}

$id = $_GET['id'];             // Mengambil nilai id dari parameter URL

try {                          // Memulai blok try-catch untuk handling error
   // Menyiapkan query DELETE dengan parameter binding
   $sql = "DELETE FROM penjualan_buku WHERE id_buku = ?";   // Query DELETE dengan placeholder
   
   // Eksekusi query dengan parameter
   $params = array($id);      // Array parameter untuk binding
   $stmt = sqlsrv_query($conn, $sql, $params);  // Eksekusi query dengan parameter binding
   
   // Pengecekan hasil query
   if ($stmt === false) {
       die(print_r(sqlsrv_errors(), true));  // Tampilkan error SQL Server
   }

   // Redirect setelah berhasil hapus
   header("Location: buku.php");
   exit();                        // Menghentikan eksekusi script
   
} catch(Exception $e) {            // Menangkap exception jika terjadi error
   echo "Error: " . $e->getMessage();  // Menampilkan pesan error
}

sqlsrv_close($conn);           // Menutup koneksi database
?>