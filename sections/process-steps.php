<?php

declare(strict_types=1);

/** @var array $section @var array $config */
$list = items($section);
$columns = count($list) === 4 ? 'sm:grid-cols-2 lg:grid-cols-4' : 'sm:grid-cols-3';
?>
<section<?= anchor($section) ?> class="<?= surface($section) ?> section">
    <div class="container-x">
        <div class="mx-auto max-w-2xl text-center">
            <?php if (!empty($section['eyebrow'])): ?>
                <p class="eyebrow"><?= e($section['eyebrow']) ?></p>
            <?php endif; ?>
            <h2 class="display-2 mt-5"><?= e($section['title']) ?></h2>
            <?php if (!empty($section['body'])): ?>
                <p class="lead mt-5"><?= e($section['body']) ?></p>
            <?php endif; ?>
        </div>
        <ol class="mt-16 grid gap-x-8 gap-y-12 <?= $columns ?>">
            <?php foreach ($list as $index => $item): ?>
                <li>
                    <div class="flex items-center gap-4">
                        <span class="step-mark"><?= e((string) ($index + 1)) ?></span>
                        <span class="hidden h-px flex-1 bg-line lg:block" aria-hidden="true"></span>
                    </div>
                    <h3 class="title-3 mt-6"><?= e($item['title']) ?></h3>
                    <p class="mt-3 leading-relaxed"><?= e($item['body']) ?></p>
                </li>
            <?php endforeach; ?>
        </ol>
    </div>
</section>
