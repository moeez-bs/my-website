<?php

declare(strict_types=1);

/** @var array $section @var array $config */
$list = items($section);
$columns = count($list) % 4 === 0 ? 'lg:grid-cols-4' : 'lg:grid-cols-3';
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
        <ul class="mt-12 grid grid-cols-2 gap-4 sm:gap-6 <?= $columns ?>">
            <?php foreach ($list as $item): ?>
                <li>
                    <figure>
                        <div class="media aspect-square">
                            <img src="<?= e($item['image'] ?? '') ?>" alt="<?= e($item['image_alt'] ?? '') ?>" loading="lazy">
                        </div>
                        <?php if (!empty($item['caption'])): ?>
                            <figcaption class="mt-3 text-sm text-subtle"><?= e($item['caption']) ?></figcaption>
                        <?php endif; ?>
                    </figure>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</section>
