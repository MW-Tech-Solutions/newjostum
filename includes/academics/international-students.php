<?php
if (!defined('DATA_DIR')) {
    exit;
}

$faculties = [
    ['name' => 'Prof. Nabi H. H. Bashir', 'role' => 'Professor', 'track' => 'Environmental Standards', 'nation' => 'Sudan', 'phone' => '+249511849944', 'email' => 'bashirnabilhh@gmail.com', 'flag' => 'SD'],
    ['name' => 'Prof. Philip Jones', 'role' => 'Professor', 'track' => 'Environmental Standards', 'nation' => 'United Kingdom', 'phone' => '', 'email' => '', 'flag' => 'GB'],
    ['name' => 'Prof. Muyiwa S. Adaramola', 'role' => 'Professor', 'track' => 'Environmental Standards', 'nation' => 'Norway', 'phone' => '+4797690282', 'email' => 'muyiwa.adaramola@nmbu.no', 'flag' => 'NO'],
    ['name' => 'Prof. O. J. Okonkwo', 'role' => 'Professor', 'track' => 'Environmental Standards', 'nation' => 'South Africa', 'phone' => '', 'email' => '', 'flag' => 'ZA'],
    ['name' => 'Dr. Olalekan A. Adekola', 'role' => 'Senior Lecturer', 'track' => 'Environmental Standards', 'nation' => 'United Kingdom', 'phone' => '07578526751', 'email' => 'o.adekola@yorksj.ac.uk', 'flag' => 'GB'],
    ['name' => 'Dr. Aviti John Mmochi', 'role' => 'Senior Lecturer', 'track' => 'Environmental Standards', 'nation' => 'Tanzania', 'phone' => '0715477200', 'email' => 'avitimmochi@gmail.com', 'flag' => 'TZ'],
    ['name' => 'Prof. Toyin Kolawole', 'role' => 'Professor', 'track' => 'Social Standards', 'nation' => 'Botswana / Nigeria', 'phone' => '', 'email' => 'toyin.kolawole@eastern.edu', 'flag' => 'BW'],
    ['name' => 'Dr. Harshit Lakra', 'role' => 'Lecturer', 'track' => 'Social Standards', 'nation' => 'India', 'phone' => '', 'email' => '', 'flag' => 'IN'],
    ['name' => 'Dr. Andrea Andzenge', 'role' => 'Lecturer', 'track' => 'Social Standards', 'nation' => 'U.S.A', 'phone' => '', 'email' => '', 'flag' => 'US'],
    ['name' => 'Dr. Andrew A. Alola', 'role' => 'Associate Professor', 'track' => 'Social Standards', 'nation' => 'Norway / Nigeria', 'phone' => '', 'email' => 'andrew.alola@nisantasi.edu.tr', 'flag' => 'NO'],
    ['name' => 'Ojomo Choumbou R. Fani', 'role' => 'Senior Lecturer', 'track' => 'Social Standards', 'nation' => 'Cameroon', 'phone' => '697966345', 'email' => 'raoulfani@gmail.com.fr', 'flag' => 'CM'],
    ['name' => 'Ms Ann Atama', 'role' => 'Senior Social Worker', 'track' => 'Social Standards', 'nation' => 'United Kingdom', 'phone' => '', 'email' => 'atamaann91@gmail.com', 'flag' => 'GB'],
    ['name' => 'Dr. Jacob M. Gwa', 'role' => 'Lecturer', 'track' => 'Procurement Management', 'nation' => 'U.S.A / Nigeria', 'phone' => '', 'email' => 'j.gwa@iboro.ac.uk', 'flag' => 'US'],
    ['name' => 'Dr. Amom Tor-Anyin', 'role' => 'Adjunct Professor', 'track' => 'Procurement Management', 'nation' => 'U.S.A / Nigeria', 'phone' => '', 'email' => 'toranyiin@gmail.com', 'flag' => 'US'],
    ['name' => 'Dr. David Agogo', 'role' => 'Lecturer', 'track' => 'Procurement Management', 'nation' => 'U.S.A / Nigeria', 'phone' => '', 'email' => 'agogodavid@outlook.com', 'flag' => 'US'],
    ['name' => 'Azuibuike Vera Mary Uche', 'role' => 'Procurement Consultant', 'track' => 'Procurement Management', 'nation' => 'U.S.A / Nigeria', 'phone' => '', 'email' => 'verauchea@gmail.com', 'flag' => 'US'],
    ['name' => 'Madoda S. Mngomezulu', 'role' => 'Public Procurement Tutor', 'track' => 'Procurement Management', 'nation' => 'Swaziland', 'phone' => '76061419', 'email' => 'spro1970@gmail.com', 'flag' => 'SZ'],
    ['name' => 'Titus Tikwa Jnr', 'role' => 'Procurement Manager', 'track' => 'Procurement Management', 'nation' => 'Liberia', 'phone' => '0777428760', 'email' => 'titustik@gmail.com', 'flag' => 'LR']
];

