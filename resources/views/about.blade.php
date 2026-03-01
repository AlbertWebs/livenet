@extends('layouts.app')

@section('title', 'About Us | Livenet Solutions')
@section('meta_description', 'Learn about Livenet Solutions – your trusted internet provider in Nairobi. We deliver fast, reliable home and business internet with 24/7 support.')

@section('jsonld')
@verbatim
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "BreadcrumbList",
  "itemListElement": [
    { "@type": "ListItem", "position": 1, "name": "Home", "item": "{{ url('/') }}" },
    { "@type": "ListItem", "position": 2, "name": "About Us", "item": "{{ route('about') }}" }
  ]
}
</script>
@endverbatim
@endsection

@section('content')
<div class="page-about">
  <section class="page-hero about-hero--vibrant scroll-animate">
    <div class="contact-hero__glow" aria-hidden="true"></div>
    <div class="container">
      <nav class="breadcrumb" aria-label="Breadcrumb">
        <a href="{{ route('home') }}">Home</a> / About Us
      </nav>
      <h1 class="contact-hero__title">About Livenet Solutions</h1>
      <p class="contact-hero__subtitle">We're a Nairobi-based internet service provider committed to keeping homes and businesses connected with fast, reliable, and affordable internet.</p>
    </div>
  </section>

  <section class="section about-section scroll-animate">
    <div class="container">
      <div class="about-intro">
        <h2 class="section-title">Our Story</h2>
        <p class="about-intro__lead">Livenet Solutions was founded to bridge the gap between demand for quality internet and the reality of unreliable or overpriced options. We built our network with one goal: to deliver the connection you can count on.</p>
        <p>Today we serve thousands of homes and businesses across Nairobi and environs. From streaming and remote work to enterprise connectivity, we provide plans that fit how you live and work—with transparent pricing, no hidden fees, and support that actually answers.</p>
      </div>

      <div class="about-values scroll-animate">
        <h2 class="section-title">What We Stand For</h2>
        <div class="about-values-grid">
          <div class="about-value-card">
            <span class="about-value-card__icon" aria-hidden="true">⚡</span>
            <h3>Reliability</h3>
            <p>We invest in our network and redundant links so you stay online. Our business plans come with an uptime SLA you can trust.</p>
          </div>
          <div class="about-value-card">
            <span class="about-value-card__icon" aria-hidden="true">🤝</span>
            <h3>Transparency</h3>
            <p>Clear pricing, no data caps, and no surprise fees. What you see is what you get.</p>
          </div>
          <div class="about-value-card">
            <span class="about-value-card__icon" aria-hidden="true">📞</span>
            <h3>Support</h3>
            <p>Real people, 24/7. When you need help, we're here—by phone, email, or in person.</p>
          </div>
        </div>
      </div>

      <div class="about-cta">
        <p>Ready to get connected? <a href="{{ route('contact') }}#apply" class="btn btn-primary js-open-apply-modal">Apply for Connection</a> or <a href="{{ route('contact') }}">contact us</a> with any questions.</p>
      </div>
    </div>
  </section>
</div>
@endsection
