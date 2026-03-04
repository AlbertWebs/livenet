@extends('layouts.app')

@section('title', 'Home Internet Plans | ' . ($siteSettings['site_name'] ?? 'Livenet Solutions'))
@section('meta_description', 'Explore home internet plans. Fast, reliable residential internet. Stream, game, and work from home.')

@section('content')
@php
    $siteName = $siteSettings['site_name'] ?? 'Livenet Solutions';
    $firstPlan = isset($homePlans) && $homePlans->isNotEmpty() ? $homePlans->first() : null;
    $heroPrice = $firstPlan ? $firstPlan->currency . ' ' . number_format($firstPlan->price) : 'KES 1999';
    $heroPriceRaw = $firstPlan ? number_format($firstPlan->price) : '1999';
@endphp

{{-- Hero (slider-two) --}}
<section class="slider-two" id="home">
    <div class="swiper_carousel swiper-container" data-swiper='{"spaceBetween":0,"slidesPerView":1,"autoplay":{"delay":"6000"}}'>
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="slider-two_video-wrap">
                    <video class="slider-two_video" autoplay muted loop playsinline poster="{{ !empty($siteSettings['home_internet_hero_poster']) ? asset('storage/' . $siteSettings['home_internet_hero_poster']) : asset('images/main-slider/1.jpg') }}">
                        <source src="{{ !empty($siteSettings['home_internet_hero_video']) ? asset('storage/' . $siteSettings['home_internet_hero_video']) : asset('background-video.mp4') }}" type="video/mp4">
                    </video>
                </div>
                <div class="slider-two_pattern" style="background-image: url({{ !empty($siteSettings['home_internet_hero_pattern']) ? asset('storage/' . $siteSettings['home_internet_hero_pattern']) : asset('images/main-slider/slider-two_pattern.png') }})"></div>
                <div class="auto-container">
                    <div class="slider-two_content-column">
                        <div class="slider-two_content-inner">
                            <div class="slider-two_price">{{ $heroPrice }} <span>Per Month</span></div>
                            <div class="slider-two_title">Welcome to {{ $siteName }}'s Home Internet</div>
                            <h1 class="slider-two_heading">Best Internet <br> Service in Your <br> Region</h1>
                            <div class="slider-two_button-box">
                                <a class="btn-style-one theme-btn js-open-apply-modal" href="#pricing">
                                    <div class="btn-wrap">
                                        <span class="text-one">Check Availability</span>
                                        <span class="text-two">Check Availability</span>
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

{{-- About Two --}}
<section class="about-two" id="about">
    <div class="about-two_curve" style="background-image: url({{ !empty($siteSettings['home_internet_about_curve_1']) ? asset('storage/' . $siteSettings['home_internet_about_curve_1']) : asset('images/background/about-two_pattern-1.png') }})"></div>
    <div class="about-two_curve-two" style="background-image: url({{ !empty($siteSettings['home_internet_about_curve_2']) ? asset('storage/' . $siteSettings['home_internet_about_curve_2']) : asset('images/background/about-two_pattern-2.png') }})"></div>
    <div class="auto-container">
        <div class="row clearfix">
            <div class="about-two_image-column col-lg-6 col-md-12 col-sm-12">
                <div class="about-two_image-outer">
                    <div class="about-two_pattern" style="background-image: url({{ !empty($siteSettings['home_internet_about_pattern']) ? asset('storage/' . $siteSettings['home_internet_about_pattern']) : asset('images/background/about-two_pattern.png') }})"></div>
                    <div class="about-two_image">
                        <img src="{{ !empty($siteSettings['home_internet_about_image']) ? asset('storage/' . $siteSettings['home_internet_about_image']) : asset('images/resource/happy-user.jpg') }}" alt="" />
                    </div>
                    <div class="about-two_icon flaticon-wifi-router"></div>
                </div>
            </div>
            <div class="about-two_content-column col-lg-6 col-md-12 col-sm-12">
                <div class="about-two_content-outer">
                    <div class="sec-title">
                        <div class="sec-title_title tx-split-text split-in-right">about us</div>
                        <h2 class="sec-title_heading tx-split-text split-in-right">Reliable Internet Provider <br> For Your Home</h2>
                    </div>
                    <div class="about-two_bold-text">
                        @if(!empty(trim($siteSettings['home_intro_text'] ?? '')))
                            {{ trim($siteSettings['home_intro_text']) }}
                        @else
                            {{ $siteName }} delivers high-speed home internet services designed for residential customers. With flexible packages and reliable connections, we ensure seamless browsing, streaming, and communication.
                        @endif
                    </div>
                    <div class="row clearfix">
                        <div class="column col-lg-6 col-md-6 col-sm-6">
                            <ul class="about-two_list">
                                <li><i class="fa-solid fa-bolt fa-fw"></i> Home Broadband</li>
                                <li><i class="fa-solid fa-bolt fa-fw"></i> 99% Internet Uptime</li>
                                <li><i class="fa-solid fa-bolt fa-fw"></i> Low latency</li>
                            </ul>
                        </div>
                        <div class="column col-lg-6 col-md-6 col-sm-6">
                            <ul class="about-two_list">
                                <li><i class="fa-solid fa-bolt fa-fw"></i> Friendly Support</li>
                                <li><i class="fa-solid fa-bolt fa-fw"></i> 24/7 Online Support</li>
                                <li><i class="fa-solid fa-bolt fa-fw"></i> Speed Up to 30 Mbps</li>
                            </ul>
                        </div>
                    </div>
                    <p>While we pride ourselves on our service, we also have a team of experts who are always ready to help and improve where we can.</p>
                    <div class="about-two_lower-box">
                        <div class="d-flex align-items-center flex-wrap">
                            <div class="about-two_button">
                                <a class="btn-style-two theme-btn" href="#pricing">
                                    <div class="btn-wrap">
                                        <span class="text-one">Discover More</span>
                                        <span class="text-two">Discover More</span>
                                    </div>
                                </a>
                            </div>
                            <div class="about-two_price">
                                <sub>{{ $firstPlan ? $firstPlan->currency : 'Kes' }}</sub>{{ $firstPlan ? number_format($firstPlan->price) : '1999' }}<sub>/ month</sub>
                                <span> Subscribe & get Fast internet </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Facility One --}}
