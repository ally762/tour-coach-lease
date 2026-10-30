<?php
$page_title = 'Coaches & Interiors | Tour Coach Lease';
$page_desc  = 'Three entertainer coach layouts: 12-bunk, bunks plus star room, and star coach. See the interiors.';
require __DIR__ . '/includes/header.php';

$layouts = [
  ['img' => 'fleet-silver.jpg', 'name' => '12-Bunk Entertainer', 'tag' => 'Bands & crews', 'slug' => '12-Bunk Entertainer',
   'specs' => ['Sleeps' => 'Up to 12', 'Lounges' => 'Front & rear', 'Galley' => 'Fridge, microwave, coffee', 'Restroom' => 'Onboard', 'Length' => '45 ft']],
  ['img' => 'fleet-white.jpg', 'name' => 'Bunks + Star Room', 'tag' => 'Artist plus team', 'slug' => 'Bunks + Star Room',
   'specs' => ['Sleeps' => '8 bunks + private suite', 'Rear suite' => 'Queen bed, TV, closet', 'Lounges' => 'Front lounge', 'Restroom' => 'Onboard', 'Length' => '45 ft']],
  ['img' => 'fleet-blue.jpg', 'name' => 'Star Coach', 'tag' => 'Headliners', 'slug' => 'Star Coach',
   'specs' => ['Sleeps' => '2 to 4 + master suite', 'Master suite' => 'Queen bed, shower', 'Lounges' => 'Large front lounge', 'Galley' => 'Full kitchen', 'Length' => '45 ft']],
];

$onboard = [
  ['bed', 'Private bunks', 'Curtains, reading lights, outlets and USB in every bunk.'],
  ['tv', 'TVs & satellite', 'Screens in the lounges, with satellite TV and streaming.'],
  ['wifi', 'Wi-Fi', 'Onboard internet for emails, calls and advancing the next show.'],
  ['bolt', 'Generator power', 'Quiet power and climate control while parked at the venue.'],
  ['fridge', 'Galley', 'Fridge, microwave, sink and a coffee setup for early calls.'],
  ['bath', 'Restroom', 'Onboard restroom, with a shower on star coaches.'],
  ['box', 'Bay storage', 'Under-floor bays for luggage, merch and soft goods.'],
  ['snow', 'Climate control', 'Separate heat and air for the lounges and bunk area.'],
];

$gallery = [
  ['g-main.jpg', 'interior-main.jpg', 'Main lounge & galley', true],
  ['g-front.jpg', null, 'Front lounge', false],
  ['g-galley.jpg', null, 'Galley', false],
  ['g-dinette.jpg', 'svc-interior.jpg', 'Dinette seating', false],
  ['g-lighting.jpg', null, 'Lounge lighting', false],
  ['g-rear.jpg', null, 'Rear lounge', false],
  ['g-wrap.jpg', null, 'Wraparound sofa', false],
  ['g-table.jpg', null, 'Lounge table', false],
  ['g-exterior.jpg', 'hero-top.jpg', 'Exterior', false],
];
?>

<section class="page-hero">
  <div class="container">
    <div class="crumbs anim-in"><a href="index.php">Home</a> / Coaches</div>
    <span class="eyebrow anim-in d1">Coaches &amp; interiors</span>
    <h1 class="h1 anim-in d2">Pick the layout that fits your party.</h1>
    <p class="anim-in d3">Every coach is a 45-foot entertainer conversion with bunks, lounges, a galley and a restroom. Tell us who's riding and we'll match the layout.</p>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="section__head reveal">
      <span class="eyebrow">Layouts</span>
      <h2 class="h2">Three ways to tour.</h2>
      <p class="lead">The layouts below are the most requested. Exact coaches and availability are confirmed with your quote.</p>
    </div>
    <div class="grid-3 stagger">
      <?php foreach ($layouts as $l): ?>
      <article class="card coach">
        <div class="card__img"><img src="assets/img/<?= $l['img'] ?>" alt="<?= e($l['name']) ?> coach exterior"></div>
        <div class="card__body">
          <h3 class="h3"><?= e($l['name']) ?></h3>
          <span class="coach__tag"><?= e($l['tag']) ?></span>
          <ul class="specs">
            <?php foreach ($l['specs'] as $k => $v): ?><li><span><?= e($k) ?></span><strong><?= e($v) ?></strong></li><?php endforeach; ?>
          </ul>
          <a href="contact.php?service=leasing&amp;layout=<?= urlencode($l['slug']) ?>#quote" class="btn btn--dark btn--sm btn--block">Quote this layout</a>
        </div>
      </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="section section--dark on-dark">
  <div class="container">
    <div class="section__head reveal">
      <span class="eyebrow">Standard on every coach</span>
      <h2 class="h2">What's on board.</h2>
    </div>
    <div class="grid-4 stagger">
      <?php foreach ($onboard as $o): ?>
        <div class="feature feature--dark"><div class="ico ico--soft"><?= icon($o[0]) ?></div><h3 class="h4"><?= e($o[1]) ?></h3><p><?= e($o[2]) ?></p></div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="section__head reveal">
      <span class="eyebrow">Gallery</span>
      <h2 class="h2">Take a look inside.</h2>
      <p class="lead">Click any photo to see it larger.</p>
    </div>
    <div class="gallery stagger">
      <?php foreach ($gallery as $g): ?>
        <figure class="gallery__item<?= $g[3] ? ' gallery__item--big' : '' ?>" data-caption="<?= e($g[2]) ?>" data-full="assets/img/<?= $g[1] ?: $g[0] ?>" tabindex="0">
          <img src="assets/img/<?= $g[0] ?>" alt="<?= e($g[2]) ?>" loading="lazy">
          <figcaption><?= e($g[2]) ?></figcaption>
        </figure>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<?php
$cta_title = 'Not sure which layout?';
$cta_text  = "Tell us your headcount and who needs privacy. We'll recommend the right coach.";
include __DIR__ . '/includes/cta.php';
require __DIR__ . '/includes/footer.php';
