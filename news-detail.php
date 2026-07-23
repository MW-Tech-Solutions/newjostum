<?php
require __DIR__ . '/includes/functions.php';
$site = site_data();
$settings = $site['settings'] ?? [];

$id = isset($_GET['id']) ? (int) $_GET['id'] : -1;
$notices = $site['notices'] ?? [];

if ($id < 0 || !isset($notices[$id])) {
    http_response_code(404);
    include __DIR__ . '/404.php';
    exit;
}

$notice = $notices[$id];
$pageTitle = $notice['title'] ?? 'News';
$activeSlug = '';

require __DIR__ . '/includes/header.php';

// Badge categories cycling
$badges = ['Admissions', 'Academic', 'Research', 'Campus', 'Events', 'Staff'];
$badge = $badges[$id % count($badges)];

// Determine image
$eventImages = [
    'images/university/partnerships.png',
    'images/university/students-matriculation.png',
    'images/university/solar-campus.png',
];
$heroImg = $notice['image'] ?? ($eventImages[$id % count($eventImages)]);

// Previous / next
$prevId = ($id > 0) ? $id - 1 : null;
$nextId = isset($notices[$id + 1]) ? $id + 1 : null;
?>

<!-- Page Hero -->
<section class="hero compact">
    <div class="hero-media">
        <img src="<?= e($heroImg) ?>" alt="<?= e($notice['title'] ?? '') ?>">
    </div>
    <div class="container hero-content">
        <p class="kicker">Campus News</p>
        <h1><?= e($notice['title'] ?? '') ?></h1>
        <p><i class="fa fa-calendar"></i> <?= e($notice['date'] ?? '') ?></p>
    </div>
</section>

