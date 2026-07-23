<?php
if (!defined('DATA_DIR')) { exit; }

// Initialize session if not active
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

$allDirectorates = read_json('directorates.json', []);
if (empty($allDirectorates)) {
    $allDirectorates = [];
}

$academic = array_filter($allDirectorates, fn($d) => ($d['type'] ?? '') === 'academic');
$non_academic = array_filter($allDirectorates, fn($d) => ($d['type'] ?? '') === 'non-academic');

// Sort by SNo
usort($academic, fn($a, $b) => ($a['sno'] ?? 0) <=> ($b['sno'] ?? 0));
usort($non_academic, fn($a, $b) => ($a['sno'] ?? 0) <=> ($b['sno'] ?? 0));

$id = preg_replace('/[^a-z0-9-]/', '', $_GET['id'] ?? '');
$action = $_GET['action'] ?? '';

$selectedDir = $allDirectorates[$id] ?? null;

// Handle Form Submissions (Login and Dashboard Updates)
$errorMsg = '';
$successMsg = '';

if ($selectedDir) {
    // 1. Handle Login POST
    if ($action === 'login' && $_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = trim($_POST['username'] ?? '');
        $password = trim($_POST['password'] ?? '');
        
        if ($username === $id && $password === 'director123') {
            $_SESSION['directorate_logged_in'] = $id;
            header("Location: page.php?slug=directorates&action=dashboard&id={$id}");
            exit;
        } else {
            $errorMsg = 'Invalid username or password. (Hint: username is "' . $id . '", password is "director123")';
        }
    }
    
    // 2. Handle Dashboard Updates POST
    if ($action === 'dashboard' && $_SERVER['REQUEST_METHOD'] === 'POST') {
        // Auth check
        if (($_SESSION['directorate_logged_in'] ?? '') !== $id) {
            header("Location: page.php?slug=directorates&action=login&id={$id}");
            exit;
        }
        
        // Save fields
        $selectedDir['director'] = trim($_POST['director'] ?? '');
        if ($selectedDir['type'] === 'academic') {
            $selectedDir['deputy'] = trim($_POST['deputy'] ?? '');
        }
        $selectedDir['description'] = trim($_POST['description'] ?? '');
        $selectedDir['directors_message'] = trim($_POST['directors_message'] ?? '');
        $selectedDir['well_wish'] = trim($_POST['well_wish'] ?? '');
        
        // Save photo inputs
        if (!empty($_POST['directors_photo'])) {
            $selectedDir['directors_photo'] = trim($_POST['directors_photo'] ?? '');
        }
        if (!empty($_POST['group_photo'])) {
            $selectedDir['group_photo'] = trim($_POST['group_photo'] ?? '');
        }
        
        // Write back to JSON
        $allDirectorates[$id] = $selectedDir;
        write_json('directorates.json', $allDirectorates);
        $successMsg = 'Directorate details updated successfully!';
    }
    
    // 3. Handle Logout
    if ($action === 'logout') {
        unset($_SESSION['directorate_logged_in']);
        header("Location: page.php?slug=directorates&id={$id}");
        exit;
    }
}
?>

