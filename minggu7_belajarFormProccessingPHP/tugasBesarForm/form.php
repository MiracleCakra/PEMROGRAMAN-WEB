<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Tabel Berdasarkan Input</title>
    <link rel="stylesheet" href="style.css">
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

<h2>Form Data Mahasiswa</h2>

<!-- Form input jumlah tabel -->
<form id="formJumlahTabel">
    <label for="jumlah">Masukkan jumlah tabel yang ingin dibuat: </label>
    <input type="number" id="jumlah" name="jumlah" min="1" required>
    <button type="submit">Buat Tabel</button>
</form>

<!-- Form untuk submit tabel -->
<form id="formData" method="post" action="submit.php">
    <div class="container" id="tables-container"></div>
    <button type="submit" id="submitData" style="display:none;">Submit Data</button>
</form>


<div id="hasil-container"></div>

<script>
$(document).ready(function() {
    // form untuk membuat tabel disubmit
    $("#formJumlahTabel").submit(function(event) {
        event.preventDefault();

        var jumlah = $("#jumlah").val();
        if (jumlah > 0) {
            $.ajax({
                url: 'proses_form.php',
                type: 'POST',
                data: { jumlah: jumlah }, // Kirim jumlah ke process.php
                success: function(response) {
                    $("#tables-container").html(response);
                    $("#submitData").show();
                },
                error: function() {
                    alert('Terjadi kesalahan saat mengirim data');
                }
            });
        } else {
            alert('Masukkan jumlah tabel yang valid.');
        }
    });

    
    $("#formData").submit(function(event) {
        event.preventDefault();
        $.ajax({
            url: 'submit.php',
            type: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                $("#hasil-container").html(response);
            },
            error: function() {
                alert('Terjadi kesalahan saat mengirim data');
            }
        });
    });
});
</script>

</body>
</html>
