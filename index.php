<?php

require_once 'cImages.php';

$img = new Images;
$img->uploadImg();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Обработка изображений Intervention</title>
    </head>
       
    <body>
        <h1>Обработка изображений Intervention</h1>
        <p>Загружаемые изображения не дожны превышать вес в 10 Мб</p>
        <form name="uploadimg" enctype="multipart/form-data" action="index.php" method="POST">
            <!-- Поле MAX_FILE_SIZE должно быть указано до поля загрузки файла -->
            <input type="hidden" name="MAX_FILE_SIZE" value="10000000" />
            <!-- Название элемента input определяет имя в массиве $_FILES -->
            <label>Загрузить изображение:</label>
            <input name="uploadimg" type="file" title="Выберите изображение"/>
            <input type="submit" value="Загрузить" />
        </form>
        
        <p><a href="/results.php">Перейти к результату</a></p>
    </body>
</html>  