<!-- Article Body -->
<section class="section">
    <div class="container" style="max-width: 860px;">

        <!-- Badge + meta bar -->
        <div style="display:flex; align-items:center; gap:12px; margin-bottom:28px; flex-wrap:wrap;">
            <span style="display:inline-block; background:var(--green); color:#fff; font-size:11px; font-weight:700; text-transform:uppercase; letter-spacing:1px; border-radius:30px; padding:5px 14px;">
                <?= e($badge) ?>
            </span>
            <span style="color:var(--muted); font-size:13.5px;">
                <i class="fa fa-calendar" style="color:var(--green);"></i>
                &nbsp;<?= e($notice['date'] ?? '') ?>
            </span>
            <a href="news.php" style="margin-left:auto; color:var(--green); font-weight:700; font-size:13.5px; text-decoration:none;">
                <i class="fa fa-arrow-left"></i> Back to News
            </a>
        </div>

        <!-- Main Article Card -->
        <article style="
            background:#fff;
            border-radius:20px;
            box-shadow:0 4px 32px rgba(5,76,40,0.08);
            overflow:hidden;
            margin-bottom:40px;
        ">
            <!-- Featured image -->
            <div style="height:340px; overflow:hidden; position:relative;">
                <img src="<?= e($heroImg) ?>" alt="<?= e($notice['title'] ?? '') ?>"
                    style="width:100%; height:100%; object-fit:cover; display:block;">
                <!-- Gradient overlay -->
                <div style="position:absolute;inset:0;background:linear-gradient(to top, rgba(5,36,24,0.55) 0%, transparent 60%);"></div>
                <div style="position:absolute;bottom:24px;left:28px;">
                    <span style="display:inline-block;background:var(--gold);color:#1a1a1a;font-size:11px;font-weight:800;text-transform:uppercase;letter-spacing:1px;border-radius:30px;padding:5px 14px;">
                        <?= e($badge) ?>
                    </span>
                </div>
            </div>

            <!-- Content -->
            <div style="padding:40px 48px;">
                <h1 style="
                    font-size:clamp(24px,3.5vw,36px);
                    color:var(--green-deep);
                    line-height:1.3;
                    font-family:var(--font-serif);
                    margin-bottom:20px;
                "><?= e($notice['title'] ?? '') ?></h1>

                <div style="
                    font-size:16.5px;
                    line-height:1.85;
                    color:#444;
                    text-align:justify;
                ">
                    <?php
                    // Render body — split on double newlines for multi-paragraph support
                    $paragraphs = preg_split('/(\r\n\r\n|\n\n|\r\r)/', $notice['body'] ?? '');
                    foreach ($paragraphs as $para) {
                        $para = trim($para);
                        if ($para !== '') {
                            echo '<p style="margin-bottom:18px;">' . e($para) . '</p>';
                        }
                    }
                    ?>
                </div>

                <!-- Share / action bar -->
                <div style="
                    margin-top:40px;
                    padding-top:24px;
                    border-top:1px solid #eef2ee;
                    display:flex;
                    align-items:center;
                    gap:14px;
                    flex-wrap:wrap;
                ">
                    <span style="font-weight:700; color:var(--green-deep); font-size:13.5px;">Share:</span>
                    <a href="https://twitter.com/intent/tweet?text=<?= urlencode($notice['title'] ?? '') ?>&url=<?= urlencode('http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']) ?>"
                       target="_blank" rel="noopener"
                       style="display:inline-flex;align-items:center;gap:6px;background:#1da1f2;color:#fff;padding:8px 16px;border-radius:8px;font-size:13px;font-weight:700;text-decoration:none;">
                        <i class="fa fa-twitter"></i> Twitter
                    </a>
                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?= urlencode('http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']) ?>"
                       target="_blank" rel="noopener"
                       style="display:inline-flex;align-items:center;gap:6px;background:#1877f2;color:#fff;padding:8px 16px;border-radius:8px;font-size:13px;font-weight:700;text-decoration:none;">
                        <i class="fa fa-facebook"></i> Facebook
                    </a>
                </div>
            </div>
        </article>

        <!-- Prev / Next navigation -->
        <?php if ($prevId !== null || $nextId !== null): ?>
        <div style="display:flex; gap:16px; margin-bottom:40px;">
            <?php if ($prevId !== null): ?>
            <a href="news-detail.php?id=<?= $prevId ?>" style="
                flex:1;
                background:#fff;
                border:1.5px solid #e0ede6;
                border-radius:14px;
                padding:20px 24px;
                text-decoration:none;
                display:block;
                transition:box-shadow 0.2s, border-color 0.2s;
            " onmouseover="this.style.boxShadow='0 6px 24px rgba(5,76,40,0.12)';this.style.borderColor='var(--green)';"
               onmouseout="this.style.boxShadow='none';this.style.borderColor='#e0ede6';">
                <div style="font-size:11.5px;color:var(--muted);font-weight:700;text-transform:uppercase;letter-spacing:0.8px;margin-bottom:6px;">
                    <i class="fa fa-chevron-left"></i> Previous
                </div>
                <div style="color:var(--green-deep);font-weight:700;font-size:14.5px;line-height:1.4;">
                    <?= e(mb_strimwidth($notices[$prevId]['title'] ?? '', 0, 70, '…')) ?>
                </div>
            </a>
            <?php endif; ?>
            <?php if ($nextId !== null): ?>
            <a href="news-detail.php?id=<?= $nextId ?>" style="
                flex:1;
                background:#fff;
                border:1.5px solid #e0ede6;
                border-radius:14px;
                padding:20px 24px;
                text-decoration:none;
                text-align:right;
                display:block;
                transition:box-shadow 0.2s, border-color 0.2s;
            " onmouseover="this.style.boxShadow='0 6px 24px rgba(5,76,40,0.12)';this.style.borderColor='var(--green)';"
               onmouseout="this.style.boxShadow='none';this.style.borderColor='#e0ede6';">
                <div style="font-size:11.5px;color:var(--muted);font-weight:700;text-transform:uppercase;letter-spacing:0.8px;margin-bottom:6px;">
                    Next <i class="fa fa-chevron-right"></i>
                </div>
                <div style="color:var(--green-deep);font-weight:700;font-size:14.5px;line-height:1.4;">
                    <?= e(mb_strimwidth($notices[$nextId]['title'] ?? '', 0, 70, '…')) ?>
                </div>
            </a>
            <?php endif; ?>
        </div>
        <?php endif; ?>

        <!-- Back button -->
        <div style="text-align:center;">
            <a href="news.php" class="btn primary" style="padding:14px 36px; font-size:15px;">
                <i class="fa fa-th-list"></i> View All News &amp; Announcements
            </a>
        </div>

    </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
