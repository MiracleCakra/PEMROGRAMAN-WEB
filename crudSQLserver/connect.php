<?php
// Nama server, basis data, dan kredensial login
$servername = "CAKRA\SERVERPHP";
$database = "CRUDBUKU";
$username = "";
$password = "";

// Membuat koneksi ke SQL Server menggunakan SQLSRV
$conn = sqlsrv_connect($servername, array(
    "Database" => $database,
    "UID" => $username,
    "PWD" => $password
));

// Memeriksa koneksi
if ($conn === false) {
    die("Koneksi gagal: " . print_r(sqlsrv_errors(), true));
}

echo "Koneksi berhasil!";

?>