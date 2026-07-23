<?php
require __DIR__ . '/includes/functions.php';
$site = site_data();
$pageTitle = 'Image Gallery';
$activeSlug = 'gallery';
require __DIR__ . '/includes/header.php';
?>
<section class="hero compact">
    <div class="hero-media"><img src="images/university/campus-gate.png" alt="University gate"></div>
    <div class="container hero-content">
        <p class="kicker">DOCX Media</p>
        <h1>All usable images extracted from the university document.</h1>
        <p>The gallery includes logo, buildings, leadership portraits, student photographs, archival photographs, diagrams, awards, and campus infrastructure images.</p>
    </div>
</section>
<section class="section">
    <div class="container gallery-grid">
        <?php foreach (($site['gallery'] ?? []) as $i => $image): ?>
            <figure class="gallery-item">
                <a href="image.php?id=<?= $i ?>"><img src="<?= e($image['src'] ?? '') ?>" alt="<?= e($image['caption'] ?? '') ?>"></a>
                <figcaption><a href="image.php?id=<?= $i ?>"><?= e($image['caption'] ?? '') ?></a></figcaption>
            </figure>
        <?php endforeach; ?>
    </div>
</section>
<?php require __DIR__ . '/includes/footer.php'; ?>
