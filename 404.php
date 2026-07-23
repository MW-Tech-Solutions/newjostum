<?php
require __DIR__ . '/includes/functions.php';
$pageTitle = 'Page Not Found';
$activeSlug = '404';
require __DIR__ . '/includes/header.php';
?>

<div class="error-page-wrapper" style="min-height: 70vh; display: grid; place-items: center; padding: 60px 24px; background: radial-gradient(circle at 50% 30%, rgba(16, 138, 85, 0.05) 0%, transparent 70%);">
    <div class="error-container" style="max-width: 600px; text-align: center; width: 100%;">
        <!-- Large animated 404 block -->
        <div class="error-code-glowing" style="position: relative; display: inline-block; margin-bottom: 24px;">
            <h1 style="font-family: var(--serif); font-size: clamp(96px, 15vw, 160px); font-weight: 900; line-height: 1; color: var(--green-deep); margin: 0; background: linear-gradient(135deg, var(--green-deep) 30%, var(--gold) 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">404</h1>
            <div class="error-badge" style="position: absolute; bottom: 10px; right: -10px; background: #dc3545; color: #ffffff; padding: 6px 14px; border-radius: 50px; font-size: 11px; font-weight: 800; text-transform: uppercase; letter-spacing: 1px; box-shadow: 0 4px 12px rgba(220, 53, 69, 0.3);">
                <i class="fa fa-exclamation-triangle"></i> Access Offline
            </div>
        </div>

        <h2 style="font-family: var(--serif); font-size: 28px; color: var(--green-deep); margin: 0 0 12px; font-weight: 850;">Requested Portal Offline</h2>
        <p style="font-size: 15.5px; color: var(--muted); line-height: 1.6; margin: 0 0 32px;">The module you are looking for is currently offline for system maintenance or has been relocated to another secure server path.</p>

        <!-- Search Bar -->
        <div style="background: #ffffff; border: 1px solid var(--line); border-radius: 16px; padding: 6px; box-shadow: var(--shadow-soft); display: flex; gap: 10px; align-items: center; margin-bottom: 40px;">
            <i class="fa fa-search" style="color: var(--muted); margin-left: 16px; font-size: 16px;"></i>
            <form action="search.php" method="GET" style="display: flex; flex: 1; gap: 10px; margin: 0;">
                <input type="search" name="q" placeholder="Try searching e.g., 'admissions', 'history', 'staff'..." style="border: 0; outline: none; font-size: 14.5px; color: var(--ink); flex: 1; padding: 8px 0;">
                <button type="submit" style="background: var(--green); color: #ffffff; border: 0; padding: 10px 22px; border-radius: 10px; font-weight: 800; font-size: 13.5px; cursor: pointer; transition: background 0.2s ease;">Search</button>
            </form>
        </div>

        <!-- Suggestions Grid -->
        <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 16px; margin-bottom: 40px;">
            <a href="index.php" style="background: #ffffff; border: 1px solid var(--line); border-radius: 12px; padding: 20px 14px; text-decoration: none; display: flex; flex-direction: column; align-items: center; gap: 8px; transition: all 0.25s ease; box-shadow: var(--shadow-soft);" onmouseover="this.style.borderColor='var(--green)';this.style.transform='translateY(-2px)'" onmouseout="this.style.borderColor='var(--line)';this.style.transform='translateY(0)'">
                <i class="fa fa-home" style="color: var(--green); font-size: 20px;"></i>
                <span style="font-size: 13px; font-weight: 750; color: var(--green-deep);">Go Home</span>
            </a>
            <a href="page.php?slug=admissions" style="background: #ffffff; border: 1px solid var(--line); border-radius: 12px; padding: 20px 14px; text-decoration: none; display: flex; flex-direction: column; align-items: center; gap: 8px; transition: all 0.25s ease; box-shadow: var(--shadow-soft);" onmouseover="this.style.borderColor='var(--green)';this.style.transform='translateY(-2px)'" onmouseout="this.style.borderColor='var(--line)';this.style.transform='translateY(0)'">
                <i class="fa fa-file-text-o" style="color: var(--green); font-size: 20px;"></i>
                <span style="font-size: 13px; font-weight: 750; color: var(--green-deep);">Admissions</span>
            </a>
            <a href="page.php?slug=contact" style="background: #ffffff; border: 1px solid var(--line); border-radius: 12px; padding: 20px 14px; text-decoration: none; display: flex; flex-direction: column; align-items: center; gap: 8px; transition: all 0.25s ease; box-shadow: var(--shadow-soft);" onmouseover="this.style.borderColor='var(--green)';this.style.transform='translateY(-2px)'" onmouseout="this.style.borderColor='var(--line)';this.style.transform='translateY(0)'">
                <i class="fa fa-envelope-o" style="color: var(--green); font-size: 20px;"></i>
                <span style="font-size: 13px; font-weight: 750; color: var(--green-deep);">Support</span>
            </a>
        </div>
    </div>
</div>

<?php require __DIR__ . '/includes/footer.php'; ?>
