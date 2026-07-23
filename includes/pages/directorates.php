<?php
if (!defined('DATA_DIR')) { exit; }

$academic = [
    ['sno' => 1, 'name' => 'Academic Planning', 'deputy' => 'Prof. I. Aheman', 'director' => 'Prof. J. Enokela'],
    ['sno' => 2, 'name' => 'Quality Assurance', 'deputy' => 'Prof. T. Nwakonobi', 'director' => 'Prof. M. A. Kuhe'],
    ['sno' => 3, 'name' => 'Corporate Engagement & International Relations', 'deputy' => 'Dr. A. Ochalibe', 'director' => 'Prof. T. K. Kaankuka'],
    ['sno' => 4, 'name' => 'Seed Technology Centre', 'deputy' => '', 'director' => 'Dr. A. Jimin'],
    ['sno' => 5, 'name' => 'Center for Entrepreneurship Development', 'deputy' => 'Dr. K. J. Taku', 'director' => 'Prof. A. Ocholi'],
    ['sno' => 6, 'name' => 'Gender Studies', 'deputy' => '', 'director' => 'Prof. O. Abu'],
    ['sno' => 7, 'name' => 'Research & Innovation', 'deputy' => 'Prof. A. Itodo', 'director' => 'Prof. J. O. Igoli'],
    ['sno' => 8, 'name' => 'Agronomy Research Centre', 'deputy' => 'Dr. F. Ibrahim', 'director' => 'Prof. E. E. Ekoja'],
    ['sno' => 9, 'name' => 'University Teaching & Research Farm', 'deputy' => '', 'director' => 'Prof. F. D. Ugese'],
    ['sno' => 10, 'name' => 'Veterinary Teaching Hospital', 'deputy' => 'Prof. H. Abah', 'director' => 'Prof. A. T. Elsa'],
    ['sno' => 11, 'name' => 'Institute for Procurement, Environmental & Social Standards', 'deputy' => 'Dr. C.O. Eche', 'director' => 'Prof. L. A. Nnamonu'],
    ['sno' => 12, 'name' => 'Center for Open Distance Learning', 'deputy' => 'Dr. J. A. Achir', 'director' => 'Prof. R. H. Shaato'],
    ['sno' => 13, 'name' => 'Institute for Food Security', 'deputy' => 'Prof. J. B. Ayoola', 'director' => 'Prof. O.J. Okwu'],
    ['sno' => 14, 'name' => 'Industrial Training', 'deputy' => 'Dr. S. A. Daudu', 'director' => 'Prof. B. D. Igbabul'],
    ['sno' => 15, 'name' => 'Specialized Equipment', 'deputy' => 'Engr. Prof. S. Aye', 'director' => 'Dr. P. T. Aernan'],
    ['sno' => 16, 'name' => 'Amadu Ali Centre for Public Health & Comparative Medicine', 'deputy' => 'Prof. C. A. Akwuobu', 'director' => 'Prof. M. I. Adah'],
    ['sno' => 17, 'name' => 'Sandwich Programme', 'deputy' => '', 'director' => 'Prof. P. O. James'],
    ['sno' => 18, 'name' => 'Joint University Preliminary Examination Board (JUPEB)', 'deputy' => '', 'director' => 'Dr. L. B. Gav']
];

$non_academic = [
    ['sno' => 1, 'name' => 'Information & Communication Technology', 'director' => 'Dr. P. O. Omolaye'],
    ['sno' => 2, 'name' => 'University Farm Centre', 'director' => 'Prof. A. Ali'],
    ['sno' => 3, 'name' => 'Career Services Center', 'director' => 'Mrs. R. Kpamor'],
    ['sno' => 4, 'name' => 'Center for Counseling & Human Development', 'director' => 'Prof. A. O. Amali'],
    ['sno' => 5, 'name' => 'Sports', 'director' => 'Coach P. Vande'],
    ['sno' => 6, 'name' => 'Students Affairs (Dean)', 'director' => 'Prof. A. Ejembi'],
    ['sno' => 7, 'name' => 'Consultancy Services', 'director' => 'Prof. G. N. Imandeh'],
    ['sno' => 8, 'name' => 'Council Affairs', 'director' => 'Mr. E. I. Tyo'],
    ['sno' => 9, 'name' => 'Alumni Relations', 'director' => 'Dr. V. Bem'],
    ['sno' => 10, 'name' => 'Physical Planning', 'director' => 'Engr. F. F. Oladipo'],
    ['sno' => 11, 'name' => 'Procurement', 'director' => 'QS A. Ivambe'],
    ['sno' => 12, 'name' => 'Senate Affairs', 'director' => 'Mr. I. O. Asember'],
    ['sno' => 13, 'name' => 'Academic Affairs', 'director' => 'Mrs. C. D. Ameh'],
    ['sno' => 14, 'name' => 'Examinations & Records', 'director' => 'Mr. D. T. Allah'],
    ['sno' => 15, 'name' => 'Works & Maintenance', 'director' => 'Engr. A. S. Ode'],
    ['sno' => 16, 'name' => 'Servicom', 'director' => 'Mrs. H. Nyitse'],
    ['sno' => 17, 'name' => 'University Health Services', 'director' => 'Dr. N. Iber'],
    ['sno' => 18, 'name' => 'Information, Protocol & Public Relations', 'director' => 'Mrs. R. Waku'],
    ['sno' => 19, 'name' => 'Security Department', 'director' => 'Mr. Lawrence Agera'],
    ['sno' => 20, 'name' => 'Personnel Affairs', 'director' => 'Mr. I. D. Orom'],
    ['sno' => 21, 'name' => 'Investment', 'director' => 'Mr. F. D. Yoosu'],
    ['sno' => 22, 'name' => 'Assets & Insurance', 'director' => 'Mrs. M. M. Jato'],
    ['sno' => 23, 'name' => 'Expenditure Control', 'director' => 'Mr. B. O. Adanu'],
    ['sno' => 24, 'name' => 'Stores', 'director' => 'Mr. D. Ediri'],
    ['sno' => 25, 'name' => 'Internally Generated Revenue', 'director' => 'Mrs. E. I. Udu (Ag)'],
    ['sno' => 26, 'name' => 'Finance & Insurance', 'director' => 'Mr. P. Y. Achimugu (Ag)'],
    ['sno' => 27, 'name' => 'Main Accounts', 'director' => 'Mr. M. Shango (Ag)'],
    ['sno' => 28, 'name' => 'Payroll & Pension', 'director' => 'Mr. I. Arubi']
];
?>
<div class="directorates-page-container">
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
                            <td class="officer-name"><i class="fa fa-university" style="color: var(--green); margin-right: 8px;"></i> <?= e($a['name']) ?></td>
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
                            <td class="officer-name"><i class="fa fa-cogs" style="color: var(--gold); margin-right: 8px;"></i> <?= e($na['name']) ?></td>
                            <td><strong><?= e($na['director']) ?></strong></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
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
