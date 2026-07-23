<?php $site = site_data(); $settings = $site['settings'] ?? []; ?>
</main>
<footer class="site-footer">
    <div class="container footer-hero">
        <div>
            <p class="kicker">Joseph Sarwuan Tarka University</p>
            <h2>Education for individual and social responsibility.</h2>
        </div>
        <a class="btn primary" href="page.php?slug=student-portal"><i class="fa fa-sign-in"></i> Open student portal</a>
    </div>
    <div class="container footer-grid">
        <div class="footer-about">
            <img src="<?= e($settings['logo'] ?? 'images/university/jostum-logo.jpeg') ?>" alt="JoSTUM logo">
            <p><strong><?= e($settings['name'] ?? 'Joseph Sarwuan Tarka University, Makurdi') ?></strong></p>
            <p><small><?= e($settings['phone'] ?? '+234 704 366 7952') ?><br><?= e($settings['email'] ?? 'info@uam.edu.ng') ?><br>Gbajimba Road, Makurdi, Nigeria</small></p>
            <form class="newsletter-form" onsubmit="event.preventDefault(); alert('Thank you for subscribing to JOSTUM updates!'); this.reset();">
                <input type="email" placeholder="Get campus updates..." required>
                <button type="submit" aria-label="Subscribe"><i class="fa fa-envelope"></i></button>
            </form>
        </div>
        <div>
            <h2>Academics</h2>
            <a href="page.php?slug=admissions"><i class="fa fa-angle-right"></i> Admissions</a>
            <a href="page.php?slug=colleges"><i class="fa fa-angle-right"></i> Colleges</a>
            <a href="page.php?slug=accreditation"><i class="fa fa-angle-right"></i> Accreditation</a>
            <a href="page.php?slug=short-courses"><i class="fa fa-angle-right"></i> Short courses</a>
        </div>
        <div>
            <h2>Institution</h2>
            <a href="page.php?slug=history"><i class="fa fa-angle-right"></i> History</a>
            <a href="page.php?slug=governing-council"><i class="fa fa-angle-right"></i> Governing Council</a>
            <a href="page.php?slug=university-management"><i class="fa fa-angle-right"></i> Management</a>
            <a href="gallery.php"><i class="fa fa-angle-right"></i> Gallery</a>
            <a href="search.php"><i class="fa fa-angle-right"></i> Search</a>
        </div>
        <div>
            <h2>Portal</h2>
            <a href="page.php?slug=student-portal"><i class="fa fa-angle-right"></i> Student Portal</a>
            <a href="page.php?slug=admissions"><i class="fa fa-angle-right"></i> Admissions</a>
            <a href="charts.php"><i class="fa fa-angle-right"></i> Charts and Graphs</a>
            <a href="admin/login.php"><i class="fa fa-angle-right"></i> Admin Panel</a>
        </div>
    </div>
    <div class="container footer-bottom">
        <span>&copy; <?= date('Y') ?> Joseph Sarwuan Tarka University, Makurdi.</span>
        <span style="display: inline-flex; align-items: center; gap: 12px;">
            Powered by the ICT Directorate.
            <a href="#" onclick="window.scrollTo({top: 0, behavior: 'smooth'}); return false;" class="scroll-top-btn" title="Go to top" style="display: inline-flex; align-items: center; justify-content: center; width: 32px; height: 32px; border-radius: 50%; background: rgba(255,255,255,0.06); color: var(--gold); border: 1px solid rgba(255,255,255,0.1); transition: all 0.2s ease; margin-left: 8px;"><i class="fa fa-arrow-up"></i></a>
        </span>
    </div>
</footer>
<script src="js/portal-charts.js"></script>
<script src="js/portal-ui.js"></script>
</body>
</html>
