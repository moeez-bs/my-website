<?php

declare(strict_types=1);

/** @var array $section @var array $config */
$list = items($section);
$columns = match (count($list)) {
    2, 4 => 'sm:grid-cols-2 lg:grid-cols-4',
    default => 'sm:grid-cols-2 lg:grid-cols-3',
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
        <ul class="mt-14 grid gap-x-6 gap-y-12 <?= $columns ?>">
            <?php foreach ($list as $item): ?>
                <li>
                    <div class="media aspect-4/5">
                        <img src="<?= e($item['image'] ?? '') ?>" alt="<?= e($item['image_alt'] ?? '') ?>" loading="lazy">
                    </div>
                    <h3 class="title-3 mt-5"><?= e($item['name']) ?></h3>
                    <p class="mt-1 text-sm font-medium text-link"><?= e($item['role']) ?></p>
                    <?php if (!empty($item['bio'])): ?>
                        <p class="mt-3 leading-relaxed"><?= e($item['bio']) ?></p>
                    <?php endif; ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</section>
