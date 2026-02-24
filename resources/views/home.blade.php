@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    @if(isset($homeSections['hero']))
    <section id="hero" class="relative h-screen flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0 z-0">
            @if($homeSections['hero']->image)
                <img src="{{ asset('images/' . $homeSections['hero']->image) }}" class="w-full h-full object-contain opacity-30" alt="Hero">
            @else
                <div class="w-full h-full bg-gradient-to-br from-black via-gray-900 to-bg-main"></div>
            @endif
            <div class="absolute inset-0 bg-gradient-to-t from-bg-main via-transparent to-transparent"></div>
        </div>
        
        <div class="container mx-auto px-6 relative z-10 text-center">
            <h1 class="text-5xl md:text-7xl font-bold mb-6 leading-tight hero-title">
                {!! nl2br(e($homeSections['hero']->title)) !!}
            </h1>
            <p class="text-xl md:text-2xl text-gray-400 mb-10 max-w-3xl mx-auto hero-subtitle">
                {{ $homeSections['hero']->subtitle }}
            </p>
            <a href="{{ $homeSections['hero']->cta_link ?? '#products' }}" class="inline-block bg-primary text-bg-main px-10 py-4 rounded-full font-bold text-lg hover:scale-105 transition-all shadow-lg shadow-primary/20 hero-btn">
                {{ $homeSections['hero']->cta_text ?? 'পণ্যসমূহ দেখুন' }}
            </a>
        </div>
    </section>
    @endif

    <!-- Products Grid -->
    <section id="products" class="py-24 bg-bg-main">
        <div class="container mx-auto px-6">
            <div class="flex justify-between items-end mb-16 section-header">
                <div>
                    <h2 class="text-4xl font-bold mb-4">আমাদের প্রিমিয়াম কালেকশন</h2>
                    <p class="text-gray-500">ইঞ্জিনের সর্বোচ্চ কর্মক্ষমতা এবং সুরক্ষার জন্য বিশেষভাবে তৈরি।</p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse(\App\Models\Product::where('is_visible', true)->orderBy('order')->get() as $product)
                <div class="product-card group relative bg-white/5 border border-white/10 p-8 rounded-3xl hover:bg-white/10 transition-all duration-500 hover:-translate-y-2">
                    <div class="relative h-64 mb-8 flex items-center justify-center overflow-hidden rounded-2xl bg-black/40">
                        @if($product->image)
                            <img src="{{ asset('images/' . $product->image) }}" class="h-full object-contain group-hover:scale-110 transition-transform duration-700" alt="{{ $product->name }}">
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
                    <p class="text-gray-500 text-sm mb-6 line-clamp-2 text-content">{{ $product->description }}</p>
                    
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
                <div class="col-span-full text-center py-20 text-gray-600">এই মুহূর্তে কোনো পণ্য নেই।</div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Testimonials Slider -->
    @php
        $testimonials = \App\Models\Testimonial::where('is_visible', true)->orderBy('order')->get();
    @endphp
    @if($testimonials->count() > 0)
    <section class="py-24 bg-black/20 testimonial-section">
        <div class="container mx-auto px-6 text-center mb-16">
            <h2 class="text-4xl font-bold mb-4">ক্লায়েন্ট ফিডব্যাক</h2>
            <p class="text-gray-500">সিআরভি সম্পর্কে চালক এবং প্রকৌশলীরা যা বলছেন।</p>
        </div>
        <div class="container mx-auto px-6">
            <div class="swiper testimonialSwiper">
                <div class="swiper-wrapper">
                    @foreach($testimonials as $testimonial)
                    <div class="swiper-slide h-auto">
                        <div class="bg-white/5 border border-white/10 p-10 rounded-3xl h-full flex flex-col justify-between">
                            <div>
                                <div class="flex text-primary mb-6">
                                    @for($i = 0; $i < ($testimonial->rating ?? 5); $i++)
                                        <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118l-2.8-2.034c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                    @endfor
                                </div>
                                <p class="text-gray-300 italic mb-8 text-lg">"{{ $testimonial->content }}"</p>
                            </div>
                            <div class="flex items-center">
                                @if($testimonial->image)
                                    <img src="{{ asset('images/' . $testimonial->image) }}" class="w-12 h-12 rounded-full object-cover mr-4" alt="{{ $testimonial->name }}">
                                @endif
                                <div class="text-left">
                                    <h4 class="font-bold text-white">{{ $testimonial->name }}</h4>
                                    <p class="text-gray-500 text-xs">{{ $testimonial->role }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="swiper-pagination mt-10"></div>
            </div>
        </div>
    </section>
    @endif

    <!-- About Section -->
    @if(isset($homeSections['about']))
    <section id="about" class="py-24 border-t border-white/5 bg-black/30 about-section">
        <div class="container mx-auto px-6 flex flex-col md:flex-row items-center gap-16">
            <div class="md:w-1/2 about-img">
                <div class="relative group">
                    <div class="absolute -inset-4 bg-primary/20 blur-2xl group-hover:bg-primary/30 transition-all rounded-3xl opacity-50"></div>
                    <div class="relative rounded-3xl overflow-hidden border border-white/10">
                        @if($homeSections['about']->image)
                            <img src="{{ asset('images/' . $homeSections['about']->image) }}" class="w-full h-auto" alt="About">
                        @else
                            <div class="h-[400px] bg-gray-900 flex items-center justify-center text-primary font-bold">About Image</div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="md:w-1/2 about-content">
                <span class="text-primary font-bold tracking-widest uppercase text-sm mb-4 block">{{ $homeSections['about']->subtitle }}</span>
                <h2 class="text-4xl md:text-5xl font-bold mb-8">{{ $homeSections['about']->title }}</h2>
                <div class="text-gray-400 leading-relaxed mb-10 text-lg">
                    {!! $homeSections['about']->content !!}
                </div>
                <a href="{{ $homeSections['about']->cta_link ?? '#' }}" class="inline-flex items-center text-primary font-bold hover:gap-4 gap-2 transition-all">
                    <span>{{ $homeSections['about']->cta_text ?? 'আরও জানুন' }}</span>
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                </a>
            </div>
        </div>
    </section>
    @endif

    <!-- Contact & Map Section -->
    <section id="contact" class="py-24 bg-bg-main contact-section">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
                <div class="contact-form-container">
                    <h2 class="text-4xl font-bold mb-4">অনুসন্ধান পাঠান</h2>
                    <p class="text-gray-500 mb-10">আমরা সাধারণত ২৪ ঘণ্টার মধ্যে উত্তর দিই।</p>

                    <form id="contactForm" class="space-y-6">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <input type="text" name="name" placeholder="আপনার নাম" required class="bg-white/5 border border-white/10 rounded-2xl px-6 py-4 outline-none focus:border-primary transition-colors text-white">
                            <input type="email" name="email" placeholder="ইমেইল ঠিকানা" required class="bg-white/5 border border-white/10 rounded-2xl px-6 py-4 outline-none focus:border-primary transition-colors text-white">
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <input type="text" name="phone" placeholder="ফোন নম্বর" class="bg-white/5 border border-white/10 rounded-2xl px-6 py-4 outline-none focus:border-primary transition-colors text-white">
                            <input type="text" name="subject" placeholder="বিষয়" class="bg-white/5 border border-white/10 rounded-2xl px-6 py-4 outline-none focus:border-primary transition-colors text-white">
                        </div>
                        <textarea name="message" placeholder="আমরা আপনাকে কীভাবে সাহায্য করতে পারি?" rows="4" required class="w-full bg-white/5 border border-white/10 rounded-2xl px-6 py-4 outline-none focus:border-primary transition-colors text-white"></textarea>
                        
                        <button type="submit" id="submitBtn" class="bg-primary text-bg-main px-12 py-4 rounded-full font-bold text-lg hover:scale-105 transition-all shadow-lg shadow-primary/20 flex items-center gap-3">
                            <span>মেসেজ পাঠান</span>
                            <div id="loader" class="hidden w-5 h-5 border-2 border-bg-main border-t-transparent rounded-full animate-spin"></div>
                        </button>
                        <div id="formMessage" class="mt-4 hidden p-4 rounded-2xl text-sm"></div>
                    </form>
                </div>

                <div class="contact-map rounded-3xl overflow-hidden grayscale opacity-50 hover:grayscale-0 hover:opacity-100 transition-all duration-1000 border border-white/10">
                    @if($siteSettings->google_maps_embed)
                        {!! $siteSettings->google_maps_embed !!}
                    @else
                        <div class="h-full bg-gray-900 flex items-center justify-center text-gray-600">Map configuration available in Site Settings.</div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // GSAP Animations
            gsap.registerPlugin(ScrollTrigger);

            // Hero Animations
            const heroTl = gsap.timeline();
            heroTl.from(".hero-title", { y: 50, opacity: 0, duration: 1, ease: "power4.out" })
                  .from(".hero-subtitle", { y: 30, opacity: 0, duration: 1, ease: "power4.out" }, "-=0.6")
                  .from(".hero-btn", { y: 20, opacity: 0, duration: 1, ease: "power4.out" }, "-=0.6");

            // Scroll Controlled Animations
            gsap.from(".product-card", {
                scrollTrigger: {
                    trigger: "#products",
                    start: "top 80%",
                },
                y: 60,
                opacity: 0,
                duration: 1,
                stagger: 0.2,
                ease: "power2.out"
            });

            gsap.from(".about-img", {
                scrollTrigger: { trigger: "#about", start: "top 80%" },
                x: -100,
                opacity: 0,
                duration: 1.2,
                ease: "power2.out"
            });

            gsap.from(".about-content", {
                scrollTrigger: { trigger: "#about", start: "top 80%" },
                x: 100,
                opacity: 0,
                duration: 1.2,
                ease: "power2.out"
            });

            // Swiper
            new Swiper(".testimonialSwiper", {
                slidesPerView: 1,
                spaceBetween: 30,
                pagination: { el: ".swiper-pagination", clickable: true },
                breakpoints: {
                    768: { slidesPerView: 2 },
                    1024: { slidesPerView: 3 },
                },
                autoplay: { delay: 4000 }
            });

            // AJAX Contact Form
            const contactForm = document.getElementById('contactForm');
            const submitBtn = document.getElementById('submitBtn');
            const loader = document.getElementById('loader');
            const formMessage = document.getElementById('formMessage');

            contactForm.addEventListener('submit', async function(e) {
                e.preventDefault();
                
                submitBtn.disabled = true;
                loader.classList.remove('hidden');
                formMessage.classList.add('hidden');

                const formData = new FormData(this);
                
                try {
                    const response = await fetch('{{ route('contact.store') }}', {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    });

                    const result = await response.json();

                    formMessage.classList.remove('hidden');
                    formMessage.textContent = result.message;
                    
                    if (result.success) {
                        formMessage.classList.add('bg-green-500/10', 'text-green-500');
                        formMessage.classList.remove('bg-red-500/10', 'text-red-500');
                        contactForm.reset();
                    } else {
                        formMessage.classList.add('bg-red-500/10', 'text-red-500');
                        formMessage.classList.remove('bg-green-500/10', 'text-green-500');
                        if (result.errors) {
                            formMessage.textContent = Object.values(result.errors).flat().join(' ');
                        }
                    }
                } catch (error) {
                    formMessage.classList.remove('hidden');
                    formMessage.classList.add('bg-red-500/10', 'text-red-500');
                    formMessage.textContent = 'Something went wrong. Please try again.';
                } finally {
                    submitBtn.disabled = false;
                    loader.classList.add('hidden');
                }
            });
        });
    </script>

    <style>
        .swiper-pagination-bullet { background: white !important; opacity: 0.2; }
        .swiper-pagination-bullet-active { background: var(--primary) !important; opacity: 1 !important; }
        iframe { width: 100%; height: 100%; min-height: 400px; border: 0; }
    </style>
@endsection
