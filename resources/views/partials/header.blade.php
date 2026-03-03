<header class="main-header" id="main-header">
  <div class="header-accent"></div>
  <div class="nav-inner">
    <a href="{{ route('home') }}" class="logo">
      @if(!empty($siteSettings['logo'] ?? null))
        <img src="{{ asset('storage/' . $siteSettings['logo']) }}" alt="{{ $siteSettings['site_name'] ?? 'Livenet Solutions' }}" class="logo-img" width="160" height="40">
      @else
        <img src="{{ asset('logo.png') }}" alt="{{ $siteSettings['site_name'] ?? 'Livenet Solutions' }}" class="logo-img" width="160" height="40">
      @endif
    </a>
    <button class="menu-toggle" id="menu-toggle" aria-label="Toggle menu">
      <span></span><span></span><span></span>
    </button>
    <nav class="nav-center">
      <ul class="nav-menu" id="nav-menu">
        <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'nav-menu__link--active' : '' }}">Home</a></li>
        <li><a href="{{ route('home-internet') }}" class="{{ request()->routeIs('home-internet') ? 'nav-menu__link--active' : '' }}">Home Internet</a></li>
        <li><a href="{{ route('business-internet') }}" class="{{ request()->routeIs('business-internet') ? 'nav-menu__link--active' : '' }}">Business Internet</a></li>
        <li><a href="{{ route('our-coverage') }}" class="{{ request()->routeIs('our-coverage') ? 'nav-menu__link--active' : '' }}">Our Coverage</a></li>
        <li><a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'nav-menu__link--active' : '' }}">Contact Us</a></li>
      </ul>
    </nav>
    <a href="#" class="btn btn-primary btn-apply js-open-apply-modal">
      <span class="btn-apply__wifi" aria-hidden="true">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true">
          <path d="M5 12.55a11 11 0 0 1 14.08 0"/>
          <path d="M1.42 9a16 16 0 0 1 21.16 0"/>
          <path d="M8.53 16.11a6 6 0 0 1 6.95 0"/>
          <circle cx="12" cy="20" r="1"/>
        </svg>
      </span>
      <span class="btn-apply__text--long">Apply for Connection</span><span class="btn-apply__text--short">Apply</span></a>
  </div>
</header>
