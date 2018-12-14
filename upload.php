<?php
// В PHP 4.1.0 и более ранних версиях следует использовать $HTTP_POST_FILES
// вместо $_FILES.

$uploaddir = '/upload';
$uploadname= basename($_FILES['file']['name']);
$uploadfile = $uploaddir . $uploadname

if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
    echo "Файл корректен и был успешно загружен.\n";
} else {
    echo "Файл не загружен\n";
}

?>