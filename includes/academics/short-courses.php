<?php
if (!defined('DATA_DIR')) {
    exit;
}

$procurementCourses = [
    ['code' => 'PSC 01', 'title' => 'Introduction to Procurement in the Public and Private Sectors'],
    ['code' => 'PSC 02', 'title' => 'Public Procurement Management/ Supervision and Procurement Audit'],
    ['code' => 'PSC 03', 'title' => 'Strategic Procurement Planning and Budgeting'],
    ['code' => 'PSC 04', 'title' => 'Procurement for Design, Supply and Installation of Electro-Mechanical Plant'],
    ['code' => 'PSC 05', 'title' => 'Procurement Management for works'],
    ['code' => 'PSC 06', 'title' => 'Procurement Management for Goods'],
    ['code' => 'PSC 07', 'title' => 'Sustainable Public Procurement (Economic, Social and Environmental Considerations)'],
    ['code' => 'PSC 08', 'title' => 'Selection and Recruitment of Consultants'],
    ['code' => 'PSC 09', 'title' => 'Advanced Contract Management'],
    ['code' => 'PSC 10', 'title' => 'Engineering Procurement Ethics and practice'],
    ['code' => 'PSC 11', 'title' => 'Small Scale Enterprises (SMEs) Participation in Public Bids'],
    ['code' => 'PSC 12', 'title' => 'Procurement Leadership']
];

$environmentalCourses = [
    ['code' => 'ESC 01', 'title' => 'Environmental and Social Impact Assessment Process (ESIA) in Nigeria'],
    ['code' => 'ESC 02', 'title' => 'Development of the Environmental and Social Management Plan (ESMP)'],
    ['code' => 'ESC 03', 'title' => 'Environmental and social standards in Multilateral financial Institutions'],
    ['code' => 'ESC 04', 'title' => 'Key Factors of the Environmental and Social Impact Assessment (ESIA)'],
    ['code' => 'ESC 05', 'title' => 'Development of the Environmental and Social Commitment Plan (ESCP)'],
    ['code' => 'ESC 06', 'title' => 'Development of Environmental and Social Impact Assessment (ESIA) Terms of Reference (TOR)'],
    ['code' => 'ESC 07', 'title' => 'Safeguard Policies of the World Bank'],
    ['code' => 'ESC 08', 'title' => 'Review Process of the Environmental and Social Impact Assessment (ESIA)'],
    ['code' => 'ESC 09', 'title' => 'Disaster Risk Management'],
    ['code' => 'ESC 10', 'title' => 'Environmental and Social Framework (ESF) and the Environmental and Social Assessment (ESA) Process'],
    ['code' => 'ESC 11', 'title' => 'Sustainable e-waste management'],
    ['code' => 'ESC 12', 'title' => 'Freshwater microplastic pollution management'],
    ['code' => 'ESC 13', 'title' => 'Agrochemicals and environmental sustainability'],
    ['code' => 'ESC 14', 'title' => 'Integrated pest management'],
    ['code' => 'ESC 15', 'title' => 'Biodiversity and Conservation'],
    ['code' => 'ESC 16', 'title' => 'Climate Smart Agriculture'],
    ['code' => 'ESC 17', 'title' => 'Environmental Health and Safety'],
    ['code' => 'ESC 18', 'title' => 'Sustainable Aquaculture'],
    ['code' => 'ESC 19', 'title' => 'Best Practices in Environmental Sustainability'],
    ['code' => 'ESC 20', 'title' => 'Nano plastic Pollution, Mitigation and Prevention']
];

