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
<div class="page-home-internet">
  <section class="page-hero page-hero--vibrant scroll-animate">
    <div class="container">
      <nav class="breadcrumb" aria-label="Breadcrumb">
        <a href="{{ route('home') }}">Home</a><span class="breadcrumb__sep" aria-hidden="true">/</span> Home Internet
      </nav>
      <h1 class="page-hero__title">Home Internet</h1>
      <p class="page-hero__subtitle">High-speed internet for streaming, gaming, and working from home. No data caps, no surprises.</p>
    </div>
  </section>

  <section class="section section--vibrant section-alt scroll-animate">
    <div class="container">
      <h2 class="section-title section-title--gradient">Plans Built for How You Use the Internet</h2>
      <p class="section-subtitle">Choose the speed that fits your household. All plans include reliable connectivity and support.</p>
      <div class="plans-grid plans-grid--home">
        @forelse($homePlans as $plan)
        <div class="plan-card plan-card--home {{ $plan->is_highlighted ? 'plan-card--featured' : '' }}">
          @if($plan->show_image ?? true)
            <div class="plan-card__image-wrap">
              @if($plan->image ?? null)
                <img src="{{ asset('storage/' . $plan->image) }}" alt="" class="plan-card__image" width="400" height="220" loading="lazy" decoding="async">
              @else
                <div class="plan-card__image plan-card__image--placeholder" aria-hidden="true"><span>Plan image</span></div>
              @endif
            </div>
          @endif
          @if($plan->badge)<span class="plan-card__badge">{{ $plan->badge }}</span>@endif
          <h3>{{ $plan->name }}</h3>
          <p class="price-tag">{{ $plan->currency ?? 'KES' }} {{ number_format($plan->price) }}<small>/mo</small></p>
          @if($plan->speed)<p class="plan-card__speed">{{ $plan->speed }}</p>@endif
          <ul>
            @foreach($plan->features_list as $feature)
            <li>{{ $feature }}</li>
            @endforeach
          </ul>
          <a href="{{ route('contact') }}#apply" class="btn js-open-apply-modal {{ $plan->is_highlighted ? 'btn-primary' : 'btn-secondary' }}">Apply for Connection</a>
        </div>
        @empty
        <p class="packages-empty">Plans are being updated. Please check back soon or <a href="{{ route('contact') }}#apply">contact us</a>.</p>
        @endforelse
      </div>
    </div>
  </section>

  <section class="section section-alt section--vibrant scroll-animate">
    <div class="container">
      <h2 class="section-title section-title--gradient">Benefits of Livenet Home Internet</h2>
      <div class="feature-grid feature-grid--three">
        <div class="feature-card feature-card--vibrant">
          <div class="icon icon--vibrant" aria-hidden="true">📶</div>
          <h3>Consistent Speeds</h3>
          <p>We deliver the speeds we advertise. No throttling during peak hours.</p>
        </div>
        <div class="feature-card feature-card--vibrant">
          <div class="icon icon--vibrant" aria-hidden="true">♾️</div>
          <h3>No Data Caps</h3>
          <p>Stream, game, and download without worrying about overage fees.</p>
        </div>
        <div class="feature-card feature-card--vibrant">
          <div class="icon icon--vibrant" aria-hidden="true">🔧</div>
          <h3>Free Equipment</h3>
          <p>Modem and router included—no extra monthly fees for standard equipment.</p>
        </div>
        <div class="feature-card feature-card--vibrant">
          <div class="icon icon--vibrant" aria-hidden="true">📞</div>
          <h3>Real Support</h3>
          <p>24/7 support from real people when you need help.</p>
        </div>
      </div>
    </div>
  </section>

  <section class="cta-strip cta-strip--vibrant scroll-animate">
    <div class="container">
      <h2>Get Connected at Home</h2>
      <p>Apply for connection and we'll get you set up with fast, reliable home internet.</p>
      <a href="{{ route('contact') }}#apply" class="btn btn-secondary btn-cta-glow js-open-apply-modal">Apply for Connection</a>
    </div>
  </section>
</div>
@endsection
