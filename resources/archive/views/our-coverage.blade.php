@extends('layouts.app')

@section('title', ($siteSettings['site_name'] ?? 'Livenet Solutions') . ' | Our Coverage')
@section('meta_description', 'Check our coverage area. We serve Nairobi and the wider metropolitan area with reliable, high-speed internet for home and business.')

@section('content')
<div class="page-coverage">
  <section class="section section--vibrant section-alt page-coverage__hero">
    <div class="container">
      <p class="page-coverage__label">Where we serve</p>
      <h1 class="page-coverage__title">Our Coverage</h1>
      <p class="page-coverage__subtitle">We serve Nairobi and the wider metropolitan area. Check the map below to see if we're in your area, or get in touch and we'll confirm availability for your address.</p>
    </div>
  </section>

  <section class="section coverage-spotlight scroll-animate">
    <div class="container">
      <div class="coverage-spotlight__card">
        <div class="coverage-spotlight__media">
          @if(!empty($siteSettings['home_decor_image_2']))
            <div class="coverage-spotlight__image-wrap">
              <img src="{{ asset('storage/' . $siteSettings['home_decor_image_2']) }}" alt="" width="640" height="400" loading="lazy" decoding="async">
            </div>
          @else
            <div class="coverage-spotlight__image-wrap coverage-spotlight__image-wrap--placeholder" aria-hidden="true">
              <span>Decorative image</span>
            </div>
          @endif
        </div>
        <div class="coverage-spotlight__content">
          <p class="coverage-spotlight__label">Where we serve</p>
          <h2 class="coverage-spotlight__title">Our Coverage</h2>
          <p class="coverage-spotlight__text">We serve Nairobi and the wider metropolitan area with reliable, high-speed internet. Our network is built to reach homes and businesses across the region—so whether you're in the city centre or the suburbs, you can get connected.</p>
          <p class="coverage-spotlight__text">Check the coverage map below to see if we're in your area, or get in touch and we'll confirm availability for your address.</p>
          <a href="#coverage-map" class="coverage-spotlight__cta">View coverage map <span aria-hidden="true">→</span></a>
        </div>
      </div>
    </div>
  </section>

  @if($coverageAreas->isNotEmpty())
  <section class="section section-alt section--vibrant coverage-areas-list scroll-animate" id="coverage-areas">
    <div class="container">
      <h2 class="section-title section-title--gradient">Areas We Cover</h2>
      <p class="section-subtitle">We currently serve the following areas. Check the map below for exact coverage.</p>
      <ul class="coverage-areas-grid" aria-label="List of coverage areas">
        @foreach($coverageAreas as $area)
          <li class="coverage-areas-grid__item">{{ $area->name }}</li>
        @endforeach
      </ul>
    </div>
  </section>
  @endif

  <section class="section section--vibrant coverage-section scroll-animate" id="coverage-map">
    <div class="container">
      <h2 class="section-title section-title--gradient">Coverage Map</h2>
      <p class="section-subtitle">We serve Nairobi and environs.@if(empty(trim($siteSettings['coverage_map_embed_url'] ?? ''))) Hover over the map to see covered areas.@endif</p>
      <div class="coverage-map-wrap">
        @if(!empty(trim($siteSettings['coverage_map_embed_url'] ?? '')))
          <iframe class="coverage-map-iframe" src="{{ $siteSettings['coverage_map_embed_url'] }}" width="100%" height="500" style="border:0; border-radius: var(--radius, 8px);" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" title="Coverage area map"></iframe>
        @else
          <div id="coverage-map" class="coverage-map" aria-label="Coverage map of Nairobi and environs" data-center="{{ $siteSettings['coverage_map_center'] ?? '-1.286389,36.817223' }}" data-zoom="{{ $siteSettings['coverage_map_zoom'] ?? '11' }}" data-zones-url="{{ route('coverage.zones') }}"></div>
          <div class="coverage-legend">
            <span class="coverage-legend__item"><i class="coverage-legend__dot"></i> Covered</span>
          </div>
        @endif
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

    var centerStr = (mapEl.getAttribute('data-center') || '-1.286389,36.817223').trim();
    var parts = centerStr.split(/[\s,]+/);
    var center = parts.length >= 2 ? [parseFloat(parts[0]), parseFloat(parts[1])] : [-1.286389, 36.817223];
    var zoom = parseInt(mapEl.getAttribute('data-zoom') || '11', 10) || 11;
    if (isNaN(zoom) || zoom < 1) zoom = 11;
    if (zoom > 18) zoom = 18;

    var map = L.map('coverage-map', {
      center: center,
      zoom: zoom,
      zoomControl: true,
      scrollWheelZoom: true
    });
    L.control.zoom({ position: 'topright' }).addTo(map);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>',
      maxZoom: 19
    }).addTo(map);

    var coverageColor = '#0066cc';
    var defaultZones = [
      { name: 'Central Nairobi', coords: [[-1.278, 36.808], [-1.278, 36.825], [-1.295, 36.825], [-1.295, 36.808]] },
      { name: 'Westlands', coords: [[-1.258, 36.798], [-1.258, 36.815], [-1.272, 36.815], [-1.272, 36.798]] },
      { name: 'Kilimani', coords: [[-1.288, 36.782], [-1.288, 36.798], [-1.305, 36.798], [-1.305, 36.782]] },
      { name: 'Lavington', coords: [[-1.278, 36.778], [-1.278, 36.792], [-1.292, 36.792], [-1.292, 36.778]] },
      { name: 'Karen', coords: [[-1.308, 36.698], [-1.308, 36.718], [-1.328, 36.718], [-1.328, 36.698]] },
      { name: 'Eastlands', coords: [[-1.282, 36.848], [-1.282, 36.868], [-1.298, 36.868], [-1.298, 36.848]] },
      { name: 'Upper Hill', coords: [[-1.295, 36.812], [-1.295, 36.825], [-1.308, 36.825], [-1.308, 36.812]] },
      { name: 'Runda / Gigiri', coords: [[-1.238, 36.808], [-1.238, 36.828], [-1.255, 36.828], [-1.255, 36.808]] }
    ];

    function drawZones(zones) {
      if (!zones || !Array.isArray(zones)) zones = defaultZones;
      zones = zones.filter(function(z) { return z && z.coords && z.coords.length >= 3; });
      if (zones.length === 0) zones = defaultZones;
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

    var zonesUrl = mapEl.getAttribute('data-zones-url');
    if (zonesUrl) {
      fetch(zonesUrl, { headers: { 'Accept': 'application/json' } })
        .then(function(r) { return r.ok ? r.json() : []; })
        .then(function(zones) { drawZones(zones); })
        .catch(function() { drawZones(defaultZones); });
    } else {
      drawZones(defaultZones);
    }
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
