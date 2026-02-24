<?php
// One-click upload fix script
$base = dirname(__DIR__);

echo "<h2>🔧 Upload Fix Script</h2><pre>";

// 1. Create livewire-tmp directory
$tmpDir = $base . '/storage/app/livewire-tmp';
if (!is_dir($tmpDir)) {
    mkdir($tmpDir, 0775, true);
    echo "✅ Created livewire-tmp directory\n";
} else {
    echo "✅ livewire-tmp directory exists\n";
}

// 2. Fix permissions
chmod($tmpDir, 0775);
chmod($base . '/storage/app', 0775);
chmod($base . '/storage', 0775);
echo "✅ Fixed storage permissions\n";

// 3. Check if livewire config exists
$livewireConfig = $base . '/config/livewire.php';
if (!file_exists($livewireConfig)) {
    echo "❌ config/livewire.php missing! Writing it now...\n";
    $configContent = <<<'PHP'
<?php
return [
    'temporary_file_upload' => [
        'disk' => null,
        'rules' => ['required', 'file', 'max:20480'],
        'directory' => null,
        'middleware' => 'throttle:60,1',
        'preview_mimes' => ['png','gif','bmp','svg','wav','mp4','mov','avi','wmv','mp3','m4a','jpg','jpeg','mpga','webp','wma'],
        'max_upload_time' => 5,
        'cleanup' => true,
    ],
];
PHP;
    file_put_contents($livewireConfig, $configContent);
    echo "✅ config/livewire.php created\n";
} else {
    echo "✅ config/livewire.php exists\n";
}

// 4. Show PHP upload limits
echo "\n--- PHP Upload Limits ---\n";
echo "upload_max_filesize: " . ini_get('upload_max_filesize') . "\n";
echo "post_max_size: " . ini_get('post_max_size') . "\n";
echo "memory_limit: " . ini_get('memory_limit') . "\n";
echo "max_execution_time: " . ini_get('max_execution_time') . "s\n";

// 5. Check writable
echo "\n--- Write Test ---\n";
$testFile = $tmpDir . '/test_write_' . time() . '.txt';
if (file_put_contents($testFile, 'test') !== false) {
    unlink($testFile);
    echo "✅ Storage is WRITABLE\n";
} else {
    echo "❌ Storage is NOT writable - contact your host\n";
}

echo "\n✅ All fixes applied! Now run: php artisan optimize:clear";
echo "</pre>";
?>
