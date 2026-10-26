<?php

declare(strict_types=1);

/**
 * The HostPepper relay endpoint from inc/platform.php, when the site uses it.
 * The visitor's browser then posts straight to HostPepper, which emails the
 * owner and redirects back here with ?contact=<outcome>.
 */
function contact_relay_endpoint(array $config): ?string
{
    $endpoint = $config['platform']['contact_endpoint'] ?? null;
    return is_string($endpoint) && str_starts_with($endpoint, 'https://') ? $endpoint : null;
}

/** True only when inc/platform.php sets SITE_PUBLISHED to boolean true. */
function site_published(array $config): bool
{
    return ($config['platform']['SITE_PUBLISHED'] ?? null) === true;
}

/** The form posts to Brain only for a published site with an https relay endpoint. */
function contact_posts_to_brain(array $config): bool
{
    return site_published($config) && contact_relay_endpoint($config) !== null;
}

/** @return array{status: string, error: ?string, old: array<string, string>} */
function contact_relay_result(array $config): array
{
    $outcome = (string) ($_GET['contact'] ?? '');
    return match ($outcome) {
        'sent' => ['status' => 'success', 'error' => null, 'old' => []],
        'invalid' => ['status' => 'error', 'error' => ui($config, 'err_invalid'), 'old' => []],
        'rate' => ['status' => 'error', 'error' => ui($config, 'err_rate'), 'old' => []],
        'failed' => ['status' => 'failed', 'error' => ui($config, 'err_failed'), 'old' => []],
        default => ['status' => 'idle', 'error' => null, 'old' => []],
    };
}

/** Absolute URL of this page, so the relay knows where to send the visitor back. */
function contact_return_url(): string
{
    $https = (string) ($_SERVER['HTTPS'] ?? '');
    $scheme = $https !== '' && strtolower($https) !== 'off' ? 'https' : 'http';
    $host = (string) ($_SERVER['HTTP_HOST'] ?? 'localhost');
    $path = strtok((string) ($_SERVER['REQUEST_URI'] ?? '/'), '?') ?: '/';
    return $scheme . '://' . $host . $path;
}

function contact_boot(): void
{
    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
    }
}

/**
 * Preview (and any site that does not post to Brain): keep what was typed and
 * tell the visitor the form cannot send. Nothing is delivered.
 *
 * @return array{status: string, error: ?string, old: array<string, string>}
 */
function contact_preview_result(array $config): array
{
    return [
        'status' => 'unavailable',
        'error' => ui($config, 'unsent'),
        'old' => [
            'name' => trim((string) ($_POST['name'] ?? '')),
            'email' => trim((string) ($_POST['email'] ?? '')),
            'message' => trim((string) ($_POST['message'] ?? '')),
        ],
    ];
}

/**
 * Handles a contact form POST on a site that does not post to Brain, then
 * redirects back (post/redirect/get). The outcome survives the redirect in
 * the session and is returned on the following GET.
 *
 * @return array{status: string, error: ?string, old: array<string, string>}
 */
function contact_handle(array $config): array
{
    if (($_SERVER['REQUEST_METHOD'] ?? '') !== 'POST') {
        $result = $_SESSION['contact_flash'] ?? null;
        unset($_SESSION['contact_flash']);
        return is_array($result)
            ? $result + ['status' => 'idle', 'error' => null, 'old' => []]
            : ['status' => 'idle', 'error' => null, 'old' => []];
    }

    $_SESSION['contact_flash'] = contact_preview_result($config);
    $path = strtok((string) ($_SERVER['REQUEST_URI'] ?? '/'), '?') ?: '/';
    header('Location: ' . $path . '#contact', true, 303);
    exit;
}

/**
 * Phone, email and address as display rows, for the contact sections.
 *
 * @return list<array{icon: string, label: string, value: string, href: ?string}>
 */
function contact_details(array $config): array
{
    $details = [];
    if (!empty($config['phone'])) {
        $details[] = ['icon' => 'phone', 'label' => ui($config, 'phone'), 'value' => (string) $config['phone'], 'href' => tel_href((string) $config['phone'])];
    }
    if (!empty($config['email'])) {
        $details[] = ['icon' => 'mail', 'label' => ui($config, 'email'), 'value' => (string) $config['email'], 'href' => 'mailto:' . $config['email']];
    }
    if (!empty($config['address'])) {
        $details[] = ['icon' => 'map-pin', 'label' => ui($config, 'address'), 'value' => (string) $config['address'], 'href' => null];
    }
    return $details;
}

/**
 * The contact form and its states, shared by every contact section. Posts to
 * the HostPepper relay when the site is published, otherwise to this page.
 *
 * @param array{status: string, error: ?string, old?: array<string, string>} $contact_result
 */
function render_contact_form(array $config, array $contact_result): void
{
    $relay = contact_posts_to_brain($config) ? contact_relay_endpoint($config) : null;
?>
    <?php if ($contact_result['status'] === 'success'): ?>
        <div class="flex items-start gap-4" role="status">
            <span class="icon-badge"><?= icon('circle-check', 'size-6') ?></span>
            <p class="pt-2.5 font-medium text-heading"><?= e(ui($config, 'sent')) ?></p>
        </div>
    <?php else: ?>
        <?php if ($contact_result['error'] !== null): ?>
            <p class="mb-6 rounded-md bg-accent-50 p-4 text-sm font-medium text-accent-900" role="alert"><?= e($contact_result['error']) ?></p>
        <?php endif; ?>
        <?php $old = $contact_result['old'] ?? []; ?>
        <form class="grid gap-5 sm:grid-cols-2" method="post" action="<?= e($relay ?? '#contact') ?>">
            <?php if ($relay !== null): ?>
                <input type="hidden" name="return_to" value="<?= e(contact_return_url()) ?>">
            <?php endif; ?>
            <div style="position:absolute;width:1px;height:1px;overflow:hidden;clip-path:inset(50%);white-space:nowrap" aria-hidden="true">
                <label for="contact-website">Leave this field empty</label>
                <input type="text" id="contact-website" name="website" tabindex="-1" autocomplete="off">
            </div>
            <div>
                <label class="block text-sm font-medium text-heading" for="contact-name"><?= e(ui($config, 'name')) ?></label>
                <input class="field mt-2" type="text" id="contact-name" name="name" maxlength="120" autocomplete="name" value="<?= e($old['name'] ?? '') ?>" required>
            </div>
            <div>
                <label class="block text-sm font-medium text-heading" for="contact-email"><?= e(ui($config, 'email')) ?></label>
                <input class="field mt-2" type="email" id="contact-email" name="email" maxlength="160" autocomplete="email" value="<?= e($old['email'] ?? '') ?>" required>
            </div>
            <div class="sm:col-span-2">
                <label class="block text-sm font-medium text-heading" for="contact-message"><?= e(ui($config, 'message')) ?></label>
                <textarea class="field mt-2" id="contact-message" name="message" rows="5" maxlength="4000" required><?= e($old['message'] ?? '') ?></textarea>
            </div>
            <div class="flex flex-col gap-4 sm:col-span-2 sm:flex-row sm:items-center">
                <button class="btn btn-primary w-full sm:w-auto" type="submit"><?= e(ui($config, 'send')) ?></button>
                <p class="text-sm text-subtle">
                    <?= e(ui($config, 'privacy_note')) ?>
                    <a class="underline underline-offset-2 hover:text-heading" href="privacy.php"><?= e(ui($config, 'privacy')) ?></a>
                </p>
            </div>
        </form>
    <?php endif; ?>
<?php
}
