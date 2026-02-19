@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    @if(isset($homeSections['hero']))
    <section id="hero" class="relative h-screen flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0 z-0">
            @if($homeSections['hero']->image)
                <img src="{{ asset('storage/' . $homeSections['hero']->image) }}" class="w-full h-full object-cover opacity-30" alt="Hero">
            @else
                <div class="w-full h-full bg-gradient-to-br from-black via-gray-900 to-bg-main"></div>
            @endif
            <div class="absolute inset-0 bg-gradient-to-t from-bg-main via-transparent to-transparent"></div>
        </div>
        
        <div class="container mx-auto px-6 relative z-10 text-center">
            <h1 class="text-5xl md:text-7xl font-bold mb-6 leading-tight fade-up">
                {!! nl2br(e($homeSections['hero']->title)) !!}
            </h1>
            <p class="text-xl md:text-2xl text-gray-400 mb-10 max-w-3xl mx-auto fade-up delay-100">
                {{ $homeSections['hero']->subtitle }}
            </p>
            <a href="{{ $homeSections['hero']->cta_link ?? '#products' }}" class="inline-block bg-primary text-bg-main px-10 py-4 rounded-full font-bold text-lg hover:scale-105 transition-all shadow-lg shadow-primary/20 fade-up delay-200">
                {{ $homeSections['hero']->cta_text ?? 'Explore Products' }}
            </a>
        </div>
    </section>
    @endif

    <!-- Products Grid -->
    <section id="products" class="py-24 bg-bg-main">
        <div class="container mx-auto px-6">
            <div class="flex justify-between items-end mb-16">
                <div>
                    <h2 class="text-4xl font-bold mb-4">Our Premium Collection</h2>
                    <p class="text-gray-500">Engineered for maximum performance and protection.</p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse(\App\Models\Product::where('is_visible', true)->orderBy('order')->get() as $product)
                <div class="group relative bg-white/5 border border-white/10 p-8 rounded-3xl hover:bg-white/10 transition-all duration-500 hover:-translate-y-2">
                    <div class="relative h-64 mb-8 flex items-center justify-center overflow-hidden rounded-2xl bg-black/40">
                        @if($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" class="h-full object-contain group-hover:scale-110 transition-transform duration-700" alt="{{ $product->name }}">
                        @else
                            <div class="text-primary opacity-20 text-8xl font-black">OIL</div>
                        @endif
                    </div>
                    <div class="flex justify-between items-start mb-4">
                        <h3 class="text-2xl font-bold">{{ $product->name }}</h3>
                        @if($product->is_featured)
                            <span class="text-[10px] uppercase tracking-widest bg-primary/10 text-primary px-3 py-1 rounded-full border border-primary/20">Featured</span>
                        @endif
                    </div>
                    <p class="text-gray-500 text-sm mb-6 line-clamp-2">{{ $product->description }}</p>
                    
                    @if($product->specifications)
                    <div class="space-y-2">
                        @foreach($product->specifications as $key => $value)
                        <div class="flex justify-between text-xs border-b border-white/5 pb-1">
                            <span class="text-gray-600">{{ $key }}</span>
                            <span class="text-gray-300 font-semibold">{{ $value }}</span>
                        </div>
                        @endforeach
                    </div>
                    @endif
                </div>
                @empty
                <div class="col-span-full text-center py-20 text-gray-600">No products available at the moment.</div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- About Section -->
    @if(isset($homeSections['about']))
    <section id="about" class="py-24 border-t border-white/5 bg-black/30">
        <div class="container mx-auto px-6 flex flex-col md:flex-row items-center gap-16">
            <div class="md:w-1/2">
                <div class="relative group">
                    <div class="absolute -inset-4 bg-primary/20 blur-2xl group-hover:bg-primary/30 transition-all rounded-3xl opacity-50"></div>
                    <div class="relative rounded-3xl overflow-hidden border border-white/10">
                        @if($homeSections['about']->image)
                            <img src="{{ asset('storage/' . $homeSections['about']->image) }}" class="w-full h-auto" alt="About">
                        @else
                            <div class="h-[400px] bg-gray-900 flex items-center justify-center text-primary font-bold">About Image</div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="md:w-1/2">
                <span class="text-primary font-bold tracking-widest uppercase text-sm mb-4 block">{{ $homeSections['about']->subtitle }}</span>
                <h2 class="text-4xl md:text-5xl font-bold mb-8">{{ $homeSections['about']->title }}</h2>
                <div class="text-gray-400 leading-relaxed mb-10 text-lg">
                    {!! $homeSections['about']->content !!}
                </div>
                <a href="{{ $homeSections['about']->cta_link ?? '#' }}" class="inline-flex items-center text-primary font-bold hover:gap-4 gap-2 transition-all">
                    <span>{{ $homeSections['about']->cta_text ?? 'Learn More' }}</span>
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                </a>
            </div>
        </div>
    </section>
    @endif

    <!-- Features Section -->
    @if(isset($homeSections['features']))
    <section class="py-24 bg-bg-main">
        <div class="container mx-auto px-6 text-center mb-16">
            <h2 class="text-4xl font-bold mb-4">{{ $homeSections['features']->title }}</h2>
            <p class="text-gray-500">{{ $homeSections['features']->subtitle }}</p>
        </div>
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
                <div class="p-8 rounded-3xl bg-white/5 border border-white/5">
                    <div class="w-16 h-16 bg-primary/10 text-primary rounded-2xl flex items-center justify-center mx-auto mb-6 text-2xl font-bold italic">QD</div>
                    <h3 class="text-xl font-bold mb-4">Quality Durable</h3>
                    <p class="text-gray-500 text-sm">Engineered with high-end additives for maximum endurance.</p>
                </div>
                <div class="p-8 rounded-3xl bg-white/5 border border-white/5">
                    <div class="w-16 h-16 bg-primary/10 text-primary rounded-2xl flex items-center justify-center mx-auto mb-6 text-2xl font-bold italic">SP</div>
                    <h3 class="text-xl font-bold mb-4">Superior Performance</h3>
                    <p class="text-gray-500 text-sm">Maintains viscosity under extreme heat and heavy loads.</p>
                </div>
                <div class="p-8 rounded-3xl bg-white/5 border border-white/5">
                    <div class="w-16 h-16 bg-primary/10 text-primary rounded-2xl flex items-center justify-center mx-auto mb-6 text-2xl font-bold italic">QT</div>
                    <h3 class="text-xl font-bold mb-4">Quality Trusted</h3>
                    <p class="text-gray-500 text-sm">Approved by leading manufacturers worldwide.</p>
                </div>
            </div>
        </div>
    </section>
    @endif

    <style>
        .fade-up {
            animation: fadeUp 1s ease-out forwards;
            opacity: 0;
        }
        .delay-100 { animation-delay: 0.1s; }
        .delay-200 { animation-delay: 0.2s; }
        @keyframes fadeUp {
            from { transform: translateY(30px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }
    </style>
@endsection
