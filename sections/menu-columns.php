<?php

declare(strict_types=1);

/** @var array $section @var array $config */
$groups = items($section, 'groups');
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
        <div class="mt-14 grid gap-x-16 gap-y-12 lg:grid-cols-2">
            <?php foreach ($groups as $group): ?>
                <div>
                    <h3 class="border-b border-line pb-3 font-display text-xl font-semibold text-heading"><?= e($group['name']) ?></h3>
                    <ul class="mt-2 divide-y divide-line">
                        <?php foreach (items($group) as $dish): ?>
                            <li class="flex justify-between gap-6 py-4">
                                <div>
                                    <p class="font-semibold text-heading"><?= e($dish['name']) ?></p>
                                    <?php if (!empty($dish['description'])): ?>
                                        <p class="mt-1 text-sm text-subtle"><?= e($dish['description']) ?></p>
                                    <?php endif; ?>
                                </div>
                                <?php if (!empty($dish['price'])): ?>
                                    <p class="shrink-0 font-semibold text-heading tabular-nums"><?= e($dish['price']) ?></p>
                                <?php endif; ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endforeach; ?>
        </div>
        <?php if (!empty($section['note'])): ?>
            <p class="mt-12 text-sm text-subtle"><?= e($section['note']) ?></p>
        <?php endif; ?>
    </div>
</section>
