<?php
$page_title = 'Contact & Quote | Tour Coach Lease';
$page_desc  = 'Request an all-in tour coach quote. Reply within one business day.';
require __DIR__ . '/includes/header.php';

// Flash message from a non-JS form post (see send-quote.php)
$flash = $_SESSION['flash'] ?? null; unset($_SESSION['flash']);
$old   = $_SESSION['old'] ?? [];      unset($_SESSION['old']);
$errs  = $flash['errors'] ?? [];
function old($k, $d = '') { global $old; return e($old[$k] ?? $d); }
function sel($k, $v)      { global $old; return (($old[$k] ?? '') === $v) ? ' selected' : ''; }
function errc($k)         { global $errs; return isset($errs[$k]) ? ' has-error' : ''; }
function errm($k)         { global $errs; return e($errs[$k] ?? ''); }

$services = ['leasing' => 'Coach leasing (full tour)', 'rental' => 'Tour bus rental (short run)', 'trucking' => 'Tour trucking / trailer', 'combo' => 'Coach + trucking package', 'other' => 'Not sure yet'];
$party    = ['1-4 people', '5-8 people', '9-12 people', '13+ people (multiple coaches)'];

$faqs = [
  ['How far ahead should we book?', 'As early as your routing allows. Four to eight weeks out gives you the widest choice of coaches, especially in festival and holiday season, but we can often turn around last-minute dates too — call dispatch and we will check what is available.'],
  ['Is the driver included in the price?', 'Yes. Every quote includes a professional CDL driver. Driver per diem, hotel rooms on driver rest days and any relief driver for long legs are itemized on the quote so you can see the full cost upfront.'],
  ['How many people can one coach sleep?', 'Our 12-bunk entertainer sleeps up to 12. Star room layouts sleep eight in bunks plus a private suite, and star coaches are set up for two to four plus a master suite. Larger parties can run two coaches in convoy.'],
  ['Can we bring a trailer for gear?', 'Absolutely. Enclosed coach trailers tow behind the bus for backline, merch and wardrobe. For full production we can add a 53-foot truck with its own driver on the same routing.'],
  ['What happens if our routing changes mid-tour?', 'Call dispatch. We re-plan drives around hours-of-service rules, adjust driver schedules and update the quote. Added days or miles are priced at the rates already in your agreement.'],
  ['Do you only work with musicians?', 'No. We move comedians, sports teams, film and TV crews, corporate roadshows, campaigns and faith tours — anyone who needs to sleep, work and travel on a schedule.'],
];
?>

<section class="page-hero">
  <div class="container">
    <div class="crumbs anim-in"><a href="index.php">Home</a> / Contact</div>
    <span class="eyebrow anim-in d1">Contact &amp; quote</span>
    <h1 class="h1 anim-in d2">Let's get your tour priced.</h1>
    <p class="anim-in d3">Send what you have, even if the routing isn't final. You'll hear back with coach options and an all-in quote within one business day.</p>
  </div>
</section>

<section class="section" id="quote">
  <div class="container contact-grid">
    <div class="form-card reveal reveal--left">
      <h2 class="h2">Request a quote</h2>
      <div id="formMsg">
        <?php if ($flash): ?>
          <div class="alert <?= $flash['ok'] ? 'alert--ok' : 'alert--err' ?>"><?= e($flash['message']) ?></div>
        <?php endif; ?>
      </div>
      <form id="quoteForm" action="send-quote.php" method="post" novalidate>
        <input type="hidden" name="csrf" value="<?= e($_SESSION['csrf']) ?>">
        <input type="text" name="website" class="hp" tabindex="-1" autocomplete="off" aria-hidden="true">
        <div class="form-grid">
          <div class="field<?= errc('name') ?>">
            <label for="f-name">Name</label>
            <input id="f-name" name="name" type="text" autocomplete="name" value="<?= old('name') ?>" required>
            <span class="field__err"><?= errm('name') ?></span>
          </div>
          <div class="field">
            <label for="f-company">Artist / company <small>(optional)</small></label>
            <input id="f-company" name="company" type="text" autocomplete="organization" value="<?= old('company') ?>">
          </div>
          <div class="field<?= errc('email') ?>">
            <label for="f-email">Email</label>
            <input id="f-email" name="email" type="email" autocomplete="email" value="<?= old('email') ?>" required>
            <span class="field__err"><?= errm('email') ?></span>
          </div>
          <div class="field">
            <label for="f-phone">Phone <small>(optional)</small></label>
            <input id="f-phone" name="phone" type="tel" autocomplete="tel" value="<?= old('phone') ?>">
          </div>
          <div class="field<?= errc('service') ?>">
            <label for="f-service">What do you need?</label>
            <select id="f-service" name="service" required>
              <option value="">Choose one</option>
              <?php foreach ($services as $k => $v): ?><option value="<?= $k ?>"<?= sel('service', $k) ?>><?= e($v) ?></option><?php endforeach; ?>
            </select>
            <span class="field__err"><?= errm('service') ?></span>
          </div>
          <div class="field">
            <label for="f-party">Travelling party</label>
            <select id="f-party" name="party">
              <?php foreach ($party as $p): ?><option<?= ($old['party'] ?? '9-12 people') === $p ? ' selected' : '' ?>><?= e($p) ?></option><?php endforeach; ?>
            </select>
          </div>
          <div class="field<?= errc('start_date') ?>">
            <label for="f-start">Start date</label>
            <input id="f-start" name="start_date" type="date" value="<?= old('start_date') ?>" required>
            <span class="field__err"><?= errm('start_date') ?></span>
          </div>
          <div class="field">
            <label for="f-end">End date <small>(optional)</small></label>
            <input id="f-end" name="end_date" type="date" value="<?= old('end_date') ?>">
          </div>
          <div class="field field--full">
            <label for="f-details">Routing &amp; details <small>(optional)</small></label>
            <textarea id="f-details" name="details" placeholder="Pickup city, show cities, special requests..."><?= old('details') ?></textarea>
          </div>
        </div>
        <div class="form-foot">
          <button type="submit" class="btn btn--accent">Send Request</button>
          <p>We reply within one business day. No obligation.</p>
        </div>
      </form>
    </div>

    <aside class="info-stack stagger">
      <div class="info">
        <div class="ico"><?= icon('phone') ?></div>
        <div><h3 class="h4">Call us</h3><a href="tel:<?= SITE_TEL ?>"><?= SITE_PHONE ?></a><p>Dispatch answers 24/7</p></div>
      </div>
      <div class="info">
        <div class="ico"><?= icon('mail') ?></div>
        <div><h3 class="h4">Email</h3><a href="mailto:<?= SITE_EMAIL ?>"><?= SITE_EMAIL ?></a><p>Routing sheets welcome</p></div>
      </div>
      <div class="info">
        <div class="ico"><?= icon('pin') ?></div>
        <div><h3 class="h4">Coverage</h3><p>Pickups and routing anywhere in the lower 48 states</p></div>
      </div>
    </aside>
  </div>
</section>

<section class="section section--sand">
  <div class="container">
    <div class="section__head section__head--center reveal">
      <span class="eyebrow">FAQ</span>
      <h2 class="h2">Straight answers.</h2>
    </div>
    <div class="faq stagger">
      <?php foreach ($faqs as $i => $f): ?>
        <div class="faq__item">
          <button class="faq__q" aria-expanded="false" aria-controls="faq-<?= $i ?>"><?= e($f[0]) ?><span class="faq__icon"></span></button>
          <div class="faq__a" id="faq-<?= $i ?>"><div><p><?= e($f[1]) ?></p></div></div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
