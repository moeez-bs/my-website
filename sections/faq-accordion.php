<?php

declare(strict_types=1);

/** @var array $section @var array $config */
$list = items($section);
?>
<section<?= anchor($section) ?> class="<?= surface($section) ?> section">
    <div class="container-x grid gap-12 lg:grid-cols-12 lg:gap-16">
        <div class="lg:col-span-4">
            <?php if (!empty($section['eyebrow'])): ?>
                <p class="eyebrow"><?= e($section['eyebrow']) ?></p>
            <?php endif; ?>
            <h2 class="display-2 mt-5"><?= e($section['title']) ?></h2>
            <?php if (!empty($section['body'])): ?>
                <p class="lead mt-5"><?= e($section['body']) ?></p>
            <?php endif; ?>
        </div>
        <div class="divide-y divide-line border-y border-line lg:col-span-8">
            <?php foreach ($list as $index => $item): ?>
                <details class="group py-6"<?= $index === 0 ? ' open' : '' ?>>
                    <summary class="flex cursor-pointer items-start justify-between gap-6">
                        <span class="title-3"><?= e($item['question']) ?></span>
                        <span class="mt-1 text-link transition-transform duration-200 group-open:rotate-45"><?= icon('plus', 'size-5') ?></span>
                    </summary>
                    <p class="mt-4 max-w-2xl pr-10 leading-relaxed"><?= e($item['answer']) ?></p>
                </details>
            <?php endforeach; ?>
        </div>
    </div>
</section>