<section class="facility-one">
    <span class="facility-one_circle-one"></span>
    <span class="facility-one_circle-two"></span>
    <div class="facility-one_pattern" style="background-image: url({{ !empty($siteSettings['home_internet_facility_pattern']) ? asset('storage/' . $siteSettings['home_internet_facility_pattern']) : asset('images/background/facility-pattern.png') }})"></div>
    <div class="auto-container">
        <div class="row clearfix">
            <div class="facility-one_content-column col-lg-6 col-md-12 col-sm-12">
                <div class="facility-one_content-outer">
                    <div class="sec-title">
                        <div class="sec-title_title tx-split-text split-in-up">OUR FACILITY</div>
                        <h2 class="sec-title_heading tx-split-text split-in-up">Few great reasons make <br> you choose us</h2>
                    </div>
                    <div class="facility-block_one">
                        <div class="facility-block_one-inner">
                            <div class="facility-block_one-icon flaticon-call"></div>
                            <h4 class="facility-block_one-heading">24/7 Support</h4>
                            <div class="facility-block_one-text">We focus on providing reliable connectivity and excellent customer support for a seamless internet experience at home.</div>
                        </div>
                    </div>
                    <div class="facility-block_one">
                        <div class="facility-block_one-inner">
                            <div class="facility-block_one-icon flaticon-money-bag"></div>
                            <h4 class="facility-block_one-heading">Competitive pricing</h4>
                            <div class="facility-block_one-text">We offer competitive pricing and flexible packages to meet various usage needs.</div>
                        </div>
                    </div>
                    <div class="facility-block_one">
                        <div class="facility-block_one-inner">
                            <div class="facility-block_one-icon flaticon-wifi-router"></div>
                            <h4 class="facility-block_one-heading">Quality Connection</h4>
                            <div class="facility-block_one-text">{{ $siteName }} delivers high-speed broadband internet services directly to residential customers.</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="facility-one_image-column col-lg-6 col-md-12 col-sm-12">
                <div class="facility-one_image-outer">
                    <span class="facility-one_circle-three"></span>
                    <div class="facility-one_image">
                        <img src="{{ !empty($siteSettings['home_internet_facility_image']) ? asset('storage/' . $siteSettings['home_internet_facility_image']) : asset('images/resource/us-tab.png') }}" alt="" />
                    </div>
                    <div class="facility-one_package">
                        <img src="{{ !empty($siteSettings['home_internet_facility_package']) ? asset('storage/' . $siteSettings['home_internet_facility_package']) : asset('images/resource/package.png') }}" style="width:220px!important" alt="" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Price Two (plans from DB) --}}
