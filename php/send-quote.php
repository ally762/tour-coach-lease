<?php
// ------------------------------------------------------------
// Quote form handler — works with fetch (JSON) and plain POST (redirect)
// ------------------------------------------------------------
require __DIR__ . '/includes/config.php';

$isAjax = ($_SERVER['HTTP_X_REQUESTED_WITH'] ?? '') === 'fetch';

function respond($ok, $message, $errors = [], $old = []) {
  global $isAjax;
  if ($isAjax) {
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode(['ok' => $ok, 'message' => $message, 'errors' => $errors ?: null]);
    exit;
  }
  $_SESSION['flash'] = ['ok' => $ok, 'message' => $message, 'errors' => $errors];
  if (!$ok) $_SESSION['old'] = $old;
  header('Location: contact.php#quote');
  exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') { header('Location: contact.php'); exit; }

// CSRF + honeypot
if (!hash_equals($_SESSION['csrf'] ?? '', $_POST['csrf'] ?? '')) {
  respond(false, 'Your session expired. Please refresh the page and try again.');
}
if (!empty($_POST['website'])) {               // bots fill the hidden field
  respond(true, "Thanks — we've got your request.");
}

// Simple rate limit: one submission per 30 seconds per session
if (isset($_SESSION['last_quote']) && time() - $_SESSION['last_quote'] < 30) {
  respond(false, 'Please wait a few seconds before sending another request.');
}

$clean = function ($k, $max = 200) {
  $v = trim((string)($_POST[$k] ?? ''));
  $v = str_replace(["\r", "\n"], $k === 'details' ? ["", "\n"] : ' ', $v);
  return mb_substr($v, 0, $max);
};

$d = [
  'name'       => $clean('name', 120),
  'company'    => $clean('company', 120),
  'email'      => $clean('email', 160),
  'phone'      => $clean('phone', 40),
  'service'    => $clean('service', 30),
  'party'      => $clean('party', 60),
  'start_date' => $clean('start_date', 10),
  'end_date'   => $clean('end_date', 10),
  'details'    => $clean('details', 4000),
];

$allowedServices = ['leasing', 'rental', 'trucking', 'combo', 'other'];
$errors = [];
if ($d['name'] === '')                                       $errors['name'] = 'Please add your name.';
if (!filter_var($d['email'], FILTER_VALIDATE_EMAIL))         $errors['email'] = 'Enter a valid email.';
if (!in_array($d['service'], $allowedServices, true))        $errors['service'] = 'Pick what you need.';
$sd = DateTime::createFromFormat('Y-m-d', $d['start_date']);
if (!$sd)                                                    $errors['start_date'] = 'Add a start date.';
if ($d['end_date'] !== '') {
  $ed = DateTime::createFromFormat('Y-m-d', $d['end_date']);
  if (!$ed) $d['end_date'] = '';
  elseif ($sd && $ed < $sd) $errors['start_date'] = 'Start must be before end.';
}

if ($errors) respond(false, 'Please fix the highlighted fields.', $errors, $d);

// Log (keeps a copy even if mail isn't configured)
$dir = dirname(QUOTE_LOG);
if (!is_dir($dir)) @mkdir($dir, 0750, true);
@file_put_contents(QUOTE_LOG, json_encode($d + ['received' => date('c'), 'ip' => $_SERVER['REMOTE_ADDR'] ?? '']) . PHP_EOL, FILE_APPEND | LOCK_EX);

// Email
$body  = "New quote request from the website\n\n";
foreach ($d as $k => $v) $body .= str_pad(ucwords(str_replace('_', ' ', $k)) . ':', 14) . ($v !== '' ? $v : '—') . "\n";
$headers  = "From: " . SITE_NAME . " <no-reply@" . SITE_DOMAIN . ">\r\n";
$headers .= "Reply-To: {$d['name']} <{$d['email']}>\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
@mail(QUOTE_TO, 'Quote request: ' . $d['name'] . ($d['company'] ? " ({$d['company']})" : ''), $body, $headers);

$_SESSION['last_quote'] = time();
respond(true, "Thanks, {$d['name']} — your request is in. We'll reply with coach options and an all-in quote within one business day.");
