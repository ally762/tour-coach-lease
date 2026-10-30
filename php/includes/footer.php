</main>

<footer class="footer">
  <div class="container footer__grid">
    <div class="footer__brand">
      <a href="index.php" class="logo logo--light">
        <span class="logo__mark"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="4" y="4" width="16" height="12" rx="2.5"/><path d="M4 11h16M8 16v3M16 16v3"/></svg></span>
        <span class="logo__text">TOUR COACH <b>LEASE</b></span>
      </a>
      <p>Entertainer coach leasing, tour bus rental and tour support across the lower 48.</p>
    </div>
    <div>
      <h4>Pages</h4>
      <ul><?php foreach ($NAV as $href => $label): ?><li><a href="<?= $href ?>"><?= $label ?></a></li><?php endforeach; ?></ul>
    </div>
    <div>
      <h4>Services</h4>
      <ul>
        <li><a href="services.php#leasing">Coach Leasing</a></li>
        <li><a href="services.php#rental">Tour Bus Rental</a></li>
        <li><a href="services.php#trucking">Tour Trucking</a></li>
        <li><a href="services.php#drivers">Drivers &amp; Dispatch</a></li>
      </ul>
    </div>
    <div>
      <h4>Contact</h4>
      <ul>
        <li><a href="tel:<?= SITE_TEL ?>"><?= SITE_PHONE ?></a></li>
        <li><a href="mailto:<?= SITE_EMAIL ?>"><?= SITE_EMAIL ?></a></li>
        <li>Dispatch open 24/7</li>
        <li><a href="contact.php#quote">Request a quote</a></li>
      </ul>
    </div>
  </div>
  <div class="footer__bottom">
    <div class="container footer__bottom-inner">
      <span>© <?= date('Y') ?> <?= SITE_NAME ?>. All rights reserved.</span>
      <span><?= SITE_DOMAIN ?></span>
    </div>
  </div>
</footer>

<button class="to-top" id="toTop" aria-label="Back to top"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M6 15l6-6 6 6"/></svg></button>
<script src="assets/js/main.js"></script>
</body>
</html>
