<?php
// ------------------------------------------------------------
// Tour Coach Lease — site configuration
// ------------------------------------------------------------
define('SITE_NAME',  'Tour Coach Lease');
define('SITE_PHONE', '(888) 555-0148');
define('SITE_TEL',   '+18885550148');
define('SITE_EMAIL', 'info@tourcoachlease.com');
define('SITE_DOMAIN','tourcoachlease.com');

// Where quote requests are emailed. Change to your inbox.
define('QUOTE_TO',   'info@tourcoachlease.com');

// Quote requests are also logged here (one JSON line each) so nothing is lost
// if mail() isn't configured on the server.
define('QUOTE_LOG',  __DIR__ . '/../data/quotes.log');

$NAV = [
  'index.php'    => 'Home',
  'coaches.php'  => 'Coaches',
  'services.php' => 'Services',
  'contact.php'  => 'Contact',
];

require_once __DIR__ . '/icons.php';

function e($s) { return htmlspecialchars((string)$s, ENT_QUOTES, 'UTF-8'); }
function current_page() { return basename($_SERVER['SCRIPT_NAME'] ?? 'index.php'); }

if (session_status() === PHP_SESSION_NONE) session_start();
if (empty($_SESSION['csrf'])) $_SESSION['csrf'] = bin2hex(random_bytes(16));
