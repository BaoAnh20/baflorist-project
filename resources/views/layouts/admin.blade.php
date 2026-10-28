<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin - BAFlorist')</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Gọi file CSS via Vite -->
    @vite(['resources/css/admin.css'])
    
    @stack('styles')
</head> 
<body>
    <div class="d-flex" style="min-height: 100vh;">
       <!-- Sidebar -->
<div class="sidebar p-3 d-none d-lg-block" style="width: 260px; flex-shrink: 0;">
    <!-- Logo (Đồng bộ với trang Login) -->
    <a href="{{ route('admin.dashboard') }}" class="d-flex align-items-center mb-4 text-decoration-none px-2 gap-2">
        <div class="rounded-circle bg-white d-flex align-items-center justify-content-center shadow-sm" style="width: 38px; height: 38px; flex-shrink: 0;">
            <i class="fa-solid fa-leaf" style="color: #28583b; font-size: 1.1rem;"></i>
        </div>
        <div class="d-flex flex-column">
            <span class="fs-5 fw-bold text-white lh-1" style="font-family: var(--font-heading);">BAFlorist</span>
            <span class="text-uppercase text-white-50" style="font-size: 9px; letter-spacing: 1.5px; font-weight: 600; margin-top: 3px;">Admin Panel</span>
        </div>
    </a>
    
    <hr class="opacity-25 mb-4 text-white">
    
    <ul class="nav nav-pills flex-column mb-auto">
        <li>
            <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->is('admin') ? 'active' : '' }}">
                <i class="fa-solid fa-chart-line me-2"></i> Dashboard
            </a>
        </li>

        <li>
            <a href="{{ route('admin.products.index') }}" class="nav-link {{ request()->is('admin/products*') ? 'active' : '' }}">
                <i class="fa-solid fa-spa me-2"></i> Sản phẩm & Danh mục
            </a>
        </li>
        <li>
            <a href="{{ route('admin.orders.index') }}" class="nav-link {{ request()->is('admin/orders*') ? 'active' : '' }}">
                <i class="fa-solid fa-receipt me-2"></i> Đơn hàng
            </a>
        </li>
        <li>
            <a href="{{ route('admin.users.index') }}" class="nav-link {{ request()->is('admin/users*') ? 'active' : '' }}">
                <i class="fa-solid fa-users me-2"></i> Tài khoản khách hàng
            </a>
        </li>
        <li>
            <a href="{{ route('admin.statistics.index') }}" class="nav-link {{ request()->is('admin/statistics*') ? 'active' : '' }}">
                <i class="fa-solid fa-chart-pie me-2"></i> Thống kê & Báo cáo
            </a>
        </li>
    </ul>
    
    <hr class="opacity-25 mt-4 text-white">
    
    <div class="px-2">
        <form action="{{ route('admin.logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-sm w-100 fw-semibold text-white py-2" style="background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%); border-radius: 12px; border: none; box-shadow: 0 4px 12px rgba(239, 68, 68, 0.3);">
                <i class="fa-solid fa-right-from-bracket me-1"></i> Đăng xuất Admin
            </button>
        </form>
    </div>
</div>
        <!-- Main Content Area -->
        <div class="main-content flex-grow-1 p-4" style="width: calc(100% - 260px); overflow-x: hidden;">
            <!--Hiển thị tiêu đề trang - lời chào -->
            <div class="d-flex justify-content-between align-items-center mb-4 pb-3 border-bottom border-light border-opacity-10">
                <div>
                    <h4 class="fw-bold mb-1 text-white" style="font-family: var(--font-heading) !important; color: #ffffff !important;">
                        @yield('page_title', 'Bảng Điều Khiển')
                    </h4>
                    <small class="fw-semibold" id="dynamic-greeting" style="color: rgba(255, 255, 255, 0.75) !important;">
                        <!-- JavaScript sẽ tự động điền: Chào buổi [sáng/trưa/chiều/tối], Admin Bảo Anh(CHƯA FIX HIỂN THỊ TÊN) -->
                    </small>
                </div>
            </div>

            @yield('content')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Script tự động nhận diện thời gian trong ngày để đổi lời chào -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const hour = new Date().getHours();
            let greeting = "Chào buổi tối";
            
            if (hour >= 4 && hour < 11) {
                greeting = "Chào buổi sáng";
            } else if (hour >= 11 && hour < 13) {
                greeting = "Chào buổi trưa";
            } else if (hour >= 13 && hour < 18) {
                greeting = "Chào buổi chiều";
            }
            
            document.getElementById('dynamic-greeting').innerText = `${greeting}, Admin Bảo Anh`;
        });
    </script>

    @stack('scripts')
</body>
</html>