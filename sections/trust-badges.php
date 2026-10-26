<?php

declare(strict_types=1);

/** @var array $section @var array $config */
$list = items($section);
$columns = match (count($list)) {
    3 => 'sm:grid-cols-3',
    4 => 'grid-cols-2 lg:grid-cols-4',
    default => 'grid-cols-2 lg:grid-cols-5',
};
?>
<section<?= anchor($section) ?> class="<?= surface($section, 'alt') ?>">
    <div class="container-x py-10 sm:py-12">
        <ul class="grid gap-6 <?= $columns ?>">
            <?php foreach ($list as $item): ?>
                <li class="flex items-center gap-3">
                    <span class="icon-badge size-11"><?= icon($item['icon'] ?? 'shield-check', 'size-5') ?></span>
                    <span class="text-sm font-semibold leading-snug text-heading"><?= e($item['text']) ?></span>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</section>
