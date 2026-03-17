@extends('layouts.app')

@section('title', 'Contact Us | ' . ($siteSettings['site_name'] ?? 'Livenet Solutions'))
@section('meta_description', 'Contact us for home or business internet. Phone, email, contact form.')

@section('content')
@php
    $siteName = $siteSettings['site_name'] ?? 'Livenet Solutions';
    $footerPhone = $siteSettings['phone'] ?? '+254 712 104 104';
    $footerEmail = $siteSettings['contact_email'] ?? 'info@livenetsolutions.com';
    $footerAddress = $siteSettings['address'] ?? 'Nairobi, Kenya';
    $footerTel = 'tel:' . preg_replace('/\D/', '', $footerPhone);
    $facebookUrl = trim($siteSettings['facebook_url'] ?? '');
    $twitterUrl = trim($siteSettings['twitter_url'] ?? '');
    $linkedinUrl = trim($siteSettings['linkedin_url'] ?? '');
    $instagramUrl = trim($siteSettings['instagram_url'] ?? '');
    $hasSocial = $facebookUrl || $twitterUrl || $linkedinUrl || $instagramUrl;
@endphp

{{-- Hero --}}
<section class="slider-two contact-hero" id="top">
    <div class="swiper_carousel swiper-container" data-swiper='{"spaceBetween":0,"slidesPerView":1}'>
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="slider-two_image" style="background-image: url({{ asset('bg-2.jpg') }});"></div>
                <div class="slider-two_pattern" style="background-image: url({{ asset('images/main-slider/slider-two_pattern.png') }})"></div>
                <div class="auto-container">
                    <div class="slider-two_content-column">
                        <div class="slider-two_content-inner">
                            <nav class="slider-two_breadcrumb" aria-label="Breadcrumb">
                                <a href="{{ route('home') }}">Home</a> / Contact Us
                            </nav>
                            <div class="slider-two_title">We're here to help</div>
                            <h1 class="slider-two_heading">Get in <br> Touch</h1>
                            <p class="slider-two_text" style="max-width: 520px; margin-top: 20px; margin-bottom: 0; color: rgba(255,255,255,0.9); font-size: 18px; line-height: 1.5;">New connections, support, or a quick question—reach us by phone, email, or the form below.</p>
                            <div class="contact-hero_actions">
                                <a class="btn-style-one theme-btn" href="#apply">
                                    <div class="btn-wrap"><span class="text-one">Send a message</span><span class="text-two">Send a message</span></div>
                                </a>
                                <a class="contact-hero_quick contact-hero_quick--phone" href="{{ $footerTel }}"><i class="fa fa-phone-alt"></i> Call</a>
                                <a class="contact-hero_quick contact-hero_quick--email" href="mailto:{{ $footerEmail }}"><i class="fa fa-envelope"></i> Email</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="contact-content py-5" id="apply">
    <div class="auto-container">
        @if (session('success'))
            <div class="contact-alert contact-alert--success" role="alert">
                <i class="fa fa-check-circle" aria-hidden="true"></i>
                <span>{{ session('success') }}</span>
            </div>
        @endif
        @if ($errors->any())
            <div class="contact-alert contact-alert--error" role="alert">
                <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
                <ul class="mb-0 pl-3">
                    @foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach
                </ul>
            </div>
        @endif
        <div class="sec-title centered">
            <div class="sec-title_title">reach us</div>
            <h2 class="sec-title_heading">Contact Details &amp; Message</h2>
            <p class="contact-content_intro">Use the form to send a message, or reach us directly. We typically respond within one business day.</p>
        </div>
        <div class="contact-content_grid">
            <div class="contact-details_card">
                <h3 class="contact-details_heading">Contact Details</h3>
                <ul class="contact-details_list list-unstyled">
                    <li>
                        <span class="contact-details_icon"><i class="fas fa-phone-alt"></i></span>
                        <a href="{{ $footerTel }}">{{ $footerPhone }}</a>
                    </li>
                    <li>
                        <span class="contact-details_icon"><i class="fas fa-envelope"></i></span>
                        <a href="mailto:{{ $footerEmail }}">{{ $footerEmail }}</a>
                    </li>
                    <li>
                        <span class="contact-details_icon"><i class="fas fa-map-marker-alt"></i></span>
                        <span class="contact-details_value">{{ $footerAddress ?: 'Nairobi, Kenya' }}</span>
                    </li>
                </ul>
                <div class="contact-details_hours">
                    <span class="contact-details_icon"><i class="far fa-clock"></i></span>
                    Mon – Sat: 8:00am – 6:00pm
                </div>
                @if($hasSocial)
                <div class="contact-details_social">
                    <span class="contact-details_social-label">Follow us</span>
                    <div class="contact-details_social-links">
                        @if($facebookUrl)<a href="{{ $facebookUrl }}" target="_blank" rel="noopener" aria-label="Facebook"><i class="fa-brands fa-facebook-f"></i></a>@endif
                        @if($twitterUrl)<a href="{{ $twitterUrl }}" target="_blank" rel="noopener" aria-label="Twitter"><i class="fa-brands fa-twitter"></i></a>@endif
                        @if($linkedinUrl)<a href="{{ $linkedinUrl }}" target="_blank" rel="noopener" aria-label="LinkedIn"><i class="fa-brands fa-linkedin-in"></i></a>@endif
                        @if($instagramUrl)<a href="{{ $instagramUrl }}" target="_blank" rel="noopener" aria-label="Instagram"><i class="fa-brands fa-instagram"></i></a>@endif
                    </div>
                </div>
                @endif
            </div>
            <div class="contact-form_card">
                <h3 class="contact-details_heading">Send a Message</h3>
                <form action="{{ route('contact.store') }}" method="post" class="contact-form_fields">
                    @csrf
                    <div class="contact-form_row">
                        <div class="contact-form_field">
                            <label for="contact-name">Name <span class="contact-form_required">*</span></label>
                            <input type="text" id="contact-name" name="name" value="{{ old('name') }}" required class="form-control" placeholder="Your full name" autocomplete="name">
                        </div>
                        <div class="contact-form_field">
                            <label for="contact-email">Email <span class="contact-form_required">*</span></label>
                            <input type="email" id="contact-email" name="email" value="{{ old('email') }}" required class="form-control" placeholder="you@example.com" autocomplete="email">
                        </div>
                    </div>
                    <div class="contact-form_field">
                        <label for="contact-phone">Phone</label>
                        <input type="tel" id="contact-phone" name="phone" value="{{ old('phone') }}" class="form-control" placeholder="+254 7XX XXX XXX" autocomplete="tel">
                    </div>
                    <div class="contact-form_field">
                        <label for="contact-message">Message <span class="contact-form_required">*</span></label>
                        <textarea id="contact-message" name="message" required class="form-control" rows="4" placeholder="How can we help?">{{ old('message') }}</textarea>
                    </div>
                    <button type="submit" class="btn-style-one theme-btn contact-form_submit">
                        <div class="btn-wrap">
                            <span class="text-one">Send message</span>
                            <span class="text-two">Send message</span>
                        </div>
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

