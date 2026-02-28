@extends('layouts.app')

@section('title', 'Contact Us | Livenet Solutions – Get in Touch')
@section('meta_description', 'Contact Livenet Solutions for home or business internet. Phone, email, contact form, and address. Apply for connection or get support.')

@section('jsonld')
@verbatim
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "BreadcrumbList",
  "itemListElement": [
    { "@type": "ListItem", "position": 1, "name": "Home", "item": "{{ url('/') }}" },
    { "@type": "ListItem", "position": 2, "name": "Contact Us", "item": "{{ route('contact') }}" }
  ]
}
</script>
@endverbatim
@endsection

@section('content')
<div class="page-contact">
  <section class="page-hero contact-hero--vibrant">
    <div class="contact-hero__glow" aria-hidden="true"></div>
    <div class="container">
      <nav class="breadcrumb" aria-label="Breadcrumb">
        <a href="{{ route('home') }}">Home</a> / Contact Us
      </nav>
      <h1 class="contact-hero__title">Get in Touch</h1>
      <p class="contact-hero__subtitle">New connections, support, or a quick question—we're here to help. Reach us by phone, email, or the form below.</p>
    </div>
  </section>

  <section class="section contact-section" id="apply">
    <div class="container">
      @if (session('success'))
        <div class="contact-alert contact-alert--success" role="alert">{{ session('success') }}</div>
      @endif
      @if ($errors->any())
        <ul class="contact-alert contact-alert--error" role="alert">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      @endif

      <div class="contact-grid contact-grid--elegant">
        <div class="contact-side">
          <h2 class="contact-side__title">Contact Details</h2>
          <p class="contact-side__intro">Use the form to send a message, or reach us directly. We typically respond within one business day.</p>

          <div class="contact-cards">
            <a href="tel:+254712104104" class="contact-card">
              <span class="contact-card__icon" aria-hidden="true">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
              </span>
              <span class="contact-card__label">Phone</span>
              <span class="contact-card__value">0712 104104</span>
            </a>
            <a href="mailto:info@livenetsolutions.com" class="contact-card">
              <span class="contact-card__icon" aria-hidden="true">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
              </span>
              <span class="contact-card__label">Email</span>
              <span class="contact-card__value">info@livenetsolutions.com</span>
            </a>
            <div class="contact-card contact-card--static">
              <span class="contact-card__icon" aria-hidden="true">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
              </span>
              <span class="contact-card__label">Location</span>
              <span class="contact-card__value">Nairobi, Kenya</span>
            </div>
            <div class="contact-card contact-card--static">
              <span class="contact-card__icon" aria-hidden="true">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
              </span>
              <span class="contact-card__label">Hours</span>
              <span class="contact-card__value">Support: 24/7<br>Office: Mon–Fri 9am–6pm EAT</span>
            </div>
          </div>

          <div class="contact-social">
            <p class="contact-social__title">Connect with us</p>
            <div class="contact-social__links">
              <a href="https://www.facebook.com/" target="_blank" rel="noopener noreferrer" class="contact-social__link" aria-label="Facebook">
                <svg viewBox="0 0 24 24" fill="currentColor"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
              </a>
              <a href="https://twitter.com/" target="_blank" rel="noopener noreferrer" class="contact-social__link" aria-label="X (Twitter)">
                <svg viewBox="0 0 24 24" fill="currentColor"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
              </a>
              <a href="https://www.linkedin.com/" target="_blank" rel="noopener noreferrer" class="contact-social__link" aria-label="LinkedIn">
                <svg viewBox="0 0 24 24" fill="currentColor"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
              </a>
            </div>
          </div>
        </div>

        <div class="contact-form-wrap contact-form-wrap--elegant">
          <form class="contact-form contact-form--elegant" id="contact-form" action="{{ route('contact.store') }}" method="post">
            @csrf
            <h2 class="contact-form__title">Send a Message</h2>
            <p class="contact-form__subtitle">We'll get back to you within one business day.</p>
            <label for="name">Name <span class="required">*</span></label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required placeholder="Your full name">
            <label for="email">Email <span class="required">*</span></label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required placeholder="you@example.com">
            <label for="phone">Phone</label>
            <input type="tel" id="phone" name="phone" value="{{ old('phone') }}" placeholder="+254 7XX XXX XXX">
            <label for="message">Message <span class="required">*</span></label>
            <textarea id="message" name="message" required placeholder="How can we help? e.g. new connection, support, or general inquiry." rows="4">{{ old('message') }}</textarea>
            <button type="submit" class="btn btn-primary contact-form__submit">Send Message</button>
          </form>
        </div>
      </div>
    </div>
  </section>

  <section class="section section-alt contact-map-section">
    <div class="container">
      <h2 class="section-title section-title--contact">Find Us</h2>
      <p class="section-subtitle">Visit our office or get in touch online. We're happy to help.</p>
    </div>
    <div class="contact-map-wrap contact-map-wrap--full">
      <iframe class="contact-map-iframe" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2042704.2711447817!2d34.806963249999995!3d-0.51558895!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6dcc67caaba0276b%3A0x8e3ad9a571ec57a5!2sLIVENET%20SOLUTIONS!5e0!3m2!1sen!2ske!4v1772260543047!5m2!1sen!2ske" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" title="Livenet Solutions location map"></iframe>
    </div>
  </section>
</div>
@endsection
