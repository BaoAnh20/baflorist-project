@extends('layouts.app')

@section('title', 'BAFlorist - Tiệm Hoa Tươi Nghệ Thuật')

@section('content')
<div class="container py-4">

    <!-- Banner chính tinh tế với hiệu ứng kính mờ & sắc độ trung tính tự nhiên -->
    <div class="p-4 p-md-5 mb-5 shadow-sm rounded-4 text-white position-relative overflow-hidden" 
         style="background: linear-gradient(rgba(0, 0, 0, 0.25), rgba(0, 0, 0, 0.25)), url('{{ asset('images/home.png') }}') center/cover; min-height: 480px; display: flex; align-items: center;">
        <div class="mt-auto ms-auto text-end">
            <a href="{{ route('products.index') }}" class="btn-primary-custom fw-bold rounded-pill px-4 px-md-5 py-3 shadow-sm text-decoration-none">
                Khám phá bộ sưu tập <i class="fa-solid fa-arrow-right ms-2"></i>
            </a>
        </div>
    </div>

    <!-- Danh mục theo dịp -->
    <div class="mb-5 py-2" id="categories">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold mb-0 text-primary-custom" style="font-size: 1.75rem;">Hoa cho mọi dịp</h3>
            <a href="{{ route('products.index') }}" class="text-decoration-none fw-semibold small text-primary-custom">Xem thêm <i class="fa-solid fa-arrow-right ms-1"></i></a>
        </div>
        <div class="row g-3 g-md-4 text-center">
            @php
                $occasions = [
                    ['name' => 'Giá Rẻ', 'img' => 'https://images.unsplash.com/photo-1561181286-d3fee7d55364?q=80&w=300'],
                    ['name' => 'Sinh Nhật', 'img' => 'https://images.unsplash.com/photo-1526047932273-341f2a7631f9?q=80&w=300'],
                    ['name' => 'Tốt Nghiệp', 'img' => 'https://images.unsplash.com/photo-1563241527-3004b7be0ffd?q=80&w=300'],
                    ['name' => 'Khai Trương', 'img' => 'https://images.unsplash.com/photo-1518709268805-4e9042af9f23?q=80&w=300'],
                    ['name' => 'Tình Yêu', 'img' => 'https://images.unsplash.com/photo-1508739773434-c26b3d09e071?q=80&w=300'],
                    ['name' => 'Box Hoa', 'img' => 'https://images.unsplash.com/photo-1561181286-d3fee7d55364?q=80&w=300'],
                    ['name' => 'Chúc Mừng', 'img' => 'https://images.unsplash.com/photo-1526047932273-341f2a7631f9?q=80&w=300'],
                    ['name' => 'Sự Kiện', 'img' => 'https://images.unsplash.com/photo-1518709268805-4e9042af9f23?q=80&w=300'],
                ];
            @endphp
            @foreach($occasions as $item)
            <div class="col-3 col-md-3 col-lg flex-grow-1">
                <a href="{{ route('products.index', ['search' => $item['name']]) }}" class="text-decoration-none group-item d-block">
                    <div class="rounded-circle overflow-hidden shadow-sm mx-auto mb-2 border border-2" style="width: 85px; height: 85px; border-color: rgba(123, 17, 19, 0.2) !important;">
                        <img src="{{ $item['img'] }}" class="w-100 h-100 object-fit-cover transition-scale" alt="{{ $item['name'] }}">
                    </div>
                    <span class="fw-semibold small d-block text-dark">{{ $item['name'] }}</span>
                </a>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Sản phẩm nổi bật (Đã tối ưu lưới 6 sản phẩm mỗi hàng trên màn hình lớn) -->
    <div class="mb-5 py-2">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold mb-0 text-primary-custom" style="font-size: 1.75rem;">Sản phẩm nổi bật</h3>
            <a href="{{ route('products.index') }}" class="text-decoration-none fw-semibold text-primary-custom">Xem tất cả <i class="fa-solid fa-arrow-right ms-1"></i></a>
        </div>
        
        <div class="row g-3 g-md-4">
            @if(isset($featuredProducts) && count($featuredProducts) > 0)
                @foreach($featuredProducts as $product)
                    <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                        <x-product-card :product="$product" />
                    </div>
                @endforeach
            @else
                <!-- Dữ liệu mẫu tĩnh hiển thị khi chưa truyền biến từ Controller -->
                @for($i = 1; $i <= 12; $i++)
                    @php
                        $dummyProduct = (object)[
                            'id' => $i,
                            'name' => 'Ohara Pastel Viences ' . $i,
                            'price' => 820000,
                            'old_price' => 950000,
                            'image_path' => 'https://images.unsplash.com/photo-1561181286-d3fee7d55364?q=80&w=600'
                        ];
                    @endphp
                    <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                        <x-product-card :product="$dummyProduct" />
                    </div>
                @endfor
            @endif
        </div>
    </div>
</div>
@endsection