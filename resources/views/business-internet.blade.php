@extends('layouts.app')

@section('title', 'Business Internet | Livenet Solutions – SLA, Uptime & Dedicated Support')
@section('meta_description', 'Business internet with SLA-backed uptime, dedicated support, and scalable bandwidth. Keep your business online with Livenet Solutions.')

@section('jsonld')
@verbatim 
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "BreadcrumbList",
  "itemListElement": [
    { "@type": "ListItem", "position": 1, "name": "Home", "item": "{{ url('/') }}" },
    { "@type": "ListItem", "position": 2, "name": "Business Internet", "item": "{{ route('business-internet') }}" }
  ]
}
</script>
@endverbatim
@endsection

@section('content')
<section class="page-hero scroll-animate">
  <div class="container">
    <nav class="breadcrumb" aria-label="Breadcrumb">
      <a href="{{ route('home') }}">Home</a> / Business Internet
    </nav>
    <h1>Business Internet</h1>
    <p>Enterprise-grade connectivity with SLA, uptime guarantee, and dedicated support for your business.</p>
  </div>
</section>

<section class="section scroll-animate">
  <div class="container">
    <h2 class="section-title">Business Internet Solutions</h2>
    <p class="section-subtitle">We deliver reliable, scalable internet so your business stays online. Backed by SLAs and a team that responds when it matters.</p>
    <div class="feature-grid">
      <div class="feature-card">
        <div class="icon" aria-hidden="true">📋</div>
        <h3>Service Level Agreement (SLA)</h3>
        <p>99.9% uptime SLA with credits when we don't meet our commitment. Your operations are protected.</p>
      </div>
      <div class="feature-card">
        <div class="icon" aria-hidden="true">⏱️</div>
        <h3>Uptime Guarantee</h3>
        <p>Redundant paths and monitored infrastructure so you get the reliability your business depends on.</p>
      </div>
      <div class="feature-card">
        <div class="icon" aria-hidden="true">🎧</div>
        <h3>Dedicated Support</h3>
        <p>Priority support and a direct line to our business team. No long hold times when you need help.</p>
      </div>
    </div>
  </div>
</section>

<section class="section section-alt scroll-animate">
  <div class="container">
    <h2 class="section-title">Business Plans & Pricing</h2>
    <p class="section-subtitle">Scale your bandwidth as you grow. All business plans include SLA and dedicated support.</p>
    <table class="pricing-table" role="grid">
      <thead>
        <tr>
          <th>Plan</th>
          <th>Speed</th>
          <th>Price</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><strong>Business Starter</strong></td>
          <td>100 Mbps dedicated</td>
          <td class="price">KES 12,999/mo</td>
          <td><a href="{{ route('contact') }}#apply" class="btn btn-primary">Apply</a></td>
        </tr>
        <tr>
          <td><strong>Business Plus</strong></td>
          <td>500 Mbps dedicated</td>
          <td class="price">KES 29,999/mo</td>
          <td><a href="{{ route('contact') }}#apply" class="btn btn-primary">Apply</a></td>
        </tr>
        <tr>
          <td><strong>Business Pro</strong></td>
          <td>1 Gbps dedicated</td>
          <td class="price">KES 49,999/mo</td>
          <td><a href="{{ route('contact') }}#apply" class="btn btn-primary">Apply</a></td>
        </tr>
        <tr>
          <td><strong>Enterprise</strong></td>
          <td>Custom (10 Gbps+)</td>
          <td class="price">Contact us</td>
          <td><a href="{{ route('contact') }}" class="btn btn-secondary">Contact</a></td>
        </tr>
      </tbody>
    </table>
  </div>
</section>

<section class="section scroll-animate">
  <div class="container">
    <h2 class="section-title">Why Businesses Choose Livenet</h2>
    <div class="feature-grid">
      <div class="feature-card">
        <div class="icon" aria-hidden="true">🔒</div>
        <h3>Secure & Compliant</h3>
        <p>Business-grade security and options for static IPs, VPN, and compliance requirements.</p>
      </div>
      <div class="feature-card">
        <div class="icon" aria-hidden="true">📈</div>
        <h3>Scalable</h3>
        <p>Upgrade or adjust your plan as your business grows without lengthy contracts.</p>
      </div>
      <div class="feature-card">
        <div class="icon" aria-hidden="true">🛠️</div>
        <h3>Proactive Monitoring</h3>
        <p>We monitor your connection and reach out if we detect issues before you do.</p>
      </div>
    </div>
  </div>
</section>

<section class="cta-strip scroll-animate">
  <div class="container">
    <h2>Get Business Internet That Works as Hard as You Do</h2>
    <p>Apply for connection or talk to our business team for a custom quote.</p>
    <a href="{{ route('contact') }}#apply" class="btn btn-secondary">Apply for Connection</a>
  </div>
</section>
@endsection
