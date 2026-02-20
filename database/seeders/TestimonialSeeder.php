<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Testimonial::create([
            'name' => 'John Doe',
            'role' => 'Heavy Truck Driver',
            'content' => 'The engine oil from CRV has significantly improved my truck\'s fuel efficiency and engine smoothness. Highly recommended!',
            'rating' => 5,
            'order' => 1,
        ]);

        \App\Models\Testimonial::create([
            'name' => 'Sarah Smith',
            'role' => 'Automotive Engineer',
            'content' => 'Impressive technical specifications. CRV lubricants provide superior protection under extreme temperatures.',
            'rating' => 5,
            'order' => 2,
        ]);

        \App\Models\Testimonial::create([
            'name' => 'Mike Johnson',
            'role' => 'Garage Owner',
            'content' => 'My customers are very happy with CRV. It\'s a reliable brand that delivers what it promises.',
            'rating' => 4,
            'order' => 3,
        ]);
    }
}
