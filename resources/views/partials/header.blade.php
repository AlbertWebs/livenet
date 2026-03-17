@php
    $siteName = $siteSettings['site_name'] ?? 'Livenet Solutions';
    $contactEmail = $siteSettings['contact_email'] ?? 'info@livenetsolutions.com';
    $phone = $siteSettings['phone'] ?? '+254 712 104 104';
    $phoneDigits = preg_replace('/\D/', '', $phone);
    $phoneTel = (str_starts_with($phoneDigits, '0')) ? '+254' . substr($phoneDigits, 1) : $phoneDigits;
@endphp
<header class="main-header header-style-one">
    <!-- Header Top -->
    <div class="header-top">
        <div class="auto-container">
            <div class="inner-container">
                <div class="d-flex justify-content-between flex-wrap">
                    <ul class="header-list">
                        <li class="header-list__hours d-none d-md-inline"><span class="icon fas fa-clock fa-fw"></span>Mon - Sat: 8:00am - 6:00pm</li>
                        <li class="header-list__email d-none d-md-inline"><span class="icon fas fa-envelope fa-fw"></span><a href="mailto:{{ $contactEmail }}">{{ $contactEmail }}</a></li>
                        <li class="header-list__phone d-inline d-md-none"><span class="icon fas fa-phone-alt fa-fw"></span><a href="tel:{{ $phoneTel }}">{{ $phone }}</a></li>
                        <!-- <li class="header-list__email"><a href="#apply-modal" class="js-open-apply-modal"><span class="icon fas fa-wifi fa-fw"></span>Apply Connect</a></li> -->
                        <li class="header-list__email"><span class="icon fas fa-wifi fa-fw"></span><a href="#apply-modal" class="js-open-apply-modal" href="mailto:{{ $contactEmail }}">Apply Connect</a></li>
                        
                    </ul>
                    <div class="header-social_box d-none d-md-block">
                        <a href="https://www.facebook.com/" target="_blank" rel="noopener"><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="https://twitter.com/" target="_blank" rel="noopener"><i class="fa-brands fa-twitter"></i></a>
                        <a href="https://www.linkedin.com/" target="_blank" rel="noopener"><i class="fa-brands fa-linkedin"></i></a>
                        <a href="https://www.instagram.com/" target="_blank" rel="noopener"><i class="fa-brands fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Header Lower -->
    <div class="header-lower">
        <div class="auto-container">
            <div class="inner-container d-flex align-items-center justify-content-between">
                <div class="logo-box d-flex align-items-center">
                    <div class="logo">
                        <a href="{{ route('home') }}">
                            @if(!empty($siteSettings['logo'] ?? null))
                                <img src="{{ asset('storage/' . $siteSettings['logo']) }}" alt="{{ $siteName }}" title="" class="header-logo-img" style=" width: auto;">
                            @else
                                <img src="{{ asset('images/livenet-logo.png') }}" alt="{{ $siteName }}" title="" class="header-logo-img" style=" width: auto;">
                            @endif
                        </a>
                    </div>
                </div>

                <div class="nav-outer d-flex align-items-center">
                    <nav class="main-menu show navbar-expand-md">
                        <div class="navbar-header">
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="navbar-collapse scroll-nav collapse clearfix" id="navbarSupportedContent">
                            <ul class="navigation clearfix">
                                <li class="{{ request()->routeIs('home') ? 'current' : '' }}"><a href="{{ route('home') }}">Home</a></li>
                                <li class="{{ request()->routeIs('home-internet') ? 'current' : '' }}"><a href="{{ route('home-internet') }}">Home Internet</a></li>
                                <li class="{{ request()->routeIs('our-coverage') ? 'current' : '' }}"><a href="{{ route('our-coverage') }}">Our Coverage</a></li>
                                <li class="{{ request()->routeIs('business-communication') ? 'current' : '' }}"><a href="{{ route('business-communication') }}">Business Solutions</a></li>
                                <li class="{{ request()->routeIs('about') ? 'current' : '' }}"><a href="{{ route('about') }}">About</a></li>
                                <li class="{{ request()->routeIs('contact') ? 'current' : '' }}"><a href="{{ route('contact') }}">Contact Us</a></li>
                            </ul>
                        </div>
                    </nav>
                </div>

                <div class="outer-box d-flex align-items-center">
                    <div class="header-phone_box">
                        <div class="header-phone_box-inner">
                            <div class="header-phone_box-icon flaticon-consulting"></div>
                            Help line <br>
                            <a href="tel:{{ $phoneTel }}">{{ $phone }}</a>
                        </div>
                    </div>
                    <div class="mobile-nav-toggler"><span class="icon"><img src="{{ asset('images/icons/menu.png') }}" alt="" /></span></div>
                </div>
            </div>
        </div>
    </div>

    <style>
    .header-list__apply { border-left: 1px solid rgba(255,255,255,0.4); margin-left: 10px; padding-left: 14px; }
    .header-list__apply a { text-decoration: none; white-space: nowrap; }
    </style>
    <div class="mobile-menu">
        <div class="menu-backdrop"></div>
        <div class="close-btn"><span class="icon far fa-times fa-fw"></span></div>
        <nav class="menu-box">
            <div class="nav-logo">
                <a href="{{ route('home') }}">
                    @if(!empty($siteSettings['logo'] ?? null))
                        <img src="{{ asset('storage/' . $siteSettings['logo']) }}" alt="{{ $siteName }}" title="" class="header-logo-img" style="width: auto;">
                    @else
                        <img src="{{ asset('images/livenet-logo.png') }}" alt="{{ $siteName }}" title="" class="header-logo-img" style="width: auto;">
                    @endif
                </a>
            </div>
            <div class="menu-outer"></div>
        </nav>
    </div>
</header>
