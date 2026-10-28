@extends('layouts.app')

@section('title', isset($product) ? $product->name . ' - BAFlorist' : 'Chi Tiết Sản Phẩm - BAFlorist')

@section('content')
<div class="container py-4">
    <!-- Điều hướng -->
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-decoration-none text-primary-custom">Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="{{ route('products.index') }}" class="text-decoration-none text-primary-custom">Sản phẩm</a></li>
            <li class="breadcrumb-item active text-truncate text-secondary" style="max-width: 250px;" aria-current="page">
                {{ $product->name ?? 'Bó hồng đỏ Crimson Heartbeat' }}
            </li>
        </ol>
    </nav>

    <div class="row g-5 align-items-start">
        <!-- Cột ảnh sản phẩm bên trái -->
        <div class="col-lg-6">
            <div class="position-relative overflow-hidden shadow-sm bg-white p-2 rounded-4" style="border: 1px solid rgba(0, 0, 0, 0.08);">
                <div class="position-relative overflow-hidden rounded-4">
                    <img src="{{ isset($product->image_path) ? asset('storage/' . $product->image_path) : 'https://images.unsplash.com/photo-1518709268805-4e9042af9f23?q=80&w=800' }}" 
                         class="img-fluid w-100 object-fit-cover rounded-4" 
                         alt="{{ $product->name ?? 'Bó hoa tươi' }}" 
                         style="height: 520px;"
                         onerror="this.src='https://images.unsplash.com/photo-1518709268805-4e9042af9f23?q=80&w=800'">
                    
                    <!-- Nút Phóng to -->
                    <button type="button" class="position-absolute bottom-0 end-0 m-3 btn btn-sm rounded-pill px-3 py-1 text-white shadow-sm" style="background-color: rgba(17, 17, 17, 0.8); border: none; font-size: 0.75rem;">
                        Phóng to
                    </button>
                </div>
            </div>
        </div>

        <!-- Cột thông tin sản phẩm bên phải (Tone Monochrome tối giản) -->
        <div class="col-lg-6 d-flex flex-column pt-2">
            <!-- Tên sản phẩm -->
            <h1 class="fw-normal mb-2 text-dark" style="font-size: 2.2rem;">
                {{ $product->name ?? 'Bó hồng đỏ Crimson Heartbeat' }}
            </h1>

            <!-- Giá tiền -->
            <div class="mb-4">
                <span class="fw-bold fs-2 price-number text-primary-custom" style="letter-spacing: -0.5px;">
                    {{ number_format($product->price ?? 1700000, 0, ',', '.') }} đ
                </span>
            </div>

            <!-- Khung 3 dịch vụ / cam kết nhỏ gọn tone sáng tinh tế -->
          <div class="p-3 mb-4 rounded-4 shadow-sm bg-white" style="border: 1px solid rgba(0, 0, 0, 0.08);">
    <div class="row text-center g-2">
        <div class="col-6 border-end" style="border-color: rgba(0, 0, 0, 0.06) !important;">
            <div class="py-1">
                <i class="fa-solid fa-truck mb-1 text-primary-custom" style="font-size: 1.1rem;"></i>
                <div class="fw-bold text-dark" style="font-size: 0.8rem;">Miễn phí ship</div>
                <div class="text-muted" style="font-size: 0.7rem;">Đơn từ 1.000.000đ nội thành</div>
            </div>
        </div>
        
        <div class="col-6">
            <div class="py-1">
                <i class="fa-solid fa-feather mb-1 text-primary-custom" style="font-size: 1.1rem;"></i>
                <div class="fw-bold text-dark" style="font-size: 0.8rem;">Thiệp viết tay</div>
                <div class="text-muted" style="font-size: 0.7rem;">Chữ viết tỉ mỉ</div>
            </div>
        </div>
    </div>
</div>

            <!-- Form Thêm vào giỏ & Mua ngay -->
            <form action="{{ route('cart.add', $product->id ?? 1) }}" method="POST" id="productForm">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id ?? 1 }}">
                <input type="hidden" name="quantity" value="1">

                <div class="d-flex align-items-center gap-3 flex-wrap">
                <button type="submit" class="btn rounded-pill px-4 py-3 fw-semibold bg-white flex-grow-1 shadow-sm product-outline-btn" style="border: 1px solid #111111; color: #111111; transition: all 0.2s;">
                        Thêm vào giỏ
                    </button>

                    <a href="{{ route('checkout.index') ?? '#' }}" class="btn rounded-pill px-4 py-3 fw-semibold text-white flex-grow-1 shadow-sm text-center text-decoration-none btn-primary-custom">
                        Đặt ngay
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .product-outline-btn:hover {
        background-color: #f8f8f8 !important;
        color: #000000 !important;
        border-color: #000000 !important;
    }
</style>
@endpush