<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Livenet Solutions')</title>
  <meta name="description" content="@yield('meta_description', 'Fast, reliable internet for home and business.')">
  @hasSection('og_title')
    <meta property="og:title" content="@yield('og_title')">
    <meta property="og:description" content="@yield('og_description')">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
  @endif
  <link rel="canonical" href="@yield('canonical', url()->current())">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,400;0,9..40,500;0,9..40,600;0,9..40,700;1,9..40,400&family=Plus+Jakarta+Sans:wght@600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
  @yield('jsonld')
<style>
  .page-preloader {
    position: fixed;
    inset: 0;
    z-index: 9999;
    background: #0a1628;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 1rem;
    transition: opacity 0.4s ease, visibility 0.4s ease;
  }
  .page-preloader.hidden {
    opacity: 0;
    visibility: hidden;
    pointer-events: none;
  }
  .page-preloader__wifi {
    width: 80px;
    height: 80px;
    animation: preloader-pulse 1.2s ease-in-out infinite;
  }
  .page-preloader__wifi path {
    fill: none;
    stroke: #00a3e0;
    stroke-width: 3;
    stroke-linecap: round;
  }
  .page-preloader__wifi path:first-of-type {
    fill: #00a3e0;
    stroke: none;
  }
  .page-preloader__text {
    color: rgba(255,255,255,0.8);
    font-size: 14px;
    font-family: inherit;
  }
  @keyframes preloader-pulse {
    0%, 100% { opacity: 1; transform: scale(1); }
    50% { opacity: 0.7; transform: scale(1.08); }
  }
</style>
</head>
<body>
  <div class="page-preloader" id="page-preloader" aria-hidden="true">
    <svg class="page-preloader__wifi" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
      <path d="M32 44a4 4 0 1 1 0 8 4 4 0 0 1 0-8z"/>
      <path d="M32 28c-6.6 0-12.6 2.6-17 6.8l2.8 2.8A14 14 0 0 1 32 32c5.2 0 9.8 2.1 13.2 5.4l2.8-2.8A22 22 0 0 0 32 28z"/>
      <path d="M32 16C20.4 16 10.2 21.4 4 29.2l2.8 2.8C12.4 25 21.2 20 32 20s19.6 5 25.2 12l2.8-2.8C53.8 21.4 43.6 16 32 16z"/>
      <path d="M32 4C16.5 4 3.2 12.2 0 24l2.8 2.8C5.6 15.2 17.8 8 32 8s26.4 7.2 29.2 18.8L64 24C60.8 12.2 47.5 4 32 4z"/>
    </svg>
    <span class="page-preloader__text">Connecting...</span>
  </div>
  @include('partials.top-bar')
  @include('partials.header')

  <main>
    @yield('content')
  </main>

  @include('partials.footer')
  @include('partials.apply-modal')

  <script>
    window.addEventListener('load', function() {
      var preloader = document.getElementById('page-preloader');
      if (preloader) preloader.classList.add('hidden');
    });
    document.getElementById('menu-toggle')?.addEventListener('click', function() {
      var menu = document.getElementById('nav-menu');
      var open = menu?.classList.toggle('open');
      this.setAttribute('aria-expanded', open ? 'true' : 'false');
    });
    window.addEventListener('scroll', function() {
      var h = document.getElementById('main-header');
      if (h) h.classList.toggle('scrolled', window.scrollY > 20);
    });

    (function() {
      var modal = document.getElementById('apply-modal');
      var form = document.getElementById('apply-connection-form');
      var backdrop = document.getElementById('apply-modal-backdrop');
      var closeBtn = document.getElementById('apply-modal-close');
      var errorEl = document.getElementById('apply-modal-error');
      var successEl = document.getElementById('apply-modal-success');
      var num1Input = document.getElementById('apply-challenge-num1');
      var num2Input = document.getElementById('apply-challenge-num2');
      var num1Display = document.getElementById('apply-challenge-num1-display');
      var num2Display = document.getElementById('apply-challenge-num2-display');
      var answerInput = document.getElementById('apply-challenge-answer');
      var submitBtn = document.getElementById('apply-submit-btn');

      function randomInt(min, max) {
        return Math.floor(Math.random() * (max - min + 1)) + min;
      }

      function setChallenge() {
        var n1 = randomInt(1, 15);
        var n2 = randomInt(1, 15);
        num1Input.value = n1;
        num2Input.value = n2;
        if (num1Display) num1Display.textContent = n1;
        if (num2Display) num2Display.textContent = n2;
        if (answerInput) answerInput.value = '';
      }

      function openModal() {
        if (!modal) return;
        setChallenge();
        errorEl.hidden = true;
        successEl.hidden = true;
        modal.classList.add('is-open');
        modal.setAttribute('aria-hidden', 'false');
        document.body.style.overflow = 'hidden';
        if (answerInput) answerInput.focus();
      }

      function closeModal() {
        if (!modal) return;
        modal.classList.remove('is-open');
        modal.setAttribute('aria-hidden', 'true');
        document.body.style.overflow = '';
      }

      function showError(msg) {
        errorEl.textContent = msg;
        errorEl.hidden = false;
        successEl.hidden = true;
      }

      function showSuccess(msg) {
        successEl.textContent = msg;
        successEl.hidden = false;
        errorEl.hidden = true;
      }

      document.querySelectorAll('.btn-apply, .js-open-apply-modal, a[href*="#apply"]').forEach(function(el) {
        el.addEventListener('click', function(e) {
          if (el.getAttribute('href') === '#' || (el.getAttribute('href') && el.getAttribute('href').indexOf('#apply') !== -1)) {
            e.preventDefault();
          }
          openModal();
        });
      });

      if (backdrop) backdrop.addEventListener('click', closeModal);
      if (closeBtn) closeBtn.addEventListener('click', closeModal);

      modal && modal.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') closeModal();
      });

      if (form) {
        form.addEventListener('submit', function(e) {
          e.preventDefault();
          var expected = parseInt(num1Input.value, 10) + parseInt(num2Input.value, 10);
          var answer = parseInt(answerInput.value, 10);
          if (answer !== expected) {
            showError('Please solve the arithmetic question correctly.');
            return;
          }
          submitBtn.disabled = true;
          errorEl.hidden = true;
          var action = form.getAttribute('action');
          var body = new FormData(form);
          fetch(action, {
            method: 'POST',
            body: body,
            headers: {
              'X-Requested-With': 'XMLHttpRequest',
              'Accept': 'application/json'
            }
          })
            .then(function(r) { return r.json().then(function(data) { return { ok: r.ok, data: data }; }); })
            .then(function(result) {
              if (result.ok && result.data.success) {
                showSuccess(result.data.message || 'Thank you! Your application has been submitted.');
                form.reset();
                setChallenge();
                setTimeout(closeModal, 2000);
              } else {
                showError(result.data.message || (result.data.errors ? Object.values(result.data.errors).flat().join(' ') : 'Something went wrong. Please try again.'));
              }
            })
            .catch(function() {
              showError('Network error. Please try again.');
            })
            .finally(function() {
              submitBtn.disabled = false;
            });
        });
      }
    })();
  </script>
  @stack('scripts')
</body>
</html>
