<?php

declare(strict_types=1);

/** @var array $section @var array $config */
$list = items($section);
$columns = count($list) === 2 ? 'md:grid-cols-2' : 'md:grid-cols-2 lg:grid-cols-3';
?>
<section<?= anchor($section) ?> class="<?= surface($section) ?> section">
    <div class="container-x">
        <div class="max-w-2xl">
            <?php if (!empty($section['eyebrow'])): ?>
                <p class="eyebrow"><?= e($section['eyebrow']) ?></p>
            <?php endif; ?>
            <h2 class="display-2 mt-5"><?= e($section['title']) ?></h2>
        </div>
        <ul class="mt-14 grid gap-6 <?= $columns ?>">
            <?php foreach ($list as $item): ?>
                <li>
                    <figure class="card flex h-full flex-col">
                        <div class="stars" aria-label="5 out of 5">
                            <?php for ($star = 0; $star < 5; $star++): ?>
                                <?= icon('star', 'size-4 fill-current') ?>
                            <?php endfor; ?>
                        </div>
                        <blockquote class="mt-5 flex-1 text-lg leading-relaxed text-heading">
                            <p>“<?= e($item['quote']) ?>”</p>
                        </blockquote>
                        <figcaption class="mt-8 flex items-center gap-3 border-t border-line pt-6">
                            <span class="avatar" aria-hidden="true"><?= e(initials($item['name'])) ?></span>
                            <span>
                                <span class="block font-semibold text-heading"><?= e($item['name']) ?></span>
                                <?php if (!empty($item['role'])): ?>
                                    <span class="block text-sm text-subtle"><?= e($item['role']) ?></span>
                                <?php endif; ?>
                            </span>
                        </figcaption>
                    </figure>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</section>
