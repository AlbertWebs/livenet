@php
  $phone = $siteSettings['phone'] ?? '0712 104104';
  $email = $siteSettings['contact_email'] ?? 'info@livenetsolutions.com';
  $address = $siteSettings['address'] ?? 'Nairobi, Kenya';
  $digits = preg_replace('/\D/', '', $phone);
  $telHref = (str_starts_with($digits, '0')) ? 'tel:+254' . substr($digits, 1) : 'tel:+' . $digits;
@endphp
<div class="top-bar">
  <div class="top-bar-inner">
    <a href="{{ $telHref }}" class="top-bar-link"><span class="top-bar-icon" aria-hidden="true">📞</span> {{ $phone }}</a>
    <span class="separator">|</span>
    <a href="mailto:{{ $email }}" class="top-bar-link"><span class="top-bar-icon" aria-hidden="true">✉</span> {{ $email }}</a>
    <span class="separator">|</span>
    <span class="top-bar-location"><span class="top-bar-icon" aria-hidden="true">📍</span> {{ $address }}</span>
  </div>
</div>
