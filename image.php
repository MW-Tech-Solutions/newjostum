<?php
require __DIR__ . '/includes/functions.php';
$site = site_data();
$id = max(0, (int) ($_GET['id'] ?? 0));
$gallery = $site['gallery'] ?? [];
$total = count($gallery);
$image = null;

if ($total === 0) {
    http_response_code(404);
    $image = ['src' => 'images/docx/image9.png', 'caption' => 'Image not found'];
} else {
    $id = $id % $total;
    $image = $gallery[$id];
}

$pageTitle = $image['caption'] ?? 'Image';
$activeSlug = 'gallery';
require __DIR__ . '/includes/header.php';
?>
<section class="section">
    <div class="container">
        <p class="kicker">Gallery Image Selected</p>
        <h1 style="margin-bottom: 40px; text-align: center;"><?= e($image['caption'] ?? '') ?></h1>
        
        <?php if ($total > 0): 
            $prevId = ($id - 1 + $total) % $total;
            $nextId = ($id + 1) % $total;
            $prevImage = $gallery[$prevId];
            $nextImage = $gallery[$nextId];
        ?>
            <div class="gallery-selected-row">
                <!-- Previous image frame -->
                <div class="gallery-side-frame prev-frame">
                    <a href="image.php?id=<?= $prevId ?>" class="frame-link">
                        <img src="<?= e($prevImage['src'] ?? '') ?>" alt="<?= e($prevImage['caption'] ?? '') ?>">
                        <div class="frame-overlay">
                            <span><i class="fa fa-chevron-left"></i> Previous</span>
                        </div>
                    </a>
                </div>

                <!-- Selected (Active) image frame -->
                <div class="gallery-center-frame active-frame">
                    <img src="<?= e($image['src'] ?? '') ?>" alt="<?= e($image['caption'] ?? '') ?>">
                </div>

                <!-- Next image frame -->
                <div class="gallery-side-frame next-frame">
                    <a href="image.php?id=<?= $nextId ?>" class="frame-link">
                        <img src="<?= e($nextImage['src'] ?? '') ?>" alt="<?= e($nextImage['caption'] ?? '') ?>">
                        <div class="frame-overlay">
                            <span>Next <i class="fa fa-chevron-right"></i></span>
                        </div>
                    </a>
                </div>
            </div>
            
            <div class="active-caption">
                <strong>Selected View:</strong> <?= e($image['caption'] ?? '') ?>
            </div>
        <?php else: ?>
            <p style="text-align: center; color: var(--muted);">No images found in gallery.</p>
        <?php endif; ?>

        <div class="hero-actions on-light" style="justify-content: center; margin-top: 40px;">
            <a class="btn primary" href="gallery.php"><i class="fa fa-th"></i> Back to Gallery</a>
            <?php if ($total > 0): ?>
                <a class="btn outline" href="image.php?id=<?= $prevId ?>"><i class="fa fa-chevron-left"></i> Previous</a>
                <a class="btn outline" href="image.php?id=<?= $nextId ?>">Next <i class="fa fa-chevron-right"></i></a>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php require __DIR__ . '/includes/footer.php'; ?>
