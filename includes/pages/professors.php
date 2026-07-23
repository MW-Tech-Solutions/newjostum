<?php
if (!defined('DATA_DIR')) { exit; }

$blocks = $page['blocks'] ?? [];
$chartBlock = $blocks[0] ?? null;
$textBlock = $blocks[1] ?? null;
?>
<div class="statistics-professors-wrapper">
    <!-- Biography / Narrative Section -->
    <?php if ($textBlock): ?>
        <div class="professor-narrative content-block" style="background: #ffffff; border: 1px solid var(--line); border-radius: 18px; padding: 30px; box-shadow: var(--shadow-soft); margin-bottom: 40px; display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px;">
            <?php foreach (($textBlock['paragraphs'] ?? []) as $para): 
                $parts = explode(': ', $para, 2);
                $label = $parts[0] ?? '';
                $ratio = $parts[1] ?? '';
            ?>
                <div class="ratio-card" style="background: var(--soft); padding: 20px; border-radius: 12px; border: 1px solid var(--line); text-align: center;">
                    <span style="display: block; font-size: 11px; font-weight: 800; text-transform: uppercase; color: var(--gold); margin-bottom: 8px;"><?= e($label) ?></span>
                    <strong style="font-size: 32px; font-weight: 850; color: var(--green-deep);"><?= e($ratio) ?></strong>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <?php if ($chartBlock && isset($chartBlock['chart'])): ?>
        <div class="accreditation-chart-card" style="background: #ffffff; border: 1px solid var(--line); border-radius: 20px; padding: 24px; box-shadow: var(--shadow-soft);">
            <h4 style="font-size: 16px; font-weight: 850; color: var(--green-deep); margin: 0 0 20px; border-left: 4px solid var(--gold); padding-left: 10px;"><?= e($chartBlock['chart']['title'] ?? '') ?></h4>
            <div class="chart-panel" style="position: relative; height: 320px;">
                <canvas class="portal-chart" height="320" data-chart="<?= e(json_encode($chartBlock['chart'], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE)) ?>"></canvas>
            </div>
        </div>
    <?php endif; ?>
</div>
