<?php
$page_title = 'Tour Coach Lease | Entertainer Coach Leasing & Tour Bus Rental';
require __DIR__ . '/includes/header.php';
?>

<section class="hero">
  <div class="container hero__grid">
    <div class="hero__text">
      <span class="eyebrow anim-in">Entertainer coach leasing</span>
      <h1 class="h1 anim-in d1">Your home on the road, <span class="hl">ready to roll.</span></h1>
      <p class="anim-in d2">Luxury sleeper coaches with professional drivers for artists, crews, teams and productions. One call covers the coach, the driver and dispatch for the whole run.</p>
      <div class="hero__actions anim-in d3">
        <a href="contact.php#quote" class="btn btn--accent">Get a Tour Quote</a>
        <a href="coaches.php" class="btn btn--ghost">See the Coaches</a>
      </div>
      <div class="hero__ticks anim-in d4">
        <span class="tick"><?= tick_ico() ?>Professional CDL drivers</span>
        <span class="tick"><?= tick_ico() ?>24/7 dispatch</span>
        <span class="tick"><?= tick_ico() ?>Lower 48 coverage</span>
      </div>
    </div>
    <div class="hero__media anim-in d3">
      <div class="hero__img"><img src="assets/img/hero-top.jpg" alt="Silver entertainer coach parked outside"></div>
      <div class="hero__badge"><strong>Sleeps up to 12</strong><span>Bunks, two lounges, galley &amp; bath</span></div>
    </div>
  </div>
</section>

<section class="strip">
  <div class="container strip__grid stagger">
    <div class="strip__item"><h3 class="h4">Leasing &amp; Rental</h3><p>Week-long runs to full tours</p></div>
    <div class="strip__item"><h3 class="h4">Drivers Included</h3><p>Licensed, experienced on tour schedules</p></div>
    <div class="strip__item"><h3 class="h4">Tour Trucking</h3><p>Trailers and trucks for your gear</p></div>
    <div class="strip__item"><h3 class="h4">Fast Quotes</h3><p>Options within one business day</p></div>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="section__head reveal">
      <span class="eyebrow">What we do</span>
      <h2 class="h2">Everything your tour needs<br>to move.</h2>
      <p class="lead">From a weekend of fly-in dates to a months-long arena run, we put the right coach, driver and support behind your routing.</p>
    </div>
    <div class="grid-3 stagger">
      <article class="card">
        <div class="card__img"><img src="assets/img/coach-black.jpg" alt="Black entertainer coach"></div>
        <div class="card__body">
          <h3 class="h3">Coach Leasing</h3>
          <p>Long-term leases on fully equipped entertainer coaches, with a dedicated driver who stays with you for the whole tour.</p>
          <a href="services.php#leasing" class="link-arrow">Leasing details <span>→</span></a>
        </div>
      </article>
      <article class="card">
        <div class="card__img"><img src="assets/img/coach-maroon.jpg" alt="Maroon tour bus"></div>
        <div class="card__body">
          <h3 class="h3">Tour Bus Rental</h3>
          <p>Short runs, one-off shows, promo trips and festival weekends. The same coaches and drivers, booked by the day or week.</p>
          <a href="services.php#rental" class="link-arrow">Rental details <span>→</span></a>
        </div>
      </article>
      <article class="card">
        <div class="card__img"><img src="assets/img/interior-lounge.jpg" alt="Coach lounge interior"></div>
        <div class="card__body">
          <h3 class="h3">Tour Support</h3>
          <p>Gear trailers, tour trucking and round-the-clock dispatch, so production, merch and backline arrive with you.</p>
          <a href="services.php#trucking" class="link-arrow">Support details <span>→</span></a>
        </div>
      </article>
    </div>
  </div>
</section>

<section class="section section--sand">
  <div class="container split">
    <div class="split__media reveal reveal--left"><img src="assets/img/interior-main.jpg" alt="Main lounge and galley inside a coach"></div>
    <div class="split__text reveal reveal--right">
      <span class="eyebrow">Inside the coach</span>
      <h2 class="h2">A hotel suite that keeps up with the schedule.</h2>
      <p>Every coach is set up for living on the road: real beds, room to work, and quiet hours between shows.</p>
      <ul class="checks">
        <li><?= tick_ico() ?>Private bunks with curtains, reading lights and outlets</li>
        <li><?= tick_ico() ?>Front and rear lounges with leather seating and TVs</li>
        <li><?= tick_ico() ?>Galley with fridge, microwave and coffee setup</li>
        <li><?= tick_ico() ?>Onboard restroom, satellite TV and Wi-Fi</li>
        <li><?= tick_ico() ?>Generator power for parked hours at the venue</li>
      </ul>
      <a href="coaches.php" class="btn btn--dark btn--sm">Tour the Interiors</a>
    </div>
  </div>
</section>

<section class="section section--dark on-dark">
  <div class="container">
    <div class="section__head reveal">
      <span class="eyebrow">How it works</span>
      <h2 class="h2">From first call to first show.</h2>
    </div>
    <div class="steps">
      <?php
      $steps = [
        ['Send your routing', "Dates, cities and headcount. Not final yet? Send what you have and we'll work from there."],
        ['Get matched options', 'Within one business day you get coach options that fit your party, with a clear all-in quote.'],
        ['Lock it in', 'Sign the agreement, place the deposit and meet your driver before day one.'],
        ['Roll out', 'Your coach shows up fueled, cleaned and inspected. Dispatch tracks every mile.'],
      ];
      foreach ($steps as $i => $s): ?>
        <div class="step reveal" style="transition-delay:<?= $i * 0.12 ?>s">
          <div class="step__num"><span data-count="<?= $i + 1 ?>">0<?= $i + 1 ?></span></div>
          <h3 class="h4"><?= $s[0] ?></h3>
          <p><?= $s[1] ?></p>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="section__head reveal">
      <span class="eyebrow">Why Tour Coach Lease</span>
      <h2 class="h2">Built around the people<br>on board.</h2>
    </div>
    <div class="grid-4 stagger">
      <div class="feature"><div class="ico"><?= icon('shield') ?></div><h3 class="h4">Safety first</h3><p>Drivers follow hours-of-service rules, and every coach is inspected before it leaves.</p></div>
      <div class="feature"><div class="ico"><?= icon('clock') ?></div><h3 class="h4">Always reachable</h3><p>A real person at dispatch, day or night, for routing changes and anything on the road.</p></div>
      <div class="feature"><div class="ico"><?= icon('list') ?></div><h3 class="h4">Clear pricing</h3><p>One all-in quote with driver, fuel and fees spelled out. No surprises on settlement day.</p></div>
      <div class="feature"><div class="ico"><?= icon('pin') ?></div><h3 class="h4">Coast to coast</h3><p>Pickups and routing anywhere in the lower 48, with repositioning handled for you.</p></div>
    </div>
  </div>
</section>

<section class="section section--sand">
  <div class="container">
    <div class="section__head section__head--center reveal">
      <span class="eyebrow">Who we serve</span>
      <h2 class="h2">On the road for every<br>kind of tour.</h2>
    </div>
    <div class="pills stagger">
      <?php foreach (['Touring artists & bands','Production crews','Comedians','Sports teams','Film & TV crews','Festivals','Corporate roadshows','Political campaigns','Faith & worship tours'] as $p): ?>
        <span class="pill"><?= e($p) ?></span>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<?php
$cta_title = 'Ready to price your tour?';
$cta_text  = "Send your dates and cities. We'll come back with coach options and an all-in quote.";
include __DIR__ . '/includes/cta.php';
require __DIR__ . '/includes/footer.php';
