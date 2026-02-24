<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => 'সিআরভি সিন্থেটিক ৪টি (CRV Synthetic 4T)',
            'slug' => Str::slug('crv-synthetic-4t'),
            'description' => 'মোটরসাইকেলের ইঞ্জিনের সর্বোচ্চ সুরক্ষা এবং স্মুথ পারফরম্যান্সের জন্য প্রিমিয়াম সিন্থেটিক অয়েল। এটি ইঞ্জিনের ঘর্ষণ কমায় এবং স্থায়িত্ব বাড়ায়।',
            'specifications' => [
                'ভিসকোসিটি' => '10W-40',
                'ভলিউম' => '১ লিটার',
                'এপিআই' => 'SN',
                'জেএএসও' => 'MA2',
            ],
            'is_featured' => true,
            'is_visible' => true,
            'order' => 1,
        ]);

        Product::create([
            'name' => 'সিআরভি ডিজেল প্রো (CRV Diesel Pro)',
            'slug' => Str::slug('crv-diesel-pro'),
            'description' => 'ভারী যানবাহনের ডিজেল ইঞ্জিনের জন্য বিশেষভাবে তৈরি লুব্রিকেন্ট। এটি উচ্চ তাপেও ইঞ্জিনের সুরক্ষা নিশ্চিত করে এবং দীর্ঘ সময় সার্ভিস দেয়।',
            'specifications' => [
                'ভিসকোসিটি' => '15W-40',
                'ভলিউম' => '৫ লিটার',
                'এপিআই' => 'CI-4',
            ],
            'is_featured' => true,
            'is_visible' => true,
            'order' => 2,
        ]);

        Product::create([
            'name' => 'সিআরভি গিয়ার অয়েল (CRV Gear Oil)',
            'slug' => Str::slug('crv-gear-oil'),
            'description' => 'ট্রান্সমিশন এবং গিয়ার বক্সের সর্বোচ্চ দক্ষতার জন্য আদর্শ লুব্রিকেন্ট। এটি গিয়ার শিফটিং সহজ করে এবং শব্দ কমায়।',
            'specifications' => [
                'গ্রেড' => 'EP-90',
                'ভলিউম' => '৪ লিটার',
            ],
            'is_featured' => false,
            'is_visible' => true,
            'order' => 3,
        ]);
    }
}
