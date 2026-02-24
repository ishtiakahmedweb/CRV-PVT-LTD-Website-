<?php
// Diagnostic + Fix script for image display issues
$base = dirname(__DIR__);
require $base . '/vendor/autoload.php';

$app = require_once $base . '/bootstrap/app.php';
$app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

echo "<style>body{font-family:monospace;background:#1a1a1a;color:#ccc;padding:20px;}
.ok{color:#4ade80;}.err{color:#f87171;}.warn{color:#facc15;}.box{background:#2a2a2a;padding:15px;border-radius:8px;margin:10px 0;}</style>";

echo "<h2 style='color:#fff;'>🔍 Image Debug Report</h2>";

// 1. Storage symlink check
echo "<div class='box'><strong style='color:#fff;'>1. Storage Symlink</strong><br>";
$symlink = $base . '/public/storage';
if (is_link($symlink)) {
    echo "<span class='ok'>✅ Symlink exists → " . readlink($symlink) . "</span><br>";
} else {
    echo "<span class='err'>❌ No symlink! Running storage:link...</span><br>";
    \Illuminate\Support\Facades\Artisan::call('storage:link');
    echo "<span class='ok'>✅ Done!</span><br>";
}
echo "</div>";

// 2. Check what's in DB
echo "<div class='box'><strong style='color:#fff;'>2. Database Image Paths</strong><br>";

// Home sections
$sections = DB::table('home_sections')->whereNotNull('image')->get(['type','image']);
foreach ($sections as $s) {
    $path = $base . '/storage/app/public/' . $s->image;
    $publicPath = $base . '/storage/app/' . $s->image;
    echo "<strong>[Home:{$s->type}]</strong> {$s->image}<br>";
    if (file_exists($path)) {
        echo "<span class='ok'>✅ File EXISTS in /storage/app/public/</span><br>";
    } elseif (file_exists($publicPath)) {
        echo "<span class='warn'>⚠️ File in /storage/app/ (wrong disk!) - Moving...</span><br>";
        @mkdir(dirname($path), 0775, true);
        if (copy($publicPath, $path)) {
            echo "<span class='ok'>✅ Moved to correct location!</span><br>";
        }
    } else {
        echo "<span class='err'>❌ File NOT FOUND anywhere</span><br>";
    }
}

// Products
$products = DB::table('products')->whereNotNull('image')->get(['name','image']);
foreach ($products as $p) {
    $path = $base . '/storage/app/public/' . $p->image;
    $localPath = $base . '/storage/app/' . $p->image;
    echo "<strong>[Product:{$p->name}]</strong> {$p->image}<br>";
    if (file_exists($path)) {
        echo "<span class='ok'>✅ File EXISTS correctly</span><br>";
    } elseif (file_exists($localPath)) {
        echo "<span class='warn'>⚠️ Wrong disk - Moving...</span><br>";
        @mkdir(dirname($path), 0775, true);
        if (copy($localPath, $path)) {
            echo "<span class='ok'>✅ Moved!</span><br>";
        }
    } else {
        echo "<span class='err'>❌ File NOT FOUND - needs re-upload</span><br>";
    }
}

echo "</div>";

// 3. App URL check
echo "<div class='box'><strong style='color:#fff;'>3. App URL</strong><br>";
$appUrl = config('app.url');
echo "APP_URL: <span class='ok'>{$appUrl}</span><br>";
echo "Test URL: <span class='ok'>{$appUrl}/storage/test.jpg</span><br>";
echo "</div>";

// 4. Disk config
echo "<div class='box'><strong style='color:#fff;'>4. Public Disk Path</strong><br>";
$diskRoot = config('filesystems.disks.public.root');
echo "Public disk root: <span class='ok'>{$diskRoot}</span><br>";
if (is_dir($diskRoot)) {
    echo "<span class='ok'>✅ Directory exists</span><br>";
    $files = array_slice(scandir($diskRoot), 2, 10);
    echo "Contents: " . implode(', ', $files) . "<br>";
} else {
    echo "<span class='err'>❌ Directory does NOT exist!</span><br>";
}
echo "</div>";

echo "<h3 style='color:#4ade80;'>✅ Diagnostics complete.</h3>";
?>
