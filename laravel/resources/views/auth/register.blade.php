<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register | Govi Saviya LK</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --bg: #0b1f14;
            --card: rgba(255, 255, 255, 0.92);
            --primary: #2e7d32;
            --primary-dark: #1b5e20;
            --accent: #66bb6a;
            --muted: #6b7280;
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

        .shell { width: 100%; max-width: 1080px; }

        .header { display: flex; align-items: center; justify-content: space-between; margin-bottom: 16px; color: #e5e7eb; }
        .brand { display: inline-flex; align-items: center; gap: 10px; }
        .brand-mark { width: 44px; height: 44px; border-radius: 12px; background: linear-gradient(135deg, var(--primary) 0%, var(--accent) 100%); color: #fff; display: grid; place-items: center; font-size: 20px; box-shadow: 0 12px 30px rgba(46, 125, 50, 0.35); }
        .brand-name { font-weight: 700; letter-spacing: 0.5px; color: #e5e7eb; }

        .card {
            display: grid;
            grid-template-columns: 1.05fr 0.95fr;
            background: var(--card);
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 24px 70px rgba(0, 0, 0, 0.35);
            backdrop-filter: blur(6px);
        }

        .left {
            padding: 44px 52px;
            display: flex;
            flex-direction: column;
            gap: 22px;
            background: rgba(255, 255, 255, 0.96);
        }

        .heading-kicker { color: var(--primary); font-weight: 700; font-size: 13px; letter-spacing: 1.4px; text-transform: uppercase; }
        .heading-main { font-size: 32px; font-weight: 700; color: #0f172a; }
        .subtext { color: #4b5563; font-size: 15px; }

        .store-buttons { display: flex; gap: 12px; margin-top: 4px; }
        .store-buttons img { height: 40px; border-radius: 10px; box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2); }

        form { display: flex; flex-direction: column; gap: 18px; }

        .grid { display: grid; grid-template-columns: 1fr 1fr; gap: 16px; }
        .grid.single { grid-template-columns: 1fr; }
        .form-group { display: flex; flex-direction: column; gap: 8px; }
        label { color: #1f2937; font-weight: 600; font-size: 14px; }
        input {
            padding: 14px 14px;
            border-radius: 12px;
            border: 1px solid #e2e8f0;
            background: #f8fafc;
            font-size: 15px;
            transition: all 0.2s ease;
        }
        input:focus { outline: none; border-color: var(--primary); background: #fff; box-shadow: 0 0 0 4px rgba(46, 125, 50, 0.15); }

        .actions { display: flex; gap: 12px; }
        .btn-primary { flex: 1; border: none; padding: 14px 16px; border-radius: 12px; font-weight: 700; color: #fff; background: linear-gradient(135deg, var(--primary) 0%, var(--accent) 100%); cursor: pointer; box-shadow: 0 14px 35px rgba(46, 125, 50, 0.35); transition: transform 0.15s ease, box-shadow 0.2s ease; }
        .btn-primary:hover { transform: translateY(-1px); box-shadow: 0 18px 40px rgba(46, 125, 50, 0.38); }
        .btn-primary:active { transform: translateY(0); }

        .btn-ghost { flex: 1; padding: 14px 16px; border-radius: 12px; border: 1px solid var(--primary); background: transparent; color: var(--primary); font-weight: 700; text-decoration: none; text-align: center; transition: all 0.2s ease; }
        .btn-ghost:hover { background: rgba(46, 125, 50, 0.08); }

        .helper { text-align: center; color: #6b7280; font-weight: 500; }
        .helper a { color: var(--primary); font-weight: 700; text-decoration: none; }

        .right {
            position: relative;
            background: linear-gradient(160deg, var(--primary-dark) 0%, #0e2a1b 100%);
            color: #e5e7eb;
            padding: 48px;
            display: flex;
            flex-direction: column;
            gap: 18px;
            overflow: hidden;
        }
        .right::after { content: ''; position: absolute; inset: 16px; border-radius: 18px; border: 1px solid rgba(255, 255, 255, 0.08); pointer-events: none; }
        .glow { position: absolute; width: 320px; height: 320px; border-radius: 50%; background: radial-gradient(circle, rgba(102, 187, 106, 0.25), transparent 60%); top: -60px; right: -40px; filter: blur(6px); }
        .right h2 { font-size: 30px; font-weight: 700; }
        .right p { color: #cbd5e1; line-height: 1.7; }
        .hero { width: 100%; border-radius: 12px; object-fit: cover; box-shadow: 0 18px 45px rgba(0, 0, 0, 0.35); }

        @media (max-width: 900px) {
            .card { grid-template-columns: 1fr; }
            .right { order: -1; }
        }

        @media (max-width: 640px) {
            .left, .right { padding: 32px 24px; }
            .heading-main { font-size: 26px; }
            .grid { grid-template-columns: 1fr; }
            .actions { flex-direction: column; }
        }
    </style>
</head>
<body>

<div class="shell">
    <div class="header">
        <div class="brand">
            <div class="brand-mark"><i class="fas fa-seedling"></i></div>
            <div class="brand-name">Govi Saviya LK</div>
        </div>
        <span style="color:#9ca3af;font-weight:600;">Join the growers community</span>
    </div>

    <div class="card">
        <div class="left">
            <div>
                <div class="heading-kicker">Create account</div>
                <div class="heading-main">Start growing with us</div>
                <p class="subtext">Set up your profile and unlock tools, fertilizers, and crop deals.</p>
            </div>

            <div class="store-buttons">
                <img src="https://developer.apple.com/assets/elements/badges/download-on-the-app-store.svg" alt="App Store">
                <img src="https://upload.wikimedia.org/wikipedia/commons/7/78/Google_Play_Store_badge_EN.svg" alt="Google Play">
            </div>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="grid">
                    <div class="form-group">
                        <label>First Name</label>
                        <input type="text" name="first_name" placeholder="Enter first name" required>
                    </div>
                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" name="last_name" placeholder="Enter last name" required>
                    </div>
                </div>

                <div class="grid single">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" placeholder="Enter email" required>
                    </div>
                </div>

                <div class="grid">
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" placeholder="Enter password" required>
                    </div>
                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" name="password_confirmation" placeholder="Confirm password" required>
                    </div>
                </div>

                <div class="actions">
                    <button type="submit" class="btn-primary">Register</button>
                    <a href="{{ route('login') }}" class="btn-ghost">Cancel</a>
                </div>

                <p class="helper">Already have an account? <a href="{{ route('login') }}">Log in</a></p>
            </form>
        </div>

        <div class="right">
            <div class="glow"></div>
            <h2>Govi Saviya LK</h2>
            <p>Get premium agri supplies, curated for quality, delivered with care.</p>
            <img class="hero" src="{{ asset('images/login/farmers.avif') }}" alt="Farmers Illustration">
        </div>
    </div>
</div>

</body>
</html>
