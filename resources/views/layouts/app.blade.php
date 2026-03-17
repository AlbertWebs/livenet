<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <title>@yield('title', ($siteSettings['site_name'] ?? 'Livenet Solutions') . ' | Fast, Reliable Internet')</title>
    <meta name="description" content="@yield('meta_description', $siteSettings['seo_meta_description'] ?? 'Fast, reliable internet for home and business.')">
    @yield('meta_extra')

    <!-- Stylesheets -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet">
    <link id="theme-color-file" href="{{ asset('css/color-themes/default-color.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:opsz,wght@9..40,300;9..40,400;9..40,500;9..40,600;9..40,700;9..40,800;9..40,900;9..40,1000&display=swap" rel="stylesheet">

    <link rel="icon" type="image/png" href="{{ asset('images/livenet-favicon.png') }}">
    <link rel="shortcut icon" href="{{ asset('images/livenet-favicon.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/livenet-favicon.png') }}">
    <link rel="manifest" href="{{ asset('site.webmanifest') }}">

    @stack('styles')
</head>
<body class="relative" id="top">
    <div class="page-wrapper">
        <div class="preloader"></div>
        @include('partials.header')

        @yield('content')

        @include('partials.footer')
        @include('partials.apply-modal')
    </div>

    {{-- Floating tools: WhatsApp (bottom left), Back to top (bottom right) --}}
    @php
        $waPhone = preg_replace('/\D/', '', $siteSettings['phone'] ?? '254712104104');
        if (str_starts_with($waPhone, '0')) { $waPhone = '254' . substr($waPhone, 1); }
        if (!str_starts_with($waPhone, '254')) { $waPhone = '254' . ltrim($waPhone, '0'); }
    @endphp
    <a href="https://wa.me/{{ $waPhone }}?text=Hi%2C%20I'm%20interested%20in%20your%20internet%20services" class="float-whatsapp" target="_blank" rel="noopener noreferrer" aria-label="Chat on WhatsApp">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="28" height="28" aria-hidden="true"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
    </a>
    <a href="#top" class="float-back-to-top" id="float-back-to-top" aria-label="Back to top" style="display: none;">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" width="24" height="24" aria-hidden="true"><path d="M18 15l-6-6-6 6"/></svg>
    </a>
    <style>
    .float-whatsapp, .float-back-to-top {
        position: fixed;
        z-index: 9998;
        width: 52px;
        height: 52px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 2px 12px rgba(0,0,0,0.15);
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }
    .float-whatsapp { left: 16px; bottom: 24px; background: #25d366; color: #fff; }
    .float-whatsapp:hover { color: #fff; transform: scale(1.05); box-shadow: 0 4px 16px rgba(37, 211, 102, 0.4); }
    .float-back-to-top { right: 16px; bottom: 24px; background: var(--main-color, #338edf); color: #fff; }
    .float-back-to-top:hover { color: #fff; transform: scale(1.05); box-shadow: 0 4px 16px rgba(2, 101, 203, 0.4); }
    </style>
    <script>
    (function() {
        var b2t = document.getElementById('float-back-to-top');
        if (b2t) {
            function toggle() { b2t.style.display = window.scrollY > 300 ? 'flex' : 'none'; }
            window.addEventListener('scroll', toggle);
            toggle();
        }
    })();
    </script>

    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/magnific-popup.min.js') }}"></script>
    <script src="{{ asset('js/appear.js') }}"></script>
    <script src="{{ asset('js/parallax.min.js') }}"></script>
    <script src="{{ asset('js/tilt.jquery.min.js') }}"></script>
    <script src="{{ asset('js/swiper.min.js') }}"></script>
    <script src="{{ asset('js/wow.js') }}"></script>
    <script src="{{ asset('js/parallax-scroll.js') }}"></script>
    <script src="{{ asset('js/gsap.min.js') }}"></script>
    <script src="{{ asset('js/SplitText.min.js') }}"></script>
    <script src="{{ asset('js/ScrollTrigger.min.js') }}"></script>
    <script src="{{ asset('js/ScrollToPlugin.min.js') }}"></script>
    <script src="{{ asset('js/ScrollSmoother.min.js') }}"></script>
    <script src="{{ asset('js/odometer.js') }}"></script>
    <script src="{{ asset('js/pagenav.js') }}"></script>
    <script src="{{ asset('js/nav-tool.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    @stack('scripts')
</body>
</html>
