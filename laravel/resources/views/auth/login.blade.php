<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login | SpasilaLahanPetani</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

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
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-container {
            display: flex;
            background: white;
            border-radius: 15px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            overflow: hidden;
            max-width: 1000px;
            width: 100%;
        }

        .login-left {
            flex: 1;
            padding: 60px 50px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .login-left h2 {
            color: #667eea;
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 1px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .login-left h1 {
            color: #333;
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .login-left form {
            display: flex;
            flex-direction: column;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            margin-bottom: 6px;
        }

        .login-left label {
            color: #555;
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 5px;
            display: block;
            letter-spacing: 0.3px;
        }

        .login-left input {
            padding: 12px 14px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 14px;
            font-family: 'Poppins', sans-serif;
            transition: all 0.3s ease;
            line-height: 1.4;
        }

        .login-left input:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
        }

        .login-left input::placeholder {
            color: #bbb;
        }

        .forgot {
            text-align: right;
            margin-bottom: 8px;
            margin-top: -2px;
        }

        .forgot a {
            color: #667eea;
            font-size: 13px;
            font-weight: 600;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .forgot a:hover {
            color: #764ba2;
            text-decoration: underline;
        }

        .login-left button {
            padding: 12px 18px;
            border: none;
            border-radius: 8px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
            margin-top: 2px;
            margin-bottom: 0;
            width: 100%;
        }

        .login-left button:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(102, 126, 234, 0.6);
        }

        .login-left button:active {
            transform: translateY(0);
        }

        .signup {
            text-align: center;
            color: #666;
            font-size: 14px;
            padding-top: 10px;
            border-top: 1px solid #e0e0e0;
        }

        .signup a {
            color: #667eea;
            font-weight: 600;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .signup a:hover {
            color: #764ba2;
            text-decoration: underline;
        }

        .signup-button {
            display: block;
            padding: 12px 20px;
            background: #f0f0f0;
            color: #333;
            border: 2px solid #667eea;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            text-align: center;
            transition: all 0.3s ease;
            width: 100%;
            box-sizing: border-box;
            font-size: 14px;
        }

        .signup-button:hover {
            background: #667eea;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(102, 126, 234, 0.6);
        }

        .divider {
            text-align: center;
            margin: 8px 0 8px 0;
            font-size: 12px;
            color: #999;
        }

        .store-buttons {
            display: flex;
            gap: 15px;
            margin-bottom: 15px;
        }

        .store-buttons img {
            height: 40px;
            cursor: pointer;
            transition: transform 0.3s ease;
        }

        .store-buttons img:hover {
            transform: scale(1.05);
        }

        .login-right {
            flex: 1;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 60px 50px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .login-right h2 {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 40px;
        }

        .login-right img {
            max-width: 100%;
            height: auto;
            margin-bottom: 30px;
            border-radius: 10px;
        }

        .login-right h3 {
            font-size: 22px;
            font-weight: 600;
            margin-bottom: 15px;
        }

        .login-right p {
            font-size: 14px;
            line-height: 1.6;
            opacity: 0.9;
        }

        .error-message {
            color: #d32f2f;
            font-size: 13px;
            margin-top: 5px;
        }

        @media (max-width: 768px) {
            .login-container {
                flex-direction: column;
            }

            .login-left,
            .login-right {
                padding: 40px 30px;
            }

            .login-left h1 {
                font-size: 24px;
            }
        }
    </style>
</head>
<body>

<div class="login-container">

    <!-- LEFT SIDE -->
    <div class="login-left">
        <div class="store-buttons">
            <img src="https://developer.apple.com/assets/elements/badges/download-on-the-app-store.svg" alt="App Store">
            <img src="https://upload.wikimedia.org/wikipedia/commons/7/78/Google_Play_Store_badge_EN.svg" alt="Google Play">
        </div>

        <h2>Welcome</h2>
        <h1>Log In</h1>

        <form method="POST" action="{{ route('login.store') }}">
            @csrf

            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" placeholder="Enter your registered email" required value="{{ old('email') }}">
                @error('email')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" placeholder="Enter your password" required>
                @error('password')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="forgot">
                <a href="#">Forgot password?</a>
            </div>

            <button type="submit">Log In</button>

            <div class="divider">or</div>

            <a href="{{ route('register') }}" class="signup-button">Create New Account</a>
        </form>
    </div>

    <!-- RIGHT SIDE -->
    <div class="login-right">
        <h2>SpasilaLahanPetani</h2>

        <img src="{{ asset('images/login/farmers.avif') }}" alt="Farmers Illustration">

        <h3>Get the best premium food</h3>
        <p>You can get the best premium food with the best price only in HERE!</p>
    </div>

</div>

</body>
</html>
