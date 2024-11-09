<?php
require_once("connect.php");         // Mengimpor dan mengeksekusi file connect.php hanya sekali

$sql = "SELECT * FROM penjualan_buku";  // Membuat string query SQL untuk select semua data

$result = sqlsrv_query($conn, $sql);    // Menjalankan query SQL dan menyimpan hasilnya

if ($result === false) {                 // Jika query gagal dieksekusi
    die("Query failed: " . print_r(sqlsrv_errors(), true));  // Tampilkan pesan error dan hentikan program
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Buku</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h2>LIST PENJUALAN BUKU</h2>
    <table>
    <thead>
        <tr>
            <th>Judul Buku</th>
            <th>Deskripsi</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Format Buku</th>
        </tr>
    </thead>
    <tbody>
        <!-- Loop untuk menampilkan data dari database -->
        <?php while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)): ?>  <!-- Mengambil data baris per baris -->
            <tr>
                <!-- Menampilkan data dengan mengamankan output dari XSS -->
                <td><?php echo htmlspecialchars($row['judul_buku']); ?></td>    // Menampilkan judul buku
                <td><?php echo htmlspecialchars($row['deskripsi']); ?></td>     // Menampilkan deskripsi
                <td><?php echo htmlspecialchars(number_format($row['harga'], 0, ',', '.')); ?></td>  // Menampilkan harga dengan format
                <td><?php echo htmlspecialchars($row['stok']); ?></td>          // Menampilkan stok

                <!-- Kolom aksi dengan tombol Update dan Hapus -->
                <td class="Format Buku">
                    <!-- Link untuk update dengan parameter id_buku -->
                    <a href="updatebuku.php?id=<?php echo htmlspecialchars($row['id_buku']); ?>" 
                       class="btn-update">Update</a>
                    <!-- Link untuk hapus dengan konfirmasi -->
                    <a href="hapusbuku.php?id=<?php echo htmlspecialchars($row['id_buku']); ?>" 
                       class="btn-delete"
                       onclick="return confirm('Apakah Anda yakin ingin menghapus buku ini?')">Hapus</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </tbody>
    </table>
    <?php
    sqlsrv_close($conn);               // Menutup koneksi database
    ?>
    <!-- Tombol untuk menambah data buku baru -->
    <a href="createbuku.php" class="button button-add-buku">Tambah Buku</a>
</body>
</html>