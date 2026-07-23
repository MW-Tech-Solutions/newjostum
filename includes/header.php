<?php
$site = site_data();
$settings = $site['settings'] ?? [];
$nav = $site['nav'] ?? [];
$activeSlug = $activeSlug ?? '';
$pageTitle = $pageTitle ?? ($settings['name'] ?? 'Home');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= e($pageTitle) ?> | <?= e($settings['short_name'] ?? 'JoSTUM') ?></title>
    <meta name="description" content="<?= e($settings['tagline'] ?? '') ?>">
    <link rel="shortcut icon" href="<?= e($settings['logo'] ?? 'images/docx/image1.jpeg') ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/font-awesome.css">
    <link rel="stylesheet" href="css/school-portal.css?v=1.0.6">
</head>
<body>
<div class="preloader" aria-hidden="true">
    <div class="preloader-mark">
        <span></span>
        <span></span>
        <span></span>
        <img src="<?= e($settings['logo'] ?? 'images/docx/image1.jpeg') ?>" alt="">
    </div>
</div>
<header class="site-header">
    <div class="top-strip">
        <div class="container top-strip-inner">
            <span><i class="fa fa-phone"></i> <?= e($settings['phone'] ?? '+234 704 366 7952') ?></span>
            <span><i class="fa fa-envelope-o"></i> <?= e($settings['email'] ?? 'info@uam.edu.ng') ?></span>
            <span><i class="fa fa-clock-o"></i> Mon - Fri: 8:00 - 16:00</span>
            <span class="top-social">
                <a class="portal-link" href="page.php?slug=student-portal"><i class="fa fa-sign-in"></i> Portal Login</a>
                <a href="#" aria-label="Facebook"><i class="fa fa-facebook"></i></a>
                <a href="#" aria-label="Instagram"><i class="fa fa-instagram"></i></a>
                <a href="#" aria-label="Telegram"><i class="fa fa-send"></i></a>
                <a href="#" aria-label="YouTube"><i class="fa fa-youtube-play"></i></a>
            </span>
        </div>
    </div>
    <div class="container nav-shell">
        <a class="brand" href="index.php">
            <img src="<?= e($settings['logo'] ?? 'images/university/jostum-logo.jpeg') ?>" alt="<?= e($settings['short_name'] ?? 'JoSTUM') ?> logo">
            <span><strong><?= e($settings['short_name'] ?? 'JoSTUM') ?></strong><small><?= e($settings['motto'] ?? 'Innovation and Service') ?></small></span>
        </a>
        <button class="nav-toggle" type="button" aria-label="Open navigation" aria-expanded="false" aria-controls="main-navigation">
            <i class="fa fa-bars"></i>
        </button>
        <nav class="nav-links" id="main-navigation" aria-label="Main navigation">
            <button class="drawer-close" type="button" aria-label="Close navigation"><i class="fa fa-times"></i></button>
            <?php foreach ($nav as $item): ?>
                <?php $href = $item['href'] ?? '#'; ?>
                <a class="<?= e(($item['slug'] ?? '') === $activeSlug ? 'active' : '') ?>" href="<?= e($href) ?>"><?= e($item['label'] ?? '') ?></a>
            <?php endforeach; ?>
        </nav>
    </div>
    <button class="drawer-scrim" type="button" aria-label="Close navigation"></button>
</header>
<main>
