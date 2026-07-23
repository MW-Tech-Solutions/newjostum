<?php
require __DIR__ . '/includes/functions.php';
$site = site_data();
$query = trim($_GET['q'] ?? '');
$results = [];
if ($query !== '') {
    foreach (($site['pages'] ?? []) as $page) {
        $haystack = strtolower(json_encode($page, JSON_UNESCAPED_UNICODE));
        if (str_contains($haystack, strtolower($query))) {
            $results[] = $page;
        }
    }
}
$pageTitle = 'Search';
$activeSlug = 'search';
require __DIR__ . '/includes/header.php';
?>
<section class="section">
    <div class="container">
        <p class="kicker">Search</p>
        <h1>Search the university portal</h1>
        <form class="search-form" method="get">
            <input type="search" name="q" value="<?= e($query) ?>" placeholder="Search history, colleges, accreditation, portal...">
            <button class="btn primary" type="submit">Search</button>
        </form>
        <div class="card-grid">
            <?php foreach ($results as $page): ?>
                <article class="info-card">
                    <span><?= e($page['group'] ?? '') ?></span>
                    <strong><a href="page.php?slug=<?= e($page['slug'] ?? '') ?>"><?= e($page['title'] ?? '') ?></a></strong>
                    <p><?= e($page['summary'] ?? '') ?></p>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php require __DIR__ . '/includes/footer.php'; ?>
