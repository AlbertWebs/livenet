@extends('layouts.app')

@section('title', 'Home Internet Plans | Livenet Solutions – High-Speed Residential Internet')
@section('meta_description', 'Explore Livenet Solutions home internet plans. Fast, reliable residential internet with no data caps. Stream, game, and work from home with confidence.')

@section('jsonld')
@verbatim 
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "BreadcrumbList",
  "itemListElement": [
    { "@type": "ListItem", "position": 1, "name": "Home", "item": "{{ url('/') }}" },
    { "@type": "ListItem", "position": 2, "name": "Home Internet", "item": "{{ route('home-internet') }}" }
  ]
}
</script>
@endverbatim
@endsection

@section('content')
<section class="page-hero scroll-animate">
  <div class="container">
    <nav class="breadcrumb" aria-label="Breadcrumb">
      <a href="{{ route('home') }}">Home</a> / Home Internet
    </nav>
    <h1>Home Internet</h1>
    <p>High-speed internet for streaming, gaming, and working from home. No data caps, no surprises.</p>
  </div>
</section>

<section class="section scroll-animate">
  <div class="container">
    <h2 class="section-title">Plans Built for How You Use the Internet</h2>
    <p class="section-subtitle">Choose the speed that fits your household. All plans include free equipment and 24/7 support.</p>
    <div class="plans-grid">
      <div class="plan-card">
        <h3>Starter</h3>
        <p class="price-tag">KES 4,999<small>/mo</small></p>
        <ul>
          <li>Up to 100 Mbps download</li>
          <li>Unlimited data</li>
          <li>Free modem rental</li>
          <li>Email & chat support</li>
        </ul>
        <a href="{{ route('contact') }}#apply" class="btn btn-secondary">Apply for Connection</a>
      </div>
      <div class="plan-card featured">
        <h3>Essential</h3>
        <p class="price-tag">KES 6,999<small>/mo</small></p>
        <ul>
          <li>Up to 300 Mbps download</li>
          <li>Unlimited data</li>
          <li>Free modem + WiFi router</li>
          <li>24/7 phone & chat support</li>
        </ul>
        <a href="{{ route('contact') }}#apply" class="btn btn-primary">Apply for Connection</a>
      </div>
      <div class="plan-card">
        <h3>Premium</h3>
        <p class="price-tag">KES 9,999<small>/mo</small></p>
        <ul>
          <li>Up to 1 Gbps download</li>
          <li>Unlimited data</li>
          <li>Premium WiFi equipment</li>
          <li>Priority 24/7 support</li>
        </ul>
        <a href="{{ route('contact') }}#apply" class="btn btn-secondary">Apply for Connection</a>
      </div>
    </div>
  </div>
</section>

<section class="section section-alt scroll-animate">
  <div class="container">
    <h2 class="section-title">Benefits of Livenet Home Internet</h2>
    <div class="feature-grid">
      <div class="feature-card">
        <div class="icon" aria-hidden="true">📶</div>
        <h3>Consistent Speeds</h3>
        <p>We deliver the speeds we advertise. No throttling during peak hours.</p>
      </div>
      <div class="feature-card">
        <div class="icon" aria-hidden="true">♾️</div>
        <h3>No Data Caps</h3>
        <p>Stream, game, and download without worrying about overage fees.</p>
      </div>
      <div class="feature-card">
        <div class="icon" aria-hidden="true">🔧</div>
        <h3>Free Equipment</h3>
        <p>Modem and router included—no extra monthly fees for standard equipment.</p>
      </div>
      <div class="feature-card">
        <div class="icon" aria-hidden="true">📞</div>
        <h3>Real Support</h3>
        <p>24/7 support from real people when you need help.</p>
      </div>
    </div>
  </div>
</section>

<section class="cta-strip scroll-animate">
  <div class="container">
    <h2>Get Connected at Home</h2>
    <p>Apply for connection and we'll get you set up with fast, reliable home internet.</p>
    <a href="{{ route('contact') }}#apply" class="btn btn-secondary">Apply for Connection</a>
  </div>
</section>
@endsection
