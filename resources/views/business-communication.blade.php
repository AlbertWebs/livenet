@extends('layouts.app')

@section('title', 'Business Solutions | ' . ($siteSettings['site_name'] ?? 'Livenet Solutions'))
@section('meta_description', 'Business communications solutions: VoIP, PBX, cloud collaboration, and secure data transmission. Optimize productivity and streamline operations.')

@section('content')
@php
    $siteName = $siteSettings['site_name'] ?? 'Livenet Solutions';
    $phone = $siteSettings['phone'] ?? '+254 712 104 104';
    $phoneTel = 'tel:' . preg_replace('/\D/', '', $phone);
@endphp

{{-- Hero --}}
<section class="slider-two" id="top">
    <div class="swiper_carousel swiper-container" data-swiper='{"spaceBetween":0,"slidesPerView":1,"autoplay":{"delay":"6000"}}'>
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="slider-two_image" style="background-image: url({{ asset('bg-2.jpg') }});"></div>
                <div class="slider-two_pattern" style="background-image: url({{ asset('images/main-slider/slider-two_pattern.png') }})"></div>
                <div class="auto-container">
                    <div class="slider-two_content-column">
                        <div class="slider-two_content-inner">
                            <div class="slider-two_title">{{ $siteName }} Business Communications Solutions</div>
                            <h1 class="slider-two_heading">Transforming <br> Business Communications</h1>
                            <div class="slider-one_phone" style="margin-top: 30px;">
                                <div class="slider-one_phone-icon"><i class="fa fa-phone"></i></div>
                                Give us a call <br>
                                <a href="{{ $phoneTel }}">{{ $phone }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Business Communications made easy --}}
<section class="category-one">
    <div class="auto-container">
        <div class="row clearfix">
            <div class="category-one_content-column col-lg-6 col-md-12 col-sm-12">
                <div class="category-one_content-outer">
                    <div class="sec-title">
                        <div class="sec-title_title tx-split-text split-in-up">Business Communications Solutions</div>
                        <h2 class="sec-title_heading tx-split-text split-in-up">Business Communications <br> made easy</h2>
                        <div class="sec-title_text tx-split-text">
                            Our comprehensive suite of business communications solutions includes VoIP services, cloud-based collaboration tools, and secure data transmission solutions. We empower businesses to optimize productivity and streamline operations.
                        </div>
                    </div>
                    <div class="inverse-one_phone">
                        <div class="inverse-one_phone-icon"><i class="fa fa-phone"></i></div>
                        Give us a call <br>
                        <a href="{{ $phoneTel }}">{{ $phone }}</a>
                    </div>
                </div>
            </div>
            <div class="category-one_feature-column col-lg-6 col-md-12 col-sm-12">
                <div class="category-one_feature-outer">
                    <div class="row clearfix">
                        <div class="category-one_feature col-lg-6 col-md-6 col-sm-6">
                            <div class="category-one_feature-inner">
                                <a href="{{ $phoneTel }}" class="category-one_feature-link"></a>
                                <div class="category-one_feature-icon flaticon-phone-call"></div>
                                <h6 class="category-one_feature-heading">VoIP call services</h6>
                            </div>
                        </div>
                        <div class="category-one_feature col-lg-6 col-md-6 col-sm-6">
                            <div class="category-one_feature-inner">
                                <a href="{{ route('contact') }}" class="category-one_feature-link"></a>
                                <div class="category-one_feature-icon flaticon-wifi-1"></div>
                                <h6 class="category-one_feature-heading">Private Branch Exchange</h6>
                            </div>
                        </div>
                        <div class="category-one_feature col-lg-6 col-md-6 col-sm-6">
                            <div class="category-one_feature-inner">
                                <a href="{{ route('contact') }}" class="category-one_feature-link"></a>
                                <div class="category-one_feature-icon flaticon-planet-earth"></div>
                                <h6 class="category-one_feature-heading">Cloud collaboration</h6>
                            </div>
                        </div>
                        <div class="category-one_feature col-lg-6 col-md-6 col-sm-6">
                            <div class="category-one_feature-inner">
                                <a href="{{ route('contact') }}" class="category-one_feature-link"></a>
                                <div class="category-one_feature-icon flaticon-security"></div>
                                <h6 class="category-one_feature-heading">Secure data transmission</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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

{{-- CTA --}}
<section class="py-5" style="background-color: var(--color-two, #0a2463);">
    <div class="auto-container text-center">
        <h2 class="sec-title_heading light" style="color: #fff; margin-bottom: 24px;">Ready to Transform Your Business Communications?</h2>
        <a href="{{ route('contact') }}" class="btn-style-one theme-btn js-open-apply-modal">
            <div class="btn-wrap">
                <span class="text-one">Get in touch</span>
                <span class="text-two">Get in touch</span>
            </div>
        </a>
    </div>
</section>
@endsection

@push('styles')
<style>
.slider-two .slider-two_text,
.slider-two .slider-two_button-box { opacity: 1; transform: none; }
</style>
@endpush
