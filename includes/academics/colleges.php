<?php
if (!defined('DATA_DIR')) {
    exit;
}

$colleges = [
    [
        'name' => 'College of Agricultural Economics & Extension',
        'dean' => 'Prof. Edward A. Unongu',
        'code' => 'AEE',
        'students_ug' => 761,
        'students_pg' => 346,
        'professors' => 18,
        'departments' => [
            ['name' => 'Agricultural Economics', 'hod' => 'Prof. J. A. C. Ezihe'],
            ['name' => 'Agricultural Extension & Communication', 'hod' => 'Prof. I. Anonguku'],
            ['name' => 'Sustainable Social Development', 'hod' => 'Dr. P. Tsue']
        ]
    ],
    [
        'name' => 'College of Agronomy',
        'dean' => 'Prof. Philip Agber',
        'code' => 'AGR',
        'students_ug' => 905,
        'students_pg' => 55,
        'professors' => 19,
        'departments' => [
            ['name' => 'Soil & Land Resources Management', 'hod' => 'Prof. O. F. Olatunji'],
            ['name' => 'Crop & Environmental Protection', 'hod' => 'Dr. H. I. Usman'],
            ['name' => 'Plant Breeding & Seed Science', 'hod' => 'Dr. J. O. Okoh'],
            ['name' => 'Crop production', 'hod' => 'Dr. B. K. Akinyemi']
        ]
    ],
    [
        'name' => 'College of Animal Sciences',
        'dean' => 'Prof. Terzungwe Ahemen',
        'code' => 'ANS',
        'students_ug' => 1749,
        'students_pg' => 41,
        'professors' => 8,
        'departments' => [
            ['name' => 'Animal Nutrition', 'hod' => 'Prof. A. A. Wuanor'],
            ['name' => 'Animal Production', 'hod' => 'Prof. J. Oloche'],
            ['name' => 'Animal Breeding & Physiology', 'hod' => 'Prof. J. Ochefu'],
            ['name' => 'Animal Health & Production', 'hod' => 'Dr. O. D. Kondadacha']
        ]
    ],
    [
        'name' => 'College of Biological Sciences',
        'dean' => 'Prof. Celestine Aguoru',
        'code' => 'BSC',
        'students_ug' => 2030,
        'students_pg' => 85,
        'professors' => 11,
        'departments' => [
            ['name' => 'Microbiology', 'hod' => 'Prof. G. Gberikon'],
            ['name' => 'Biochemistry', 'hod' => 'Dr. T. Akande'],
            ['name' => 'Zoology', 'hod' => 'Prof. A. A. Onekutu'],
            ['name' => 'Plant Science & Biotechnology', 'hod' => 'Dr. T. Okoh']
        ]
    ],
    [
        'name' => 'College of Education',
        'dean' => 'Prof. Ado Wombo',
        'code' => 'EDU',
        'students_ug' => 3604,
        'students_pg' => 224,
        'professors' => 30,
        'departments' => [
            ['name' => 'Guidance & Counseling', 'hod' => 'Dr. B. N. Kohol'],
            ['name' => 'Educational Administration & Planning', 'hod' => 'Prof. C. I. Tyokyaa'],
            ['name' => 'Physics Education', 'hod' => 'Dr. B. A. Atsuwe'],
            ['name' => 'Mathematics Education', 'hod' => 'Prof. S. O. Emaikwu'],
            ['name' => 'Biology Education', 'hod' => 'Prof. M. J. Adejoh'],
            ['name' => 'Statistics Education', 'hod' => 'Dr. M. T. Abari'],
            ['name' => 'Computer Science Education', 'hod' => 'Dr. T. M. Ityavzua'],
            ['name' => 'Agricultural Education', 'hod' => 'Dr. A. Amonjenu'],
            ['name' => 'Environmental Education', 'hod' => 'Prof. E. T. Ikyaagba'],
            ['name' => 'Home Economics Education', 'hod' => 'Dr. M. T. Lan'],
            ['name' => 'English Language Education', 'hod' => 'Prof. P. O. Onekutu'],
            ['name' => 'History & Archeology Education', 'hod' => 'Dr. G. T. Tyungu'],
            ['name' => 'Industrial Technical Education', 'hod' => 'Prof. E. G. Ekele'],
            ['name' => 'Business Education', 'hod' => 'Prof. N. Kwahar'],
            ['name' => 'Adult Education', 'hod' => 'Dr. H. J. Youghsu'],
            ['name' => 'Integrated Science Education', 'hod' => 'Dr. M. C. Jirgba'],
            ['name' => 'Chemistry Education', 'hod' => 'Dr. J. N. Adzape'],
            ['name' => 'Entrepreneurship Education', 'hod' => 'Dr. A. G. Shimave'],
            ['name' => 'Social Studies/Civil Education', 'hod' => 'Dr. J. I. Chiakyor']
        ]
    ],
    [
        'name' => 'College of Engineering',
        'dean' => 'Prof. Martins Udochukwu',
        'code' => 'ENG',
        'students_ug' => 2869,
        'students_pg' => 143,
        'professors' => 21,
        'departments' => [
            ['name' => 'Agricultural & Biosystems Engineering', 'hod' => 'Engr. Prof. J. O. Awulu'],
            ['name' => 'Computer Engineering', 'hod' => 'Engr. Dr. D. O. Agbo'],
            ['name' => 'Civil Engineering', 'hod' => 'Engr. Prof. E. Edeh'],
            ['name' => 'Environmental Engineering', 'hod' => 'Engr. Dr. R. T. Iwar'],
            ['name' => 'Electrical/Electronic Engineering', 'hod' => 'Engr. Dr. E. T. Iorkyase'],
            ['name' => 'Mechanical Engineering', 'hod' => 'Engr. Prof. K. K. Ikpambase'],
            ['name' => 'Telecommunication Engineering', 'hod' => 'Engr. Prof. J. A. Mom']
        ]
    ],
    [
        'name' => 'College of Food Technology & Human Ecology',
        'dean' => 'Prof. Julius Ikya',
        'code' => 'FTE',
        'students_ug' => 1890,
        'students_pg' => 79,
        'professors' => 7,
        'departments' => [
            ['name' => 'Food Science & Technology', 'hod' => 'Prof. M. O. Eke'],
            ['name' => 'Nutrition & Dietetics', 'hod' => 'Dr. M. Ukeyima'],
            ['name' => 'Family & Consumer Science', 'hod' => 'Dr. A. U. Ugboji']
        ]
    ],
    [
        'name' => 'College of Forestry & Fisheries',
        'dean' => 'Prof. Rosemary A. Obande',
        'code' => 'FFI',
        'students_ug' => 1188,
        'students_pg' => 58,
        'professors' => 14,
        'departments' => [
            ['name' => 'Fisheries & Aquaculture', 'hod' => 'Dr. G. Ataguba'],
            ['name' => 'Social & Environmental Forestry', 'hod' => 'Prof. P. U. Ancha'],
            ['name' => 'Wildlife & Range Management', 'hod' => 'Dr. M. I. Iwar'],
            ['name' => 'Forest Production & Products', 'hod' => 'Dr. G. Dachung']
        ]
    ],
    [
        'name' => 'College of Management Sciences',
        'dean' => 'Prof. Patrick Zayol',
        'code' => 'MGS',
        'students_ug' => 2899,
        'students_pg' => 732,
        'professors' => 10,
        'departments' => [
            ['name' => 'Procurement Management', 'hod' => 'Dr. S. Tyakosu'],
            ['name' => 'Accounting', 'hod' => 'Dr. M. Soomiyol'],
            ['name' => 'Banking & Finance', 'hod' => 'Dr. A. Tagher'],
            ['name' => 'Agribusiness', 'hod' => 'Dr. I. E. Aker'],
            ['name' => 'Business Administration', 'hod' => 'Prof. M. E. Umogbai'],
            ['name' => 'Entrepreneurship', 'hod' => 'Dr. E. I. Awuzie'],
            ['name' => 'Public Administration', 'hod' => 'Dr. O. Aule'],
            ['name' => 'Agricultural Marketing & Co-operatives', 'hod' => 'Dr. E. C. Ogbanje'],
            ['name' => 'Marketing', 'hod' => 'Dr. A. Olotu'],
            ['name' => 'Library & Information Science', 'hod' => 'Dr. A. E. Annune']
        ]
    ],
    [
        'name' => 'College of Physical Sciences',
        'dean' => 'Prof. Samual T. Swem',
        'code' => 'PHY',
        'students_ug' => 2391,
        'students_pg' => 559,
        'professors' => 24,
        'departments' => [
            ['name' => 'Environmental Sustainability', 'hod' => 'Dr. C. O. Eche'],
            ['name' => 'Chemistry', 'hod' => 'Prof. S. Ande'],
            ['name' => 'Industrial Chemistry', 'hod' => 'Dr. O. Ofoegbu'],
            ['name' => 'Physics', 'hod' => 'Prof. A. A. Tyovenda'],
            ['name' => 'Industrial Physics', 'hod' => 'Dr. E. A. Anyebe'],
            ['name' => 'Computer Science', 'hod' => 'Prof. I. Agaji'],
            ['name' => 'Mathematics', 'hod' => 'Prof. A. D. Akwu'],
            ['name' => 'Statistics', 'hod' => 'Dr. T. Usar']
        ]
    ],
    [
        'name' => 'College of Veterinary Medicine',
        'dean' => 'Prof. Joel A. Bosha',
        'code' => 'VET',
        'students_ug' => 223,
        'students_pg' => 15,
        'professors' => 19,
        'departments' => [
            ['name' => 'Veterinary Anatomy', 'hod' => 'Dr. R. M. Korzerzer'],
            ['name' => 'Veterinary Parasitology & Entomology', 'hod' => 'Prof. C. Ogbaje'],
            ['name' => 'Veterinary Pharmacology & Toxicology', 'hod' => 'Dr. F. A. Gberindyer'],
            ['name' => 'Veterinary Physiology & Biochemistry', 'hod' => 'Dr. V. M. Ahur'],
            ['name' => 'Veterinary Microbiology', 'hod' => 'Prof. C. A. Akwuobu'],
            ['name' => 'Veterinary Pathology', 'hod' => 'Dr. S. A. Ode'],
            ['name' => 'Veterinary Public Health & Preventive Medicine', 'hod' => 'Dr. P. M. Ikye-Tor'],
            ['name' => 'Veterinary Surgery & Diagnostic Imaging', 'hod' => 'Dr. T. O. Nev'],
            ['name' => 'Veterinary Medicine', 'hod' => 'Dr. N. Nzelu'],
            ['name' => 'Theriogenology', 'hod' => 'Dr. T. Terzungwe']
        ]
    ]
];
?>

