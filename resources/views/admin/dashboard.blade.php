@extends('layouts.admin')

@section('title', 'Dashboard - BAFlorist Admin')
@section('page_title', 'Tổng Quan Cửa Hàng')

@section('content')
<!--Thống kê Nhanh -->
<div class="row g-4 mb-4">
    <div class="col-md-3">
        <div class="card p-3 border-start border-4 border-info">
            <small class="d-block text-uppercase fw-semibold" style="font-size: 0.75rem; letter-spacing: 0.5px; color: rgba(255, 255, 255, 0.85) !important;">Tổng Doanh Thu</small>
            <span class="fs-4 fw-bold price-number mt-1" style="color: #ffffff !important;">158.450.000 ₫</span>
            <small class="text-success mt-2 d-block fw-medium" style="font-size: 0.8rem;">
                <i class="fa-solid fa-arrow-up me-1"></i>+12% so với tháng trước
            </small>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card p-3 border-start border-4 border-warning">
            <small class="d-block text-uppercase fw-semibold" style="font-size: 0.75rem; letter-spacing: 0.5px; color: rgba(255, 255, 255, 0.85) !important;">Tổng Đơn Hàng</small>
            <span class="fs-4 fw-bold mt-1" style="color: #ffffff !important;">124 đơn</span>
            <small class="mt-2 d-block fw-medium" style="font-size: 0.8rem;">
                <i class="fa-solid fa-clock me-1 text-warning"></i><span class="text-warning fw-semibold">12 đơn chờ xác nhận</span>
            </small>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card p-3 border-start border-4 border-primary">
            <small class="d-block text-uppercase fw-semibold" style="font-size: 0.75rem; letter-spacing: 0.5px; color: rgba(255, 255, 255, 0.85) !important;">Sản Phẩm Đang Bán</small>
            <span class="fs-4 fw-bold mt-1" style="color: #ffffff !important;">48 mẫu hoa</span>
            <small class="mt-2 d-block" style="font-size: 0.8rem; color: rgba(255, 255, 255, 0.85) !important;">8 danh mục mẫu thiết kế</small>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card p-3 border-start border-4 border-success">
            <small class="d-block text-uppercase fw-semibold" style="font-size: 0.75rem; letter-spacing: 0.5px; color: rgba(255, 255, 255, 0.85) !important;">Khách Hàng</small>
            <span class="fs-4 fw-bold mt-1" style="color: #ffffff !important;">89 thành viên</span>
            <small class="text-success mt-2 d-block fw-medium" style="font-size: 0.8rem;">
                <i class="fa-solid fa-user-plus me-1"></i>+5 mới hôm nay
            </small>
        </div>
    </div>
</div>

<!-- Đơn hàng mới nhất -->
<div class="card p-4">
    <div class="d-flex align-items-center justify-content-between mb-3">
        <h5 class="fw-bold mb-0" style="color: #ffffff !important; font-family: var(--font-heading);">Đơn Hàng Mới Nhất</h5>
        <a href="#" class="text-decoration-none small fw-semibold" style="color: #38bdf8;">Xem tất cả <i class="fa-solid fa-arrow-right ms-1"></i></a>
    </div>
    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead>
                <tr style="color: #ffffff !important;">
                    <th style="color: #38bdf8 !important;">MÃ ĐƠN</th>
                    <th style="color: #38bdf8 !important;">KHÁCH HÀNG</th>
                    <th style="color: #38bdf8 !important;">NGÀY ĐẶT</th>
                    <th style="color: #38bdf8 !important;">TỔNG TIỀN</th>
                    <th style="color: #38bdf8 !important;">TRẠNG THÁI</th>
                    <th class="text-end" style="color: #38bdf8 !important;">THAO TÁC</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><strong style="color: #ffffff !important;">#BAF-20261019-01</strong></td>
                    <td class="fw-semibold" style="color: #ffffff !important;">Nguyễn Thị Bảo Anh</td>
                    <td class="small" style="color: rgba(255, 255, 255, 0.8) !important;">19/10/2026 10:15</td>
                    <td class="price-number fw-bold" style="color: #ffffff !important;">7.900.000 ₫</td>
                    <td>
<span class="badge bg-warning text-dark px-3 py-1.5 fw-semibold" style="color: #0f172a !important;">Chờ xác nhận</span>                    </td>
                    <td class="text-end">
                        <a href="{{ route('admin.orders.show', 1) }}" class="btn btn-sm btn-outline-light px-3 py-1">
                            <i class="fa-solid fa-eye me-1"></i> Chi tiết
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection