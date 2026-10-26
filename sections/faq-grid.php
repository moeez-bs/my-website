<?php

declare(strict_types=1);

/** @var array $section @var array $config */
$list = items($section);
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
        <dl class="mx-auto mt-14 grid max-w-5xl gap-x-12 gap-y-10 md:grid-cols-2">
            <?php foreach ($list as $item): ?>
                <div>
                    <dt class="title-3"><?= e($item['question']) ?></dt>
                    <dd class="mt-3 leading-relaxed"><?= e($item['answer']) ?></dd>
                </div>
            <?php endforeach; ?>
        </dl>
    </div>
</section>
