<?php

// variabel koneksi database
$servername = "CAKRA\SERVERPHP";
$database = "CRUDBUKU";
$username = "";
$password = "";

// Membuat koneksi menggunakan fungsi sqlsrv_connect dengan parameter:
// Parameter 1: Nama server
// Parameter 2: Array konfigurasi yang berisi Database, Username, dan Password
$conn = sqlsrv_connect($servername, array(
    "Database" => $database,      // Menentukan database yang akan digunakan
    "UID" => $username,          // User ID/username untuk autentikasi
    "PWD" => $password          // Password untuk autentikasi
));

// Blok pengecekan koneksi
if ($conn === false) {           // Jika koneksi gagal ($conn bernilai false)
    die("Koneksi gagal: " .      // Fungsi die() menghentikan eksekusi script
        print_r(sqlsrv_errors(), true));  // Menampilkan pesan error SQL Server
}

// Jika berhasil terkoneksi, tampilkan pesan sukses
echo "Koneksi berhasil!";        // Menampilkan pesan berhasil ke browser

?>