<?php
if (!defined('DATA_DIR')) { exit; }

$executives = [
    ['name' => 'Engr. Dr. Theophilus Terkura Ukaa', 'role' => 'National President'],
    ['name' => 'Engr. Terhemba Agber', 'role' => 'National Vice President'],
    ['name' => 'Dr. Joel Nguper Dzongo', 'role' => 'National Secretary'],
    ['name' => 'Mr. Philip Swende', 'role' => 'National Assistant Secretary'],
    ['name' => 'Dr. Terungwa James Age', 'role' => 'National Publicity Secretary'],
    ['name' => 'Dr. Mrs. Dinah Ahure', 'role' => 'National Welfare Officer'],
    ['name' => 'Mr. James Aondona Ishoribo', 'role' => 'National Treasurer'],
    ['name' => 'Mr. Raphael Vangervihi', 'role' => 'National Financial Secretary'],
    ['name' => 'Mr. Tor Daniel', 'role' => 'National Auditor'],
    ['name' => 'Prof. Sylvester Aye', 'role' => 'Ex-officio']
];

$prominent = [
    [
        'name' => 'Engr. Prof. Joseph T. Utsev',
        'role' => 'Hon Minister of Water Resources & Sanitation',
        'image' => 'images/docx/image40.jpeg',
        'bio' => 'A distinguished academic and professor of water engineering, currently serving as the Honorable Minister of Water Resources & Sanitation of the Federal Republic of Nigeria.'
    ],
    [
        'name' => 'Dr. Amos J. Dangut',
        'role' => 'Head of National Office, West African Examination Council',
        'image' => 'images/docx/image39.jpeg',
        'bio' => 'An experienced administrator serving as the Head of National Office (HNO) of the West African Examinations Council (WAEC) in Nigeria.'
    ],
    [
        'name' => 'Engr. Abdul Mohammed Bello',
        'role' => 'MD/CEO, Nigeria Independent Systems Operator (NISO)',
        'image' => 'images/docx/image38.jpeg',
        'bio' => 'A prominent power system engineer leading the Nigeria Independent Systems Operator (NISO) as the Managing Director and Chief Executive Officer.'
    ],
    [
        'name' => 'Engr. Mansur Alhaji Sambo',
        'role' => 'Group General Manager, Nigeria National Petroleum Corporation',
        'image' => 'images/docx/image41.png',
        'bio' => 'A seasoned energy expert who served as the Group General Manager of the Nigeria National Petroleum Corporation (NNPC).'
    ],
    [
        'name' => 'HRH Engr. Timothy Tavershima Ahile',
        'role' => 'Ter Kwande (Traditional Ruler)',
        'image' => 'images/docx/image42.jpeg',
        'bio' => 'A registered professional engineer and prominent traditional ruler, serving as the Ter Kwande of Kwande Local Government Area in Benue State.'
    ],
    [
        'name' => 'Engr. Prof. Nentawe Goshwe Yilwatda',
        'role' => 'National Chairman, APC & Former Minister of Humanitarian Affairs',
        'image' => 'images/docx/image43.png',
        'bio' => 'An academic, politician, and digital engineering expert, serving as the National Chairman of the All Progressives Congress and former Minister of Humanitarian Affairs.'
    ]
];

