<?php

declare(strict_types=1);

/** @var array $section @var array $config */
$list = items($section);
$columns = match (count($list)) {
    2, 4 => 'sm:grid-cols-2',
    default => 'sm:grid-cols-2 lg:grid-cols-3',
};
?>
<section<?= anchor($section) ?> class="<?= surface($section) ?> section">
    <div class="container-x">
        <div class="grid gap-6 lg:grid-cols-12 lg:items-end">
            <div class="lg:col-span-7">
                <?php if (!empty($section['eyebrow'])): ?>
                    <p class="eyebrow"><?= e($section['eyebrow']) ?></p>
                <?php endif; ?>
                <h2 class="display-2 mt-5"><?= e($section['title']) ?></h2>
            </div>
            <?php if (!empty($section['body'])): ?>
                <p class="lead lg:col-span-5"><?= e($section['body']) ?></p>
            <?php endif; ?>
        </div>
        <ul class="mt-14 grid gap-6 <?= $columns ?>">
            <?php foreach ($list as $item): ?>
                <li class="card flex flex-col">
                    <span class="icon-badge"><?= icon($item['icon'] ?? 'sparkles', 'size-6') ?></span>
                    <h3 class="title-3 mt-6"><?= e($item['title']) ?></h3>
                    <p class="mt-3 leading-relaxed"><?= e($item['body']) ?></p>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</section>
