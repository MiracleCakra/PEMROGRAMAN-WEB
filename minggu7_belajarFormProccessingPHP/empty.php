<?php
$myArray = array(); // Array kosong

if (empty($myArray)) {
    echo "Array tidak terdefinisi atau kosong.<br>\n";
} else {
    echo "Array terdefinisi dan tidak kosong.<br>\n";
}

if (empty($nonExistentVar)) {
    echo "Variabel tidak terdefinisi atau kosong.<br>\n";
} else {
    echo "Variabel terdefinisi dan tidak kosong.<br>\n";
}
?>