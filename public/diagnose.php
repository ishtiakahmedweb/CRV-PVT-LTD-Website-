<?php
echo "<h1>Improved Laravel Asset Diagnostic</h1>";

$baseDir = dirname(__DIR__); // Go up one level from 'public'
echo "<p>Checking paths relative to: <b>$baseDir</b></p>";

$paths = [
    'App Root' => $baseDir,
    '.env file' => $baseDir . '/.env',
    'Storage folder' => $baseDir . '/storage',
    'Bootstrap Cache' => $baseDir . '/bootstrap/cache',
    'Public folder' => $baseDir . '/public',
    'Vite Manifest' => $baseDir . '/public/build/manifest.json',
];

echo "<ul>";
foreach ($paths as $label => $path) {
    if (file_exists($path)) {
        $perms = substr(sprintf('%o', fileperms($path)), -4);
        echo "<li>✅ <b>$label:</b> Found (Permissions: $perms)</li>";
    } else {
        echo "<li>❌ <b>$label:</b> NOT FOUND</li>";
    }
}
echo "</ul>";

echo "<h3>Server/PHP Info:</h3><pre>";
echo "Document Root: " . $_SERVER['DOCUMENT_ROOT'] . "\n";
echo "PHP Version: " . phpversion() . "\n";
echo "Current File: " . __FILE__ . "\n";
echo "</pre>";

if (file_exists($baseDir . '/public/build/manifest.json')) {
    echo "<h3>Manifest Content:</h3><pre>";
    echo file_get_contents($baseDir . '/public/build/manifest.json');
    echo "</pre>";
}
?>
