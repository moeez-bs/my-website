<?php

declare(strict_types=1);

/**
 * @var array $section
 * @var array $config
 * @var array{status: string, error: ?string, old?: array<string, string>} $contact_result
 */
$hours = items($section, 'hours');
$details = contact_details($config);
?>
<section<?= anchor($section) ?> class="<?= surface($section, 'alt') ?> section">
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

        <?php if ($details !== [] || $hours !== []): ?>
            <dl class="mx-auto mt-12 flex max-w-4xl flex-wrap justify-center gap-x-10 gap-y-6">
                <?php foreach ($details as $detail): ?>
                    <div class="flex items-center gap-3">
                        <span class="icon-badge size-11"><?= icon($detail['icon'], 'size-5') ?></span>
                        <div>
                            <dt class="text-sm text-subtle"><?= e($detail['label']) ?></dt>
                            <dd class="font-semibold text-heading">
                                <?php if ($detail['href'] !== null): ?>
                                    <a class="hover:text-link" href="<?= e($detail['href']) ?>"><?= e($detail['value']) ?></a>
                                <?php else: ?>
                                    <?= e($detail['value']) ?>
                                <?php endif; ?>
                            </dd>
                        </div>
                    </div>
                <?php endforeach; ?>
                <?php if ($hours !== []): ?>
                    <div class="flex items-center gap-3">
                        <span class="icon-badge size-11"><?= icon('clock', 'size-5') ?></span>
                        <div>
                            <dt class="text-sm text-subtle"><?= e(ui($config, 'hours')) ?></dt>
                            <dd class="font-semibold text-heading"><?= e(implode(' · ', $hours)) ?></dd>
                        </div>
                    </div>
                <?php endif; ?>
            </dl>
        <?php endif; ?>

        <div class="surface card mx-auto mt-12 max-w-2xl sm:p-10">
            <?php render_contact_form($config, $contact_result); ?>
        </div>
    </div>
</section>
