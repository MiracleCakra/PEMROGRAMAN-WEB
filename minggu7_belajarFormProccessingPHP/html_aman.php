<!DOCTYPE html>
<html>

<head>
    <title>Form Input PHP</title>
</head>

<body>
    <h2>Form Input PHP</h2>
    <?php
    // Inisialisasi variabel
    $namaErr = "";
    $nama = "";
    $dataValid = "";


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Validasi nama (memastikan nama tidak kosong)
        if (empty($_POST["nama"])) {
            $namaErr = "Nama harus diisi!";
        } else {
            $nama = trim($_POST["nama"]);
            $dataValid = "Data nama berhasil diinput";
        }
    }
    ?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="nama">Nama: </label>
        <input type="text" name="nama" id="nama" value="<?php echo htmlspecialchars($nama); ?>">
        <span class="error"><?php echo $namaErr; ?></span><br><br>

        <input type="submit" name="submit" value="Submit">
    </form>

    <?php
    if (!empty($dataValid)) {
        echo "<p>" . htmlspecialchars($dataValid) . "</p>";
    }
    ?>
</body>

</html>