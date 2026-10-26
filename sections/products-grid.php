<?php

declare(strict_types=1);

/** @var array $section @var array $config */
$list = items($section);
$columns = match (count($list)) {
    3, 6 => 'lg:grid-cols-3',
    5 => 'lg:grid-cols-3 xl:grid-cols-5',
    default => 'lg:grid-cols-4',
};
?>
<section<?= anchor($section) ?> class="<?= surface($section) ?> section">
    <div class="container-x">
        <div class="max-w-2xl">
            <?php if (!empty($section['eyebrow'])): ?>
                <p class="eyebrow"><?= e($section['eyebrow']) ?></p>
            <?php endif; ?>
            <h2 class="display-2 mt-5"><?= e($section['title']) ?></h2>
            <?php if (!empty($section['body'])): ?>
                <p class="lead mt-5"><?= e($section['body']) ?></p>
            <?php endif; ?>
        </div>
        <ul class="mt-12 grid gap-6 sm:grid-cols-2 <?= $columns ?>">
            <?php foreach ($list as $item): ?>
                <li class="card flex flex-col overflow-hidden p-0">
                    <div class="aspect-square overflow-hidden bg-muted">
                        <img class="size-full object-cover" src="<?= e($item['image'] ?? '') ?>" alt="<?= e($item['image_alt'] ?? '') ?>" loading="lazy">
                    </div>
                    <div class="flex flex-1 flex-col p-5">
                        <div class="flex items-baseline justify-between gap-4">
                            <h3 class="font-semibold text-heading"><?= e($item['name']) ?></h3>
                            <?php if (!empty($item['price'])): ?>
                                <p class="shrink-0 font-semibold text-link tabular-nums"><?= e($item['price']) ?></p>
                            <?php endif; ?>
                        </div>
                        <p class="mt-2 flex-1 text-sm leading-relaxed"><?= e($item['description']) ?></p>
                        <a class="link-arrow mt-4 text-sm" href="#contact">
                            <?= e(ui($config, 'enquire')) ?>
                            <?= icon('arrow-right', 'size-4') ?>
                        </a>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</section>
