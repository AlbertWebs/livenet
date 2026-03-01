@extends('layouts.app')

@section('title', 'Articles & Blog | Livenet Solutions – Internet Tips & News')
@section('meta_description', 'Read articles on home internet, business connectivity, WiFi tips, and industry news from Livenet Solutions.')

@section('jsonld')
@verbatim
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "BreadcrumbList",
  "itemListElement": [
    { "@type": "ListItem", "position": 1, "name": "Home", "item": "{{ url('/') }}" },
    { "@type": "ListItem", "position": 2, "name": "Articles", "item": "{{ route('articles') }}" }
  ]
}
</script>
@endverbatim
@endsection

@section('content')
<section class="page-hero scroll-animate">
  <div class="container">
    <nav class="breadcrumb" aria-label="Breadcrumb">
      <a href="{{ route('home') }}">Home</a> / Articles
    </nav>
    <h1>Articles</h1>
    <p>Tips, guides, and news about internet, connectivity, and getting the most from your connection.</p>
  </div>
</section>

<section class="section scroll-animate">
  <div class="container">
    <div class="articles-toolbar">
      <div class="search-wrap">
        <input type="search" id="article-search" placeholder="Search articles..." aria-label="Search articles">
      </div>
      <div class="categories" role="navigation" aria-label="Article categories">
        <a href="{{ route('articles') }}" class="active">All</a>
        <a href="{{ route('articles') }}?category=home">Home Internet</a>
        <a href="{{ route('articles') }}?category=business">Business</a>
        <a href="{{ route('articles') }}?category=tips">Tips & How-To</a>
        <a href="{{ route('articles') }}?category=news">News</a>
      </div>
    </div>

    <div class="articles-grid">
      <article class="article-card">
        <div class="thumb" role="img" aria-label="Article about home WiFi">📡</div>
        <div class="content">
          <p class="meta">Home Internet · Feb 20, 2025</p>
          <h3><a href="#">How to Get the Best WiFi Coverage in Your Home</a></h3>
          <p>Simple steps to place your router and extend coverage so every room stays connected.</p>
        </div>
      </article>
      <article class="article-card">
        <div class="thumb" role="img" aria-label="Article about business uptime">🏢</div>
        <div class="content">
          <p class="meta">Business · Feb 18, 2025</p>
          <h3><a href="#">Why Your Business Needs an Internet SLA</a></h3>
          <p>Understanding SLAs and uptime guarantees so your business stays online when it matters.</p>
        </div>
      </article>
      <article class="article-card">
        <div class="thumb" role="img" aria-label="Article about speed test">⚡</div>
        <div class="content">
          <p class="meta">Tips & How-To · Feb 15, 2025</p>
          <h3><a href="#">How to Run a Reliable Speed Test (And What the Numbers Mean)</a></h3>
          <p>Get accurate results and learn what download speed, upload speed, and latency mean for you.</p>
        </div>
      </article>
      <article class="article-card">
        <div class="thumb" role="img" aria-label="Article about fiber">🔌</div>
        <div class="content">
          <p class="meta">Home Internet · Feb 12, 2025</p>
          <h3><a href="#">Fiber vs. Cable Internet: Which Is Right for You?</a></h3>
          <p>Compare fiber and cable so you can choose the best option for your home or business.</p>
        </div>
      </article>
      <article class="article-card">
        <div class="thumb" role="img" aria-label="Article about remote work">💻</div>
        <div class="content">
          <p class="meta">Business · Feb 10, 2025</p>
          <h3><a href="#">Remote Work Internet Requirements: A Quick Checklist</a></h3>
          <p>Minimum speeds, latency, and stability tips for productive work-from-home setups.</p>
        </div>
      </article>
      <article class="article-card">
        <div class="thumb" role="img" aria-label="Article about security">🔒</div>
        <div class="content">
          <p class="meta">Tips & How-To · Feb 8, 2025</p>
          <h3><a href="#">Securing Your Home Network in 5 Steps</a></h3>
          <p>Strengthen your WiFi and router settings to keep your devices and data safe.</p>
        </div>
      </article>
      <article class="article-card">
        <div class="thumb" role="img" aria-label="Article about streaming">📺</div>
        <div class="content">
          <p class="meta">Home Internet · Feb 5, 2025</p>
          <h3><a href="#">How Much Internet Speed Do You Need for Streaming?</a></h3>
          <p>Recommendations for HD, 4K, and multiple streams so you can binge without the buffer.</p>
        </div>
      </article>
      <article class="article-card">
        <div class="thumb" role="img" aria-label="Article about expansion">🌐</div>
        <div class="content">
          <p class="meta">News · Feb 1, 2025</p>
          <h3><a href="#">Livenet Expands Fiber to 12 New Neighborhoods</a></h3>
          <p>We're bringing gigabit fiber to more homes. Check if your area is included.</p>
        </div>
      </article>
    </div>
  </div>
</section>
@endsection

@push('scripts')
<script>
  document.getElementById('article-search')?.addEventListener('input', function() {
    var q = this.value.toLowerCase();
    document.querySelectorAll('.article-card').forEach(function(card) {
      card.style.display = card.textContent.toLowerCase().indexOf(q) >= 0 ? '' : 'none';
    });
  });
</script>
@endpush
