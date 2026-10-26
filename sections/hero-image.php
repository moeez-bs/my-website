<?php

declare(strict_types=1);

/** @var array $section @var array $config */
$highlights = items($section, 'highlights');
// The proof-point row closes the hero with its own rule, so it needs less room below.
$padding = $highlights !== []
    ? 'pt-28 pb-12 sm:pt-36 sm:pb-14 lg:pt-44 lg:pb-16'
    : 'py-28 sm:py-36 lg:py-44';
?>
<section<?= anchor($section) ?> class="surface-dark relative isolate overflow-hidden">
    <img class="absolute inset-0 -z-20 size-full object-cover" src="<?= e($section['image']) ?>" alt="<?= e($section['image_alt'] ?? '') ?>" fetchpriority="high">
    <div class="absolute inset-0 -z-10 bg-linear-to-r from-ink-950/90 via-ink-950/65 to-ink-950/25"></div>
    <div class="surface-overlay container-x <?= $padding ?>">
        <div class="max-w-2xl">
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
        </div>
        <?php if ($highlights !== []): ?>
            <ul class="mt-16 grid max-w-4xl gap-5 border-t border-line pt-8 sm:grid-cols-3">
                <?php foreach ($highlights as $highlight): ?>
                    <li class="flex items-center gap-3 text-sm font-medium text-heading">
                        <span class="icon-badge size-9"><?= icon('check', 'size-4') ?></span>
                        <?= e($highlight) ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>
</section>
