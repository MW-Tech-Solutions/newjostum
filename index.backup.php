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

<!-- Hero Banner Section -->
<section class="hero slider-hero">
    <div class="hero-slider">
        <!-- Slide 1 -->
        <div class="hero-slide active" data-slide="0">
            <div class="hero-media"><img src="images/docx/image9.png" alt="University Gate"></div>
            <div class="container hero-content">
                <p class="kicker">Innovation and Service</p>
                <h1>Joseph Sarwuan Tarka University, Makurdi</h1>
                <p>A dynamic university portal for academics, administration, research, admissions, students, charts, and institutional records.</p>
                
                <!-- Institutional search directly inside Hero -->
                <div class="hero-search-container">
                    <form class="hero-search-form" action="search.php" method="get">
                        <input type="search" name="q" placeholder="Search programmes, colleges, calendars, portals..." required>
                        <button type="submit"><i class="fa fa-search"></i> Search Portal</button>
                    </form>
                </div>

                <div class="hero-actions">
                    <a class="btn primary" href="page.php?slug=student-portal"><i class="fa fa-sign-in"></i> Student Portal</a>
                    <a class="btn secondary" href="page.php?slug=admissions"><i class="fa fa-graduation-cap"></i> Check Admissions</a>
                </div>
            </div>
        </div>

        <!-- Slide 2 -->
        <div class="hero-slide" data-slide="1">
            <div class="hero-media"><img src="images/docx/image14.png" alt="Senate Building"></div>
            <div class="container hero-content">
                <p class="kicker">Academic Excellence</p>
                <h1>Empowering Creative & Innovative Minds</h1>
                <p>Fostering a world-class environment for research-oriented training, human resource development, and sustainable national growth.</p>
                
                <!-- Institutional search directly inside Hero -->
                <div class="hero-search-container">
                    <form class="hero-search-form" action="search.php" method="get">
                        <input type="search" name="q" placeholder="Search programmes, colleges, calendars, portals..." required>
                        <button type="submit"><i class="fa fa-search"></i> Search Portal</button>
                    </form>
                </div>

                <div class="hero-actions">
                    <a class="btn primary" href="page.php?slug=student-portal"><i class="fa fa-sign-in"></i> Student Portal</a>
                    <a class="btn secondary" href="page.php?slug=admissions"><i class="fa fa-graduation-cap"></i> Check Admissions</a>
                </div>
            </div>
        </div>

        <!-- Slide 3 -->
        <div class="hero-slide" data-slide="2">
            <div class="hero-media"><img src="images/docx/image27.png" alt="Solar campus installation"></div>
            <div class="container hero-content">
                <p class="kicker">Sustainable Research</p>
                <h1>Pioneering Green Technology & Farming</h1>
                <p>Empowering the next generation with advanced research in agriculture, clean energy, engineering, and digital tools.</p>
                
                <!-- Institutional search directly inside Hero -->
                <div class="hero-search-container">
                    <form class="hero-search-form" action="search.php" method="get">
                        <input type="search" name="q" placeholder="Search programmes, colleges, calendars, portals..." required>
                        <button type="submit"><i class="fa fa-search"></i> Search Portal</button>
                    </form>
                </div>

                <div class="hero-actions">
                    <a class="btn primary" href="page.php?slug=student-portal"><i class="fa fa-sign-in"></i> Student Portal</a>
                    <a class="btn secondary" href="page.php?slug=admissions"><i class="fa fa-graduation-cap"></i> Check Admissions</a>
                </div>
            </div>
        </div>
    </div>

    <div class="hero-pager" aria-label="Slider navigation">
        <span class="pager-dot active" data-goto="0">01</span>
        <span class="pager-dot" data-goto="1">02</span>
        <span class="pager-dot" data-goto="2">03</span>
    </div>
</section>

