<?php
require_once __DIR__ . '/../includes/functions.php';

function admin_header(string $title): void
{
    require_admin();
    $flash = admin_flash();
    $currentPage = basename($_SERVER['SCRIPT_NAME']);
    $site = read_json('site.json', []);
    $adminName = $site['settings']['short_name'] ?? 'JoSTUM';
    
    echo '<!doctype html><html lang="en"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1"><title>' . e($title) . ' | Admin</title>';
    echo '<link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>';
    echo '<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Playfair+Display:wght@400;700;800;900&display=swap" rel="stylesheet">';
    echo '<link rel="stylesheet" href="../css/font-awesome.css"><link rel="stylesheet" href="../css/school-portal.css?v=1.0.6"></head><body class="admin-shell">';
    
    // ===== SIDEBAR =====
    echo '<aside class="admin-sidebar">';
    // Brand
    echo '<a class="admin-brand" href="index.php"><div class="admin-brand-icon"><img src="../images/docx/image1.jpeg" alt="' . e($adminName) . '"></div><span><strong>' . e($adminName) . '</strong><small>Admin Console</small></span></a>';
    
    // Navigation groups
    $navGroups = [
        'Main' => [
            ['href' => 'index.php', 'icon' => 'fa-dashboard', 'label' => 'Dashboard'],
        ],
        'Content' => [
            ['href' => 'pages.php', 'icon' => 'fa-file-text-o', 'label' => 'Pages'],
            ['href' => 'notices.php', 'icon' => 'fa-bullhorn', 'label' => 'Notices'],
            ['href' => 'gallery.php', 'icon' => 'fa-picture-o', 'label' => 'Gallery'],
            ['href' => 'charts.php', 'icon' => 'fa-bar-chart', 'label' => 'Charts'],
        ],
        'System' => [
            ['href' => 'settings.php', 'icon' => 'fa-cog', 'label' => 'Settings'],
            ['href' => '../index.php', 'icon' => 'fa-external-link', 'label' => 'View Site'],
            ['href' => 'logout.php', 'icon' => 'fa-sign-out', 'label' => 'Logout'],
        ],
    ];
    
    echo '<nav class="admin-side-nav">';
    foreach ($navGroups as $groupName => $items) {
        echo '<div class="nav-group-label">' . e($groupName) . '</div>';
        foreach ($items as $item) {
            $isActive = ($currentPage === $item['href']) ? ' active' : '';
            echo '<a href="' . e($item['href']) . '" class="' . $isActive . '"><span><i class="fa ' . e($item['icon']) . '"></i></span>' . e($item['label']) . '</a>';
        }
    }
    echo '</nav>';
    
    // Bottom admin profile
    echo '<div class="admin-sidebar-footer">';
    echo '<div class="admin-avatar-row"><div class="admin-avatar"><i class="fa fa-user"></i></div><div><strong>Administrator</strong><small>Super Admin</small></div></div>';
    echo '<div class="admin-version">v2.0 · JoSTUM CMS</div>';
    echo '</div>';
    echo '</aside>';
    
    // ===== MAIN AREA =====
    echo '<main class="admin-main">';
    
    // Topbar
    echo '<header class="admin-topbar">';
    echo '<div class="admin-topbar-left">';
    echo '<button class="admin-menu-toggle" onclick="document.querySelector(\'.admin-sidebar\').classList.toggle(\'open\')"><i class="fa fa-bars"></i></button>';
    echo '<div class="admin-breadcrumb"><span><i class="fa fa-home"></i> Admin</span> <i class="fa fa-angle-right"></i> <span class="current">' . e($title) . '</span></div>';
    echo '</div>';
    echo '<div class="admin-topbar-right">';
    echo '<span class="admin-topbar-date"><i class="fa fa-calendar"></i> ' . date('D, M j, Y') . '</span>';
    echo '<a class="admin-topbar-btn" href="../index.php" title="View site"><i class="fa fa-external-link"></i></a>';
    echo '<div class="admin-topbar-avatar"><i class="fa fa-user"></i></div>';
    echo '</div>';
    echo '</header>';
    
    // Content area
    echo '<section class="admin-panel">';
    if ($flash) {
        echo '<div class="flash"><i class="fa fa-check-circle"></i> ' . e($flash) . '</div>';
    }
}

function admin_footer(): void
{
    echo '</section>';
    echo '<footer class="admin-content-footer"><p>© ' . date('Y') . ' JoSTUM Admin Console · All rights reserved</p></footer>';
    echo '</main></body></html>';
}

function load_site_for_admin(): array
{
    return read_json('site.json', []);
}

function save_site_for_admin(array $site): void
{
    write_json('site.json', $site);
}
?>
