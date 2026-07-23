<?php
if (!defined('DATA_DIR')) { exit; }

$blocks = $page['blocks'] ?? [];
$imageBlock = $blocks[0] ?? null;
$textBlock = $blocks[1] ?? null;
$listBlock = $blocks[2] ?? null;
?>
<div class="governing-council-wrapper">
    <!-- Chairperson / Pro-Chancellor Bio Split Panel -->
    <div class="pro-chancellor-panel" style="display: grid; grid-template-columns: 280px 1fr; gap: 30px; background: #ffffff; border: 1px solid var(--line); border-radius: 18px; padding: 30px; box-shadow: var(--shadow-soft); margin-bottom: 40px;">
        <?php if ($imageBlock): ?>
            <div class="pro-chancellor-media" style="text-align: center;">
                <img src="<?= e($imageBlock['src'] ?? '') ?>" alt="<?= e($imageBlock['caption'] ?? '') ?>" style="width: 100%; border-radius: 12px; box-shadow: var(--shadow); border: 4px solid #ffffff;">
                <span style="display: block; font-size: 13px; font-weight: 750; color: var(--green-dark); margin-top: 12px;"><?= e($imageBlock['caption'] ?? '') ?></span>
            </div>
        <?php endif; ?>
        
        <div class="pro-chancellor-bio">
            <span style="display: block; font-size: 11px; font-weight: 800; text-transform: uppercase; color: var(--gold); letter-spacing: 0.5px; margin-bottom: 6px;">Chairperson of Council</span>
            <h3 style="font-family: var(--serif); font-size: 26px; color: var(--green-deep); margin: 0 0 16px; font-weight: 850;">Pro-Chancellor Profile</h3>
            <?php if ($textBlock): ?>
                <div class="content-block" style="font-size: 14.5px; color: var(--muted); line-height: 1.55;">
                    <?php foreach (($textBlock['paragraphs'] ?? []) as $para): ?>
                        <p style="margin-bottom: 14px;"><?= e($para) ?></p>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- Council Membership List -->
    <?php if ($listBlock): ?>
        <div class="council-membership-card" style="background: #ffffff; border: 1px solid var(--line); border-radius: 18px; padding: 30px; box-shadow: var(--shadow-soft);">
            <h3 style="font-family: var(--serif); font-size: 22px; color: var(--green-deep); margin: 0 0 20px; font-weight: 800; border-bottom: 2px solid var(--gold); padding-bottom: 8px; display: inline-block;">
                Council Membership List
            </h3>
            
            <div class="membership-list-grid" style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 16px;">
                <?php foreach (($listBlock['items'] ?? []) as $item): 
                    $parts = explode(' - ', $item, 2);
                    $name = $parts[0] ?? '';
                    $role = $parts[1] ?? 'Council Member';
                ?>
                    <div class="membership-item-card" style="background: var(--soft); border: 1px solid var(--line); border-radius: 10px; padding: 14px 20px; display: flex; align-items: center; gap: 14px; transition: all 0.2s ease;">
                        <div class="member-avatar" style="width: 40px; height: 40px; border-radius: 50%; background: #ffffff; color: var(--green); display: grid; place-items: center; font-size: 18px; border: 1px solid var(--line);">
                            <i class="fa fa-user"></i>
                        </div>
                        <div>
                            <strong style="display: block; font-size: 14.5px; color: var(--ink);"><?= e($name) ?></strong>
                            <span style="font-size: 12px; color: var(--muted); font-weight: 700; text-transform: uppercase;"><?= e($role) ?></span>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endif; ?>
</div>
