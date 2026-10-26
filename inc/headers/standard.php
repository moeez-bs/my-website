<?php
/** Standard header: logo left, links centre, call to action right. Sticky. */
?>
<header class="surface sticky top-0 z-40 border-b border-line bg-paper/90 backdrop-blur-md">
    <div class="container-x flex h-18 items-center justify-between gap-6">
        <?php chrome_logo($config, $page); ?>

        <nav aria-label="Primary" class="hidden lg:block">
            <ul class="flex items-center gap-8 text-sm font-medium">
                <?php foreach (array_slice($nav, 0, 5) as $item): ?>
                    <li>
                        <a class="text-body transition-colors hover:text-heading" href="<?= e(page_href($item['href'], $page)) ?>"><?= e($item['label']) ?></a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </nav>

        <div class="flex items-center gap-2">
            <?php if ($header_cta !== null): ?>
                <a class="btn btn-primary hidden sm:inline-flex" href="<?= e(page_href($header_cta['href'], $page)) ?>"><?= e($header_cta['label']) ?></a>
            <?php endif; ?>

            <?php chrome_mobile_menu($config, $nav, $header_cta, $page); ?>
        </div>
    </div>
</header>