@if(!empty(trim($siteSettings['map_embed_url'] ?? '')))
<section class="contact-map py-5">
    <div class="auto-container">
        <div class="sec-title centered">
            <div class="sec-title_title">location</div>
            <h2 class="sec-title_heading">Find Us</h2>
        </div>
        <div class="contact-map_frame-wrap">
            <iframe class="contact-map_frame" src="{{ $siteSettings['map_embed_url'] }}" width="100%" height="420" allowfullscreen="" loading="lazy" title="Office location"></iframe>
        </div>
    </div>
</section>
@endif
@endsection

@push('styles')
<style>
.contact-hero .slider-two_text,
.contact-hero .slider-two_button-box { opacity: 1; transform: none; }
.slider-two_breadcrumb { margin-bottom: 12px; font-size: 14px; opacity: 0.9; }
.slider-two_breadcrumb a { color: rgba(255,255,255,0.95); text-decoration: none; }
.slider-two_breadcrumb a:hover { text-decoration: underline; }

.contact-hero_actions { display: flex; flex-wrap: wrap; align-items: center; gap: 12px; margin-top: 28px; }
.contact-hero_quick { display: inline-flex; align-items: center; gap: 8px; padding: 10px 18px; border-radius: 8px; font-size: 0.95rem; font-weight: 600; text-decoration: none; color: #fff; border: 2px solid rgba(255,255,255,0.5); transition: background 0.2s, border-color 0.2s; }
.contact-hero_quick:hover { background: rgba(255,255,255,0.15); border-color: rgba(255,255,255,0.8); color: #fff; }
.contact-hero_quick i { font-size: 0.9rem; }

.contact-content_intro { margin: 10px auto 0; max-width: 560px; font-size: 1rem; color: #64748b; line-height: 1.5; }
.contact-content_grid { display: grid; grid-template-columns: 1fr 1.4fr; gap: 2rem; margin-top: 2rem; align-items: start; }
@media (max-width: 991px) { .contact-content_grid { grid-template-columns: 1fr; } }

.contact-alert { padding: 1rem 1.25rem; border-radius: 10px; margin-bottom: 1.5rem; display: flex; align-items: flex-start; gap: 12px; }
.contact-alert--success { background: #ecfdf5; border: 1px solid #a7f3d0; color: #065f46; }
.contact-alert--success i { color: #059669; margin-top: 2px; }
.contact-alert--error { background: #fef2f2; border: 1px solid #fecaca; color: #991b1b; }
.contact-alert--error i { color: #dc2626; margin-top: 2px; }
.contact-alert ul { list-style: none; padding-left: 0 !important; }

.contact-details_card,
.contact-form_card {
  background: #fff;
  border: 1px solid #e2e8f0;
  border-radius: 16px;
  padding: 2rem;
  box-shadow: 0 2px 12px rgba(0,0,0,0.04);
  transition: box-shadow 0.2s ease;
}
.contact-details_card:hover,
.contact-form_card:hover { box-shadow: 0 8px 24px rgba(0,0,0,0.06); }
.contact-details_heading,
.contact-form_card .contact-details_heading {
  font-size: 1.25rem;
  font-weight: 700;
  color: #1e293b;
  margin: 0 0 1.25rem;
  padding-bottom: 0.75rem;
  border-bottom: 2px solid #e2e8f0;
}
.contact-details_list li {
  padding: 0.6rem 0;
  padding-left: 2.5rem;
  position: relative;
  font-size: 1rem;
  color: #334155;
  line-height: 1.5;
}
.contact-details_icon {
  position: absolute;
  left: 0;
  top: 0.75rem;
  width: 22px;
  color: var(--main-color, #338edf);
  font-size: 0.95rem;
}
.contact-details_list a {
  color: #1e293b;
  font-weight: 500;
  text-decoration: none;
}
.contact-details_list a:hover { color: var(--main-color, #338edf); text-decoration: underline; }
.contact-details_value { color: #334155; }
.contact-details_hours {
  font-size: 0.95rem;
  color: #64748b;
  padding: 0.75rem 0 0;
  padding-left: 2.5rem;
  margin-top: 0.5rem;
  border-top: 1px solid #f1f5f9;
}
.contact-details_social { margin-top: 1.25rem; padding-top: 1.25rem; border-top: 1px solid #f1f5f9; }
.contact-details_social-label { display: block; font-size: 0.8rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.05em; color: #64748b; margin-bottom: 0.75rem; }
.contact-details_social-links { display: flex; gap: 10px; flex-wrap: wrap; }
.contact-details_social-links a {
  display: inline-flex; align-items: center; justify-content: center;
  width: 40px; height: 40px; border-radius: 10px;
  background: #f1f5f9; color: #475569; font-size: 1.1rem;
  text-decoration: none; transition: background 0.2s, color 0.2s, transform 0.15s;
}
.contact-details_social-links a:hover { background: var(--main-color, #338edf); color: #fff; transform: translateY(-2px); }

.contact-form_row { display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; }
@media (max-width: 576px) { .contact-form_row { grid-template-columns: 1fr; } }
.contact-form_field { margin-bottom: 1rem; }
.contact-form_field label {
  display: block;
  font-size: 0.9rem;
  font-weight: 600;
  color: #374151;
  margin-bottom: 0.4rem;
}
.contact-form_required { color: #dc2626; }
.contact-form_fields .form-control {
  width: 100%;
  padding: 0.75rem 1rem;
  border: 1px solid #e2e8f0;
  border-radius: 10px;
  font-size: 1rem;
  transition: border-color 0.2s ease, box-shadow 0.2s ease;
}
.contact-form_fields .form-control:focus {
  outline: none;
  border-color: var(--main-color, #338edf);
  box-shadow: 0 0 0 3px rgba(2, 101, 203, 0.12);
}
.contact-form_fields textarea.form-control { resize: vertical; min-height: 120px; }
.contact-form_submit { margin-top: 0.5rem; }

.contact-map { background: linear-gradient(180deg, #f8fafc 0%, #fff 100%); }
.contact-map .sec-title { margin-bottom: 1.5rem; }
.contact-map_frame-wrap { border-radius: 16px; overflow: hidden; box-shadow: 0 4px 24px rgba(0,0,0,0.08); }
.contact-map_frame { display: block; border: 0; }
</style>
@endpush
