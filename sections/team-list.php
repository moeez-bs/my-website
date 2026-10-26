<?php

declare(strict_types=1);

/** @var array $section @var array $config */
$list = items($section);
?>
<section<?= anchor($section) ?> class="<?= surface($section) ?> section">
    <div class="container-x grid gap-12 lg:grid-cols-12 lg:gap-16">
        <div class="lg:col-span-4">
            <?php if (!empty($section['eyebrow'])): ?>
                <p class="eyebrow"><?= e($section['eyebrow']) ?></p>
            <?php endif; ?>
            <h2 class="display-2 mt-5"><?= e($section['title']) ?></h2>
            <?php if (!empty($section['body'])): ?>
                <p class="lead mt-5"><?= e($section['body']) ?></p>
            <?php endif; ?>
        </div>
        <ul class="grid gap-x-10 gap-y-10 sm:grid-cols-2 lg:col-span-8">
            <?php foreach ($list as $item): ?>
                <li class="flex gap-5">
                    <span class="avatar size-14 text-base" aria-hidden="true"><?= e(initials($item['name'])) ?></span>
                    <div>
                        <h3 class="font-semibold text-heading"><?= e($item['name']) ?></h3>
                        <p class="text-sm font-medium text-link"><?= e($item['role']) ?></p>
                        <?php if (!empty($item['bio'])): ?>
                            <p class="mt-2 text-sm leading-relaxed"><?= e($item['bio']) ?></p>
                        <?php endif; ?>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</section>
