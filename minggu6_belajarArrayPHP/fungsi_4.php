<?php
//membuat fungsi
//Fungsi yang mengembalikan nilai
function hitungMundur($thn_lahir, $thn_sekarang){
    $umur = $thn_sekarang - $thn_lahir;
    return $umur;
}

echo "Umur saya adalah ". hitungMundur(2004, 2024) . "tahun";

?>