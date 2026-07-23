<?php
if (!defined('DATA_DIR')) { exit; }

$blocks = $page['blocks'] ?? [];
$textBlock = $blocks[0] ?? null;
?>
<div class="anthem-page-wrapper" style="background: #ffffff; border: 1px solid var(--line); border-radius: 18px; padding: 40px; box-shadow: var(--shadow-soft); text-align: center;">
    <div class="anthem-header-badge" style="display: inline-block; background: rgba(212, 163, 43, 0.12); color: var(--gold); padding: 8px 18px; border-radius: 50px; font-size: 11px; font-weight: 800; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 24px;">
        <i class="fa fa-music"></i> Official University Anthem
    </div>
    
    <div class="anthem-content-box" style="max-width: 600px; margin: 0 auto; font-family: var(--serif); font-size: 18px; line-height: 1.8; color: var(--ink); font-style: italic;">
        <?php if ($textBlock): ?>
            <?php foreach (($textBlock['paragraphs'] ?? []) as $para): ?>
                <p style="margin-bottom: 24px; white-space: pre-line;"><?= e($para) ?></p>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>

    <!-- Interactive Audio simulation -->
    <div class="anthem-player-panel" style="margin-top: 40px; border-top: 1px solid var(--line); padding-top: 30px; display: flex; flex-direction: column; align-items: center; gap: 14px;">
        <span style="font-size: 12px; color: var(--muted); font-weight: 700; text-transform: uppercase;">Simulated Media Player</span>
        <div class="audio-control-bar" style="display: flex; align-items: center; gap: 16px; background: var(--soft); padding: 10px 24px; border-radius: 50px; border: 1px solid var(--line); min-width: 280px;">
            <button type="button" class="play-btn" style="background: var(--green); border: 0; color: #ffffff; width: 36px; height: 36px; border-radius: 50%; display: grid; place-items: center; cursor: pointer; outline: none; font-size: 14px;">
                <i class="fa fa-play"></i>
            </button>
            <div class="timeline-bar" style="flex: 1; height: 4px; background: rgba(0,0,0,0.08); border-radius: 2px; position: relative; min-width: 140px;">
                <div class="progress-bar" style="position: absolute; left: 0; top: 0; bottom: 0; width: 0; background: var(--green); border-radius: 2px;"></div>
            </div>
            <span class="audio-time" style="font-size: 12px; color: var(--muted); font-weight: 700;">0:00 / 1:45</span>
        </div>
    </div>
</div>
