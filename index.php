<?php
require __DIR__ . '/includes/functions.php';
$site = site_data();
$home = page_by_slug('home') ?? [];
$settings = $site['settings'] ?? [];
$pageTitle = $home['title'] ?? ($settings['name'] ?? 'Home');
$activeSlug = 'home';
$eventImages = [
    'images/university/partnerships.png',
    'images/university/students-matriculation.png',
    'images/university/solar-campus.png',
];
require __DIR__ . '/includes/header.php';
?>

<?php
$wallpaper1 = !empty($settings['wallpaper1']) ? $settings['wallpaper1'] : 'images/docx/image9.png';
$wallpaper2 = !empty($settings['wallpaper2']) ? $settings['wallpaper2'] : 'images/docx/image14.png';
$wallpaper3 = !empty($settings['wallpaper3']) ? $settings['wallpaper3'] : 'images/docx/image27.png';
?>
<!-- Stripe Hero Banner Section -->
<section class="stripe-hero">
    <!-- Shifting background images slider -->
    <div class="hero-slider" style="position: absolute; inset: 0; z-index: -2;">
        <!-- Slide 1 -->
        <div class="hero-slide active" data-slide="0">
            <div class="hero-media"><img src="<?= e($wallpaper1) ?>" alt="University Gate"></div>
        </div>
        <!-- Slide 2 -->
        <div class="hero-slide" data-slide="1">
            <div class="hero-media"><img src="<?= e($wallpaper2) ?>" alt="Senate Building"></div>
        </div>
        <!-- Slide 3 -->
        <div class="hero-slide" data-slide="2">
            <div class="hero-media"><img src="<?= e($wallpaper3) ?>" alt="Solar campus installation"></div>
        </div>
    </div>
    
    <!-- White glass overlay with grids skewed Stripe-style -->
    <div class="stripe-canvas" style="z-index: -1; pointer-events: none; background: transparent;">
        <div class="stripe-bg-grid" style="background: rgba(255, 255, 255, 0.00); box-shadow: none;"></div>
    </div>
    
    <div class="container stripe-hero-grid" style="position: relative; z-index: 2;">
        <!-- Hero Left Column: Copy & Actions -->
        <div class="stripe-fade-up">
            <p class="kicker" style="color: var(--green); border-color: var(--green); font-weight: 800;"><?= e($home['eyebrow'] ?? 'Innovation and Service') ?></p>
            <h1 class="stripe-title stripe-title-green">Joseph Sarwuan Tarka University</h1>
            <p style="background: rgba(255, 255, 255, 0.82); backdrop-filter: blur(12px); -webkit-backdrop-filter: blur(12px); border: 1px solid rgba(5, 38, 24, 0.15); border-radius: 12px; padding: 16px 20px; color: #031811; font-size: 18px; max-width: 620px; line-height: 1.6; font-weight: 600; margin: 20px 0 30px; box-shadow: 0 10px 30px rgba(5, 38, 24, 0.05);">
                A dynamic university portal for academics, administration, research, admissions, students, charts, and institutional records.
            </p>
            
            <!-- Floating white glass search bar -->
            <div class="hero-search-container" style="max-width: 580px; margin-top: 30px; animation: none;">
                <form class="hero-search-form" action="search.php" method="get" style="background: rgba(5, 38, 24, 0.05); border-color: rgba(5, 38, 24, 0.12); box-shadow: 0 15px 35px rgba(5, 38, 24, 0.06);">
                    <input type="search" name="q" placeholder="Search programmes, colleges, calendars, portals..." required style="color: var(--ink);">
                    <button type="submit" style="background: linear-gradient(135deg, var(--green), var(--green-dark)); color: #fff;"><i class="fa fa-search"></i> Search </button>
                </form>
            </div>

            <div class="hero-actions" style="margin-top: 36px;">
                <a class="btn primary" href="page.php?slug=admissions"><i class="fa fa-graduation-cap"></i> Check Admissions</a>
            </div>
        </div>

        <!-- Hero Right Column: Mock Interactive Dashboard -->
        <div class="stripe-mockup-container stripe-fade-up" style="animation-delay: 0.3s;">
            <!-- <div class="stripe-dashboard" style="background: rgba(5, 38, 24, 0.85); border-color: rgba(255, 255, 255, 0.15);">
                <div class="dashboard-header">
                    <div class="dashboard-brand">
                        <i class="fa fa-university" style="color: var(--gold);"></i>
                        <span style="color: #fff;">PORTAL SYSTEM</span>
                    </div>
                    <div class="dashboard-avatar" style="background: var(--gold); color: var(--green-deep); width: auto; height: auto; border-radius: 6px; padding: 4px 10px; font-weight: 800; font-size: 11px;">JOSTUM</div>
                </div>
                
                <div class="dashboard-card">
                    <span class="card-lbl">Total Enrolled Students</span>
                    <span class="card-val" style="font-size: 22px;">22,846 Active</span>
                    <div class="dashboard-status">
                        <i class="fa fa-circle" style="font-size: 8px;"></i> Portal System Live & Active
                    </div>
                </div>

                <div class="dashboard-list">
                    <div class="dashboard-item">
                        <span class="item-title">Colleges & Departments</span>
                        <span class="item-meta" style="color: var(--gold); font-weight: 700;">11 Colleges / 76 Depts</span>
                    </div>
                    <div class="dashboard-item">
                        <span class="item-title">Academic Programmes</span>
                        <span class="item-meta" style="color: var(--gold); font-weight: 700;">Full NUC Accreditation</span>
                    </div>
                    <div class="dashboard-item">
                        <span class="item-title">Motto</span>
                        <span class="item-meta" style="color: #34d399; font-weight: 700;"><i class="fa fa-shield"></i> Innovation and Service</span>
                    </div>
                </div>
                
                <div style="font-size: 11px; text-align: center; color: rgba(255,255,255,0.45); margin-top: auto; border-top: 1px solid rgba(255,255,255,0.06); padding-top: 10px;">
                    Joseph Sarwuan Tarka University, Makurdi
                </div>
            </div> -->
        </div>
    </div>
