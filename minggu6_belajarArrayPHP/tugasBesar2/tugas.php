<?php
$data = [
    "nama" => ["Zidan", "Piki", "Sengge", "Samid", "Kotek"],
    "umur" => [20, 19, 22, 18, 25],
    "kelas" => ["2G", "2A", "2B", "3F", "3H"],
    "alamat" => ["jl. Mt Haryono", "jl. Pisang Kipas", "jl. Dinoyo", "jl. ABK", "jl. Kelud"]
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <h1>Data Siswa</h1>
    
    <div id="flip">Klik untuk menampilkan data siswa</div>
    <div id="kotak2">
        <table id="dataSiswa">
            <thead>
                <tr>
                    <th>NAMA</th>
                    <th>UMUR</th>
                    <th>KELAS</th>
                    <th>ALAMAT</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
        <h2 id="rataRata"></h2>
    </div>

    <script>
    $(document).ready(function() {
        $("#flip").click(function() {
            $("#kotak2").slideToggle("slow");
        });

        var data = <?php echo json_encode($data); ?>;


        $.each(data.nama, function(i, nama) {
            $('#dataSiswa tbody').append(
                '<tr>' +
                '<td>' + nama + '</td>' +
                '<td>' + data.umur[i] + '</td>' +
                '<td>' + data.kelas[i] + '</td>' +
                '<td>' + data.alamat[i] + '</td>' +
                '</tr>'
            );
        });

        // menghitung rata rata umur siswa
        var totalUmur = data.umur.reduce((a, b) => a + b, 0);
        var rataRata = totalUmur / data.umur.length;
        $('#rataRata').text('Rata-rata umur: ' + rataRata.toFixed(2));
    });
    </script>
</body>
</html>