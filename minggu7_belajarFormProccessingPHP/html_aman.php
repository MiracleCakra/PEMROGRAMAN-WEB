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
        <input type="text" id="input" name="input" required><br><br>

        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>

        <input type="submit" value="Kirim">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Memeriksa input nama
        if (isset($_POST['input'])) {
            $input = $_POST['input'];
            $input = htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
            echo "<p>Data nama telah diinputkan: " . $input . "</p>";
        } else {
            echo "<p>Data nama tidak diinputkan.</p>";
        }

        // Memeriksa dan memvalidasi email
        if (isset($_POST['email'])) {
            $email = $_POST['email'];
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo "<p>Email yang valid: " . htmlspecialchars($email, ENT_QUOTES, 'UTF-8') . "</p>";
            } else {
                echo "<p>Email tidak valid!</p>";
            }
        }
    }
    ?>
</body>
</html>