$socialCourses = [
    ['code' => 'SSC 01', 'title' => 'Regulatory Framework for Social Standards in Nigeria'],
    ['code' => 'SSC 02', 'title' => 'Social Impact Identification and Assessment'],
    ['code' => 'SSC 03', 'title' => 'Community Engagement for Development Project Sustainability'],
    ['code' => 'SSC 04', 'title' => 'Gender Issues in Displacement and Resettlement'],
    ['code' => 'SSC 05', 'title' => 'Internally Displaced Persons and Livelihood Impacts, Improvement/ Restoration Strategies'],
    ['code' => 'SSC 06', 'title' => 'Trauma Management in Displacement and Resettlement'],
    ['code' => 'SSC 07', 'title' => 'Land Use, Resettlement Planning and Implementation'],
    ['code' => 'SSC 08', 'title' => 'Asset Valuation and Compensation'],
    ['code' => 'SSC 09', 'title' => 'Grievance Redress Mechanism'],
    ['code' => 'SSC 10', 'title' => 'Alternative means of Land Acquisition, Loss of Access and Use Restriction'],
    ['code' => 'SSC 11', 'title' => 'Adaptive Management in Resettlement Planning and Implementation'],
    ['code' => 'SSC 12', 'title' => 'Community Health and Safety Management in Development Projects'],
    ['code' => 'SSC 13', 'title' => 'Labour and Working Conditions in Development Projects'],
    ['code' => 'SSC 14', 'title' => 'Building Social Equity in Governance'],
    ['code' => 'SSC 15', 'title' => 'Gender and Social Inclusion for Development'],
    ['code' => 'SSC 16', 'title' => 'Environmental and Social Risk Management'],
    ['code' => 'SSC 17', 'title' => 'Sustainable Land Acquisition and Resettlement'],
    ['code' => 'SSC 18', 'title' => 'Indigenous Peoples and Cultural Heritage'],
    ['code' => 'SSC 19', 'title' => 'Stakeholder Engagement and Community Development'],
    ['code' => 'SSC 20', 'title' => 'Social Standards']
];

$tracks = [
    ['letter' => 'A', 'name' => 'Executive Short Courses', 'duration' => '5 Days', 'desc' => 'High-impact capacity building modules designed for professionals, civil servants, and administrators looking for standard certifications.'],
    ['letter' => 'B', 'name' => 'Advanced Certificate Course', 'duration' => '3 Weeks', 'desc' => 'In-depth professional development program featuring advanced case studies, regulatory studies, and technical workshops.'],
    ['letter' => 'C', 'name' => 'Postgraduate Diploma (PGD)', 'duration' => '1 Year', 'desc' => 'Academic and practical grounding for graduates transitioning into professional roles in environment, social, or procurement sectors.'],
    ['letter' => 'D', 'name' => 'Master of Science (M.Sc.)', 'duration' => '2 Years', 'desc' => 'Comprehensive research and competency-based postgraduate degree, preparing leaders for national and international development agencies.'],
    ['letter' => 'E', 'name' => 'Bachelor of Science (B.Sc.)', 'duration' => '8 Semesters', 'desc' => 'Rigorous undergraduate degree path for high school graduates to build a solid foundational career in specialized sustainability disciplines.'],
    ['letter' => 'F', 'name' => 'Doctor of Philosophy (PhD)', 'duration' => '3-4 Years', 'desc' => 'Advanced doctoral research and dissertation program focused on producing innovative academic, policy, and institutional frameworks.']
];
?>

