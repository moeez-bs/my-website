<?php

declare(strict_types=1);

/** @var array $section @var array $config */
$list = items($section);
$last = count($list) - 1;
?>
<section<?= anchor($section) ?> class="<?= surface($section) ?> section">
    <div class="container-x grid gap-12 lg:grid-cols-12 lg:gap-16">
        <div class="lg:col-span-5">
            <div class="lg:sticky lg:top-28">
                <?php if (!empty($section['eyebrow'])): ?>
                    <p class="eyebrow"><?= e($section['eyebrow']) ?></p>
                <?php endif; ?>
                <h2 class="display-2 mt-5"><?= e($section['title']) ?></h2>
                <?php if (!empty($section['body'])): ?>
                    <p class="lead mt-5"><?= e($section['body']) ?></p>
                <?php endif; ?>
            </div>
        </div>
        <ol class="lg:col-span-7">
            <?php foreach ($list as $index => $item): ?>
                <li class="relative flex gap-6 <?= $index === $last ? '' : 'pb-12' ?>">
                    <?php if ($index !== $last): ?>
                        <span class="absolute top-14 bottom-2 left-6 w-px bg-line" aria-hidden="true"></span>
                    <?php endif; ?>
                    <span class="step-mark"><?= e((string) ($index + 1)) ?></span>
                    <div class="pt-2.5">
                        <h3 class="title-3"><?= e($item['title']) ?></h3>
                        <p class="mt-2 leading-relaxed"><?= e($item['body']) ?></p>
                    </div>
                </li>
            <?php endforeach; ?>
        </ol>
    </div>
</section>
