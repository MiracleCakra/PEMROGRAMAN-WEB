<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $angkatan = $_POST['angkatan'];
    $kelas = $_POST['kelas'];

    // Tampilkan data yang telah diinput
    echo "<h2>Data Mahasiswa:</h2>";
    echo "<table border='1' cellpadding='10'>";
    echo "<tr><th>Nama</th><th>Alamat</th><th>Angkatan</th><th>Kelas</th></tr>";

    for ($i = 0; $i < count($nama); $i++) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($nama[$i]) . "</td>";
        echo "<td>" . htmlspecialchars($alamat[$i]) . "</td>";
        echo "<td>" . htmlspecialchars($angkatan[$i]) . "</td>";
        echo "<td>" . htmlspecialchars($kelas[$i]) . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "Tidak ada data yang dikirim.";
}
