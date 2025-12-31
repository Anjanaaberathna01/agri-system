<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register | SpasilaLahanPetani</title>

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
            background: linear-gradient(135deg, #439f33 0%, #309526 100%);
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
            margin-bottom: 10px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .login-left h1 {
            color: #333;
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 40px;
        }

        .login-left form {
            display: flex;
            flex-direction: column;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-bottom: 15px;
        }

        .form-row.full {
            grid-template-columns: 1fr;
            margin-bottom: 15px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            margin-bottom: 0;
        }

        .login-left label {
            color: #555;
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 10px;
            display: block;
            letter-spacing: 0.3px;
        }

        .login-left input {
            padding: 14px 16px;
            margin-bottom: 0;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 14px;
            font-family: 'Poppins', sans-serif;
            transition: all 0.3s ease;
            line-height: 1.5;
        }

        .login-left input:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
        }

        .login-left input::placeholder {
            color: #bbb;
        }

        .button-group {
            display: flex;
            gap: 12px;
            margin-bottom: 30px;
        }

        .login-left button,
        .login-left .cancel-btn {
            padding: 13px 20px;
            border: none;
            border-radius: 8px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            font-family: 'Poppins', sans-serif;
            flex: 1;
        }

        .login-left button {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
        }

        .login-left button:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(102, 126, 234, 0.6);
        }

        .login-left button:active {
            transform: translateY(0);
        }

        .login-left .cancel-btn {
            background-color: #e0e0e0;
            color: #333;
            text-decoration: none;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .login-left .cancel-btn:hover {
            background-color: #d0d0d0;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        .signup {
            text-align: center;
            color: #666;
            font-size: 14px;
            margin-top: 10px;
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

        .store-buttons {
            display: flex;
            gap: 15px;
            margin-bottom: 40px;
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

        @media (max-width: 768px) {
            .login-container {
                flex-direction: column;
            }

            .login-left,
            .login-right {
                padding: 40px 30px;
            }

            .form-row {
                grid-template-columns: 1fr;
                gap: 0;
            }

            .login-left input {
                margin-bottom: 20px;
            }

            .button-group {
                flex-direction: column;
            }

            .login-left button,
            .login-left .cancel-btn {
                width: 100%;
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
        <h1>Sign Up</h1>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-row">
                <div class="form-group">
                    <label>First Name</label>
                    <input type="text" name="first_name" placeholder="Enter first name" required>
                </div>

                <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" name="last_name" placeholder="Enter last name" required>
                </div>
            </div>

            <div class="form-row full">
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" placeholder="Enter email" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" placeholder="Enter password" required>
                </div>

                <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="password" name="password_confirmation" placeholder="Confirm password" required>
                </div>
            </div>

            <div class="button-group">
                <button type="submit">Register</button>
                <a href="{{ route('login') }}" class="cancel-btn">Cancel</a>
            </div>

            <p class="signup">
                Already have an account? <a href="{{ route('login') }}">Log in</a>
            </p>
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