<!-- Floating Popular Links Panel -->
<section class="quick-routes" aria-label="Popular links">
    <div class="container quick-routes-inner">
        <a href="page.php?slug=admissions">
            <i class="fa fa-check-square-o"></i>
            <div>
                <strong>Admission Status</strong>
                <span style="display:block; font-size:12px; font-weight:400; color:var(--muted); margin-top:2px;">Check entry & screening list</span>
            </div>
        </a>
        <a href="page.php?slug=colleges">
            <i class="fa fa-university"></i>
            <div>
                <strong>Colleges & Departments</strong>
                <span style="display:block; font-size:12px; font-weight:400; color:var(--muted); margin-top:2px;">Explore academic programs</span>
            </div>
        </a>
        <a href="page.php?slug=student-portal">
            <i class="fa fa-user-circle"></i>
            <div>
                <strong>Students Hub</strong>
                <span style="display:block; font-size:12px; font-weight:400; color:var(--muted); margin-top:2px;">Access courses & dashboard</span>
            </div>
        </a>
        <a href="charts.php">
            <i class="fa fa-bar-chart"></i>
            <div>
                <strong>Ranking & Stats</strong>
                <span style="display:block; font-size:12px; font-weight:400; color:var(--muted); margin-top:2px;">Interactive portal charts</span>
            </div>
        </a>
    </div>
</section>

<!-- Vice Chancellor Welcome Section -->
<?php
$vcProfilePage = page_by_slug('vice-chancellor-welcome') ?? [];
$vcImgSrc = $vcProfilePage['hero_image'] ?? 'images/university/vice-chancellor.jpeg';
$vcName = $vcProfilePage['heading'] ?? $vcProfilePage['title'] ?? 'Professor Isaac Nathaniel Itodo';

