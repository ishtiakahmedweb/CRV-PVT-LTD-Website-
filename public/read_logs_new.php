<?php
$logPath = __DIR__ . '/../storage/logs/laravel.log';
if (file_exists($logPath)) {
    $content = file($logPath);
    $last20 = array_slice($content, -40);
    echo "<h1>Latest Server Logs</h1><pre>";
    foreach ($last20 as $line) {
        if (str_contains($line, 'ERROR') || str_contains($line, 'Exception') || str_contains($line, 'Stack trace')) {
            echo "<span style='color:red'>" . htmlspecialchars($line) . "</span>";
        } else {
            echo htmlspecialchars($line);
        }
    }
    echo "</pre>";
} else {
    echo "Log file not found at: " . $logPath;
}
?>