$other_prominent = [
    ['name' => 'AVM Ja’faru Ibrahim Yahaya (Rtd)', 'role' => 'Former Chief of Logistics, Nigerian Airforce (NAF)'],
    ['name' => 'Engr. Prof. Isaac Nathaniel Itodo', 'role' => 'Vice Chancellor, Joseph Sarwuan Tarka University, Makurdi'],
    ['name' => 'HRH Sef Batura', 'role' => 'Chief of Batura traditional council'],
    ['name' => 'Engr. Terser Ninga', 'role' => 'Managing Director, Lower Benue River Basin Development Authority, Makurdi'],
    ['name' => 'Dr. Madang Ayuba Dasbak', 'role' => 'Former Provost, College of Agriculture, Garkawa, Plateau State'],
    ['name' => 'Hon. Bright Abike', 'role' => 'Chairman, Sapele Local Government, Sapele, Delta State'],
    ['name' => 'Prof. Renata Elad', 'role' => 'School of Business, Abraham Baldwin Agricultural College, Georgia, USA'],
    ['name' => 'Dr. John Oloche Onuh', 'role' => 'Assistant Professor, Tuskegee University, Tuskegee, Alabama, USA'],
    ['name' => 'Mr. Danjuma Bujuje', 'role' => 'Former Permanent Secretary, Taraba State Government, Jalingo'],
    ['name' => 'Dr. Memuna Audu', 'role' => 'Former Permanent Secretary, Kogi State Government, Lokoja'],
    ['name' => 'Engr. Nda Isiah', 'role' => 'Managing Director, Leadership Newspaper, Abuja'],
    ['name' => 'Engr. Williams Ella', 'role' => 'State Director, National Youth Service Corps, Jalingo, Taraba State'],
    ['name' => 'Mr. Tsavwua Gborgyo', 'role' => 'Former Provost, College of Education, Katsina-Ala, Benue State'],
    ['name' => 'Engr. Samuel Ahemen', 'role' => 'Former Rector, Akperan Orshi College of Agriculture, Yandev, Gboko, Benue State']
];

