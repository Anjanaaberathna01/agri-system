<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SpasilaLahanPetani - Agricultural Tools & Fertilizers Store')</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-color: #f8f9fa;
        }

        .container {
            max-width: 1200px;
        }
    </style>

    @yield('styles')
</head>
<body>

    <!-- Navigation -->
    @include('layouts.nav')

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-dark text-white py-5 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <h5>SpasilaLahanPetani</h5>
                    <p>Your trusted agricultural tools and fertilizers store.</p>
                </div>
                <div class="col-md-4 mb-4">
                    <h5>Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('home') }}" class="text-white-50 text-decoration-none">Home</a></li>
                        <li><a href="{{ route('tools.index') }}" class="text-white-50 text-decoration-none">Tools</a></li>
                        <li><a href="{{ route('fertilizers.index') }}" class="text-white-50 text-decoration-none">Fertilizers</a></li>
                    </ul>
                </div>
                <div class="col-md-4 mb-4">
                    <h5>Contact</h5>
                    <p class="text-white-50">Email: info@spasila.com<br>Phone: +1 (555) 123-4567</p>
                </div>
            </div>
            <hr class="bg-white-50">
            <div class="text-center text-white-50">
                <p>&copy; 2025 SpasilaLahanPetani. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    @yield('scripts')
</body>
</html>
