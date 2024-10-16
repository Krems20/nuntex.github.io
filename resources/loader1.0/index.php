<?php
$files = array_diff(scandir('files'), array('..', '.'));

if (isset($_GET['file'])) {
    $file = basename($_GET['file']);
    $filepath = '/resources/loader1.0/' . $file;

    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . $file . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($filepath));
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
    <title>Скачивание файлов</title>
</head>
<body>
    <h1>Список файлов для скачивания</h1>
    <ul>
        <?php foreach ($files as $file): ?>
            <li><a href="?file=<?php echo urlencode($file); ?>"><?php echo htmlspecialchars($file); ?></a></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
