<?php
require __DIR__ . '/_admin.php';
$site = load_site_for_admin();
$action = $_GET['action'] ?? 'list';
$slug = $_GET['slug'] ?? '';
if (isset($_GET['delete'])) {
    $delete = $_GET['delete'];
    if (!in_array($delete, ['home', 'not-found'], true)) {
        $site['pages'] = array_values(array_filter($site['pages'] ?? [], static fn($page) => ($page['slug'] ?? '') !== $delete));
        save_site_for_admin($site);
        admin_flash('Page deleted.');
    }
    header('Location: pages.php');
    exit;
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $original = $_POST['original_slug'] ?? '';
    $slug = preg_replace('/[^a-z0-9-]/', '', strtolower($_POST['slug'] ?? ''));
    if ($slug === '') {
        $slug = 'page-' . time();
    }
    
    // Handle hero image file upload
    $heroImage = trim($_POST['existing_hero_image'] ?? 'images/docx/image9.png');
    $uploaded = handle_upload('hero_image_file');
    if ($uploaded) {
        $heroImage = $uploaded;
    }
    
    $pageData = [
        'slug' => $slug,
        'group' => trim($_POST['group'] ?? 'custom'),
        'title' => trim($_POST['title'] ?? 'Untitled Page'),
        'heading' => trim($_POST['heading'] ?? ''),
        'summary' => trim($_POST['summary'] ?? ''),
        'eyebrow' => trim($_POST['eyebrow'] ?? 'JoSTUM'),
        'hero_image' => $heroImage,
        'blocks' => [['type' => 'text', 'paragraphs' => array_values(array_filter(array_map('trim', explode("\n\n", $_POST['paragraphs'] ?? ''))))]],
    ];
    $found = false;
    foreach ($site['pages'] as &$page) {
        if (($page['slug'] ?? '') === $original && $original !== '') {
            $page = $pageData;
            $found = true;
            break;
        }
    }
    unset($page);
    if (!$found) {
        $site['pages'][] = $pageData;
    }
    save_site_for_admin($site);
    admin_flash('Page saved.');
    header('Location: pages.php?action=edit&slug=' . urlencode($slug));
    exit;
}
$current = null;
if ($action === 'edit') {
    foreach ($site['pages'] ?? [] as $page) {
        if (($page['slug'] ?? '') === $slug) {
            $current = $page;
            break;
        }
    }
}
if ($action === 'new') {
    $current = ['slug' => '', 'group' => 'custom', 'title' => '', 'eyebrow' => '', 'heading' => '', 'summary' => '', 'hero_image' => 'images/docx/image9.png', 'blocks' => []];
}
$paragraphs = [];
foreach (($current['blocks'] ?? []) as $block) {
    if (($block['type'] ?? '') === 'text') {
        $paragraphs = array_merge($paragraphs, $block['paragraphs'] ?? []);
    }
}
admin_header('Pages');
?>
<?php if ($action === 'list'): ?>
<div class="admin-section-header">
    <h3><i class="fa fa-file-text-o"></i> All Pages</h3>
    <a href="pages.php?action=new" class="admin-btn primary"><i class="fa fa-plus"></i> New Page</a>
</div>
<div class="admin-search-bar">
    <i class="fa fa-search"></i>
    <input type="text" id="pageSearch" placeholder="Search pages by title, slug, or group..." onkeyup="filterPageTable(this.value)">
</div>
<div class="table-wrap">
    <table id="pagesTable">
        <thead><tr><th>Title</th><th>Slug</th><th>Group</th><th>Hero Image</th><th>Actions</th></tr></thead>
        <tbody>
            <?php foreach ($site['pages'] ?? [] as $page): ?>
                <tr>
                    <td><strong><?= e($page['title'] ?? '') ?></strong></td>
                    <td><code><?= e($page['slug'] ?? '') ?></code></td>
                    <td><span class="table-badge"><?= e($page['group'] ?? '') ?></span></td>
                    <td>
                        <?php if (!empty($page['hero_image'])): ?>
                            <img src="../<?= e($page['hero_image']) ?>" class="table-thumb" alt="">
                        <?php else: ?>
                            <span class="no-image">—</span>
                        <?php endif; ?>
                    </td>
                    <td class="actions-cell">
                        <a href="pages.php?action=edit&slug=<?= e($page['slug'] ?? '') ?>" class="table-action" title="Edit"><i class="fa fa-pencil"></i></a>
                        <a href="../page.php?slug=<?= e($page['slug'] ?? '') ?>" class="table-action" title="View" target="_blank"><i class="fa fa-external-link"></i></a>
                        <?php if (!in_array(($page['slug'] ?? ''), ['home', 'not-found'], true)): ?>
                            <a href="pages.php?delete=<?= e($page['slug'] ?? '') ?>" class="table-action danger" title="Delete" onclick="return confirm('Delete this page?')"><i class="fa fa-trash"></i></a>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<script>
function filterPageTable(q) {
    q = q.toLowerCase();
    document.querySelectorAll('#pagesTable tbody tr').forEach(function(row) {
        row.style.display = row.textContent.toLowerCase().includes(q) ? '' : 'none';
    });
}
</script>