$students = [
    ['name' => 'Ansu Njie', 'prog' => 'M.Sc Procurement Management', 'status' => 'Graduated (2023-2024)', 'matric' => '24/1479/C/MSc', 'nation' => 'Gambia'],
    ['name' => 'Lamin Sanyang', 'prog' => 'PGD Procurement Management', 'status' => 'Graduated (2023-2024)', 'matric' => '24/1202/C/PGD', 'nation' => 'Gambia'],
    ['name' => 'Salim Jaiteh', 'prog' => 'M.Sc Procurement Management', 'status' => 'Graduated (2023-2024)', 'matric' => '24/1410/C/MSc', 'nation' => 'Gambia'],
    ['name' => 'M.J Gomez III', 'prog' => 'M.Sc Procurement Management', 'status' => 'Ongoing', 'matric' => '25/1851/C/MSc', 'nation' => 'Gambia'],
    ['name' => 'Ebrima A. Touray', 'prog' => 'PGD Procurement Management', 'status' => 'Ongoing', 'matric' => '25/2193/C/PGD', 'nation' => 'Gambia']
];

$nationsCount = count(array_unique(array_filter(array_merge(array_column($faculties, 'nation'), array_column($students, 'nation')))));
?>

<div class="international-hub-container">
    <div class="international-stats-strip">
        <div class="istat-card">
            <strong class="gold-text"><?= count($faculties) ?></strong>
            <span>Global Faculty Members</span>
        </div>
        <div class="istat-card">
            <strong class="gold-text"><?= count($students) ?></strong>
            <span>International Students</span>
        </div>
        <div class="istat-card">
            <strong class="gold-text"><?= $nationsCount ?></strong>
            <span>Nations Represented</span>
        </div>
        <div class="istat-card">
            <strong class="gold-text">2</strong>
            <span>Partner Continents</span>
        </div>
    </div>

    <!-- Switcher Tabs -->
    <div class="int-tab-bar">
        <button class="int-tab-btn active" onclick="switchIntTab('faculties', this)"><i class="fa fa-users"></i> International Faculty Directory</button>
        <button class="int-tab-btn" onclick="switchIntTab('students', this)"><i class="fa fa-graduation-cap"></i> International Student Registry</button>
    </div>

    <!-- Faculty Panel -->
    <div class="int-tab-panel active" id="int-panel-faculties">
        <div class="int-search-toolbar">
            <div class="search-box-wrapper">
                <i class="fa fa-search search-icon"></i>
                <input type="text" id="faculty-search" placeholder="Search faculty name, nationality or track..." onkeyup="filterFaculties()">
            </div>
        </div>
        <div class="faculty-cards-grid">
            <?php foreach ($faculties as $fac): ?>
                <div class="faculty-profile-card" data-search="<?= e(strtolower($fac['name'] . ' ' . $fac['nation'] . ' ' . $fac['track'])) ?>">
                    <div class="fac-card-header">
                        <div class="fac-avatar"><i class="fa fa-user"></i></div>
                        <div>
                            <h4><?= e($fac['name']) ?></h4>
                            <span class="role-tag"><?= e($fac['role']) ?></span>
                        </div>
                    </div>
                    <div class="fac-card-body">
                        <p class="track-info"><i class="fa fa-briefcase"></i> <?= e($fac['track']) ?></p>
                        <p class="country-info"><i class="fa fa-globe"></i> <?= e($fac['nation']) ?></p>
                        <?php if (!empty($fac['email'])): ?>
                            <a href="mailto:<?= e($fac['email']) ?>" class="fac-contact-link"><i class="fa fa-envelope-o"></i> <?= e($fac['email']) ?></a>
                        <?php endif; ?>
                        <?php if (!empty($fac['phone'])): ?>
                            <span class="fac-contact-detail"><i class="fa fa-phone"></i> <?= e($fac['phone']) ?></span>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Student Panel -->
    <div class="int-tab-panel" id="int-panel-students">
        <div class="student-table-wrap table-wrap">
            <table class="international-student-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Programme</th>
                        <th>Status</th>
                        <th>Matriculation No.</th>
                        <th>Citizenship</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($students as $stu): ?>
                        <tr>
                            <td class="student-name"><strong><?= e($stu['name']) ?></strong></td>
                            <td><?= e($stu['prog']) ?></td>
                            <td>
                                <span class="badge <?= (stripos($stu['status'], 'Graduated') !== false) ? 'status-full' : 'status-awaiting' ?>">
                                    <?= e($stu['status']) ?>
                                </span>
                            </td>
                            <td><code><?= e($stu['matric']) ?></code></td>
                            <td><i class="fa fa-globe"></i> <?= e($stu['nation']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <figure class="page-figure">
            <img src="images/docx/image17.png" alt="CIPESS international student matriculation ceremony">
            <figcaption>CIPESS regional students from The Gambia during JoSTUM matriculation</figcaption>
        </figure>
    </div>
</div>

<script>
function switchIntTab(tab, btn) {
    document.querySelectorAll('.int-tab-btn').forEach(b => b.classList.remove('active'));
    document.querySelectorAll('.int-tab-panel').forEach(p => p.classList.remove('active'));
    
    btn.classList.add('active');
    document.getElementById('int-panel-' + tab).classList.add('active');
}

function filterFaculties() {
    const query = document.getElementById('faculty-search').value.toLowerCase();
    const cards = document.querySelectorAll('.faculty-profile-card');
    cards.forEach(card => {
        const text = card.dataset.search;
        if (text.includes(query)) {
            card.style.display = 'block';
        } else {
            card.style.display = 'none';
        }
    });
}
</script>
