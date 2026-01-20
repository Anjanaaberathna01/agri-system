<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password - Supplier Portal</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
        }

        .container {
            background: white;
            max-width: 500px;
            width: 100%;
            padding: 2.5rem;
            border-radius: 16px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
        }

        .header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .header i {
            font-size: 3rem;
            color: #667eea;
            margin-bottom: 1rem;
        }

        h1 {
            font-size: 1.8rem;
            color: #333;
            margin-bottom: 0.5rem;
        }

        .subtitle {
            color: #666;
            font-size: 0.95rem;
        }

        .alert {
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.8rem;
        }

        .alert-info {
            background: #dbeafe;
            color: #1e40af;
            border-left: 4px solid #3b82f6;
        }

        .alert-error {
            background: #fee2e2;
            color: #991b1b;
            border-left: 4px solid #ef4444;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        label {
            display: block;
            color: #333;
            font-weight: 600;
            margin-bottom: 0.5rem;
            font-size: 0.95rem;
        }

        .input-wrapper {
            position: relative;
        }

        input {
            width: 100%;
            padding: 0.9rem 1rem 0.9rem 3rem;
            border: 2px solid #e5e7eb;
            border-radius: 10px;
            font-size: 0.95rem;
            transition: all 0.3s ease;
        }

        input:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        .input-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #9ca3af;
        }

        .error-text {
            color: #dc2626;
            font-size: 0.85rem;
            margin-top: 0.3rem;
            display: flex;
            align-items: center;
            gap: 0.3rem;
        }

        .btn {
            width: 100%;
            padding: 1rem;
            border: none;
            border-radius: 10px;
            font-weight: 700;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            box-shadow: 0 10px 20px rgba(102, 126, 234, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 30px rgba(102, 126, 234, 0.4);
        }

        .password-requirements {
            background: #f9fafb;
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 1.5rem;
        }

        .password-requirements h3 {
            font-size: 0.9rem;
            color: #333;
            margin-bottom: 0.5rem;
        }

        .password-requirements ul {
            list-style: none;
            padding-left: 0;
        }

        .password-requirements li {
            font-size: 0.85rem;
            color: #666;
            padding: 0.2rem 0;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .password-requirements li i {
            color: #667eea;
            font-size: 0.7rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <i class="fas fa-key"></i>
            <h1>Change Your Password</h1>
            <p class="subtitle">For security, please create a new password</p>
        </div>

        @if(session('info'))
            <div class="alert alert-info">
                <i class="fas fa-info-circle"></i>
                {{ session('info') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-error">
                <i class="fas fa-exclamation-triangle"></i>
                <div>
                    @foreach($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            </div>
        @endif

        <form method="POST" action="{{ route('supplier.change-password.update') }}">
            @csrf

            <div class="form-group">
                <label for="current_password">Current Password</label>
                <div class="input-wrapper">
                    <i class="fas fa-lock input-icon"></i>
                    <input type="password" name="current_password" id="current_password" placeholder="Enter default password (12345678)" required>
                </div>
                @error('current_password')
                    <span class="error-text"><i class="fas fa-exclamation-circle"></i>{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="new_password">New Password</label>
                <div class="input-wrapper">
                    <i class="fas fa-key input-icon"></i>
                    <input type="password" name="new_password" id="new_password" placeholder="Create new password" required>
                </div>
                @error('new_password')
                    <span class="error-text"><i class="fas fa-exclamation-circle"></i>{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="new_password_confirmation">Confirm New Password</label>
                <div class="input-wrapper">
                    <i class="fas fa-check-circle input-icon"></i>
                    <input type="password" name="new_password_confirmation" id="new_password_confirmation" placeholder="Re-enter new password" required>
                </div>
            </div>

            <div class="password-requirements">
                <h3><i class="fas fa-shield-alt"></i> Password Requirements:</h3>
                <ul>
                    <li><i class="fas fa-circle"></i> At least 8 characters long</li>
                    <li><i class="fas fa-circle"></i> Must be different from default password</li>
                    <li><i class="fas fa-circle"></i> Both passwords must match</li>
                </ul>
            </div>

            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Update Password
            </button>
        </form>
    </div>
</body>
</html>
