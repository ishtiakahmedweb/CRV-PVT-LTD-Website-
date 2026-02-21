<?php
echo "<h1>Laravel Asset Diagnostic</h1>";

$paths = [
    'Root .env' => '.env',
    'Root .htaccess' => '.htaccess',
    'Public Folder' => 'public',
    'Public index.php' => 'public/index.php',
    'Build Folder' => 'public/build',
    'Manifest' => 'public/build/manifest.json',
];

echo "<ul>";
foreach ($paths as $label => $path) {
    echo "<li><b>$label:</b> " . (file_exists($path) ? "✅ Found" : "❌ NOT FOUND ($path)") . "</li>";
}
echo "</ul>";

if (file_exists('public/build/manifest.json')) {
    echo "<h3>Manifest Contents:</h3><pre>";
    echo file_get_contents('public/build/manifest.json');
    echo "</pre>";
}

echo "<h3>Folder Permissions:</h3><pre>";
echo "Storage: " . substr(sprintf('%o', fileperms('storage')), -4) . "\n";
echo "Bootstrap/Cache: " . substr(sprintf('%o', fileperms('bootstrap/cache')), -4) . "\n";
echo "Public: " . substr(sprintf('%o', fileperms('public')), -4) . "\n";
echo "</pre>";

echo "<h3>Server Environment:</h3><pre>";
echo "PHP Version: " . phpversion() . "\n";
echo "Server Software: " . $_SERVER['SERVER_SOFTWARE'] . "\n";
echo "Document Root: " . $_SERVER['DOCUMENT_ROOT'] . "\n";
echo "Script Filename: " . $_SERVER['SCRIPT_FILENAME'] . "\n";
echo "</pre>";
