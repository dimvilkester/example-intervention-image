<?php

require_once 'cImages.php';

//Картинки должны быть выгружены в алфавитном порядке
//Сперва подложка, затем логотип
//Можно ли сделать так чтобы не зависить от этого, 
//какой более грамматный подход?

$dir = 'img/upload/';
$lsimg = scandir($dir);

if (!empty($lsimg[2])) {
    $imgsubstrate = $lsimg[2];
    $watermark = $lsimg[3];
    $img = new Images;
    $img->createImg($imgsubstrate, $watermark);
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Готово! Обработка изображений Intervention</title>
    </head>
       
    <body>
        <h1>Готово!</h1>
        <p><img src="img/imgfull.png" alt="Результат"></p>
        <p><a href="/">Назад</a></p>
    </body>
</html>  