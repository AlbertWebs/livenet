/**
 * Site bundle: apply modal + apply triggers (incl. bottom nav Apply button).
 * Loaded via Vite on the main front layout.
 */
(function () {
  const modal = document.getElementById('apply-modal');
  const form = document.getElementById('apply-connection-form');
  const backdrop = document.getElementById('apply-modal-backdrop');
  const closeBtn = document.getElementById('apply-modal-close');
  const errorEl = document.getElementById('apply-modal-error');
  const successEl = document.getElementById('apply-modal-success');
  const num1Input = document.getElementById('apply-challenge-num1');
  const num2Input = document.getElementById('apply-challenge-num2');
  const num1Display = document.getElementById('apply-challenge-num1-display');
  const num2Display = document.getElementById('apply-challenge-num2-display');
  const answerInput = document.getElementById('apply-challenge-answer');
  const submitBtn = document.getElementById('apply-submit-btn');

  function randomInt(min, max) {
    return Math.floor(Math.random() * (max - min + 1)) + min;
  }

  function setChallenge() {
    const n1 = randomInt(1, 15);
    const n2 = randomInt(1, 15);
    if (num1Input) num1Input.value = n1;
    if (num2Input) num2Input.value = n2;
    if (num1Display) num1Display.textContent = n1;
    if (num2Display) num2Display.textContent = n2;
    if (answerInput) answerInput.value = '';
  }

  function openModal() {
    if (!modal) return;
    setChallenge();
    if (errorEl) errorEl.hidden = true;
    if (successEl) successEl.hidden = true;
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
    if (!errorEl) return;
    errorEl.textContent = msg;
    errorEl.hidden = false;
    if (successEl) successEl.hidden = true;
  }

  function showSuccess(msg) {
    if (!successEl) return;
    successEl.textContent = msg;
    successEl.hidden = false;
    if (errorEl) errorEl.hidden = true;
  }

  function isApplyTrigger(el) {
    if (!el || !el.closest) return false;
    return !!el.closest('.btn-apply, .js-open-apply-modal, a[href*="#apply"]');
  }

  function handleApplyClick(e) {
    if (!isApplyTrigger(e.target)) return;
    const trigger = e.target.closest('.btn-apply, .js-open-apply-modal, a[href*="#apply"]');
    if (trigger && (trigger.getAttribute('href') === '#' || (trigger.getAttribute('href') || '').indexOf('#apply') !== -1)) {
      e.preventDefault();
    }
    openModal();
  }

  document.body.addEventListener('click', handleApplyClick, true);
  document.body.addEventListener(
    'touchend',
    (e) => {
      if (isApplyTrigger(e.target)) {
        e.preventDefault();
        openModal();
      }
    },
    { passive: false, capture: true }
  );

  if (backdrop) backdrop.addEventListener('click', closeModal);
  if (closeBtn) closeBtn.addEventListener('click', closeModal);
  if (modal) modal.addEventListener('keydown', (e) => { if (e.key === 'Escape') closeModal(); });

  if (form && num1Input && num2Input && answerInput && submitBtn) {
    form.addEventListener('submit', (e) => {
      e.preventDefault();
      const expected = parseInt(num1Input.value, 10) + parseInt(num2Input.value, 10);
      const answer = parseInt(answerInput.value, 10);
      if (answer !== expected) {
        showError('Please solve the arithmetic question correctly.');
        return;
      }
      const submitBtnLabel = submitBtn.innerHTML;
      submitBtn.disabled = true;
      submitBtn.innerHTML = '<span class="apply-modal__submit-spinner" aria-hidden="true"></span> Submitting…';
      submitBtn.setAttribute('aria-busy', 'true');
      if (errorEl) errorEl.hidden = true;
      const action = form.getAttribute('action');
      const body = new FormData(form);
      fetch(action, {
        method: 'POST',
        body,
        headers: {
          'X-Requested-With': 'XMLHttpRequest',
          Accept: 'application/json',
        },
      })
        .then((r) => r.json().then((data) => ({ ok: r.ok, data })))
        .then((result) => {
          if (result.ok && result.data.success) {
            showSuccess(result.data.message || 'Thank you! Your application has been submitted.');
            form.reset();
            setChallenge();
            setTimeout(closeModal, 2000);
          } else {
            showError(
              result.data.message ||
                (result.data.errors ? Object.values(result.data.errors).flat().join(' ') : 'Something went wrong. Please try again.')
            );
          }
        })
        .catch(() => showError('Network error. Please try again.'))
        .finally(() => {
          submitBtn.disabled = false;
          submitBtn.innerHTML = submitBtnLabel;
          submitBtn.removeAttribute('aria-busy');
        });
    });
  }
})();
