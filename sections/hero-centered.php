<?php

declare(strict_types=1);

/** @var array $section @var array $config */
$highlights = items($section, 'highlights');
?>
<section<?= anchor($section) ?> class="<?= surface($section) ?> overflow-hidden">
    <div class="container-x pt-16 pb-16 text-center sm:pt-24 sm:pb-20">
        <div class="mx-auto max-w-3xl">
            <?php if (!empty($section['eyebrow'])): ?>
                <p class="eyebrow"><?= e($section['eyebrow']) ?></p>
            <?php endif; ?>
            <h1 class="display-1 mt-6"><?= e($section['title']) ?></h1>
            <p class="lead mx-auto mt-6 max-w-2xl"><?= e($section['body']) ?></p>
            <div class="mt-10 flex flex-wrap justify-center gap-3">
                <a class="btn btn-primary" href="<?= e($section['primary_href']) ?>">
                    <?= e($section['primary_label']) ?>
                    <?= icon('arrow-right', 'size-4') ?>
                </a>
                <?php if (!empty($section['secondary_label'])): ?>
                    <a class="btn btn-ghost" href="<?= e($section['secondary_href']) ?>"><?= e($section['secondary_label']) ?></a>
                <?php endif; ?>
            </div>
            <?php if ($highlights !== []): ?>
                <ul class="mt-10 flex flex-wrap justify-center gap-x-7 gap-y-3 text-sm font-medium text-heading">
                    <?php foreach ($highlights as $highlight): ?>
                        <li class="flex items-center gap-2">
                            <span class="text-link"><?= icon('circle-check', 'size-5') ?></span>
                            <?= e($highlight) ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </div>
        <div class="media mt-14 aspect-video sm:mt-16 lg:aspect-21/9">
            <img src="<?= e($section['image']) ?>" alt="<?= e($section['image_alt'] ?? '') ?>" fetchpriority="high">
        </div>
    </div>
</section>
