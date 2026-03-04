<nav class="bottom-nav" id="bottom-nav" aria-label="Mobile navigation">
  <a href="{{ route('home') }}" class="bottom-nav__link {{ request()->routeIs('home') && !request()->routeIs('home-internet') && !request()->routeIs('business-internet') ? 'bottom-nav__link--active' : '' }}">
    <span class="bottom-nav__icon" aria-hidden="true">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
    </span>
    <span class="bottom-nav__label">Home</span>
  </a>
  <a href="{{ route('home-internet') }}" class="bottom-nav__link {{ request()->routeIs('home-internet') ? 'bottom-nav__link--active' : '' }}">
    <span class="bottom-nav__icon" aria-hidden="true">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12.55a11 11 0 0 1 14.08 0"/><path d="M1.42 9a16 16 0 0 1 21.16 0"/><path d="M8.53 16.11a6 6 0 0 1 6.95 0"/><circle cx="12" cy="20" r="1"/></svg>
    </span>
    <span class="bottom-nav__label">Internet</span>
  </a>
  <a href="{{ route('business-internet') }}" class="bottom-nav__link {{ request()->routeIs('business-internet') ? 'bottom-nav__link--active' : '' }}">
    <span class="bottom-nav__icon" aria-hidden="true">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/></svg>
    </span>
    <span class="bottom-nav__label">Business</span>
  </a>
  <a href="#" class="bottom-nav__link bottom-nav__link--apply js-open-apply-modal" role="button" aria-label="Open apply for connection form">
    <span class="bottom-nav__icon" aria-hidden="true">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/></svg>
    </span>
    <span class="bottom-nav__label">Apply</span>
  </a>
</nav>
