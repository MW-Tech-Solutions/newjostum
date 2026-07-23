<?php
require __DIR__ . '/_admin.php';
$site = load_site_for_admin();
$edit = isset($_GET['edit']) ? (int) $_GET['edit'] : -1;
if (isset($_GET['delete'])) {
    $idx = (int) $_GET['delete'];
    array_splice($site['notices'], $idx, 1);
    save_site_for_admin($site);
    admin_flash('Notice deleted.');
    header('Location: notices.php');
    exit;
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idx = $_POST['idx'] === '' ? -1 : (int) $_POST['idx'];
    $notice = [
        'date' => trim($_POST['date'] ?? date('Y-m-d')),
        'title' => trim($_POST['title'] ?? ''),
        'body' => trim($_POST['body'] ?? ''),
    ];
    // Optional image attachment
    $uploaded = handle_upload('notice_image');
    if ($uploaded) {
        $notice['image'] = $uploaded;
    } elseif ($idx >= 0 && isset($site['notices'][$idx]['image'])) {
        $notice['image'] = $site['notices'][$idx]['image'];
    }
    if ($idx >= 0 && isset($site['notices'][$idx])) {
        $site['notices'][$idx] = $notice;
    } else {
        array_unshift($site['notices'], $notice);
    }
    save_site_for_admin($site);
    admin_flash('Notice saved.');
    header('Location: notices.php');
    exit;
}
$current = $edit >= 0 && isset($site['notices'][$edit]) ? $site['notices'][$edit] : ['date' => date('Y-m-d'), 'title' => '', 'body' => ''];
admin_header('Notices');
?>

<div class="admin-section-header">
    <h3><i class="fa fa-<?= $edit >= 0 ? 'pencil' : 'plus-circle' ?>"></i> <?= $edit >= 0 ? 'Edit Notice' : 'Create Notice' ?></h3>
    <?php if ($edit >= 0): ?>
        <a href="notices.php" class="admin-btn outline"><i class="fa fa-plus"></i> New Notice</a>
    <?php endif; ?>
</div>

<form method="post" class="admin-form" enctype="multipart/form-data" style="margin-bottom: 40px;">
    <input type="hidden" name="idx" value="<?= $edit >= 0 ? $edit : '' ?>">
    <div class="form-grid-2">
        <div class="form-field">
            <label for="f-date"><i class="fa fa-calendar"></i> Date</label>
            <input type="date" id="f-date" name="date" value="<?= e($current['date'] ?? date('Y-m-d')) ?>">
        </div>
        <div class="form-field">
            <label for="f-title"><i class="fa fa-heading"></i> Title</label>
            <input id="f-title" name="title" value="<?= e($current['title'] ?? '') ?>" required placeholder="Notice title...">
        </div>
    </div>
    <div class="form-field">
        <label for="f-body"><i class="fa fa-align-left"></i> Body</label>
        <textarea id="f-body" name="body" rows="4" required placeholder="Write the notice content..."><?= e($current['body'] ?? '') ?></textarea>
    </div>
    <div class="form-field">
        <label><i class="fa fa-image"></i> Attachment Image (optional)</label>
        <div class="upload-zone compact" id="noticeDropZone">
            <div class="upload-zone-content">
                <?php if (!empty($current['image'])): ?>
                    <img src="../<?= e($current['image']) ?>" class="upload-preview-img" id="noticePreview" alt="" style="max-height: 120px;">
                <?php else: ?>
                    <img src="" class="upload-preview-img" id="noticePreview" alt="" style="display: none; max-height: 120px;">
                <?php endif; ?>
                <div class="upload-prompt" id="noticePrompt">
                    <i class="fa fa-cloud-upload"></i>
                    <strong>Attach image</strong>
                    <span>Optional · JPG, PNG, WebP</span>
                </div>
            </div>
            <input type="file" name="notice_image" accept="image/*" class="upload-file-input" onchange="previewUpload(this, 'noticePreview', 'noticePrompt')">
        </div>
    </div>
    <div class="form-actions">
        <button class="admin-btn primary" type="submit"><i class="fa fa-check"></i> <?= $edit >= 0 ? 'Update Notice' : 'Publish Notice' ?></button>
    </div>
</form>

<!-- Notices List -->
<div class="admin-section-header">
    <h3><i class="fa fa-list-alt"></i> All Notices</h3>
    <span class="badge-count"><?= count($site['notices'] ?? []) ?> notices</span>
</div>

<div class="admin-notices-list">
    <?php foreach (($site['notices'] ?? []) as $i => $notice): ?>
        <div class="admin-notice-card">
            <div class="notice-card-body">
                <div class="notice-card-meta">
                    <span class="notice-date"><i class="fa fa-calendar"></i> <?= e($notice['date'] ?? '') ?></span>
                </div>
                <h4><?= e($notice['title'] ?? '') ?></h4>
                <p><?= e(mb_strimwidth($notice['body'] ?? '', 0, 200, '...')) ?></p>
            </div>
            <?php if (!empty($notice['image'])): ?>
                <img src="../<?= e($notice['image']) ?>" class="notice-card-thumb" alt="">
            <?php endif; ?>
            <div class="notice-card-actions">
                <a href="notices.php?edit=<?= $i ?>" class="table-action" title="Edit"><i class="fa fa-pencil"></i></a>
                <a href="notices.php?delete=<?= $i ?>" class="table-action danger" title="Delete" onclick="return confirm('Delete this notice?')"><i class="fa fa-trash"></i></a>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<script>
function previewUpload(input, previewId, promptId) {
    const preview = document.getElementById(previewId);
    const prompt = document.getElementById(promptId);
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.style.display = 'block';
            prompt.querySelector('strong').textContent = input.files[0].name;
        };
        reader.readAsDataURL(input.files[0]);
    }
}
document.querySelectorAll('.upload-zone').forEach(function(zone) {
    const input = zone.querySelector('input[type="file"]');
    zone.addEventListener('click', function(e) { if (e.target.tagName !== 'INPUT') input.click(); });
    zone.addEventListener('dragover', function(e) { e.preventDefault(); zone.classList.add('drag-over'); });
    zone.addEventListener('dragleave', function() { zone.classList.remove('drag-over'); });
    zone.addEventListener('drop', function(e) {
        e.preventDefault(); zone.classList.remove('drag-over');
        if (e.dataTransfer.files.length) { input.files = e.dataTransfer.files; input.dispatchEvent(new Event('change')); }
    });
});
</script>
<?php admin_footer(); ?>
