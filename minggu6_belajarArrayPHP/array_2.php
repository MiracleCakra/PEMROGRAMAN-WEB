<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profil Dosen</title>
    <style>
        table {
            width: 50%;
            border-collapse: collapse;
            margin: 10px 0;
            font-size: 18px;
            text-align: left;
        }
        table, th, td {
            border: 3px solid black;
        }
        th, td {
            padding: 10px;
        }
        th {
            background-color: lightblue;
        }
    </style>
</head>
<body>

<h2>Profil Dosen</h2>

<?php
    $Dosen = [
        'nama' => 'Elok Nur Hamdana',
        'domisili' => 'Malang',
        'jenis_kelamin' => 'Perempuan'
    ];
?>

<table>
    <tr>
        <th><center>Informasi</center></th>
        <th><center>Detail</center></th>
    </tr>
    <tr>
        <td>Nama</td>
        <td><?php echo $Dosen['nama']; ?></td>
    </tr>
    <tr>
        <td>Domisili</td>
        <td><?php echo $Dosen['domisili']; ?></td>
    </tr>
    <tr>
        <td>Jenis Kelamin</td>
        <td><?php echo $Dosen['jenis_kelamin']; ?></td>
    </tr>
</table>

</body>
</html>
