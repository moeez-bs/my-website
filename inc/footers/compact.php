<?php
/** Compact footer: one band with the logo, links and the small print. */
?>
<footer class="surface-dark">
    <div class="container-x flex flex-col gap-8 py-10 lg:flex-row lg:items-center lg:justify-between">
        <?php chrome_logo($config, $page); ?>
        <?php if ($nav !== []): ?>
            <nav aria-label="Footer">
                <?php chrome_nav_links($nav, $page, 'flex flex-wrap gap-x-6 gap-y-2 text-sm'); ?>
            </nav>
        <?php endif; ?>
        <div class="flex flex-col gap-1 text-sm text-subtle lg:items-end">
            <p>© <?= e(date('Y')) ?> <?= e($config['name']) ?>. <?= e(ui($config, 'rights')) ?></p>
            <a class="hover:text-heading" href="privacy.php"><?= e(ui($config, 'privacy')) ?></a>
        </div>
    </div>
</footer>
