@extends('layouts.app')

@section('title', 'Livenet Solutions | Fast, Reliable Home & Business Internet')
@section('meta_description', 'Livenet Solutions delivers fast, reliable internet for home and business. Get connected with our high-speed fiber plans and dedicated support.')
@section('og_title', 'Livenet Solutions | Fast, Reliable Home & Business Internet')
@section('og_description', 'Fast, reliable internet for home and business. High-speed fiber, 24/7 support, no data caps.')

@section('jsonld')
@verbatim
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Organization",
  "name": "Livenet Solutions",
  "url": "{{ url('/') }}",
  "logo": "{{ asset('images/logo.png') }}",
  "description": "Internet service provider supplying home and business internet with fast, reliable connectivity.",
  "contactPoint": {
    "@type": "ContactPoint",
    "telephone": "+254722539540",
    "contactType": "customer service",
    "email": "info@livenetsolutions.com",
    "areaServed": "KE"
  },
  "address": {
    "@type": "PostalAddress",
    "addressLocality": "Nairobi",
    "addressCountry": "KE"
  }
}
</script>
@endverbatim
@endsection

@section('content')
<div class="page-home">
<section class="hero hero--vibrant">
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
</section>

<section class="section section-alt section--vibrant" id="features">
  <div class="container">
    <h2 class="section-title section-title--gradient">Internet Services for Home & Business</h2>
    <p class="section-subtitle">Whether you need seamless streaming at home or enterprise-grade connectivity for your business, we have a plan that fits.</p>
    <div class="feature-grid feature-grid--home">
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
  </div>
</section>

<section class="section section-alt section--vibrant" id="packages">
  <div class="container">
    <h2 class="section-title section-title--gradient">Internet Packages</h2>
    <p class="section-subtitle">Choose from our home and business plans. All packages include reliable connectivity and support.</p>

    <h3 class="packages-subtitle">Home Internet</h3>
    <div class="plans-grid plans-grid--home">
      <div class="plan-card plan-card--home">
        <h3>Starter</h3>
        <p class="price-tag">KES 4,999<small>/mo</small></p>
        <ul>
          <li>Up to 100 Mbps</li>
          <li>Unlimited data</li>
          <li>Free modem rental</li>
        </ul>
        <a href="#" class="btn btn-secondary js-open-apply-modal">Apply</a>
      </div>
      <div class="plan-card plan-card--home plan-card--featured">
        <span class="plan-card__badge">Popular</span>
        <h3>Essential</h3>
        <p class="price-tag">KES 6,999<small>/mo</small></p>
        <ul>
          <li>Up to 300 Mbps</li>
          <li>Unlimited data</li>
          <li>Free modem + WiFi router</li>
        </ul>
        <a href="#" class="btn btn-primary js-open-apply-modal">Apply</a>
      </div>
      <div class="plan-card plan-card--home">
        <h3>Premium</h3>
        <p class="price-tag">KES 9,999<small>/mo</small></p>
        <ul>
          <li>Up to 1 Gbps</li>
          <li>Unlimited data</li>
          <li>Premium WiFi equipment</li>
        </ul>
        <a href="#" class="btn btn-secondary js-open-apply-modal">Apply</a>
      </div>
    </div>
    <p class="packages-link"><a href="{{ route('home-internet') }}">View all home internet plans →</a></p>

    <h3 class="packages-subtitle">Business Internet</h3>
    <div class="plans-grid plans-grid--home">
      <div class="plan-card plan-card--business">
        <h3>Business Starter</h3>
        <p class="price-tag">KES 12,999<small>/mo</small></p>
        <ul>
          <li>100 Mbps dedicated</li>
          <li>99.9% uptime SLA</li>
          <li>Dedicated support</li>
        </ul>
        <a href="#" class="btn btn-secondary js-open-apply-modal">Apply</a>
      </div>
      <div class="plan-card plan-card--business">
        <h3>Business Plus</h3>
        <p class="price-tag">KES 29,999<small>/mo</small></p>
        <ul>
          <li>500 Mbps dedicated</li>
          <li>99.9% uptime SLA</li>
          <li>Priority support</li>
        </ul>
        <a href="#" class="btn btn-secondary js-open-apply-modal">Apply</a>
      </div>
      <div class="plan-card plan-card--business">
        <h3>Business Pro</h3>
        <p class="price-tag">KES 49,999<small>/mo</small></p>
        <ul>
          <li>1 Gbps dedicated</li>
          <li>99.9% uptime SLA</li>
          <li>Proactive monitoring</li>
        </ul>
        <a href="#" class="btn btn-primary js-open-apply-modal">Apply</a>
      </div>
    </div>
    <p class="packages-link"><a href="{{ route('business-internet') }}">View all business internet plans →</a></p>
  </div>
