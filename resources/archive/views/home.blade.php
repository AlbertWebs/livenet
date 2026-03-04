@extends('layouts.app')

@php
  $siteName = $siteSettings['site_name'] ?? 'Livenet Solutions';
  $seoTitle = $siteSettings['seo_meta_title'] ?? $siteName . ' | Fast, Reliable Home & Business Internet';
  $seoDesc = $siteSettings['seo_meta_description'] ?? 'Livenet Solutions delivers fast, reliable internet for home and business. Get connected with our high-speed fiber plans and dedicated support.';
  $ogDesc = $siteSettings['seo_meta_description'] ?? 'Fast, reliable internet for home and business. High-speed fiber, 24/7 support, no data caps.';
  $ogImage = !empty($siteSettings['og_image']) ? asset('storage/' . $siteSettings['og_image']) : (!empty($siteSettings['logo']) ? asset('storage/' . $siteSettings['logo']) : asset('logo.png'));
  $ogImageUrl = url($ogImage);
  $phone = $siteSettings['phone'] ?? '+254712104104';
  $email = $siteSettings['contact_email'] ?? 'info@livenetsolutions.com';
  $address = $siteSettings['address'] ?? 'Nairobi, Kenya';
@endphp

@section('title', $seoTitle)
@section('meta_description', $seoDesc)
@section('meta_extra')
  <meta name="robots" content="index, follow">
  <meta name="keywords" content="internet provider Kenya, high-speed internet Nairobi, home internet, business internet, fiber internet, broadband, Livenet Solutions, reliable internet">
@endsection

@section('canonical', url('/'))

@section('og_title', $seoTitle)
@section('og_description', $ogDesc)
@section('og_image', $ogImageUrl)
@section('og_image_alt', $siteName . ' – Fast, reliable internet for home and business')
@section('og_site_name', $siteName)

@section('jsonld')
@verbatim
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Organization",
  "name": {!! json_encode($siteName) !!},
  "url": {!! json_encode(url('/')) !!},
  "logo": {!! json_encode(url(!empty($siteSettings['logo']) ? asset('storage/' . $siteSettings['logo']) : asset('logo.png'))) !!},
  "description": {!! json_encode($seoDesc) !!},
  "contactPoint": {
    "@type": "ContactPoint",
    "telephone": {!! json_encode(preg_replace('/\s+/', '', $phone)) !!},
    "contactType": "customer service",
    "email": {!! json_encode($email) !!},
    "areaServed": "KE"
  },
  "address": {
    "@type": "PostalAddress",
    "addressLocality": {!! json_encode($address) !!},
    "addressCountry": "KE"
  }
}
</script>
@endverbatim
@endsection

@section('content')
<div class="page-home">
<section class="hero hero--vibrant hero--video">
  <video class="hero__video" autoplay muted loop playsinline aria-hidden="true">
    <source src="{{ asset('7140931-hd_1920_1080_24fps.mp4') }}" type="video/mp4">
  </video>
  <div class="hero__video-overlay" aria-hidden="true"></div>
  <div class="hero__glow hero__glow--1" aria-hidden="true"></div>
  <div class="hero__glow hero__glow--2" aria-hidden="true"></div>
  <div class="hero__glow hero__glow--3" aria-hidden="true"></div>
  <div class="container">
    <p class="hero__badge">High-Speed Internet</p>
    <h1 class="hero__title">Fast, Reliable Internet Built for You</h1>
    <p class="subheading">Livenet Solutions delivers high-speed home and business internet with 24/7 support. Stream, work, and stay connected without the buffer.</p>
    <div class="cta-group">
      <a href="{{ route('contact') }}#apply" class="btn btn-primary btn-hero btn-hero--glow">Apply for Connection</a>
      <a href="#features" class="btn btn-secondary btn-hero">Learn More</a>
    </div>
  </div>
  <a href="#intro-spotlight" class="hero__scroll-indicator" aria-label="Scroll to introduction">
    <svg class="hero__scroll-arrow" viewBox="0 0 24 32" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
      <path d="M12 2v18M5 20l7 7 7-7"/>
    </svg>
  </a>
</section>

<section class="intro-spotlight scroll-animate" id="intro-spotlight">
  <div class="container">
    <div class="intro-spotlight__inner">
      <div class="intro-spotlight__content">
        <p class="intro-spotlight__label">About us</p>
        <h2 class="intro-spotlight__title">Livenet Solutions</h2>
        <div class="intro-spotlight__text">
          @if(!empty(trim($siteSettings['home_intro_text'] ?? '')))
            @foreach(preg_split('/\r\n|\r|\n/', trim($siteSettings['home_intro_text']), -1, PREG_SPLIT_NO_EMPTY) as $para)
              <p>{{ $para }}</p>
            @endforeach
          @else
            <p>Livenet Solutions is a leading internet service provider in Nairobi, delivering fast, reliable connectivity for homes and businesses. We build and maintain our own network so we can offer consistent speeds, transparent pricing, and local support when you need it.</p>
          @endif
        </div>
        <a href="#packages" class="intro-spotlight__cta">Explore packages <span aria-hidden="true">→</span></a>
      </div>
      <div class="intro-spotlight__media">
        @if(!empty($siteSettings['home_decor_image_1']))
          <div class="intro-spotlight__image-wrap">
            <img src="{{ asset('storage/' . $siteSettings['home_decor_image_1']) }}" alt="" width="560" height="360" loading="lazy" decoding="async">
          </div>
        @else
          <div class="intro-spotlight__image-wrap intro-spotlight__image-wrap--placeholder" aria-hidden="true">
            <span>Decorative image</span>
          </div>
        @endif
      </div>
    </div>
  </div>
