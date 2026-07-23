<?php
require __DIR__ . '/_admin.php';
$site = load_site_for_admin();
$pageCount = count($site['pages'] ?? []);
$imageCount = count($site['gallery'] ?? []);
$chartCount = count($site['charts'] ?? []);
$noticeCount = count($site['notices'] ?? []);
$statsCount = count($site['stats'] ?? []);
admin_header('Dashboard');
?>

<!-- Metrics Overview -->
<div class="admin-metrics-grid">
    <div class="admin-metric-card metric-pages">
        <div class="metric-icon-wrap"><i class="fa fa-file-text-o"></i></div>
        <div class="metric-body">
            <span class="metric-label">Total Pages</span>
            <strong class="metric-value"><?= $pageCount ?></strong>
            <span class="metric-sub"><i class="fa fa-database"></i> Dynamic content from site.json</span>
        </div>
        <div class="metric-accent"></div>
    </div>
    <div class="admin-metric-card metric-gallery">
        <div class="metric-icon-wrap"><i class="fa fa-picture-o"></i></div>
        <div class="metric-body">
            <span class="metric-label">Gallery Images</span>
            <strong class="metric-value"><?= $imageCount ?></strong>
            <span class="metric-sub"><i class="fa fa-cloud-upload"></i> Uploaded & embedded media</span>
        </div>
        <div class="metric-accent"></div>
    </div>
    <div class="admin-metric-card metric-charts">
        <div class="metric-icon-wrap"><i class="fa fa-bar-chart"></i></div>
        <div class="metric-body">
            <span class="metric-label">Charts</span>
            <strong class="metric-value"><?= $chartCount ?></strong>
            <span class="metric-sub"><i class="fa fa-line-chart"></i> Statistical visualizations</span>
        </div>
        <div class="metric-accent"></div>
    </div>
    <div class="admin-metric-card metric-notices">
        <div class="metric-icon-wrap"><i class="fa fa-bullhorn"></i></div>
        <div class="metric-body">
            <span class="metric-label">Notices</span>
            <strong class="metric-value"><?= $noticeCount ?></strong>
            <span class="metric-sub"><i class="fa fa-calendar"></i> Public announcements</span>
        </div>
        <div class="metric-accent"></div>
    </div>
</div>

<!-- Quick Actions -->
<div class="admin-section-header">
    <h3><i class="fa fa-bolt"></i> Quick Actions</h3>
    <p>Jump directly to common tasks</p>
</div>
<div class="admin-quick-actions">
    <a href="pages.php?action=new" class="quick-action-card">
        <div class="qa-icon"><i class="fa fa-plus-circle"></i></div>
        <strong>New Page</strong>
        <span>Create a new content page</span>
    </a>
    <a href="notices.php" class="quick-action-card">
        <div class="qa-icon"><i class="fa fa-pencil"></i></div>
        <strong>Post Notice</strong>
        <span>Publish an announcement</span>
    </a>
    <a href="gallery.php" class="quick-action-card">
        <div class="qa-icon"><i class="fa fa-cloud-upload"></i></div>
        <strong>Upload Image</strong>
        <span>Add to photo gallery</span>
    </a>
    <a href="charts.php" class="quick-action-card">
        <div class="qa-icon"><i class="fa fa-area-chart"></i></div>
        <strong>Edit Charts</strong>
        <span>Update chart datasets</span>
    </a>
    <a href="settings.php" class="quick-action-card">
        <div class="qa-icon"><i class="fa fa-cog"></i></div>
        <strong>Settings</strong>
        <span>Configure site details</span>
    </a>
    <a href="../index.php" class="quick-action-card">
        <div class="qa-icon"><i class="fa fa-external-link"></i></div>
        <strong>View Site</strong>
        <span>Open the public portal</span>
    </a>
</div>

<!-- System Information -->
<div class="admin-section-header" style="margin-top: 36px;">
    <h3><i class="fa fa-server"></i> System Health</h3>
    <p>Server status and environment</p>
</div>
<div class="admin-system-grid">
    <div class="system-item">
        <div class="sys-icon"><i class="fa fa-check-circle"></i></div>
        <div>
            <strong>PHP Version</strong>
            <span><?= phpversion() ?></span>
        </div>
    </div>
    <div class="system-item">
        <div class="sys-icon"><i class="fa fa-database"></i></div>
        <div>
            <strong>Data Store</strong>
            <span>site.json (<?= number_format(filesize(DATA_DIR . '/site.json') / 1024, 1) ?> KB)</span>
        </div>
    </div>
    <div class="system-item">
        <div class="sys-icon"><i class="fa fa-hdd-o"></i></div>
        <div>
            <strong>Upload Directory</strong>
            <span><?= is_writable(__DIR__ . '/../images/uploads') ? 'Writable ✓' : 'Not writable ✗' ?></span>
        </div>
    </div>
    <div class="system-item">
        <div class="sys-icon"><i class="fa fa-clock-o"></i></div>
        <div>
            <strong>Server Time</strong>
            <span><?= date('Y-m-d H:i:s T') ?></span>
        </div>
    </div>
    <div class="system-item">
        <div class="sys-icon"><i class="fa fa-globe"></i></div>
        <div>
            <strong>Server</strong>
            <span><?= e($_SERVER['SERVER_SOFTWARE'] ?? 'Unknown') ?></span>
        </div>
    </div>
    <div class="system-item">
        <div class="sys-icon"><i class="fa fa-file-code-o"></i></div>
        <div>
            <strong>Statistics Entries</strong>
            <span><?= $statsCount ?> tracked metrics</span>
        </div>
    </div>
</div>

<!-- Content Overview Table -->
<div class="admin-section-header" style="margin-top: 36px;">
    <h3><i class="fa fa-list-alt"></i> Recent Pages</h3>
    <p>Last 8 pages from the content database</p>
</div>
<div class="table-wrap">
    <table>
        <thead><tr><th>Title</th><th>Group</th><th>Slug</th><th>Actions</th></tr></thead>
        <tbody>
        <?php foreach (array_slice($site['pages'] ?? [], 0, 8) as $page): ?>
            <tr>
                <td><strong><?= e($page['title'] ?? '') ?></strong></td>
                <td><span class="table-badge"><?= e($page['group'] ?? '') ?></span></td>
                <td><code><?= e($page['slug'] ?? '') ?></code></td>
                <td>
                    <a href="pages.php?action=edit&slug=<?= e($page['slug'] ?? '') ?>" class="table-action"><i class="fa fa-pencil"></i></a>
                    <a href="../page.php?slug=<?= e($page['slug'] ?? '') ?>" class="table-action" target="_blank"><i class="fa fa-external-link"></i></a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php admin_footer(); ?>
