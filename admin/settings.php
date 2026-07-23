<?php
require __DIR__ . '/_admin.php';
$site = load_site_for_admin();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    foreach (['name', 'short_name', 'location', 'motto', 'tagline'] as $field) {
        $site['settings'][$field] = trim($_POST[$field] ?? '');
    }
    // Handle logo upload
    $uploaded = handle_upload('logo_file');
    if ($uploaded) {
        $site['settings']['logo'] = $uploaded;
    } elseif (isset($_POST['existing_logo'])) {
        $site['settings']['logo'] = trim($_POST['existing_logo'] ?? '');
    }
    // Handle Wallpaper uploads
    foreach (['wallpaper1', 'wallpaper2', 'wallpaper3'] as $wpKey) {
        $wpUploaded = handle_upload($wpKey . '_file');
        if ($wpUploaded) {
            $site['settings'][$wpKey] = $wpUploaded;
        } elseif (isset($_POST['existing_' . $wpKey])) {
            $site['settings'][$wpKey] = trim($_POST['existing_' . $wpKey] ?? '');
        }
    }
    save_site_for_admin($site);
    admin_flash('Settings saved.');
    header('Location: settings.php');
    exit;
}
$settings = $site['settings'] ?? [];
admin_header('Settings');
?>

<div class="admin-section-header">
    <h3><i class="fa fa-cog"></i> Site Configuration</h3>
    <p>Manage institutional branding and identity</p>
</div>

<form method="post" class="admin-form" enctype="multipart/form-data">
    <div class="settings-layout">
        <!-- Left: Text Fields -->
        <div class="settings-fields">
            <div class="form-field">
                <label for="f-name"><i class="fa fa-university"></i> Full Name</label>
                <input id="f-name" name="name" value="<?= e($settings['name'] ?? '') ?>" placeholder="Joseph Sarwuan Tarka University, Makurdi">
            </div>
            <div class="form-field">
                <label for="f-short"><i class="fa fa-tag"></i> Short Name</label>
                <input id="f-short" name="short_name" value="<?= e($settings['short_name'] ?? '') ?>" placeholder="JoSTUM">
            </div>
            <div class="form-field">
                <label for="f-loc"><i class="fa fa-map-marker"></i> Location</label>
                <input id="f-loc" name="location" value="<?= e($settings['location'] ?? '') ?>" placeholder="Makurdi, Benue State, Nigeria">
            </div>
            <div class="form-field">
                <label for="f-motto"><i class="fa fa-quote-left"></i> Motto</label>
                <input id="f-motto" name="motto" value="<?= e($settings['motto'] ?? '') ?>" placeholder="Innovation and Service">
            </div>
            <div class="form-field">
                <label for="f-tagline"><i class="fa fa-comment-o"></i> Tagline</label>
                <input id="f-tagline" name="tagline" value="<?= e($settings['tagline'] ?? '') ?>" placeholder="Education for individual and social responsibility">
            </div>
        </div>
        
        <!-- Right: Logo Upload -->
        <div class="settings-logo-section">
            <label><i class="fa fa-image"></i> University Logo</label>
            <input type="hidden" name="existing_logo" value="<?= e($settings['logo'] ?? '') ?>">
            <div class="upload-zone" id="logoDropZone">
                <div class="upload-zone-content">
                    <?php if (!empty($settings['logo'])): ?>
                        <img src="../<?= e($settings['logo']) ?>" class="upload-preview-img logo-preview" id="logoPreview" alt="Current logo">
                    <?php else: ?>
                        <img src="" class="upload-preview-img logo-preview" id="logoPreview" alt="" style="display: none;">
                    <?php endif; ?>
                    <div class="upload-prompt" id="logoPrompt">
                        <i class="fa fa-cloud-upload"></i>
                        <strong><?= !empty($settings['logo']) ? 'Replace logo' : 'Upload logo' ?></strong>
                        <span>JPG, PNG, SVG · Max 10MB</span>
                    </div>
                </div>
                <input type="file" name="logo_file" id="logoFileInput" accept="image/*" class="upload-file-input" onchange="previewUpload(this, 'logoPreview', 'logoPrompt')">
            </div>
        </div>
    </div>
    
    <!-- Homepage Wallpapers Section -->
    <div class="admin-section-header" style="margin-top: 40px; border-top: 1px solid var(--line); padding-top: 30px;">
        <h3><i class="fa fa-picture-o"></i> Homepage Hero Backgrounds</h3>
        <p>Upload up to 3 rotating background wallpapers for the homepage hero section</p>
    </div>
    
    <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; margin: 20px 0 30px;">
        <?php foreach (['wallpaper1' => 'Background Slide 1', 'wallpaper2' => 'Background Slide 2', 'wallpaper3' => 'Background Slide 3'] as $wpKey => $wpLabel): 
            $wpVal = $settings[$wpKey] ?? '';
            $defaultVal = ($wpKey === 'wallpaper1') ? 'images/docx/image9.png' : (($wpKey === 'wallpaper2') ? 'images/docx/image14.png' : 'images/docx/image27.png');
            $wpDisplay = !empty($wpVal) ? $wpVal : $defaultVal;
        ?>
            <div class="settings-logo-section" style="width: 100%;">
                <label><i class="fa fa-image"></i> <?= e($wpLabel) ?></label>
                <input type="hidden" name="existing_<?= e($wpKey) ?>" value="<?= e($wpVal) ?>">
                <div class="upload-zone" id="<?= e($wpKey) ?>DropZone" style="height: 180px;">
                    <div class="upload-zone-content">
                        <img src="../<?= e($wpDisplay) ?>" class="upload-preview-img logo-preview" id="<?= e($wpKey) ?>Preview" alt="<?= e($wpLabel) ?>" style="max-height: 110px; width: 100%; object-fit: cover; border-radius: 8px; display: block;">
                        <div class="upload-prompt" id="<?= e($wpKey) ?>Prompt" style="margin-top: 8px;">
                            <i class="fa fa-cloud-upload"></i>
                            <strong>Upload Image</strong>
                        </div>
                    </div>
                    <input type="file" name="<?= e($wpKey) ?>_file" id="<?= e($wpKey) ?>FileInput" accept="image/*" class="upload-file-input" onchange="previewWallpaper(this, '<?= e($wpKey) ?>Preview', '<?= e($wpKey) ?>Prompt')">
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    
    <div class="form-actions">
        <button class="admin-btn primary" type="submit"><i class="fa fa-check"></i> Save Settings</button>
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
            prompt.querySelector('strong').textContent = 'Logo selected — will be saved on submit';
        };
        reader.readAsDataURL(input.files[0]);
    }
}
function previewWallpaper(input, previewId, promptId) {
    const preview = document.getElementById(previewId);
    const prompt = document.getElementById(promptId);
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.style.display = 'block';
            prompt.querySelector('strong').textContent = 'Image selected';
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
