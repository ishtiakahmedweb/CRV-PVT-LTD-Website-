<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $siteSettings->app_name ?? 'CRV LTD' }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@300;400;500;600;700&family=Outfit:wght@300;400;600;700&display=swap" rel="stylesheet">

    @php
        $manifest = json_decode(file_get_contents(public_path('build/manifest.json')), true);
        $cssFile = $manifest['resources/css/app.css']['file'] ?? 'assets/app.css';
        $jsFile  = $manifest['resources/js/app.js']['file'] ?? 'assets/app.js';
    @endphp
    <link rel="stylesheet" href="{{ asset('build/' . $cssFile) }}">
    <script src="{{ asset('build/' . $jsFile) }}" defer></script>

    <!-- Swiper & GSAP -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>

    <style>
        :root {
            --primary: {{ $siteSettings->primary_color ?? '#FFD700' }};
            --secondary: {{ $siteSettings->secondary_color ?? '#B8860B' }};
            --bg-main: {{ $siteSettings->bg_color ?? '#0a0a0a' }};
            --text-main: {{ $siteSettings->text_color ?? '#ffffff' }};
        }
    </style>
</head>
<body class="antialiased bg-bg-main text-text-main font-sans">
    <header class="fixed w-full z-50 bg-bg-main/80 backdrop-blur-md border-b border-white/5">
        <nav class="container mx-auto px-6 py-4 flex justify-between items-center">
            <div class="flex items-center">
                @if($siteSettings->logo)
                    <img src="{{ asset('images/' . $siteSettings->logo) }}" alt="{{ $siteSettings->app_name }}" class="h-10 w-auto">
                @else
                    <div class="text-2xl font-bold tracking-wider text-primary">
                        {{ $siteSettings->app_name ?? 'CRV LTD' }}
                    </div>
                @endif
            </div>
            <div class="hidden md:flex space-x-8 text-sm font-medium">
                @if($siteSettings->header_menu)
                    @foreach($siteSettings->header_menu as $name => $link)
                        <a href="{{ $link }}" class="hover:text-primary transition-colors">{{ $name }}</a>
                    @endforeach
                @else
                    <a href="#hero" class="hover:text-primary transition-colors">হোম</a>
                    <a href="#about" class="hover:text-primary transition-colors">আমাদের সম্পর্কে</a>
                    <a href="#products" class="hover:text-primary transition-colors">পণ্যসমূহ</a>
                    <a href="#contact" class="hover:text-primary transition-colors">যোগাযোগ</a>
                @endif
            </div>
            <a href="https://wa.me/{{ $siteSettings->whatsapp_number ?? '' }}" class="bg-primary text-bg-main px-6 py-2 rounded-full font-bold text-sm hover:scale-105 transition-transform">
                হোয়াটসঅ্যাপ
            </a>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer class="bg-black py-12 border-t border-white/5">
        <div class="container mx-auto px-6 text-center">
            <div class="text-xl font-bold text-primary mb-6">{{ $siteSettings->app_name ?? 'CRV LTD' }}</div>
            <p class="text-gray-500 text-sm mb-8 max-w-md mx-auto">
                {{ $siteSettings->footer_text ?? ($siteSettings->address ?? 'Premium Engine Oil Lubricant Solutions.') }}
            </p>
            <div class="flex justify-center space-x-6 mb-8">
                @if($siteSettings->facebook_url ?? false)
                    <a href="{{ $siteSettings->facebook_url }}" class="text-gray-400 hover:text-primary transition-colors">ফেসবুক</a>
                @endif
                @if($siteSettings->instagram_url ?? false)
                    <a href="{{ $siteSettings->instagram_url }}" class="text-gray-400 hover:text-primary transition-colors">ইনস্টাগ্রাম</a>
                @endif
            </div>
            <div class="text-gray-600 text-xs">
                &copy; {{ date('Y') }} {{ $siteSettings->app_name ?? 'CRV LTD' }}. All rights reserved.
            </div>
        </div>
    </footer>
</body>
</html>
