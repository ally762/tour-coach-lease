<?php
require_once __DIR__ . '/config.php';
$page_title = $page_title ?? SITE_NAME;
$page_desc  = $page_desc  ?? 'Entertainer coach leasing, tour bus rental and tour support across the lower 48.';
$cur = current_page();
?><!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?= e($page_title) ?></title>
<meta name="description" content="<?= e($page_desc) ?>">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Big+Shoulders+Display:wght@700;800;900&family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="page-<?= e(pathinfo($cur, PATHINFO_FILENAME)) ?>">

<div class="topbar">
  <div class="container topbar__inner">
    <span class="topbar__status"><i class="dot"></i>Dispatch answers 24/7 · Coaches across the lower 48</span>
    <span class="topbar__contact"><a href="tel:<?= SITE_TEL ?>"><?= SITE_PHONE ?></a> · <a href="mailto:<?= SITE_EMAIL ?>"><?= SITE_EMAIL ?></a></span>
  </div>
</div>

<header class="header" id="header">
  <div class="container header__inner">
    <a href="index.php" class="logo" aria-label="<?= SITE_NAME ?> home">
      <span class="logo__mark"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="4" y="4" width="16" height="12" rx="2.5"/><path d="M4 11h16M8 16v3M16 16v3"/></svg></span>
      <span class="logo__text">TOUR COACH <b>LEASE</b></span>
    </a>
    <nav class="nav" id="nav" aria-label="Main">
      <?php foreach ($NAV as $href => $label): ?>
        <a href="<?= $href ?>" class="nav__link<?= $cur === $href ? ' is-active' : '' ?>"><?= $label ?></a>
      <?php endforeach; ?>
      <a href="contact.php#quote" class="btn btn--accent btn--sm nav__cta">Get a Quote</a>
    </nav>
    <button class="burger" id="burger" aria-label="Open menu" aria-expanded="false"><span></span><span></span><span></span></button>
  </div>
</header>
<main>