</section>

@php
  $featuresSection = $homeSections['features'] ?? null;
  $servicesImage = ($featuresSection && !empty($featuresSection->image)) ? $featuresSection->image : ($siteSettings['home_services_section_image'] ?? null);
@endphp
<section class="section section-alt section--vibrant scroll-animate" id="features">
  <div class="container">
    <h2 class="section-title section-title--gradient">{{ $featuresSection && trim($featuresSection->title ?? '') !== '' ? $featuresSection->title : 'Internet Services for Home & Business' }}</h2>
    <p class="section-subtitle">{{ $featuresSection && trim($featuresSection->subtitle ?? '') !== '' ? $featuresSection->subtitle : 'Whether you need seamless streaming at home or enterprise-grade connectivity for your business, we have a plan that fits.' }}</p>
    <div class="services-with-image">
      <div class="services-cards">
        <div class="feature-card feature-card--vibrant">
          <div class="icon icon--vibrant" aria-hidden="true">🏠</div>
          <h3>Home Internet</h3>
          <p>High-speed fiber and cable plans for streaming, gaming, and working from home. No data caps, no surprises.</p>
          <a href="{{ route('home-internet') }}" class="feature-card__link">View plans <span class="arrow">→</span></a>
        </div>
        <div class="feature-card feature-card--vibrant">
          <div class="icon icon--vibrant" aria-hidden="true">🏢</div>
          <h3>Business Internet</h3>
          <p>Dedicated bandwidth, SLA-backed uptime, and priority support so your business stays online.</p>
          <a href="{{ route('business-internet') }}" class="feature-card__link">View plans <span class="arrow">→</span></a>
        </div>
      </div>
      <div class="services-image-wrap">
        @if(!empty($servicesImage))
          <img src="{{ asset('storage/' . $servicesImage) }}" alt="" class="services-image" width="600" height="400" loading="lazy" decoding="async">
        @else
          <div class="services-image services-image--placeholder" aria-hidden="true"><span>Image placeholder</span></div>
        @endif
      </div>
    </div>
  </div>
</section>

<section class="section section-alt section--vibrant scroll-animate" id="packages">
  <div class="container">
    <h2 class="section-title section-title--gradient">Internet Packages</h2>
    <p class="section-subtitle">Choose from our home and business plans. All packages include reliable connectivity and support.</p>

    <h3 class="packages-subtitle">Home Internet</h3>
    <div class="plans-grid plans-grid--home">
      @forelse($homePlans as $plan)
      <div class="plan-card plan-card--home {{ $plan->is_highlighted ? 'plan-card--featured' : '' }}">
        @if($plan->show_image ?? true)
          <div class="plan-card__image-wrap">
            @if($plan->image)
              <img src="{{ asset('storage/' . $plan->image) }}" alt="" class="plan-card__image" width="400" height="220" loading="lazy" decoding="async">
            @else
              <div class="plan-card__image plan-card__image--placeholder" aria-hidden="true"><span>Plan image</span></div>
            @endif
          </div>
        @endif
        @if($plan->badge)<span class="plan-card__badge">{{ $plan->badge }}</span>@endif
        <h3>{{ $plan->name }}</h3>
        <p class="price-tag">{{ $plan->currency }} {{ number_format($plan->price) }}<small>/mo</small></p>
        @if($plan->speed)<p class="plan-card__speed">{{ $plan->speed }}</p>@endif
        <ul>
          @foreach($plan->features_list as $feature)
          <li>{{ $feature }}</li>
          @endforeach
        </ul>
        <a href="#" class="btn {{ $plan->is_highlighted ? 'btn-primary' : 'btn-secondary' }} js-open-apply-modal">Apply</a>
      </div>
      @empty
      <p class="packages-empty">Home plans coming soon. <a href="{{ route('contact') }}#apply">Contact us</a> for details.</p>
      @endforelse
    </div>
    <p class="packages-link"><a href="{{ route('home-internet') }}">View all home internet plans →</a></p>

    <h3 class="packages-subtitle">Business Internet</h3>
    <div class="plans-grid plans-grid--home">
      @forelse($businessPlans as $plan)
      <div class="plan-card plan-card--business {{ $plan->is_highlighted ? 'plan-card--featured' : '' }}">
        @if($plan->show_image ?? true)
          <div class="plan-card__image-wrap">
            @if($plan->image)
              <img src="{{ asset('storage/' . $plan->image) }}" alt="" class="plan-card__image" width="400" height="220" loading="lazy" decoding="async">
            @else
              <div class="plan-card__image plan-card__image--placeholder" aria-hidden="true"><span>Plan image</span></div>
            @endif
          </div>
        @endif
        @if($plan->badge)<span class="plan-card__badge">{{ $plan->badge }}</span>@endif
        <h3>{{ $plan->name }}</h3>
        <p class="price-tag">{{ $plan->currency }} {{ number_format($plan->price) }}<small>/mo</small></p>
        @if($plan->speed)<p class="plan-card__speed">{{ $plan->speed }}</p>@endif
        <ul>
          @foreach($plan->features_list as $feature)
          <li>{{ $feature }}</li>
          @endforeach
        </ul>
        <a href="#" class="btn {{ $plan->is_highlighted ? 'btn-primary' : 'btn-secondary' }} js-open-apply-modal">Apply</a>
      </div>
      @empty
      <p class="packages-empty">Business plans coming soon. <a href="{{ route('contact') }}#apply">Contact us</a> for details.</p>
      @endforelse
    </div>
    <p class="packages-link"><a href="{{ route('business-internet') }}">View all business internet plans →</a></p>
  </div>
