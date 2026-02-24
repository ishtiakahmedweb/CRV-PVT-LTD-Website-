<?php

require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';

$logFile = storage_path('logs/laravel.log');

echo "<h1>Laravel Log Reader</h1>";

if (file_exists($logFile)) {
    $content = file_get_contents($logFile);
    // Split by timestamp pattern [YYYY-MM-DD HH:MM:SS]
    $errors = preg_split('/\[\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2}\]/', $content);
    $lastError = end($errors);
    
    echo "<h2>Latest Error Found:</h2>";
    echo "<pre style='background: #fee; border: 1px solid red; padding: 10px; white-space: pre-wrap;'>";
    echo htmlspecialchars($lastError);
    echo "</pre>";
    
    echo "<h2>Last 20 Log Lines:</h2>";
    $lines = file($logFile);
    $lastLines = array_slice($lines, -20);
    echo "<pre>";
    foreach ($lastLines as $line) {
        echo htmlspecialchars($line);
    }
    echo "</pre>";
} else {
    echo "Log file not found at: " . $logFile;
}