<section class="price-two" id="pricing">
    <div class="price-two_pattern" style="background-image: url({{ !empty($siteSettings['home_internet_price_pattern']) ? asset('storage/' . $siteSettings['home_internet_price_pattern']) : asset('images/background/pattern-2.png') }})"></div>
    <span class="price-two_circle-one"></span>
    <span class="price-two_circle-two"></span>
    <span class="price-two_circle-three"></span>
    <span class="price-two_circle-four"></span>
    <div class="auto-container">
        <div class="sec-title light centered">
            <div class="sec-title_title tx-split-text split-in-up">Our Pricing Plan For You</div>
            <h2 class="sec-title_heading tx-split-text split-in-up">No hidden charges! choose <br> your plan wisely.</h2>
        </div>
        <div class="row clearfix">
            @forelse($homePlans ?? [] as $plan)
            <div class="price-block_two col-lg-4 col-md-6 col-sm-12">
                <div class="price-block_two-inner" style="background-image: url({{ asset('images/background/price-pattern-1.png') }})">
                    @if($plan->is_highlighted ?? false)<div class="price-block_two-tag">popular</div>@endif
                    <div class="icon-box">
                        <i class="flaticon-web-development"></i>
                    </div>
                    <div class="price-block_two-title">{{ $plan->name }}</div>
                    <div class="price-block_two-price"><sub>{{ strtolower($plan->currency ?? 'kes') }}</sub>{{ number_format($plan->price) }}<sup>.00</sup><span>/ Month</span></div>
                    <ul class="price-block_two-list">
                        @foreach($plan->features_list as $feature)
                        <li><i class="icon fa-solid fa-check fa-fw"></i>{{ $feature }}</li>
                        @endforeach
                        @if(count($plan->features_list) === 0)
                        @if($plan->speed)<li><i class="icon fa-solid fa-check fa-fw"></i>{{ $plan->speed }}</li>@endif
                        <li><i class="icon fa-solid fa-check fa-fw"></i>24/7 Online Support</li>
                        <li><i class="icon fa-solid fa-check fa-fw"></i>Unlimited devices</li>
                        @endif
                    </ul>
                    <div class="price-block_two-button">
                        <a class="btn-style-two theme-btn js-open-apply-modal" href="#">
                            <div class="btn-wrap">
                                <span class="text-one">get started</span>
                                <span class="text-two">get started</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center py-5">
                <p class="text-white">Plans are being updated. <a href="{{ route('contact') }}" class="text-white text-decoration-underline">Contact us</a> for details.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

{{-- Counter --}}
<section class="counter-one">
    <div class="auto-container">
        <div class="row clearfix">
            <div class="counter-block_one col-xl-3 col-lg-6 col-md-6 col-sm-6">
                <div class="counter-block_one-inner wow flipInX" data-wow-delay="0ms" data-wow-duration="1500ms">
                    <span class="counter-block_one-icon flaticon-handshake"></span>
                    <div class="counter-block_one-counter"><span class="odometer" data-count="5"></span>+</div>
                    <div class="counter-block_one-text">Years of Experience</div>
                </div>
            </div>
            <div class="counter-block_one col-xl-3 col-lg-6 col-md-6 col-sm-6">
                <div class="counter-block_one-inner wow flipInX" data-wow-delay="150ms" data-wow-duration="1500ms">
                    <span class="counter-block_one-icon flaticon-experience"></span>
                    <div class="counter-block_one-counter"><span class="odometer" data-count="2000"></span>+</div>
                    <div class="counter-block_one-text">{{ $siteSettings['stat_2_label'] ?? 'Happy Clients' }}</div>
                </div>
            </div>
            <div class="counter-block_one col-xl-3 col-lg-6 col-md-6 col-sm-6">
                <div class="counter-block_one-inner wow flipInX" data-wow-delay="300ms" data-wow-duration="1500ms">
                    <span class="counter-block_one-icon flaticon-traffic-data"></span>
                    <div class="counter-block_one-counter"><span class="odometer" data-count="200"></span>+</div>
                    <div class="counter-block_one-text">Fiber Connection</div>
                </div>
            </div>
            <div class="counter-block_one col-xl-3 col-lg-6 col-md-6 col-sm-6">
                <div class="counter-block_one-inner wow flipInX" data-wow-delay="450ms" data-wow-duration="1500ms">
                    <span class="counter-block_one-icon flaticon-internet-1"></span>
                    <div class="counter-block_one-counter"><span class="odometer" data-count="20"></span>+</div>
                    <div class="counter-block_one-text">Connected businesses</div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
/* Hero video background */
.slider-two .slider-two_video-wrap {
    position: absolute;
    left: 0;
    top: 0;
    right: 0;
    bottom: 0;
    z-index: 0;
    overflow: hidden;
}
.slider-two .slider-two_video {
    width: 100%;
    height: 100%;
    object-fit: cover;
}
.slider-two .slider-two_pattern {
    z-index: 1;
}
/* Pricing section: equal card height, slight design tweaks, smaller CTA */
.price-two .row {
    display: flex;
    flex-wrap: wrap;
    align-items: stretch;
}
.price-two .price-block_two {
    display: flex;
    margin-bottom: 30px;
}
.price-two .price-block_two-inner {
    display: flex;
    flex-direction: column;
    width: 100%;
    min-height: 100%;
    box-shadow: 0 4px 20px rgba(0,0,0,0.08);
    border: 1px solid rgba(0,0,0,0.06);
    padding-left: 48px;
    padding-right: 48px;
    overflow: visible;
}
.price-two .price-block_two-price {
    padding-left: 6px;
    padding-right: 4px;
    overflow: visible;
    font-size: 52px;
}
.price-two .price-block_two-price sub {
    font-size: 14px;
}
.price-two .price-block_two-price sup {
    font-size: 22px;
    top: -18px;
}
.price-two .price-block_two-price span {
    font-size: 14px;
}
.price-two .price-block_two-button {
    margin-top: auto;
    padding-top: 8px;
}
.price-two .price-block_two-button .theme-btn {
    padding: 10px 24px;
    font-size: 14px;
    letter-spacing: 0.02em;
}
.price-two .price-block_two-button .btn-wrap {
    padding: 0;
}
</style>
@endpush
