<?php

declare(strict_types=1);

/**
 * Shared pieces of the header and footer variants, so every variant links,
 * labels and opens its menu the same way.
 */

function chrome_logo(array $config, string $page, string $size = 'text-lg'): void
{
    ?>
    <a href="<?= e(home_href($page)) ?>" class="flex min-w-0 items-center gap-3">
        <span class="logo-mark" aria-hidden="true"><?= logo_mark($config) ?></span>
        <span class="truncate font-display <?= e($size) ?> font-semibold tracking-tight text-heading"><?= e($config['name']) ?></span>
    </a>
    <?php
}

/** @param list<array{label: string, href: string}> $nav */
function chrome_mobile_menu(array $config, array $nav, ?array $cta, string $page): void
{
    ?>
    <details class="group relative lg:hidden">
        <summary class="flex size-11 cursor-pointer items-center justify-center rounded-md text-heading hover:bg-tint" aria-label="<?= e(ui($config, 'menu')) ?>">
            <span class="group-open:hidden"><?= icon('menu', 'size-6') ?></span>
            <span class="hidden group-open:block"><?= icon('x', 'size-6') ?></span>
        </summary>
        <div class="surface card absolute right-0 top-full mt-3 w-72 p-3 shadow-xl">
            <ul class="flex flex-col">
                <?php foreach ($nav as $item): ?>
                    <li>
                        <a class="block rounded-md px-4 py-3 font-medium text-heading hover:bg-muted" href="<?= e(page_href($item['href'], $page)) ?>"><?= e($item['label']) ?></a>
                    </li>
                <?php endforeach; ?>
            </ul>
            <?php if ($cta !== null): ?>
                <a class="btn btn-primary mt-2 w-full" href="<?= e(page_href($cta['href'], $page)) ?>"><?= e($cta['label']) ?></a>
            <?php endif; ?>
        </div>
    </details>
    <?php
}

/** @param list<array{label: string, href: string}> $nav */
function chrome_nav_links(array $nav, string $page, string $class): void
{
    ?>
    <ul class="<?= e($class) ?>">
        <?php foreach ($nav as $item): ?>
            <li><a class="transition-colors hover:text-heading" href="<?= e(page_href($item['href'], $page)) ?>"><?= e($item['label']) ?></a></li>
        <?php endforeach; ?>
    </ul>
    <?php
}
