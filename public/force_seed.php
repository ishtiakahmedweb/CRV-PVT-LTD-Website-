<?php
use Illuminate\Support\Facades\Artisan;

define('LARAVEL_START', microtime(true));

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

echo "<h1>Laravel Force Seed</h1>";
try {
    echo "Running Migrations...<br>";
    Artisan::call('migrate', ['--force' => true]);
    echo Artisan::output() . "<br>";

    echo "Running Seeders...<br>";
    Artisan::call('db:seed', ['--force' => true]);
    echo Artisan::output() . "<br>";

    echo "Clearing Cache...<br>";
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    echo "Done! Site should be populated now.";
} catch (\Exception $e) {
    echo "Error: " . $e->getMessage();
}
