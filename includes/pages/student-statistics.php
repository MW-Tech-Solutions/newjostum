<?php
if (!defined('DATA_DIR')) { exit; }

$blocks = $page['blocks'] ?? [];
$cardsBlock = $blocks[0] ?? null;
$charts = array_slice($blocks, 1);
?>
<div class="statistics-students-wrapper">
    <!-- Key Student Metric Cards -->
    <?php if ($cardsBlock): ?>
        <div class="stats-overview-grid" style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; margin-bottom: 40px;">
            <?php foreach (($cardsBlock['items'] ?? []) as $i => $item): 
                $label = $item['label'] ?? '';
                $value = $item['value'] ?? '';
                $text = $item['text'] ?? '';
                
                $icon = 'fa-users';
                if (stripos($label, 'Undergraduate') !== false) {
                    $icon = 'fa-user';
                } elseif (stripos($label, 'Postgraduate') !== false) {
                    $icon = 'fa-graduation-cap';
                }
            ?>
                <div class="metric-summary-card" style="background: #ffffff; border: 1px solid var(--line); border-radius: 16px; padding: 24px; box-shadow: var(--shadow-soft); display: flex; flex-direction: column; align-items: center; text-align: center; transition: all 0.25s ease;">
                    <div class="metric-icon" style="width: 48px; height: 48px; border-radius: 50%; display: grid; place-items: center; font-size: 20px; background: var(--soft); color: var(--green); margin-bottom: 16px;">
                        <i class="fa <?= $icon ?>"></i>
                    </div>
                    <strong style="font-size: 32px; font-weight: 850; color: var(--gold); line-height: 1.1; margin-bottom: 4px;" class="counter" data-count="<?= preg_replace('/[^0-9]/', '', $value) ?>"><?= e($value) ?></strong>
                    <span style="font-size: 11px; font-weight: 800; color: var(--green-dark); text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 8px;"><?= e($label) ?></span>
                    <?php if ($text): ?>
                        <p style="font-size: 12.5px; color: var(--muted); line-height: 1.4; margin: 0;"><?= e($text) ?></p>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <!-- Interactive Tabs for Charts -->
    <div class="int-tab-bar" style="margin-bottom: 30px; display: flex; flex-wrap: wrap; gap: 8px;">
        <?php foreach ($charts as $i => $block): 
            $chart = $block['chart'] ?? null;
            if (!$chart) continue;
        ?>
            <button class="int-tab-btn <?= $i === 0 ? 'active' : '' ?>" onclick="switchStudentStatsTab('chart-<?= $i ?>', this)" style="padding: 10px 18px; font-size: 13px; font-weight: 700;">
                <i class="fa fa-bar-chart" style="margin-right: 6px;"></i> <?= e($chart['title'] ?? '') ?>
            </button>
        <?php endforeach; ?>
    </div>

    <!-- Display Charts Stacked Panels -->
    <div class="charts-stack">
        <?php foreach ($charts as $i => $block): 
            $chart = $block['chart'] ?? null;
            if (!$chart) continue;
        ?>
            <div id="chart-<?= $i ?>" class="int-tab-panel <?= $i === 0 ? 'active' : '' ?>">
                <div class="accreditation-chart-card" style="background: #ffffff; border: 1px solid var(--line); border-radius: 20px; padding: 24px; box-shadow: var(--shadow-soft);">
                    <h4 style="font-size: 16px; font-weight: 850; color: var(--green-deep); margin: 0 0 20px; border-left: 4px solid var(--gold); padding-left: 10px;"><?= e($chart['title'] ?? '') ?></h4>
                    <div class="chart-panel" style="position: relative; height: 320px;">
                        <canvas class="portal-chart" height="320" data-chart="<?= e(json_encode($chart, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE)) ?>"></canvas>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<script>
function switchStudentStatsTab(panelId, btn) {
    document.querySelectorAll('.statistics-students-wrapper .int-tab-btn').forEach(b => b.classList.remove('active'));
    btn.classList.add('active');
    
    document.querySelectorAll('.statistics-students-wrapper .int-tab-panel').forEach(p => p.classList.remove('active'));
    document.getElementById(panelId).classList.add('active');
    
    // Trigger window resize event to force canvas redraw inside newly visible display:block container
    window.dispatchEvent(new Event('resize'));
    
    // Smooth scroll offset by sticky header height
    const container = document.querySelector('.statistics-students-wrapper');
    const headerHeight = document.querySelector('.site-header')?.offsetHeight || 90;
    const targetPos = container.getBoundingClientRect().top + window.pageYOffset - headerHeight - 16;
    window.scrollTo({ top: targetPos, behavior: 'smooth' });
}
</script>
