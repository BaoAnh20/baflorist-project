@extends('layouts.app')

@section('title', 'Đăng Nhập Tài Khoản - BAFlorist')

@section('content')
<div class="container py-5 d-flex justify-content-center align-items-center" style="min-height: 75vh;">
    <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5 bg-white w-100" style="max-width: 460px; border: 1px solid rgba(123, 17, 19, 0.1) !important;">
        
        <div class="text-center mb-4">
            <h3 class="fw-bold mb-1" style="font-family: 'Playfair Display', serif; color: #5c0d0f;">Đăng Nhập</h3>
            <p class="text-muted small">Chào mừng bạn quay trở lại với tiệm hoa BAFlorist.</p>
        </div>

        <!-- login -->
        <form action="{{ route('login.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label fw-semibold small text-secondary">Địa chỉ Email <span class="text-danger">*</span></label>
                <div class="input-group">
                    <span class="input-group-text bg-light border-0 rounded-start-pill ps-3 text-muted"><i class="fa-regular fa-envelope"></i></span>
                    <input type="email" name="email" class="form-control rounded-end-pill px-3 py-2 bg-light border-0 shadow-none" placeholder="name@gmail.com" required value="{{ old('email') }}">
                </div>
            </div>

            <!-- pass -->
            <div class="mb-3">
                <div class="d-flex justify-content-between align-items-center">
                    <label class="form-label fw-semibold small text-secondary">Mật khẩu <span class="text-danger">*</span></label>
                    <a href="#" class="text-decoration-none small text-primary-custom" style="color: #7b1113;">Quên mật khẩu?</a>
                </div>
                <div class="input-group">
                    <span class="input-group-text bg-light border-0 rounded-start-pill ps-3 text-muted"><i class="fa-solid fa-lock"></i></span>
                    <input type="password" name="password" class="form-control rounded-end-pill px-3 py-2 bg-light border-0 shadow-none" placeholder="••••••••" required>
                </div>
            </div>

            <div class="form-check mb-4">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" style="border-color: #7b1113;">
                <label class="form-check-label small text-muted" for="remember">
                    Ghi nhớ đăng nhập trên thiết bị này
                </label>
            </div>

            <button type="submit" class="btn btn-primary-custom w-100 rounded-pill py-3 fw-bold text-white shadow-sm mb-3">
                Đăng Nhập <i class="fa-solid fa-arrow-right-long ms-2"></i>
            </button>
        </form>

        <!--  redirect -> đăng ký -->
        <div class="text-center mt-3 pt-3 border-top border-light">
            <small class="text-muted">Bạn chưa có tài khoản tại BAFlorist?</small>
            <a href="{{ route('register') }}" class="text-decoration-none fw-bold ms-1" style="color: #7b1113;">Đăng ký ngay</a>
        </div>
    </div>
</div>
@endsection