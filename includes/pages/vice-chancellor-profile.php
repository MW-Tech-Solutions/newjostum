<?php
if (!defined('DATA_DIR')) { exit; }

$vcImgSrc = $page['hero_image'] ?? 'images/university/vice-chancellor.jpeg';
$vcName = $page['heading'] ?? $page['title'] ?? 'Professor Isaac Nathaniel Itodo';

// Get all paragraphs from all text blocks
$paragraphs = [];
foreach (($page['blocks'] ?? []) as $block) {
    if (($block['type'] ?? '') === 'text') {
        $paragraphs = array_merge($paragraphs, $block['paragraphs'] ?? []);
    }
}
?>
<style>
.vc-newspaper-layout {
    background: #ffffff;
    border: 1px solid var(--line);
    border-radius: 18px;
    padding: 40px;
    box-shadow: var(--shadow-soft);
    overflow: hidden;
}
.vc-newspaper-portrait {
    float: left;
    width: 320px;
    margin-right: 32px;
    margin-bottom: 24px;
    text-align: center;
}
.vc-newspaper-avatar-wrapper {
    border-radius: 16px;
    overflow: hidden;
    box-shadow: var(--shadow);
    border: 6px solid #ffffff;
    background: var(--soft);
    margin-bottom: 16px;
}
.vc-newspaper-portrait img {
    width: 100%;
    display: block;
    filter: contrast(1.05);
}
.vc-newspaper-content {
    font-size: 15px;
    color: var(--muted);
    line-height: 1.6;
    text-align: justify;
}
.vc-newspaper-content p {
    margin-bottom: 16px;
}
.vc-newspaper-content p:first-of-type {
    font-size: 16.5px;
    font-weight: 600;
    color: var(--ink);
    line-height: 1.6;
}

@media (max-width: 768px) {
    .vc-newspaper-portrait {
        float: none;
        width: 100%;
        max-width: 320px;
        margin: 0 auto 24px auto;
    }
    .vc-newspaper-layout {
        padding: 24px;
    }
}
</style>

<div class="vc-profile-wrapper">
    <div class="vc-newspaper-layout">
        <!-- Floated portrait panel -->
        <div class="vc-newspaper-portrait">
            <div class="vc-newspaper-avatar-wrapper">
                <img src="<?= e($vcImgSrc) ?>" alt="<?= e($vcName) ?>">
            </div>
            <h4 style="font-family: var(--serif); font-size: 18px; color: var(--green-deep); margin: 0 0 6px; font-weight: 800;"><?= e($vcName) ?></h4>
            <span style="font-size: 11px; font-weight: 800; text-transform: uppercase; color: var(--gold); letter-spacing: 0.5px;">Vice Chancellor, JoSTUM</span>
        </div>
        
        <!-- Newspaper flowing content -->
        <div class="vc-newspaper-content">
            <span style="display: block; font-size: 11px; font-weight: 800; text-transform: uppercase; color: var(--gold); letter-spacing: 0.5px; margin-bottom: 6px;">Office of the Vice Chancellor</span>
            <h3 style="font-family: var(--serif); font-size: 32px; color: var(--green-deep); margin: 0 0 8px; font-weight: 850; line-height: 1.2;">Biography & Leadership Profile</h3>
            <p style="font-size: 14px; font-weight: 600; color: var(--gold); text-transform: uppercase; letter-spacing: 0.5px; margin-top: 0; margin-bottom: 24px; border-bottom: 2px solid var(--gold); padding-bottom: 12px; display: inline-block;">Professor Isaac Nathaniel Itodo</p>
            
            <?php if (!empty($paragraphs)): ?>
                <?php foreach ($paragraphs as $i => $para): ?>
                    <p><?= e($para) ?></p>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</div>
