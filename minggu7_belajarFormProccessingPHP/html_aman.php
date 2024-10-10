<html>

<body>
    <?php
    $input = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $input = $_POST['input'];
        $input = htmlspecialchars($input, ENT_QUOTES, 'UTF-8');

        echo "$input <br><br>";
    }
    ?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="input">Nama :</label>
        <input type="text" name="input" id="input">
        <br><br>

        <br>

        <input type="submit">
    </form>

    <br><br>

</body>
</html>