<?php
$page_title = 'Services | Tour Coach Lease';
$page_desc  = 'Coach leasing, tour bus rental, tour trucking and 24/7 drivers & dispatch, priced in one quote.';
require __DIR__ . '/includes/header.php';
?>

<section class="page-hero">
  <div class="container">
    <div class="crumbs anim-in"><a href="index.php">Home</a> / Services</div>
    <span class="eyebrow anim-in d1">Services</span>
    <h1 class="h1 anim-in d2">One call. Every mile covered.</h1>
    <p class="anim-in d3">Coaches, drivers, gear transport and dispatch from one team, priced in one quote.</p>
  </div>
</section>

<section class="section" id="leasing">
  <div class="container split">
    <div class="split__media reveal reveal--left"><img src="assets/img/svc-black.jpg" alt="Black entertainer coach"></div>
    <div class="split__text reveal reveal--right">
      <span class="eyebrow">Entertainer coach leasing</span>
      <h2 class="h2">A coach for the whole tour.</h2>
      <p>Lease a fully equipped entertainer coach for the length of your run, from a few weeks to a full season. Your driver stays with the coach, learns your crew's rhythm and keeps the schedule.</p>
      <ul class="checks">
        <li><?= tick_ico() ?>Dedicated driver for the full lease</li>
        <li><?= tick_ico() ?>Coach delivered cleaned, stocked with linens and inspected</li>
        <li><?= tick_ico() ?>Routing support and repositioning between legs</li>
        <li><?= tick_ico() ?>One monthly invoice with fuel and fees itemized</li>
      </ul>
      <a href="contact.php?service=leasing#quote" class="btn btn--dark btn--sm">Quote a Lease</a>
    </div>
  </div>
</section>

<section class="section section--sand" id="rental">
  <div class="container split split--rev">
    <div class="split__media reveal reveal--right"><img src="assets/img/svc-maroon.jpg" alt="Maroon tour bus"></div>
    <div class="split__text reveal reveal--left">
      <span class="eyebrow">Tour bus rental</span>
      <h2 class="h2">Short runs and one-off dates.</h2>
      <p>Need a coach for a weekend, a festival, a promo run or a single show? Rent by the day or week with the same coaches and drivers our leasing clients get.</p>
      <ul class="checks">
        <li><?= tick_ico() ?>Day and week rates</li>
        <li><?= tick_ico() ?>Fly-in dates, festivals and award weekends</li>
        <li><?= tick_ico() ?>Promo tours, radio runs and press trips</li>
        <li><?= tick_ico() ?>Pickup at the airport, hotel or venue</li>
      </ul>
      <a href="contact.php?service=rental#quote" class="btn btn--dark btn--sm">Quote a Rental</a>
    </div>
  </div>
</section>

<section class="section section--dark on-dark" id="trucking">
  <div class="container">
    <div class="section__head reveal">
      <span class="eyebrow">Tour trucking &amp; trailers</span>
      <h2 class="h2">Your gear, on the same<br>schedule.</h2>
      <p class="lead">Keep production, backline and merch moving with you. We'll size the right trailer or truck for your load-in and match it to your routing.</p>
    </div>
    <div class="grid-3 stagger">
      <div class="feature feature--dark"><div class="ico ico--soft"><?= icon('trailer') ?></div><h3 class="h4">Coach trailers</h3><p>Enclosed trailers that tow behind your coach for backline, merch and wardrobe.</p></div>
      <div class="feature feature--dark"><div class="ico ico--soft"><?= icon('truck') ?></div><h3 class="h4">Tour trucking</h3><p>53-foot trailers with professional drivers for full production, lighting and staging.</p></div>
      <div class="feature feature--dark"><div class="ico ico--soft"><?= icon('pulse') ?></div><h3 class="h4">Live event freight</h3><p>One-off moves for festivals, broadcasts, corporate events and trade shows.</p></div>
    </div>
  </div>
</section>

<section class="section" id="drivers">
  <div class="container split">
    <div class="split__media reveal reveal--left"><img src="assets/img/svc-interior.jpg" alt="Coach lounge with TV"></div>
    <div class="split__text reveal reveal--right">
      <span class="eyebrow">Drivers &amp; dispatch</span>
      <h2 class="h2">The people who get you there.</h2>
      <p>Every coach comes with a professional CDL driver who knows tour life: overnight drives, tight load-outs and venue lots. Dispatch is reachable around the clock for the whole run.</p>
      <ul class="checks">
        <li><?= tick_ico() ?>CDL drivers with passenger endorsements</li>
        <li><?= tick_ico() ?>Hours-of-service compliant scheduling, with relief drivers on long legs</li>
        <li><?= tick_ico() ?>24/7 dispatch line for changes and roadside support</li>
        <li><?= tick_ico() ?>Pre-trip inspections before every departure</li>
      </ul>
      <a href="tel:<?= SITE_TEL ?>" class="btn btn--dark btn--sm">Talk to Dispatch</a>
    </div>
  </div>
</section>

<section class="section section--sand">
  <div class="container">
    <div class="section__head section__head--center reveal">
      <span class="eyebrow">Included with every booking</span>
      <h2 class="h2">No hidden extras.</h2>
    </div>
    <div class="grid-4 stagger">
      <div class="feature feature--plain"><h3 class="h4">Driver</h3><p>A professional CDL driver assigned to your coach.</p></div>
      <div class="feature feature--plain"><h3 class="h4">Linens</h3><p>Fresh bedding and towels at the start of the run.</p></div>
      <div class="feature feature--plain"><h3 class="h4">Inspection</h3><p>Mechanical and safety check before every departure.</p></div>
      <div class="feature feature--plain"><h3 class="h4">Dispatch</h3><p>24/7 support line for the length of the booking.</p></div>
    </div>
  </div>
</section>

<?php
$cta_title = "Let's build your quote.";
$cta_text  = "Mix and match coaches, trailers and trucking. We'll price it all in one place.";
include __DIR__ . '/includes/cta.php';
require __DIR__ . '/includes/footer.php';