</section>

<!-- Floating Popular Links Panel -->
<section class="quick-routes" aria-label="Popular links">
    <div class="container quick-routes-inner">
        <a href="page.php?slug=admissions" class="stripe-gate-card" style="padding: 24px; flex-direction: row; gap: 16px; border-radius: 16px;">
            <i class="fa fa-check-square-o" style="font-size: 24px; color: var(--green);"></i>
            <div>
                <strong style="display: block; font-size: 15px; color: var(--green-deep); font-weight: 800;">Admission Status</strong>
                <span style="display:block; font-size:12.5px; font-weight:400; color:var(--muted); margin-top:2px;">Check entry & screening list</span>
            </div>
        </a>
        <a href="page.php?slug=colleges" class="stripe-gate-card" style="padding: 24px; flex-direction: row; gap: 16px; border-radius: 16px;">
            <i class="fa fa-university" style="font-size: 24px; color: var(--gold);"></i>
            <div>
                <strong style="display: block; font-size: 15px; color: var(--green-deep); font-weight: 800;">Colleges & Deans</strong>
                <span style="display:block; font-size:12.5px; font-weight:400; color:var(--muted); margin-top:2px;">Explore academic programs</span>
            </div>
        </a>
        <a href="page.php?slug=student-portal" class="stripe-gate-card" style="padding: 24px; flex-direction: row; gap: 16px; border-radius: 16px;">
            <i class="fa fa-user-circle" style="font-size: 24px; color: var(--blue);"></i>
            <div>
                <strong style="display: block; font-size: 15px; color: var(--green-deep); font-weight: 800;">Students Hub</strong>
                <span style="display:block; font-size:12.5px; font-weight:400; color:var(--muted); margin-top:2px;">Access courses & dashboard</span>
            </div>
        </a>
        <a href="charts.php" class="stripe-gate-card" style="padding: 24px; flex-direction: row; gap: 16px; border-radius: 16px;">
            <i class="fa fa-bar-chart" style="font-size: 24px; color: var(--red);"></i>
            <div>
                <strong style="display: block; font-size: 15px; color: var(--green-deep); font-weight: 800;">Ranking & Stats</strong>
                <span style="display:block; font-size:12.5px; font-weight:400; color:var(--muted); margin-top:2px;">Interactive portal charts</span>
            </div>
        </a>
    </div>
