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
    <p class="section-subtitle">Choose the speed that fits your household. All plans include reliable connectivity and support.</p>
    <div class="plans-grid">
      @forelse($homePlans as $plan)
      <div class="plan-card {{ $plan->is_highlighted ? 'featured' : '' }}">
        @if($plan->badge)<span class="plan-card__badge">{{ $plan->badge }}</span>@endif
        <h3>{{ $plan->name }}</h3>
        <p class="price-tag">{{ $plan->currency }} {{ number_format($plan->price) }}<small>/mo</small></p>
        @if($plan->speed)<p class="plan-card__speed">{{ $plan->speed }}</p>@endif
        <ul>
          @foreach($plan->features_list as $feature)
          <li>{{ $feature }}</li>
          @endforeach
        </ul>
        <a href="{{ route('contact') }}#apply" class="btn {{ $plan->is_highlighted ? 'btn-primary' : 'btn-secondary' }}">Apply for Connection</a>
      </div>
      @empty
      <p class="text-muted">Plans are being updated. Please check back soon or <a href="{{ route('contact') }}#apply">contact us</a>.</p>
      @endforelse
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
