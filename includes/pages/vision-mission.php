<?php
if (!defined('DATA_DIR')) { exit; }

$blocks = $page['blocks'] ?? [];
$cardsBlock = $blocks[0] ?? null;
$imageBlock = $blocks[1] ?? null;
?>
<div class="vision-mission-wrapper">
    <?php if ($cardsBlock): ?>
        <div class="vision-cards-grid" style="display: grid; gap: 24px; margin-bottom: 40px;">
            <?php foreach (($cardsBlock['items'] ?? []) as $i => $item): 
                $label = $item['label'] ?? '';
                $value = $item['value'] ?? '';
                $text = $item['text'] ?? '';
                
                $icon = 'fa-lightbulb-o';
                $cardClass = 'vision-card';
                if (stripos($label, 'Mission') !== false) {
                    $icon = 'fa-bullseye';
                    $cardClass = 'mission-card';
                } elseif (stripos($label, 'Values') !== false) {
                    $icon = 'fa-handshake-o';
                    $cardClass = 'values-card';
                }
            ?>
                <div class="card-item <?= $cardClass ?>" style="background: #ffffff; border: 1px solid var(--line); border-radius: 18px; padding: 30px; box-shadow: var(--shadow-soft); display: flex; gap: 24px; transition: all 0.3s ease;">
                    <div class="vision-icon-wrap" style="width: 56px; height: 56px; border-radius: 50%; display: grid; place-items: center; font-size: 24px; flex-shrink: 0; background: var(--soft); color: var(--green);">
                        <i class="fa <?= $icon ?>"></i>
                    </div>
                    <div>
                        <span style="display: block; font-size: 11px; font-weight: 800; text-transform: uppercase; color: var(--gold); letter-spacing: 0.5px; margin-bottom: 4px;"><?= e($label) ?></span>
                        <h3 style="font-family: var(--serif); font-size: 22px; color: var(--green-deep); margin: 0 0 12px; font-weight: 800;"><?= e($value) ?></h3>
                        <?php if ($text): ?>
                            <p style="font-size: 14.5px; color: var(--muted); line-height: 1.5; margin: 0;"><?= e($text) ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <?php if ($imageBlock): ?>
        <figure class="page-figure">
            <img src="<?= e($imageBlock['src'] ?? '') ?>" alt="<?= e($imageBlock['caption'] ?? '') ?>">
            <figcaption><i class="fa fa-camera"></i> <?= e($imageBlock['caption'] ?? '') ?></figcaption>
        </figure>
    <?php endif; ?>
</div>
