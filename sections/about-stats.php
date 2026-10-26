<?php

declare(strict_types=1);

/** @var array $section @var array $config */
$paragraphs = items($section, 'body');
$points = items($section, 'points');
$figures = items($section, 'figures');
?>
<section<?= anchor($section) ?> class="<?= surface($section) ?> section">
    <div class="container-x grid gap-12 lg:grid-cols-12 lg:gap-16">
        <div class="lg:col-span-7">
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
        <?php if ($figures !== []): ?>
            <dl class="grid content-center gap-4 sm:grid-cols-3 lg:col-span-5 lg:grid-cols-1">
                <?php foreach ($figures as $figure): ?>
                    <div class="card flex flex-col-reverse gap-1">
                        <dt class="text-sm leading-snug"><?= e($figure['label']) ?></dt>
                        <dd class="font-display text-4xl font-semibold tracking-tight text-heading sm:text-5xl"><?= e($figure['value']) ?></dd>
                    </div>
                <?php endforeach; ?>
            </dl>
        <?php endif; ?>
    </div>
</section>