<?php elseif ($current): ?>
<div class="admin-section-header">
    <h3><i class="fa fa-pencil"></i> <?= $current['slug'] ? 'Edit Page' : 'Create New Page' ?></h3>
    <a href="pages.php" class="admin-btn outline"><i class="fa fa-arrow-left"></i> Back to list</a>
</div>
<form method="post" class="admin-form" enctype="multipart/form-data">
    <input type="hidden" name="original_slug" value="<?= e($current['slug'] ?? '') ?>">
    
    <div class="form-grid-2">
        <div class="form-field">
            <label for="f-slug"><i class="fa fa-link"></i> Slug</label>
            <input id="f-slug" name="slug" value="<?= e($current['slug'] ?? '') ?>" placeholder="example-page">
        </div>
        <div class="form-field">
            <label for="f-group"><i class="fa fa-folder-o"></i> Group</label>
            <input id="f-group" name="group" value="<?= e($current['group'] ?? '') ?>" placeholder="about">
        </div>
    </div>
    
    <div class="form-field">
        <label for="f-title"><i class="fa fa-heading"></i> Title</label>
        <input id="f-title" name="title" value="<?= e($current['title'] ?? '') ?>" required placeholder="Page Title">
    </div>
    
    <div class="form-grid-2">
        <div class="form-field">
            <label for="f-eyebrow"><i class="fa fa-tag"></i> Eyebrow</label>
            <input id="f-eyebrow" name="eyebrow" value="<?= e($current['eyebrow'] ?? '') ?>" placeholder="JoSTUM">
        </div>
        <div class="form-field">
            <label for="f-heading"><i class="fa fa-header"></i> Heading</label>
            <input id="f-heading" name="heading" value="<?= e($current['heading'] ?? '') ?>" placeholder="Page Heading">
        </div>
    </div>
    
    <div class="form-field">
        <label for="f-summary"><i class="fa fa-align-left"></i> Summary</label>
        <textarea id="f-summary" name="summary" rows="3" placeholder="Brief description of this page..."><?= e($current['summary'] ?? '') ?></textarea>
    </div>
    
    <!-- Hero Image Upload -->
    <div class="form-field">
        <label><i class="fa fa-image"></i> Hero Image</label>
        <input type="hidden" name="existing_hero_image" value="<?= e($current['hero_image'] ?? '') ?>">
        <div class="upload-zone" id="heroDropZone">
            <div class="upload-zone-content">
                <?php if (!empty($current['hero_image'])): ?>
                    <img src="../<?= e($current['hero_image']) ?>" class="upload-preview-img" id="heroPreview" alt="Current hero image">
                <?php else: ?>
                    <img src="" class="upload-preview-img" id="heroPreview" alt="" style="display: none;">
                <?php endif; ?>
                <div class="upload-prompt" id="heroPrompt" <?= !empty($current['hero_image']) ? 'style="margin-top: 12px;"' : '' ?>>
                    <i class="fa fa-cloud-upload"></i>
                    <strong><?= !empty($current['hero_image']) ? 'Replace image' : 'Upload hero image' ?></strong>
                    <span>Drag & drop or click to browse · JPG, PNG, WebP · Max 10MB</span>
                </div>
            </div>
            <input type="file" name="hero_image_file" id="heroFileInput" accept="image/*" class="upload-file-input" onchange="previewUpload(this, 'heroPreview', 'heroPrompt')">
        </div>
    </div>
    
    <div class="form-field">
        <label for="f-paragraphs"><i class="fa fa-paragraph"></i> Main Text Paragraphs</label>
        <span class="form-hint">Separate paragraphs with blank lines</span>
        <textarea id="f-paragraphs" name="paragraphs" rows="18" placeholder="Write your page content here..."><?= e(implode("\n\n", $paragraphs)) ?></textarea>
    </div>
    
    <div class="form-actions">
        <button class="admin-btn primary" type="submit"><i class="fa fa-check"></i> Save Page</button>
        <a href="pages.php" class="admin-btn outline">Cancel</a>
    </div>
</form>
<script>
function previewUpload(input, previewId, promptId) {
    const preview = document.getElementById(previewId);
    const prompt = document.getElementById(promptId);
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.style.display = 'block';
            prompt.querySelector('strong').textContent = 'Image selected — will be uploaded on save';
        };
        reader.readAsDataURL(input.files[0]);
    }
}
// Drag & drop
document.querySelectorAll('.upload-zone').forEach(function(zone) {
    const input = zone.querySelector('input[type="file"]');
    zone.addEventListener('click', function() { input.click(); });
    zone.addEventListener('dragover', function(e) { e.preventDefault(); zone.classList.add('drag-over'); });
    zone.addEventListener('dragleave', function() { zone.classList.remove('drag-over'); });
    zone.addEventListener('drop', function(e) {
        e.preventDefault();
        zone.classList.remove('drag-over');
        if (e.dataTransfer.files.length) {
            input.files = e.dataTransfer.files;
            input.dispatchEvent(new Event('change'));
        }
    });
});
</script>
<?php endif; ?>
<?php admin_footer(); ?>
