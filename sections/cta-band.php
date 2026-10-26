<?php

declare(strict_types=1);

/** @var array $section @var array $config */
?>
<section<?= anchor($section) ?> class="<?= surface($section, 'brand') ?>">
    <div class="container-x py-20 text-center sm:py-24">
        <h2 class="display-2 mx-auto max-w-3xl"><?= e($section['title']) ?></h2>
        <?php if (!empty($section['body'])): ?>
            <p class="lead mx-auto mt-5 max-w-xl"><?= e($section['body']) ?></p>
        <?php endif; ?>
        <div class="mt-10 flex flex-wrap justify-center gap-3">
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
</section>
