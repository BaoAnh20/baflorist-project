@extends('layouts.app')

@section('title', 'Danh Sách Sản Phẩm - BAFlorist')

@section('content')
@php
    $searchKeyword = request('search', 'hoa');
    
    $dummyProducts = collect([
        (object)['id' => 1, 'name' => 'Bó Hồng Pastel Tinh Khôi', 'category' => (object)['name' => 'Hoa Tình Yêu'], 'price' => 450000, 'old_price' => 520000, 'image_path' => 'https://images.unsplash.com/photo-1561181286-d3fee7d55364?q=80&w=600'],
        (object)['id' => 2, 'name' => 'Lẵng Hướng Dương Ban Mai', 'category' => (object)['name' => 'Hoa Khai Trương'], 'price' => 680000, 'old_price' => 750000, 'image_path' => 'https://images.unsplash.com/photo-1526047932273-341f2a7631f9?q=80&w=600'],
        (object)['id' => 3, 'name' => 'Box Hoa Baby Trắng Tinh Khiết', 'category' => (object)['name' => 'Hoa Sinh Nhật'], 'price' => 390000, 'old_price' => 0, 'image_path' => 'https://images.unsplash.com/photo-1533616688419-b7a585564566?q=80&w=600'],
        (object)['id' => 4, 'name' => 'Giỏ Hoa Cẩm Chướng Ngọt Ngào', 'category' => (object)['name' => 'Hoa Kỷ Niệm'], 'price' => 550000, 'old_price' => 600000, 'image_path' => 'https://images.unsplash.com/photo-1582794543139-8ac9cb0f7b11?q=80&w=600'],
        (object)['id' => 5, 'name' => 'Bó Tulip Hà Lan Rực Rỡ', 'category' => (object)['name' => 'Hoa Tốt Nghiệp'], 'price' => 890000, 'old_price' => 950000, 'image_path' => 'https://images.unsplash.com/photo-1520763185298-1b434c919102?q=80&w=600'],
        (object)['id' => 6, 'name' => 'Chậu Lan Hồ Điệp Sang Trọng', 'category' => (object)['name' => 'Hoa Mừng Thọ'], 'price' => 1500000, 'old_price' => 1800000, 'image_path' => 'https://images.unsplash.com/photo-1567696911980-2eed69a46042?q=80&w=600'],
        (object)['id' => 7, 'name' => 'Bó Hoa Hồng Đỏ Nhung Yêu Thương', 'category' => (object)['name' => 'Hoa Tình Yêu'], 'price' => 520000, 'old_price' => 600000, 'image_path' => 'https://images.unsplash.com/photo-1518709268805-4e9042af9f23?q=80&w=600'],
        (object)['id' => 8, 'name' => 'Lẵng Hoa Cúc Tươi Tắn', 'category' => (object)['name' => 'Hoa Khai Trương'], 'price' => 480000, 'old_price' => 0, 'image_path' => 'https://images.unsplash.com/photo-1508610048659-a06b669e3321?q=80&w=600'],
    ]);

    $displayProducts = isset($products) && count($products) > 0 ? $products : $dummyProducts;
    $totalCount = isset($products) && method_exists($products, 'total') ? $products->total() : count($displayProducts);
@endphp

