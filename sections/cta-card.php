<?php

declare(strict_types=1);

/**
 * The section itself sits on the default surface; `surface` (brand or dark)
 * colours the card.
 * @var array $section @var array $config
 */
?>
<section<?= anchor($section) ?> class="surface section">
    <div class="container-x">
        <div class="<?= surface($section, 'dark') ?> relative isolate overflow-hidden rounded-[var(--t-media-radius,1.25rem)] px-6 py-14 sm:px-14 sm:py-20 lg:flex lg:items-center lg:justify-between lg:gap-12">
            <div class="absolute -right-24 -top-24 -z-10 size-96 rounded-full bg-brand-500/35 blur-3xl" aria-hidden="true"></div>
            <div class="absolute -bottom-32 -left-20 -z-10 size-80 rounded-full bg-accent-500/20 blur-3xl" aria-hidden="true"></div>
            <div class="max-w-xl">
                <h2 class="display-2"><?= e($section['title']) ?></h2>
                <?php if (!empty($section['body'])): ?>
                    <p class="lead mt-5"><?= e($section['body']) ?></p>
                <?php endif; ?>
            </div>
            <div class="mt-10 flex flex-wrap gap-3 lg:mt-0 lg:flex-none">
                <a class="btn btn-primary" href="<?= e($section['button_href']) ?>">
                    <?= e($section['button_label']) ?>
                    <?= icon('arrow-right', 'size-4') ?>
                </a>
                <?php if (!empty($config['phone'])): ?>
                    <a class="btn btn-ghost" href="<?= e(tel_href($config['phone'])) ?>"><?= e($config['phone']) ?></a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
