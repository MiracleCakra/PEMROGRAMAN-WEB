<?php
require_once("connect.php");                                     // Mengimpor file koneksi database

if ($_SERVER["REQUEST_METHOD"] == "POST") {                      // Cek apakah form disubmit dengan metode POST
   try {
       // Query SQL untuk menyisipkan data buku baru ke tabel
       $sql = "INSERT INTO penjualan_buku (judul_buku, deskripsi, harga, stok)
               VALUES (:judul, :deskripsi, :harga, :stok)";
       $stmt = $conn->prepare($sql);                           // Mempersiapkan query dengan prepared statement
       
       // Binding parameter form ke query untuk mencegah SQL injection
       $stmt->bindParam('judul', $_POST['judul']);             // Binding input judul (mengikat pernyataan ke dalam sql)
       $stmt->bindParam(':deskripsi', $_POST['deskripsi']);    // Binding input deskripsi
       $stmt->bindParam(':harga', $_POST['harga']);            // Binding input harga
       $stmt->bindParam(':stok', $_POST['stok']);              // Binding input stok
       
       $stmt->execute();                                       // Mengeksekusi query insert
       
       header("Location: buku.php");                           // Redirect ke halaman daftar buku
       exit();                                                 // Menghentikan eksekusi script
   } catch(PDOException $e) {                                  // Menangkap error PDO jika terjadi
       echo "Error: " . $e->getMessage();                      // Menampilkan pesan error
   }
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