@extends('layouts.admin')

@section('title', 'Quản Lý Đơn Hàng - BAFlorist Admin')
@section('page_title', 'Danh Sách Đơn Hàng')

@section('content')
<!-- Table list đơn hàng  -->
<div class="card border-0 shadow-none bg-transparent p-0">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead>
                <tr class="small border-bottom text-uppercase">
                    <th style="color: #38bdf8 !important;">MÃ ĐƠN</th>
                    <th style="color: #38bdf8 !important;">NGƯỜI ĐẶT</th>
                    <th style="color: #38bdf8 !important;">NGƯỜI NHẬN</th>
                    <th style="color: #38bdf8 !important;">THỜI GIAN GIAO</th>
                    <th style="color: #38bdf8 !important;">TỔNG TIỀN</th>
                    <th style="color: #38bdf8 !important;">TRẠNG THÁI</th>
                    <th class="text-end" style="color: #38bdf8 !important;">THAO TÁC</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><strong style="color: #ffffff !important;">#BAF-20261019-01</strong></td>
                    <td><span class="fw-semibold" style="color: #ffffff !important;">Nguyễn Văn A</span></td>
                    <td><span class="fw-semibold" style="color: #ffffff !important;">Nguyễn Thị Bảo Anh</span></td>
                    <td><span style="color: rgba(255, 255, 255, 0.8) !important;">19/10/2026 (Chiều)</span></td>
                    <td class="price-number fw-bold" style="color: #ffffff !important;">7.900.000 đ</td>
                    <td>
                        <!-- Badge trạng thái -->
                        <span class="badge status-pending px-3 py-1.5 fw-bold" style="background-color: rgba(245, 158, 11, 0.25); color: #fbbf24; border: 1px solid rgba(245, 158, 11, 0.5);">
                            Chờ xác nhận
                        </span>
                    </td>
                    <td class="text-end">
                        <a href="{{ route('admin.orders.show', 1) }}" class="btn btn-sm btn-outline-light px-3 fw-semibold rounded-pill shadow-sm">
                            <i class="fa-solid fa-eye me-1"></i> Xem
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection