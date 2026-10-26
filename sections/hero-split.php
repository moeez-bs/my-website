<?php

declare(strict_types=1);

/** @var array $section @var array $config */
$highlights = items($section, 'highlights');
?>
<section<?= anchor($section) ?> class="<?= surface($section) ?> relative isolate overflow-hidden">
    <div class="container-x grid items-center gap-12 py-16 sm:py-20 lg:grid-cols-12 lg:gap-16 lg:py-24">
        <div class="lg:col-span-6">
            <?php if (!empty($section['eyebrow'])): ?>
                <p class="eyebrow"><?= e($section['eyebrow']) ?></p>
            <?php endif; ?>
            <h1 class="display-1 mt-6"><?= e($section['title']) ?></h1>
            <p class="lead mt-6 max-w-xl"><?= e($section['body']) ?></p>
            <div class="mt-10 flex flex-wrap gap-3">
                <a class="btn btn-primary" href="<?= e($section['primary_href']) ?>">
                    <?= e($section['primary_label']) ?>
                    <?= icon('arrow-right', 'size-4') ?>
                </a>
                <?php if (!empty($section['secondary_label'])): ?>
                    <a class="btn btn-ghost" href="<?= e($section['secondary_href']) ?>"><?= e($section['secondary_label']) ?></a>
                <?php endif; ?>
            </div>
            <?php if ($highlights !== []): ?>
                <ul class="mt-10 flex flex-wrap gap-x-7 gap-y-3 text-sm font-medium text-heading">
                    <?php foreach ($highlights as $highlight): ?>
                        <li class="flex items-center gap-2">
                            <span class="text-link"><?= icon('circle-check', 'size-5') ?></span>
                            <?= e($highlight) ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </div>
        <div class="relative lg:col-span-6">
            <div class="absolute -right-5 -top-5 -z-10 hidden h-3/4 w-3/4 rounded-[var(--t-media-radius,1.25rem)] bg-tint-strong sm:block"></div>
            <div class="media aspect-4/3 lg:aspect-4/5">
                <img src="<?= e($section['image']) ?>" alt="<?= e($section['image_alt'] ?? '') ?>" fetchpriority="high">
            </div>
        </div>
    </div>
</section>
