<?php

declare(strict_types=1);

/** @var array $section @var array $config */
$hours = items($section, 'hours');
$directions = items($section, 'directions');
$address = (string) ($config['address'] ?? '');
?>
<section<?= anchor($section) ?> class="<?= surface($section, 'alt') ?> section">
    <div class="container-x grid gap-10 lg:grid-cols-12 lg:gap-16">
        <div class="relative isolate min-h-80 overflow-hidden rounded-[var(--t-media-radius,1.25rem)] bg-tint lg:col-span-7">
            <svg class="absolute inset-0 -z-10 size-full text-tint-strong" viewBox="0 0 600 400" preserveAspectRatio="xMidYMid slice" fill="none" stroke="currentColor" aria-hidden="true">
                <path d="M-20 90 C 120 70, 220 130, 360 100 S 560 40, 640 70" stroke-width="18"/>
                <path d="M-20 300 C 140 320, 260 250, 400 290 S 560 350, 640 320" stroke-width="12"/>
                <path d="M180 -20 C 170 120, 230 260, 200 420" stroke-width="14"/>
                <path d="M430 -20 C 450 110, 390 240, 450 420" stroke-width="10"/>
                <path d="M-20 200 H 640" stroke-width="4"/>
                <path d="M60 -20 V 420 M 320 -20 V 420 M 540 -20 V 420" stroke-width="3"/>
            </svg>
            <div class="absolute top-1/4 left-1/2 flex -translate-x-1/2 -translate-y-1/2 flex-col items-center text-brand-700 sm:top-1/3" aria-hidden="true">
                <span class="flex size-14 items-center justify-center rounded-full bg-brand-600 text-white shadow-lg"><?= icon('map-pin', 'size-7') ?></span>
            </div>
            <div class="surface card absolute inset-x-4 bottom-4 sm:inset-x-auto sm:left-6 sm:bottom-6 sm:max-w-sm">
                <p class="font-semibold text-heading"><?= e($config['name']) ?></p>
                <?php if ($address !== ''): ?>
                    <p class="mt-1 text-sm"><?= e($address) ?></p>
                    <a class="btn btn-primary mt-5" href="<?= e(maps_href($address)) ?>" target="_blank" rel="noopener">
                        <?= icon('map', 'size-4') ?>
                        <?= e(ui($config, 'directions')) ?>
                    </a>
                <?php elseif (!empty($config['phone'])): ?>
                    <a class="link-arrow mt-3" href="<?= e(tel_href((string) $config['phone'])) ?>"><?= e($config['phone']) ?></a>
                <?php endif; ?>
            </div>
        </div>
        <div class="lg:col-span-5">
            <?php if (!empty($section['eyebrow'])): ?>
                <p class="eyebrow"><?= e($section['eyebrow']) ?></p>
            <?php endif; ?>
            <h2 class="display-2 mt-5"><?= e($section['title']) ?></h2>
            <?php if (!empty($section['body'])): ?>
                <p class="lead mt-5"><?= e($section['body']) ?></p>
            <?php endif; ?>
            <?php if ($directions !== []): ?>
                <ul class="mt-8 space-y-3">
                    <?php foreach ($directions as $tip): ?>
                        <li class="flex gap-3">
                            <span class="mt-0.5 text-link"><?= icon('circle-check', 'size-5') ?></span>
                            <span><?= e($tip) ?></span>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
            <?php if ($hours !== []): ?>
                <h3 class="mt-10 flex items-center gap-2 text-sm font-semibold text-heading">
                    <span class="text-link"><?= icon('clock', 'size-4') ?></span>
                    <?= e(ui($config, 'hours')) ?>
                </h3>
                <dl class="mt-4 divide-y divide-line border-y border-line text-sm">
                    <?php foreach ($hours as $line): ?>
                        <?php // "Monday to Friday: 8am to 6pm" becomes two columns; "Mon–Fri 8:30am" stays whole. ?>
                        <?php [$days, $times] = array_pad(explode(': ', (string) $line, 2), 2, ''); ?>
                        <div class="flex justify-between gap-6 py-3">
                            <?php if ($times !== ''): ?>
                                <dt class="font-medium text-heading"><?= e($days) ?></dt>
                                <dd class="text-right"><?= e($times) ?></dd>
                            <?php else: ?>
                                <dt class="font-medium text-heading"><?= e($line) ?></dt>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </dl>
            <?php endif; ?>
        </div>
    </div>
</section>
