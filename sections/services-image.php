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
        <div class="mx-auto max-w-2xl text-center">
            <?php if (!empty($section['eyebrow'])): ?>
                <p class="eyebrow"><?= e($section['eyebrow']) ?></p>
            <?php endif; ?>
            <h2 class="display-2 mt-5"><?= e($section['title']) ?></h2>
            <?php if (!empty($section['body'])): ?>
                <p class="lead mt-5"><?= e($section['body']) ?></p>
            <?php endif; ?>
        </div>
        <ul class="mt-14 grid gap-7 <?= $columns ?>">
            <?php foreach ($list as $item): ?>
                <li class="group card flex flex-col overflow-hidden p-0">
                    <div class="aspect-3/2 overflow-hidden bg-muted">
                        <img class="size-full object-cover transition duration-500 group-hover:scale-105" src="<?= e($item['image'] ?? '') ?>" alt="<?= e($item['image_alt'] ?? '') ?>" loading="lazy">
                    </div>
                    <div class="flex flex-1 flex-col p-6 sm:p-7">
                        <h3 class="title-3"><?= e($item['title']) ?></h3>
                        <p class="mt-3 leading-relaxed"><?= e($item['body']) ?></p>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</section>
