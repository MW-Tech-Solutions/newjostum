<?php
require __DIR__ . '/includes/functions.php';
$site = site_data();
$pageTitle = 'Charts and Graphs';
$activeSlug = 'charts';
require __DIR__ . '/includes/header.php';
?>
<section class="hero compact">
    <div class="hero-media"><img src="images/university/solar-campus.png" alt="Campus solar infrastructure"></div>
    <div class="container hero-content">
        <p class="kicker">DOCX Data Visualization</p>
        <h1>Charts and graphs from the university.</h1>
        <p>Staff, student, professor, college, postgraduate, and accreditation figures are rendered from the site data file and can be updated from the admin panel.</p>
    </div>
</section>
<section class="section">
    <div class="container chart-grid">
        <?php foreach (($site['charts'] ?? []) as $chart): ?>
            <article class="chart-card">
                <h2><?= e($chart['title'] ?? '') ?></h2>
                <canvas class="portal-chart" height="300" data-chart="<?= e(json_encode($chart, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE)) ?>"></canvas>
            </article>
        <?php endforeach; ?>
    </div>
</section>
<?php require __DIR__ . '/includes/footer.php'; ?>
