@extends('layouts.app')

@section('title', 'Đăng Ký Tài Khoản - BAFlorist')

@section('content')
<div class="container py-5 d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5 bg-white w-100" style="max-width: 480px; border: 1px solid rgba(123, 17, 19, 0.1) !important;">
        
        <div class="text-center mb-4">
            <h3 class="fw-bold mb-1" style="font-family: 'Playfair Display', serif; color: #5c0d0f;">Tạo Tài Khoản</h3>
            <p class="text-muted small">Đăng ký thành viên để tích điểm và nhận ưu đãi độc quyền từ BAFlorist.</p>
        </div>

        <!-- register form -->
        <form action="{{ route('register.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label fw-semibold small text-secondary">Họ và tên đầy đủ <span class="text-danger">*</span></label>
                <input type="text" name="name" class="form-control rounded-pill px-3 py-2 bg-light border-0 shadow-none" placeholder="Nguyễn Thị Bảo Anh" required value="{{ old('name') }}">
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold small text-secondary">Email hoặc Số điện thoại <span class="text-danger">*</span></label>
                <input type="text" name="email_or_phone" class="form-control rounded-pill px-3 py-2 bg-light border-0 shadow-none" placeholder="Nhập email hoặc số điện thoại của bạn" required value="{{ old('email_or_phone') }}">
            </div>

            <!-- pass -->
            <div class="mb-3">
                <label class="form-label fw-semibold small text-secondary">Mật khẩu <span class="text-danger">*</span></label>
                <input type="password" name="password" class="form-control rounded-pill px-3 py-2 bg-light border-0 shadow-none" placeholder="Ít nhất 8 ký tự" required>
            </div>

            <div class="mb-4">
                <label class="form-label fw-semibold small text-secondary">Nhập lại mật khẩu <span class="text-danger">*</span></label>
                <input type="password" name="password_confirmation" class="form-control rounded-pill px-3 py-2 bg-light border-0 shadow-none" placeholder="Xác nhận mật khẩu" required>
            </div>


            <!--  submit -->
            <button type="submit" class="btn btn-primary-custom w-100 rounded-pill py-3 fw-bold text-white shadow-sm mb-3">
                Đăng Ký <i class="fa-solid fa-arrow-right-long ms-2"></i>
            </button>
        </form>

        <!-- redirect -> đăng nhập -->
        <div class="text-center mt-3 pt-3 border-top border-light">
            <small class="text-muted">Đã có tài khoản?</small>
            <a href="{{ route('login') }}" class="text-decoration-none fw-bold ms-1" style="color: #7b1113;">Đăng nhập ngay</a>
        </div>
    </div>
</div>
@endsection