<div class="container py-4">
    
   <div class="mb-4">
    <div class="text-center mb-4">
        <h1 class="fw-normal text-dark fs-2 mb-0" style="font-family: var(--font-heading);">
            @if(request('search'))
                Kết quả tìm kiếm cho "{{ request('search') }}"
            @else
                Tất cả sản phẩm hoa
            @endif
        </h1>
    </div>

        <div class="d-flex align-items-center justify-content-between pt-2 border-bottom pb-3 position-relative">
            <span class="text-secondary small fw-normal">
                {{ $totalCount }} sản phẩm
            </span>

            <div class="d-flex align-items-center gap-3">
                <button class="btn btn-link text-dark text-decoration-none p-0 d-flex align-items-center gap-2 small fw-normal shadow-none" 
                        type="button" 
                        onclick="toggleFilterDropdown(event)">
                    <i class="fa-solid fa-sliders fs-6 text-primary-custom"></i> Lọc
                </button>

                <span class="text-black-50">|</span>

                <div class="dropdown">
                    <button class="btn btn-link text-dark text-decoration-none p-0 d-flex align-items-center gap-2 small fw-normal dropdown-toggle shadow-none" 
                            type="button" 
                            id="sortDropdown" 
                            data-bs-toggle="dropdown" 
                            aria-expanded="false">
                        <i class="fa-solid fa-arrow-down-up-between fs-6 text-primary-custom"></i> Đề xuất
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end border-0 shadow-lg rounded-3 p-2 glass-dropdown" aria-labelledby="sortDropdown">
                        <li><a class="dropdown-item rounded-2 py-2 small" href="{{ request()->fullUrlWithQuery(['sort' => 'latest']) }}">Mới nhất</a></li>
                        <li><a class="dropdown-item rounded-2 py-2 small" href="{{ request()->fullUrlWithQuery(['sort' => 'price_asc']) }}">Giá: Thấp đến Cao</a></li>
                        <li><a class="dropdown-item rounded-2 py-2 small" href="{{ request()->fullUrlWithQuery(['sort' => 'price_desc']) }}">Giá: Cao đến Thấp</a></li>
                        <li><a class="dropdown-item rounded-2 py-2 small" href="{{ request()->fullUrlWithQuery(['sort' => 'popular']) }}">Bán chạy nhất</a></li>
                    </ul>
                </div>
            </div>

            <!-- Lọc -->
            <div id="filterDropdownPanel" class="shadow-lg rounded-4 bg-white border p-4" style="display: none; position: absolute; right: 0; top: 45px; width: 460px; z-index: 1050; border-color: rgba(123, 17, 19, 0.12) !important;">
                <form action="{{ route('products.index') }}" method="GET" id="filterForm">
                    @if(request('search'))
                        <input type="hidden" name="search" value="{{ request('search') }}">
                    @endif
                    
                    <div class="row g-4 text-start">
                        <div class="col-6">
                            <div class="d-flex align-items-center gap-2 mb-3 pb-2 border-bottom">
                                <i class="fa-solid fa-tag text-primary-custom small"></i>
                                <h6 class="fw-bold mb-0 fs-6 text-primary-custom" style="font-family: var(--font-heading);">Mức giá</h6>
                            </div>
                            <div class="d-flex flex-column gap-2.5">
                                @foreach(['under_500' => 'Dưới 500k', '500_1000' => '500k - 1 triệu', '1000_1500' => '1tr - 1.5 triệu', '1500_2000' => '1.5tr - 2 triệu', '2000_3000' => '2tr - 3 triệu', 'above_3000' => 'Trên 3 triệu'] as $key => $label)
                                    <div class="form-check custom-checkbox-wrapper mb-1">
                                        <input class="form-check-input custom-checkbox" type="checkbox" name="price_ranges[]" value="{{ $key }}" id="price-{{ $key }}">
                                        <label class="form-check-label text-secondary small cursor-pointer" for="price-{{ $key }}">{{ $label }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Kiểu dáng -->
                        <div class="col-6">
                            <div class="d-flex align-items-center gap-2 mb-3 pb-2 border-bottom">
                                <i class="fa-solid fa-spa text-primary-custom small"></i>
                                <h6 class="fw-bold mb-0 fs-6 text-primary-custom" style="font-family: var(--font-heading);">Kiểu dáng</h6>
                            </div>
                            <div class="d-flex flex-column gap-2.5">
                                @foreach(['Bó hoa' => 'Bó hoa tươi', 'Giỏ hoa' => 'Giỏ hoa nghệ thuật', 'Lẵng hoa' => 'Lẵng hoa sang trọng', 'Hộp hoa / Box' => 'Hộp hoa / Box', 'Bình hoa' => 'Bình hoa trang trí'] as $keyStyle => $labelStyle)
                                    <div class="form-check custom-checkbox-wrapper mb-1">
                                        <input class="form-check-input custom-checkbox" type="checkbox" name="styles[]" value="{{ $keyStyle }}" id="style-{{ Str::slug($keyStyle) }}">
                                        <label class="form-check-label text-secondary small cursor-pointer" for="style-{{ Str::slug($keyStyle) }}">{{ $labelStyle }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="d-flex align-items-center justify-content-between mt-4 pt-3 border-top">
                        <a href="{{ route('products.index') }}" class="text-muted text-decoration-none small hover-burgundy">
                            <i class="fa-solid fa-rotate-left me-1"></i> Xóa bộ lọc
                        </a>
                        <div class="d-flex gap-2">
                            <button type="button" class="btn btn-outline-secondary btn-sm rounded-pill px-3 py-1.5 small" onclick="closeFilterDropdown()">Đóng</button>
                            <button type="submit" class="btn btn-primary-custom btn-sm rounded-pill px-4 py-1.5 small fw-semibold">Áp dụng</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Danh Sách Sản Phẩm Sử Dụng Component Chung -->
    <div class="row g-4">
        @forelse($displayProducts as $product)
                    <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                <x-product-card :product="$product" />
            </div>
        @empty
            <div class="col-12 text-center py-5 glass-blur-card rounded-4 bg-white">
                <i class="fa-solid fa-spa fs-1 text-primary-custom mb-3"></i>
                <h5 class="fw-bold text-secondary" style="font-family: var(--font-heading);">Không tìm thấy mẫu hoa nào!</h5>
            </div>
        @endforelse
    </div>
</div>

@push('styles')
<style>
    .custom-checkbox {
        width: 1.15rem;
        height: 1.15rem;
        margin-top: 0.1rem;
        border-color: #d1b5b6;
        cursor: pointer;
    }
    .custom-checkbox:checked {
        background-color: var(--burgundy-primary, #7b1113);
        border-color: var(--burgundy-primary, #7b1113);
    }
    .custom-checkbox:focus {
        box-shadow: 0 0 0 0.25rem rgba(123, 17, 19, 0.15);
        border-color: var(--burgundy-primary, #7b1113);
    }
    .cursor-pointer {
        cursor: pointer;
    }
    .hover-burgundy:hover {
        color: var(--burgundy-primary, #7b1113) !important;
    }
</style>
@endpush

@push('scripts')
<script>
    function toggleFilterDropdown(event) {
        event.stopPropagation();
        const panel = document.getElementById('filterDropdownPanel');
        panel.style.display = (panel.style.display === 'none' || panel.style.display === '') ? 'block' : 'none';
    }

    function closeFilterDropdown() {
        document.getElementById('filterDropdownPanel').style.display = 'none';
    }

    window.addEventListener('click', function(e) {
        const panel = document.getElementById('filterDropdownPanel');
        const filterBtn = document.querySelector('[onclick="toggleFilterDropdown(event)"]');
        if (panel && filterBtn) {
            if (!panel.contains(e.target) && !filterBtn.contains(e.target)) {
                panel.style.display = 'none';
            }
        }
    });
</script>
@endpush
@endsection