<?php
/**
 * Overlay header: transparent, white type on the hero photo. It scrolls away
 * with the hero instead of sticking, so it never sits over plain content.
 */
?>
<header class="surface-overlay absolute inset-x-0 top-0 z-40">
    <div class="container-x flex h-20 items-center justify-between gap-6 border-b border-line">
        <?php chrome_logo($config, $page); ?>
        <nav aria-label="Primary" class="hidden lg:block">
            <?php chrome_nav_links(array_slice($nav, 0, 5), $page, 'flex items-center gap-8 text-sm font-medium text-body'); ?>
        </nav>
        <div class="flex items-center gap-2">
            <?php if ($header_cta !== null): ?>
                <a class="btn btn-primary hidden sm:inline-flex" href="<?= e(page_href($header_cta['href'], $page)) ?>"><?= e($header_cta['label']) ?></a>
            <?php endif; ?>
            <?php chrome_mobile_menu($config, $nav, $header_cta, $page); ?>
        </div>
    </div>
</header>
