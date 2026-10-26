<?php

declare(strict_types=1);

/**
 * Page composition for library sites. inc/config.php lists the sections in
 * page order; each entry's `variant` names a file in sections/.
 */
function render_sections(array $config, array $contact_result): void
{
    foreach ($config['sections'] ?? [] as $section) {
        if (!is_array($section)) {
            continue;
        }
        $variant = (string) ($section['variant'] ?? '');
        if (preg_match('/^[a-z0-9-]+$/', $variant) !== 1) {
            continue;
        }
        $file = dirname(__DIR__) . '/sections/' . $variant . '.php';
        if (!is_file($file)) {
            continue;
        }
        // A broken section (e.g. a custom one with a syntax error) is dropped
        // on its own instead of cutting the rest of the page off.
        ob_start();
        try {
            (static function () use ($file, $section, $config, $contact_result): void {
                require $file;
            })();
            ob_end_flush();
        } catch (Throwable $error) {
            ob_end_clean();
            error_log('Section ' . $variant . ' failed to render: ' . $error->getMessage());
        }
    }
}

/** Surface class for a section: default, alt, brand or dark. */
function surface(array $section, string $fallback = 'default'): string
{
    $surface = (string) ($section['surface'] ?? $fallback);
    return match ($surface) {
        'alt' => 'surface-alt',
        'brand' => 'surface-brand',
        'dark' => 'surface-dark',
        default => 'surface',
    };
}

/** ` id="..."` for sections that are navigation targets. */
function anchor(array $section): string
{
    $id = (string) ($section['id'] ?? '');
    return $id === '' ? '' : ' id="' . e($id) . '"';
}

/** @return list<mixed> */
function items(array $section, string $key = 'items'): array
{
    $value = $section[$key] ?? [];
    return is_array($value) ? array_values($value) : [];
}

function initials(string $name, int $letters = 2): string
{
    $words = preg_split('/\s+/u', trim($name)) ?: [];
    $out = '';
    $count = 0;
    foreach ($words as $word) {
        if (preg_match('/[\p{L}\d]/u', $word, $match) !== 1) {
            continue;
        }
        $out .= $match[0];
        if (++$count >= $letters) {
            break;
        }
    }
    return function_exists('mb_strtoupper') ? mb_strtoupper($out) : strtoupper($out);
}

/** Logo mark contents: the brand icon, or the name's initial on older sites. */
function logo_mark(array $config): string
{
    $icon = $config['brand_icon'] ?? '';
    return is_string($icon) && $icon !== ''
        ? icon($icon, 'size-5')
        : e(initials((string) $config['name'], 1));
}

/** On pages other than the home page, in-page anchors point back to it. */
function page_href(string $href, string $page): string
{
    return $page !== 'home' && str_starts_with($href, '#') ? './' . $href : $href;
}

function home_href(string $page): string
{
    return $page === 'home' ? '#main' : './';
}

/** Directory of the running script, for pages served at any depth (404). */
function site_base(): string
{
    $dir = str_replace('\\', '/', dirname((string) ($_SERVER['SCRIPT_NAME'] ?? '/')));
    return rtrim($dir, '/') . '/';
}

/** The hero photo doubles as the image shown when the site is shared. */
function share_image(array $config): ?string
{
    foreach ($config['sections'] ?? [] as $section) {
        $image = is_array($section) ? ($section['image'] ?? null) : null;
        if (($section['type'] ?? '') === 'hero' && is_string($image) && str_starts_with($image, 'https://')) {
            return $image;
        }
    }
    return null;
}

/** Google Maps search link for an address (opens in the visitor's maps app on phones). */
function maps_href(string $address): string
{
    return 'https://www.google.com/maps/search/?api=1&query=' . rawurlencode($address);
}

function tel_href(string $phone): string
{
    return 'tel:' . preg_replace('/[^\d+]/', '', $phone);
}

/** Interface strings, overridable per site in config `ui` (for non-English sites). */
function ui(array $config, string $key): string
{
    static $defaults = [
        'menu' => 'Menu',
        'phone' => 'Phone',
        'email' => 'Email',
        'address' => 'Address',
        'hours' => 'Opening hours',
        'name' => 'Your name',
        'message' => 'How can we help?',
        'send' => 'Send message',
        'sent' => 'Thank you — your message is on its way. We will get back to you shortly.',
        'unsent' => 'This site is a preview, so the form cannot send messages yet. Please use the email address or phone number on this page.',
        'err_session' => 'Your session expired. Please try again.',
        'err_rate' => 'Too many messages. Please wait a few minutes and try again.',
        'err_missing' => 'Please fill in your name, email and message.',
        'err_invalid' => 'Please check your name, email and message, then try again.',
        'err_email' => 'Please enter a valid email address.',
        'err_long' => 'One of the fields is too long.',
        'err_failed' => 'Sorry, your message could not be sent. Please try again later or contact us directly.',
        'privacy' => 'Privacy notice',
        'privacy_note' => 'We only use your details to reply to you.',
        'not_found_title' => 'Page not found',
        'not_found_body' => 'The page you are looking for does not exist or has moved.',
        'back_home' => 'Back to the home page',
        'error_title' => 'Something went wrong',
        'error_body' => 'Sorry, this page could not be loaded. Please try again in a few minutes, or get in touch directly.',
        'directions' => 'Get directions',
        'enquire' => 'Ask about this',
        'hours_short' => 'Hours',
        'explore' => 'Explore',
        'contact' => 'Contact',
        'rights' => 'All rights reserved.',
        'skip' => 'Skip to content',
    ];
    $value = $config['ui'][$key] ?? $defaults[$key] ?? $key;
    return is_string($value) ? $value : ($defaults[$key] ?? $key);
}
