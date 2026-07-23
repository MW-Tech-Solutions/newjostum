<?php
if (!defined('DATA_DIR')) { exit; }

$blocks = $page['blocks'] ?? [];
$listBlock = $blocks[0] ?? null;
?>
<div class="endowment-board-wrapper" style="background: #ffffff; border: 1px solid var(--line); border-radius: 18px; padding: 40px; box-shadow: var(--shadow-soft);">
    <h3 style="font-family: var(--serif); font-size: 24px; color: var(--green-deep); margin: 0 0 24px; font-weight: 850; border-bottom: 2px solid var(--gold); padding-bottom: 10px; display: inline-block;">Board of Trustees Membership</h3>
    
    <div class="board-members-grid" style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 20px;">
        <?php if ($listBlock): ?>
            <?php foreach (($listBlock['items'] ?? []) as $item): 
                $parts = explode(' - ', $item, 2);
                $name = $parts[0] ?? '';
                $role = $parts[1] ?? 'Trustee / Member';
            ?>
                <div class="board-member-card" style="background: var(--soft); border: 1px solid var(--line); border-radius: 12px; padding: 16px 20px; display: flex; align-items: center; gap: 16px; transition: all 0.2s ease;">
                    <div class="member-icon-circle" style="width: 44px; height: 44px; border-radius: 50%; background: #ffffff; color: var(--green); display: grid; place-items: center; font-size: 20px; border: 1px solid var(--line);">
                        <i class="fa fa-shield"></i>
                    </div>
                    <div>
                        <strong style="display: block; font-size: 15px; color: var(--ink);"><?= e($name) ?></strong>
                        <span style="font-size: 12px; color: var(--muted); font-weight: 700; text-transform: uppercase;"><?= e($role) ?></span>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>
