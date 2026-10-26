<?php

declare(strict_types=1);

/** @var array $section @var array $config */
$days = items($section, 'days');
// Up to five days fit one row; six or seven read better as two rows.
$columns = match (count($days)) {
    3, 6 => 'lg:grid-cols-3',
    5 => 'lg:grid-cols-5',
    default => 'lg:grid-cols-4',
};
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
        <ol class="mt-12 grid gap-4 sm:grid-cols-2 <?= $columns ?>">
            <?php foreach ($days as $day): ?>
                <li class="card p-5">
                    <h3 class="border-b border-line pb-3 font-semibold text-heading"><?= e($day['day']) ?></h3>
                    <ul class="mt-4 space-y-4">
                        <?php foreach (items($day, 'sessions') as $session): ?>
                            <li>
                                <p class="text-sm font-semibold text-link tabular-nums"><?= e($session['time']) ?></p>
                                <p class="font-medium leading-snug text-heading"><?= e($session['name']) ?></p>
                                <?php if (!empty($session['detail'])): ?>
                                    <p class="text-sm text-subtle"><?= e($session['detail']) ?></p>
                                <?php endif; ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </li>
            <?php endforeach; ?>
        </ol>
    </div>
</section>
