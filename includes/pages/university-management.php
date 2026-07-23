<?php
if (!defined('DATA_DIR')) { exit; }

$blocks = $page['blocks'] ?? [];
$listBlock = $blocks[0] ?? null;
?>
<div class="university-management-wrapper">
    <div class="management-grid" style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 24px;">
        <?php if ($listBlock): ?>
            <?php foreach (($listBlock['items'] ?? []) as $item): 
                $parts = explode(' - ', $item, 2);
                $name = $parts[0] ?? '';
                $office = $parts[1] ?? 'Principal Officer';
                
                $icon = 'fa-user-circle';
                $email = strtolower(str_replace(['.', ' ', ','], '', $name)) . '@uam.edu.ng';
            ?>
                <div class="management-card" style="background: #ffffff; border: 1px solid var(--line); border-radius: 16px; padding: 24px; box-shadow: var(--shadow-soft); display: flex; gap: 20px; transition: all 0.25s ease; align-items: center;">
                    <div class="officer-avatar-wrapper" style="width: 64px; height: 64px; border-radius: 50%; display: grid; place-items: center; font-size: 32px; background: var(--soft); color: var(--green); flex-shrink: 0; border: 1px solid var(--line);">
                        <i class="fa <?= $icon ?>"></i>
                    </div>
                    
                    <div class="officer-details" style="flex: 1;">
                        <span style="display: block; font-size: 11px; font-weight: 850; text-transform: uppercase; color: var(--gold); letter-spacing: 0.5px; margin-bottom: 4px;"><?= e($office) ?></span>
                        <h4 style="font-size: 16px; font-weight: 800; color: var(--green-deep); margin: 0 0 8px;"><?= e($name) ?></h4>
                        
                        <div class="officer-contact" style="display: flex; gap: 14px; border-top: 1px solid var(--line); padding-top: 8px; margin-top: 4px;">
                            <a href="mailto:<?= $email ?>" style="font-size: 12.5px; color: var(--muted); text-decoration: none; display: flex; align-items: center; gap: 6px; font-weight: 650; transition: color 0.2s ease;">
                                <i class="fa fa-envelope-o" style="color: var(--green);"></i> Email Office
                            </a>
                            <span style="font-size: 12.5px; color: var(--muted); display: flex; align-items: center; gap: 6px; font-weight: 650;">
                                <i class="fa fa-building-o" style="color: var(--gold);"></i> Admin Block
                            </span>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>
