<?php

declare(strict_types=1);

/** @var array $section @var array $config */
$list = items($section);
$featured = $list[0] ?? null;
if (!is_array($featured)) {
    return;
}
?>
<section<?= anchor($section) ?> class="<?= surface($section, 'brand') ?> section">
    <figure class="container-x max-w-4xl text-center">
        <div class="stars justify-center" aria-label="5 out of 5">
            <?php for ($star = 0; $star < 5; $star++): ?>
                <?= icon('star', 'size-5 fill-current') ?>
            <?php endfor; ?>
        </div>
        <blockquote class="mt-8 font-display text-2xl leading-snug text-heading sm:text-3xl lg:text-4xl">
            <p>“<?= e($featured['quote']) ?>”</p>
        </blockquote>
        <figcaption class="mt-10 flex items-center justify-center gap-3">
            <span class="avatar" aria-hidden="true"><?= e(initials($featured['name'])) ?></span>
            <span class="text-left">
                <span class="block font-semibold text-heading"><?= e($featured['name']) ?></span>
                <?php if (!empty($featured['role'])): ?>
                    <span class="block text-sm text-subtle"><?= e($featured['role']) ?></span>
                <?php endif; ?>
            </span>
        </figcaption>
    </figure>
</section>
