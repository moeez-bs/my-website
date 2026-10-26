<?php

declare(strict_types=1);

/** @var array $section @var array $config */
$paragraphs = items($section, 'body');
$points = items($section, 'points');
$flip = !empty($section['flip']);
?>
<section<?= anchor($section) ?> class="<?= surface($section) ?> section">
    <div class="container-x grid items-center gap-12 lg:grid-cols-2 lg:gap-20">
        <div class="<?= $flip ? 'lg:order-last' : '' ?>">
            <div class="media aspect-4/3 lg:aspect-4/5">
                <img src="<?= e($section['image']) ?>" alt="<?= e($section['image_alt'] ?? '') ?>" loading="lazy">
            </div>
        </div>
        <div>
            <?php if (!empty($section['eyebrow'])): ?>
                <p class="eyebrow"><?= e($section['eyebrow']) ?></p>
            <?php endif; ?>
            <h2 class="display-2 mt-5"><?= e($section['title']) ?></h2>
            <div class="mt-6 space-y-4 text-lg leading-relaxed">
                <?php foreach ($paragraphs as $paragraph): ?>
                    <p><?= e($paragraph) ?></p>
                <?php endforeach; ?>
            </div>
            <?php if ($points !== []): ?>
                <ul class="mt-10 grid gap-4 sm:grid-cols-2">
                    <?php foreach ($points as $point): ?>
                        <li class="flex gap-3 font-medium text-heading">
                            <span class="mt-0.5 text-link"><?= icon('circle-check', 'size-5') ?></span>
                            <span><?= e($point) ?></span>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </div>
    </div>
</section>
