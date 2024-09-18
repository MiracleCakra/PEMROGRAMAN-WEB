<?php
$a = 10;
$b = 5;

$hasilTambah = $a + $b;
$hasilKurang = $a - $b;
$hasilKali = $a * $b;
$hasilBagi = $a / $b;
$sisaBagi = $a % $b;
$pangkat = $a ** $b;

echo "Variabel a: {$a} <br>";
echo "Variabel b: {$b} <br>";
echo "Penjumlahan: {$hasilTambah} <br>";
echo "Pengurangan: {$hasilKurang} <br>";
echo "Perkalian: {$hasilKali} <br>";
echo "Pembagian: {$hasilBagi} <br>";
echo "Sisa Bagi: {$sisaBagi} <br>";
echo "Pangkat: {$pangkat} <br>";

echo "<br><br>";

$hasilSama = $a == $b;
$hasilTidakSama = $a != $b;
$hasilLebihKecil = $a < $b;
$hasilLebihBesar = $a > $b;
$hasilLebihKecilSama = $a <= $b;
$hasilLebihBesarSama = $a >= $b;

echo "Hasil Sama: {$hasilSama} <br>";
echo "Hasil Tidak Sama: {$hasilTidakSama} <br>";
echo "Hasil Lebih Kecil: {$hasilLebihKecil} <br>";
echo "Hasil Lebih Besar: {$hasilLebihBesar} <br>";
echo "Hasil Lebih Kecil Sama: {$hasilLebihKecilSama} <br>";
echo "Hasil Lebih Besar Sama: {$hasilLebihBesarSama} <br>";

echo "<br><br>";

$hasilAnd = $a && $b;
$hasilOr = $a || $b;
$hasilNotA = !$a;
$hasilNotB = !$b;

echo "Hasil And: "; var_dump($hasilAnd); echo "<br>";
echo "Hasil Or: "; var_dump($hasilOr); echo "<br>";
echo "Hasil Not A: "; var_dump($hasilNotA); echo "<br>";
echo "Hasil Not B: "; var_dump($hasilNotB); echo "<br>";

echo "<br><br>";

$a +=$b;
echo "Variabel a +=: {$a} <br>";
$a -= $b;
echo "Variabel a -=: {$a} <br>";
$a *= $b;
echo "Variabel a *=: {$a} <br>";
$a /= $b;
echo "Variabel a /=: {$a} <br>";
$a %= $b;
echo "Variabel a %=: {$a} <br>";

echo "<br><br>";

$hasilIdentik = $a === $b;
$hasilTidakIdentik = $a !== $b;

echo "Hasil Identik:"; var_dump($hasilIdentik); echo" <br>";
echo "Hasil Tidak Identik:"; var_dump($hasilTidakIdentik); echo" <br>";
?>
