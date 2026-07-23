<?php
if (!defined('DATA_DIR')) { exit; }

$blocks = $page['blocks'] ?? [];
$textBlock = $blocks[0] ?? null;
$imageBlock1 = $blocks[1] ?? null;
$imageBlock2 = $blocks[2] ?? null;
$imageBlock3 = $blocks[3] ?? null;
$imageBlock4 = $blocks[4] ?? null;
$vcTableBlock = $blocks[5] ?? null;
$chancellorTableBlock = $blocks[6] ?? null;
?>
<div class="history-page-wrapper">
    <!-- Biography / Narrative Section -->
    <?php if ($textBlock): ?>
        <div class="history-narrative content-block">
            <?php foreach (($textBlock['paragraphs'] ?? []) as $i => $para): ?>
                <p class="<?= $i === 0 ? 'lead-paragraph' : '' ?>"><?= e($para) ?></p>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <!-- Image section -->
    <div class="history-images-grid" style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 24px; margin-bottom: 24px;">
        <?php if ($imageBlock1): ?>
            <figure class="page-figure" style="margin: 0;">
                <img src="<?= e($imageBlock1['src'] ?? '') ?>" alt="<?= e($imageBlock1['caption'] ?? '') ?>" style="border-radius: 12px; border: 1px solid var(--line); width: 100%; height: 200px; object-fit: cover;">
                <figcaption style="margin-top: 10px; font-size: 13px; color: var(--muted); line-height: 1.4;"><i class="fa fa-camera"></i> <?= e($imageBlock1['caption'] ?? '') ?></figcaption>
            </figure>
        <?php endif; ?>
        <?php if ($imageBlock2): ?>
            <figure class="page-figure" style="margin: 0;">
                <img src="<?= e($imageBlock2['src'] ?? '') ?>" alt="<?= e($imageBlock2['caption'] ?? '') ?>" style="border-radius: 12px; border: 1px solid var(--line); width: 100%; height: 200px; object-fit: cover;">
                <figcaption style="margin-top: 10px; font-size: 13px; color: var(--muted); line-height: 1.4;"><i class="fa fa-camera"></i> <?= e($imageBlock2['caption'] ?? '') ?></figcaption>
            </figure>
        <?php endif; ?>
    </div>

    <div class="history-images-grid" style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 24px; margin-bottom: 40px;">
        <?php if ($imageBlock3): ?>
            <figure class="page-figure" style="margin: 0;">
                <img src="<?= e($imageBlock3['src'] ?? '') ?>" alt="<?= e($imageBlock3['caption'] ?? '') ?>" style="border-radius: 12px; border: 1px solid var(--line); width: 100%; height: 200px; object-fit: cover;">
                <figcaption style="margin-top: 10px; font-size: 13px; color: var(--muted); line-height: 1.4;"><i class="fa fa-camera"></i> <?= e($imageBlock3['caption'] ?? '') ?></figcaption>
            </figure>
        <?php endif; ?>
        <?php if ($imageBlock4): ?>
            <figure class="page-figure" style="margin: 0;">
                <img src="<?= e($imageBlock4['src'] ?? '') ?>" alt="<?= e($imageBlock4['caption'] ?? '') ?>" style="border-radius: 12px; border: 1px solid var(--line); width: 100%; height: 200px; object-fit: cover;">
                <figcaption style="margin-top: 10px; font-size: 13px; color: var(--muted); line-height: 1.4;"><i class="fa fa-camera"></i> <?= e($imageBlock4['caption'] ?? '') ?></figcaption>
            </figure>
        <?php endif; ?>
    </div>

    <!-- Interactive Tabs for Past Officers -->
    <div class="history-tabs-section" style="margin-top: 40px;">
        <div class="catalog-tab-bar" style="margin-bottom: 24px;">
            <button class="catalog-tab-btn active" onclick="switchHistoryTab('vcs', this)">
                <i class="fa fa-graduation-cap"></i> Chancellors & Pro-Chancellors 
            </button>
            <button class="catalog-tab-btn" onclick="switchHistoryTab('chancellors', this)">
                <i class="fa fa-users"></i> Past Vice-Chancellors
            </button>
        </div>

        <div class="catalog-list-content">
            <!-- Vice Chancellors Panel -->
            <div id="vcs-panel" class="catalog-tab-panel active">
                <?php if ($vcTableBlock): ?>
                    <div class="table-wrap">
                        <table>
                            <thead>
                                <tr>
                                    <?php foreach (($vcTableBlock['headers'] ?? []) as $header): ?>
                                        <th><?= e($header) ?></th>
                                    <?php endforeach; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach (($vcTableBlock['rows'] ?? []) as $row): ?>
                                    <tr>
                                        <td><strong><?= e($row[0] ?? '') ?></strong></td>
                                        <td class="officer-name"><i class="fa fa-user-circle" style="color: var(--green); margin-right: 6px;"></i> <?= e($row[1] ?? '') ?></td>
                                        <td><?= e($row[2] ?? '') ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Chancellors Panel -->
            <div id="chancellors-panel" class="catalog-tab-panel">
                <?php if ($chancellorTableBlock): ?>
                    <div class="table-wrap">
                        <table>
                            <thead>
                                <tr>
                                    <?php foreach (($chancellorTableBlock['headers'] ?? []) as $header): ?>
                                        <th><?= e($header) ?></th>
                                    <?php endforeach; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach (($chancellorTableBlock['rows'] ?? []) as $row): ?>
                                    <tr>
                                        <td><strong><?= e($row[0] ?? '') ?></strong></td>
                                        <td class="officer-name"><i class="fa fa-user-circle" style="color: var(--gold); margin-right: 6px;"></i> <?= e($row[1] ?? '') ?></td>
                                        <td><?= e($row[2] ?? '') ?></td>
                                        <td><?= e($row[3] ?? '') ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<script>
function switchHistoryTab(tab, btn) {
    document.querySelectorAll('.history-tabs-section .catalog-tab-btn').forEach(b => b.classList.remove('active'));
    btn.classList.add('active');
    
    document.querySelectorAll('.history-tabs-section .catalog-tab-panel').forEach(p => p.classList.remove('active'));
    if (tab === 'vcs') {
        document.getElementById('vcs-panel').classList.add('active');
    } else {
        document.getElementById('chancellors-panel').classList.add('active');
    }
}
</script>
