<?php
if (isset($_GET['download'])) {
    $file = 'Loader-1.0.zip';
    $filepath = __DIR__ . '/' . $file;

    if (file_exists($filepath)) {
        // Очищаем буфер вывода
        ob_clean();
        flush();

        // Устанавливаем заголовки для скачивания
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . basename($file) . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($filepath));

        // Читаем файл
        readfile($filepath);
        exit;
    } else {
        echo "Файл не найден.";
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Скачивание Loader-1.0.zip</title>
</head>
<body>
    <h1>Скачивание Loader-1.0.zip</h1>
    <p>Нажмите на кнопку ниже, чтобы скачать файл:</p>
    <form method="get" action="">
        <button type="submit" name="download">Скачать Loader-1.0.zip</button>
    </form>
</body>
</html>
