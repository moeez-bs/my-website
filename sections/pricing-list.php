<?php

declare(strict_types=1);

/** @var array $section @var array $config */
$list = items($section);
?>
<section<?= anchor($section) ?> class="<?= surface($section) ?> section">
    <div class="container-x max-w-4xl">
        <?php if (!empty($section['eyebrow'])): ?>
            <p class="eyebrow"><?= e($section['eyebrow']) ?></p>
        <?php endif; ?>
        <h2 class="display-2 mt-5"><?= e($section['title']) ?></h2>
        <?php if (!empty($section['body'])): ?>
            <p class="lead mt-5 max-w-2xl"><?= e($section['body']) ?></p>
        <?php endif; ?>
        <ul class="mt-12 divide-y divide-line border-y border-line">
            <?php foreach ($list as $item): ?>
                <li class="py-8">
                    <div class="flex flex-col gap-4 sm:flex-row sm:items-start sm:justify-between sm:gap-10">
                        <div class="max-w-xl">
                            <h3 class="title-3"><?= e($item['name']) ?></h3>
                            <p class="mt-2 leading-relaxed"><?= e($item['description']) ?></p>
                        </div>
                        <p class="shrink-0 sm:text-right">
                            <span class="block font-display text-3xl font-semibold tracking-tight text-heading"><?= e($item['price']) ?></span>
                            <?php if (!empty($item['period'])): ?>
                                <span class="block text-sm text-subtle"><?= e($item['period']) ?></span>
                            <?php endif; ?>
                        </p>
                    </div>
                    <?php $features = items($item, 'features'); ?>
                    <?php if ($features !== []): ?>
                        <ul class="mt-4 flex flex-wrap gap-x-6 gap-y-2 text-sm text-heading">
                            <?php foreach ($features as $feature): ?>
                                <li class="flex items-center gap-2">
                                    <span class="text-link"><?= icon('check', 'size-4') ?></span>
                                    <?= e($feature) ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </li>
            <?php endforeach; ?>
        </ul>
        <?php if (!empty($section['note'])): ?>
            <p class="mt-6 text-sm text-subtle"><?= e($section['note']) ?></p>
        <?php endif; ?>
    </div>
</section>
