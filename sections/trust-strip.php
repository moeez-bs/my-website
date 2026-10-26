<?php

declare(strict_types=1);

/** @var array $section @var array $config */
$list = items($section);
?>
<section<?= anchor($section) ?> class="<?= surface($section) ?> border-y border-line">
    <div class="container-x py-5">
        <ul class="flex flex-wrap items-center justify-center gap-x-8 gap-y-3 text-sm font-medium text-heading">
            <?php foreach ($list as $item): ?>
                <li class="flex items-center gap-2">
                    <span class="text-link"><?= icon($item['icon'] ?? 'check', 'size-4') ?></span>
                    <?= e($item['text']) ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</section>
