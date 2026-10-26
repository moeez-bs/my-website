<?php

declare(strict_types=1);

/** @var array $section @var array $config */
$paragraphs = items($section, 'body');
$points = items($section, 'points');
$photos = items($section, 'photos');
?>
<section<?= anchor($section) ?> class="<?= surface($section) ?> section">
    <div class="container-x">
        <div class="mx-auto max-w-3xl text-center">
            <?php if (!empty($section['eyebrow'])): ?>
                <p class="eyebrow"><?= e($section['eyebrow']) ?></p>
            <?php endif; ?>
            <h2 class="display-2 mt-5"><?= e($section['title']) ?></h2>
            <div class="mt-6 space-y-4 text-lg leading-relaxed">
                <?php foreach ($paragraphs as $paragraph): ?>
                    <p><?= e($paragraph) ?></p>
                <?php endforeach; ?>
            </div>
        </div>
        <?php if ($photos !== []): ?>
            <div class="mt-14 grid gap-4 sm:grid-cols-3 sm:gap-6">
                <?php foreach ($photos as $index => $photo): ?>
                    <div class="media aspect-4/3 sm:aspect-4/5 <?= $index === 1 ? 'sm:translate-y-8' : '' ?>">
                        <img src="<?= e($photo['image'] ?? '') ?>" alt="<?= e($photo['image_alt'] ?? '') ?>" loading="lazy">
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        <?php if ($points !== []): ?>
            <ul class="mx-auto mt-16 flex max-w-4xl flex-wrap justify-center gap-x-8 gap-y-4 sm:mt-20">
                <?php foreach ($points as $point): ?>
                    <li class="flex items-center gap-2 font-medium text-heading">
                        <span class="text-link"><?= icon('circle-check', 'size-5') ?></span>
                        <?= e($point) ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>
</section>
