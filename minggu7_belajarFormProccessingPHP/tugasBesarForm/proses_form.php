<?php
if (isset($_POST['jumlah'])) {
    $jumlahTabel = intval($_POST['jumlah']);

    // memeriksa jumlah tabel
    if ($jumlahTabel > 0) {
        // Membuat tabel sesuai jumlah yang diinginkan
        for ($i = 0; $i < $jumlahTabel; $i++) {
            echo "<table>";
            echo "<tr><th>Tabel " . ($i + 1) . "</th></tr>";
            echo "<tr><td>Nama: <input type='text' name='nama[]' required></td></tr>";
            echo "<tr><td>Alamat: <input type='text' name='alamat[]' required></td></tr>";
            echo "<tr><td>Angkatan: <input type='text' name='angkatan[]' required> </td></tr>";
            echo "<tr><td>Kelas: <input type='text' name='kelas[]' required></td></tr>";
            echo "</table><br>";
        }
    } else {
        echo "Jumlah tabel harus lebih besar dari 0.";
    }
} else {
    echo "Data tidak valid.";
}
