<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile | SpasilaLahanPetani</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: #f5f7fa;
            min-height: 100vh;
            padding: 0;
        }

        .container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 20px;
        }

        .header {
            background: linear-gradient(135deg, #ff9500 0%, #ff7c00 100%);
            color: white;
            padding: 30px;
            border-radius: 15px;
            margin-bottom: 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .header h1 {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .header p {
            font-size: 14px;
            opacity: 0.9;
        }

        .profile-container {
            display: grid;
            grid-template-columns: 300px 1fr;
            gap: 30px;
        }

        .profile-sidebar {
            background: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
        }

        .profile-photo-section {
            text-align: center;
            margin-bottom: 25px;
        }

        .profile-photo {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            border: 5px solid #ff9500;
            margin-bottom: 15px;
        }

        .profile-photo-placeholder {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            background: linear-gradient(135deg, #ff9500 0%, #ff7c00 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px;
            border: 5px solid #ff9500;
        }

        .profile-photo-placeholder span {
            color: white;
            font-size: 48px;
            font-weight: 700;
        }

        .photo-upload-btn {
            display: inline-block;
            padding: 10px 20px;
            background: #ff9500;
            color: white;
            border-radius: 8px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .photo-upload-btn:hover {
            background: #ff7c00;
            transform: translateY(-2px);
        }

        .photo-upload-btn input {
            display: none;
        }

        .user-info {
            text-align: center;
            padding-top: 15px;
            border-top: 2px solid #f0f0f0;
        }

        .user-info h3 {
            font-size: 18px;
            font-weight: 600;
            color: #333;
            margin-bottom: 5px;
        }

        .user-info p {
            font-size: 14px;
            color: #666;
        }

        .profile-main {
            background: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
        }

        .nav-tabs {
            display: flex;
            gap: 10px;
            margin-bottom: 30px;
            border-bottom: 2px solid #f0f0f0;
        }

        .nav-tab {
            padding: 12px 24px;
            background: none;
            border: none;
            border-bottom: 3px solid transparent;
            cursor: pointer;
            font-size: 15px;
            font-weight: 600;
            color: #666;
            transition: all 0.3s ease;
            font-family: 'Poppins', sans-serif;
        }

        .nav-tab.active {
            color: #ff9500;
            border-bottom-color: #ff9500;
        }

        .nav-tab:hover {
            color: #ff9500;
        }

        .tab-content {
            display: none;
        }

        .tab-content.active {
            display: block;
        }

        .form-section {
            margin-bottom: 25px;
        }

        .form-section h3 {
            font-size: 18px;
            font-weight: 600;
            color: #333;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #f0f0f0;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .form-group.full-width {
            grid-column: 1 / -1;
        }

        .form-group label {
            color: #555;
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .form-group input,
        .form-group textarea {
            padding: 12px 14px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 14px;
            font-family: 'Poppins', sans-serif;
            transition: all 0.3s ease;
        }

        .form-group textarea {
            resize: vertical;
            min-height: 100px;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: #ff9500;
            box-shadow: 0 0 0 4px rgba(255, 149, 0, 0.1);
        }

        .form-group input[readonly] {
            background: #f5f5f5;
            cursor: not-allowed;
        }

        .btn {
            padding: 12px 30px;
            border: none;
            border-radius: 8px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            font-family: 'Poppins', sans-serif;
        }

        .btn-primary {
            background: linear-gradient(135deg, #ff9500 0%, #ff7c00 100%);
            color: white;
            box-shadow: 0 4px 15px rgba(255, 149, 0, 0.4);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(255, 149, 0, 0.6);
        }

        .btn-secondary {
            background: #f0f0f0;
            color: #333;
            margin-left: 10px;
        }

        .btn-secondary:hover {
            background: #e0e0e0;
        }

        .alert {
            padding: 15px 20px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .alert-success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .alert-error {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        .error-message {
            color: #d32f2f;
            font-size: 13px;
            margin-top: 5px;
        }

        @media (max-width: 768px) {
            .profile-container {
                grid-template-columns: 1fr;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

            .nav-tabs {
                overflow-x: auto;
            }
        }
    </style>
</head>
<body>
    @include('layouts.nav')

    <div class="container">

        <div class="header">
            <h1>My Profile</h1>
            <p>Manage your personal information and account settings</p>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-error">
                <strong>Error:</strong> Please fix the errors below.
            </div>
        @endif

        <div class="profile-container">
            <!-- Sidebar -->
            <div class="profile-sidebar">
                <div class="profile-photo-section">
                    @if($user->profile_photo)
                        <img src="{{ asset('storage/' . $user->profile_photo) }}" alt="Profile Photo" class="profile-photo" id="profilePreview">
                    @else
                        <div class="profile-photo-placeholder" id="profilePlaceholder">
                            <span>{{ strtoupper(substr($user->first_name ?? 'U', 0, 1)) }}</span>
                        </div>
                    @endif

                    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" id="photoForm">
                        @csrf
                        @method('PUT')
                        <label class="photo-upload-btn">
                            Choose Photo
                            <input type="file" name="profile_photo" accept="image/*" onchange="previewPhoto(event)">
                        </label>
                    </form>
                </div>

                <div class="user-info">
                    <h3>{{ $user->first_name }} {{ $user->last_name }}</h3>
                    <p>{{ $user->email }}</p>
                </div>
            </div>

            <!-- Main Content -->
            <div class="profile-main">
                <div class="nav-tabs">
                    <button class="nav-tab active" onclick="showTab('personal')">Personal Info</button>
                    <button class="nav-tab" onclick="showTab('security')">Security</button>
                </div>

                <!-- Personal Information Tab -->
                <div id="personal" class="tab-content active">
                    <form action="{{ route('profile.update') }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-section">
                            <h3>Basic Information</h3>
                            <div class="form-grid">
                                <div class="form-group">
                                    <label>First Name *</label>
                                    <input type="text" name="first_name" value="{{ old('first_name', $user->first_name) }}" required>
                                    @error('first_name')
                                        <span class="error-message">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Last Name *</label>
                                    <input type="text" name="last_name" value="{{ old('last_name', $user->last_name) }}" required>
                                    @error('last_name')
                                        <span class="error-message">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group full-width">
                                    <label>Email Address</label>
                                    <input type="email" value="{{ $user->email }}" readonly>
                                    <small style="color: #999; font-size: 12px; margin-top: 5px;">Email cannot be changed</small>
                                </div>
                            </div>
                        </div>

                        <div class="form-section">
                            <h3>Contact Information</h3>
                            <div class="form-grid">
                                <div class="form-group">
                                    <label>Mobile Number 1</label>
                                    <input type="tel" name="phone" value="{{ old('phone', $user->phone) }}" placeholder="+1 234 567 8900">
                                    @error('phone')
                                        <span class="error-message">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Mobile Number 2</label>
                                    <input type="tel" name="mobile_number_2" value="{{ old('mobile_number_2', $user->mobile_number_2) }}" placeholder="+1 234 567 8901">
                                    @error('mobile_number_2')
                                        <span class="error-message">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group full-width">
                                    <label>Address</label>
                                    <textarea name="address" placeholder="Enter your full address">{{ old('address', $user->address) }}</textarea>
                                    @error('address')
                                        <span class="error-message">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div style="text-align: right;">
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                        </div>
                    </form>
                </div>

                <!-- Security Tab -->
                <div id="security" class="tab-content">
                    <form action="{{ route('profile.password') }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-section">
                            <h3>Change Password</h3>
                            <div class="form-grid">
                                <div class="form-group full-width">
                                    <label>Current Password *</label>
                                    <input type="password" name="current_password" required>
                                    @error('current_password')
                                        <span class="error-message">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>New Password *</label>
                                    <input type="password" name="new_password" required minlength="8">
                                    @error('new_password')
                                        <span class="error-message">{{ $message }}</span>
                                    @enderror
                                    <small style="color: #999; font-size: 12px; margin-top: 5px;">Minimum 8 characters</small>
                                </div>

                                <div class="form-group">
                                    <label>Confirm New Password *</label>
                                    <input type="password" name="new_password_confirmation" required minlength="8">
                                </div>
                            </div>
                        </div>

                        <div style="text-align: right;">
                            <button type="submit" class="btn btn-primary">Update Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Tab switching
        function showTab(tabName) {
            // Hide all tabs
            document.querySelectorAll('.tab-content').forEach(tab => {
                tab.classList.remove('active');
            });
            document.querySelectorAll('.nav-tab').forEach(tab => {
                tab.classList.remove('active');
            });

            // Show selected tab
            document.getElementById(tabName).classList.add('active');
            event.target.classList.add('active');
        }

        // Photo preview
        function previewPhoto(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const placeholder = document.getElementById('profilePlaceholder');
                    const preview = document.getElementById('profilePreview');

                    if (placeholder) {
                        placeholder.outerHTML = '<img src="' + e.target.result + '" alt="Profile Photo" class="profile-photo" id="profilePreview">';
                    } else if (preview) {
                        preview.src = e.target.result;
                    }

                    // Auto-submit the form to upload the photo
                    document.getElementById('photoForm').submit();
                };
                reader.readAsDataURL(file);
            }
        }
    </script>
</body>
</html>
