<div class="apply-modal" id="apply-modal" role="dialog" aria-modal="true" aria-labelledby="apply-modal-title" aria-hidden="true">
  <div class="apply-modal__backdrop" id="apply-modal-backdrop"></div>
  <div class="apply-modal__box">
    <div class="apply-modal__header">
      <h2 class="apply-modal__title" id="apply-modal-title">Apply for Connection</h2>
      <p class="apply-modal__subtitle">Fill in your details and we'll get back to you.</p>
      <button type="button" class="apply-modal__close" id="apply-modal-close" aria-label="Close">×</button>
    </div>
    <div class="apply-modal__body">
      <div class="apply-modal__message apply-modal__message--error" id="apply-modal-error" role="alert" hidden></div>
      <div class="apply-modal__message apply-modal__message--success" id="apply-modal-success" role="status" hidden></div>

      <form class="apply-modal__form" id="apply-connection-form" action="{{ route('apply-connection.store') }}" method="post">
        @csrf
        <input type="hidden" name="challenge_num1" id="apply-challenge-num1" value="">
        <input type="hidden" name="challenge_num2" id="apply-challenge-num2" value="">
        <div class="apply-modal__hp" aria-hidden="true">
          <label for="apply-website">Website</label>
          <input type="text" name="website" id="apply-website" value="" tabindex="-1" autocomplete="off">
        </div>

        <div class="apply-modal__row">
          <label for="apply-name">Name <span class="required">*</span></label>
          <input type="text" id="apply-name" name="name" required placeholder="Your full name" autocomplete="name" class="apply-modal__input">
        </div>
        <div class="apply-modal__row">
          <label for="apply-email">Email <span class="required">*</span></label>
          <input type="email" id="apply-email" name="email" required placeholder="you@example.com" autocomplete="email" class="apply-modal__input">
        </div>
        <div class="apply-modal__row">
          <label for="apply-phone">Phone</label>
          <input type="tel" id="apply-phone" name="phone" placeholder="+254 7XX XXX XXX" autocomplete="tel" class="apply-modal__input">
        </div>
        <div class="apply-modal__row">
          <label for="apply-service">Service type</label>
          <select id="apply-service" name="service" class="apply-modal__input">
            <option value="">Select...</option>
            <option value="home">Home Internet</option>
            <option value="business">Business Internet</option>
          </select>
        </div>
        <div class="apply-modal__row">
          <label for="apply-message">Message / Address (optional)</label>
          <textarea id="apply-message" name="message" rows="2" placeholder="e.g. area or physical address" class="apply-modal__input apply-modal__textarea"></textarea>
        </div>
        <div class="apply-modal__row apply-modal__challenge">
          <label for="apply-challenge-answer"><span class="apply-modal__challenge-question" id="apply-challenge-question">What is <strong id="apply-challenge-num1-display">?</strong> + <strong id="apply-challenge-num2-display">?</strong>?</span> <span class="required">*</span></label>
          <input type="number" id="apply-challenge-answer" name="challenge_answer" required placeholder="Your answer" min="0" step="1" inputmode="numeric" autocomplete="off" class="apply-modal__input">
        </div>
        <button type="submit" class="apply-modal__submit" id="apply-submit-btn">Submit Application</button>
      </form>
    </div>
  </div>
</div>

