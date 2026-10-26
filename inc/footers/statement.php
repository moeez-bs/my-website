<?php
/**
 * Statement footer: a closing call to action, links and contact, under the
 * business name set as large as the width allows.
 */
$header_cta = is_array($config['header_cta'] ?? null) ? $config['header_cta'] : null;
$name = (string) $config['name'];
$length = function_exists('mb_strlen') ? mb_strlen($name) : strlen($name);
// Scale the wordmark to the name's length so it spans the page without overflowing.
$wordmark_vw = round(140 / max(6, $length), 2);
?>
<footer class="surface-dark overflow-hidden">
    <div class="container-x pt-16 sm:pt-20">
        <div class="grid gap-12 lg:grid-cols-12">
            <div class="lg:col-span-6">
                <?php if (!empty($config['footer_blurb'])): ?>
                    <p class="max-w-md text-lg leading-relaxed text-heading"><?= e($config['footer_blurb']) ?></p>
                <?php endif; ?>
                <?php if ($header_cta !== null): ?>
                    <a class="btn btn-primary mt-8" href="<?= e(page_href($header_cta['href'], $page)) ?>">
                        <?= e($header_cta['label']) ?>
                        <?= icon('arrow-right', 'size-4') ?>
                    </a>
                <?php endif; ?>
            </div>
            <?php if ($nav !== []): ?>
                <nav aria-label="Footer" class="lg:col-span-3">
                    <p class="text-sm font-semibold text-heading"><?= e(ui($config, 'explore')) ?></p>
                    <?php chrome_nav_links($nav, $page, 'mt-5 space-y-3 text-sm'); ?>
                </nav>
            <?php endif; ?>
            <?php if (!empty($config['phone']) || !empty($config['email']) || !empty($config['address'])): ?>
                <div class="lg:col-span-3">
                    <p class="text-sm font-semibold text-heading"><?= e(ui($config, 'contact')) ?></p>
                    <ul class="mt-5 space-y-3 text-sm">
                        <?php if (!empty($config['phone'])): ?>
                            <li><a class="hover:text-heading" href="<?= e(tel_href($config['phone'])) ?>"><?= e($config['phone']) ?></a></li>
                        <?php endif; ?>
                        <?php if (!empty($config['email'])): ?>
                            <li><a class="hover:text-heading" href="mailto:<?= e($config['email']) ?>"><?= e($config['email']) ?></a></li>
                        <?php endif; ?>
                        <?php if (!empty($config['address'])): ?>
                            <li><?= e($config['address']) ?></li>
                        <?php endif; ?>
                    </ul>
                </div>
            <?php endif; ?>
        </div>
        <p class="mt-16 font-display font-semibold leading-[0.9] tracking-tight text-heading [overflow-wrap:anywhere]" style="font-size: clamp(2.25rem, <?= e((string) $wordmark_vw) ?>vw, 11rem)" aria-hidden="true"><?= e($name) ?></p>
        <div class="flex flex-col gap-3 border-t border-line py-8 mt-10 text-sm text-subtle sm:flex-row sm:justify-between">
            <p>© <?= e(date('Y')) ?> <?= e($name) ?>. <?= e(ui($config, 'rights')) ?></p>
            <a class="hover:text-heading" href="privacy.php"><?= e(ui($config, 'privacy')) ?></a>
        </div>
    </div>
</footer>
