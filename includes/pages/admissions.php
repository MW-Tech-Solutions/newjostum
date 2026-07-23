<?php
if (!defined('DATA_DIR')) { exit; }

$blocks = $page['blocks'] ?? [];
$cardsBlock = $blocks[0] ?? null;
?>
<div class="admissions-wrapper">
    <div class="admissions-track-grid" style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 24px;">
        <?php if ($cardsBlock): ?>
            <?php foreach (($cardsBlock['items'] ?? []) as $item): 
                $label = $item['label'] ?? '';
                $value = $item['value'] ?? '';
                $text = $item['text'] ?? '';
                
                $icon = 'fa-file-text-o';
                if (stripos($label, 'Direct Entry') !== false) {
                    $icon = 'fa-exchange';
                } elseif (stripos($label, 'Postgraduate') !== false) {
                    $icon = 'fa-graduation-cap';
                }
            ?>
                <div class="admission-card" style="background: #ffffff; border: 1px solid var(--line); border-radius: 16px; padding: 24px; box-shadow: var(--shadow-soft); display: flex; flex-direction: column; transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);">
                    <div class="admission-card-icon" style="width: 48px; height: 48px; border-radius: 50%; display: grid; place-items: center; font-size: 20px; background: var(--soft); color: var(--green); margin-bottom: 20px;">
                        <i class="fa <?= $icon ?>"></i>
                    </div>
                    
                    <h3 style="font-family: var(--serif); font-size: 18px; color: var(--green-deep); margin: 0 0 6px; font-weight: 800;"><?= e($label) ?></h3>
                    <span style="font-size: 12px; color: var(--gold); font-weight: 800; text-transform: uppercase; margin-bottom: 12px;"><?= e($value) ?></span>
                    <p style="font-size: 13.5px; color: var(--muted); line-height: 1.45; margin: 0 0 20px;"><?= e($text) ?></p>
                    
                    <a href="page.php?slug=student-portal" style="margin-top: auto; display: block; text-align: center; background: var(--green); color: #ffffff; border: 0; padding: 10px; border-radius: 6px; font-weight: 750; font-size: 13px; text-decoration: none; transition: background 0.2s ease;">
                        Apply Now
                    </a>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>
