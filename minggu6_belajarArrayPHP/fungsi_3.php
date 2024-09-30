<?php
//membuat fungsi
//Parameter dengan nilai default
function perkenalan($nama, $salam="Assalamualaikum"){
    echo $salam.", ";
    echo "Perkenalkan, nama saya " . $nama . " <br>";
    echo "Senang berkenalan dengan Anda <br>";
}

// memanggil fungsi yang sudah dibuat
perkenalan("Midoriya","Halo");

echo "<hr>";

$saya = "Cakra";
$ucapanSalam = "Selamat Pagi";

// memanggil lagi tanpa mengisi parameter salam
perkenalan($saya);
?>