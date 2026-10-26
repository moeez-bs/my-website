<?php

declare(strict_types=1);

/**
 * Shown when a page fails with a server error (see inc/errors.php). It renders
 * in the site's own design when it can, and falls back to a plain page when
 * the failure is in the site's files, such as a syntax error in
 * inc/config.php.
 */

http_response_code(500);
header('Cache-Control: no-store');

$plain_page = static function (): void {
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex">
    <title>Something went wrong</title>
    <style>
        body { margin: 0; min-height: 100vh; display: grid; place-items: center; padding: 1.5rem; box-sizing: border-box; font-family: system-ui, -apple-system, "Segoe UI", sans-serif; background: #fafaf9; color: #1c1917; }
        main { max-width: 32rem; text-align: center; }
        h1 { font-size: 1.75rem; margin: 0 0 0.75rem; }
        p { color: #57534e; line-height: 1.6; margin: 0 0 1.5rem; }
        a { display: inline-block; padding: 0.75rem 1.25rem; border-radius: 0.5rem; background: #1c1917; color: #fff; text-decoration: none; font-weight: 600; }
    </style>
</head>
<body>
    <main>
        <h1>Something went wrong</h1>
        <p>Sorry, this page could not be loaded. Please try again in a few minutes.</p>
        <a href="/">Back to the home page</a>
    </main>
</body>
</html>
    <?php
};

// Fatal errors cannot be caught, so a shutdown hook swaps any half-drawn page for the plain one.
$finished = false;
register_shutdown_function(static function () use (&$finished, $plain_page): void {
    $error = error_get_last();
    if ($finished || $error === null || !in_array($error['type'], [E_ERROR, E_PARSE, E_CORE_ERROR, E_COMPILE_ERROR], true)) {
        return;
    }
    while (ob_get_level() > 0) {
        ob_end_clean();
    }
    $plain_page();
});

ob_start();
try {
    require_once __DIR__ . '/inc/escape.php';
    require_once __DIR__ . '/inc/icons.php';
    require_once __DIR__ . '/inc/render.php';
    require_once __DIR__ . '/inc/contact.php';

    $config = require __DIR__ . '/inc/config.php';
    if (!is_array($config)) {
        throw new UnexpectedValueException('inc/config.php did not return an array.');
    }
    $page = 'error';
    $page_title = ui($config, 'error_title');
    $details = array_filter(contact_details($config), static fn (array $detail): bool => $detail['href'] !== null);

    require __DIR__ . '/inc/head.php';
    require __DIR__ . '/inc/header.php';
    ?>
<section class="surface section">
    <div class="container-x max-w-2xl text-center">
        <p class="font-display text-7xl font-semibold tracking-tight text-brand-600 sm:text-8xl">500</p>
        <h1 class="display-2 mt-6"><?= e(ui($config, 'error_title')) ?></h1>
        <p class="lead mx-auto mt-5 max-w-xl"><?= e(ui($config, 'error_body')) ?></p>
        <div class="mt-10 flex flex-wrap justify-center gap-3">
            <a class="btn btn-primary" href="./"><?= e(ui($config, 'back_home')) ?></a>
            <?php foreach ($details as $detail): ?>
                <a class="btn btn-ghost" href="<?= e($detail['href']) ?>">
                    <?= icon($detail['icon'], 'size-4') ?>
                    <?= e($detail['value']) ?>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>
    <?php
    require __DIR__ . '/inc/footer.php';
    $finished = true;
    ob_end_flush();
} catch (Throwable $error) {
    $finished = true;
    error_log('500.php fell back to the plain page: ' . $error->getMessage());
    while (ob_get_level() > 0) {
        ob_end_clean();
    }
    $plain_page();
}
