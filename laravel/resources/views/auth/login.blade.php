<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login | SpasilaLahanPetani</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --bg: #0b1f14;
            --card: rgba(255, 255, 255, 0.9);
            --primary: #2e7d32;
            --primary-dark: #1b5e20;
            --accent: #66bb6a;
            --muted: #6b7280;
            --line: rgba(255, 255, 255, 0.08);
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Poppins', sans-serif;
            background: radial-gradient(circle at 20% 20%, rgba(102, 187, 106, 0.15), transparent 35%),
                        radial-gradient(circle at 80% 0%, rgba(30, 94, 48, 0.3), transparent 40%),
                        linear-gradient(145deg, #0b1f14 0%, #0f2a1b 50%, #0b1f14 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 32px 20px;
            color: #0f172a;
        }

        .login-shell {
            width: 100%;
            max-width: 1100px;
        }

        .login-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 18px;
            color: #e5e7eb;
        }

        .brand {
            display: inline-flex;
            align-items: center;
            gap: 10px;
        }

        .brand-mark {
            width: 44px;
            height: 44px;
            border-radius: 12px;
            background: linear-gradient(135deg, var(--primary) 0%, var(--accent) 100%);
            color: #fff;
            display: grid;
            place-items: center;
            font-size: 20px;
            box-shadow: 0 10px 30px rgba(46, 125, 50, 0.35);
        }

        .brand-name {
            font-weight: 700;
            letter-spacing: 0.5px;
        }

        .login-card {
            display: grid;
            grid-template-columns: 1.05fr 0.95fr;
            background: var(--card);
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 24px 70px rgba(0, 0, 0, 0.35);
            backdrop-filter: blur(6px);
        }

        .left-pane {
            padding: 44px 52px;
            display: flex;
            flex-direction: column;
            gap: 22px;
            background: rgba(255, 255, 255, 0.96);
        }

        .heading-kicker { color: var(--primary); font-weight: 700; font-size: 13px; letter-spacing: 1.4px; text-transform: uppercase; }
        .heading-main { font-size: 32px; font-weight: 700; color: #0f172a; }
        .subtext { color: #4b5563; font-size: 15px; }

        .toggle {
            display: grid;
            grid-template-columns: 1fr 1fr;
            padding: 6px;
            background: #f1f5f9;
            border-radius: 12px;
            gap: 8px;
        }

        .toggle button {
            border: none;
            padding: 12px 14px;
            border-radius: 10px;
            background: transparent;
            font-weight: 600;
            color: #475569;
            cursor: pointer;
            transition: all 0.2s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .toggle button.active {
            background: linear-gradient(135deg, var(--primary) 0%, var(--accent) 100%);
            color: #fff;
            box-shadow: 0 10px 24px rgba(46, 125, 50, 0.35);
        }

        form { display: flex; flex-direction: column; gap: 18px; }

        .form-group { display: flex; flex-direction: column; gap: 8px; }
        label { color: #1f2937; font-weight: 600; font-size: 14px; }

        .input-wrap { position: relative; }
        .input-wrap input {
            width: 100%;
            padding: 14px 14px 14px 44px;
            border-radius: 12px;
            border: 1px solid #e2e8f0;
            background: #f8fafc;
            font-size: 15px;
            transition: all 0.2s ease;
        }
        .input-wrap input:focus {
            outline: none;
            border-color: var(--primary);
            background: #fff;
            box-shadow: 0 0 0 4px rgba(46, 125, 50, 0.15);
        }
        .input-wrap i {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: #9ca3af;
        }

        .inline-actions {
            display: flex;
            justify-content: flex-end;
            font-size: 13px;
        }
        .inline-actions a { color: var(--primary); font-weight: 600; text-decoration: none; }

        .btn-primary {
            border: none;
            padding: 14px 16px;
            border-radius: 12px;
            font-weight: 700;
            color: #fff;
            background: linear-gradient(135deg, var(--primary) 0%, var(--accent) 100%);
            cursor: pointer;
            box-shadow: 0 14px 35px rgba(46, 125, 50, 0.35);
            transition: transform 0.15s ease, box-shadow 0.2s ease;
        }
        .btn-primary:hover { transform: translateY(-1px); box-shadow: 0 18px 40px rgba(46, 125, 50, 0.38); }
        .btn-primary:active { transform: translateY(0); }

        .divider { text-align: center; position: relative; color: #94a3b8; font-size: 13px; }
        .divider::before, .divider::after { content: ''; position: absolute; top: 50%; width: 42%; height: 1px; background: #e2e8f0; }
        .divider::before { left: 0; }
        .divider::after { right: 0; }

        .secondary-action {
            border: 1px solid var(--primary);
            border-radius: 12px;
            padding: 12px 16px;
            display: inline-flex;
            gap: 10px;
            align-items: center;
            justify-content: center;
            color: var(--primary);
            font-weight: 700;
            text-decoration: none;
            transition: all 0.2s ease;
        }
        .secondary-action:hover { background: rgba(46, 125, 50, 0.08); }

        .alert-success {
            background: #ecfdf3;
            border: 1px solid #bbf7d0;
            color: #166534;
            padding: 12px 14px;
            border-radius: 12px;
            display: flex;
            gap: 10px;
            align-items: center;
            font-weight: 600;
        }

        .error-message { color: #b91c1c; font-size: 13px; display: flex; align-items: center; gap: 6px; }

        .right-pane {
            position: relative;
            background: linear-gradient(160deg, var(--primary-dark) 0%, #0e2a1b 100%);
            color: #e5e7eb;
            padding: 48px;
            display: flex;
            flex-direction: column;
            gap: 18px;
            overflow: hidden;
        }
        .right-pane::after {
            content: '';
            position: absolute;
            inset: 16px;
            border-radius: 18px;
            border: 1px solid var(--line);
            pointer-events: none;
        }

        .glow {
            position: absolute;
            width: 320px;
            height: 320px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(102, 187, 106, 0.25), transparent 60%);
            top: -60px;
            right: -40px;
            filter: blur(6px);
        }

        .right-pane h2 { font-size: 30px; font-weight: 700; }
        .right-pane p { color: #cbd5e1; line-height: 1.7; }

        .feature-list { list-style: none; display: grid; gap: 10px; }
        .feature-list li { display: flex; gap: 10px; align-items: center; color: #e2e8f0; }
        .feature-list i { color: #fbbf24; }

        .hero-image {
            width: 100%;
            border-radius: 12px;
            object-fit: cover;
            box-shadow: 0 18px 45px rgba(0, 0, 0, 0.35);
        }

        @media (max-width: 900px) {
            .login-card { grid-template-columns: 1fr; }
            .right-pane { order: -1; }
        }

        @media (max-width: 640px) {
            .left-pane, .right-pane { padding: 32px 24px; }
            .heading-main { font-size: 26px; }
        }
    </style>
</head>
<body>

<div class="login-shell">
    <div class="login-header">
        <div class="brand">
            <div class="brand-mark"><i class="fas fa-seedling"></i></div>
            <div class="brand-name">SpasilaLahan</div>
        </div>
        <span style="color: #9ca3af; font-weight: 600;">Grow smarter. Buy better.</span>
    </div>

    <div class="login-card">
        <div class="left-pane">
            <div>
                <div class="heading-kicker">Welcome back</div>
                <div class="heading-main">Sign in to continue</div>
                <p class="subtext">Access your dashboard to manage tools, fertilizers, and crop orders.</p>
            </div>

            <div class="toggle">
                <button type="button" class="login-type-btn active" onclick="switchLoginType(event, 'user')">
                    <i class="fas fa-user"></i> User
                </button>
                <button type="button" class="login-type-btn" onclick="switchLoginType(event, 'admin')">
                    <i class="fas fa-user-shield"></i> Admin
                </button>
            </div>

            @if(session('success'))
                <div class="alert-success">
                    <i class="fas fa-check-circle"></i>
                    {{ session('success') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login.store') }}" id="loginForm">
                @csrf
                <input type="hidden" name="login_type" id="loginType" value="user">

                <div class="form-group" id="emailGroup">
                    <label>Email</label>
                    <div class="input-wrap">
                        <i class="fas fa-envelope"></i>
                        <input type="email" name="email" id="emailInput" placeholder="name@email.com" value="{{ old('email') }}" required>
                    </div>
                    @error('email')
                        <span class="error-message"><i class="fas fa-exclamation-circle"></i>{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group" id="usernameGroup" style="display: none;">
                    <label>Admin Username</label>
                    <div class="input-wrap">
                        <i class="fas fa-user-shield"></i>
                        <input type="text" name="username" id="usernameInput" placeholder="admin username">
                    </div>
                    @error('username')
                        <span class="error-message"><i class="fas fa-exclamation-circle"></i>{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <div class="input-wrap">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="password" id="passwordInput" placeholder="Your password" required>
                    </div>
                    @error('password')
                        <span class="error-message"><i class="fas fa-exclamation-circle"></i>{{ $message }}</span>
                    @enderror
                </div>

                <div class="inline-actions">
                    <a href="#"><i class="fas fa-key"></i> Forgot password?</a>
                </div>

                <button type="submit" class="btn-primary">
                    <i class="fas fa-sign-in-alt"></i> Sign In
                </button>

                <div class="divider">or</div>

                <a href="{{ route('register') }}" class="secondary-action">
                    <i class="fas fa-user-plus"></i> Create account
                </a>
            </form>
        </div>

        <div class="right-pane">
            <div class="glow"></div>
            <h2><i class="fas fa-tractor"></i> SpasilaLahanPetani</h2>
            <p>Order premium agri supplies with transparent pricing, tracked delivery, and responsive support.</p>
            <img class="hero-image" src="{{ asset('images/login/farmers.avif') }}" alt="Farmers Illustration">
            <ul class="feature-list">
                <li><i class="fas fa-check-circle"></i> Curated tools, fertilizers, and crops</li>
                <li><i class="fas fa-check-circle"></i> Secure checkout with cart tracking</li>
                <li><i class="fas fa-check-circle"></i> Dedicated support for farmers</li>
            </ul>
        </div>
    </div>
</div>

<script>
    function switchLoginType(evt, type) {
        const buttons = document.querySelectorAll('.login-type-btn');
        const loginTypeInput = document.getElementById('loginType');
        const emailGroup = document.getElementById('emailGroup');
        const usernameGroup = document.getElementById('usernameGroup');
        const emailInput = document.getElementById('emailInput');
        const usernameInput = document.getElementById('usernameInput');

        buttons.forEach(btn => btn.classList.remove('active'));
        if (evt && evt.target) {
            evt.target.closest('.login-type-btn').classList.add('active');
        }

        loginTypeInput.value = type;

        if (type === 'admin') {
            emailGroup.style.display = 'none';
            usernameGroup.style.display = 'block';
            emailInput.removeAttribute('required');
            usernameInput.setAttribute('required', 'required');
        } else {
            emailGroup.style.display = 'block';
            usernameGroup.style.display = 'none';
            emailInput.setAttribute('required', 'required');
            usernameInput.removeAttribute('required');
        }
    }
</script>

</body>
</html>
