@extends('layouts.app')

@section('title', ($article->meta_title ?: $article->title) . ' | ' . ($siteSettings['site_name'] ?? 'Livenet Solutions'))
@section('meta_description', $article->meta_description ?: Str::limit(strip_tags($article->excerpt ?: $article->content), 160))

@section('content')
@php
    $siteName = $siteSettings['site_name'] ?? 'Livenet Solutions';
@endphp

{{-- Hero --}}
<section class="slider-two" id="top">
    <div class="swiper_carousel swiper-container" data-swiper='{"spaceBetween":0,"slidesPerView":1}'>
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="slider-two_image" style="background-image: url({{ $article->featured_image ? asset('storage/' . $article->featured_image) : asset('bg-2.jpg') }});"></div>
                <div class="slider-two_pattern" style="background-image: url({{ asset('images/main-slider/slider-two_pattern.png') }})"></div>
                <div class="auto-container">
                    <div class="slider-two_content-column">
                        <div class="slider-two_content-inner">
                            <nav class="slider-two_breadcrumb" aria-label="Breadcrumb">
                                <a href="{{ route('home') }}">Home</a> / <a href="{{ route('articles') }}">Articles</a> / {{ $article->title }}
                            </nav>
                            @if($article->category)
                            <div class="slider-two_title">{{ $article->category }}</div>
                            @endif
                            <h1 class="slider-two_heading">{{ $article->title }}</h1>
                            <p class="slider-two_text" style="max-width: 560px; margin-top: 16px; margin-bottom: 0; color: rgba(255,255,255,0.9); font-size: 16px; line-height: 1.5;">
                                <time datetime="{{ $article->published_at->toIso8601String() }}">{{ $article->published_at->format('F j, Y') }}</time>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="article-single py-5">
    <div class="auto-container">
        <div class="article-single_inner">
            @if($article->excerpt)
            <p class="article-single_lead">{{ $article->excerpt }}</p>
            @endif
            <div class="article-single_content user-content">
                {!! $article->content !!}
            </div>
            <div class="article-single_footer">
                <a href="{{ route('articles') }}" class="btn-style-two theme-btn">
                    <div class="btn-wrap">
                        <span class="text-one"><i class="fa fa-arrow-left"></i> All articles</span>
                        <span class="text-two"><i class="fa fa-arrow-left"></i> All articles</span>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
.slider-two_breadcrumb { font-size: 14px; opacity: 0.9; margin-bottom: 12px; }
.slider-two_breadcrumb a { color: rgba(255,255,255,0.95); text-decoration: none; }
.slider-two_breadcrumb a:hover { text-decoration: underline; }
.slider-two_breadcrumb a:last-of-type { color: rgba(255,255,255,0.7); }
.article-single_inner { max-width: 720px; margin: 0 auto; }
.article-single_lead { font-size: 1.2rem; color: #475569; line-height: 1.65; margin-bottom: 1.5rem; }
.article-single_content { font-size: 1.05rem; line-height: 1.75; color: #334155; }
.article-single_content.user-content { }
.user-content p { margin: 0 0 1rem; }
.user-content h2 { font-size: 1.35rem; margin: 1.75rem 0 0.5rem; color: #1e293b; }
.user-content h3 { font-size: 1.15rem; margin: 1.25rem 0 0.5rem; color: #1e293b; }
.user-content ul, .user-content ol { margin: 0 0 1rem; padding-left: 1.5rem; }
.user-content a { color: var(--main-color, #338edf); text-decoration: none; }
.user-content a:hover { text-decoration: underline; }
.article-single_footer { margin-top: 2.5rem; padding-top: 1.5rem; border-top: 1px solid #e2e8f0; }
</style>
@endpush
