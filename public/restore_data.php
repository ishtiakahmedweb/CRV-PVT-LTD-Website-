<?php
// Emergency Data Restore Script
$base = dirname(__DIR__);
require $base . '/vendor/autoload.php';

$app = require_once $base . '/bootstrap/app.php';
$app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use Illuminate\Support\Facades\DB;
use App\Models\HomeSection;

echo "<style>body{font-family:monospace;background:#1a1a1a;color:#ccc;padding:20px;}
.ok{color:#4ade80;}.err{color:#f87171;}.box{background:#2a2a2a;padding:15px;border-radius:8px;margin:10px 0;}</style>";

echo "<h2 style='color:#fff;'>🔥 Data Restoration Tool</h2>";

echo "<div class='box'><strong style='color:#fff;'>Checking Home Sections...</strong><br>";

// Check for Hero
if (!DB::table('home_sections')->where('type', 'hero')->exists()) {
    HomeSection::create([
        'type' => 'hero',
        'title' => "Our Premium Motorcycle Engine Oils\nMaximize Engine Life",
        'subtitle' => 'Unleash the full potential of your engine with CRV Lubricants.',
        'content' => '',
        'cta_text' => "Let's Get Started",
        'cta_link' => '#products',
        'is_visible' => true,
        'order' => 1
    ]);
    echo "<span class='ok'>✅ Hero section restored (Default values)</span><br>";
} else {
    echo "<span>ℹ️ Hero section already exists.</span><br>";
}

// Check for About
if (!DB::table('home_sections')->where('type', 'about')->exists()) {
    HomeSection::create([
        'type' => 'about',
        'title' => 'ABOUT CRV LTD',
        'subtitle' => 'PROFESSIONAL GRADE LUBRICANTS',
        'content' => 'CRV LTD is a leading provider of high-quality engine oils and lubricants, dedicated to maximizing the performance and longevity of your vehicle.',
        'cta_text' => 'Read More',
        'cta_link' => '#',
        'is_visible' => true,
        'order' => 2
    ]);
    echo "<span class='ok'>✅ About section restored (Default values)</span><br>";
} else {
    echo "<span>ℹ️ About section already exists.</span><br>";
}

echo "</div>";

echo "<div class='box'><strong style='color:#fff;'>Next Steps:</strong><br>";
echo "1. <span class='ok'>Go to Admin Panel → Home Sections</span><br>";
echo "2. <span class='ok'>Upload your images again for Hero and About.</span><br>";
echo "</div>";

echo "<h3 style='color:#4ade80;'>✅ Restoration Process Complete.</h3>";
?>
