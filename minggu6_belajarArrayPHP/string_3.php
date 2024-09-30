<?php

$pesan = "Saya arek malang";
echo strrev($pesan) . "<br>";

$pesan ="saya arek malang";
#ubah variabel $pesan menjadi array dengan perintah explode
$pesanPerkata = explode(" ", $pesan);
#Ubah setiap kata dalam array menjadi kebalikanya
$pesanPerkata = array_map(fn($pesan) => strrev($pesan), $pesanPerkata);
#gabungkan kembali array menjadi string
$pesan = implode(" ", $pesanPerkata);

echo $pesan . "<br>";
?>