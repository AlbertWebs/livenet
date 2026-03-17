@extends('layouts.app')

@section('title', ($siteSettings['seo_meta_title'] ?? null) ?: (($siteSettings['site_name'] ?? 'Livenet Solutions') . ' | Fast, Reliable Home & Business Internet'))
@section('meta_description', $siteSettings['seo_meta_description'] ?? 'Fast, reliable internet for home and business. High-speed fiber, 24/7 support.')

@section('content')
@push('styles')
<style>
.service-one .service-block_one-inner {
    border: 1px solid rgba(0, 0, 0, 0.06);
}
</style>
@endpush
<section class="slider-one" id="home">
    <div class="swiper_carousel swiper-container" data-swiper='{"spaceBetween":0,"slidesPerView":1,"navigation":{"nextEl":".main-slider_button-next","prevEl":".main-slider_button-prev","clickable":"true"},"pagination":{"el":".main-slider_pagination","clickable":"true"},"autoplay":{"delay":"6000"},"breakpoints":{"320":{"slidesPerView":1,"spaceBetween":0},"480":{"slidesPerView":1,"spaceBetween":0},"640":{"slidesPerView":1,"spaceBetween":0}}}'>
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="slider-one_image" style="background-image: url({{ asset('images/main-slider/1.jpg') }})"></div>
                <div class="auto-container">
                    <div class="slider-one_content-column">
                        <div class="slider-one_content-inner">
                            <div class="slider-one_title">Home Internet</div>
                            <h1 class="slider-one_heading">Do not suffer the buffer.</h1>
                            <div class="slider-one_text">With our ultra fast internet connection you can enjoy your streamings with no interruptions.</div>
                            <div class="slider-one_button-box d-flex align-items-center flex-wrap">
                                <a class="btn-style-one theme-btn" href="{{ route('home-internet') }}">
                                    <div class="btn-wrap"><span class="text-one">Discover More</span><span class="text-two">Discover More</span></div>
                                </a>
                                <div class="slider-one_phone">
                                    <div class="slider-one_phone-icon"><i class="fa fa-phone"></i></div>
                                    Give us a call <br>
                                    <a href="tel:{{ preg_replace('/\D/', '', $siteSettings['phone'] ?? '254712104104') }}">{{ $siteSettings['phone'] ?? '+254 712 104 104' }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="slider-one_image" style="background-image: url({{ asset('images/main-slider/1.jpg') }})"></div>
                <div class="auto-container">
                    <div class="slider-one_content-column">
                        <div class="slider-one_content-inner">
                            <div class="slider-one_title">Business Internet</div>
                            <h1 class="slider-one_heading">Your Trusted Business Partner</h1>
                            <div class="slider-one_text">Dedicated bandwidth, SLA-backed uptime, and priority support so your business stays online.</div>
                            <div class="slider-one_button-box d-flex align-items-center flex-wrap">
                                <a class="btn-style-one theme-btn" href="{{ route('business-internet') }}">
                                    <div class="btn-wrap"><span class="text-one">Discover More</span><span class="text-two">Discover More</span></div>
                                </a>
                                <div class="slider-one_phone">
                                    <div class="slider-one_phone-icon"><i class="fa fa-phone"></i></div>
                                    Give us a call <br>
                                    <a href="tel:{{ preg_replace('/\D/', '', $siteSettings['phone'] ?? '254712104104') }}">{{ $siteSettings['phone'] ?? '+254 712 104 104' }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="swiper-pagination"></div>
        <div class="main-slider_button-prev fas fa-arrow-left fa-fw"></div>
        <div class="main-slider_button-next fas fa-arrow-right fa-fw"></div>
    </div>
</section>

<section class="service-one">
    <div class="auto-container">
        <div class="row g-0">
            <div class="service-block_one col-lg-4 col-md-6 col-sm-12">
                <div class="service-block_one-inner">
                    <div class="service-block_one-upper">
                        <div class="service-block_one-icon flaticon-cinema"></div>
                        <h4 class="service-block_one-heading"><a href="{{ route('home-internet') }}">Home <br> Internet</a></h4>
                    </div>
                    <div class="service-block_one-text">Fast home internet for streaming, gaming, and working from home with minimal interruptions.</div>
                    <a class="service-block_one-more" href="{{ route('home-internet') }}">Get Service</a>
                </div>
            </div>
            <div class="service-block_one col-lg-4 col-md-6 col-sm-12">
                <div class="service-block_one-inner">
                    <div class="service-block_one-upper">
                        <div class="service-block_one-icon flaticon-wifi-router-1"></div>
                        <h4 class="service-block_one-heading"><a href="{{ route('our-coverage') }}">Our <br> Coverage</a></h4>
                    </div>
                    <div class="service-block_one-text">Check our coverage areas and see if we can connect you.</div>
                    <a class="service-block_one-more" href="{{ route('our-coverage') }}">Get Service</a>
                </div>
            </div>
            <div class="service-block_one col-lg-4 col-md-6 col-sm-12">
                <div class="service-block_one-inner">
                    <div class="service-block_one-upper">
                        <div class="service-block_one-icon flaticon-smartphone"></div>
                        <h4 class="service-block_one-heading"><a href="{{ route('business-internet') }}">Business <br> Internet</a></h4>
                    </div>
                    <div class="service-block_one-text">Dedicated bandwidth and reliable communication for your business.</div>
                    <a class="service-block_one-more" href="{{ route('business-internet') }}">Get Service</a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="about-one" id="about">
    <div class="auto-container">
        <div class="row clearfix">
            <div class="about-one_image-column col-lg-6 col-md-12 col-sm-12">
                <div class="about-one_image-outer">
                    <div class="about-one_pattern" style="background-image: url({{ asset('images/background/pattern-1.png') }})"></div>
                    <div class="about-one_image wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                        <img src="{{ !empty($siteSettings['about_section_image_1'] ?? null) ? asset('storage/' . $siteSettings['about_section_image_1']) : asset('images/resource/about-1.jpg') }}" alt="" />
                        <div class="about-one_color-layer"></div>
                        <div class="about-one_color-layer-two"></div>
                    </div>
                    <div class="about-one_image-two" data-parallax='{"y" : 60}'>
                        <img src="{{ !empty($siteSettings['about_section_image_2'] ?? null) ? asset('storage/' . $siteSettings['about_section_image_2']) : asset('images/ab-2.jpg') }}" alt="" />
                    </div>
                </div>
            </div>
            <div class="about-one_content-column col-lg-6 col-md-12 col-sm-12">
                <div class="about-one_content-outer">
                    <div class="sec-title">
                        <div class="sec-title_title tx-split-text split-in-right">WHO WE ARE</div>
                        <h2 class="sec-title_heading tx-split-text split-in-right">Get internet & communication <br>service from us</h2>
                    </div>
                    <div class="about-one_bold-text">
                        @if(!empty(trim($siteSettings['home_intro_text'] ?? '')))
                            @foreach(preg_split('/\r\n|\r|\n/', trim($siteSettings['home_intro_text']), -1, PREG_SPLIT_NO_EMPTY) as $para)
                                {{ $para }}@if(!$loop->last) @endif
                            @endforeach
                        @else
                            {{ $siteSettings['site_name'] ?? 'Livenet Solutions' }} delivers fast, reliable internet for homes and businesses. We build and maintain our own network for consistent speeds and local support.
                        @endif
                    </div>
                    <div class="about-one_feature">
                        <div class="about-one_feature-icon flaticon-cyber-security"></div>
                        <strong>24/7 Support</strong>
                        We are committed to serving and supporting our customers 24/7
                    </div>
                    <ul class="about-one_lists">
                        <li><i class="arrow fa fa-arrow-circle-right"></i> Home Internet Connection</li>
                        <li><i class="arrow fa fa-arrow-circle-right"></i> Business Internet</li>
                        <li><i class="arrow fa fa-arrow-circle-right"></i> Reliable Support</li>
                    </ul>
                    <div class="inverse-one_phone">
                        <div class="inverse-one_phone-icon"><i class="fa fa-phone"></i></div>
                        Give us a call <br>
                        <a href="tel:{{ preg_replace('/\D/', '', $siteSettings['phone'] ?? '254712104104') }}">{{ $siteSettings['phone'] ?? '+254 712 104 104' }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="benefit-one" style="background-image: url({{ asset('images/background/benefit-pattern.png') }})">
    <div class="auto-container">
        <div class="sec-title">
            <div class="d-flex justify-content-between align-items-center flex-wrap">
                <div class="left-box">
                    <div class="sec-title_title">OUR BENEFITS</div>
                    <h2 class="sec-title_heading">A few great reasons to choose <br>{{ $siteSettings['site_name'] ?? 'Livenet Solutions' }}</h2>
                </div>
                <div class="right-box">
                    <div class="sec-title_text">We focus on speed, reliability, and support so you can focus on what matters.</div>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="benefit-block_one col-lg-3 col-md-6 col-sm-6">
                <div class="benefit-block_one-inner">
                    <div class="benefit-block_one-pattern" style="background-image: url({{ asset('images/background/benefit-block_pattern.png') }})"></div>
                    <div class="benefit-block_one-color"></div>
                    <div class="benefit-block_one-icon flaticon-installation"></div>
                    <h4 class="benefit-block_one-heading"><a href="{{ route('home-internet') }}">Low <br> Latency</a></h4>
                </div>
            </div>
            <div class="benefit-block_one col-lg-3 col-md-6 col-sm-6">
                <div class="benefit-block_one-inner">
                    <div class="benefit-block_one-pattern" style="background-image: url({{ asset('images/background/benefit-block_pattern.png') }})"></div>
                    <div class="benefit-block_one-color"></div>
                    <div class="benefit-block_one-icon flaticon-high-speed"></div>
                    <h4 class="benefit-block_one-heading"><a href="{{ route('our-coverage') }}">Ultra Fast <br> Connect</a></h4>
                </div>
            </div>
            <div class="benefit-block_one col-lg-3 col-md-6 col-sm-6">
                <div class="benefit-block_one-inner">
                    <div class="benefit-block_one-pattern" style="background-image: url({{ asset('images/background/benefit-block_pattern.png') }})"></div>
                    <div class="benefit-block_one-color"></div>
                    <div class="benefit-block_one-icon flaticon-smart-tv"></div>
                    <h4 class="benefit-block_one-heading"><a href="{{ route('business-internet') }}">Business <br> Solutions</a></h4>
                </div>
            </div>
            <div class="benefit-block_one col-lg-3 col-md-6 col-sm-6">
                <div class="benefit-block_one-inner">
                    <div class="benefit-block_one-pattern" style="background-image: url({{ asset('images/background/benefit-block_pattern.png') }})"></div>
                    <div class="benefit-block_one-color"></div>
                    <div class="benefit-block_one-icon flaticon-technical-support"></div>
                    <h4 class="benefit-block_one-heading"><a href="{{ route('contact') }}">Great Fast <br> Support 24/7</a></h4>
                </div>
            </div>
        </div>
    </div>
</section>



@if(isset($homePlans) && $homePlans->isNotEmpty() || isset($businessPlans) && $businessPlans->isNotEmpty())
<section class="service-one packages-section packages-section--elegant" style="margin-top: 0 !important; padding-top: 5rem; padding-bottom: 5rem; background: linear-gradient(180deg, rgba(2, 101, 203, 0.04) 0%, rgba(2, 101, 203, 0.02) 50%, transparent 100%);">
    <div class="auto-container">
        <div class="sec-title text-center packages-head">
            <div class="sec-title_title packages-head__label">Our Plans</div>
            <h2 class="sec-title_heading packages-head__title">Internet Packages</h2>
            <div class="packages-head__line"></div>
            <p class="sec-title_text packages-head__text">Choose the right speed for your home or business. Transparent pricing, no hidden fees.</p>
        </div>

        @if(isset($homePlans) && $homePlans->isNotEmpty())
        <div class="packages-subsection" style="margin-bottom: 2.5rem;">
            <h3 class="packages-subtitle packages-subtitle--home">Home Internet</h3>
            <div class="row packages-row">
                @foreach($homePlans->take(3) as $plan)
                <div class="col-lg-4 col-md-6 col-sm-12 packages-col">
                    <div class="package-card">
                        <div class="package-card__body">
                            <h4 class="package-card__title">{{ $plan->name }}</h4>
                            <div class="package-card__price">{{ $plan->currency ?? 'KES' }} {{ number_format($plan->price) }}<span class="package-card__period">/mo</span></div>
                            @if($plan->speed)<p class="package-card__speed">{{ $plan->speed }}</p>@endif
                            @if(!empty($plan->features_list))
                            <ul class="package-card__features">
                                @foreach(array_slice(is_array($plan->features_list) ? $plan->features_list : [], 0, 3) as $feature)<li>{{ $feature }}</li>@endforeach
                            </ul>
                            @endif
                        </div>
                        <div class="package-card__footer">
                            <a href="#" class="package-card__cta js-open-apply-modal">Apply for connection</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <p class="packages-view-all"><a href="{{ route('home-internet') }}">View all home internet plans</a></p>
        </div>
        @endif

        @if(isset($businessPlans) && $businessPlans->isNotEmpty())
        <div class="packages-subsection">
            <h3 class="packages-subtitle packages-subtitle--business">Business Internet</h3>
            <div class="row packages-row">
                @foreach($businessPlans->take(3) as $plan)
                <div class="col-lg-4 col-md-6 col-sm-12 packages-col">
                    <div class="package-card">
                        <div class="package-card__body">
                            <h4 class="package-card__title">{{ $plan->name }}</h4>
                            <div class="package-card__price">{{ $plan->currency ?? 'KES' }} {{ number_format($plan->price) }}<span class="package-card__period">/mo</span></div>
                            @if($plan->speed)<p class="package-card__speed">{{ $plan->speed }}</p>@endif
                            @if(!empty($plan->features_list))
                            <ul class="package-card__features">
                                @foreach(array_slice(is_array($plan->features_list) ? $plan->features_list : [], 0, 3) as $feature)<li>{{ $feature }}</li>@endforeach
                            </ul>
                            @endif
                        </div>
                        <div class="package-card__footer">
                            <a href="#" class="package-card__cta js-open-apply-modal">Apply for connection</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <p class="packages-view-all packages-view-all--last" style="margin-bottom: 0; padding-bottom: 2rem;"><a href="{{ route('business-internet') }}">View all business internet plans</a></p>
        </div>
        @endif
    </div>
</section>

<!--  -->
<section class="counter-one" style="padding-bottom: 6rem;">
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


@push('styles')
<style>
/* Section background & heading */
.packages-section--elegant .packages-head__label {
    font-size: 0.75rem;
    letter-spacing: 0.2em;
    text-transform: uppercase;
    color: var(--main-color, #338edf);
    margin-bottom: 0.35rem;
    font-weight: 600;
}
.packages-section--elegant .packages-head__title {
    margin-bottom: 0.5rem;
    color: #111827;
    font-weight: 700;
}
.packages-section--elegant .packages-head__line {
    width: 48px;
    height: 3px;
    margin: 0 auto 0.85rem;
    background: linear-gradient(90deg, var(--main-color, #338edf), rgba(51, 142, 223, 0.5));
    border-radius: 2px;
}
.packages-section--elegant .packages-head__text {
    max-width: 520px;
    margin: 0 auto 2rem;
    color: #6b7280;
    font-size: 1rem;
    line-height: 1.6;
}
.packages-section--elegant .packages-subtitle {
    font-size: 0.8125rem;
    letter-spacing: 0.15em;
    text-transform: uppercase;
    margin-bottom: 1rem;
    font-weight: 600;
    padding-bottom: 0.35rem;
    border-bottom: 2px solid rgba(2, 101, 203, 0.2);
    display: inline-block;
}
.packages-section--elegant .packages-subtitle--home,
.packages-section--elegant .packages-subtitle--business {
    color: var(--main-color, #338edf);
}

/* Grid */
.packages-section--elegant .packages-row {
    margin-left: -0.5rem;
    margin-right: -0.5rem;
}
.packages-section--elegant .packages-col {
    padding-left: 0.5rem;
    padding-right: 0.5rem;
    margin-bottom: 1rem;
}
@media (min-width: 768px) {
    .packages-section--elegant .packages-row { margin-left: -0.65rem; margin-right: -0.65rem; }
    .packages-section--elegant .packages-col { padding-left: 0.65rem; padding-right: 0.65rem; margin-bottom: 1.25rem; }
}
@media (min-width: 992px) {
    .packages-section--elegant .packages-row { margin-left: -0.75rem; margin-right: -0.75rem; }
    .packages-section--elegant .packages-col { padding-left: 0.75rem; padding-right: 0.75rem; margin-bottom: 1.25rem; }
}

/* Cards */
.packages-section--elegant .package-card {
    background: #fff;
    border-radius: 14px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.06), 0 8px 24px rgba(2, 101, 203, 0.06);
    border: 1px solid rgba(2, 101, 203, 0.08);
    overflow: hidden;
    transition: box-shadow 0.3s ease, transform 0.3s ease, border-color 0.3s ease;
    height: 100%;
    display: flex;
    flex-direction: column;
    position: relative;
}
.packages-section--elegant .package-card::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 3px;
    background: linear-gradient(90deg, var(--main-color, #338edf), rgba(51, 142, 223, 0.6));
    opacity: 0.9;
}
.packages-section--elegant .package-card:hover {
    box-shadow: 0 8px 24px rgba(0,0,0,0.08), 0 16px 40px rgba(2, 101, 203, 0.1);
    transform: translateY(-3px);
    border-color: rgba(2, 101, 203, 0.18);
}
.packages-section--elegant .package-card__body {
    padding: 1.2rem 1.25rem;
    flex: 1;
    padding-top: 1.35rem;
}
.packages-section--elegant .package-card__title {
    font-size: 1.25rem;
    font-weight: 700;
    color: #111827;
    margin: 0 0 0.5rem;
    letter-spacing: -0.02em;
}
.packages-section--elegant .package-card__price {
    font-size: 1.5rem;
    font-weight: 700;
    color: var(--main-color, #338edf);
    margin-bottom: 0.25rem;
    letter-spacing: -0.02em;
}
.packages-section--elegant .package-card__period {
    font-size: 0.875rem;
    font-weight: 500;
    color: #6b7280;
}
.packages-section--elegant .package-card__speed {
    font-size: 0.875rem;
    color: #6b7280;
    margin: 0 0 0.65rem;
    line-height: 1.4;
}
.packages-section--elegant .package-card__features {
    list-style: none;
    padding: 0;
    margin: 0;
    font-size: 0.875rem;
    color: #4b5563;
    line-height: 1.6;
}
.packages-section--elegant .package-card__features li {
    padding: 0.2rem 0;
    padding-left: 1.25rem;
    position: relative;
}
.packages-section--elegant .package-card__features li::before {
    content: "";
    position: absolute;
    left: 0;
    top: 0.6em;
    width: 5px;
    height: 5px;
    border-radius: 50%;
    background: var(--main-color, #338edf);
}
.packages-section--elegant .package-card__footer {
    padding: 0.75rem 1.25rem;
    border-top: 1px solid rgba(2, 101, 203, 0.08);
    background: linear-gradient(180deg, rgba(2, 101, 203, 0.04) 0%, rgba(2, 101, 203, 0.02) 100%);
}
.packages-section--elegant .package-card__cta {
    display: inline-block;
    font-size: 0.875rem;
    font-weight: 600;
    color: var(--main-color, #338edf);
    text-decoration: none;
    transition: color 0.2s ease, padding-left 0.2s ease;
}
.packages-section--elegant .package-card__cta:hover {
    color: #2a7bc9;
    padding-left: 4px;
}
.packages-section--elegant .packages-view-all {
    text-align: center;
    margin-top: 1.1rem;
    margin-bottom: 0;
}
.packages-section--elegant .packages-view-all a {
    font-size: 0.9375rem;
    font-weight: 600;
    color: var(--main-color, #338edf);
    text-decoration: none;
    transition: color 0.2s ease, letter-spacing 0.2s ease;
}
.packages-section--elegant .packages-view-all a:hover {
    color: #2a7bc9;
    letter-spacing: 0.02em;
}
</style>
@endpush
@endif
@endsection
