<?php
require __DIR__ . '/includes/functions.php';
$slug = preg_replace('/[^a-z0-9-]/', '', strtolower($_GET['slug'] ?? 'home'));
$page = page_by_slug($slug);
if (!$page) {
    http_response_code(404);
    include __DIR__ . '/404.php';
    exit;
}
$pageTitle = $page['title'] ?? 'Page';
$activeSlug = $slug;
require __DIR__ . '/includes/header.php';
?>
<section class="hero compact">
    <div class="hero-media"><img src="<?= e($page['hero_image'] ?? 'images/university/campus-gate.png') ?>" alt="<?= e($page['title'] ?? '') ?>"></div>
    <div class="container hero-content">
        <p class="kicker"><?= e($page['eyebrow'] ?? 'JoSTUM') ?></p>
        <h1><?= e($page['heading'] ?? $page['title'] ?? '') ?></h1>
        <p><?= e($page['summary'] ?? '') ?></p>
    </div>
</section>
<section class="section">
    <div class="container page-layout">
        <aside class="side-nav">
            <strong>Explore</strong>
            <?php 
            $pageGroup = $page['group'] ?? '';
            $isAboutGroup = in_array($pageGroup, ['about', 'governance']);
            foreach (($site['pages'] ?? []) as $item): 
                $itemGroup = $item['group'] ?? '';
                $isItemGroupAbout = in_array($itemGroup, ['about', 'governance']);
                if ($itemGroup === $pageGroup || ($isAboutGroup && $isItemGroupAbout)):
            ?>
                <a class="<?= e(($item['slug'] ?? '') === $slug ? 'active' : '') ?>" href="page.php?slug=<?= e($item['slug'] ?? '') ?>"><?= e($item['title'] ?? '') ?></a>
            <?php 
                endif;
            endforeach; 
            ?>
        </aside>
        <article class="page-content">
            <?php
            $academicsTemplate = __DIR__ . "/includes/academics/{$slug}.php";
            $pagesTemplate = __DIR__ . "/includes/pages/{$slug}.php";
            
            if (is_file($academicsTemplate)) {
                include $academicsTemplate;
            } elseif (is_file($pagesTemplate)) {
                include $pagesTemplate;
            } else {
                render_blocks($page['blocks'] ?? []);
            }
            ?>
        </article>
    </div>
</section>
<?php require __DIR__ . '/includes/footer.php'; ?>
