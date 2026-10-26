<?php

declare(strict_types=1);

/** @var array $section @var array $config */
?>
<section<?= anchor($section) ?> class="<?= surface($section, 'brand') ?>">
    <div class="container-x grid items-center gap-10 py-16 sm:py-20 lg:grid-cols-2 lg:gap-16">
        <div>
            <h2 class="display-2"><?= e($section['title']) ?></h2>
            <?php if (!empty($section['body'])): ?>
                <p class="lead mt-5 max-w-xl"><?= e($section['body']) ?></p>
            <?php endif; ?>
            <div class="mt-10 flex flex-wrap gap-3">
                <a class="btn btn-primary" href="<?= e($section['button_href']) ?>">
                    <?= e($section['button_label']) ?>
                    <?= icon('arrow-right', 'size-4') ?>
                </a>
                <?php if (!empty($config['phone'])): ?>
                    <a class="btn btn-ghost" href="<?= e(tel_href($config['phone'])) ?>">
                        <?= icon('phone', 'size-4') ?>
                        <?= e($config['phone']) ?>
                    </a>
                <?php endif; ?>
            </div>
        </div>
        <div class="media aspect-4/3">
            <img src="<?= e($section['image'] ?? '') ?>" alt="<?= e($section['image_alt'] ?? '') ?>" loading="lazy">
        </div>
    </div>
</section>
