<?php

declare(strict_types=1);

/** @var array $section @var array $config */
$list = items($section);
$columns = match (count($list)) {
    2 => 'md:grid-cols-2 max-w-4xl',
    4 => 'md:grid-cols-2 lg:grid-cols-4',
    default => 'md:grid-cols-3',
};
// With three packages the middle one is highlighted.
$featured = count($list) === 3 ? 1 : -1;
$cta = is_array($config['header_cta'] ?? null) ? $config['header_cta'] : ['label' => ui($config, 'contact'), 'href' => '#contact'];
?>
<section<?= anchor($section) ?> class="<?= surface($section) ?> section">
    <div class="container-x">
        <div class="mx-auto max-w-2xl text-center">
            <?php if (!empty($section['eyebrow'])): ?>
                <p class="eyebrow"><?= e($section['eyebrow']) ?></p>
            <?php endif; ?>
            <h2 class="display-2 mt-5"><?= e($section['title']) ?></h2>
            <?php if (!empty($section['body'])): ?>
                <p class="lead mt-5"><?= e($section['body']) ?></p>
            <?php endif; ?>
        </div>
        <ul class="mx-auto mt-14 grid items-stretch gap-6 <?= $columns ?>">
            <?php foreach ($list as $index => $item): ?>
                <li class="card flex flex-col <?= $index === $featured ? 'ring-2 ring-brand-600' : '' ?>">
                    <h3 class="title-3"><?= e($item['name']) ?></h3>
                    <p class="mt-4 flex flex-wrap items-baseline gap-x-2">
                        <span class="font-display text-4xl font-semibold tracking-tight text-heading"><?= e($item['price']) ?></span>
                        <?php if (!empty($item['period'])): ?>
                            <span class="text-sm text-subtle"><?= e($item['period']) ?></span>
                        <?php endif; ?>
                    </p>
                    <p class="mt-4 leading-relaxed"><?= e($item['description']) ?></p>
                    <ul class="mt-6 flex-1 space-y-3 border-t border-line pt-6 text-sm">
                        <?php foreach (items($item, 'features') as $feature): ?>
                            <li class="flex gap-3">
                                <span class="text-link"><?= icon('check', 'size-5') ?></span>
                                <span class="text-heading"><?= e($feature) ?></span>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                    <a class="btn <?= $index === $featured ? 'btn-primary' : 'btn-ghost' ?> mt-8 w-full" href="<?= e(page_href((string) $cta['href'], 'home')) ?>"><?= e($cta['label']) ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
        <?php if (!empty($section['note'])): ?>
            <p class="mt-8 text-center text-sm text-subtle"><?= e($section['note']) ?></p>
        <?php endif; ?>
    </div>
</section>