<div class="directorates-page-container">
    <?php if ($selectedDir && $action === 'login'): ?>
        <!-- ==================== LOGIN FORM ==================== -->
        <div class="dir-back-nav" style="margin-bottom: 24px;">
            <a class="btn outline" href="page.php?slug=directorates&id=<?= e($id) ?>" style="padding: 8px 16px; border-radius: 8px;"><i class="fa fa-arrow-left"></i> Back to Profile</a>
        </div>
        
        <div class="dir-login-card" style="max-width: 480px; margin: 40px auto; padding: 36px; background: #fff; border-radius: 16px; border: 1px solid var(--line); box-shadow: var(--shadow);">
            <div style="text-align: center; margin-bottom: 24px;">
                <div style="display: inline-grid; place-items: center; width: 60px; height: 60px; border-radius: 50%; background: var(--gold-soft); color: var(--gold); font-size: 24px; margin-bottom: 12px;"><i class="fa fa-lock"></i></div>
                <h2 style="font-family: var(--font-serif); font-size: 24px; color: var(--green-deep); margin: 0;">Director Login</h2>
                <p style="color: var(--muted); font-size: 13.5px; margin: 4px 0 0;"><?= e($selectedDir['name']) ?></p>
            </div>
            
            <?php if ($errorMsg !== ''): ?>
                <div style="background: rgba(168, 45, 62, 0.08); border-left: 4px solid var(--red); color: var(--red); padding: 12px 16px; border-radius: 8px; font-size: 13.5px; margin-bottom: 20px;">
                    <i class="fa fa-exclamation-circle"></i> <?= e($errorMsg) ?>
                </div>
            <?php endif; ?>
            
            <form action="page.php?slug=directorates&action=login&id=<?= e($id) ?>" method="POST">
                <div style="margin-bottom: 20px;">
                    <label for="username" style="display: block; font-size: 13px; font-weight: 700; color: var(--green-deep); margin-bottom: 6px;">Username / ID</label>
                    <input type="text" name="username" id="username" value="<?= e($id) ?>" readonly style="width: 100%; padding: 12px; border: 1px solid var(--line); border-radius: 8px; font-family: monospace; background: var(--soft); color: var(--muted);">
                </div>
                <div style="margin-bottom: 24px;">
                    <label for="password" style="display: block; font-size: 13px; font-weight: 700; color: var(--green-deep); margin-bottom: 6px;">Password</label>
                    <input type="password" name="password" id="password" required placeholder="Enter password" style="width: 100%; padding: 12px; border: 1px solid var(--line); border-radius: 8px; outline: none; font-size: 14px;">
                    <span style="display: block; font-size: 11.5px; color: var(--muted); margin-top: 6px;"><i class="fa fa-info-circle"></i> Default password is <strong>director123</strong></span>
                </div>
                <button type="submit" class="btn primary" style="width: 100%; padding: 12px; font-size: 14px; border-radius: 8px;"><i class="fa fa-sign-in"></i> Access Dashboard</button>
            </form>
        </div>

    <?php elseif ($selectedDir && $action === 'dashboard'): ?>
        <!-- ==================== EDITOR DASHBOARD ==================== -->
        <?php 
        if (($_SESSION['directorate_logged_in'] ?? '') !== $id) {
            header("Location: page.php?slug=directorates&action=login&id={$id}");
            exit;
        }
        ?>
        <div class="dir-back-nav" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px;">
            <a class="btn outline" href="page.php?slug=directorates&id=<?= e($id) ?>" style="padding: 8px 16px; border-radius: 8px;"><i class="fa fa-eye"></i> View Profile Page</a>
            <a class="btn outline" href="page.php?slug=directorates&action=logout&id=<?= e($id) ?>" style="padding: 8px 16px; border-radius: 8px; border-color: var(--red); color: var(--red);"><i class="fa fa-sign-out"></i> Logout</a>
        </div>
        
        <div class="dir-dashboard-card" style="padding: 36px; background: #fff; border-radius: 16px; border: 1px solid var(--line); box-shadow: var(--shadow);">
            <div style="margin-bottom: 28px; border-bottom: 1px solid var(--line); padding-bottom: 16px;">
                <h2 style="font-family: var(--font-serif); font-size: 28px; color: var(--green-deep); margin: 0;">Directorate Update Center</h2>
                <p style="color: var(--muted); font-size: 14px; margin: 4px 0 0;">Updating content for <strong><?= e($selectedDir['name']) ?></strong></p>
            </div>
            
            <?php if ($successMsg !== ''): ?>
                <div style="background: rgba(16, 138, 85, 0.08); border-left: 4px solid var(--green); color: var(--green-dark); padding: 12px 16px; border-radius: 8px; font-size: 13.5px; margin-bottom: 24px;">
                    <i class="fa fa-check-circle"></i> <?= e($successMsg) ?>
                </div>
            <?php endif; ?>
            
            <form action="page.php?slug=directorates&action=dashboard&id=<?= e($id) ?>" method="POST">
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px;">
                    <div>
                        <label for="director" style="display: block; font-size: 13px; font-weight: 700; color: var(--green-deep); margin-bottom: 6px;">Director / Head Name</label>
                        <input type="text" name="director" id="director" required value="<?= e($selectedDir['director']) ?>" style="width: 100%; padding: 12px; border: 1px solid var(--line); border-radius: 8px; font-size: 14px;">
                    </div>
                    <div>
                        <?php if ($selectedDir['type'] === 'academic'): ?>
                            <label for="deputy" style="display: block; font-size: 13px; font-weight: 700; color: var(--green-deep); margin-bottom: 6px;">Deputy Director Name</label>
                            <input type="text" name="deputy" id="deputy" value="<?= e($selectedDir['deputy'] ?? '') ?>" style="width: 100%; padding: 12px; border: 1px solid var(--line); border-radius: 8px; font-size: 14px;">
                        <?php else: ?>
                            <label style="display: block; font-size: 13px; font-weight: 700; color: rgba(0,0,0,0.3); margin-bottom: 6px;">Deputy Director</label>
                            <input type="text" disabled value="Not applicable for non-academic" style="width: 100%; padding: 12px; border: 1px solid var(--line); border-radius: 8px; font-size: 14px; background: var(--soft); color: rgba(0,0,0,0.3);">
                        <?php endif; ?>
                    </div>
                </div>
                
                <div style="margin-bottom: 20px;">
                    <label for="description" style="display: block; font-size: 13px; font-weight: 700; color: var(--green-deep); margin-bottom: 6px;">General Description</label>
                    <textarea name="description" id="description" required rows="3" style="width: 100%; padding: 12px; border: 1px solid var(--line); border-radius: 8px; font-size: 14px; line-height: 1.5; resize: vertical;"><?= e($selectedDir['description']) ?></textarea>
                </div>
                
                <div style="margin-bottom: 20px;">
                    <label for="directors_message" style="display: block; font-size: 13px; font-weight: 700; color: var(--green-deep); margin-bottom: 6px;">Director's Message / Welcome Note</label>
                    <textarea name="directors_message" id="directors_message" required rows="5" style="width: 100%; padding: 12px; border: 1px solid var(--line); border-radius: 8px; font-size: 14px; line-height: 1.5; resize: vertical;"><?= e($selectedDir['directors_message']) ?></textarea>
                </div>
                
                <div style="margin-bottom: 20px;">
                    <label for="well_wish" style="display: block; font-size: 13px; font-weight: 700; color: var(--green-deep); margin-bottom: 6px;">Directorate Well Wish / Welcome Quote</label>
                    <input type="text" name="well_wish" id="well_wish" required value="<?= e($selectedDir['well_wish']) ?>" style="width: 100%; padding: 12px; border: 1px solid var(--line); border-radius: 8px; font-size: 14px;">
                </div>
                
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 28px;">
                    <div>
                        <label for="directors_photo" style="display: block; font-size: 13px; font-weight: 700; color: var(--green-deep); margin-bottom: 6px;">Director's Photo File Path</label>
                        <input type="text" name="directors_photo" id="directors_photo" placeholder="e.g. images/university/vice-chancellor.jpeg" value="<?= e($selectedDir['directors_photo'] ?? '') ?>" style="width: 100%; padding: 12px; border: 1px solid var(--line); border-radius: 8px; font-size: 13px; font-family: monospace;">
                    </div>
                    <div>
                        <label for="group_photo" style="display: block; font-size: 13px; font-weight: 700; color: var(--green-deep); margin-bottom: 6px;">Group/Office Photo File Path</label>
                        <input type="text" name="group_photo" id="group_photo" placeholder="e.g. images/university/campus-gate.png" value="<?= e($selectedDir['group_photo'] ?? '') ?>" style="width: 100%; padding: 12px; border: 1px solid var(--line); border-radius: 8px; font-size: 13px; font-family: monospace;">
                    </div>
                </div>
                
                <button type="submit" class="btn primary" style="padding: 12px 24px; font-size: 14px; border-radius: 8px;"><i class="fa fa-save"></i> Save Changes</button>
            </form>
        </div>

    <?php elseif ($selectedDir): ?>
        <!-- ==================== DETAILED VIEW ==================== -->
        <div class="dir-back-nav" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px;">
            <a class="btn outline" href="page.php?slug=directorates" style="padding: 8px 16px; border-radius: 8px;"><i class="fa fa-arrow-left"></i> Back to Directorates</a>
            
            <?php if (($_SESSION['directorate_logged_in'] ?? '') === $id): ?>
                <a class="btn outline" href="page.php?slug=directorates&action=dashboard&id=<?= e($id) ?>" style="padding: 8px 16px; border-radius: 8px; border-color: var(--green); color: var(--green-dark);"><i class="fa fa-cog"></i> Go to Dashboard</a>
            <?php else: ?>
                <a class="btn outline" href="page.php?slug=directorates&action=login&id=<?= e($id) ?>" style="padding: 8px 16px; border-radius: 8px; border-color: var(--green); color: var(--green-dark);"><i class="fa fa-lock"></i> Director Login</a>
            <?php endif; ?>
        </div>
        
        <div class="dir-profile-grid" style="display: grid; grid-template-columns: 320px 1fr; gap: 40px; align-items: start; margin-bottom: 40px;">
            <!-- Left: Portrait and Quick Stats -->
            <div style="background: #fff; border: 1px solid var(--line); border-radius: 16px; padding: 24px; box-shadow: var(--shadow-soft); text-align: center;">
                <div style="width: 200px; height: 200px; border-radius: 50%; overflow: hidden; margin: 0 auto 20px; border: 4px solid var(--soft); box-shadow: 0 10px 20px rgba(0,0,0,0.06);">
                    <img src="<?= e($selectedDir['directors_photo'] ?: 'images/university/vice-chancellor.jpeg') ?>" alt="<?= e($selectedDir['director']) ?>" style="width:100%; height:100%; object-fit:cover;">
                </div>
                
                <h3 style="font-family: var(--font-serif); font-size: 20px; color: var(--green-deep); margin: 0 0 4px;"><?= e($selectedDir['director']) ?></h3>
                <p style="color: var(--gold); font-size: 12px; font-weight: 800; text-transform: uppercase; letter-spacing: 0.8px; margin: 0 0 16px;">Director / Head</p>
                
                <div style="border-top: 1px solid var(--line); padding-top: 16px; text-align: left;">
                    <div style="margin-bottom: 12px;">
                        <span style="display: block; font-size: 11px; text-transform: uppercase; color: var(--muted); font-weight: 700; letter-spacing: 0.5px;">Directorate type</span>
                        <strong style="font-size: 13.5px; color: var(--green-deep); text-transform: capitalize;"><?= e($selectedDir['type']) ?></strong>
                    </div>
                    <?php if (!empty($selectedDir['deputy'])): ?>
                        <div style="margin-bottom: 12px;">
                            <span style="display: block; font-size: 11px; text-transform: uppercase; color: var(--muted); font-weight: 700; letter-spacing: 0.5px;">Deputy Director</span>
                            <strong style="font-size: 13.5px; color: var(--green-deep);"><?= e($selectedDir['deputy']) ?></strong>
                        </div>
                    <?php endif; ?>
                    <div>
                        <span style="display: block; font-size: 11px; text-transform: uppercase; color: var(--muted); font-weight: 700; letter-spacing: 0.5px;">Institution</span>
                        <strong style="font-size: 13.5px; color: var(--green-deep);">JoSTUM Makurdi</strong>
                    </div>
                </div>
            </div>
            
            <!-- Right: Content and Message -->
            <div>
                <h1 style="font-family: var(--font-serif); font-size: 32px; color: var(--green-deep); margin: 0 0 12px; line-height: 1.2; font-weight: 800;"><?= e($selectedDir['name']) ?></h1>
                <p style="font-size: 16.5px; line-height: 1.7; color: var(--muted); margin-bottom: 28px; text-align: justify;"><?= e($selectedDir['description']) ?></p>
                
                <!-- Director's Welcome Card -->
                <div style="background: #fff; border: 1px solid var(--line); border-radius: 16px; padding: 32px; box-shadow: var(--shadow-soft); position: relative; margin-bottom: 28px;">
                    <div style="display: inline-block; background: var(--green); color: #fff; padding: 4px 12px; border-radius: 999px; font-size: 11.5px; font-weight: 800; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 16px;"><i class="fa fa-quote-left"></i> Welcome Message</div>
                    
                    <p style="font-size: 15.5px; line-height: 1.75; color: var(--ink); text-align: justify; margin: 0; font-weight: 500; font-style: italic;">
                        "<?= e($selectedDir['directors_message']) ?>"
                    </p>
                </div>
                
                <!-- Well wish / Moto Box -->
                <div style="border-left: 4px solid var(--gold); padding: 12px 20px; background: var(--soft); border-radius: 0 12px 12px 0;">
                    <p style="margin: 0; font-size: 14.5px; color: var(--green-deep); font-weight: 700;">
                        <i class="fa fa-shield" style="color: var(--gold); margin-right: 6px;"></i> <?= e($selectedDir['well_wish']) ?>
                    </p>
                </div>
            </div>
        </div>
        
        <!-- Large Group/Office Photo Banner -->
        <?php if (!empty($selectedDir['group_photo'])): ?>
            <div style="background: #fff; border: 1px solid var(--line); border-radius: 16px; padding: 24px; box-shadow: var(--shadow-soft); margin-bottom: 30px;">
                <h3 style="font-family: var(--font-serif); font-size: 18px; color: var(--green-deep); margin: 0 0 16px; font-weight: 800;"><i class="fa fa-camera" style="color: var(--gold); margin-right: 8px;"></i> Directorate Photo Gallery</h3>
                <div style="border-radius: 12px; overflow: hidden; height: 360px; border: 1px solid var(--line);">
                    <img src="<?= e($selectedDir['group_photo']) ?>" alt="<?= e($selectedDir['name']) ?> Group Photo" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
            </div>
        <?php endif; ?>

    <?php else: ?>
        <!-- ==================== MAIN LISTING VIEW ==================== -->
        <!-- Switcher Tabs -->
        <div class="int-tab-bar" style="margin-bottom: 30px;">
            <button class="int-tab-btn active" onclick="switchDirTab('academic', this)"><i class="fa fa-graduation-cap"></i> Academic Directorates (<?= count($academic) ?>)</button>
            <button class="int-tab-btn" onclick="switchDirTab('non-academic', this)"><i class="fa fa-briefcase"></i> Non-Academic Directorates (<?= count($non_academic) ?>)</button>
        </div>

        <!-- Search box -->
        <div class="directory-toolbar" style="margin-bottom: 24px;">
            <div class="search-box-wrapper">
                <i class="fa fa-search search-icon"></i>
                <input type="text" id="dir-search" placeholder="Search directorate by name, director or deputy..." onkeyup="filterDirectorates()">
            </div>
        </div>

        <!-- Academic Panel -->
        <div class="int-tab-panel active" id="dir-panel-academic">
            <div class="table-wrap">
                <table>
                    <thead>
                        <tr>
                            <th style="width: 10%;">S/No.</th>
                            <th style="width: 40%;">Directorate / Centre / Institute</th>
                            <th style="width: 25%;">Director</th>
                            <th style="width: 25%;">Deputy Director</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($academic as $a): ?>
                            <tr class="dir-row academic-row" data-search-content="<?= e(strtolower($a['name'] . ' ' . $a['director'] . ' ' . $a['deputy'])) ?>">
                                <td><strong><?= $a['sno'] ?></strong></td>
                                <td class="officer-name">
                                    <a href="page.php?slug=directorates&id=<?= e($a['id']) ?>" style="color: var(--green-dark); font-weight: 700; transition: color 0.2s ease; display: inline-flex; align-items: center;">
                                        <i class="fa fa-university" style="color: var(--green); margin-right: 8px;"></i> <?= e($a['name']) ?>
                                    </a>
                                </td>
                                <td><strong><?= e($a['director']) ?></strong></td>
                                <td><?= !empty($a['deputy']) ? e($a['deputy']) : '<span class="prof-none">-</span>' ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Non-Academic Panel -->
        <div class="int-tab-panel" id="dir-panel-non-academic">
            <div class="table-wrap">
                <table>
                    <thead>
                        <tr>
                            <th style="width: 10%;">S/No.</th>
                            <th style="width: 60%;">Directorate / Department / Unit</th>
                            <th style="width: 30%;">Director / Head</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($non_academic as $na): ?>
                            <tr class="dir-row non-academic-row" data-search-content="<?= e(strtolower($na['name'] . ' ' . $na['director'])) ?>">
                                <td><strong><?= $na['sno'] ?></strong></td>
                                <td class="officer-name">
                                    <a href="page.php?slug=directorates&id=<?= e($na['id']) ?>" style="color: var(--green-dark); font-weight: 700; transition: color 0.2s ease; display: inline-flex; align-items: center;">
                                        <i class="fa fa-cogs" style="color: var(--gold); margin-right: 8px;"></i> <?= e($na['name']) ?>
                                    </a>
                                </td>
                                <td><strong><?= e($na['director']) ?></strong></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    <?php endif; ?>
