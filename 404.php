<?php

declare(strict_types=1);

require __DIR__ . '/inc/errors.php';
require __DIR__ . '/inc/escape.php';
require __DIR__ . '/inc/icons.php';
require __DIR__ . '/inc/render.php';

$config = require __DIR__ . '/inc/config.php';
$page = '404';
$page_title = ui($config, 'not_found_title');

http_response_code(404);

require __DIR__ . '/inc/head.php';
require __DIR__ . '/inc/header.php';
?>
<section class="surface section">
    <div class="container-x max-w-2xl text-center">
        <p class="font-display text-7xl font-semibold tracking-tight text-brand-600 sm:text-8xl">404</p>
        <h1 class="display-2 mt-6"><?= e(ui($config, 'not_found_title')) ?></h1>
        <p class="lead mx-auto mt-5 max-w-xl"><?= e(ui($config, 'not_found_body')) ?></p>
        <div class="mt-10 flex flex-wrap justify-center gap-3">
            <a class="btn btn-primary" href="./"><?= e(ui($config, 'back_home')) ?></a>
            <a class="btn btn-ghost" href="./#contact"><?= e(ui($config, 'contact')) ?></a>
        </div>
    </div>
</section>
<?php
require __DIR__ . '/inc/footer.php';
