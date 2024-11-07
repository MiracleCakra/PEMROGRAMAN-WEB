<?php
// nama server, basis data, dan kredensial login
$servername = "CAKRA\SERVERPHP";
$database = "CRUDBUKU";
$username = "";
$password = "";

try {
    // instance PDO dan koneksi ke basis data SQL Server menggunakan pdo dengan driver sqlsrv
    $conn = new PDO("sqlsrv:Server=$servername;Database=$database", $username, $password);
    // Memberikan atribut error mode ke ERRMODE_EXCEPTION agar PDO melempar exception jika terjadi kesalahan
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Jika koneksi gagal, tampilkan pesan kesalahan dan hentikan skrip
    die("Koneksi gagal: " . $e->getMessage());
}
