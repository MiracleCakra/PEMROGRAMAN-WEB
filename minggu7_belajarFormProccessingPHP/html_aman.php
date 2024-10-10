<html>
<body>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="input">Nama :</label>
        <input type="text" name="input" id="input">
        <br><br>
        <input type="submit" value="Submit">
    </form>

    <br><br>

    <?php
    $input = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $input = $_POST['input'];
        $input = htmlspecialchars($input, ENT_QUOTES, 'UTF-8');

        echo "<div>";
        echo "Nama: $input <br><br>";
        echo "</div>";
    }
    ?>
</body>
</html>