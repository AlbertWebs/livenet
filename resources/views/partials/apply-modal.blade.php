<div class="apply-modal" id="apply-modal" role="dialog" aria-modal="true" aria-labelledby="apply-modal-title" aria-hidden="true">
  <div class="apply-modal__backdrop" id="apply-modal-backdrop"></div>
  <div class="apply-modal__box">
    <button type="button" class="apply-modal__close" id="apply-modal-close" aria-label="Close">×</button>
    <h2 class="apply-modal__title" id="apply-modal-title">Apply for Connection</h2>
    <p class="apply-modal__subtitle">Fill in your details and we’ll get back to you.</p>

    <div class="apply-modal__message apply-modal__message--error" id="apply-modal-error" role="alert" hidden></div>
    <div class="apply-modal__message apply-modal__message--success" id="apply-modal-success" role="status" hidden></div>

    <form class="apply-modal__form" id="apply-connection-form" action="{{ route('apply-connection.store') }}" method="post">
      @csrf
      <input type="hidden" name="challenge_num1" id="apply-challenge-num1" value="">
      <input type="hidden" name="challenge_num2" id="apply-challenge-num2" value="">

      <label for="apply-name">Name <span class="required">*</span></label>
      <input type="text" id="apply-name" name="name" required placeholder="Your full name" autocomplete="name">

      <label for="apply-email">Email <span class="required">*</span></label>
      <input type="email" id="apply-email" name="email" required placeholder="you@example.com" autocomplete="email">

      <label for="apply-phone">Phone</label>
      <input type="tel" id="apply-phone" name="phone" placeholder="+254 7XX XXX XXX" autocomplete="tel">

      <label for="apply-service">Service type</label>
      <select id="apply-service" name="service">
        <option value="">Select...</option>
        <option value="home">Home Internet</option>
        <option value="business">Business Internet</option>
      </select>

      <label for="apply-message">Message / Address (optional)</label>
      <textarea id="apply-message" name="message" rows="3" placeholder="e.g. area or physical address"></textarea>

      <div class="apply-modal__challenge">
        <label for="apply-challenge-answer"><span class="apply-modal__challenge-question" id="apply-challenge-question">What is <strong id="apply-challenge-num1-display">?</strong> + <strong id="apply-challenge-num2-display">?</strong>?</span> <span class="required">*</span></label>
        <input type="number" id="apply-challenge-answer" name="challenge_answer" required placeholder="Your answer" min="0" step="1" inputmode="numeric" autocomplete="off">
      </div>

      <button type="submit" class="btn btn-primary apply-modal__submit" id="apply-submit-btn">Submit Application</button>
    </form>
  </div>
</div>
