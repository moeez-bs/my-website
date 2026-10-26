<?php

declare(strict_types=1);

/** @var array $section @var array $config */
$list = items($section);
// Repeating heights give the columns their uneven, collected look.
$shapes = ['aspect-3/4', 'aspect-4/3', 'aspect-square', 'aspect-4/5', 'aspect-3/2'];
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
        <div class="mt-12 columns-2 gap-4 sm:gap-6 lg:columns-3">
            <?php foreach ($list as $index => $item): ?>
                <figure class="group relative mb-4 break-inside-avoid sm:mb-6">
                    <div class="media <?= $shapes[$index % count($shapes)] ?>">
                        <img class="transition duration-500 group-hover:scale-105" src="<?= e($item['image'] ?? '') ?>" alt="<?= e($item['image_alt'] ?? '') ?>" loading="lazy">
                    </div>
                    <?php if (!empty($item['caption'])): ?>
                        <figcaption class="pointer-events-none absolute inset-x-0 bottom-0 rounded-b-[var(--t-media-radius,1.25rem)] bg-linear-to-t from-ink-950/80 to-transparent p-4 pt-10 text-sm font-medium text-white opacity-0 transition-opacity duration-300 group-hover:opacity-100">
                            <?= e($item['caption']) ?>
                        </figcaption>
                    <?php endif; ?>
                </figure>
            <?php endforeach; ?>
        </div>
    </div>
</section>
