<?php
if (!defined('DATA_DIR')) { exit; }

$blocks = $page['blocks'] ?? [];
$cardsBlock = $blocks[0] ?? null;
?>
<div class="portal-gateway-wrapper">
    <!-- Portal Status Bar -->
    <div class="portal-status-band" style="background: #ffffff; border: 1px solid var(--line); border-radius: 12px; padding: 14px 20px; box-shadow: var(--shadow-soft); display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
        <span style="font-size: 13.5px; font-weight: 700; color: var(--ink);">
            <i class="fa fa-info-circle" style="color: var(--green);"></i> Gateway Security: <strong>WAF Protected (SSL Active)</strong>
        </span>
        <div style="display: flex; gap: 14px;">
            <span class="badge status-full" style="font-size: 11px;"><i class="fa fa-circle"></i> Student Portal: ONLINE</span>
            <span class="badge status-full" style="font-size: 11px;"><i class="fa fa-circle"></i> Staff Portal: ONLINE</span>
        </div>
    </div>

    <!-- Portal Grid -->
    <div class="portal-gateway-grid" style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 24px; margin-bottom: 30px;">
        <?php if ($cardsBlock): ?>
            <?php foreach (($cardsBlock['items'] ?? []) as $item): 
                $label = $item['label'] ?? '';
                $value = $item['value'] ?? '';
                $text = $item['text'] ?? '';
                
                $icon = 'fa-sign-in';
                if (stripos($label, 'Post-UTME') !== false || stripos($label, 'Applicant') !== false) {
                    $icon = 'fa-file-text-o';
                } elseif (stripos($label, 'Staff') !== false) {
                    $icon = 'fa-lock';
                } elseif (stripos($label, 'LMS') !== false || stripos($label, 'Library') !== false || stripos($label, 'Alumni') !== false) {
                    $icon = 'fa-laptop';
                }

                // Determine target link based on the user requirement:
                // Students and Staff redirect to admin login panel.
                // Applicants/Admission redirect to page.php?slug=admissions.
                // Alumni/LMS/other redirect to 404.php.
                $linkHref = '404.php';
                if (stripos($label, 'Student') !== false) {
                    $linkHref = 'students/login.php';
                } elseif (stripos($label, 'Staff') !== false) {
                    $linkHref = 'staff/login.php';
                } elseif (stripos($label, 'Applicant') !== false || stripos($label, 'Post-UTME') !== false) {
                    $linkHref = 'page.php?slug=admissions';
                }
            ?>
                <div class="portal-card-item" style="background: #ffffff; border: 1px solid var(--line); border-radius: 16px; padding: 28px; box-shadow: var(--shadow-soft); display: flex; flex-direction: column; transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);">
                    <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 20px;">
                        <div class="portal-icon" style="width: 52px; height: 52px; border-radius: 12px; display: grid; place-items: center; font-size: 24px; background: var(--soft); color: var(--green); border: 1px solid var(--line);">
                            <i class="fa <?= $icon ?>"></i>
                        </div>
                        <?php if ($linkHref === '404.php'): ?>
                            <span class="badge status-empty" style="font-size: 9px; padding: 3px 6px; background: rgba(220,53,69,0.1); color: #dc3545; border: 1px solid rgba(220,53,69,0.2);">Offline</span>
                        <?php else: ?>
                            <span class="badge status-full" style="font-size: 9px; padding: 3px 6px;">Secure link</span>
                        <?php endif; ?>
                    </div>
                    
                    <h3 style="font-family: var(--serif); font-size: 20px; color: var(--green-deep); margin: 0 0 6px; font-weight: 800;"><?= e($label) ?></h3>
                    <span style="font-size: 12.5px; color: var(--gold); font-weight: 800; text-transform: uppercase; margin-bottom: 12px;"><?= e($value) ?></span>
                    <p style="font-size: 13.5px; color: var(--muted); line-height: 1.45; margin: 0 0 20px;"><?= e($text) ?></p>
                    
                    <a href="<?= $linkHref ?>" style="margin-top: auto; display: block; text-align: center; background: <?= $linkHref === '404.php' ? '#dc3545' : 'var(--green)' ?>; color: #ffffff; border: 0; padding: 12px; border-radius: 8px; font-weight: 750; font-size: 13.5px; text-decoration: none; transition: background 0.2s ease;">
                        <?php if ($linkHref === '404.php'): ?>
                            <i class="fa fa-exclamation-triangle"></i> Access Offline
                        <?php else: ?>
                            <i class="fa fa-external-link"></i> Launch Portal
                        <?php endif; ?>
                    </a>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>