$prof_jostum = [
    ['sno' => '1', 'name' => 'Itodo, Nathaniel Isaac', 'dept' => 'Agricultural & Biosystems Engineering'],
    ['sno' => '2', 'name' => 'Gundu, David Terfa', 'dept' => 'Mechanical Engineering'],
    ['sno' => '3', 'name' => 'Idoga, Shaibu', 'dept' => 'Soil Science'],
    ['sno' => '4', 'name' => 'Momoh, Michael O.', 'dept' => 'Animal Breeding & Physiology'],
    ['sno' => '5', 'name' => 'Ojo, Gabriel Ogala Samuel', 'dept' => 'Crop Production'],
    ['sno' => '6', 'name' => 'Ekefan, Ebenezer Jonathan', 'dept' => 'Crop Protection'],
    ['sno' => '7', 'name' => 'Ali, Aminu', 'dept' => 'Soil Science'],
    ['sno' => '8', 'name' => 'Okwoche, Victoria Ada', 'dept' => 'Agricultural Economics'],
    ['sno' => '9', 'name' => 'Ashwe, Abugh', 'dept' => 'Mechanical Engineering'],
    ['sno' => '10', 'name' => 'Joel, Manasseh', 'dept' => 'Civil Engineering'],
    ['sno' => '11', 'name' => 'Vange, Terkimbi', 'dept' => 'Crop Production'],
    ['sno' => '12', 'name' => 'Akuto, Grace Wandoo', 'dept' => 'Agricultural & Science Education'],
    ['sno' => '13', 'name' => 'Kaankuka, Theresa Kangyang', 'dept' => 'Agricultural & Biosystems Engineering'],
    ['sno' => '14', 'name' => 'Tuleun, Comfort Dooshima', 'dept' => 'Animal Nutrition'],
    ['sno' => '15', 'name' => 'Okwu, Oto Jacob', 'dept' => 'Agricultural Extension'],
    ['sno' => '16', 'name' => 'Abu, Orefi', 'dept' => 'Agricultural Economics'],
    ['sno' => '17', 'name' => 'Naswem, Adolphus Angol', 'dept' => 'Agricultural Extension'],
    ['sno' => '18', 'name' => 'Aboiyar, Terhemen', 'dept' => 'Mathematics'],
    ['sno' => '19', 'name' => 'Igbabul, Dooshima B.', 'dept' => 'Food Science & Technology'],
    ['sno' => '20', 'name' => 'Agbo, Diana Ada', 'dept' => 'Home Economics'],
    ['sno' => '21', 'name' => 'Eneji, Ishaq Shaibu', 'dept' => 'Chemistry'],
    ['sno' => '22', 'name' => 'Tee, Nobert Terver', 'dept' => 'Environmental Forestry'],
    ['sno' => '23', 'name' => 'Ugese, Felix Detuhan', 'dept' => 'Crop Production'],
    ['sno' => '24', 'name' => 'Abagyeh, Solomon Orpinga', 'dept' => 'Soil Science'],
    ['sno' => '25', 'name' => 'Agber, Philip Ijirbee', 'dept' => 'Soil Science'],
    ['sno' => '26', 'name' => 'Akpen, Gabriel Delian', 'dept' => 'Civil Engineering'],
    ['sno' => '27', 'name' => 'Abakpa, Benjamin O.', 'dept' => 'Agricultural & Science Education'],
    ['sno' => '28', 'name' => 'Ejembi, Simon Ameh', 'dept' => 'Agricultural Extension'],
    ['sno' => '29', 'name' => 'Shomkegh, A. Simon', 'dept' => 'Environmental Forestry'],
    ['sno' => '30', 'name' => 'Awulu, John Okanagba', 'dept' => 'Agricultural & Biosystems Engineering'],
    ['sno' => '31', 'name' => 'Abuul,  Terungwa B. Tyowua', 'dept' => 'Wildlife & Range Management'],
    ['sno' => '32', 'name' => 'Ahemen, Terzungwe', 'dept' => 'Animal Breeding & Physiology'],
    ['sno' => '33', 'name' => 'Kuhe ,Aondoyila Moses', 'dept' => 'Mechanical Engineering'],
    ['sno' => '34', 'name' => 'Tembe, Emmanuel Terzungwe', 'dept' => 'Forest Products & Production'],
    ['sno' => '35', 'name' => 'Olatunji, Olalekan', 'dept' => 'Soil Science'],
    ['sno' => '36', 'name' => 'Shaahu, Terhemba David', 'dept' => 'Animal Production'],
    ['sno' => '37', 'name' => 'Enokela, Shadrach Onum', 'dept' => 'Environmental Engineering'],
    ['sno' => '38', 'name' => 'Bam, Sebastine Aondoavera', 'dept' => 'Mechanical Engineering'],
    ['sno' => '39', 'name' => 'Agbo, Tonnie O', 'dept' => 'Agricultural & Science Education'],
    ['sno' => '40', 'name' => 'Iormbor, T. Terhemba', 'dept' => 'Animal Nutrition'],
    ['sno' => '41', 'name' => 'Sombo, Terver', 'dept' => 'Physics'],
    ['sno' => '42', 'name' => 'Anjembe, Christian Bemgba', 'dept' => 'Soil Science'],
    ['sno' => '43', 'name' => 'Aye, Goodness C.', 'dept' => 'Agricultural Economics'],
    ['sno' => '44', 'name' => 'Ancha, Paul Ukper', 'dept' => 'Social & Environmental Forestry'],
    ['sno' => '45', 'name' => 'Asogwa, Benjamin Chijioke', 'dept' => 'Agricultural Economics'],
    ['sno' => '46', 'name' => 'Age, I. Akoso', 'dept' => 'Agricultural Extension'],
    ['sno' => '47', 'name' => 'Biam, Celine Kenger', 'dept' => 'Agricultural Economics'],
    ['sno' => '48', 'name' => 'Oloche, Juliana', 'dept' => 'Animal Production'],
    ['sno' => '49', 'name' => 'Ivande, Pauline Dooshima', 'dept' => 'Home Economics'],
    ['sno' => '50', 'name' => 'Mom, Joseph M', 'dept' => 'Telecommunication Engineering'],
    ['sno' => '51', 'name' => 'Egahi, Joseph Ochoche', 'dept' => 'Animal Breeding & Physiology'],
    ['sno' => '52', 'name' => 'Ogebe, O. Francis', 'dept' => 'Agricultural Economics'],
    ['sno' => '53', 'name' => 'Ikpambese, K. Kumaden', 'dept' => 'Mechanical Engineering'],
    ['sno' => '54', 'name' => 'Sengev, Iorfa Abraham', 'dept' => 'Food Science & Technology'],
    ['sno' => '55', 'name' => 'Aye, Sylvester Aondolumun', 'dept' => 'Mechanical Engineering'],
    ['sno' => '56', 'name' => 'Wuanor, Alexander A.', 'dept' => 'Animal Production'],
    ['sno' => '57', 'name' => 'Ikya, Julius Kwagh-Hal', 'dept' => 'Food Science & Technology'],
    ['sno' => '58', 'name' => 'Wever, Daniel Gbanger', 'dept' => 'Agricultural & Science Education'],
    ['sno' => '59', 'name' => 'Ikyaagba, T. Emmanuel', 'dept' => 'Forest Product & Production'],
    ['sno' => '60', 'name' => 'Nnamonu Angela Lami', 'dept' => 'Chemistry'],
    ['sno' => '61', 'name' => 'Kortse, A. Peter', 'dept' => 'Seed Science'],
    ['sno' => '62', 'name' => 'Weye, Emmanuel Angbiandoo', 'dept' => 'Agricultural Economics'],
    ['sno' => '63', 'name' => 'Ashiko, G. Terfa Felix', 'dept' => 'Agribusiness'],
    ['sno' => '64', 'name' => 'Ezihe, Christian Okechukwu', 'dept' => 'Veterinary Physiology'],
    ['sno' => '65', 'name' => 'Anonguku, Iorfa', 'dept' => 'Agricultural Extension'],
    ['sno' => '66', 'name' => 'Abu, Oneh Joseph', 'dept' => 'Food Science & Technology'],
    ['sno' => '67', 'name' => 'Ochefu, Joshua', 'dept' => 'Animal Breeding & Physiology'],
    ['sno' => '68', 'name' => 'Nwakonobi, Ukamaka Theresa', 'dept' => 'Agricultural & Biosystems Engineering'],
    ['sno' => '69', 'name' => 'Wombo, Ado', 'dept' => 'Agriculture & Science Education'],
    ['sno' => '70', 'name' => 'Ijabo, Oga Joshua', 'dept' => 'Agricultural & Biosystems Engineering'],
    ['sno' => '80', 'name' => 'Edeh, E', 'dept' => 'Civil Engineering'],
    ['sno' => '81', 'name' => 'Ahemen, Terzungwe', 'dept' => 'Animal Science'],
    ['sno' => '82', 'name' => 'Gbemga, Anjambe', 'dept' => 'Agronomy'],
    ['sno' => '83', 'name' => 'Ibrahim, Sunday Jacob', 'dept' => 'Mechanical Engineering'],
];