</section>

<!-- Vice Chancellor Welcome Section (Stripe Customer Editorial Style) -->
<?php
$vcProfilePage = page_by_slug('vice-chancellor-welcome') ?? [];
$vcImgSrc = $vcProfilePage['hero_image'] ?? 'images/university/vice-chancellor.jpeg';
$vcName = $vcProfilePage['heading'] ?? $vcProfilePage['title'] ?? 'Professor Isaac Nathaniel Itodo';

$vcParagraphs = [];
foreach (($vcProfilePage['blocks'] ?? []) as $block) {
    if (($block['type'] ?? '') === 'text') {
        foreach (($block['paragraphs'] ?? []) as $pText) {
            $splitParts = preg_split('/(\r\n\r\n|\n\n|\r\r)/', $pText);
            foreach ($splitParts as $part) {
                $part = trim($part);
                if ($part !== '') {
                    $vcParagraphs[] = $part;
                }
            }
        }
    }
}
if (empty($vcParagraphs)) {
    $vcParagraphs = [
        'Dear students, staff, and visitors, it is my great pleasure to welcome you to Joseph Sarwuan Tarka University, Makurdi. As the Vice Chancellor of this esteemed institution, it is an honor to lead an exceptional community of scholars, researchers, and learners.',
        'Our university is committed to providing a dynamic academic environment that fosters critical thinking, innovation, and creativity. We offer a wide range of undergraduate and post-graduate programs that prepare our students for successful and fulfilling careers in various fields.',
        'We take pride in the diversity of our community, and strive to promote inclusivity and equality for everyone. Our colleges and staff are dedicated to providing top-notch education, research opportunities, and support services that empower our students to achieve their fullest potential.',
        'I encourage you to explore all that Joseph Sarwuan Tarka University has to offer, and to engage in the many opportunities available to you. We look forward to a successful and rewarding academic journey together.'
    ];
}
$vcLeadParagraph = $vcParagraphs[0];
$vcQuoteParagraph = $vcParagraphs[1] ?? '';
?>
<section class="stripe-vc-section">
    <div class="container stripe-vc-grid">
        <!-- Left: Image frame with signature glass panel -->
        <div class="stripe-vc-frame reveal">
            <img src="<?= e($vcImgSrc) ?>" alt="<?= e($vcName) ?>">
            <div class="stripe-vc-signature">
                <div style="font-size: 13px; color: var(--muted);">
                    <strong style="color: var(--green-deep); font-size: 15px; display: block; margin-bottom: 2px;"><?= e($vcName) ?></strong>
                    <span>Vice Chancellor, JOSTUM</span>
                </div>
            </div>
        </div>

        <!-- Right: Editorial layout -->
        <div class="reveal" style="transition-delay: 150ms;">
            <p class="kicker" style="color: var(--green); border-color: var(--green);">Office of the Vice Chancellor</p>
            <h2 class="stripe-title stripe-title-green" style="font-size: clamp(32px, 4.5vw, 52px); margin: 10px 0 25px;">Welcome to JOSTUM Makurdi</h2>
            
            <p class="drop-cap" style="font-size: 17.5px; line-height: 1.75; color: var(--muted); font-weight: 500; text-align: justify;"><?= e($vcLeadParagraph) ?></p>
            
            <?php if (!empty($vcQuoteParagraph)): ?>
                <div class="vc-quote" style="border-left: 4px solid var(--gold); padding-left: 20px; margin: 30px 0; background: var(--soft); padding: 24px; border-radius: 12px; text-align: justify;">
                    <p style="font-family: var(--font-serif); font-size: 19px; font-style: italic; line-height: 1.6; color: var(--green-deep); margin: 0; font-weight: 600;">
                        "<?= e($vcQuoteParagraph) ?>"
                    </p>
                </div>
            <?php endif; ?>

            <?php for ($i = 2; $i < count($vcParagraphs); $i++): ?>
                <p style="margin-top: 14px; color: var(--muted); font-size: 15.5px; text-align: justify;"><?= e($vcParagraphs[$i]) ?></p>
            <?php endfor; ?>
            
            <a class="btn primary" href="page.php?slug=vice-chancellor-profile" style="margin-top: 30px;"><i class="fa fa-user"></i> Read VC Full Profile</a>
        </div>
    </div>
