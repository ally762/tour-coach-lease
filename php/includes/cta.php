<?php
// Usage: $cta_title = '...'; $cta_text = '...'; include 'includes/cta.php';
?>
<section class="cta">
  <div class="container cta__inner reveal">
    <div>
      <h2 class="h2"><?= e($cta_title ?? 'Ready to price your tour?') ?></h2>
      <p><?= e($cta_text ?? "Send your dates and cities. We'll come back with coach options and an all-in quote.") ?></p>
    </div>
    <div class="cta__actions">
      <a href="contact.php#quote" class="btn btn--dark">Request a Quote</a>
      <a href="tel:<?= SITE_TEL ?>" class="btn btn--outline-dark">Call <?= SITE_PHONE ?></a>
    </div>
  </div>
</section>