$prof_elsewhere = [
    ['sno' => '1', 'name' => 'Prof. Chinenye Ikpo-Anyadike', 'dept' => 'Agricultural Engineering', 'univ' => 'University of Nigeria, Nsukka'],
    ['sno' => '2', 'name' => 'Prof. William Okonkwo', 'dept' => 'Agricultural Engineering', 'univ' => 'University of Nigeria, Nsukka'],
    ['sno' => '3', 'name' => 'Prof. Julian Anonye', 'dept' => 'Food Technology', 'univ' => 'Federal University of Technology, Minna'],
    ['sno' => '4', 'name' => 'Prof. Martins Y. Otache', 'dept' => 'Agricultural Engineering', 'univ' => 'Federal University of Technology, Minna'],
    ['sno' => '5', 'name' => 'Prof. Chiemela Chima', 'dept' => 'Food Technology', 'univ' => 'Federal University of Technology, Minna'],
    ['sno' => '6', 'name' => 'Prof. Edwin Idu', 'dept' => 'Agricultural Economics', 'univ' => 'University of Abuja'],
    ['sno' => '7', 'name' => 'Prof. Robinson Ejila', 'dept' => 'Mechanical Engineering', 'univ' => 'Abubakar Tafawa Balewa University, Bauchi'],
    ['sno' => '8', 'name' => 'Prof. Ibrahim Abdullahi', 'dept' => 'Agronomy', 'univ' => 'Federal University, Lafia'],
    ['sno' => '9', 'name' => 'Prof. Clement Onwu', 'dept' => 'Soil Science', 'univ' => 'Federal University, Wukari'],
    ['sno' => '10', 'name' => 'Prof. Thomas Yesuf', 'dept' => 'Electrical/Electronic Engineering', 'univ' => 'Obafemi Awolowo University, Ile-Ife'],
    ['sno' => '11', 'name' => 'Prof. M. Kekong', 'dept' => 'Soil Science', 'univ' => 'Cross River State University of Science & Technology, Calabar'],
    ['sno' => '12', 'name' => 'Prof. Godfrey Ariave', 'dept' => 'Mechanical Engineering', 'univ' => 'University of Benin, Benin'],
    ['sno' => '13', 'name' => 'Prof. F. Abam', 'dept' => 'Mechanical Engineering', 'univ' => 'University of Calabar'],
    ['sno' => '14', 'name' => 'Prof. Darlington Uzoma Chima', 'dept' => 'Forestry', 'univ' => 'University of Port Harcourt'],
    ['sno' => '15', 'name' => 'Prof. Daniel Gungula', 'dept' => 'Crop Production', 'univ' => 'Modibbo Adama University of Technology, Yola'],
    ['sno' => '16', 'name' => 'Prof. G. Fumen', 'dept' => 'Agricultural Engineering', 'univ' => 'Ahmadu Bello University, Zaria'],
    ['sno' => '17', 'name' => 'Prof. Faith Aladi Sale', 'dept' => '', 'univ' => 'Kogi State University, Ayangba'],
    ['sno' => '18', 'name' => 'Prof. Brenda Eje', 'dept' => 'Agricultural Engineering', 'univ' => 'Enugu State University of Science & Technology, Enugu'],
    ['sno' => '19', 'name' => 'Prof. Grace Jokthan', 'dept' => 'Animal Science', 'univ' => 'National Open University of Nigeria, Abuja'],

];
?>
<div class="alumni-page-container">
    <!-- Tab Bar -->
    <div class="int-tab-bar" style="margin-bottom: 30px;">
        <button class="int-tab-btn active" onclick="switchAlumniTab('executives', this)"><i class="fa fa-users"></i> Alumni Executives</button>
        <button class="int-tab-btn" onclick="switchAlumniTab('prominent', this)"><i class="fa fa-star"></i> Prominent Graduates</button>
        <button class="int-tab-btn" onclick="switchAlumniTab('professors', this)"><i class="fa fa-graduation-cap"></i> Alumni Professors</button>
    </div>

    <!-- Panel 1: Executives -->
    <div class="int-tab-panel active" id="alumni-panel-executives">
        <div class="membership-list-grid" style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 16px;">
            <?php foreach ($executives as $exec): ?>
                <div class="membership-item-card" style="background: #ffffff; border: 1px solid var(--line); border-radius: 12px; padding: 18px 24px; display: flex; align-items: center; gap: 16px; box-shadow: var(--shadow-soft);">
                    <div class="member-avatar" style="width: 44px; height: 44px; border-radius: 50%; background: var(--soft); color: var(--green); display: grid; place-items: center; font-size: 20px; border: 1px solid var(--line);">
                        <i class="fa fa-user-circle"></i>
                    </div>
                    <div>
                        <strong style="display: block; font-size: 15.5px; color: var(--ink);"><?= e($exec['name']) ?></strong>
                        <span style="font-size: 12px; color: var(--muted); font-weight: 750; text-transform: uppercase; letter-spacing: 0.3px;"><?= e($exec['role']) ?></span>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Panel 2: Prominent Alumni -->
    <div class="int-tab-panel" id="alumni-panel-prominent">
        <h3 style="font-family: var(--serif); font-size: 22px; color: var(--green-deep); margin: 0 0 24px; font-weight: 800; border-bottom: 2px solid var(--gold); padding-bottom: 8px; display: inline-block;">Distinguished Alumni Profiles</h3>
        
        <div class="prominent-alumni-grid" style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 30px; margin-bottom: 40px;">
            <?php foreach ($prominent as $alum): ?>
                <div class="alumni-profile-card" style="background: #ffffff; border: 1px solid var(--line); border-radius: 18px; padding: 24px; box-shadow: var(--shadow-soft); display: grid; grid-template-columns: 120px 1fr; gap: 20px; align-items: start;">
                    <div class="alumni-media" style="text-align: center;">
                        <img src="<?= e($alum['image']) ?>" alt="<?= e($alum['name']) ?>" style="width: 100%; height: 140px; object-fit: cover; border-radius: 10px; border: 2px solid var(--line);">
                    </div>
                    <div class="alumni-info">
                        <strong style="display: block; font-size: 16px; color: var(--green-deep); font-weight: 800; margin-bottom: 4px;"><?= e($alum['name']) ?></strong>
                        <span style="display: block; font-size: 12.5px; color: var(--gold); font-weight: 800; text-transform: uppercase; letter-spacing: 0.3px; margin-bottom: 12px; line-height: 1.3;"><?= e($alum['role']) ?></span>
                        <p style="font-size: 13.5px; color: var(--muted); line-height: 1.5; margin: 0;"><?= e($alum['bio']) ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <h3 style="font-family: var(--serif); font-size: 20px; color: var(--green-deep); margin: 30px 0 20px; font-weight: 800; border-bottom: 2px solid var(--gold); padding-bottom: 8px; display: inline-block;">Other Prominent Alumni</h3>
        <div class="membership-list-grid" style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 16px;">
            <?php foreach ($other_prominent as $alum): ?>
                <div class="membership-item-card" style="background: #ffffff; border: 1px solid var(--line); border-radius: 12px; padding: 16px 20px; display: flex; align-items: center; gap: 16px; box-shadow: var(--shadow-soft);">
                    <div class="member-avatar" style="width: 40px; height: 40px; border-radius: 50%; background: var(--soft); color: var(--gold); display: grid; place-items: center; font-size: 18px; border: 1px solid var(--line);">
                        <i class="fa fa-star-o"></i>
                    </div>
                    <div>
                        <strong style="display: block; font-size: 14.5px; color: var(--ink);"><?= e($alum['name']) ?></strong>
                        <span style="font-size: 12px; color: var(--muted); font-weight: 700;"><?= e($alum['role']) ?></span>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Panel 3: Professors -->
    <div class="int-tab-panel" id="alumni-panel-professors">
        <div class="directory-toolbar" style="margin-bottom: 24px;">
            <div class="search-box-wrapper">
                <i class="fa fa-search search-icon"></i>
                <input type="text" id="prof-search" placeholder="Search alumni professors by name, department, or university..." onkeyup="filterProfessors()">
            </div>
            <div class="filter-buttons" style="margin-top: 15px;">
                <button class="filter-btn active" id="btn-prof-jostum" onclick="switchProfSubTab('jostum', this)">At JoSTUM (<?= count($prof_jostum) ?>)</button>
                <button class="filter-btn" id="btn-prof-elsewhere" onclick="switchProfSubTab('elsewhere', this)">At Other Universities (<?= count($prof_elsewhere) ?>)</button>
            </div>
        </div>

        <!-- JoSTUM Professors -->
        <div class="prof-sub-panel active" id="prof-sub-jostum">
            <div class="table-wrap">
                <table>
                    <thead>
                        <tr>
                            <th style="width: 10%;">S/No.</th>
                            <th style="width: 50%;">Professor Name</th>
                            <th style="width: 40%;">Department</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($prof_jostum as $p): ?>
                            <tr class="prof-row jostum-prof" data-search-content="<?= e(strtolower($p['name'] . ' ' . $p['dept'])) ?>">
                                <td><strong><?= e($p['sno']) ?></strong></td>
                                <td class="officer-name"><i class="fa fa-user-md" style="color: var(--green); margin-right: 8px;"></i> <?= e($p['name']) ?></td>
                                <td><?= e($p['dept']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Other Universities Professors -->
        <div class="prof-sub-panel" id="prof-sub-elsewhere">
            <div class="table-wrap">
                <table>
                    <thead>
                        <tr>
                            <th style="width: 10%;">S/No.</th>
                            <th style="width: 30%;">Professor Name</th>
                            <th style="width: 30%;">Department</th>
                            <th style="width: 30%;">University</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($prof_elsewhere as $p): ?>
                            <tr class="prof-row elsewhere-prof" data-search-content="<?= e(strtolower($p['name'] . ' ' . $p['dept'] . ' ' . $p['univ'])) ?>">
                                <td><strong><?= e($p['sno']) ?></strong></td>
                                <td class="officer-name"><i class="fa fa-user-md" style="color: var(--gold); margin-right: 8px;"></i> <?= e($p['name']) ?></td>
                                <td><?= e($p['dept']) ?></td>
                                <td><span class="badge status-interim" style="background: var(--soft); color: var(--gold); border: 1px solid var(--line); font-size: 11px;"><?= e($p['univ']) ?></span></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
let currentProfSubTab = 'jostum';

function switchAlumniTab(tab, btn) {
    document.querySelectorAll('.alumni-page-container > .int-tab-bar .int-tab-btn').forEach(b => b.classList.remove('active'));
    btn.classList.add('active');
    
    document.querySelectorAll('.alumni-page-container > .int-tab-panel').forEach(p => p.classList.remove('active'));
    document.getElementById('alumni-panel-' + tab).classList.add('active');
    
    // Smooth scroll to container offset by sticky header height
    const container = document.querySelector('.alumni-page-container');
    const headerHeight = document.querySelector('.site-header')?.offsetHeight || 90;
    const targetPos = container.getBoundingClientRect().top + window.pageYOffset - headerHeight - 16;
    window.scrollTo({ top: targetPos, behavior: 'smooth' });
}

function switchProfSubTab(subTab, btn) {
    document.querySelectorAll('.alumni-page-container .filter-btn').forEach(b => b.classList.remove('active'));
    btn.classList.add('active');
    
    document.querySelectorAll('.prof-sub-panel').forEach(p => p.classList.remove('active'));
    document.getElementById('prof-sub-' + subTab).classList.add('active');
    currentProfSubTab = subTab;
    filterProfessors();
}

function filterProfessors() {
    const query = document.getElementById('prof-search').value.toLowerCase();
    const rows = document.querySelectorAll('.prof-row');
    
    rows.forEach(row => {
        const isJostum = row.classList.contains('jostum-prof');
        const isCorrectSubTab = (currentProfSubTab === 'jostum' && isJostum) || (currentProfSubTab === 'elsewhere' && !isJostum);
        const searchContent = row.dataset.searchContent;
        
        if (isCorrectSubTab && searchContent.includes(query)) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
}
</script>

<style>
.prof-sub-panel {
    display: none;
}
.prof-sub-panel.active {
    display: block;
}
.alumni-profile-card:hover {
    transform: translateY(-2px);
    border-color: var(--green) !important;
}
.alumni-profile-card {
    transition: all 0.25s ease;
}
</style>
