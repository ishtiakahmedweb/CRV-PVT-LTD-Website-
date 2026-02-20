<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $siteSettings->app_name ?? 'CRV LTD' }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

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
<body class="antialiased bg-bg-main text-text-main font-['Outfit']">
    <header class="fixed w-full z-50 bg-bg-main/80 backdrop-blur-md border-b border-white/5">
        <nav class="container mx-auto px-6 py-4 flex justify-between items-center">
            <div class="text-2xl font-bold tracking-wider text-primary">
                {{ $siteSettings->app_name ?? 'CRV LTD' }}
            </div>
            <div class="hidden md:flex space-x-8 text-sm font-medium">
                <a href="#hero" class="hover:text-primary transition-colors">Home</a>
                <a href="#about" class="hover:text-primary transition-colors">About</a>
                <a href="#products" class="hover:text-primary transition-colors">Products</a>
                <a href="#contact" class="hover:text-primary transition-colors">Contact</a>
            </div>
            <a href="https://wa.me/{{ $siteSettings->whatsapp_number ?? '' }}" class="bg-primary text-bg-main px-6 py-2 rounded-full font-bold text-sm hover:scale-105 transition-transform">
                WhatsApp
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
                {{ $siteSettings->address ?? 'Premium Engine Oil Lubricant Solutions.' }}
            </p>
            <div class="flex justify-center space-x-6 mb-8">
                @if($siteSettings->facebook_url ?? false)
                    <a href="{{ $siteSettings->facebook_url }}" class="text-gray-400 hover:text-primary transition-colors">Facebook</a>
                @endif
                @if($siteSettings->instagram_url ?? false)
                    <a href="{{ $siteSettings->instagram_url }}" class="text-gray-400 hover:text-primary transition-colors">Instagram</a>
                @endif
            </div>
            <div class="text-gray-600 text-xs">
                &copy; {{ date('Y') }} {{ $siteSettings->app_name ?? 'CRV LTD' }}. All rights reserved.
            </div>
        </div>
    </footer>
</body>
</html>
