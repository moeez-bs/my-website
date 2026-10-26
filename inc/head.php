<?php
$page = $page ?? 'home';
$document_title = isset($page_title) ? $page_title . ' | ' . $config['name'] : ($config['title'] ?? $config['name']);
$share_image = share_image($config);
?>
<!DOCTYPE html>
<html lang="<?= e($config['lang'] ?? 'en') ?>">
<head>
    <meta charset="utf-8">
    <?php // Error pages are served at whatever URL failed, so links and assets resolve from the site root. ?>
    <?php if ($page === '404' || $page === 'error'): ?>
        <base href="<?= e(site_base()) ?>">
        <meta name="robots" content="noindex">
    <?php endif; ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= e($document_title) ?></title>
    <meta name="description" content="<?= e($config['description']) ?>">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="<?= e($config['name']) ?>">
    <meta property="og:title" content="<?= e($document_title) ?>">
    <meta property="og:description" content="<?= e($config['description']) ?>">
    <?php if ($share_image !== null): ?>
        <meta property="og:image" content="<?= e($share_image) ?>">
        <meta name="twitter:card" content="summary_large_image">
    <?php endif; ?>
    <meta name="theme-color" content="#ffffff">
    <link rel="icon" href="favicon.ico" sizes="16x16 32x32 48x48">
    <link rel="icon" href="favicon.svg" type="image/svg+xml">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <?php if (!empty($config['theme']['fonts_url'])): ?>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="<?= e($config['theme']['fonts_url']) ?>" rel="stylesheet">
    <?php endif; ?>
    <link rel="stylesheet" href="assets/app.css">
</head>
<body>
    <a href="#main" class="sr-only focus:not-sr-only focus:fixed focus:left-4 focus:top-4 focus:z-50 focus:rounded-md focus:bg-brand-700 focus:px-4 focus:py-2 focus:text-white">
        <?= e(ui($config, 'skip')) ?>
    </a>
