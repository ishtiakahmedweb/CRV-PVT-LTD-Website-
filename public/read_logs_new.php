<?php
$logPath = __DIR__ . '/../storage/logs/laravel.log';
if (file_exists($logPath)) {
    $content = file($logPath);
    $last20 = array_slice($content, -40);
    echo "<h1>Detailed Server Logs</h1>";
    echo "<div style='background:#f4f4f4; padding:20px; border-radius:10px;'>";
    foreach ($last20 as $line) {
        if (preg_match('/(Exception|Error|Fatal error|Parse error|Stack trace)/i', $line)) {
            echo "<div style='color:red; font-weight:bold; border-bottom:1px solid #ddd; padding:5px 0;'>" . htmlspecialchars($line) . "</div>";
        } else {
            echo "<div style='color:#666; font-family:monospace;'>" . htmlspecialchars($line) . "</div>";
        }
    }
    echo "</div>";
} else {
    echo "Log file not found at: " . $logPath;
}
?>
