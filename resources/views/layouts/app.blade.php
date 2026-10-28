<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'BAFlorist - Tiệm Hoa Tươi Nghệ Thuật')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <!-- Google Fonts: Inter, Montserrat & Playfair Display -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Montserrat:wght@300;400;500;600;700&family=Playfair+Display:ital,wght@0,500;0,600;0,700;1,400&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>
<body class="d-flex flex-column min-vh-100">

    <!-- Gọi Component Navbar -->
    <x-navbar />

    <!-- Main Content -->
    <main class="py-4 flex-grow-1">
        <div class="container">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show rounded-4 border-0 shadow-sm mb-4" role="alert" style="background-color: var(--burgundy-subtle); color: var(--burgundy-dark);">
                    <i class="fa-solid fa-circle-check me-2 text-primary-custom"></i>{{ session('success') }}
                    <button type="button" class="btn-close shadow-none" data-bs-dismiss="alert"></button>
                </div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show rounded-4 border-0 shadow-sm mb-4" role="alert" style="background-color: #fce8e6; color: var(--burgundy-dark);">
                    <i class="fa-solid fa-circle-exclamation me-2 text-danger"></i>{{ session('error') }}
                    <button type="button" class="btn-close shadow-none" data-bs-dismiss="alert"></button>
                </div>
            @endif
        </div>

        @yield('content')
    </main>

    <!--  Hotline & Zalo Nổi Góc Phải -->
    <div class="floating-contact">
        <a href="tel:0901234567" class="float-btn btn-hotline">
            <i class="fa-solid fa-phone-volume"></i> Hotline
        </a>
        <a href="https://zalo.me/0901234567" target="_blank" class="float-btn btn-zalo">
            <i class="fa-solid fa-comment-dots"></i> Nhắn Zalo
        </a>
    </div>

    <!-- Gọi Component Footer -->
    <x-footer />

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>