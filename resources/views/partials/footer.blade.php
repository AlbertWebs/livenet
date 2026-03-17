@php
    $siteName = $siteSettings['site_name'] ?? 'Livenet Solutions';
    $footerPhone = $siteSettings['phone'] ?? '+254 712 104 104';
    $footerEmail = $siteSettings['contact_email'] ?? 'info@livenetsolutions.com';
    $footerAddress = $siteSettings['address'] ?? 'Nairobi, Kenya';
@endphp
<footer class="main-footer" id="footer">
    <div class="footer_pattern" style="background-image: url({{ asset('images/background/footer-pattern-1.png') }})"></div>
    <div class="footer_pattern_two" style="background-image: url({{ asset('images/background/footer-pattern-2.png') }})"></div>
    <div class="auto-container">
        <div class="inner-container">
            <div class="widgets-section">
                <div class="row clearfix">
                    <div class="big-column col-lg-6 col-md-12 col-sm-12">
                        <div class="row clearfix">
                            <div class="footer_column col-lg-7 col-md-6 col-sm-12">
                                <div class="footer-widget footer-two_logo-widget">
                                    <div class="footer-logo">
                                        <a href="{{ route('home') }}">
                                            @if(!empty($siteSettings['logo'] ?? null))
                                                <img src="{{ asset('storage/' . $siteSettings['logo']) }}" alt="{{ $siteName }}" title="" class="footer-logo-img" style=" width: auto;">
                                            @else
                                                <img src="{{ asset('images/livenet-logo.png') }}" alt="{{ $siteName }}" title="" class="footer-logo-img" style=" width: auto;">
                                            @endif
                                        </a>
                                    </div>
                                    <div class="footer-text">
                                        {{ $siteName }} delivers fast, reliable internet for home and business. We keep you connected.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="big-column col-lg-6 col-md-12 col-sm-12">
                        <div class="row clearfix">
                            <div class="footer_column col-lg-5 col-md-6 col-sm-12">
                                <div class="footer-widget links-widget">
                                    <h5 class="footer-title">Quick Links</h5>
                                    <ul class="footer-list">
                                        <li><a href="{{ route('home') }}">Home</a></li>
                                        <li><a href="{{ route('home-internet') }}">Home Internet</a></li>
                                        <li><a href="{{ route('business-internet') }}">Business Internet</a></li>
                                        <li><a href="{{ route('our-coverage') }}">Our Coverage</a></li>
                                        <li><a href="{{ route('articles') }}">Articles</a></li>
                                        <li><a href="{{ route('contact') }}">Contact Us</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="footer_column col-lg-6 col-md-6 col-sm-12">
                                <div class="footer-widget contact-widget">
                                    <h5 class="footer-title">Contact Info</h5>
                                    <ul class="footer-contact_list">
                                        <li><span class="icon fas fa-map-marker-alt fa-fw"></span>{{ $footerAddress }}</li>
                                        <li><span class="icon fas fa-envelope fa-fw"></span><a href="mailto:{{ $footerEmail }}">{{ $footerEmail }}</a></li>
                                        <li><span class="icon fas fa-phone fa-fw"></span><a href="tel:{{ preg_replace('/\D/', '', $footerPhone) }}">{{ $footerPhone }}</a></li>
                                    </ul>
                                    <div class="footer_socials">
                                        <a href="https://facebook.com/" target="_blank" rel="noopener"><i class="fa-brands fa-facebook-f"></i></a>
                                        <a href="https://twitter.com/" target="_blank" rel="noopener"><i class="fa-brands fa-twitter"></i></a>
                                        <a href="https://www.linkedin.com/" target="_blank" rel="noopener"><i class="fa-brands fa-linkedin"></i></a>
                                        <a href="https://instagram.com/" target="_blank" rel="noopener"><i class="fa-brands fa-instagram"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="auto-container">
            <div class="main-footer_copyright">© {{ date('Y') }} {{ $siteName }}. All rights reserved. <span class="footer-powered">Powered by <a href="https://designekta.com/" target="_blank" rel="noopener noreferrer">Designekta Studios</a></span></div>
        </div>
    </div>
</footer>
<style>
/* Footer overrides: softer contact text, reduced padding, no overlap with section above */
.main-footer .widgets-section {
    margin-top: 0 !important;
    padding: 60px 0 28px !important;
}
.main-footer .footer-contact_list li,
.main-footer .footer-contact_list li a {
    color: rgba(255, 255, 255, 0.88) !important;
}
.main-footer .footer-contact_list li a:hover {
    color: rgba(255, 255, 255, 1) !important;
}
.main-footer .footer-title {
    margin-bottom: 0.75rem !important;
}
.main-footer .footer_column {
    margin-bottom: 1rem !important;
}
.main-footer .footer-contact_list li {
    margin-bottom: 0.5rem !important;
    padding-left: 1.75rem !important;
}
.main-footer .footer-logo {
    margin-bottom: 0.75rem !important;
}
.main-footer .footer_socials {
    margin-top: 1rem !important;
}
.main-footer .footer-bottom .main-footer_copyright {
    padding: 12px 0 !important;
}
.main-footer .footer-powered {
    margin-left: 0.35em;
    opacity: 0.9;
}
.main-footer .footer-powered a {
    color: inherit;
    text-decoration: none;
    border-bottom: 1px solid rgba(255,255,255,0.4);
    transition: opacity 0.2s ease;
}
.main-footer .footer-powered a:hover {
    opacity: 1;
    border-bottom-color: rgba(255,255,255,0.8);
}
</style>
