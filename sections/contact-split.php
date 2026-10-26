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
    <div class="container-x grid gap-12 lg:grid-cols-12 lg:gap-16">
        <div class="lg:col-span-5">
            <?php if (!empty($section['eyebrow'])): ?>
                <p class="eyebrow"><?= e($section['eyebrow']) ?></p>
            <?php endif; ?>
            <h2 class="display-2 mt-5"><?= e($section['title']) ?></h2>
            <?php if (!empty($section['body'])): ?>
                <p class="lead mt-5"><?= e($section['body']) ?></p>
            <?php endif; ?>

            <dl class="mt-10 space-y-6">
                <?php foreach ($details as $detail): ?>
                    <div class="flex gap-4">
                        <span class="icon-badge"><?= icon($detail['icon'], 'size-5') ?></span>
                        <div>
                            <dt class="text-sm text-subtle"><?= e($detail['label']) ?></dt>
                            <dd class="mt-0.5 font-semibold text-heading">
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
                    <div class="flex gap-4">
                        <span class="icon-badge"><?= icon('clock', 'size-5') ?></span>
                        <div>
                            <dt class="text-sm text-subtle"><?= e(ui($config, 'hours')) ?></dt>
                            <?php foreach ($hours as $line): ?>
                                <dd class="mt-0.5 font-semibold text-heading"><?= e($line) ?></dd>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </dl>
        </div>

        <div class="lg:col-span-7">
            <div class="surface card sm:p-10">
                <?php render_contact_form($config, $contact_result); ?>
            </div>
        </div>
    </div>
</section>
