<!DOCTYPE html>
<html>
<head>
    <title>Form Input dengan Validasi jQuery dan AJAX</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <h1>Form Input dengan Validasi jQuery dan AJAX</h1>
    <form id="myForm">
        <label for="nama">Nama : </label>
        <input type="text" id="nama" name="nama">
        <span id="nama-error" style="color: red;"></span><br><br>

        <label for="email">Email :</label>
        <input type="text" id="email" name="email">
        <span id="email-error" style="color: red;"></span><br><br>

        <input type="submit" value="Submit">
    </form>

    <div id="result"></div>

    <script>
        $(document).ready(function() {
            $("#myForm").submit(function(event) {
                event.preventDefault(); // Mencegah form dari submit secara default

                var nama = $("#nama").val();
                var email = $("#email").val();
                var valid = true;

                // Validasi nama
                if (nama === "") {
                    $("#nama-error").text("Nama harus diisi.");
                    valid = false;
                } else {
                    $("#nama-error").text("");
                }

                // Validasi email
                if (email === "") {
                    $("#email-error").text("Email harus diisi.");
                    valid = false;
                } else {
                    $("#email-error").text("");
                }

                // Jika validasi berhasil, kirim data menggunakan AJAX
                if (valid) {
                    $.ajax({
                        url: "proses_validasi.php",
                        type: "POST",
                        data: {
                            nama: nama,
                            email: email
                        },
                        success: function(response) {
                            $("#result").html(response);
                            $("#myForm")[0].reset(); // Reset form setelah berhasil submit
                        },
                        error: function(xhr, status, error) {
                            $("#result").html("Terjadi kesalahan: " + error);
                        }
                    });
                }
            });
        });
    </script>
</body>
</html>