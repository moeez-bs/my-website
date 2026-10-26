<?php

declare(strict_types=1);

/**
 * Server-error boundary, required first by every page. An uncaught exception
 * or fatal error (say a syntax error in inc/config.php) replaces the page with
 * 500.php instead of a blank screen, on any web server. The page is buffered
 * so this works even when the failure comes after the header has rendered.
 * (Sections already fail on their own: see render_sections.)
 */

ob_start();

function show_server_error(): void
{
    static $shown = false;
    if ($shown || headers_sent()) {
        return;
    }
    $shown = true;
    while (ob_get_level() > 0) {
        ob_end_clean();
    }
    require dirname(__DIR__) . '/500.php';
}

set_exception_handler(static function (Throwable $error): void {
    error_log(sprintf('Uncaught %s: %s in %s:%d', $error::class, $error->getMessage(), $error->getFile(), $error->getLine()));
    show_server_error();
});

register_shutdown_function(static function (): void {
    $error = error_get_last();
    if ($error !== null && in_array($error['type'], [E_ERROR, E_PARSE, E_CORE_ERROR, E_COMPILE_ERROR], true)) {
        show_server_error();
    }
});
