<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login | SpasilaLahanPetani</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #4CAF50 0%, #45a049 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: 
                repeating-linear-gradient(90deg, rgba(255,255,255,0.03) 0px, transparent 1px, transparent 50px, rgba(255,255,255,0.03) 51px),
                repeating-linear-gradient(0deg, rgba(255,255,255,0.03) 0px, transparent 1px, transparent 50px, rgba(255,255,255,0.03) 51px);
            pointer-events: none;
        }

        .login-container {
            display: flex;
            background: white;
            border-radius: 20px;
            box-shadow: 0 25px 80px rgba(0, 0, 0, 0.3);
            overflow: hidden;
            max-width: 1100px;
            width: 90%;
            position: relative;
            z-index: 1;
        }

        .login-left {
            flex: 1;
            padding: 50px 60px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            background: white;
        }

        .logo-section {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 30px;
        }

        .logo-icon {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, #4CAF50 0%, #45a049 100%);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 24px;
        }

        .logo-text {
            font-size: 22px;
            font-weight: 700;
            color: #333;
        }

        .login-left h2 {
            color: #4CAF50;
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 8px;
            text-transform: uppercase;
            letter-spacing: 1.5px;
        }

        .login-left h1 {
            color: #333;
            font-size: 36px;
            font-weight: 700;
            margin-bottom: 30px;
        }

        .login-left form {
            display: flex;
            flex-direction: column;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            margin-bottom: 20px;
        }

        .login-left label {
            color: #555;
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 8px;
            display: block;
            letter-spacing: 0.3px;
        }

        .input-wrapper {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: #999;
            font-size: 16px;
        }

        .login-left input {
            padding: 14px 14px 14px 42px;
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            font-size: 15px;
            font-family: 'Poppins', sans-serif;
            transition: all 0.3s ease;
            line-height: 1.4;
            width: 100%;
        }

        .login-left input:focus {
            outline: none;
            border-color: #4CAF50;
            box-shadow: 0 0 0 4px rgba(76, 175, 80, 0.1);
        }

        .login-left input:focus + .input-icon {
            color: #4CAF50;
        }

        .login-left input::placeholder {
            color: #bbb;
        }

        .login-type-selector {
            display: flex;
            gap: 10px;
            margin-bottom: 25px;
            padding: 6px;
            background: #f5f5f5;
            border-radius: 12px;
        }

        .login-type-btn {
            flex: 1;
            padding: 12px 20px;
            border: none;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            font-family: 'Poppins', sans-serif;
            background: transparent;
            color: #666;
        }

        .login-type-btn.active {
            background: linear-gradient(135deg, #4CAF50 0%, #45a049 100%);
            color: white;
            box-shadow: 0 4px 12px rgba(76, 175, 80, 0.3);
        }

        .login-type-btn:hover:not(.active) {
            background: rgba(76, 175, 80, 0.1);
        }

        .login-type-btn i {
            margin-right: 6px;
        }

        .forgot {
            text-align: right;
            margin-bottom: 20px;
            margin-top: -8px;
        }

        .forgot a {
            color: #4CAF50;
            font-size: 13px;
            font-weight: 600;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .forgot a:hover {
            color: #45a049;
            text-decoration: underline;
        }

        .login-left button {
            padding: 14px 20px;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #4CAF50 0%, #45a049 100%);
            color: white;
            box-shadow: 0 4px 15px rgba(76, 175, 80, 0.4);
            margin-top: 6px;
            margin-bottom: 0;
            width: 100%;
        }

        .login-left button:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(76, 175, 80, 0.6);
        }

        .login-left button:active {
            transform: translateY(0);
        }

        .login-left button i {
            margin-right: 8px;
        }

        .signup {
            text-align: center;
            color: #666;
            font-size: 14px;
            padding-top: 20px;
            border-top: 1px solid #e0e0e0;
            margin-top: 20px;
        }

        .signup a {
            color: #4CAF50;
            font-weight: 600;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .signup a:hover {
            color: #45a049;
            text-decoration: underline;
        }

        .signup-button {
            display: block;
            padding: 14px 20px;
            background: #f9f9f9;
            color: #333;
            border: 2px solid #4CAF50;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 600;
            text-align: center;
            transition: all 0.3s ease;
            width: 100%;
            box-sizing: border-box;
            font-size: 15px;
        }

        .signup-button:hover {
            background: #4CAF50;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(76, 175, 80, 0.4);
        }

        .signup-button i {
            margin-right: 8px;
        }

        .divider {
            text-align: center;
            margin: 20px 0;
            font-size: 13px;
            color: #999;
            position: relative;
        }

        .divider::before,
        .divider::after {
            content: '';
            position: absolute;
            top: 50%;
            width: 40%;
            height: 1px;
            background: #e0e0e0;
        }

        .divider::before {
            left: 0;
        }

        .divider::after {
            right: 0;
        }

        .store-buttons {
            display: flex;
            gap: 15px;
            margin-bottom: 25px;
        }

        .store-buttons img {
            height: 42px;
            cursor: pointer;
            transition: transform 0.3s ease;
            border-radius: 6px;
        }

        .store-buttons img:hover {
            transform: scale(1.08);
        }

        .login-right {
            flex: 1;
            background: linear-gradient(135deg, #4CAF50 0%, #45a049 100%);
            color: white;
            padding: 60px 50px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .login-right::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
            animation: rotate 30s linear infinite;
        }

        @keyframes rotate {
            from {
                transform: rotate(0deg);
            }
            to {
                transform: rotate(360deg);
            }
        }

        .login-right > * {
            position: relative;
            z-index: 1;
        }

        .login-right h2 {
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 25px;
            text-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .login-right h2 i {
            margin-right: 10px;
        }

        .login-right img {
            max-width: 100%;
            height: auto;
            margin-bottom: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        }

        .login-right h3 {
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 15px;
        }

        .login-right p {
            font-size: 15px;
            line-height: 1.8;
            opacity: 0.95;
        }

        .features-list {
            text-align: left;
            margin-top: 20px;
        }

        .features-list li {
            margin-bottom: 12px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .features-list li i {
            color: #FFD700;
            font-size: 18px;
        }

        .error-message {
            color: #d32f2f;
            font-size: 13px;
            margin-top: 6px;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .error-message i {
            font-size: 14px;
        }

        .success-message {
            background-color: #d4edda;
            color: #155724;
            padding: 14px;
            border-radius: 10px;
            margin-bottom: 20px;
            border: 1px solid #c3e6cb;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .success-message i {
            font-size: 18px;
        }

        @media (max-width: 768px) {
            .login-container {
                flex-direction: column;
                width: 95%;
            }

            .login-left,
            .login-right {
                padding: 40px 30px;
            }

            .login-left h1 {
                font-size: 28px;
            }

            .login-type-selector {
                flex-direction: column;
            }

            .store-buttons {
                flex-direction: column;
            }

            .store-buttons img {
                width: 100%;
                height: auto;
            }
        }
    </style>
</head>
<body>

<div class="login-container">

    <!-- LEFT SIDE -->
    <div class="login-left">
        <div class="logo-section">
            <div class="logo-icon">
                <i class="fas fa-seedling"></i>
            </div>
            <div class="logo-text">SpasilaLahan</div>
        </div>

        <h2>Welcome Back</h2>
        <h1>Sign In</h1>

        <!-- Login Type Selector -->
        <div class="login-type-selector">
            <button type="button" class="login-type-btn active" onclick="switchLoginType('user')">
                <i class="fas fa-user"></i> User Login
            </button>
            <button type="button" class="login-type-btn" onclick="switchLoginType('admin')">
                <i class="fas fa-user-shield"></i> Admin Login
            </button>
        </div>

        @if(session('success'))
            <div class="success-message">
                <i class="fas fa-check-circle"></i>
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login.store') }}" id="loginForm">
            @csrf

            <input type="hidden" name="login_type" id="loginType" value="user">

            <div class="form-group" id="emailGroup">
                <label>Email</label>
                <div class="input-wrapper">
                    <input type="email" name="email" id="emailInput" placeholder="Enter your registered email" value="{{ old('email') }}">
                    <i class="fas fa-envelope input-icon"></i>
                </div>
                @error('email')
                    <span class="error-message">
                        <i class="fas fa-exclamation-circle"></i>
                        {{ $message }}
                    </span>
                @enderror
            </div>

            <div class="form-group" id="usernameGroup" style="display: none;">
                <label>Admin Username</label>
                <div class="input-wrapper">
                    <input type="text" name="username" id="usernameInput" placeholder="Enter admin username">
                    <i class="fas fa-user-shield input-icon"></i>
                </div>
                @error('username')
                    <span class="error-message">
                        <i class="fas fa-exclamation-circle"></i>
                        {{ $message }}
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label>Password</label>
                <div class="input-wrapper">
                    <input type="password" name="password" id="passwordInput" placeholder="Enter your password">
                    <i class="fas fa-lock input-icon"></i>
                </div>
                @error('password')
                    <span class="error-message">
                        <i class="fas fa-exclamation-circle"></i>
                        {{ $message }}
                    </span>
                @enderror
            </div>

            <div class="forgot">
                <a href="#"><i class="fas fa-key"></i> Forgot password?</a>
            </div>

            <button type="submit">
                <i class="fas fa-sign-in-alt"></i> Sign In
            </button>

            <div class="divider">or</div>

            <a href="{{ route('register') }}" class="signup-button">
                <i class="fas fa-user-plus"></i> Create New Account
            </a>
        </form>
    </div>

    <!-- RIGHT SIDE -->
    <div class="login-right">
        <h2><i class="fas fa-tractor"></i> SpasilaLahanPetani</h2>

        <img src="{{ asset('images/login/farmers.avif') }}" alt="Farmers Illustration">

        <h3>🌾 Your Agricultural Partner</h3>
        <p>Access premium agricultural tools, fertilizers, and crops at the best prices!</p>

        <ul class="features-list">
            <li><i class="fas fa-check-circle"></i> Premium Quality Products</li>
            <li><i class="fas fa-check-circle"></i> Best Price Guarantee</li>
            <li><i class="fas fa-check-circle"></i> Expert Support Available</li>
        </ul>
    </div>

</div>

<script>
    function switchLoginType(type) {
        const buttons = document.querySelectorAll('.login-type-btn');
        const loginTypeInput = document.getElementById('loginType');
        const emailGroup = document.getElementById('emailGroup');
        const usernameGroup = document.getElementById('usernameGroup');
        const emailInput = document.getElementById('emailInput');
        const usernameInput = document.getElementById('usernameInput');

        buttons.forEach(btn => btn.classList.remove('active'));
        event.target.closest('.login-type-btn').classList.add('active');

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
