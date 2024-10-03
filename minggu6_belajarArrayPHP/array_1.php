<!DOCTYPE html>
<html>
<head>
    <title>Daftar Dosen</title>
</head>
<body>
    <h2>Array Terindeks</h2>
    <?php
    $Listdosen = ["Elok Nur Hamdana", "Unggul Pamenang", "Bagas Nugraha"];
    echo $Listdosen[2] . "<br>";
    echo $Listdosen[0] . "<br>";
    echo $Listdosen[1] . "<br>";

    echo "<h3>melakukan perulangan pada list dosen:</h3>";
    foreach ($Listdosen as $dosen) {
        echo $dosen . "<br>";
    }
    ?>
</body>
</html>