<style>
.apply-modal {
  display: none;
  position: fixed;
  inset: 0;
  z-index: 9999;
  align-items: center;
  justify-content: center;
  padding: 1rem;
  background: rgba(0, 0, 0, 0.5);
  backdrop-filter: blur(6px);
  -webkit-backdrop-filter: blur(6px);
}
.apply-modal[aria-hidden="false"] { display: flex; }
.apply-modal__backdrop {
  position: absolute;
  inset: 0;
}
.apply-modal__box {
  position: relative;
  width: 100%;
  max-width: 440px;
  background: #fff;
  border-radius: 16px;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05), 0 20px 50px rgba(0, 0, 0, 0.15), 0 0 0 1px rgba(0, 0, 0, 0.04);
  overflow: hidden;
}
.apply-modal__header {
  background: linear-gradient(to right, var(--color-two, #0a2463) 0%, var(--main-color, #0265cb) 100%);
  color: #fff;
  padding: 1.35rem 1.5rem 1.1rem;
  padding-right: 2.75rem;
}
.apply-modal__title {
  margin: 0 0 0.2em;
  font-size: 1.25rem;
  font-weight: 700;
  letter-spacing: -0.02em;
  color: #fff;
}
.apply-modal__subtitle {
  margin: 0;
  font-size: 0.875rem;
  color: rgba(255, 255, 255, 0.95);
  opacity: 1;
}
.apply-modal__close {
  position: absolute;
  top: 1rem;
  right: 1rem;
  width: 34px;
  height: 34px;
  display: flex;
  align-items: center;
  justify-content: center;
  background: rgba(255, 255, 255, 0.18);
  border: none;
  border-radius: 10px;
  color: #fff;
  font-size: 1.4rem;
  line-height: 1;
  cursor: pointer;
  transition: background 0.2s ease, transform 0.15s ease;
}
.apply-modal__close:hover {
  background: rgba(255, 255, 255, 0.3);
  transform: scale(1.05);
}
.apply-modal__close:active {
  transform: scale(0.98);
}
.apply-modal__body {
  padding: 1.35rem 1.5rem 1.5rem;
  background: #fafbfc;
}
.apply-modal__message--error {
  color: #b91c1c;
  font-size: 0.875rem;
  margin-bottom: 0.75rem;
  padding: 0.6rem 0.85rem;
  background: #fef2f2;
  border-radius: 10px;
  border-left: 4px solid #dc2626;
  transition: opacity 0.2s ease;
}
.apply-modal__message--success {
  color: #166534;
  font-size: 0.875rem;
  margin-bottom: 0.75rem;
  padding: 0.6rem 0.85rem;
  background: #f0fdf4;
  border-radius: 10px;
  border-left: 4px solid #22c55e;
  transition: opacity 0.2s ease;
}
.apply-modal__hp {
  position: absolute;
  left: -9999px;
  width: 1px;
  height: 1px;
  overflow: hidden;
}
.apply-modal__row {
  margin-bottom: 0.9rem;
}
.apply-modal__row:last-of-type { margin-bottom: 0.5rem; }
.apply-modal__row label {
  display: block;
  font-size: 0.8125rem;
  font-weight: 600;
  color: #374151;
  margin-bottom: 0.4rem;
  letter-spacing: 0.01em;
}
.apply-modal__row .required { color: #dc2626; }
.apply-modal__input {
  width: 100%;
  padding: 0.6rem 0.85rem;
  font-size: 0.9375rem;
  line-height: 1.45;
  border: 1px solid #e5e7eb;
  border-radius: 10px;
  background: #fff;
  transition: border-color 0.2s ease, box-shadow 0.2s ease, background-color 0.2s ease;
}
.apply-modal__input:hover {
  border-color: #d1d5db;
}
.apply-modal__input::placeholder {
  color: #9ca3af;
}
.apply-modal__input:focus {
  outline: none;
  border-color: var(--main-color, #0265cb);
  box-shadow: 0 0 0 3px rgba(2, 101, 203, 0.12);
  background: #fff;
}
.apply-modal__textarea {
  resize: vertical;
  min-height: 56px;
}
.apply-modal__challenge label { font-size: 0.8125rem; }
.apply-modal__challenge .apply-modal__input { width: 100%; }
.apply-modal__submit {
  width: 100%;
  margin-top: 0.75rem;
  padding: 0.75rem 1.25rem;
  font-size: 0.9375rem;
  font-weight: 600;
  color: #fff;
  background: var(--main-color, #0265cb);
  border: none;
  border-radius: 10px;
  cursor: pointer;
  box-shadow: 0 2px 8px rgba(2, 101, 203, 0.25);
  transition: background 0.2s ease, transform 0.15s ease, box-shadow 0.2s ease;
}
.apply-modal__submit:hover {
  background: #025bb5;
  box-shadow: 0 4px 14px rgba(2, 101, 203, 0.35);
  transform: translateY(-1px);
}
.apply-modal__submit:active {
  transform: translateY(0) scale(0.99);
  box-shadow: 0 2px 6px rgba(2, 101, 203, 0.2);
}
.apply-modal__submit:focus {
  outline: none;
  box-shadow: 0 0 0 3px rgba(2, 101, 203, 0.25);
}
select.apply-modal__input {
  cursor: pointer;
  appearance: none;
  background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%236b7280' d='M6 8L1 3h10z'/%3E%3C/svg%3E");
  background-repeat: no-repeat;
  background-position: right 0.85rem center;
  padding-right: 2.25rem;
}
input[type="number"].apply-modal__input {
  -moz-appearance: textfield;
}
input[type="number"].apply-modal__input::-webkit-outer-spin-button,
input[type="number"].apply-modal__input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
  var modal = document.getElementById('apply-modal');
  var openBtns = document.querySelectorAll('.js-open-apply-modal');
  var closeBtn = document.getElementById('apply-modal-close');
  var backdrop = document.getElementById('apply-modal-backdrop');
  function showModal() { if (modal) { modal.style.display = 'flex'; modal.setAttribute('aria-hidden', 'false'); } }
  function hideModal() { if (modal) { modal.style.display = 'none'; modal.setAttribute('aria-hidden', 'true'); } }
  openBtns.forEach(function(btn) { btn.addEventListener('click', function(e) { e.preventDefault(); showModal(); }); });
  if (closeBtn) closeBtn.addEventListener('click', hideModal);
  if (backdrop) backdrop.addEventListener('click', hideModal);

  var form = document.getElementById('apply-connection-form');
  if (form) {
    var n1 = Math.floor(Math.random() * 10) + 1, n2 = Math.floor(Math.random() * 10) + 1;
    document.getElementById('apply-challenge-num1').value = n1;
    document.getElementById('apply-challenge-num2').value = n2;
    var d1 = document.getElementById('apply-challenge-num1-display');
    var d2 = document.getElementById('apply-challenge-num2-display');
    if (d1) d1.textContent = n1;
    if (d2) d2.textContent = n2;
    form.addEventListener('submit', function(e) {
      e.preventDefault();
      var errEl = document.getElementById('apply-modal-error');
      var okEl = document.getElementById('apply-modal-success');
      var fd = new FormData(form);
      fetch(form.action, { method: 'POST', body: fd, headers: { 'X-Requested-With': 'XMLHttpRequest', 'Accept': 'application/json' } })
        .then(function(r) { return r.json().then(function(d) { return { ok: r.ok, data: d }; }); })
        .then(function(r) {
          if (r.ok && r.data.success) { okEl.hidden = false; okEl.textContent = r.data.message || 'Thank you!'; errEl.hidden = true; form.reset(); }
          else { errEl.hidden = false; errEl.textContent = (r.data && r.data.message) || 'Something went wrong.'; okEl.hidden = true; }
        })
        .catch(function() { errEl.hidden = false; errEl.textContent = 'Network error. Please try again.'; okEl.hidden = true; });
    });
  }
});
</script>
