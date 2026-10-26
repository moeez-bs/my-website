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
        </div>
        <div class="mt-14 gap-6 sm:columns-2 lg:columns-3">
            <?php foreach ($list as $item): ?>
                <figure class="card mb-6 break-inside-avoid">
                    <div class="stars" aria-label="5 out of 5">
                        <?php for ($star = 0; $star < 5; $star++): ?>
                            <?= icon('star', 'size-4 fill-current') ?>
                        <?php endfor; ?>
                    </div>
                    <blockquote class="mt-4 leading-relaxed text-heading">
                        <p>“<?= e($item['quote']) ?>”</p>
                    </blockquote>
                    <figcaption class="mt-6 flex items-center gap-3">
                        <span class="avatar" aria-hidden="true"><?= e(initials($item['name'])) ?></span>
                        <span>
                            <span class="block text-sm font-semibold text-heading"><?= e($item['name']) ?></span>
                            <?php if (!empty($item['role'])): ?>
                                <span class="block text-sm text-subtle"><?= e($item['role']) ?></span>
                            <?php endif; ?>
                        </span>
                    </figcaption>
                </figure>
            <?php endforeach; ?>
        </div>
    </div>
</section>
