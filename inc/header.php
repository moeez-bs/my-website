<?php
require_once __DIR__ . '/navigation.php';

$page = $page ?? 'home';
$nav = is_array($config['nav'] ?? null) ? $config['nav'] : [];
$header_cta = is_array($config['header_cta'] ?? null) ? $config['header_cta'] : null;

// Header variant from config, checked against the library's own list. The
// overlay header sits on a full-bleed photo, so it needs hero-image first.
$header_variant = (string) ($config['header'] ?? 'standard');
if (!in_array($header_variant, ['standard', 'centered', 'overlay'], true)) {
    $header_variant = 'standard';
}
if ($header_variant === 'overlay' && ($page !== 'home' || ($config['sections'][0]['variant'] ?? '') !== 'hero-image')) {
    $header_variant = 'standard';
}
require __DIR__ . '/headers/' . $header_variant . '.php';
?>
<main id="main">
