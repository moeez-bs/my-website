<?php

declare(strict_types=1);

/** @var array $section @var array $config */
$groups = items($section, 'groups');
?>
<section<?= anchor($section) ?> class="<?= surface($section) ?> section">
    <div class="container-x max-w-3xl">
        <div class="text-center">
            <?php if (!empty($section['eyebrow'])): ?>
                <p class="eyebrow"><?= e($section['eyebrow']) ?></p>
            <?php endif; ?>
            <h2 class="display-2 mt-5"><?= e($section['title']) ?></h2>
            <?php if (!empty($section['body'])): ?>
                <p class="lead mx-auto mt-5 max-w-xl"><?= e($section['body']) ?></p>
            <?php endif; ?>
        </div>
        <div class="mt-14 space-y-14">
            <?php foreach ($groups as $group): ?>
                <div>
                    <h3 class="flex items-center gap-4 font-display text-2xl font-semibold text-heading">
                        <span><?= e($group['name']) ?></span>
                        <span class="h-px flex-1 bg-line" aria-hidden="true"></span>
                    </h3>
                    <ul class="mt-6 space-y-6">
                        <?php foreach (items($group) as $dish): ?>
                            <li>
                                <div class="flex items-baseline gap-3">
                                    <span class="font-semibold text-heading"><?= e($dish['name']) ?></span>
                                    <?php if (!empty($dish['price'])): ?>
                                        <span class="relative -top-1 flex-1 border-b-2 border-dotted border-line" aria-hidden="true"></span>
                                        <span class="font-semibold text-heading tabular-nums"><?= e($dish['price']) ?></span>
                                    <?php endif; ?>
                                </div>
                                <?php if (!empty($dish['description'])): ?>
                                    <p class="mt-1 text-sm text-subtle"><?= e($dish['description']) ?></p>
                                <?php endif; ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endforeach; ?>
        </div>
        <?php if (!empty($section['note'])): ?>
            <p class="mt-12 text-center text-sm text-subtle"><?= e($section['note']) ?></p>
        <?php endif; ?>
    </div>
</section>
