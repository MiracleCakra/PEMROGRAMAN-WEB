<?php
// nama server, basis data, dan kredensial login
$servername = "CAKRA\SERVERPHP";
$database = "CRUDBUKU";
$username = "";
$password = "";

try {
    // instance PDO dan koneksi ke basis data SQL Server
    $conn = new PDO("sqlsrv:Server=$servername;Database=$database", $username, $password);
    // mode kesalahan menjadi Exception untuk menangani kesalahan
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // mengatur atribut ke error mode
} catch (PDOException $e) {
    // Jika koneksi gagal, tampilkan pesan kesalahan dan hentikan skrip
    die("Koneksi gagal: " . $e->getMessage());
}