</section>

<section class="section section--vibrant coverage-section" id="coverage">
  <div class="container">
    <h2 class="section-title section-title--gradient">Our Coverage</h2>
    <p class="section-subtitle">We serve Nairobi and environs. Hover over the map to see covered areas.</p>
    <div class="coverage-map-wrap">
      <div id="coverage-map" class="coverage-map" aria-label="Coverage map of Nairobi and environs"></div>
      <div class="coverage-legend">
        <span class="coverage-legend__item"><i class="coverage-legend__dot"></i> Covered</span>
      </div>
    </div>
  </div>
</section>

<section class="section section--vibrant">
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

<section class="section testimonials testimonials--vibrant">
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
      <div class="stat stat--vibrant"><span class="number">99.9%</span><span class="label">Uptime SLA</span></div>
      <div class="stat stat--vibrant"><span class="number">50K+</span><span class="label">Happy Customers</span></div>
      <div class="stat stat--vibrant"><span class="number">24/7</span><span class="label">Support</span></div>
    </div>
  </div>
</section>

<section class="cta-strip cta-strip--vibrant">
  <div class="container">
    <h2>Ready to Get Connected?</h2>
    <p>Apply for connection today and enjoy fast, reliable internet at home or at work.</p>
    <a href="{{ route('contact') }}#apply" class="btn btn-secondary btn-cta-glow">Apply for Connection</a>
  </div>
</section>
</div>

@push('styles')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" crossorigin="" />
@endpush

@push('scripts')
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" crossorigin=""></script>
<script>
(function() {
  function initCoverageMap() {
    var mapEl = document.getElementById('coverage-map');
    if (!mapEl || typeof L === 'undefined') return;

    var nairobi = [-1.286389, 36.817223];
    var map = L.map('coverage-map', {
      center: nairobi,
      zoom: 11,
      zoomControl: true,
      scrollWheelZoom: true
    });
    L.control.zoom({ position: 'topright' }).addTo(map);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>',
      maxZoom: 19
    }).addTo(map);

    var coverageColor = '#0066cc';
    var coverageFill = 'rgba(0, 102, 204, 0.35)';
    var hoverFill = 'rgba(0, 163, 224, 0.55)';

    var zones = [
      { name: 'Central Nairobi', coords: [[-1.278, 36.808], [-1.278, 36.825], [-1.295, 36.825], [-1.295, 36.808]] },
      { name: 'Westlands', coords: [[-1.258, 36.798], [-1.258, 36.815], [-1.272, 36.815], [-1.272, 36.798]] },
      { name: 'Kilimani', coords: [[-1.288, 36.782], [-1.288, 36.798], [-1.305, 36.798], [-1.305, 36.782]] },
      { name: 'Lavington', coords: [[-1.278, 36.778], [-1.278, 36.792], [-1.292, 36.792], [-1.292, 36.778]] },
      { name: 'Karen', coords: [[-1.308, 36.698], [-1.308, 36.718], [-1.328, 36.718], [-1.328, 36.698]] },
      { name: 'Eastlands', coords: [[-1.282, 36.848], [-1.282, 36.868], [-1.298, 36.868], [-1.298, 36.848]] },
      { name: 'Upper Hill', coords: [[-1.295, 36.812], [-1.295, 36.825], [-1.308, 36.825], [-1.308, 36.812]] },
      { name: 'Runda / Gigiri', coords: [[-1.238, 36.808], [-1.238, 36.828], [-1.255, 36.828], [-1.255, 36.808]] }
    ];

    zones.forEach(function(zone) {
      var layer = L.polygon(zone.coords, {
        color: coverageColor,
        weight: 2,
        fillColor: coverageColor,
        fillOpacity: 0.35,
        className: 'coverage-zone'
      }).addTo(map);

      layer.bindTooltip(zone.name + ' &mdash; <strong>Covered</strong>', {
        permanent: false,
        direction: 'top',
        className: 'coverage-tooltip',
        offset: [0, -8]
      });

      layer.on('mouseover', function() {
        this.setStyle({ fillOpacity: 0.55, weight: 3 });
        this.bringToFront();
      });
      layer.on('mouseout', function() {
        this.setStyle({ fillOpacity: 0.35, weight: 2 });
      });
    });
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initCoverageMap);
  } else {
    initCoverageMap();
  }
})();
</script>
@endpush
@endsection
