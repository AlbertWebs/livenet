@extends('layouts.app')

@section('title', 'Our Coverage | ' . ($siteSettings['site_name'] ?? 'Livenet Solutions'))
@section('meta_description', 'Check our coverage area. We serve Nairobi and the wider metropolitan area with reliable, high-speed internet.')

@section('content')
@php
    $siteName = $siteSettings['site_name'] ?? 'Livenet Solutions';
    $coverageMapUrl = trim($siteSettings['coverage_map_embed_url'] ?? '');
@endphp

{{-- Hero with background image --}}
<section class="slider-two" id="top">
    <div class="swiper_carousel swiper-container" data-swiper='{"spaceBetween":0,"slidesPerView":1,"autoplay":{"delay":"6000"}}'>
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="slider-two_image" style="background-image: url({{ asset('bg-2.jpg') }});"></div>
                <div class="slider-two_pattern" style="background-image: url({{ asset('images/main-slider/slider-two_pattern.png') }})"></div>
                <div class="auto-container">
                    <div class="slider-two_content-column">
                        <div class="slider-two_content-inner">
                            <div class="slider-two_title">Where we serve</div>
                            <h1 class="slider-two_heading">Our <br> Coverage</h1>
                            <p class="slider-two_text" style="max-width: 520px; margin-top: 20px; margin-bottom: 0; color: rgba(255,255,255,0.9); font-size: 18px; line-height: 1.5;">We serve Nairobi and the wider metropolitan area. Check the areas below or get in touch to confirm availability for your address.</p>
                            <div class="slider-two_button-box" style="margin-top: 28px;">
                                <a class="btn-style-one theme-btn" href="#coverage-areas">
                                    <div class="btn-wrap">
                                        <span class="text-one">View areas</span>
                                        <span class="text-two">View areas</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Coverage locations --}}
<section class="coverage-locations" id="coverage-areas">
    <div class="auto-container">
        <div class="sec-title centered">
            <div class="sec-title_title">areas we cover</div>
            <h2 class="sec-title_heading">Coverage Locations</h2>
            <p class="coverage-locations_intro">Select an area below or use the map to check availability near you.</p>
        </div>
        @if(($coverageAreas ?? collect())->isNotEmpty())
        <div class="coverage-locations_grid">
            @foreach($coverageAreas as $area)
            <div class="coverage-locations_card">
                <span class="coverage-locations_icon" aria-hidden="true"><i class="fa-solid fa-location-dot"></i></span>
                <span class="coverage-locations_name">{{ $area->name }}</span>
            </div>
            @endforeach
        </div>
        <div class="coverage-locations_cta-wrap">
            <a href="#coverage-map-section" class="coverage-locations_cta">
                <i class="fa-solid fa-map-location-dot" aria-hidden="true"></i>
                <span>Find your area on the map</span>
            </a>
        </div>
        @else
        <div class="coverage-locations_empty">
            <p>Coverage areas can be managed in Admin → Coverage. Add areas to display them here.</p>
            <a href="{{ route('contact') }}" class="btn-style-two theme-btn">Contact us to check availability</a>
        </div>
        @endif
    </div>
</section>

{{-- Coverage map --}}
<section class="py-5 coverage-map-section" id="coverage-map-section" style="background: linear-gradient(180deg, #f8f9fa 0%, #fff 100%);">
    <div class="auto-container">
        <div class="sec-title centered">
            <div class="sec-title_title">find your area</div>
            <h2 class="sec-title_heading">Coverage Map</h2>
            <p class="coverage-map-section_intro">We serve Nairobi and environs.@if(empty($coverageMapUrl)) Hover over the map to see covered areas.@endif</p>
        </div>
        <div class="coverage-map-wrap mt-5">
        @if(!empty($coverageMapUrl))
            <iframe class="coverage-map-iframe" src="{{ $coverageMapUrl }}" width="100%" height="500" style="border:0; border-radius: 8px; display:block;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" title="Coverage area map"></iframe>
        @else
            <div id="coverage-map" class="coverage-map" aria-label="Coverage map of Nairobi and environs" data-center="{{ $siteSettings['coverage_map_center'] ?? '-1.286389,36.817223' }}" data-zoom="{{ $siteSettings['coverage_map_zoom'] ?? '11' }}" data-zones-url="{{ route('coverage.zones') }}"></div>
            <div class="coverage-legend">
                <span class="coverage-legend__item"><i class="coverage-legend__dot"></i> Covered</span>
            </div>
        @endif
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="py-5" style="background-color: var(--color-two, #0a2463);">
    <div class="auto-container text-center">
        <h2 class="sec-title_heading light" style="color: #fff; margin-bottom: 24px;">Ready to Get Connected?</h2>
        <a href="{{ route('contact') }}" class="btn-style-one theme-btn js-open-apply-modal">
            <div class="btn-wrap">
                <span class="text-one">Apply for Connection</span>
                <span class="text-two">Apply for Connection</span>
            </div>
        </a>
    </div>
</section>
@endsection

