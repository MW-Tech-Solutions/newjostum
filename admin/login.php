<?php
require __DIR__ . '/../includes/functions.php';
if (session_status() !== PHP_SESSION_ACTIVE) {
    $sessionDir = __DIR__ . '/../data/sessions';
    if (!is_dir($sessionDir)) {
        mkdir($sessionDir, 0775, true);
    }
    session_save_path($sessionDir);
    session_start();
}
$admin = read_json('admin.json', []);
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';
    if ($username === ($admin['username'] ?? 'admin') && password_verify($password, $admin['password_hash'] ?? '')) {
        $_SESSION['admin_logged_in'] = true;
        header('Location: index.php');
        exit;
    }
    $error = 'Invalid admin username or password.';
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login | JoSTUM</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Playfair+Display:wght@400;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/font-awesome.css">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        :root {
            --green-deep: #052618; --green-dark: #0a3d2a; --green: #108a55;
            --gold: #d4a32b; --gold-soft: rgba(212,163,43,0.12);
            --ink: #071c14; --muted: #556b5f; --line: #dde6e0;
            --soft: #f4f8f6; --serif: 'Playfair Display', Georgia, serif;
            --sans: 'Plus Jakarta Sans', system-ui, sans-serif;
        }
        body {
            font-family: var(--sans);
            min-height: 100vh;
            display: flex;
            background: var(--soft);
            color: var(--ink);
            overflow: hidden;
        }

        /* ===== LEFT BRANDING PANEL ===== */
        .login-brand-panel {
            flex: 0 0 46%;
            background: linear-gradient(160deg, var(--green-deep) 0%, #0d5a38 50%, var(--green) 100%);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 60px;
            position: relative;
            overflow: hidden;
            color: #fff;
            text-align: center;
        }
        .login-brand-panel::before {
            content: '';
            position: absolute;
            inset: 0;
            background: url("../images/docx/image9.png") center/cover;
            opacity: 0.06;
        }
        /* Floating decorative shapes */
        .login-brand-panel::after {
            content: '';
            position: absolute;
            width: 500px; height: 500px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(212,163,43,0.08) 0%, transparent 70%);
            top: -120px; right: -120px;
            animation: floatOrb 12s ease-in-out infinite alternate;
        }
        @keyframes floatOrb {
            0% { transform: translate(0, 0) scale(1); }
            100% { transform: translate(-40px, 60px) scale(1.15); }
        }
        .brand-orb-2 {
            position: absolute;
            width: 350px; height: 350px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(16,138,85,0.1) 0%, transparent 70%);
            bottom: -80px; left: -80px;
            animation: floatOrb2 15s ease-in-out infinite alternate;
        }
        @keyframes floatOrb2 {
            0% { transform: translate(0, 0) scale(1); }
            100% { transform: translate(30px, -50px) scale(1.2); }
        }
        .brand-content { position: relative; z-index: 2; max-width: 400px; }
        .brand-crest {
            width: 110px; height: 110px;
            border-radius: 24px;
            background: rgba(255,255,255,0.1);
            border: 2px solid rgba(255,255,255,0.15);
            backdrop-filter: blur(10px);
            padding: 14px;
            margin: 0 auto 32px;
            display: grid;
            place-items: center;
        }
        .brand-crest img { width: 100%; height: 100%; object-fit: contain; filter: brightness(1.1); }
        .brand-content h1 {
            font-family: var(--serif);
            font-size: 38px;
            font-weight: 800;
            line-height: 1.1;
            margin-bottom: 14px;
            letter-spacing: -0.5px;
        }
        .brand-content h1 span { color: var(--gold); }
        .brand-content p {
            font-size: 15px;
            color: rgba(255,255,255,0.65);
            line-height: 1.55;
            margin-bottom: 36px;
        }
        .brand-features {
            display: flex;
            flex-direction: column;
            gap: 14px;
            text-align: left;
        }
        .brand-feature {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 14px 18px;
            background: rgba(255,255,255,0.06);
            border: 1px solid rgba(255,255,255,0.08);
            border-radius: 12px;
            backdrop-filter: blur(8px);
        }
        .brand-feature i {
            width: 36px; height: 36px;
            border-radius: 8px;
            background: rgba(212,163,43,0.15);
            color: var(--gold);
            display: grid;
            place-items: center;
            font-size: 14px;
            flex-shrink: 0;
        }
        .brand-feature span {
            font-size: 13px;
            font-weight: 600;
            color: rgba(255,255,255,0.85);
        }

        /* ===== RIGHT FORM PANEL ===== */
        .login-form-panel {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 60px 48px;
            position: relative;
        }
        .login-form-card {
            width: 100%;
            max-width: 440px;
        }
        .form-header {
            margin-bottom: 36px;
        }
        .form-header .badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 14px;
            border-radius: 50px;
            background: var(--gold-soft);
            color: var(--gold);
            font-size: 11px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 20px;
        }
        .form-header h2 {
            font-family: var(--serif);
            font-size: 30px;
            font-weight: 800;
            color: var(--green-deep);
            margin-bottom: 8px;
        }
        .form-header p {
            font-size: 14px;
            color: var(--muted);
            line-height: 1.5;
        }

        /* Form inputs */
        .form-group {
            margin-bottom: 22px;
            position: relative;
        }
        .form-group label {
            display: block;
            font-size: 12.5px;
            font-weight: 750;
            color: var(--green-dark);
            margin-bottom: 8px;
            text-transform: uppercase;
            letter-spacing: 0.3px;
        }
        .input-wrap {
            position: relative;
            display: flex;
            align-items: center;
        }
        .input-wrap i {
            position: absolute;
            left: 16px;
            color: var(--muted);
            font-size: 16px;
            transition: color 0.2s;
            z-index: 2;
        }
        .input-wrap input {
            width: 100%;
            padding: 14px 16px 14px 46px;
            border: 2px solid var(--line);
            border-radius: 12px;
            font-size: 15px;
            font-family: var(--sans);
            font-weight: 500;
            color: var(--ink);
            background: #fff;
            outline: none;
            transition: all 0.25s cubic-bezier(0.16, 1, 0.3, 1);
        }
        .input-wrap input:focus {
            border-color: var(--green);
            box-shadow: 0 0 0 4px rgba(16, 138, 85, 0.08);
        }
        .input-wrap input:focus + i,
        .input-wrap:focus-within i {
            color: var(--green);
        }
        .toggle-password {
            position: absolute;
            right: 14px;
            background: none;
            border: none;
            color: var(--muted);
            cursor: pointer;
            font-size: 15px;
            z-index: 2;
            transition: color 0.2s;
        }
        .toggle-password:hover { color: var(--green); }

        /* Error state */
        .login-error {
            padding: 14px 18px;
            border-radius: 10px;
            background: #fef2f2;
            border: 1px solid #fecaca;
            color: #b91c1c;
            font-size: 13.5px;
            font-weight: 600;
            margin-bottom: 22px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .login-error i { font-size: 16px; }

        /* Extras row */
        .form-extras {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 28px;
        }
        .remember-me {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 13px;
            font-weight: 600;
            color: var(--muted);
            cursor: pointer;
        }
        .remember-me input[type="checkbox"] {
            width: 18px; height: 18px;
            accent-color: var(--green);
            cursor: pointer;
        }
        .forgot-link {
            font-size: 13px;
            font-weight: 700;
            color: var(--green);
            text-decoration: none;
            transition: color 0.2s;
        }
        .forgot-link:hover { color: var(--gold); }

        /* Submit button */
        .login-submit {
            width: 100%;
            padding: 16px;
            border: none;
            border-radius: 12px;
            background: linear-gradient(135deg, var(--green-deep), var(--green));
            color: #fff;
            font-size: 15px;
            font-weight: 800;
            font-family: var(--sans);
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
            position: relative;
            overflow: hidden;
        }
        .login-submit::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, transparent, rgba(255,255,255,0.1));
            opacity: 0;
            transition: opacity 0.3s;
        }
        .login-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 32px rgba(5, 38, 24, 0.3);
        }
        .login-submit:hover::before { opacity: 1; }
        .login-submit:active { transform: translateY(0); }

        /* Footer */
        .login-footer {
            text-align: center;
            margin-top: 32px;
            padding-top: 24px;
            border-top: 1px solid var(--line);
        }
        .login-footer p {
            font-size: 12.5px;
            color: var(--muted);
        }
        .login-footer a { color: var(--green); font-weight: 700; text-decoration: none; }
        .login-footer a:hover { color: var(--gold); }

        /* Security badge */
        .security-badge {
            position: absolute;
            bottom: 28px;
            right: 28px;
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 8px 14px;
            border-radius: 8px;
            background: #fff;
            border: 1px solid var(--line);
            box-shadow: 0 2px 8px rgba(0,0,0,0.04);
        }
        .security-badge i { color: var(--green); font-size: 14px; }
        .security-badge span { font-size: 11px; font-weight: 700; color: var(--muted); }

        /* Responsive */
        @media (max-width: 900px) {
            body { flex-direction: column; overflow: auto; }
            .login-brand-panel { flex: none; padding: 40px 24px; min-height: auto; }
            .brand-features { display: none; }
            .login-form-panel { padding: 40px 24px; }
            .security-badge { display: none; }
        }
    </style>