</div>

<script>
let currentDirTab = 'academic';

function switchDirTab(tab, btn) {
    document.querySelectorAll('.directorates-page-container > .int-tab-bar .int-tab-btn').forEach(b => b.classList.remove('active'));
    btn.classList.add('active');
    
    document.querySelectorAll('.directorates-page-container > .int-tab-panel').forEach(p => p.classList.remove('active'));
    document.getElementById('dir-panel-' + tab).classList.add('active');
    currentDirTab = tab;
    filterDirectorates();
    
    // Smooth scroll to container offset by sticky header height
    const container = document.querySelector('.directorates-page-container');
    const headerHeight = document.querySelector('.site-header')?.offsetHeight || 90;
    const targetPos = container.getBoundingClientRect().top + window.pageYOffset - headerHeight - 16;
    window.scrollTo({ top: targetPos, behavior: 'smooth' });
}

function filterDirectorates() {
    const query = document.getElementById('dir-search').value.toLowerCase();
    const rows = document.querySelectorAll('.dir-row');
    
    rows.forEach(row => {
        const isAcademic = row.classList.contains('academic-row');
        const isCorrectTab = (currentDirTab === 'academic' && isAcademic) || (currentDirTab === 'non-academic' && !isAcademic);
        const searchContent = row.dataset.searchContent;
        
        if (isCorrectTab && searchContent.includes(query)) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
}
</script>
