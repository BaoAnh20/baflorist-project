@extends('layouts.admin')

@section('title', 'Thống Kê & Báo Cáo - BAFlorist Admin')
@section('page_title', 'Báo Cáo Doanh Thu & Bán Hàng')

@section('content')
<div class="row g-4 mb-4">
    <!--biểu đồ doanh thu-->
    <div class="col-md-6">
        <div class="card border-0 shadow-none bg-transparent p-0">
            <h6 class="fw-bold mb-3 text-white" style="font-family: var(--font-heading);">Doanh Thu Theo Tháng</h6>
            <div class="p-5 text-center rounded-4 border border-light border-opacity-25 d-flex flex-column align-items-center justify-content-center" style="min-height: 250px; background: rgba(255, 255, 255, 0.05) !important; backdrop-filter: blur(10px);">
                <i class="fa-solid fa-chart-column fs-1 mb-2 text-info"></i>
                <p class="mb-0 fw-semibold text-white">Biểu đồ doanh thu (Tích hợp Chart.js)</p>
            </div>
        </div>
    </div>

    <!-- biểu đồ đơn hàng -->
    <div class="col-md-6">
        <div class="card border-0 shadow-none bg-transparent p-0">
            <h6 class="fw-bold mb-3 text-white" style="font-family: var(--font-heading);">Tỷ Lệ Trạng Thái Đơn Hàng</h6>
            <div class="p-5 text-center rounded-4 border border-light border-opacity-25 d-flex flex-column align-items-center justify-content-center" style="min-height: 250px; background: rgba(255, 255, 255, 0.05) !important; backdrop-filter: blur(10px);">
                <i class="fa-solid fa-chart-pie fs-1 mb-2 text-info"></i>
                <p class="mb-0 fw-semibold text-white">Biểu đồ cơ cấu đơn hàng</p>
            </div>
        </div>
    </div>
</div>
@endsection