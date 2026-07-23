<?php
require __DIR__ . '/_admin.php';
$site = load_site_for_admin();

// Handle new image upload
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['upload_action'])) {
    $uploaded = handle_upload('new_gallery_image');
    if ($uploaded) {
        $caption = trim($_POST['new_caption'] ?? 'Untitled image');
        $site['gallery'][] = ['src' => $uploaded, 'caption' => $caption];
        save_site_for_admin($site);
        admin_flash('Image uploaded successfully.');
    } else {
        admin_flash('Upload failed. Check file type (JPG, PNG, WebP) and size (max 10MB).');
    }
    header('Location: gallery.php');
    exit;
}

// Handle caption updates
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['save_captions'])) {
    foreach (($_POST['captions'] ?? []) as $i => $caption) {
        if (isset($site['gallery'][(int) $i])) {
            $site['gallery'][(int) $i]['caption'] = trim($caption);
        }
    }
    save_site_for_admin($site);
    admin_flash('Gallery captions saved.');
    header('Location: gallery.php');
    exit;
}

// Handle image deletion
if (isset($_GET['delete'])) {
    $idx = (int) $_GET['delete'];
    if (isset($site['gallery'][$idx])) {
        array_splice($site['gallery'], $idx, 1);
        save_site_for_admin($site);
        admin_flash('Image removed from gallery.');
    }
    header('Location: gallery.php');
    exit;
}

admin_header('Gallery');
?>

<!-- Upload New Image -->
<div class="admin-section-header">
    <h3><i class="fa fa-cloud-upload"></i> Upload New Image</h3>
    <span class="badge-count"><?= count($site['gallery'] ?? []) ?> images</span>
</div>

<form method="post" enctype="multipart/form-data" class="admin-form" style="margin-bottom: 40px;">
    <input type="hidden" name="upload_action" value="1">
    <div class="form-grid-2">
        <div class="form-field">
            <label><i class="fa fa-image"></i> Image File</label>
            <div class="upload-zone" id="galleryDropZone">
                <div class="upload-zone-content">
                    <img src="" class="upload-preview-img" id="galleryPreview" alt="" style="display: none;">
                    <div class="upload-prompt" id="galleryPrompt">
                        <i class="fa fa-cloud-upload"></i>
                        <strong>Choose an image to upload</strong>
                        <span>Drag & drop or click to browse · JPG, PNG, WebP · Max 10MB</span>
                    </div>
                </div>
                <input type="file" name="new_gallery_image" id="galleryFileInput" accept="image/*" class="upload-file-input" required onchange="previewUpload(this, 'galleryPreview', 'galleryPrompt')">
            </div>
        </div>
        <div class="form-field" style="align-self: end;">
            <label for="newCaption"><i class="fa fa-pencil"></i> Caption</label>
            <input id="newCaption" name="new_caption" placeholder="Describe this image..." required>
            <button class="admin-btn primary" type="submit" style="margin-top: 14px; width: 100%;"><i class="fa fa-upload"></i> Upload Image</button>
        </div>
    </div>
</form>

<!-- Existing Gallery -->
<div class="admin-section-header">
    <h3><i class="fa fa-th"></i> Gallery Images</h3>
    <p>Edit captions or remove images</p>
</div>
<form method="post" class="admin-form">
    <input type="hidden" name="save_captions" value="1">
    <div class="admin-gallery-grid">
        <?php foreach (($site['gallery'] ?? []) as $i => $image): ?>
            <div class="admin-gallery-item">
                <div class="gallery-thumb-wrap">
                    <img src="../<?= e($image['src'] ?? '') ?>" alt="<?= e($image['caption'] ?? '') ?>">
                    <a href="gallery.php?delete=<?= $i ?>" class="gallery-delete-btn" onclick="return confirm('Remove this image from the gallery?')" title="Delete">
                        <i class="fa fa-trash"></i>
                    </a>
                </div>
                <div class="gallery-caption-input">
                    <input name="captions[<?= $i ?>]" value="<?= e($image['caption'] ?? '') ?>" placeholder="Caption...">
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <?php if (count($site['gallery'] ?? []) > 0): ?>
        <button class="admin-btn primary" type="submit" style="margin-top: 20px;"><i class="fa fa-check"></i> Save All Captions</button>
    <?php endif; ?>
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
            prompt.querySelector('strong').textContent = input.files[0].name;
            prompt.querySelector('span').textContent = (input.files[0].size / 1024 / 1024).toFixed(2) + ' MB';
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
