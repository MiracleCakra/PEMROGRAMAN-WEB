<?php
$umur;
if (isset($umur) && $umur >= 18) {
    echo "Anda sudah dewasa";
} else {
    echo "Anda belum dewasa atau variabel 'umur' tidak ditemukan";
}

echo "<br><br>";
$data = array("nama"=>"Jane", "usia"=>25);
if (isset($data["usia"])) {
    echo "Nama: ". $data["nama"] ."<br>";
}else{
    echo "Variabel 'nama' tidak ditemukan dalam array.<br>";
}
?>