$vcParagraphs = [];
foreach (($vcProfilePage['blocks'] ?? []) as $block) {
    if (($block['type'] ?? '') === 'text') {
        $vcParagraphs = array_merge($vcParagraphs, $block['paragraphs'] ?? []);
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
<section class="section">
    <div class="container vc-welcome">
        <div class="vc-portrait-wrapper">
            <div class="vc-portrait">
                <img src="<?= e($vcImgSrc) ?>" alt="<?= e($vcName) ?>">
            </div>
        </div>
        <div class="vc-copy">
            <p class="kicker">Office of the Vice Chancellor</p>
            <h2>Welcome to Joseph Sarwuan Tarka University, Makurdi</h2>
            <p class="drop-cap"><?= e($vcLeadParagraph) ?></p>
            <?php if (!empty($vcQuoteParagraph)): ?>
                <div class="vc-quote">
                    <i class="fa fa-quote-left"></i>
                    <p><?= e($vcQuoteParagraph) ?></p>
                </div>
            <?php endif; ?>
            <!-- Other paragraphs if edited -->
            <?php for ($i = 2; $i < count($vcParagraphs); $i++): ?>
                <p style="margin-top: 14px; color: var(--muted);"><?= e($vcParagraphs[$i]) ?></p>
            <?php endfor; ?>
            <div class="vc-signature-block">
                <div class="vc-signature-sig"><?= e(str_replace('Professor', 'Prof.', explode(',', $vcName)[0])) ?></div>
                <div class="vc-signature-details">
                    <strong><?= e($vcName) ?></strong>
                    <span>Vice Chancellor, JOSTUM</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Enterprise Gateways Hub -->
<section class="section soft">
    <div class="container">
        <div class="section-heading">
            <div>
                <p class="kicker">University Portals</p>
                <h2>Enterprise Gateways Hub</h2>
            </div>
        </div>
        <div class="gateways-grid">
            <!-- Student Gateway -->
            <div class="gateway-card">
                <div class="gateway-header">
                    <div class="gateway-icon"><i class="fa fa-graduation-cap"></i></div>
                    <h3>Student Gateway</h3>
                </div>
                <p>Access your academic profile, pay fees online, register courses for the semester, view exam results, and manage your campus registry profile.</p>
                <ul class="gateway-links">
                    <li><a href="page.php?slug=student-portal"><i class="fa fa-chevron-right"></i> Undergraduate Portal</a></li>
                    <li><a href="page.php?slug=student-portal"><i class="fa fa-chevron-right"></i> Postgraduate School</a></li>
                    <li><a href="page.php?slug=student-portal"><i class="fa fa-chevron-right"></i> Course Registration</a></li>
                </ul>
                <a class="btn primary gateway-action" href="page.php?slug=student-portal"><i class="fa fa-sign-in"></i> Student Login</a>
            </div>
            
            <!-- Staff Gateway -->
            <div class="gateway-card">
                <div class="gateway-header">
                    <div class="gateway-icon"><i class="fa fa-users"></i></div>
                    <h3>Staff & Admin</h3>
                </div>
                <p>Manage administrative duties, upload student results, register courses, access departmental files, and track semester timelines.</p>
                <ul class="gateway-links">
                    <li><a href="page.php?slug=university-management"><i class="fa fa-chevron-right"></i> Staff Directory</a></li>
                    <li><a href="admin/login.php"><i class="fa fa-chevron-right"></i> Administration Control</a></li>
                    <li><a href="page.php?slug=university-management"><i class="fa fa-chevron-right"></i> Academic Registry</a></li>
                </ul>
                <a class="btn outline gateway-action" href="admin/login.php"><i class="fa fa-lock"></i> Admin Portal</a>
            </div>
            
            <!-- Admissions & Info -->
            <div class="gateway-card">
                <div class="gateway-header">
                    <div class="gateway-icon"><i class="fa fa-globe"></i></div>
                    <h3>Admissions & Info</h3>
                </div>
                <p>Apply for undergraduate or postgraduate programmes, check screening updates, look up academic calendars, and explore college deans.</p>
                <ul class="gateway-links">
                    <li><a href="page.php?slug=admissions"><i class="fa fa-chevron-right"></i> How to Apply</a></li>
                    <li><a href="page.php?slug=admissions"><i class="fa fa-chevron-right"></i> Screening Checklist</a></li>
                    <li><a href="page.php?slug=contact"><i class="fa fa-chevron-right"></i> General Inquiries</a></li>
                </ul>
                <a class="btn outline gateway-action" href="page.php?slug=admissions"><i class="fa fa-info-circle"></i> View Admissions</a>
            </div>
        </div>
    </div>
</section>

<!-- Latest Campus Events & News Section -->
<section class="section">
    <div class="container">
        <div class="section-heading">
            <div>
                <p class="kicker">Campus News</p>
                <h2>News, announcements, and updates.</h2>
            </div>
            <a class="text-link" href="page.php?slug=news">All News & Events <i class="fa fa-angle-right"></i></a>
        </div>
        <div class="event-grid">
            <?php 
            $badges = ['Admissions', 'Academic', 'Research'];
            foreach (array_slice($site['notices'] ?? [], 0, 3) as $i => $notice): 
                $badge = $badges[$i % count($badges)];
            ?>
                <article class="event-card">
                    <a class="event-image" href="page.php?slug=student-portal">
                        <div class="event-badge"><?= e($badge) ?></div>
                        <img src="<?= e($eventImages[$i] ?? 'images/university/campus-hall.png') ?>" alt="<?= e($notice['title'] ?? 'Campus event') ?>">
                    </a>
                    <div class="event-body">
                        <h3><?= e($notice['title'] ?? '') ?></h3>
                        <p><?= e($notice['body'] ?? '') ?></p>
                        <div class="event-meta">
                            <time><i class="fa fa-calendar"></i> <?= e($notice['date'] ?? '') ?></time>
                            <a href="page.php?slug=student-portal">Details <i class="fa fa-chevron-right"></i></a>
                        </div>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- JOSTUM At A Glance (Stats Grid) -->
<section class="section band glance-band grid-pattern">
    <div class="container">
        <div class="section-heading light">
            <div>
                <p class="kicker">Institutional Data</p>
                <h2>JOSTUM At A Glance</h2>
            </div>
            <a class="text-link" href="page.php?slug=at-a-glance">More Statistics <i class="fa fa-angle-right"></i></a>
        </div>
        <div class="stat-grid">
            <?php 
            $allStats = $site['stats'] ?? [];
            // Add the other 2 stats to the array
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
                <div class="stat">
                    <div class="stat-icon"><i class="fa <?= e($icon) ?>"></i></div>
                    <strong class="counter" data-count="<?= e(preg_replace('/[^0-9]/', '', $stat['value'] ?? '0')) ?>"><?= e($stat['value'] ?? '') ?></strong>
                    <span><?= e($stat['label'] ?? '') ?></span>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
