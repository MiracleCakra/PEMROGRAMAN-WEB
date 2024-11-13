<?php
// Mengimpor file connect.php yang berisi konfigurasi koneksi database dalam 1 kali tampilan
require_once("connect.php");

// Membuat query SQL untuk mengambil seluruh data dari tabel penjualan_buku
$sql = "SELECT * FROM penjualan_buku";

// Mengeksekusi langsung pada query SQL dan menyimpan hasilnya dalam variabel $stmt
$stmt = $conn->query($sql);

// Melakukan pengecekan apakah query berhasil dieksekusi
if ($stmt === false) {
    // Jika query gagal, tampilkan pesan error dan informasi detail kesalahan
    die("Query failed: " . print_r($conn->errorInfo(), true)); // mencetak error yang ada pada array
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <!-- Mengatur encoding karakter menggunakan UTF-8 -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Buku</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h2>LIST PENJUALAN BUKU</h2>
    <table>
    <thead>
        <!-- Header tabel yang mendefinisikan kolom-kolom -->
        <tr>
            <th>No</th>
            <th>Judul Buku</th>
            <th>Deskripsi</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Format Buku</th>
        </tr>
    </thead>
    <tbody>
        <!-- Loop untuk menampilkan setiap baris data dari database -->
        <?php
        $no = 1;
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?> <!--Mengambil semua hasil query dalam bentuk array asosiatif untuk digunakan pada tampilan halaman.-->
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo htmlspecialchars($row['judul_buku']); ?></td>
                <td><?php echo htmlspecialchars($row['deskripsi']); ?></td>
                <td><?php echo htmlspecialchars(number_format($row['harga'], 0, ',', '.')); ?></td>
                <td><?php echo htmlspecialchars($row['stok']); ?></td>
                <td class="Format Buku">
                <a href="updatebuku.php?id=<?php echo htmlspecialchars($row['id_buku']); ?>" class="btn-update">Update</a>
                <a href="hapusbuku.php?id=<?php echo htmlspecialchars($row['id_buku'] ); ?>" class="btn-delete"
                    onclick="return confirm('Apakah Anda yakin ingin menghapus buku ini?')">Hapus</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </tbody>
    </table>
    <?php
    // Membersihkan resource dengan menutup statement dan koneksi database
    $stmt = null;
    $conn = null;
    ?>
    <!-- Tombol untuk menambah data buku baru -->
    <a href="createbuku.php" class="button button-add-buku">Tambah Buku</a>
</body>
</html>