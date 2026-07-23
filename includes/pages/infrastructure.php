<?php
if (!defined('DATA_DIR')) { exit; }
?>
<div class="infrastructure-page-container">
    <!-- Switcher Tabs -->
    <div class="int-tab-bar" style="margin-bottom: 30px;">
        <button class="int-tab-btn active" onclick="switchInfraTab('libraries', this)"><i class="fa fa-book"></i> Libraries</button>
        <button class="int-tab-btn" onclick="switchInfraTab('hostels', this)"><i class="fa fa-building-o"></i> Hostels</button>
        <button class="int-tab-btn" onclick="switchInfraTab('solar', this)"><i class="fa fa-sun-o"></i> Energy & Health</button>
        <button class="int-tab-btn" onclick="switchInfraTab('new-infra', this)"><i class="fa fa-rocket"></i> New Buildings</button>
    </div>

    <!-- Panel 1: Libraries -->
    <div class="int-tab-panel active" id="infra-panel-libraries">
        <div class="pro-chancellor-panel" style="display: grid; grid-template-columns: 320px 1fr; gap: 30px; background: #ffffff; border: 1px solid var(--line); border-radius: 18px; padding: 30px; box-shadow: var(--shadow-soft); margin-bottom: 40px; align-items: start;">
            <div class="pro-chancellor-media" style="text-align: center;">
                <img src="images/docx/image24.png" alt="Francis Suleimanu Idachaba Library" style="width: 100%; border-radius: 12px; box-shadow: var(--shadow); border: 4px solid #ffffff;">
                <span style="display: block; font-size: 13px; font-weight: 750; color: var(--green-dark); margin-top: 12px;">Francis Suleimanu Idachaba Library</span>
            </div>
            <div>
                <h3 style="font-family: var(--serif); font-size: 24px; color: var(--green-deep); margin: 0 0 16px; font-weight: 850;">Francis Suleimanu Idachaba Library (Main Library)</h3>
                <p style="font-size: 14.5px; color: var(--muted); line-height: 1.6; margin-bottom: 20px;">
                    Located at the North Core of the University, the main library serves as the central hub for learning, academic research, and reference services. It is stocked with extensive physical books, journals, and a modern electronic resources database.
                </p>
                
                <h4 style="font-family: var(--serif); font-size: 18px; color: var(--green-deep); margin: 0 0 12px; font-weight: 800;">College & Specialized Libraries</h4>
                <div class="membership-list-grid" style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 12px;">
                    <div style="background: var(--soft); border: 1px solid var(--line); border-radius: 8px; padding: 12px 16px; font-size: 13.5px; color: var(--ink);">
                        <i class="fa fa-bookmark" style="color: var(--green); margin-right: 8px;"></i>
                        <strong>Animal Science Library</strong> <small style="display:block; color:var(--muted)">North Core</small>
                    </div>
                    <div style="background: var(--soft); border: 1px solid var(--line); border-radius: 8px; padding: 12px 16px; font-size: 13.5px; color: var(--ink);">
                        <i class="fa fa-bookmark" style="color: var(--green); margin-right: 8px;"></i>
                        <strong>Veterinary Medicine Library</strong> <small style="display:block; color:var(--muted)">South Core</small>
                    </div>
                    <div style="background: var(--soft); border: 1px solid var(--line); border-radius: 8px; padding: 12px 16px; font-size: 13.5px; color: var(--ink);">
                        <i class="fa fa-bookmark" style="color: var(--green); margin-right: 8px;"></i>
                        <strong>Forestry & Fisheries Library</strong> <small style="display:block; color:var(--muted)">North Core</small>
                    </div>
                    <div style="background: var(--soft); border: 1px solid var(--line); border-radius: 8px; padding: 12px 16px; font-size: 13.5px; color: var(--ink);">
                        <i class="fa fa-bookmark" style="color: var(--green); margin-right: 8px;"></i>
                        <strong>Engineering Library</strong> <small style="display:block; color:var(--muted)">Middle Core</small>
                    </div>
                    <div style="background: var(--soft); border: 1px solid var(--line); border-radius: 8px; padding: 12px 16px; font-size: 13.5px; color: var(--ink);">
                        <i class="fa fa-bookmark" style="color: var(--green); margin-right: 8px;"></i>
                        <strong>Management Science Library</strong> <small style="display:block; color:var(--muted)">Middle Core</small>
                    </div>
                    <div style="background: var(--soft); border: 1px solid var(--line); border-radius: 8px; padding: 12px 16px; font-size: 13.5px; color: var(--ink);">
                        <i class="fa fa-bookmark" style="color: var(--green); margin-right: 8px;"></i>
                        <strong>Food Tech & Human Ecology Library</strong> <small style="display:block; color:var(--muted)">Middle Core</small>
                    </div>
                    <div style="background: var(--soft); border: 1px solid var(--line); border-radius: 8px; padding: 12px 16px; font-size: 13.5px; color: var(--ink);">
                        <i class="fa fa-bookmark" style="color: var(--green); margin-right: 8px;"></i>
                        <strong>Education Library</strong> <small style="display:block; color:var(--muted)">South Core</small>
                    </div>
                    <div style="background: var(--soft); border: 1px solid var(--line); border-radius: 8px; padding: 12px 16px; font-size: 13.5px; color: var(--ink);">
                        <i class="fa fa-bookmark" style="color: var(--green); margin-right: 8px;"></i>
                        <strong>Veterinary Teaching Hosp. Library</strong> <small style="display:block; color:var(--muted)">North Bank, Makurdi</small>
                    </div>
                    <div style="background: var(--soft); border: 1px solid var(--line); border-radius: 8px; padding: 12px 16px; font-size: 13.5px; color: var(--ink); grid-column: span 2;">
                        <i class="fa fa-bookmark" style="color: var(--green); margin-right: 8px;"></i>
                        <strong>Remedial Library</strong> <small style="display:block; color:var(--muted)">University Annex, Makurdi</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Panel 2: Hostels -->
    <div class="int-tab-panel" id="infra-panel-hostels">
        <div class="pro-chancellor-panel" style="display: grid; grid-template-columns: 320px 1fr; gap: 30px; background: #ffffff; border: 1px solid var(--line); border-radius: 18px; padding: 30px; box-shadow: var(--shadow-soft); margin-bottom: 40px; align-items: start;">
            <div class="pro-chancellor-media" style="text-align: center;">
                <img src="images/docx/image25.png" alt="Student Hostels" style="width: 100%; border-radius: 12px; box-shadow: var(--shadow); border: 4px solid #ffffff;">
                <span style="display: block; font-size: 13px; font-weight: 750; color: var(--green-dark); margin-top: 12px;">Students' Hostels at South Core</span>
            </div>
            <div>
                <h3 style="font-family: var(--serif); font-size: 24px; color: var(--green-deep); margin: 0 0 16px; font-weight: 850;">Student Accommodation</h3>
                <p style="font-size: 14.5px; color: var(--muted); line-height: 1.6; margin-bottom: 24px;">
                    JoSTUM provides conducive on-campus accommodation for students at the South Core of the university. The university operates **twelve (12) hostels** in total, divided into:
                </p>
                <div class="stats-overview-grid" style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px;">
                    <div class="metric-summary-card" style="background: var(--soft); border: 1px solid var(--line); border-radius: 12px; padding: 16px; text-align: center;">
                        <strong style="font-size: 28px; color: var(--green); display:block;">12</strong>
                        <span style="font-size: 11px; color: var(--muted); text-transform:uppercase; font-weight:700">Total Hostels</span>
                    </div>
                    <div class="metric-summary-card" style="background: var(--soft); border: 1px solid var(--line); border-radius: 12px; padding: 16px; text-align: center;">
                        <strong style="font-size: 28px; color: var(--green); display:block;">5</strong>
                        <span style="font-size: 11px; color: var(--muted); text-transform:uppercase; font-weight:700">Male Hostels</span>
                    </div>
                    <div class="metric-summary-card" style="background: var(--soft); border: 1px solid var(--line); border-radius: 12px; padding: 16px; text-align: center;">
                        <strong style="font-size: 28px; color: var(--green); display:block;">7</strong>
                        <span style="font-size: 11px; color: var(--muted); text-transform:uppercase; font-weight:700">Female Hostels</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Panel 3: Solar & Health -->
    <div class="int-tab-panel" id="infra-panel-solar">
        <!-- Solar hybrid plant -->
        <div class="pro-chancellor-panel" style="display: grid; grid-template-columns: 320px 1fr; gap: 30px; background: #ffffff; border: 1px solid var(--line); border-radius: 18px; padding: 30px; box-shadow: var(--shadow-soft); margin-bottom: 30px; align-items: start;">
            <div class="pro-chancellor-media" style="text-align: center;">
                <img src="images/docx/image27.png" alt="University Solar Hybrid Plant" style="width: 100%; border-radius: 12px; box-shadow: var(--shadow); border: 4px solid #ffffff;">
                <span style="display: block; font-size: 13px; font-weight: 750; color: var(--green-dark); margin-top: 12px;">Solar Hybrid Installation</span>
            </div>
            <div>
                <h3 style="font-family: var(--serif); font-size: 22px; color: var(--green-deep); margin: 0 0 16px; font-weight: 850;">University Solar Hybrid Plant</h3>
                <p style="font-size: 14.5px; color: var(--muted); line-height: 1.6; margin: 0;">
                    The University's electricity supply is powered by its state-of-the-art **Solar Hybrid Plant**. This clean energy infrastructure provides **twenty-four (24) hours electricity** to the entire campus, supporting class lectures, research laboratories, administrative services, and student hostels without interruption.
                </p>
            </div>
        </div>

        <!-- Clinic -->
        <div class="pro-chancellor-panel" style="display: grid; grid-template-columns: 320px 1fr; gap: 30px; background: #ffffff; border: 1px solid var(--line); border-radius: 18px; padding: 30px; box-shadow: var(--shadow-soft); align-items: start;">
            <div class="pro-chancellor-media" style="text-align: center;">
                <img src="images/docx/image26.png" alt="University Health Services" style="width: 100%; border-radius: 12px; box-shadow: var(--shadow); border: 4px solid #ffffff;">
                <span style="display: block; font-size: 13px; font-weight: 750; color: var(--green-dark); margin-top: 12px;">University Clinic</span>
            </div>
            <div>
                <h3 style="font-family: var(--serif); font-size: 22px; color: var(--green-deep); margin: 0 0 16px; font-weight: 850;">University Health Services</h3>
                <p style="font-size: 14.5px; color: var(--muted); line-height: 1.6; margin: 0;">
                    The University operates a fully staffed Clinic located at the **Central Core of the University**. It provides primary healthcare services, emergency response, immunizations, and medical consultations for all staff and students.
                </p>
            </div>
        </div>
    </div>

    <!-- Panel 4: New Buildings -->
    <div class="int-tab-panel" id="infra-panel-new-infra">
        <h3 style="font-family: var(--serif); font-size: 22px; color: var(--green-deep); margin: 0 0 24px; font-weight: 800; border-bottom: 2px solid var(--gold); padding-bottom: 8px; display: inline-block;">New Academic Infrastructure</h3>
        
        <div class="prominent-alumni-grid" style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 24px;">
            <!-- Building 1: ICC -->
            <div class="alumni-profile-card" style="background: #ffffff; border: 1px solid var(--line); border-radius: 16px; padding: 18px; box-shadow: var(--shadow-soft); display: flex; flex-direction: column; gap: 16px; text-align: left;">
                <img src="images/docx/image34.png" alt="International Conference Centre" style="width: 100%; height: 160px; object-fit: cover; border-radius: 10px; border: 1px solid var(--line);">
                <div>
                    <strong style="display: block; font-size: 15px; color: var(--green-deep); font-weight: 800; margin-bottom: 6px;">International Conference Centre</strong>
                    <p style="font-size: 13px; color: var(--muted); line-height: 1.45; margin: 0;">A world-class administrative and conferencing hall built to host major academic summits, symposiums, and university ceremonies.</p>
                </div>
            </div>

            <!-- Building 2: Drawing Studio -->
            <div class="alumni-profile-card" style="background: #ffffff; border: 1px solid var(--line); border-radius: 16px; padding: 18px; box-shadow: var(--shadow-soft); display: flex; flex-direction: column; gap: 16px; text-align: left;">
                <img src="images/docx/image35.png" alt="The Drawing Studio" style="width: 100%; height: 160px; object-fit: cover; border-radius: 10px; border: 1px solid var(--line);">
                <div>
                    <strong style="display: block; font-size: 15px; color: var(--green-deep); font-weight: 800; margin-bottom: 6px;">Drawing Studio & Library</strong>
                    <p style="font-size: 13px; color: var(--muted); line-height: 1.45; margin: 0;">A modern, spacious drawing studio and specialized engineering library located at the College of Engineering core.</p>
                </div>
            </div>

            <!-- Building 3: JAST -->
            <div class="alumni-profile-card" style="background: #ffffff; border: 1px solid var(--line); border-radius: 16px; padding: 18px; box-shadow: var(--shadow-soft); display: flex; flex-direction: column; gap: 16px; text-align: left;">
                <img src="images/docx/image36.png" alt="JAST Building" style="width: 100%; height: 160px; object-fit: cover; border-radius: 10px; border: 1px solid var(--line);">
                <div>
                    <strong style="display: block; font-size: 15px; color: var(--green-deep); font-weight: 800; margin-bottom: 6px;">JAST Building</strong>
                    <p style="font-size: 13px; color: var(--muted); line-height: 1.45; margin: 0;">The institutional home for the Journal of Agriculture, Science and Technology (JAST), supporting peer-reviewed research publications.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function switchInfraTab(tab, btn) {
    document.querySelectorAll('.infrastructure-page-container > .int-tab-bar .int-tab-btn').forEach(b => b.classList.remove('active'));
    btn.classList.add('active');
    
    document.querySelectorAll('.infrastructure-page-container > .int-tab-panel').forEach(p => p.classList.remove('active'));
    document.getElementById('infra-panel-' + tab).classList.add('active');
    
    // Smooth scroll to container offset by sticky header height
    const container = document.querySelector('.infrastructure-page-container');
    const headerHeight = document.querySelector('.site-header')?.offsetHeight || 90;
    const targetPos = container.getBoundingClientRect().top + window.pageYOffset - headerHeight - 16;
    window.scrollTo({ top: targetPos, behavior: 'smooth' });
}
</script>
