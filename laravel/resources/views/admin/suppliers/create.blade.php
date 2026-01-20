<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Supplier - Admin</title>
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
            background-color: #f5f7fa;
            min-block-size: 100vh;
        }

        .page-container {
            max-inline-size: 900px;
            margin: 0 auto;
            padding: 2rem;
        }

        .card {
            background: white;
            border-radius: 14px;
            padding: 2rem;
            box-shadow: 0 6px 18px rgba(0,0,0,0.08);
        }

        h1 {
            font-size: 1.75rem;
            color: #333;
            margin-block-end: 0.5rem;
            display: flex;
            align-items: center;
            gap: 0.6rem;
        }

        p.subtitle {
            color: #666;
            margin-block-end: 1.5rem;
        }

        form {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 1rem 1.25rem;
        }

        label {
            display: block;
            color: #555;
            font-weight: 600;
            margin-block-end: 0.35rem;
            font-size: 0.95rem;
        }

        input, select {
            inline-size: 100%;
            padding: 0.9rem 1rem;
            border: 1px solid #dfe3e8;
            border-radius: 10px;
            background: #fdfdfd;
            font-size: 0.95rem;
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
        }

        input:focus, select:focus {
            outline: none;
            border-color: #4CAF50;
            box-shadow: 0 0 0 3px rgba(76, 175, 80, 0.12);
        }

        .actions {
            grid-column: 1 / -1;
            display: flex;
            justify-content: flex-end;
            gap: 0.75rem;
            margin-block-start: 1rem;
        }

        .btn {
            padding: 0.9rem 1.6rem;
            border: none;
            border-radius: 10px;
            font-weight: 700;
            cursor: pointer;
            font-size: 0.95rem;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            text-decoration: none;
        }

        .btn-primary {
            background: linear-gradient(135deg, #4CAF50 0%, #45a049 100%);
            color: #fff;
            box-shadow: 0 8px 18px rgba(76, 175, 80, 0.25);
        }

        .btn-secondary {
            background: #eceff1;
            color: #455a64;
        }

        .error-text {
            color: #c62828;
            font-size: 0.85rem;
            margin-block-start: 0.25rem;
        }

        @media (max-inline-size: 640px) {
            .page-container {
                padding: 1.25rem;
            }

            .actions {
                flex-direction: column-reverse;
                align-items: stretch;
            }

            .btn {
                justify-content: center;
            }
        }
    </style>
</head>
<body>
    @include('layouts.admin_nav')

    <div class="page-container">
        <div class="card">
            <h1><i class="fas fa-user-plus"></i> Add Supplier</h1>
            <p class="subtitle">Admin-only action to register supplier details.</p>

            @if ($errors->any())
                <div style="background:#ffebee; color:#c62828; padding:1rem; border-radius:10px; margin-block-end:1rem;">
                    <strong>Whoops!</strong> Please fix the following:
                    <ul style="margin:0.5rem 0 0 1.25rem;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('admin.suppliers.store') }}">
                @csrf

                <div>
                    <label for="first_name">First Name</label>
                    <input id="first_name" name="first_name" type="text" value="{{ old('first_name') }}" required>
                </div>

                <div>
                    <label for="last_name">Last Name</label>
                    <input id="last_name" name="last_name" type="text" value="{{ old('last_name') }}" required>
                </div>

                <div>
                    <label for="email">Email</label>
                    <input id="email" name="email" type="email" value="{{ old('email') }}" required>
                </div>

                <div>
                    <label for="phone">Phone Number</label>
                    <input id="phone" name="phone" type="text" value="{{ old('phone') }}" required>
                </div>

                <div>
                    <label for="product_type">Products Supplied</label>
                    <select id="product_type" name="product_type" required>
                        <option value="">Select a product type</option>
                        <option value="tools" @selected(old('product_type') === 'tools')>Tools</option>
                        <option value="fertilizer" @selected(old('product_type') === 'fertilizer')>Fertilizer</option>
                        <option value="crops" @selected(old('product_type') === 'crops')>Crops</option>
                    </select>
                </div>

                <div>
                    <label for="id_number">ID Number</label>
                    <input id="id_number" name="id_number" type="text" value="{{ old('id_number') }}" required>
                </div>

                <div>
                    <label for="country">Country</label>
                    <input id="country" name="country" type="text" value="{{ old('country') }}" required>
                </div>

                <div class="actions">
                    <a class="btn btn-secondary" href="{{ route('admin.dashboard') }}">Cancel</a>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Save Supplier</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
