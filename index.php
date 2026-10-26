<?php

declare(strict_types=1);

require __DIR__ . '/inc/errors.php';
require __DIR__ . '/inc/escape.php';
require __DIR__ . '/inc/icons.php';
require __DIR__ . '/inc/render.php';
require __DIR__ . '/inc/contact.php';

$config = require __DIR__ . '/inc/config.php';
$config['platform'] = is_file(__DIR__ . '/inc/platform.php') ? require __DIR__ . '/inc/platform.php' : [];
$page = 'home';

// A published site posts the form to HostPepper, so no session (and no cookie) is needed.
if (contact_posts_to_brain($config)) {
    $contact_result = contact_relay_result($config);
} else {
    contact_boot();
    $contact_result = contact_handle($config);
}

require __DIR__ . '/inc/head.php';
require __DIR__ . '/inc/header.php';

render_sections($config, $contact_result);

require __DIR__ . '/inc/footer.php';
