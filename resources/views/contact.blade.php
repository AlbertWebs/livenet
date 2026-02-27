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
<section class="page-hero">
  <div class="container">
    <nav class="breadcrumb" aria-label="Breadcrumb">
      <a href="{{ route('home') }}">Home</a> / Contact Us
    </nav>
    <h1>Contact Us</h1>
    <p>Get in touch for new connections, support, or general inquiries. We're here to help.</p>
  </div>
</section>

<section class="section" id="apply">
  <div class="container">
    @if (session('success'))
      <p style="background: #d4edda; color: #155724; padding: 1rem; border-radius: 8px; margin-bottom: 1.5rem;">{{ session('success') }}</p>
    @endif
    @if ($errors->any())
      <ul style="background: #f8d7da; color: #721c24; padding: 1rem 1.5rem; border-radius: 8px; margin-bottom: 1.5rem;">
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    @endif
    <div class="contact-grid">
      <div class="contact-info">
        <h2>Company Details</h2>
        <div class="detail">
          <strong>Phone</strong>
          <a href="tel:+254722539540">+254 722 539540</a>
        </div>
        <div class="detail">
          <strong>Email</strong>
          <a href="mailto:info@livenetsolutions.com">info@livenetsolutions.com</a>
        </div>
        <div class="detail">
          <strong>Address</strong>
          <span>Nairobi, Kenya</span>
        </div>
        <div class="detail">
          <strong>Hours</strong>
          <span>Support: 24/7 · Office: Mon–Fri 9am–6pm PT</span>
        </div>
        <p>Use the form to apply for a new connection, ask a question, or request a callback. We'll respond within one business day.</p>
      </div>
      <div class="contact-form-wrap">
        <form class="contact-form" id="contact-form" action="{{ route('contact.store') }}" method="post">
          @csrf
          <h2>Send a Message</h2>
          <label for="name">Name *</label>
          <input type="text" id="name" name="name" value="{{ old('name') }}" required placeholder="Your name">
          <label for="email">Email *</label>
          <input type="email" id="email" name="email" value="{{ old('email') }}" required placeholder="your@email.com">
          <label for="phone">Phone</label>
          <input type="tel" id="phone" name="phone" value="{{ old('phone') }}" placeholder="(555) 123-4567">
          <label for="message">Message *</label>
          <textarea id="message" name="message" required placeholder="Tell us how we can help—e.g. apply for home/business connection, support, or general inquiry.">{{ old('message') }}</textarea>
          <button type="submit" class="btn btn-primary">Send Message</button>
        </form>
      </div>
    </div>
  </div>
</section>

<section class="section section-alt">
  <div class="container">
    <h2 class="section-title">Find Us</h2>
    <p class="section-subtitle">Visit our office or get in touch online. We're happy to help.</p>
    <div style="background: var(--border); border-radius: 8px; aspect-ratio: 16/6; display: flex; align-items: center; justify-content: center; color: var(--text-muted);">
      <p>Google Map embed – Replace with your embed code:<br><code>&lt;iframe src="https://www.google.com/maps/embed?pb=..."&gt;&lt;/iframe&gt;</code></p>
    </div>
  </div>
</section>
@endsection

@push('scripts')
<script>
  document.getElementById('contact-form')?.addEventListener('submit', function(e) {
    // Optional: allow form to submit to Laravel route when contact.store is implemented
    // For now you can keep this and remove it once you have a POST handler
    // e.preventDefault();
    // alert('Thank you! Your message has been sent. We will get back to you within one business day.');
  });
</script>
@endpush
