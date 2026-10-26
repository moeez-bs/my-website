<?php

declare(strict_types=1);

/** @var array $section @var array $config */
$list = items($section);
?>
<section<?= anchor($section) ?> class="<?= surface($section) ?> section">
    <div class="container-x grid gap-12 lg:grid-cols-12 lg:gap-16">
        <div class="lg:col-span-5">
            <div class="lg:sticky lg:top-28">
                <?php if (!empty($section['eyebrow'])): ?>
                    <p class="eyebrow"><?= e($section['eyebrow']) ?></p>
                <?php endif; ?>
                <h2 class="display-2 mt-5"><?= e($section['title']) ?></h2>
                <?php if (!empty($section['body'])): ?>
                    <p class="lead mt-5"><?= e($section['body']) ?></p>
                <?php endif; ?>
                <?php if (!empty($config['header_cta'])): ?>
                    <a class="link-arrow mt-8" href="<?= e($config['header_cta']['href']) ?>">
                        <?= e($config['header_cta']['label']) ?>
                        <?= icon('arrow-right', 'size-4') ?>
                    </a>
                <?php endif; ?>
            </div>
        </div>
        <ol class="divide-y divide-line border-y border-line lg:col-span-7">
            <?php foreach ($list as $index => $item): ?>
                <li class="flex gap-6 py-8 sm:gap-8">
                    <span class="pt-1 font-display text-sm font-semibold tabular-nums text-subtle"><?= e(sprintf('%02d', $index + 1)) ?></span>
                    <div class="flex-1">
                        <h3 class="title-3"><?= e($item['title']) ?></h3>
                        <p class="mt-2 leading-relaxed"><?= e($item['body']) ?></p>
                    </div>
                    <span class="icon-badge hidden sm:inline-flex"><?= icon($item['icon'] ?? 'sparkles', 'size-5') ?></span>
                </li>
            <?php endforeach; ?>
        </ol>
    </div>
</section>
