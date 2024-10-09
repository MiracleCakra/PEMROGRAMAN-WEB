<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input</title>
</head>
<body>
    <h2>Form Input</h2>
    <form method="POST" action="">
        <label for="input">Masukkan Nama:</label><br>
        <input type="text" id="input" name="input"><br><br>
        <input type="submit" value="Kirim">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['input'])) {
            $input = $_POST['input'];
            $input = htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
            echo "<p>Data nama telah diinputkan: " . $input . "</p>";
        } else {
            echo "<p>Data nama tidak diinputkan.</p>";
        }
    }
    ?>
</body>
</html>