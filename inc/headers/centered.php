<?php
/** Centred header: links left, logo in the middle, call to action right. Sticky. */
?>
<header class="surface sticky top-0 z-40 border-b border-line bg-paper/90 backdrop-blur-md">
    <?php // Phones: logo left and menu right, like the standard header. Desktop: links, centred logo, action. ?>
    <div class="container-x flex h-20 items-center justify-between gap-4 lg:grid lg:grid-cols-[1fr_auto_1fr] lg:gap-6">
        <nav aria-label="Primary" class="hidden lg:block">
            <?php chrome_nav_links(array_slice($nav, 0, 4), $page, 'flex items-center gap-7 text-sm font-medium text-body'); ?>
        </nav>
        <div class="min-w-0 lg:max-w-md lg:justify-self-center">
            <?php chrome_logo($config, $page, 'text-xl'); ?>
        </div>
        <div class="flex shrink-0 items-center justify-end gap-2">
            <?php if ($header_cta !== null): ?>
                <a class="btn btn-primary hidden sm:inline-flex" href="<?= e(page_href($header_cta['href'], $page)) ?>"><?= e($header_cta['label']) ?></a>
            <?php endif; ?>
            <?php chrome_mobile_menu($config, $nav, $header_cta, $page); ?>
        </div>
    </div>
</header>
