/* Tour Coach Lease — interactions & animations */
(function () {
  'use strict';
  document.documentElement.classList.remove('no-js');

  /* Sticky header shadow + back-to-top */
  var header = document.getElementById('header');
  var toTop = document.getElementById('toTop');
  function onScroll() {
    var y = window.scrollY;
    if (header) header.classList.toggle('is-scrolled', y > 10);
    if (toTop) toTop.classList.toggle('is-visible', y > 600);
  }
  window.addEventListener('scroll', onScroll, { passive: true });
  onScroll();
  if (toTop) toTop.addEventListener('click', function () { window.scrollTo({ top: 0, behavior: 'smooth' }); });

  /* Mobile menu */
  var burger = document.getElementById('burger');
  var nav = document.getElementById('nav');
  if (burger && nav) {
    burger.addEventListener('click', function () {
      var open = nav.classList.toggle('is-open');
      burger.classList.toggle('is-open', open);
      burger.setAttribute('aria-expanded', open);
    });
  }

  /* Scroll reveal */
  var targets = document.querySelectorAll('.reveal, .stagger, .step');
  if ('IntersectionObserver' in window) {
    var io = new IntersectionObserver(function (entries) {
      entries.forEach(function (en) {
        if (en.isIntersecting) { en.target.classList.add('is-visible'); io.unobserve(en.target); }
      });
    }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });
    targets.forEach(function (t) { io.observe(t); });
  } else {
    targets.forEach(function (t) { t.classList.add('is-visible'); });
  }

  /* Count-up numbers (step numbers 01-04) */
  document.querySelectorAll('[data-count]').forEach(function (el) {
    var end = parseInt(el.getAttribute('data-count'), 10);
    var started = false;
    var obs = new IntersectionObserver(function (en) {
      if (!en[0].isIntersecting || started) return;
      started = true;
      var t0 = performance.now(), dur = 900;
      (function tick(now) {
        var p = Math.min((now - t0) / dur, 1);
        el.textContent = String(Math.round(end * (1 - Math.pow(1 - p, 3)))).padStart(2, '0');
        if (p < 1) requestAnimationFrame(tick);
      })(t0);
    }, { threshold: 0.6 });
    obs.observe(el);
  });

  /* Subtle parallax on hero image */
  var heroImg = document.querySelector('.hero__img');
  if (heroImg && window.matchMedia('(min-width: 900px)').matches) {
    window.addEventListener('scroll', function () {
      heroImg.style.transform = 'translateY(' + window.scrollY * 0.08 + 'px)';
    }, { passive: true });
  }

  /* FAQ accordion */
  document.querySelectorAll('.faq__q').forEach(function (btn) {
    btn.addEventListener('click', function () {
      var item = btn.parentElement;
      var open = !item.classList.contains('is-open');
      document.querySelectorAll('.faq__item.is-open').forEach(function (o) {
        o.classList.remove('is-open'); o.querySelector('.faq__q').setAttribute('aria-expanded', 'false');
      });
      item.classList.toggle('is-open', open);
      btn.setAttribute('aria-expanded', open);
    });
  });

  /* Gallery lightbox */
  var items = Array.prototype.slice.call(document.querySelectorAll('.gallery__item'));
  if (items.length) {
    var lb = document.createElement('div');
    lb.className = 'lightbox';
    lb.setAttribute('role', 'dialog');
    lb.innerHTML = '<button class="lb-close" aria-label="Close">&times;</button>' +
      '<button class="lb-prev" aria-label="Previous">&#8249;</button>' +
      '<figure class="lightbox__fig"><img alt=""><figcaption></figcaption></figure>' +
      '<button class="lb-next" aria-label="Next">&#8250;</button>';
    document.body.appendChild(lb);
    var img = lb.querySelector('img'), cap = lb.querySelector('figcaption'), idx = 0;
    function show(i) {
      idx = (i + items.length) % items.length;
      var it = items[idx];
      img.src = it.getAttribute('data-full') || it.querySelector('img').src;
      img.alt = cap.textContent = it.getAttribute('data-caption') || '';
    }
    function open(i) { show(i); lb.classList.add('is-open'); document.body.style.overflow = 'hidden'; }
    function close() { lb.classList.remove('is-open'); document.body.style.overflow = ''; }
    items.forEach(function (it, i) { it.addEventListener('click', function () { open(i); }); });
    lb.querySelector('.lb-close').addEventListener('click', close);
    lb.querySelector('.lb-prev').addEventListener('click', function () { show(idx - 1); });
    lb.querySelector('.lb-next').addEventListener('click', function () { show(idx + 1); });
    lb.addEventListener('click', function (e) { if (e.target === lb) close(); });
    document.addEventListener('keydown', function (e) {
      if (!lb.classList.contains('is-open')) return;
      if (e.key === 'Escape') close();
      if (e.key === 'ArrowLeft') show(idx - 1);
      if (e.key === 'ArrowRight') show(idx + 1);
    });
  }

  /* Quote form: preselect from ?service= / ?layout=, validate, submit via fetch */
  var form = document.getElementById('quoteForm');
  if (form) {
    var params = new URLSearchParams(location.search);
    var svc = params.get('service'), layout = params.get('layout');
    if (svc && form.service) form.service.value = svc;
    if (layout && form.details && !form.details.value) form.details.value = 'Interested in the ' + layout + ' layout. ';

    var startEl = form.querySelector('[name=start_date]');
    var endEl = form.querySelector('[name=end_date]');
    var today = new Date().toISOString().slice(0, 10);
    if (startEl) startEl.min = today;
    if (startEl && endEl) startEl.addEventListener('change', function () { endEl.min = startEl.value || today; });

    function setErr(name, msg) {
      var f = form.querySelector('[name="' + name + '"]');
      if (!f) return;
      var wrap = f.closest('.field');
      wrap.classList.toggle('has-error', !!msg);
      var err = wrap.querySelector('.field__err');
      if (err) err.textContent = msg || '';
    }
    function validate() {
      var ok = true;
      ['name', 'email', 'service', 'start_date'].forEach(function (n) { setErr(n, ''); });
      if (!form.name.value.trim()) { setErr('name', 'Please add your name.'); ok = false; }
      if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(form.email.value.trim())) { setErr('email', 'Enter a valid email.'); ok = false; }
      if (!form.service.value) { setErr('service', 'Pick what you need.'); ok = false; }
      if (!form.start_date.value) { setErr('start_date', 'Add a start date.'); ok = false; }
      if (endEl.value && startEl.value && endEl.value < startEl.value) { setErr('start_date', 'Start must be before end.'); ok = false; }
      return ok;
    }
    form.querySelectorAll('input,select,textarea').forEach(function (f) {
      f.addEventListener('input', function () { var w = f.closest('.field'); if (w) { w.classList.remove('has-error'); var e = w.querySelector('.field__err'); if (e) e.textContent = ''; } });
    });

    form.addEventListener('submit', function (e) {
      e.preventDefault();
      if (!validate()) { var bad = form.querySelector('.has-error'); if (bad) bad.scrollIntoView({ behavior: 'smooth', block: 'center' }); return; }
      var btn = form.querySelector('button[type=submit]');
      var box = document.getElementById('formMsg');
      btn.classList.add('is-loading'); btn.disabled = true;
      // Works with both versions:
      //  - PHP version: posts to send-quote.php (returns {ok, message, errors})
      //  - HTML version (GitHub Pages): posts to FormSubmit.co (returns {success, message})
      var isPhp = /\.php($|\?)/.test(form.getAttribute('action'));
      var who = form.name.value.trim().replace(/[<>&"]/g, '');
      var headers = { 'Accept': 'application/json' };
      if (isPhp) headers['X-Requested-With'] = 'fetch';
      fetch(form.action, { method: 'POST', body: new FormData(form), headers: headers })
        .then(function (r) { return r.json(); })
        .then(function (res) {
          var ok = res.ok === true || res.success === true || res.success === 'true';
          var msg = isPhp && res.message ? res.message
            : ok ? 'Thanks, ' + who + ' — your request is in. We\'ll reply with coach options and an all-in quote within one business day.'
                 : 'Sorry, that didn\'t go through. Please email us or call dispatch.';
          box.innerHTML = '<div class="alert ' + (ok ? 'alert--ok' : 'alert--err') + '">' + msg + '</div>';
          if (ok) form.reset();
          if (res.errors) Object.keys(res.errors).forEach(function (k) { setErr(k, res.errors[k]); });
        })
        .catch(function () {
          if (isPhp) { form.submit(); return; } // normal POST fallback
          box.innerHTML = '<div class="alert alert--err">Network error. Please try again, or call us at (888) 555-0148.</div>';
        })
        .finally(function () { btn.classList.remove('is-loading'); btn.disabled = false; box.scrollIntoView({ behavior: 'smooth', block: 'center' }); });
    });
  }
})();
