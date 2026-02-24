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
    echo "<pre>" . Artisan::output() . "</pre>";

    echo "Running Seeders...<br>";
    Artisan::call('db:seed', ['--force' => true]);
    echo "<pre>" . Artisan::output() . "</pre>";

    echo "Clearing Cache...<br>";
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    Artisan::call('cache:clear');
    
    echo "<h2>🎉 Done! Site should be populated and localizing correctly.</h2>";
    echo "<p><a href='/'>Go to Homepage</a></p>";
} catch (\Exception $e) {
    echo "<h2 style='color:red'>❌ Error during seeding:</h2>";
    echo "<pre>" . $e->getMessage() . "</pre>";
    echo "<pre>" . $e->getTraceAsString() . "</pre>";
}
