<?php

declare(strict_types=1);

require __DIR__ . '/inc/errors.php';
require __DIR__ . '/inc/escape.php';
require __DIR__ . '/inc/icons.php';
require __DIR__ . '/inc/render.php';

require __DIR__ . '/inc/contact.php';

$config = require __DIR__ . '/inc/config.php';
$config['platform'] = is_file(__DIR__ . '/inc/platform.php') ? require __DIR__ . '/inc/platform.php' : [];
$relay = contact_posts_to_brain($config);
$page = 'privacy';
$page_title = ui($config, 'privacy');

/*
 * A plain-language template describing what this site actually does: the
 * contact form, a session cookie only while the form cannot send, fonts and
 * photos from third parties.
 * Change it if the site starts collecting anything else. It is a starting
 * point for the owner, not legal advice.
 */
$name = (string) $config['name'];
$email = (string) ($config['email'] ?? '');
$phone = (string) ($config['phone'] ?? '');
$address = (string) ($config['address'] ?? '');

require __DIR__ . '/inc/head.php';
require __DIR__ . '/inc/header.php';
?>
<section class="surface section">
    <div class="container-x max-w-3xl">
        <p class="eyebrow"><?= e($name) ?></p>
        <h1 class="display-2 mt-5"><?= e(ui($config, 'privacy')) ?></h1>

        <div class="mt-12 space-y-10 text-lg leading-relaxed">
            <div>
                <h2 class="title-3">Who we are</h2>
                <p class="mt-3">
                    <?= e($name) ?> runs this website.
                    <?php if ($address !== ''): ?>We are based at <?= e($address) ?>.<?php endif; ?>
                    <?php if ($email !== ''): ?>
                        If you have a question about this notice or your information, email
                        <a class="text-link underline underline-offset-2" href="mailto:<?= e($email) ?>"><?= e($email) ?></a><?php if ($phone !== ''): ?> or call <a class="text-link underline underline-offset-2" href="<?= e(tel_href($phone)) ?>"><?= e($phone) ?></a><?php endif; ?>.
                    <?php else: ?>
                        If you have a question about this notice or your information, use the contact form on our home page.
                    <?php endif; ?>
                </p>
            </div>

            <div>
                <h2 class="title-3">Information we collect</h2>
                <p class="mt-3">
                    We only collect what you choose to send us through the contact form: your name, your email address and your message.
                    We use it to reply to you and for nothing else. We do not sell it or share it for marketing.
                </p>
                <?php if ($relay): ?>
                    <p class="mt-3">
                        Our website host, HostPepper, delivers your message to us.
                        HostPepper only processes it on our behalf.
                    </p>
                <?php endif; ?>
            </div>

            <div>
                <h2 class="title-3">How long we keep it</h2>
                <p class="mt-3">We keep your message for as long as we need it to deal with your enquiry, and then delete it.</p>
            </div>

            <div>
                <h2 class="title-3">Cookies</h2>
                <p class="mt-3">
                    <?php if ($relay): ?>
                        This site does not set any cookies, and we do not use analytics or advertising tools.
                    <?php else: ?>
                        This site sets one cookie so the contact form can show your message again after you submit. The cookie contains no personal information and is deleted when you close your browser.
                        We do not use analytics or advertising cookies.
                    <?php endif; ?>
                </p>
            </div>

            <div>
                <h2 class="title-3">Other services</h2>
                <p class="mt-3">
                    Photos on this site load from <a class="text-link underline underline-offset-2" href="https://www.pexels.com/privacy-policy/">Pexels</a>
                    and fonts from <a class="text-link underline underline-offset-2" href="https://policies.google.com/privacy">Google Fonts</a>.
                    When your browser downloads them, those services receive your IP address, as happens with any website you visit.
                </p>
            </div>

            <div>
                <h2 class="title-3">Your rights</h2>
                <p class="mt-3">
                    You can ask us what information we hold about you, and ask us to correct or delete it<?php if ($email !== ''): ?>, by emailing <a class="text-link underline underline-offset-2" href="mailto:<?= e($email) ?>"><?= e($email) ?></a><?php endif; ?>.
                    If you live in the UK or the European Union and are unhappy with how we handle your information, you can complain to your data protection authority.
                </p>
            </div>
        </div>
    </div>
</section>
<?php
require __DIR__ . '/inc/footer.php';