@push('styles')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" crossorigin="" />
<style>
/* Coverage locations section */
.coverage-locations {
  padding: 100px 0 70px;
}
.coverage-locations_intro {
  margin: 12px auto 0;
  max-width: 520px;
  font-size: 1rem;
  color: #64748b;
  line-height: 1.5;
}
.coverage-locations_grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
  gap: 1rem;
  margin-top: 2.25rem;
  justify-items: stretch;
}
.coverage-locations_card {
  display: flex;
  align-items: center;
  gap: 1rem;
  padding: 1.1rem 1.25rem;
  background: #fff;
  border: 1px solid #e2e8f0;
  border-radius: 12px;
  box-shadow: 0 1px 3px rgba(0,0,0,0.05);
  transition: border-color 0.2s ease, box-shadow 0.2s ease, transform 0.2s ease;
}
.coverage-locations_card:hover {
  border-color: var(--main-color, #0265cb);
  box-shadow: 0 4px 14px rgba(2, 101, 203, 0.12);
  transform: translateY(-2px);
}
.coverage-locations_icon {
  flex-shrink: 0;
  width: 40px;
  height: 40px;
  display: flex;
  align-items: center;
  justify-content: center;
  background: rgba(2, 101, 203, 0.08);
  color: var(--main-color, #0265cb);
  border-radius: 10px;
  font-size: 1.1rem;
}
.coverage-locations_card:hover .coverage-locations_icon {
  background: rgba(2, 101, 203, 0.14);
}
.coverage-locations_name {
  font-weight: 600;
  font-size: 1.0625rem;
  color: #1e293b;
  line-height: 1.3;
}
.coverage-locations_cta-wrap {
  margin-top: 2rem;
  text-align: center;
}
.coverage-locations_cta {
  display: inline-flex;
  align-items: center;
  gap: 0.5rem;
  padding: 0.65rem 1.25rem;
  font-size: 0.9375rem;
  font-weight: 600;
  color: var(--main-color, #0265cb);
  text-decoration: none;
  border: 2px solid var(--main-color, #0265cb);
  border-radius: 10px;
  transition: background 0.2s ease, color 0.2s ease, transform 0.15s ease;
}
.coverage-locations_cta:hover {
  background: var(--main-color, #0265cb);
  color: #fff;
  transform: translateY(-1px);
}
.coverage-locations_cta i {
  font-size: 1.1rem;
}
.coverage-locations_empty {
  text-align: center;
  padding: 3rem 1rem;
}
.coverage-locations_empty p {
  color: #64748b;
  margin-bottom: 1.25rem;
}

/* Coverage map (Leaflet when no embed URL) */
.coverage-map-section_intro {
  margin: 10px auto 0;
  max-width: 480px;
  font-size: 0.9375rem;
  color: #64748b;
  line-height: 1.5;
}
.coverage-map-wrap {
  border-radius: 12px;
  overflow: hidden;
  box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
  border: 1px solid #e2e8f0;
}
.coverage-map-iframe {
  width: 100%;
  display: block;
}
.coverage-map {
  width: 100%;
  height: 420px;
  background: #e2e8f0;
}
.coverage-legend {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 1rem;
  padding: 0.75rem 1rem;
  background: #fff;
  border-top: 1px solid #e2e8f0;
  font-size: 0.9rem;
  color: #64748b;
}
.coverage-legend__item {
  display: inline-flex;
  align-items: center;
  gap: 0.5rem;
}
.coverage-legend__dot {
  display: inline-block;
  width: 14px;
  height: 14px;
  border-radius: 4px;
  background: var(--main-color, #0265cb);
  opacity: 0.6;
}
.leaflet-interactive {
  cursor: pointer;
  transition: fill-opacity 0.2s ease, stroke-width 0.2s ease;
}
.leaflet-tooltip.coverage-tooltip {
  background: var(--color-two, #0a2463);
  color: #fff;
  border: none;
  border-radius: 6px;
  padding: 6px 12px;
  font-size: 13px;
  font-weight: 500;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
}
.leaflet-tooltip.coverage-tooltip::before {
  border-top-color: var(--color-two, #0a2463);
}
@media (max-width: 768px) {
  .coverage-map { height: 320px; }
}
@media (max-width: 480px) {
  .coverage-map { height: 280px; }
}

/* Hero background (coverage page uses bg image) */
.slider-two .slider-two_pattern { z-index: 1; }
.slider-two .slider-two_text { opacity: 1; transform: none; }
.slider-two .slider-two_button-box { opacity: 1; transform: none; }
</style>
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

    function normalizeCoord(c) {
      if (!Array.isArray(c) || c.length < 2) return null;
      var lat = parseFloat(c[0]), lng = parseFloat(c[1]);
      if (isNaN(lat) || isNaN(lng)) return null;
      if (Math.abs(lat) <= 90 && Math.abs(lng) <= 180) return [lat, lng];
      return [lng, lat];
    }
    function drawZones(zones) {
      if (!zones || !Array.isArray(zones)) zones = defaultZones;
      zones = zones.filter(function(z) { return z && z.coords && z.coords.length >= 3; });
      if (zones.length === 0) zones = defaultZones;
      zones.forEach(function(zone) {
        var pts = (zone.coords || []).map(normalizeCoord).filter(Boolean);
        if (pts.length < 3) return;
        var layer = L.polygon(pts, {
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
