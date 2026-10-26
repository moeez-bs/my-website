<?php
/** Columns footer: about, links and contact in three columns. */
?>
<footer class="surface-dark">
    <div class="container-x grid gap-12 py-16 sm:py-20 lg:grid-cols-12">
        <div class="lg:col-span-5">
            <?php chrome_logo($config, $page); ?>
            <?php if (!empty($config['footer_blurb'])): ?>
                <p class="mt-5 max-w-sm text-sm leading-relaxed"><?= e($config['footer_blurb']) ?></p>
            <?php endif; ?>
        </div>

        <?php if ($nav !== []): ?>
            <nav aria-label="Footer" class="lg:col-span-3">
                <p class="text-sm font-semibold text-heading"><?= e(ui($config, 'explore')) ?></p>
                <ul class="mt-5 space-y-3 text-sm">
                    <?php foreach ($nav as $item): ?>
                        <li><a class="hover:text-heading" href="<?= e(page_href($item['href'], $page)) ?>"><?= e($item['label']) ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </nav>
        <?php endif; ?>

        <?php if (!empty($config['phone']) || !empty($config['email']) || !empty($config['address'])): ?>
            <div class="lg:col-span-4">
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
    <div class="container-x">
        <div class="flex flex-col gap-3 border-t border-line py-8 text-sm text-subtle sm:flex-row sm:justify-between">
            <p>© <?= e(date('Y')) ?> <?= e($config['name']) ?>. <?= e(ui($config, 'rights')) ?></p>
            <a class="hover:text-heading" href="privacy.php"><?= e(ui($config, 'privacy')) ?></a>
        </div>
    </div>
</footer>
