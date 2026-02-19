<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SiteSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\SiteSetting::create([
            'app_name' => 'CRV LTD',
            'primary_color' => '#FFD700',
            'secondary_color' => '#B8860B',
            'bg_color' => '#0a0a0a',
            'text_color' => '#FFFFFF',
            'contact_email' => 'info@crvltd.com',
            'contact_phone' => '+880123456789',
            'whatsapp_number' => '+880123456789',
            'address' => 'Dhaka, Bangladesh',
        ]);
    }
}
