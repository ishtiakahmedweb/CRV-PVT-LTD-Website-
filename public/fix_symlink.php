<?php
// Fix storage symlink with absolute paths for cPanel
$appRoot = dirname(__DIR__);
$publicStorage = $appRoot . '/public/storage';
$target = $appRoot . '/storage/app/public';

echo "<style>body{font-family:monospace;background:#1a1a1a;color:#ccc;padding:20px;}
.ok{color:#4ade80;}.err{color:#f87171;}.warn{color:#facc15;}
.box{background:#2a2a2a;padding:15px;border-radius:8px;margin:10px 0;}</style>";

echo "<h2 style='color:#fff'>🔧 Storage Symlink Fix</h2>";

echo "<div class='box'>";
echo "<strong style='color:#fff'>App Root:</strong> {$appRoot}<br>";
echo "<strong style='color:#fff'>Symlink Path:</strong> {$publicStorage}<br>";
echo "<strong style='color:#fff'>Target:</strong> {$target}<br>";
echo "</div>";

// Ensure target directory exists
if (!is_dir($target)) {
    mkdir($target, 0775, true);
    echo "<div class='box'><span class='ok'>✅ Created target directory: {$target}</span></div>";
}

// Check existing symlink
if (is_link($publicStorage)) {
    $current = readlink($publicStorage);
    echo "<div class='box'><span class='warn'>⚠️ Existing symlink found → {$current}<br>Removing and recreating...</span></div>";
    unlink($publicStorage);
}

// Check if it's a real directory (not symlink)
if (is_dir($publicStorage) && !is_link($publicStorage)) {
    echo "<div class='box'><span class='warn'>⚠️ Found a real directory at {$publicStorage}, not a symlink.<br>This is the problem! Renaming it...</span></div>";
    rename($publicStorage, $publicStorage . '_backup_' . time());
}

// Create symlink
if (symlink($target, $publicStorage)) {
    echo "<div class='box'><span class='ok'>✅ Symlink created successfully!</span><br>";
    echo "From: {$publicStorage}<br>To: {$target}</div>";
} else {
    echo "<div class='box'><span class='err'>❌ Could not create symlink automatically.<br>";
    echo "Run this command in terminal:<br><br>";
    echo "<code>ln -sf {$target} {$publicStorage}</code><br>";
    echo "</span></div>";
}

// List files in storage/app/public
echo "<div class='box'><strong style='color:#fff'>Files in storage/app/public:</strong><br>";
if (is_dir($target)) {
    function listDir($dir, $prefix = "") {
        $items = scandir($dir);
        foreach ($items as $item) {
            if ($item === '.' || $item === '..') continue;
            $path = $dir . '/' . $item;
            if (is_dir($path)) {
                echo "<span style='color:#60a5fa'>{$prefix}📁 {$item}/</span><br>";
                listDir($path, $prefix . "&nbsp;&nbsp;&nbsp;");
            } else {
                $size = round(filesize($path) / 1024, 1);
                echo "{$prefix}🖼️ {$item} <span style='color:#6b7280'>({$size}KB)</span><br>";
            }
        }
    }
    listDir($target);
}
echo "</div>";

// Test URL
echo "<div class='box'><strong style='color:#fff'>🧪 Test links:</strong><br>";
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https" : "http";
$host = $_SERVER['HTTP_HOST'] ?? 'your-domain.com';
echo "<a style='color:#4ade80' href='{$protocol}://{$host}/storage/' target='_blank'>{$protocol}://{$host}/storage/</a><br>";
echo "</div>";

echo "<h3 style='color:#4ade80'>✅ Done! Now refresh your website.</h3>";
?>
