<footer class="footer">
  <div class="footer-inner">
    <div class="footer-grid">
      <div class="footer-brand">
        <div class="logo">Livenet <span>Solutions</span></div>
        <p>Fast, reliable internet for home and business. We keep you connected so you can stream, work, and grow.</p>
        <div class="newsletter">
          <input type="email" placeholder="Your email" aria-label="Email for newsletter">
          <button type="button" class="btn btn-primary">Subscribe</button>
        </div>
      </div>
      <div>
        <h4>Services</h4>
        <ul>
          <li><a href="{{ route('home-internet') }}">Home Internet</a></li>
          <li><a href="{{ route('business-internet') }}">Business Internet</a></li>
          <li><a href="{{ route('contact') }}#apply">Apply for Connection</a></li>
        </ul>
      </div>
      <div>
        <h4>Company</h4>
        <ul>
          <li><a href="{{ route('home') }}">Home</a></li>
          <li><a href="{{ route('articles') }}">Articles</a></li>
          <li><a href="{{ route('contact') }}">Contact Us</a></li>
        </ul>
      </div>
      <div>
        <h4>Contact</h4>
        <ul>
          <li><a href="tel:+254722539540">+254 722 539540</a></li>
          <li><a href="mailto:info@livenetsolutions.com">info@livenetsolutions.com</a></li>
        </ul>
      </div>
    </div>
    <div class="footer-bottom">
      <p>© {{ date('Y') }} Livenet Solutions. All rights reserved.</p>
      <div class="social-links">
        <a href="#" aria-label="Facebook">f</a>
        <a href="#" aria-label="Twitter">𝕏</a>
        <a href="#" aria-label="LinkedIn">in</a>
      </div>
    </div>
  </div>
</footer>
