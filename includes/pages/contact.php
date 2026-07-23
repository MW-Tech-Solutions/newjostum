<?php
if (!defined('DATA_DIR')) { exit; }

$blocks = $page['blocks'] ?? [];
$cardsBlock = $blocks[0] ?? null;
?>
<div class="contact-page-wrapper">
    <div class="contact-split-grid" style="display: grid; grid-template-columns: 340px 1fr; gap: 30px; margin-bottom: 40px; align-items: start;">
        <!-- Official contact methods cards stack -->
        <div class="contact-cards-column" style="display: grid; gap: 20px;">
            <?php if ($cardsBlock): ?>
                <?php foreach (($cardsBlock['items'] ?? []) as $item): 
                    $label = $item['label'] ?? '';
                    $value = $item['value'] ?? '';
                    $text = $item['text'] ?? '';
                    
                    $icon = 'fa-envelope-o';
                    if (stripos($label, 'Phone') !== false) {
                        $icon = 'fa-phone';
                    } elseif (stripos($label, 'Office') !== false || stripos($label, 'Address') !== false) {
                        $icon = 'fa-map-marker';
                    }
                ?>
                    <div class="contact-info-card" style="background: #ffffff; border: 1px solid var(--line); border-radius: 12px; padding: 20px; box-shadow: var(--shadow-soft); display: flex; gap: 16px; align-items: center;">
                        <div class="contact-icon" style="width: 44px; height: 44px; border-radius: 50%; display: grid; place-items: center; font-size: 18px; background: var(--soft); color: var(--green); border: 1px solid var(--line); flex-shrink: 0;">
                            <i class="fa <?= $icon ?>"></i>
                        </div>
                        <div>
                            <span style="display: block; font-size: 10px; font-weight: 800; text-transform: uppercase; color: var(--gold); letter-spacing: 0.5px; margin-bottom: 2px;"><?= e($label) ?></span>
                            <strong style="display: block; font-size: 14.5px; color: var(--green-deep); word-break: break-all;"><?= e($value) ?></strong>
                            <?php if ($text): ?>
                                <span style="display: block; font-size: 12px; color: var(--muted); margin-top: 2px;"><?= e($text) ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>

        <!-- Simulated interactive Feedback/Support form -->
        <div class="contact-form-panel" style="background: #ffffff; border: 1px solid var(--line); border-radius: 18px; padding: 30px; box-shadow: var(--shadow-soft);">
            <h3 style="font-family: var(--serif); font-size: 20px; color: var(--green-deep); margin: 0 0 6px; font-weight: 800;">Send us a message</h3>
            <p style="font-size: 13.5px; color: var(--muted); margin-bottom: 24px;">Complete the form below to reach out to the university administration support desk.</p>
            
            <form action="#" method="POST" style="display: grid; gap: 16px;" onsubmit="event.preventDefault(); alert('Message sent successfully! Our desk will follow up.');">
                <div class="form-row" style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
                    <div class="form-group" style="display: flex; flex-direction: column; gap: 6px;">
                        <label style="font-size: 12px; font-weight: 750; color: var(--green-dark);">Full Name</label>
                        <input type="text" required placeholder="Mary Akume" style="padding: 10px 14px; border: 1px solid var(--line); border-radius: 8px; font-size: 14px; outline: none;">
                    </div>
                    <div class="form-group" style="display: flex; flex-direction: column; gap: 6px;">
                        <label style="font-size: 12px; font-weight: 750; color: var(--green-dark);">Email Address</label>
                        <input type="email" required placeholder="mary.akume@uam.edu.ng" style="padding: 10px 14px; border: 1px solid var(--line); border-radius: 8px; font-size: 14px; outline: none;">
                    </div>
                </div>
                
                <div class="form-group" style="display: flex; flex-direction: column; gap: 6px;">
                    <label style="font-size: 12px; font-weight: 750; color: var(--green-dark);">Subject / Topic</label>
                    <input type="text" required placeholder="Enquiry about admission tracks..." style="padding: 10px 14px; border: 1px solid var(--line); border-radius: 8px; font-size: 14px; outline: none;">
                </div>
                
                <div class="form-group" style="display: flex; flex-direction: column; gap: 6px;">
                    <label style="font-size: 12px; font-weight: 750; color: var(--green-dark);">Your Message</label>
                    <textarea required rows="4" placeholder="Type your message here..." style="padding: 10px 14px; border: 1px solid var(--line); border-radius: 8px; font-size: 14px; outline: none; resize: vertical;"></textarea>
                </div>
                
                <button type="submit" style="background: var(--green); color: #ffffff; border: 0; padding: 12px 24px; border-radius: 8px; font-weight: 800; font-size: 14px; cursor: pointer; justify-self: flex-start; transition: background 0.2s ease;">
                    <i class="fa fa-paper-plane"></i> Send Message
                </button>
            </form>
        </div>
    </div>
</div>
