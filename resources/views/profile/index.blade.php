@extends('layouts.app')

@section('title', 'Tài Khoản Của Tôi - BAFlorist')

@section('content')
<div class="container py-5" style="max-width: 800px;">
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-decoration-none text-muted">Trang chủ</a></li>
            <li class="breadcrumb-item active fw-bold text-primary-custom" aria-current="page">Tài khoản của tôi</li>
        </ol>
    </nav>

    <div class="text-center mb-4">
        <h2 class="fw-bold" style="font-family: 'Playfair Display', serif; color: #5c0d0f;">Hồ Sơ Cá Nhân</h2>
        <p class="text-muted small">Quản lý thông tin tài khoản và bảo mật bảo vệ đơn hàng của bạn tại BAFlorist.</p>
    </div>

    @if(session('success'))
        <div class="alert alert-success border-0 rounded-4 shadow-sm p-3 mb-4">
            <i class="fa-solid fa-circle-check me-2"></i> {{ session('success') }}
        </div>
    @endif

    <div class="row g-4">
        <!-- Cập nhật thông tin -->
        <div class="col-md-6">
            <div class="card border-0 shadow-sm rounded-4 p-4 h-100 bg-white" style="border: 1px solid rgba(123, 17, 19, 0.1) !important;">
                <h5 class="fw-bold mb-3 pb-2 border-bottom" style="font-family: 'Playfair Display', serif; color: #5c0d0f;">
                    <i class="fa-regular fa-user me-2"></i> Thông Tin Cá Nhân
                </h5>
                <form action="{{ route('profile.update') }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label fw-semibold small text-secondary">Họ và tên <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control rounded-pill px-3 py-2 bg-light border-0 shadow-none" required value="{{ old('name', Auth::user()->name ?? 'Nguyễn Thị Bảo Anh') }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold small text-secondary">Địa chỉ Email đăng nhập</label>
                        <input type="email" class="form-control rounded-pill px-3 py-2 bg-light border-0 shadow-none text-muted" disabled value="{{ Auth::user()->email ?? 'baoanh@gmail.com' }}">
                        <small class="text-muted" style="font-size: 0.72rem;">Email dùng để định danh tài khoản và không thể thay đổi.</small>
                    </div>

                    <button type="submit" class="btn btn-primary-custom w-100 rounded-pill py-2 fw-bold text-white shadow-sm mt-3">
                        Cập nhật thông tin
                    </button>
                </form>
            </div>
        </div>

        <!-- Cập nhật mật khẩu -->
        <div class="col-md-6">
            <div class="card border-0 shadow-sm rounded-4 p-4 h-100 bg-white" style="border: 1px solid rgba(123, 17, 19, 0.1) !important;">
                <h5 class="fw-bold mb-3 pb-2 border-bottom" style="font-family: 'Playfair Display', serif; color: #5c0d0f;">
                    <i class="fa-solid fa-lock me-2"></i> Đổi Mật Khẩu
                </h5>
                <form action="{{ route('profile.password.update') }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label fw-semibold small text-secondary">Mật khẩu hiện tại <span class="text-danger">*</span></label>
                        <input type="password" name="current_password" class="form-control rounded-pill px-3 py-2 bg-light border-0 shadow-none" placeholder="••••••••" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold small text-secondary">Mật khẩu mới <span class="text-danger">*</span></label>
                        <input type="password" name="password" class="form-control rounded-pill px-3 py-2 bg-light border-0 shadow-none" placeholder="Ít nhất 8 ký tự" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold small text-secondary">Xác nhận mật khẩu mới <span class="text-danger">*</span></label>
                        <input type="password" name="password_confirmation" class="form-control rounded-pill px-3 py-2 bg-light border-0 shadow-none" placeholder="Nhập lại mật khẩu mới" required>
                    </div>

                    <button type="submit" class="btn btn-outline-burgundy w-100 rounded-pill py-2 fw-semibold mt-3">
                        Đổi mật khẩu
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection