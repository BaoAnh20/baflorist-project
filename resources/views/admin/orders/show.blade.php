@extends('layouts.admin')

@section('title', 'Chi Tiết Đơn Hàng - BAFlorist Admin')
@section('page_title', 'Chi Tiết Đơn Hàng #' . ($id ?? 'BAF-20261019-01'))

@section('content')
<div class="row g-4">
    <!-- Cột thông tin đơn & Sản phẩm -->
    <div class="col-md-8">
        <!-- Sản Phẩm Đặt Mua -->
        <div class="card border-0 shadow-none bg-transparent p-0 mb-4">
            <h6 class="fw-bold mb-3 text-white" style="font-family: var(--font-heading);">Sản Phẩm Đặt Mua</h6>
            <div class="d-flex align-items-center justify-content-between py-3 border-bottom border-light border-opacity-10">
                <div class="d-flex align-items-center gap-3">
                    <img src="https://images.unsplash.com/photo-1526047932273-341f2a7631f9?q=80&w=200" class="rounded-3 border border-light border-opacity-25" width="60" height="60" alt="Product">
                    <div>
                        <h6 class="fw-bold mb-1 text-white small">Hộp mica hoa hồng hồng Pink Letter</h6>
                        <small style="color: rgba(255, 255, 255, 0.75) !important;">Số lượng: x1</small>
                    </div>
                </div>
                <span class="price-number fw-bold text-white">7.900.000 đ</span>
            </div>
            <div class="pt-3 text-end">
                <span class="fw-bold text-white">Tổng đơn hàng: </span>
                <span class="price-number fs-4 fw-bold text-info ms-2">7.900.000 đ</span>
            </div>
        </div>

        <!-- Nội Dung Thiệp & Ghi Chú -->
        <div class="card border-0 shadow-none bg-transparent p-0">
            <h6 class="fw-bold mb-3 text-white" style="font-family: var(--font-heading);">Nội Dung Thiệp & Ghi Chú</h6>
            <div class="p-3 rounded-3 fst-italic small border border-light border-opacity-25 text-white" style="background: rgba(255, 255, 255, 0.05) !important; backdrop-filter: blur(10px);">
                "Chúc mừng sinh nhật em yêu! Chúc em luôn rạng rỡ và hạnh phúc."
            </div>
        </div>
    </div>

    <!-- Cột xử lý trạng thái & Giao nhận -->
    <div class="col-md-4">
        <!-- Dropdown Cập nhật trạng thái -->
        <div class="card border-0 shadow-none bg-transparent p-0 mb-4">
            <h6 class="fw-bold mb-3 text-white" style="font-family: var(--font-heading);">Cập Nhật Trạng Thái</h6>
            <form action="{{ route('admin.orders.update_status', $id ?? 1) }}" method="POST">
                @csrf
@method('PATCH')
<select name="status" class="form-select px-3 py-2.5 bg-light border-0 shadow-none mb-3 fw-semibold rounded-3" style="color: #cbd5e1 !important;">
    <option value="pending" style="color: #475569 !important;" selected>Chờ xác nhận (Cọc 30%)</option>
    <option value="processing" style="color: #475569 !important;">Đang cắm hoa</option>
    <option value="shipping" style="color: #475569 !important;">Đang giao hàng</option>
    <option value="completed" style="color: #475569 !important;">Đã giao thành công</option>
    <option value="cancelled" style="color: #475569 !important;">Đã hủy đơn</option>
</select>
                <button type="submit" class="btn btn-sm btn-primary w-100 py-2.5 fw-bold shadow-sm rounded-3">
                    Lưu Trạng Thái
                </button>
            </form>
        </div>

        <!-- Thông tin giao nhận -->
        <div class="card border-0 shadow-none bg-transparent p-0">
            <h6 class="fw-bold mb-3 text-white" style="font-family: var(--font-heading);">Thông Tin Giao Hoa</h6>
            <div class="small d-flex flex-column gap-2" style="color: rgba(255, 255, 255, 0.85) !important;">
                <div>Người nhận: <strong class="text-white">Nguyễn Thị Bảo Anh</strong></div>
                <div>Số điện thoại: <strong class="text-white">0901234567</strong></div>
                <div>Địa chỉ giao: <strong class="text-white">180 Cao Lỗ, Phường 4, Quận 8, TP.HCM</strong></div>
            </div>
        </div>
    </div>
</div>
@endsection