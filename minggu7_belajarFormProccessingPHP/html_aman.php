<html>

<body>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="input">Nama :</label>
        <input type="text" name="input" id="input">
        <br><br>

        <label for="email">Email :</label>
        <input type="email" name="email" id="email">
        <br><br>

        <input type="submit">
    </form>

    <br><br>

    <?php
    $input = "";
    $email = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $input = $_POST['input'];
        $input = htmlspecialchars($input, ENT_QUOTES, 'UTF-8');

        $email = $_POST['email'];

        echo "<div>";
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Email valid: " . htmlspecialchars($email, ENT_QUOTES, 'UTF-8') . "<br><br>";
        } else {
            echo "Email tidak valid <br><br>";
        }

        echo "Nama: $input <br><br>";
        echo "</div>";
    }
    ?>
</body>
</html>