<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HomeSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\HomeSection::create([
            'type' => 'hero',
            'title' => 'Our Premium Motorcycle Engine Oils Maximize Engine Life',
            'subtitle' => 'Unleash the full potential of your engine with CRV Lubricants.',
            'content' => 'High-performance lubricants designed for the toughest conditions.',
            'cta_text' => "Let's Get Started",
            'cta_link' => '#products',
            'order' => 1,
        ]);

        \App\Models\HomeSection::create([
            'type' => 'about',
            'title' => 'ABOUT CRV LTD',
            'subtitle' => 'Professional Grade Lubricants',
            'content' => 'CRV LTD is a leading provider of high-quality engine oils and lubricants, dedicated to maximizing the performance and longevity of your vehicle.',
            'cta_text' => 'Read More',
            'cta_link' => '#about',
            'order' => 2,
        ]);

        \App\Models\HomeSection::create([
            'type' => 'features',
            'title' => 'Why Choose CRV LTD?',
            'subtitle' => 'Engineered for Excellence',
            'content' => 'Our oils are formulated with the latest additive technology to provide superior protection against wear and heat.',
            'order' => 3,
        ]);
    }
}