<div class="courses-hub-container">
    <div class="courses-hub-header">
        <div class="institute-badge">World Bank Centre of Excellence</div>
        <p>The Institute for Procurement, Environmental and Social Standards (IPESS / CIPESS) offers cutting-edge professional and academic training paths.</p>
    </div>

    <!-- Certification Tracks / Pathways -->
    <div class="certification-pathways-section">
        <h3>Academic & Professional Pathways</h3>
        <div class="pathways-grid">
            <?php foreach ($tracks as $track): ?>
                <div class="pathway-card">
                    <div class="pathway-badge">Track <?= $track['letter'] ?></div>
                    <h4><?= e($track['name']) ?></h4>
                    <span class="pathway-duration"><i class="fa fa-clock-o"></i> <?= e($track['duration']) ?></span>
                    <p><?= e($track['desc']) ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Course Catalog Section -->
    <div class="course-catalog-section">
        <div class="catalog-header-bar">
            <h3>Executive Course Catalog</h3>
            <div class="search-box-wrapper">
                <i class="fa fa-search search-icon"></i>
                <input type="text" id="course-search" placeholder="Search courses or codes..." onkeyup="filterCourses()">
            </div>
        </div>
        
        <div class="catalog-tab-bar">
            <button class="catalog-tab-btn active" data-tab="procurement" onclick="switchCatalogTab('procurement', this)">
                <i class="fa fa-shopping-cart"></i> Procurement (<?= count($procurementCourses) ?>)
            </button>
            <button class="catalog-tab-btn" data-tab="environmental" onclick="switchCatalogTab('environmental', this)">
                <i class="fa fa-leaf"></i> Environmental (<?= count($environmentalCourses) ?>)
            </button>
            <button class="catalog-tab-btn" data-tab="social" onclick="switchCatalogTab('social', this)">
                <i class="fa fa-users"></i> Social (<?= count($socialCourses) ?>)
            </button>
        </div>

        <div class="catalog-list-content">
            <!-- Procurement Tab -->
            <div class="catalog-tab-panel active" id="panel-procurement">
                <div class="course-list-grid">
                    <?php foreach ($procurementCourses as $c): ?>
                        <div class="course-item-card" data-search="<?= e(strtolower($c['code'] . ' ' . $c['title'])) ?>">
                            <span class="course-code-tag"><?= e($c['code']) ?></span>
                            <h4><?= e($c['title']) ?></h4>
                            <div class="course-meta">
                                <span><i class="fa fa-calendar-check-o"></i> Executive Short Course</span>
                                <span><i class="fa fa-hourglass-half"></i> 5 Days</span>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Environmental Tab -->
            <div class="catalog-tab-panel" id="panel-environmental">
                <div class="course-list-grid">
                    <?php foreach ($environmentalCourses as $c): ?>
                        <div class="course-item-card" data-search="<?= e(strtolower($c['code'] . ' ' . $c['title'])) ?>">
                            <span class="course-code-tag"><?= e($c['code']) ?></span>
                            <h4><?= e($c['title']) ?></h4>
                            <div class="course-meta">
                                <span><i class="fa fa-calendar-check-o"></i> Executive Short Course</span>
                                <span><i class="fa fa-hourglass-half"></i> 5 Days</span>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Social Tab -->
            <div class="catalog-tab-panel" id="panel-social">
                <div class="course-list-grid">
                    <?php foreach ($socialCourses as $c): ?>
                        <div class="course-item-card" data-search="<?= e(strtolower($c['code'] . ' ' . $c['title'])) ?>">
                            <span class="course-code-tag"><?= e($c['code']) ?></span>
                            <h4><?= e($c['title']) ?></h4>
                            <div class="course-meta">
                                <span><i class="fa fa-calendar-check-o"></i> Executive Short Course</span>
                                <span><i class="fa fa-hourglass-half"></i> 5 Days</span>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
let activeTab = 'procurement';

function switchCatalogTab(tab, btn) {
    document.querySelectorAll('.catalog-tab-btn').forEach(b => b.classList.remove('active'));
    document.querySelectorAll('.catalog-tab-panel').forEach(p => p.classList.remove('active'));
    
    btn.classList.add('active');
    document.getElementById('panel-' + tab).classList.add('active');
    activeTab = tab;
    
    // Trigger filter reset or re-filter on tab change
    filterCourses();
}

function filterCourses() {
    const query = document.getElementById('course-search').value.toLowerCase();
    const panel = document.getElementById('panel-' + activeTab);
    const cards = panel.querySelectorAll('.course-item-card');
    
    cards.forEach(card => {
        const text = card.dataset.search;
        if (text.includes(query)) {
            card.style.display = 'flex';
        } else {
            card.style.display = 'none';
        }
    });
}
</script>
