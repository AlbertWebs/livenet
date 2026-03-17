@extends('layouts.app')

@section('title', 'About Us | ' . ($siteSettings['site_name'] ?? 'Livenet Solutions'))
@section('meta_description', 'Learn about ' . ($siteSettings['site_name'] ?? 'Livenet Solutions') . ' – fast, reliable home and business internet with 24/7 support.')

@section('content')
@php
    $siteName = $siteSettings['site_name'] ?? 'Livenet Solutions';
@endphp

{{-- Hero (matches contact / our-coverage) --}}
<section class="slider-two" id="top">
    <div class="swiper_carousel swiper-container" data-swiper='{"spaceBetween":0,"slidesPerView":1}'>
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="slider-two_image" style="background-image: url({{ asset('bg-2.jpg') }});"></div>
                <div class="slider-two_pattern" style="background-image: url({{ asset('images/main-slider/slider-two_pattern.png') }})"></div>
                <div class="auto-container">
                    <div class="slider-two_content-column">
                        <div class="slider-two_content-inner">
                            <nav class="slider-two_breadcrumb" aria-label="Breadcrumb">
                                <a href="{{ route('home') }}">Home</a> / About Us
                            </nav>
                            <div class="slider-two_title">Who we are</div>
                            <h1 class="slider-two_heading">About <br> {{ $siteName }}</h1>
                            <p class="slider-two_text" style="max-width: 520px; margin-top: 20px; margin-bottom: 0; color: rgba(255,255,255,0.9); font-size: 18px; line-height: 1.5;">We're a Nairobi-based internet service provider committed to keeping homes and businesses connected with fast, reliable, and affordable internet.</p>
                            <div class="slider-two_button-box" style="margin-top: 28px;">
                                <a class="btn-style-one theme-btn js-open-apply-modal" href="#">
                                    <div class="btn-wrap">
                                        <span class="text-one">Get connected</span>
                                        <span class="text-two">Get connected</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Our Story & Values --}}
<section class="about-content py-5">
    <div class="auto-container">
        <div class="sec-title centered">
            <div class="sec-title_title">our story</div>
            <h2 class="sec-title_heading">Our Story</h2>
        </div>
        <div class="about-intro">
            <p class="about-intro_lead">{{ $siteName }} was founded to bridge the gap between demand for quality internet and the reality of unreliable or overpriced options. We built our network with one goal: to deliver the connection you can count on.</p>
            <p>Today we serve thousands of homes and businesses across Nairobi and environs. From streaming and remote work to enterprise connectivity, we provide plans that fit how you live and work—with transparent pricing, no hidden fees, and support that actually answers.</p>
        </div>

        <div class="sec-title centered" style="margin-top: 3.5rem;">
            <div class="sec-title_title">what we stand for</div>
            <h2 class="sec-title_heading">What We Stand For</h2>
        </div>
        <div class="about-values_grid">
            <div class="about-value-card">
                <span class="about-value-card_icon" aria-hidden="true"><i class="fa-solid fa-bolt"></i></span>
                <h3>Reliability</h3>
                <p>We invest in our network and redundant links so you stay online. Our business plans come with an uptime SLA you can trust.</p>
            </div>
            <div class="about-value-card">
                <span class="about-value-card_icon" aria-hidden="true"><i class="fa-solid fa-handshake"></i></span>
                <h3>Transparency</h3>
                <p>Clear pricing, no data caps, and no surprise fees. What you see is what you get.</p>
            </div>
            <div class="about-value-card">
                <span class="about-value-card_icon" aria-hidden="true"><i class="fa-solid fa-headset"></i></span>
                <h3>Support</h3>
                <p>Real people, 24/7. When you need help, we're here—by phone, email, or in person.</p>
            </div>
        </div>

        <div class="about-cta" id="about-cta">
            <h3 class="about-cta_heading">Ready to get connected?</h3>
            <a href="{{ route('contact') }}" class="btn-style-one theme-btn js-open-apply-modal">
                <div class="btn-wrap">
                    <span class="text-one">Apply for connection</span>
                    <span class="text-two">Apply for connection</span>
                </div>
            </a>
            <p class="about-cta_text">Or <a href="{{ route('contact') }}">contact us</a> with any questions.</p>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
.slider-two_breadcrumb { font-size: 14px; opacity: 0.9; margin-bottom: 12px; }
.slider-two_breadcrumb a { color: rgba(255,255,255,0.95); text-decoration: none; }
.slider-two_breadcrumb a:hover { text-decoration: underline; }
.about-intro { max-width: 680px; margin: 0 auto; text-align: center; }
.about-intro_lead { font-size: 1.15rem; color: #1e293b; line-height: 1.7; margin-bottom: 1rem; }
.about-intro p { color: #64748b; line-height: 1.7; margin: 0; }
.about-values_grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 1.5rem; margin-top: 2rem; max-width: 960px; margin-left: auto; margin-right: auto; }
.about-value-card { background: #f8fafc; padding: 1.75rem; border-radius: 12px; border-left: 4px solid var(--main-color, #338edf); transition: box-shadow 0.2s ease; }
.about-value-card:hover { box-shadow: 0 8px 24px rgba(0,0,0,0.08); }
.about-value-card_icon { font-size: 1.5rem; color: var(--main-color, #338edf); display: block; margin-bottom: 0.75rem; }
.about-value-card h3 { font-size: 1.15rem; font-weight: 700; color: #1e293b; margin: 0 0 0.5rem; }
.about-value-card p { font-size: 0.95rem; color: #64748b; line-height: 1.6; margin: 0; }
.about-cta { text-align: center; padding: 2.5rem 1.5rem; margin-top: 2.5rem; background: linear-gradient(135deg, #e8f0fa 0%, #f0f6fc 100%); border-radius: 12px; }
.about-cta_heading { font-size: 1.25rem; font-weight: 700; color: #1e293b; margin: 0 0 1rem; }
.about-cta .theme-btn { margin-bottom: 0.75rem; }
.about-cta_text { margin: 0; font-size: 1rem; color: #64748b; }
.about-cta_text a { color: var(--main-color, #338edf); font-weight: 600; text-decoration: none; }
.about-cta_text a:hover { text-decoration: underline; }
</style>
@endpush
