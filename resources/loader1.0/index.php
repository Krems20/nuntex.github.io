<?php
// Убедитесь, что файл существует
$file_path = '/resources/loader1.0/Loader-1.0.zip';

if (file_exists($file_path)) {
    // Установка заголовков для скачивания
    header('Content-Description: File Transfer');
    header('Content-Type: application/zip');
    header('Content-Disposition: attachment; filename="' . basename($file_path) . '"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file_path));

    // Чтение файла и его вывод
    readfile($file_path);
    exit;
} else {
    echo "Файл не найден.";
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Скачать файл</title>
</head>
<body>
    <h1>Скачать файл Loader-1.0.zip</h1>
    <form method="post" action="">
        <button type="submit" name="download">Скачать</button>
    </form>
</body>
</html>