</head>
<body>
    <!-- LEFT: Branding Panel -->
    <div class="login-brand-panel">
        <div class="brand-orb-2"></div>
        <div class="brand-content">
            <div class="brand-crest">
                <img src="../images/docx/image1.jpeg" alt="JoSTUM Crest">
            </div>
            <h1>Welcome to <span>JoSTUM</span> Staff Console</h1>
            <p>Manage pages, notices, gallery, charts, and institutional content from one powerful dashboard.</p>

            <div class="brand-features">
                <div class="brand-feature">
                    <i class="fa fa-shield"></i>
                    <span>Enterprise-grade security with encrypted sessions</span>
                </div>
                <div class="brand-feature">
                    <i class="fa fa-cloud-upload"></i>
                    <span>Direct file uploads for images and media</span>
                </div>
                <div class="brand-feature">
                    <i class="fa fa-bar-chart"></i>
                    <span>Real-time content analytics and charts</span>
                </div>
            </div>
        </div>
    </div>

    <!-- RIGHT: Login Form -->
    <div class="login-form-panel">
        <div class="login-form-card">
            <div class="form-header">
                <div class="badge"><i class="fa fa-lock"></i> Secure Portal</div>
                <h2>Sign in to Dashboard</h2>
                <p>Enter your admin credentials to access the content management system.</p>
            </div>

            <?php if ($error): ?>
                <div class="login-error">
                    <i class="fa fa-exclamation-circle"></i>
                    <?= e($error) ?>
                </div>
            <?php endif; ?>

            <form method="post" autocomplete="on">
                <div class="form-group">
                    <label for="login-user">Username</label>
                    <div class="input-wrap">
                        <input type="text" id="login-user" name="username" autocomplete="username" required placeholder="Enter your username">
                        <i class="fa fa-user"></i>
                    </div>
                </div>

                <div class="form-group">
                    <label for="login-pass">Password</label>
                    <div class="input-wrap">
                        <input type="password" id="login-pass" name="password" autocomplete="current-password" required placeholder="Enter your password">
                        <i class="fa fa-lock"></i>
                        <button type="button" class="toggle-password" onclick="const p=document.getElementById('login-pass');p.type=p.type==='password'?'text':'password';this.querySelector('i').classList.toggle('fa-eye');this.querySelector('i').classList.toggle('fa-eye-slash');">
                            <i class="fa fa-eye"></i>
                        </button>
                    </div>
                </div>

                <div class="form-extras">
                    <label class="remember-me">
                        <input type="checkbox"> Remember me
                    </label>
                    <a href="#" class="forgot-link">Forgot password?</a>
                </div>

                <button class="login-submit" type="submit">
                    <i class="fa fa-sign-in"></i> Sign In to Dashboard
                </button>
            </form>

            <div class="login-footer">
                <p><a href="../index.php"><i class="fa fa-arrow-left"></i> Back to JoSTUM portal</a></p>
            </div>
        </div>

        <div class="security-badge">
            <i class="fa fa-shield"></i>
            <span>256-bit SSL Protected</span>
        </div>
    </div>
</body>
</html>
