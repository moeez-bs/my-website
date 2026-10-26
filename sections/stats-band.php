<?php

declare(strict_types=1);

/** @var array $section @var array $config */
$list = items($section);
$columns = count($list) === 4 ? 'grid-cols-2 lg:grid-cols-4' : 'sm:grid-cols-3';
?>
<section<?= anchor($section) ?> class="<?= surface($section, 'brand') ?>">
    <div class="container-x py-14 sm:py-16">
        <dl class="grid gap-x-8 gap-y-10 <?= $columns ?>">
            <?php foreach ($list as $item): ?>
                <div class="flex flex-col-reverse gap-2 border-l border-line pl-6">
                    <dt class="text-sm leading-snug"><?= e($item['label']) ?></dt>
                    <dd class="font-display text-4xl font-semibold tracking-tight text-heading sm:text-5xl"><?= e($item['value']) ?></dd>
                </div>
            <?php endforeach; ?>
        </dl>
    </div>
</section>