</section>

<!-- Enterprise Gateways Hub (Stripe Product Hub Style) -->
<section class="stripe-gateways-section">
    <div class="container">
        <div class="section-heading" style="text-align: center; margin-bottom: 50px;">
            <p class="kicker" style="color: var(--green); border-color: var(--green); margin: 0 auto 10px;">University Portals</p>
            <h2 class="stripe-title stripe-title-green" style="font-size: clamp(34px, 5vw, 56px); margin: 0 auto; text-align: center;">University Gateways</h2>
        </div>
        
        <div class="stripe-gate-grid">
            <!-- Student Gateway -->
            <div class="stripe-gate-card reveal">
                <div class="stripe-gate-icon"><i class="fa fa-graduation-cap"></i></div>
                <h3>Student Gateway</h3>
                <p>Access your academic profile, pay fees online, register courses for the semester, view exam results, and manage your campus registry profile.</p>
                <a class="stripe-gate-link" href="page.php?slug=student-portal">Undergraduate Portal <i class="fa fa-chevron-right"></i></a>
                <a class="stripe-gate-link" href="page.php?slug=student-portal">Postgraduate School <i class="fa fa-chevron-right"></i></a>
                <a class="btn primary" href="page.php?slug=student-portal" style="margin-top: 10px; width: 100%;"><i class="fa fa-sign-in"></i> Student Login</a>
            </div>
            
            <!-- Staff Gateway -->
            <div class="stripe-gate-card reveal" style="transition-delay: 100ms;">
                <div class="stripe-gate-icon"><i class="fa fa-users"></i></div>
                <h3>Staff </h3>
                <p>Manage school duties, upload student results, register courses, access departmental files, and track semester timelines.</p>
                <a class="stripe-gate-link" href="page.php?slug=university-management">Staff Directory <i class="fa fa-chevron-right"></i></a>
                <!-- <a class="stripe-gate-link" href="admin/login.php">Administration Control <i class="fa fa-chevron-right"></i></a> -->
                <a class="btn outline" href="admin/login.php" style="margin-top: 10px; width: 100%; border-color: var(--green); color: var(--green-dark);"><i class="fa fa-lock"></i> Staff Portal</a>
            </div>
            
            <!-- Admissions & Info -->
            <div class="stripe-gate-card reveal" style="transition-delay: 200ms;">
                <div class="stripe-gate-icon"><i class="fa fa-globe"></i></div>
                <h3>Admissions & Info</h3>
                <p>Apply for undergraduate or postgraduate programmes, check screening updates, look up academic calendars, and explore college deans.</p>
                <a class="stripe-gate-link" href="page.php?slug=admissions">How to Apply <i class="fa fa-chevron-right"></i></a>
                <a class="stripe-gate-link" href="page.php?slug=admissions">Screening Checklist <i class="fa fa-chevron-right"></i></a>
                <a class="btn outline" href="page.php?slug=admissions" style="margin-top: 10px; width: 100%; border-color: var(--gold); color: var(--gold);"><i class="fa fa-info-circle"></i> View Admissions</a>
            </div>
        </div>
    </div>
</section>

