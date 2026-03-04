@extends('layouts.app')

@section('title', 'Articles | ' . ($siteSettings['site_name'] ?? 'Livenet Solutions'))
@section('meta_description', 'Tips, guides, and news about internet and connectivity.')

@section('content')
{{-- Hero (matches about / contact) --}}
<section class="slider-two" id="top">
    <div class="swiper_carousel swiper-container" data-swiper='{"spaceBetween":0,"slidesPerView":1}'>
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="slider-two_image" style="background-image: url({{ asset('bg-2.jpg') }});"></div>
                <div class="slider-two_pattern" style="background-image: url({{ asset('images/main-slider/slider-two_pattern.png') }})"></div>
                <div class="auto-container">
                    <div class="slider-two_content-column">
                        <div class="slider-two_content-inner">
                            <nav class="slider-two_breadcrumb" aria-label="Breadcrumb">
                                <a href="{{ route('home') }}">Home</a> / Articles
                            </nav>
                            <div class="slider-two_title">Tips &amp; insights</div>
                            <h1 class="slider-two_heading">Articles</h1>
                            <p class="slider-two_text" style="max-width: 520px; margin-top: 20px; margin-bottom: 0; color: rgba(255,255,255,0.9); font-size: 18px; line-height: 1.5;">Tips, guides, and news about internet and getting the most from your connection.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="articles-list py-5">
    <div class="auto-container">
        <div class="sec-title centered">
            <div class="sec-title_title">latest</div>
            <h2 class="sec-title_heading">Latest Articles</h2>
        </div>

        @if($articles->isNotEmpty())
        <div class="articles-grid">
            @foreach($articles as $article)
            <article class="article-card">
                <a href="{{ route('articles.show', $article) }}" class="article-card_image-link">
                    @if($article->featured_image)
                    <div class="article-card_image" style="background-image: url({{ asset('storage/' . $article->featured_image) }});"></div>
                    @else
                    <div class="article-card_image article-card_image--placeholder">
                        <i class="fa-solid fa-newspaper" aria-hidden="true"></i>
                    </div>
                    @endif
                </a>
                <div class="article-card_body">
                    @if($article->category)
                    <span class="article-card_category">{{ $article->category }}</span>
                    @endif
                    <h3 class="article-card_title">
                        <a href="{{ route('articles.show', $article) }}">{{ $article->title }}</a>
                    </h3>
                    @if($article->excerpt)
                    <p class="article-card_excerpt">{{ Str::limit($article->excerpt, 120) }}</p>
                    @endif
                    <div class="article-card_meta">
                        <time datetime="{{ $article->published_at->toIso8601String() }}">{{ $article->published_at->format('M j, Y') }}</time>
                        <a href="{{ route('articles.show', $article) }}" class="article-card_more">Read more <i class="fa fa-arrow-right"></i></a>
                    </div>
                </div>
            </article>
            @endforeach
        </div>

        @if($articles->hasPages())
        <div class="articles-pagination">
            {{ $articles->links() }}
        </div>
        @endif
        @else
        <div class="articles-empty">
            <div class="articles-empty_icon"><i class="fa-solid fa-newspaper"></i></div>
            <h3 class="articles-empty_title">No articles yet</h3>
            <p class="articles-empty_text">Tips, guides, and news will appear here. Check back soon or explore our services.</p>
            <a href="{{ route('home') }}" class="btn-style-one theme-btn">
                <div class="btn-wrap">
                    <span class="text-one">Back to Home</span>
                    <span class="text-two">Back to Home</span>
                </div>
            </a>
        </div>
        @endif
    </div>
</section>
@endsection

@push('styles')
<style>
.slider-two_breadcrumb { font-size: 14px; opacity: 0.9; margin-bottom: 12px; }
.slider-two_breadcrumb a { color: rgba(255,255,255,0.95); text-decoration: none; }
.slider-two_breadcrumb a:hover { text-decoration: underline; }
.articles-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(320px, 1fr)); gap: 1.75rem; margin-top: 2rem; }
.article-card { background: #fff; border-radius: 12px; overflow: hidden; box-shadow: 0 2px 12px rgba(0,0,0,0.06); border: 1px solid rgba(0,0,0,0.06); transition: box-shadow 0.25s ease, transform 0.2s ease; }
.article-card:hover { box-shadow: 0 12px 32px rgba(0,0,0,0.1); transform: translateY(-2px); }
.article-card_image-link { display: block; text-decoration: none; }
.article-card_image { height: 200px; background-size: cover; background-position: center; background-color: #e2e8f0; }
.article-card_image--placeholder { display: flex; align-items: center; justify-content: center; color: #94a3b8; font-size: 3rem; }
.article-card_body { padding: 1.25rem 1.5rem; }
.article-card_category { display: inline-block; font-size: 0.75rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.05em; color: var(--main-color, #0265cb); margin-bottom: 0.5rem; }
.article-card_title { font-size: 1.15rem; font-weight: 700; margin: 0 0 0.5rem; line-height: 1.35; }
.article-card_title a { color: #1e293b; text-decoration: none; }
.article-card_title a:hover { color: var(--main-color, #0265cb); }
.article-card_excerpt { font-size: 0.95rem; color: #64748b; line-height: 1.55; margin: 0 0 0.75rem; }
.article-card_meta { display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 0.5rem; font-size: 0.875rem; }
.article-card_meta time { color: #94a3b8; }
.article-card_more { color: var(--main-color, #0265cb); font-weight: 600; text-decoration: none; }
.article-card_more:hover { text-decoration: underline; }
.article-card_more i { margin-left: 0.25rem; font-size: 0.75rem; }
.articles-pagination { margin-top: 2.5rem; display: flex; justify-content: center; }
.articles-empty { text-align: center; padding: 3rem 1.5rem; max-width: 420px; margin: 2rem auto 0; }
.articles-empty_icon { font-size: 3rem; color: #cbd5e1; margin-bottom: 1rem; }
.articles-empty_title { font-size: 1.35rem; font-weight: 700; color: #1e293b; margin: 0 0 0.5rem; }
.articles-empty_text { color: #64748b; line-height: 1.6; margin: 0 0 1.5rem; }
</style>
@endpush
