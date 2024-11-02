<?php
require_once("connect.php");// Mengimpor file koneksi database

// Cek apakah parameter id ada dalam URL, jika tidak redirect ke halaman buku
if (!isset($_GET['id'])) {
   header("Location: buku.php");
   exit();
}

$id = $_GET['id'];// Mengambil id buku dari URL

// Proses update data ketika form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   try {
       // Query SQL untuk mengupdate data buku berdasarkan id
       $sql = "UPDATE penjualan_buku SET
               judul_buku = ?,
               deskripsi = ?,
               harga = ?,
               stok = ?
               WHERE id_buku = ?";
       
       $stmt = $conn->prepare($sql);
       $stmt->execute([
           $_POST['judul'],
           $_POST['deskripsi'],
           $_POST['harga'],
           $_POST['stok'],
           $id
       ]);
       
       header("Location: buku.php");// Redirect ke halaman daftar buku setelah update
       exit();
   } catch(PDOException $e) {// Menangkap error database
       echo "Error: " . $e->getMessage();
   }
}

// Mengambil data buku yang akan diedit dari database
try {
   // Query untuk mengambil data buku berdasarkan id
   $stmt = $conn->prepare("SELECT * FROM penjualan_buku WHERE id_buku = ?");
   $stmt->execute([$id]);// Eksekusi query dengan parameter id
   $buku = $stmt->fetch(PDO::FETCH_ASSOC);// Ambil data buku dalam bentuk array asosiatif
   
   // Jika buku tidak ditemukan, redirect ke halaman daftar buku
   if (!$buku) {
       header("Location: buku.php");
       exit();
   }
} catch(PDOException $e) {// Menangkap error database
   echo "Error: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
   <meta charset="UTF-8">
   <title>Edit Buku</title>
   <link rel="stylesheet" href="editbuku.css">
</head>
<body>
   <div class="container">
       <h2>Edit Buku</h2>
       <form method="POST">
           <div class="form-group">
               <label>Judul Buku:</label>
               <!-- Input field judul dengan value dari database & XSS prevention -->
               <input type="text" name="judul" value="<?php echo htmlspecialchars($buku['judul_buku']); ?>" required>
           </div>
           <div class="form-group">
               <label>Deskripsi:</label>
               <!-- Textarea untuk deskripsi dengan value dari database & XSS prevention -->
               <textarea name="deskripsi" required><?php echo htmlspecialchars($buku['deskripsi']); ?></textarea>
           </div>
           <div class="form-group">
               <label>Harga:</label>
               <input type="number" name="harga" value="<?php echo htmlspecialchars($buku['harga']); ?>" required>
           </div>
           <div class="form-group">
               <label>Stok:</label>
               <input type="number" name="stok" value="<?php echo htmlspecialchars($buku['stok']); ?>" required>
           </div>
           <div class="form-group">
               <button type="submit">Simpan Perubahan</button>
               <a href="buku.php" class="btn-cancel">Batal</a>
           </div>
       </form>
   </div>
</body>
</html>