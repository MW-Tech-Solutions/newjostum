<?php
if (!defined('DATA_DIR')) {
    exit;
}

$accPage = page_by_slug('accreditation');
$chartBlock = null;
$tableBlock = null;
foreach (($accPage['blocks'] ?? []) as $block) {
    if (($block['type'] ?? '') === 'chart') {
        $chartBlock = $block;
    } elseif (($block['type'] ?? '') === 'table') {
        $tableBlock = $block;
    }
}
$rows = $tableBlock['rows'] ?? [];
?>

<div class="accreditation-hub-container">
    <div class="accreditation-overview-grid">
        <!-- Visual canvas doughnut chart -->
        <?php if ($chartBlock): ?>
            <div class="accreditation-chart-card">
                <h4>Accreditation Distribution</h4>
                <div class="chart-panel">
                    <canvas class="portal-chart" height="290" data-chart="<?= e(json_encode($chartBlock['chart'] ?? [], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE)) ?>"></canvas>
                </div>
            </div>
        <?php endif; ?>

        <!-- Key Metrics Cards -->
        <div class="accreditation-summary-cards">
            <div class="summary-metric-card full">
                <div class="metric-icon"><i class="fa fa-check-circle"></i></div>
                <div class="metric-info">
                    <strong>47</strong>
                    <span>Full NUC Accreditation</span>
                </div>
            </div>
            <div class="summary-metric-card interim">
                <div class="metric-icon"><i class="fa fa-exclamation-circle"></i></div>
                <div class="metric-info">
                    <strong>5</strong>
                    <span>Interim Accreditation</span>
                </div>
            </div>
            <div class="summary-metric-card awaiting">
                <div class="metric-icon"><i class="fa fa-clock-o"></i></div>
                <div class="metric-info">
                    <strong>24</strong>
                    <span>Awaiting (Resource Verified)</span>
                </div>
            </div>
            <div class="summary-metric-card failed">
                <div class="metric-icon"><i class="fa fa-times-circle"></i></div>
                <div class="metric-info">
                    <strong>0</strong>
                    <span>Failed accreditation</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Interactive Directory Table -->
    <div class="accreditation-directory">
        <div class="directory-toolbar">
            <div class="search-box-wrapper">
                <i class="fa fa-search search-icon"></i>
                <input type="text" id="accreditation-search" placeholder="Search departments, colleges or status..." onkeyup="filterAccreditation()">
            </div>
            <div class="filter-buttons">
                <button class="filter-btn active" data-filter="all" onclick="setAccreditationFilter('all', this)">All (76)</button>
                <button class="filter-btn" data-filter="full" onclick="setAccreditationFilter('full', this)">Full (47)</button>
                <button class="filter-btn" data-filter="interim" onclick="setAccreditationFilter('interim', this)">Interim (5)</button>
                <button class="filter-btn" data-filter="awaiting" onclick="setAccreditationFilter('awaiting', this)">Awaiting (24)</button>
            </div>
        </div>

        <div class="table-wrap">
            <table class="accreditation-table" id="accreditation-table-el">
                <thead>
                    <tr>
                        <th style="width: 60px;">S/No.</th>
                        <th>College</th>
                        <th>Department / Programme</th>
                        <th>NUC Status</th>
                        <th>Professional Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($rows as $row): 
                        $sno = $row[0] ?? '';
                        $college = $row[1] ?? '';
                        $department = $row[2] ?? '';
                        $nucStatus = $row[3] ?? '';
                        $profStatus = $row[4] ?? '';
                        
                        // Parse status class
                        $statusClass = 'status-default';
                        $statusText = $nucStatus;
                        $statusIcon = 'fa-info-circle';
                        
                        if (stripos($nucStatus, 'Full') !== false) {
                            $statusClass = 'status-full';
                            $statusIcon = 'fa-check-circle';
                            $statusText = 'Full Accreditation';
                        } elseif (stripos($nucStatus, 'Interim') !== false) {
                            $statusClass = 'status-interim';
                            $statusIcon = 'fa-warning';
                            $statusText = 'Interim';
                        } elseif (stripos($nucStatus, 'Resource verified') !== false) {
                            $statusClass = 'status-awaiting';
                            $statusIcon = 'fa-clock-o';
                            $statusText = 'Awaiting';
                        }
                    ?>
                        <tr class="accreditation-row" data-nuc-filter="<?= e(strtolower($statusText)) ?>" data-search-content="<?= e(strtolower($college . ' ' . $department . ' ' . $nucStatus . ' ' . $profStatus)) ?>">
                            <td><?= e($sno) ?></td>
                            <td class="col-name"><?= e($college) ?></td>
                            <td class="dept-name"><strong><?= e($department) ?></strong></td>
                            <td>
                                <span class="badge <?= $statusClass ?>">
                                    <i class="fa <?= $statusIcon ?>"></i> <?= e($statusText) ?>
                                </span>
                            </td>
                            <td>
                                <?php if (!empty($profStatus)): ?>
                                    <?php 
                                    $profClass = (stripos($profStatus, 'Full') !== false) ? 'prof-full' : 'prof-interim';
                                    $profIcon = (stripos($profStatus, 'Full') !== false) ? 'fa-check' : 'fa-exclamation-triangle';
                                    ?>
                                    <span class="badge-prof <?= $profClass ?>">
                                        <i class="fa <?= $profIcon ?>"></i> <?= e($profStatus) ?>
                                    </span>
                                <?php else: ?>
                                    <span class="prof-none">-</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
let currentFilter = 'all';

function filterAccreditation() {
    const query = document.getElementById('accreditation-search').value.toLowerCase();
    const rows = document.querySelectorAll('.accreditation-row');
    
    rows.forEach(row => {
        const searchContent = row.dataset.searchContent;
        const filterVal = row.dataset.nucFilter;
        
        let matchesSearch = searchContent.includes(query);
        let matchesFilter = true;
        
        if (currentFilter === 'full') {
            matchesFilter = filterVal.includes('full');
        } else if (currentFilter === 'interim') {
            matchesFilter = filterVal.includes('interim');
        } else if (currentFilter === 'awaiting') {
            matchesFilter = filterVal.includes('awaiting');
        }
        
        if (matchesSearch && matchesFilter) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
}

function setAccreditationFilter(filter, btn) {
    document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
    btn.classList.add('active');
    currentFilter = filter;
    filterAccreditation();
}
</script>