<div class="college-directory-container">
    <div class="directory-search">
        <div class="search-box-wrapper">
            <i class="fa fa-search search-icon"></i>
            <input type="text" id="college-search" placeholder="Search colleges, departments, or deans..." onkeyup="filterColleges()">
        </div>
        <div class="directory-stats-summary">
            <span><strong>11</strong> Colleges</span>
            <span><strong>76</strong> Departments</span>
            <span><strong>185</strong> Professors</span>
        </div>
    </div>

    <div class="colleges-grid" id="colleges-list">
        <?php foreach ($colleges as $col): ?>
            <div class="college-card-interactive" data-name="<?= e(strtolower($col['name'])) ?>" data-dean="<?= e(strtolower($col['dean'])) ?>" data-deps="<?= e(strtolower(implode(' ', array_column($col['departments'], 'name')))) ?>">
                <div class="college-card-header">
                    <span class="college-code"><?= e($col['code']) ?></span>
                    <h3><?= e($col['name']) ?></h3>
                    <div class="dean-info">
                        <i class="fa fa-user-circle"></i>
                        <span><strong>Dean:</strong> <?= e($col['dean']) ?></span>
                    </div>
                </div>
                <div class="college-card-body">
                    <div class="college-meta-metrics">
                        <div class="metric">
                            <i class="fa fa-users"></i>
                            <span><?= number_format($col['students_ug']) ?> <small>UG</small></span>
                        </div>
                        <div class="metric">
                            <i class="fa fa-graduation-cap"></i>
                            <span><?= number_format($col['students_pg']) ?> <small>PG</small></span>
                        </div>
                        <div class="metric">
                            <i class="fa fa-star"></i>
                            <span><?= $col['professors'] ?> <small>Profs</small></span>
                        </div>
                    </div>
                    
                    <div class="departments-toggle-section">
                        <button class="toggle-deps-btn" onclick="toggleDepartments(this)">
                            <span>View Departments (<?= count($col['departments']) ?>)</span>
                            <i class="fa fa-chevron-down"></i>
                        </button>
                        <div class="departments-list-slide">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Department</th>
                                        <th>HOD</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($col['departments'] as $dep): ?>
                                        <tr>
                                            <td><?= e($dep['name']) ?></td>
                                            <td class="hod-name"><small><?= e($dep['hod']) ?></small></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- Upcoming Academic Colleges -->
    <div class="upcoming-colleges-section">
        <div class="upcoming-header">
            <i class="fa fa-rocket"></i>
            <h3>Upcoming Colleges & Departments</h3>
        </div>
        <div class="upcoming-grid">
            <div class="upcoming-card">
                <h4>College of Computing Sciences</h4>
                <ul>
                    <li><i class="fa fa-shield"></i> Cybersecurity</li>
                    <li><i class="fa fa-code"></i> Software Engineering</li>
                    <li><i class="fa fa-desktop"></i> Computer Science</li>
                    <li><i class="fa fa-database"></i> Data Science</li>
                </ul>
            </div>
            <div class="upcoming-card">
                <h4>College of Health Sciences</h4>
                <ul>
                    <li><i class="fa fa-heartbeat"></i> Medicine & Surgery</li>
                    <li><i class="fa fa-medkit"></i> Nursing</li>
                    <li><i class="fa fa-stethoscope"></i> Dental Surgery</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<script>
function filterColleges() {
    const query = document.getElementById('college-search').value.toLowerCase();
    const cards = document.querySelectorAll('.college-card-interactive');
    cards.forEach(card => {
        const name = card.dataset.name;
        const dean = card.dataset.dean;
        const deps = card.dataset.deps;
        if (name.includes(query) || dean.includes(query) || deps.includes(query)) {
            card.style.display = 'flex';
        } else {
            card.style.display = 'none';
        }
    });
}

function toggleDepartments(btn) {
    const list = btn.nextElementSibling;
    const icon = btn.querySelector('.fa-chevron-down') || btn.querySelector('.fa-chevron-up');
    btn.classList.toggle('active');
    list.classList.toggle('open');
    if (list.classList.contains('open')) {
        icon.className = 'fa fa-chevron-up';
    } else {
        icon.className = 'fa fa-chevron-down';
    }
}
</script>