</section>

<section class="section section--vibrant scroll-animate">
  <div class="container">
    <h2 class="section-title section-title--gradient">Why Choose Livenet Solutions</h2>
    <p class="section-subtitle">We focus on speed, reliability, and support so you can focus on what matters.</p>
    <div class="feature-grid feature-grid--three">
      <div class="feature-card feature-card--vibrant">
        <div class="icon icon--vibrant icon--fast" aria-hidden="true">⚡</div>
        <h3>Fast & Reliable</h3>
        <p>Our network is built for speed. If your connection is slow or down, you're losing time and money—we keep you online.</p>
      </div>
      <div class="feature-card feature-card--vibrant">
        <div class="icon icon--vibrant icon--secure" aria-hidden="true">🛡️</div>
        <h3>Secure & Stable</h3>
        <p>Enterprise-grade security and redundant links so your data and uptime are protected.</p>
      </div>
      <div class="feature-card feature-card--vibrant">
        <div class="icon icon--vibrant icon--support" aria-hidden="true">📞</div>
        <h3>24/7 Expert Support</h3>
        <p>Real people, real help. Our support team is available around the clock when you need us.</p>
      </div>
    </div>
  </div>
</section>

<section class="section testimonials testimonials--vibrant scroll-animate">
  <div class="container">
    <h2 class="section-title section-title--gradient">What Our Customers Say</h2>
    <p class="section-subtitle">Thousands of homes and businesses trust Livenet Solutions for their internet.</p>
    <div class="testimonial-grid">
      <div class="testimonial-card testimonial-card--vibrant">
        <div class="testimonial-card__accent"></div>
        <p class="quote">"Switched to Livenet six months ago. Zero outages, and the speed is exactly what they promised. Best decision we made for our home office."</p>
        <p class="author">Sarah M.</p>
        <p class="role">Home customer, Nairobi</p>
      </div>
      <div class="testimonial-card testimonial-card--vibrant">
        <div class="testimonial-card__accent"></div>
        <p class="quote">"Our business runs on the internet. Livenet's SLA and dedicated support give us peace of mind. Highly recommend for any company."</p>
        <p class="author">James K.</p>
        <p class="role">IT Director, TechFlow Inc.</p>
      </div>
      <div class="testimonial-card testimonial-card--vibrant">
        <div class="testimonial-card__accent"></div>
        <p class="quote">"Fast installation, clear pricing, no hidden fees. Support actually answers the phone. Refreshing experience."</p>
        <p class="author">Maria L.</p>
        <p class="role">Small business owner</p>
      </div>
    </div>
    <div class="stats-row stats-row--vibrant">
      <div class="stat stat--vibrant"><span class="number">{{ $siteSettings['stat_1_number'] ?? '99.9%' }}</span><span class="label">{{ $siteSettings['stat_1_label'] ?? 'Uptime SLA' }}</span></div>
      <div class="stat stat--vibrant"><span class="number">{{ $siteSettings['stat_2_number'] ?? '50K+' }}</span><span class="label">{{ $siteSettings['stat_2_label'] ?? 'Happy Customers' }}</span></div>
      <div class="stat stat--vibrant"><span class="number">{{ $siteSettings['stat_3_number'] ?? '24/7' }}</span><span class="label">{{ $siteSettings['stat_3_label'] ?? 'Support' }}</span></div>
    </div>
  </div>
</section>

<section class="cta-strip cta-strip--vibrant scroll-animate">
  <div class="container">
    <h2>Ready to Get Connected?</h2>
    <p>Apply for connection today and enjoy fast, reliable internet at home or at work.</p>
    <a href="{{ route('contact') }}#apply" class="btn btn-secondary btn-cta-glow">Apply for Connection</a>
  </div>
</section>
</div>

@endsection