<!-- Latest Campus Events & News Section -->
<section class="section">
    <div class="container">
        <div class="section-heading">
            <div>
                <p class="kicker" style="color: var(--green); border-color: var(--green);">Campus News</p>
                <h2 class="stripe-title stripe-title-green" style="font-size: 34px; margin-top: 10px;">News, Announcements, and Updates.</h2>
            </div>
            <a class="text-link" href="news.php" style="color: var(--green); font-weight: 700;">All News &amp; Events <i class="fa fa-angle-right"></i></a>
        </div>
        <div class="event-grid">
            <?php 
            $badges = ['Admissions', 'Academic', 'Research'];
            foreach (array_slice($site['notices'] ?? [], 0, 3) as $i => $notice): 
                $badge = $badges[$i % count($badges)];
            ?>
                <article class="event-card">
                    <a class="event-image" href="news-detail.php?id=<?= $i ?>">
                        <div class="event-badge" style="background: var(--green);"><?= e($badge) ?></div>
                        <img src="<?= e($eventImages[$i] ?? 'images/university/campus-hall.png') ?>" alt="<?= e($notice['title'] ?? 'Campus event') ?>">
                    </a>
                    <div class="event-body">
                        <h3><a href="news-detail.php?id=<?= $i ?>" style="color:inherit;text-decoration:none;"><?= e($notice['title'] ?? '') ?></a></h3>
                        <p><?= e(mb_strimwidth($notice['body'] ?? '', 0, 120, '…')) ?></p>
                        <div class="event-meta">
                            <time><i class="fa fa-calendar"></i> <?= e($notice['date'] ?? '') ?></time>
                            <a href="news-detail.php?id=<?= $i ?>" style="color: var(--green); font-weight: 700;">Read More <i class="fa fa-chevron-right"></i></a>
                        </div>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- JOSTUM At A Glance (Stripe Statistics style) -->
<section class="section band glance-band grid-pattern" style="background: linear-gradient(135deg, #071c14 0%, #052618 100%);">
    <div class="container">
        <div class="section-heading light">
            <div>
                <p class="kicker" style="color: var(--gold); border-color: var(--gold);">Platform Scale</p>
                <h2 class="stripe-title" style="font-size: clamp(34px, 4.5vw, 52px); margin-top: 10px;">JOSTUM At A Glance</h2>
            </div>
            <a class="text-link" href="page.php?slug=at-a-glance" style="color: var(--gold); font-weight: 700;">More Statistics <i class="fa fa-angle-right"></i></a>
        </div>
        
        <div class="stat-grid">
            <?php 
            $allStats = $site['stats'] ?? [];
            $allStats[] = ['label' => 'PG Students', 'value' => '2,337'];
            $allStats[] = ['label' => 'UG Students', 'value' => '20,509'];
            
            $statIcons = [
                'students' => 'fa-users',
                'academic staff' => 'fa-pencil-square-o',
                'staff' => 'fa-id-card-o',
                'professors' => 'fa-graduation-cap',
                'colleges' => 'fa-university',
                'departments' => 'fa-sitemap',
                'pg students' => 'fa-book',
                'ug students' => 'fa-user'
            ];
            
            foreach ($allStats as $stat):
                $labelLower = strtolower(trim($stat['label'] ?? ''));
                $icon = $statIcons[$labelLower] ?? 'fa-bar-chart';
            ?>
                <div class="stat" style="background: rgba(255, 255, 255, 0.05); border: 1px solid rgba(255, 255, 255, 0.1); border-radius: 16px; padding: 24px;">
                    <div class="stat-icon" style="background: rgba(212, 163, 43, 0.15); color: var(--gold);"><i class="fa <?= e($icon) ?>"></i></div>
                    <strong class="counter" data-count="<?= e(preg_replace('/[^0-9]/', '', $stat['value'] ?? '0')) ?>" style="color: #fff; text-shadow: 0 0 15px rgba(255,255,255,0.1);"><?= e($stat['value'] ?? '') ?></strong>
                    <span style="color: rgba(255, 255, 255, 0.7); font-weight: 500; font-size: 13.5px;"><?= e($stat['label'] ?? '') ?></span>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
