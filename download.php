<?php
// Папка, где хранятся файлы
$directory = 'files/'; 
$file = basename($_GET['file']); // Получаем имя файла
$filepath = $directory . $file;

// Проверяем, существует ли файл
if (file_exists($filepath)) {
    // Устанавливаем заголовки для скачивания
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="' . $file . '"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($filepath));

    // Очищаем буфер вывода
    ob_clean();
    flush();

    // Читаем файл и отправляем его пользователю
    readfile($filepath);
    exit;
} else {
    echo "Файл не найден.";
}
?>
