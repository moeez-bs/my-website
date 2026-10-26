<?php

declare(strict_types=1);

/** @var array $section @var array $config */
$highlights = items($section, 'highlights');
?>
<section<?= anchor($section) ?> class="<?= surface($section) ?> overflow-hidden">
    <div class="container-x pt-6 pb-16 sm:pt-10 sm:pb-20">
        <div class="media aspect-4/3 sm:aspect-video lg:aspect-21/9">
            <img src="<?= e($section['image']) ?>" alt="<?= e($section['image_alt'] ?? '') ?>" fetchpriority="high">
        </div>
        <div class="relative z-10 -mt-20 px-3 sm:-mt-32 sm:px-8 lg:-mt-40 lg:px-12">
            <div class="card max-w-3xl p-7 shadow-xl sm:p-10 lg:p-12">
                <?php if (!empty($section['eyebrow'])): ?>
                    <p class="eyebrow"><?= e($section['eyebrow']) ?></p>
                <?php endif; ?>
                <h1 class="display-1 mt-5"><?= e($section['title']) ?></h1>
                <p class="lead mt-5 max-w-2xl"><?= e($section['body']) ?></p>
                <div class="mt-8 flex flex-wrap gap-3">
                    <a class="btn btn-primary" href="<?= e($section['primary_href']) ?>">
                        <?= e($section['primary_label']) ?>
                        <?= icon('arrow-right', 'size-4') ?>
                    </a>
                    <?php if (!empty($section['secondary_label'])): ?>
                        <a class="btn btn-ghost" href="<?= e($section['secondary_href']) ?>"><?= e($section['secondary_label']) ?></a>
                    <?php endif; ?>
                </div>
                <?php if ($highlights !== []): ?>
                    <ul class="mt-8 flex flex-wrap gap-x-6 gap-y-3 text-sm font-medium text-heading">
                        <?php foreach ($highlights as $highlight): ?>
                            <li class="flex items-center gap-2">
                                <span class="text-link"><?= icon('circle-check', 'size-5') ?></span>
                                <?= e($highlight) ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
