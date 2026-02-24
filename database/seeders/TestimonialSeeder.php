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
        \App\Models\Testimonial::truncate();

        \App\Models\Testimonial::create([
            'name' => 'জনি আহমেদ',
            'role' => 'ভারী ট্রাক চালক',
            'content' => 'সিআরভি-র ইঞ্জিন অয়েল আমার ট্রাকের জ্বালানি সাশ্রয় এবং ইঞ্জিনের মসৃণতা উল্লেখযোগ্যভাবে উন্নত করেছে। আমি এটি ব্যবহারের জন্য বিশেষভাবে সুপারিশ করছি!',
            'rating' => 5,
            'order' => 1,
        ]);

        \App\Models\Testimonial::create([
            'name' => 'সারা ইসলাম',
            'role' => 'অটোমোটিভ ইঞ্জিনিয়ার',
            'content' => 'চমৎকার টেকনিক্যাল স্পেসিফিকেশন। সিআরভি লুব্রিকেন্ট চরম তাপমাত্রায় ইঞ্জিনের সর্বোচ্চ সুরক্ষা প্রদান করে।',
            'rating' => 5,
            'order' => 2,
        ]);

        \App\Models\Testimonial::create([
            'name' => 'মাইনুল হোসাইন',
            'role' => 'গ্যারেজ মালিক',
            'content' => 'আমার কাস্টমাররা সিআরভি ব্যবহারে খুব খুশি। এটি একটি নির্ভরযোগ্য ব্র্যান্ড যা তার প্রতিশ্রুতি রক্ষা করে।',
            'rating' => 4,
            'order' => 3,
        ]);
    }
}
