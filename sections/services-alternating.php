<?php

declare(strict_types=1);

/** @var array $section @var array $config */
$list = items($section);
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
        <div class="mt-16 space-y-16 lg:mt-20 lg:space-y-24">
            <?php foreach ($list as $index => $item): ?>
                <article class="grid items-center gap-8 lg:grid-cols-2 lg:gap-16">
                    <div class="<?= $index % 2 === 1 ? 'lg:order-last' : '' ?>">
                        <div class="media aspect-4/3">
                            <img src="<?= e($item['image'] ?? '') ?>" alt="<?= e($item['image_alt'] ?? '') ?>" loading="lazy">
                        </div>
                    </div>
                    <div class="max-w-xl">
                        <span class="icon-badge"><?= icon($item['icon'] ?? 'sparkles', 'size-6') ?></span>
                        <h3 class="title-3 mt-6 sm:text-2xl"><?= e($item['title']) ?></h3>
                        <p class="mt-4 text-lg leading-relaxed"><?= e($item['body']) ?></p>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>
