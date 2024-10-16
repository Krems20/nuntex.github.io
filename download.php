<?php
$file = $_GET['file'];
$filePath = 'files/' . basename($file);

// Проверьте, существует ли файл
if (file_exists($filePath)) {
    // Установите заголовки
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="' . basename($filePath) . '"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($filePath));

    // Очистите буфер вывода перед чтением файла
    ob_clean();
    flush();
    readfile($filePath);
    exit;
} else {
    echo 'Файл не найден.';
}
?>
