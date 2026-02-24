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
            'title' => 'আমাদের প্রিমিয়াম মোটরসাইকেল ইঞ্জিন অয়েল ইঞ্জিনের স্থায়িত্ব বৃদ্ধি করে',
            'subtitle' => 'সিআরভি লুব্রিকেন্টের সাথে আপনার ইঞ্জিনের পূর্ণ শক্তি অনুভব করুন।',
            'content' => 'সবচেয়ে কঠিন পরিস্থিতির জন্য তৈরি উচ্চ-ক্ষমতাসম্পন্ন লুব্রিকেন্ট।',
            'cta_text' => "শুরু করা যাক",
            'cta_link' => '#products',
            'order' => 1,
        ]);

        \App\Models\HomeSection::create([
            'type' => 'about',
            'title' => 'সিআরভি লিমিটেড সম্পর্কে',
            'subtitle' => 'পেশাদার গ্রেড লুব্রিকেন্ট',
            'content' => 'সিআরভি লিমিটেড উচ্চ-মানের ইঞ্জিন অয়েল এবং লুব্রিকেন্টের একটি শীর্ষস্থানীয় সরবরাহকারী, যা আপনার যানবাহনের কর্মক্ষমতা এবং দীর্ঘায়ু বৃদ্ধির জন্য নিবেদিত।',
            'cta_text' => 'আরও পড়ুন',
            'cta_link' => '#about',
            'order' => 2,
        ]);

        \App\Models\HomeSection::create([
            'type' => 'features',
            'title' => 'কেন সিআরভি লিমিটেড বেছে নেবেন?',
            'subtitle' => 'শ্রেষ্ঠত্বের জন্য তৈরি',
            'content' => 'ক্ষয় এবং তাপের বিরুদ্ধে সর্বোচ্চ সুরক্ষা প্রদানের জন্য আমাদের অয়েলগুলো সর্বশেষ অ্যাডিটিভ প্রযুক্তির মাধ্যমে তৈরি করা হয়েছে।',
            'order' => 3,
        ]);
    }
}
