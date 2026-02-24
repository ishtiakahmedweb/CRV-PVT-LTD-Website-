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
        \App\Models\SiteSetting::updateOrCreate(
            ['id' => 1], // Usually there's only one site setting
            [
                'app_name' => 'সিআরভি লিমিটেড',
                'primary_color' => '#FFD700',
                'secondary_color' => '#B8860B',
                'bg_color' => '#0a0a0a',
                'text_color' => '#FFFFFF',
                'contact_email' => 'info@crvltd.com',
                'contact_phone' => '+৮৮০১২৩৪৫৬৭৮৯',
                'whatsapp_number' => '+৮৮০১২৩৪৫৬৭৮৯',
                'address' => 'ঢাকা, বাংলাদেশ',
                'google_maps_embed' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d116833.95338886315!2d90.33719602058421!3d23.780840465228516!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8b087026b81%3A0x8fa563bbddd590d9!2sDhaka!5e0!3m2!1sen!2sbd!4v1710000000000!5m2!1sen!2sbd" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
            ]
        );
    }
}
