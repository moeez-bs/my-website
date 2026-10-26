<?php

declare(strict_types=1);

/** @var array $section @var array $config */
$highlights = items($section, 'highlights');
// The proof-point row closes the hero with its own rule, so it needs less room below.
$padding = $highlights !== []
    ? 'pt-20 pb-12 sm:pt-28 sm:pb-14 lg:pt-36 lg:pb-16'
    : 'py-20 sm:py-28 lg:py-36';
?>
<section<?= anchor($section) ?> class="<?= surface($section) ?>">
    <div class="container-x <?= $padding ?>">
        <div class="max-w-5xl">
            <?php if (!empty($section['eyebrow'])): ?>
                <p class="eyebrow"><?= e($section['eyebrow']) ?></p>
            <?php endif; ?>
            <h1 class="display-1 mt-6 sm:text-7xl lg:text-8xl"><?= e($section['title']) ?></h1>
            <p class="lead mt-8 max-w-2xl"><?= e($section['body']) ?></p>
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
            <ul class="mt-14 grid gap-6 border-t border-line pt-8 sm:grid-cols-3 lg:mt-20">
                <?php foreach ($highlights as $highlight): ?>
                    <li class="flex items-center gap-3 font-medium text-heading">
                        <span class="icon-badge size-10"><?= icon('check', 'size-5') ?></span>
                        <?= e($highlight) ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>
</section>
