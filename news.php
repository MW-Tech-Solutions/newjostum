<?php
require __DIR__ . '/includes/functions.php';
$site = site_data();
$settings = $site['settings'] ?? [];
$notices = $site['notices'] ?? [];
$pageTitle = 'News & Announcements';
$activeSlug = 'news';

require __DIR__ . '/includes/header.php';

$badges = ['Admissions', 'Academic', 'Research', 'Campus', 'Events', 'Staff'];
$eventImages = [
    'images/university/partnerships.png',
    'images/university/students-matriculation.png',
    'images/university/solar-campus.png',
    'images/docx/image9.png',
    'images/docx/image14.png',
    'images/docx/image27.png',
];
?>

<!-- Page Hero -->
<section class="hero compact">
    <div class="hero-media">
        <img src="images/university/partnerships.png" alt="Campus News">
    </div>
    <div class="container hero-content">
        <p class="kicker">Campus Updates</p>
        <h1>News &amp; Announcements</h1>
        <p>Stay informed with the latest updates, events, and announcements from Joseph Sarwuan Tarka University, Makurdi.</p>
    </div>
</section>

<!-- News Grid Section -->
<section class="section" style="background:var(--soft, #f3f8f5);">
    <div class="container">

        <!-- Section heading -->
        <div style="text-align:center; margin-bottom:48px;">
            <p class="kicker" style="color:var(--green);border-color:var(--green);margin:0 auto 10px;">
                All Updates
            </p>
            <h2 class="stripe-title stripe-title-green" style="font-size:clamp(28px,4vw,44px); margin:0;">
                Campus News &amp; Notices
            </h2>
            <p style="color:var(--muted);margin-top:12px;font-size:15.5px;">
                <?= count($notices) ?> notice<?= count($notices) !== 1 ? 's' : '' ?> published
            </p>
        </div>

        <?php if (empty($notices)): ?>
            <div style="text-align:center;padding:80px 20px;">
                <i class="fa fa-newspaper-o" style="font-size:56px;color:var(--green);opacity:0.3;margin-bottom:20px;display:block;"></i>
                <h3 style="color:var(--muted);">No news published yet.</h3>
                <p style="color:var(--muted);">Check back soon for the latest campus updates.</p>
            </div>
        <?php else: ?>

        <!-- Featured notice (first one) -->
        <?php
        $featured = $notices[0];
        $featuredImg = $featured['image'] ?? $eventImages[0];
        $featuredBadge = $badges[0];
        ?>
        <a href="news-detail.php?id=0" style="text-decoration:none;display:block;margin-bottom:48px;">
            <div style="
                background:#fff;
                border-radius:24px;
                box-shadow:0 6px 40px rgba(5,76,40,0.10);
                overflow:hidden;
                display:grid;
                grid-template-columns:1fr 1fr;
                min-height:340px;
                transition:box-shadow 0.3s, transform 0.3s;
            " onmouseover="this.style.boxShadow='0 16px 60px rgba(5,76,40,0.18)';this.style.transform='translateY(-3px)';"
               onmouseout="this.style.boxShadow='0 6px 40px rgba(5,76,40,0.10)';this.style.transform='none';">
                <!-- Image side -->
                <div style="position:relative;overflow:hidden;">
                    <img src="<?= e($featuredImg) ?>" alt="<?= e($featured['title'] ?? '') ?>"
                        style="width:100%;height:100%;object-fit:cover;display:block;transition:transform 0.5s;"
                        onmouseover="this.style.transform='scale(1.05)';"
                        onmouseout="this.style.transform='scale(1)';">
                    <div style="position:absolute;inset:0;background:linear-gradient(120deg,rgba(5,36,24,0.35),transparent);"></div>
                    <span style="position:absolute;top:20px;left:20px;background:var(--gold);color:#1a1a1a;font-size:11px;font-weight:800;text-transform:uppercase;letter-spacing:1px;border-radius:30px;padding:5px 14px;">
                        Featured
                    </span>
                </div>
                <!-- Content side -->
                <div style="padding:44px 48px;display:flex;flex-direction:column;justify-content:center;">
                    <span style="background:var(--green);color:#fff;font-size:10.5px;font-weight:800;text-transform:uppercase;letter-spacing:1px;border-radius:30px;padding:4px 12px;display:inline-block;width:fit-content;margin-bottom:16px;">
                        <?= e($featuredBadge) ?>
                    </span>
                    <h2 style="font-size:clamp(20px,2.5vw,30px);color:var(--green-deep);line-height:1.3;font-family:var(--font-serif);margin-bottom:16px;">
                        <?= e($featured['title'] ?? '') ?>
                    </h2>
                    <p style="color:var(--muted);font-size:15px;line-height:1.7;margin-bottom:24px;">
                        <?= e(mb_strimwidth($featured['body'] ?? '', 0, 220, '…')) ?>
                    </p>
                    <div style="display:flex;align-items:center;justify-content:space-between;">
                        <span style="color:var(--muted);font-size:13px;">
                            <i class="fa fa-calendar" style="color:var(--green);"></i>
                            &nbsp;<?= e($featured['date'] ?? '') ?>
                        </span>
                        <span style="color:var(--green);font-weight:800;font-size:14px;">
                            Read More <i class="fa fa-chevron-right"></i>
                        </span>
                    </div>
                </div>
            </div>
        </a>

        <!-- Remaining notices grid -->
        <?php if (count($notices) > 1): ?>
        <div style="
            display:grid;
            grid-template-columns:repeat(auto-fill, minmax(300px, 1fr));
            gap:28px;
        ">
            <?php foreach (array_slice($notices, 1) as $i => $notice):
                $idx = $i + 1; // actual index in $notices
                $img = $notice['image'] ?? ($eventImages[$idx % count($eventImages)]);
                $badge = $badges[$idx % count($badges)];
            ?>
            <a href="news-detail.php?id=<?= $idx ?>" style="text-decoration:none;display:block;" class="reveal">
                <article style="
                    background:#fff;
                    border-radius:18px;
                    box-shadow:0 3px 20px rgba(5,76,40,0.07);
                    overflow:hidden;
                    height:100%;
                    display:flex;
                    flex-direction:column;
                    transition:box-shadow 0.25s, transform 0.25s;
                " onmouseover="this.style.boxShadow='0 10px 40px rgba(5,76,40,0.15)';this.style.transform='translateY(-4px)';"
                   onmouseout="this.style.boxShadow='0 3px 20px rgba(5,76,40,0.07)';this.style.transform='none';">

                    <!-- Image -->
                    <div style="height:200px;overflow:hidden;position:relative;">
                        <img src="<?= e($img) ?>" alt="<?= e($notice['title'] ?? '') ?>"
                            style="width:100%;height:100%;object-fit:cover;display:block;transition:transform 0.4s;"
                            onmouseover="this.style.transform='scale(1.06)';"
                            onmouseout="this.style.transform='scale(1)';">
                        <div style="position:absolute;top:12px;left:12px;">
                            <span style="background:var(--green);color:#fff;font-size:10px;font-weight:800;text-transform:uppercase;letter-spacing:0.8px;border-radius:30px;padding:4px 11px;">
                                <?= e($badge) ?>
                            </span>
                        </div>
                    </div>

                    <!-- Body -->
                    <div style="padding:22px 24px;flex:1;display:flex;flex-direction:column;">
                        <h3 style="font-size:17px;color:var(--green-deep);line-height:1.4;font-weight:700;margin-bottom:10px;">
                            <?= e($notice['title'] ?? '') ?>
                        </h3>
                        <p style="color:var(--muted);font-size:14px;line-height:1.65;flex:1;margin-bottom:18px;">
                            <?= e(mb_strimwidth($notice['body'] ?? '', 0, 130, '…')) ?>
                        </p>
                        <div style="display:flex;align-items:center;justify-content:space-between;padding-top:14px;border-top:1px solid #eef2ee;">
                            <time style="color:var(--muted);font-size:12.5px;">
                                <i class="fa fa-calendar" style="color:var(--green);"></i>
                                &nbsp;<?= e($notice['date'] ?? '') ?>
                            </time>
                            <span style="color:var(--green);font-weight:800;font-size:13px;">
                                Read <i class="fa fa-chevron-right"></i>
                            </span>
                        </div>
                    </div>
                </article>
            </a>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>

        <?php endif; ?>

        <!-- Back to homepage -->
        <div style="text-align:center;margin-top:60px;">
            <a href="index.php" style="
                display:inline-flex;align-items:center;gap:8px;
                color:var(--green);font-weight:700;font-size:15px;
                text-decoration:none;
                border:2px solid var(--green);
                padding:12px 28px;border-radius:40px;
                transition:background 0.2s, color 0.2s;
            " onmouseover="this.style.background='var(--green)';this.style.color='#fff';"
               onmouseout="this.style.background='transparent';this.style.color='var(--green)';">
                <i class="fa fa-home"></i> Back to Homepage
            </a>
        </div>

    </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
