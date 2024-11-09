<?php
require_once("connect.php");

// Validasi parameter id
if (!isset($_GET['id'])) {     // Cek apakah ada parameter id di URL
   header("Location: buku.php");  // Redirect jika tidak ada
   exit();
}

$id = $_GET['id'];             // Mengambil id dari parameter URL

// Proses form update
if ($_SERVER["REQUEST_METHOD"] == "POST") {   // Cek apakah request POST
   // Query update dengan parameter binding
   $sql = "UPDATE penjualan_buku SET
           judul_buku = ?,                   //placeholder
           deskripsi = ?,
           harga = ?,
           stok = ?
           WHERE id_buku = ?";         // Kondisi WHERE dengan id

   // Array parameter untuk binding
   $params = array(
       $_POST['judul'],
       $_POST['deskripsi'],
       $_POST['harga'],
       $_POST['stok'],
       $id
   );

   // Eksekusi query update
   $stmt = sqlsrv_query($conn, $sql, $params);  // Eksekusi dengan parameter binding

   // Penanganan error
   if ($stmt === false) {             // Cek jika query gagal
       die(print_r(sqlsrv_errors(), true));  // Tampilkan error
   }

   header("Location: buku.php");      // Redirect ke halaman list
   exit();
}

// Query untuk mengambil data buku yang akan diedit
$sql = "SELECT * FROM penjualan_buku WHERE id_buku = ?";  // Query select dengan WHERE
$params = array($id);                                     // Parameter untuk binding
$stmt = sqlsrv_query($conn, $sql, $params);              // Eksekusi query
$buku = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);   // Ambil data hasil query

// Redirect jika buku tidak ditemukan
if (!$buku) {                          // Cek apakah data ditemukan
   header("Location: buku.php");      // Redirect jika tidak ada
   exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
   <meta charset="UTF-8">
   <title>Update Buku</title>
   <link rel="stylesheet" href="updatebuku.css">
</head>
<body>
<div class="container">             <!-- Container utama -->
   <h2>Update Buku</h2>             <!-- Judul form -->
   <!-- Form update dengan method POST -->
   <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'] . '?id=' . $id); ?>">
       <!-- Input judul buku -->
       <div class="form-group">
           <label>Judul Buku:</label>
           <input type="text"
                  name="judul"
                  value="<?php echo isset($buku['judul_buku']) ?
                         htmlspecialchars($buku['judul_buku']) : ''; ?>"
                  required>
       </div>
       <!-- Input deskripsi -->
       <div class="form-group">
           <label>Deskripsi:</label>
           <textarea name="deskripsi" required><?php echo isset($buku['deskripsi']) ?
                    htmlspecialchars($buku['deskripsi']) : ''; ?></textarea>
       </div>
       <!-- Input harga -->
       <div class="form-group">
           <label>Harga:</label>
           <input type="number"
                  name="harga"
                  value="<?php echo isset($buku['harga']) ?
                         htmlspecialchars($buku['harga']) : ''; ?>"
                  required>
       </div>
       <!-- Input stok -->
       <div class="form-group">
           <label>Stok:</label>
           <input type="number"
                  name="stok"
                  value="<?php echo isset($buku['stok']) ?
                         htmlspecialchars($buku['stok']) : ''; ?>"
                  required>
       </div>
       <!-- Tombol aksi -->
       <div class="form-group">
           <button type="submit">Simpan Perubahan</button>
           <a href="<?php echo htmlspecialchars('buku.php'); ?>"
              class="btn-cancel">Batal</a>
       </div>
   </form>
</div>
</body>
</html>