<?php
if (isset($_POST["submit"])) {
    $targetdir = "uploads/";
    $targetfile = $targetdir . basename($_FILES["myfile"]["name"]);
    $imageFileType = strtolower(pathinfo($targetfile, PATHINFO_EXTENSION));

    // Cek apakah file adalah gambar
    $validExtensions = ["jpg", "jpeg", "png", "gif"];
    if (in_array($imageFileType, $validExtensions) && getimagesize($_FILES["myfile"]["tmp_name"])) {
        if (move_uploaded_file($_FILES["myfile"]["tmp_name"], $targetfile)) {
            echo "File berhasil diunggah.<br>";

            // Membuat thumbnail
            $thumb_width = 200;
            list($width, $height) = getimagesize($targetfile);
            $thumb_height = ($height / $width) * $thumb_width;

            $thumb = imagecreatetruecolor($thumb_width, $thumb_height);
            $source = imagecreatefromstring(file_get_contents($targetfile));

            imagecopyresized($thumb, $source, 0, 0, 0, 0, $thumb_width, $thumb_height, $width, $height);
            
            $thumb_file = $targetdir . "thumb_" . basename($_FILES["myfile"]["name"]);
            imagejpeg($thumb, $thumb_file);

            echo "<img src='$thumb_file' alt='Thumbnail'>";
        } else {
            echo "Gagal mengunggah file.";
        }
    } else {
        echo "File harus berupa gambar (JPG, JPEG, PNG, GIF).";
    }
}
?>