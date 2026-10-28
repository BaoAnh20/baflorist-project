@extends('layouts.app')

@section('title', 'Chi Tiết Đơn Hàng #' . ($order->code ?? 'BAF-20261018') . ' - BAFlorist')

@section('content')
@php
    // Dữ liệu mẫu giả lập phục vụ giao diện Frontend tĩnh (chống lỗi Undefined variable)
    $order = $order ?? (object)[
        'code' => 'BAF-20261018-001',
        'status' => 'shipping',
        'created_at' => now(),
        'total_price' => 7900000,
        'recipient_name' => 'Nguyễn Thị Bảo Anh',
        'recipient_phone' => '0901234567',
        'shipping_address' => '180 Cao Lỗ, Phường 4, Quận 8, TP.HCM',
        'card_message' => 'Chúc mừng sinh nhật',
        'items' => []
    ];
    $status = $order->status ?? 'shipping';
@endphp

<div class="container py-5" style="max-width: 820px;">
    
    <div class="text-center mb-5">
        <h2 class="fw-bold mb-2 text-primary-custom" style="font-family: var(--font-heading);">
            Chi Tiết Đơn Hàng
        </h2>
        <p class="text-muted small mb-0">Quản lý và theo dõi trạng thái các đơn hoa đã đặt</p>
    </div>

    <div class="glass-blur-card p-4 mb-4 shadow-sm rounded-4">
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
            <div>
                <h4 class="fw-bold mb-1 text-primary-custom price-number" style="font-family: var(--font-heading);">
                    #{{ $order->code ?? 'BAF-20261018-001' }}
                </h4>
                <small class="text-muted"><i class="fa-regular fa-calendar me-1"></i> Ngày đặt: <span class="fw-medium text-dark">{{ optional($order->created_at)->format('d/m/Y H:i') ?? '19/10/2026 12:00' }}</span></small>
            </div>
            <div>
                @if($status === 'pending')
                    <form action="#" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn hủy đơn hàng này?');">
                        @csrf
                        <button type="submit" class="btn btn-outline-danger btn-sm rounded-pill px-4 py-2 fw-semibold">
                            Hủy đơn hàng
                        </button>
                    </form>
                @else
                    <a href="{{ route('cart.index') }}" class="btn btn-primary-custom btn-sm rounded-pill px-4 py-2 fw-semibold shadow-sm text-nowrap">
                        Mua lại đơn này
                    </a>
                @endif
            </div>
        </div>
    </div>

    <!-- 1. Tiến Độ Đơn Hàng -->
    @php
        $statuses = [
            'pending' => 'Chờ xác nhận',
            'processing' => 'Đang cắm hoa',
            'shipping' => 'Đang giao hàng',
            'completed' => 'Đã giao',
        ];
        $statusOrder = ['pending' => 1, 'processing' => 2, 'shipping' => 3, 'completed' => 4];
        $currentStep = $statusOrder[$status] ?? 3;
    @endphp

    <div class="glass-blur-card p-4 mb-4 shadow-sm rounded-4">
        <h6 class="fw-bold mb-4 text-uppercase tracking-wider small text-secondary" style="letter-spacing: 0.05em;">
            Tiến độ vận chuyển
        </h6>
        
        <div class="row text-center position-relative g-2 mb-4">
            @foreach($statuses as $key => $label)
                @php
                    $stepNum = $statusOrder[$key];
                    $isPassed = $stepNum <= $currentStep;
                    $isCurrent = $stepNum === $currentStep;
                @endphp
                <div class="col-3">
                    <div class="d-flex flex-column align-items-center">
                        <div class="rounded-circle d-flex align-items-center justify-content-center shadow-sm mb-2"
                             style="width: 38px; height: 38px; font-size: 0.9rem; font-weight: 600;
                                    background-color: {{ $isPassed ? 'var(--burgundy-primary)' : '#f0ece6' }}; 
                                    color: {{ $isPassed ? '#ffffff' : '#8c827a' }};">
                            {{ $stepNum }}
                        </div>
                        <span class="small fw-bold {{ $isCurrent ? 'text-dark' : 'text-muted' }}" style="{{ $isCurrent ? 'color: var(--burgundy-primary) !important;' : '' }}">
                            {{ $label }}
                        </span>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- shipper khi -->
        @if($status === 'shipping')
            <div class="p-3 rounded-3 border border-warning-subtle bg-light d-flex align-items-center justify-content-between flex-wrap gap-3">
                <div>
                    <span class="small text-muted d-block">Shipper phụ trách giao hoa:</span>
                    <strong class="text-dark small">Anh Minh (SĐT: 0909 123 456)</strong>
                </div>
                <a href="tel:0909123456" class="btn btn-sm btn-outline-dark rounded-pill px-3 fw-semibold">
                    Gọi Shipper
                </a>
            </div>
        @elseif($status === 'completed')
            <div class="p-3 rounded-3 border border-success-subtle bg-success-subtle text-success small text-center fw-semibold">
                Đơn hàng đã được giao thành công vào lúc 15:15 - 19/10/2026. Cảm ơn quý khách!
            </div>
        @endif
    </div>

    <!-- Danh Sách Sản Phẩm & Thanh Toán -->
    <div class="glass-blur-card p-4 mb-4 shadow-sm rounded-4">
        <h6 class="fw-bold mb-3 text-uppercase tracking-wider small text-secondary" style="letter-spacing: 0.05em;">
            Sản phẩm trong đơn
        </h6>

        @if(isset($order->items) && count($order->items) > 0)
            @foreach($order->items as $item)
                <div class="d-flex align-items-center justify-content-between py-2 border-bottom border-light">
                    <div class="d-flex align-items-center gap-3">
                        <img src="{{ isset($item->product->image_path) ? asset('storage/' . $item->product->image_path) : 'https://images.unsplash.com/photo-1526047932273-341f2a7631f9?q=80&w=200' }}" 
                             class="rounded-3 object-fit-cover shadow-sm border" 
                             width="55" height="55" alt="Hoa">
                        <div>
                            <h6 class="fw-bold text-dark mb-1 small">{{ $item->product->name ?? 'Hộp mica hoa hồng hồng Pink Letter' }}</h6>
                            <small class="text-muted">SL: x{{ $item->quantity ?? 1 }} &bull; Đơn giá: {{ number_format($item->price ?? 7900000, 0, ',', '.') }} đ</small>
                        </div>
                    </div>
                    <span class="fw-bold text-dark price-number" style="font-size: 0.95rem;">
                        {{ number_format(($item->price ?? 7900000) * ($item->quantity ?? 1), 0, ',', '.') }} đ
                    </span>
                </div>
            @endforeach
        @else


        <div class="d-flex align-items-center justify-content-between py-2 border-bottom border-light">
                <div class="d-flex align-items-center gap-3">
                    <img src="https://images.unsplash.com/photo-1526047932273-341f2a7631f9?q=80&w=200" 
                         class="rounded-3 object-fit-cover shadow-sm border" 
                         width="55" height="55" alt="Hoa">
                    <div>
                        <h6 class="fw-bold text-dark mb-1 small">Hộp mica hoa hồng hồng Pink Letter</h6>
                        <small class="text-muted">Số lượng: x1 <br> Đơn giá: 7.900.000 đ</small>
                    </div>
                </div>
                <span class="fw-bold text-dark price-number" style="font-size: 0.95rem;">7.900.000 đ</span>
            </div>
        @endif

        <!--thanh toán -->
        <div class="pt-3 mt-2">
            <div class="d-flex justify-content-between small text-muted mb-2">
                <span>Tạm tính:</span>
                <span class="price-number text-dark">{{ number_format($order->total_price ?? 7900000, 0, ',', '.') }} đ</span>
            </div>
            <div class="d-flex justify-content-between small text-muted mb-2">
                <span>Phí vận chuyển:</span>
                <span class="text-success fw-semibold">Miễn phí nội thành</span>
            </div>
            <hr class="opacity-25 my-2">
            <div class="d-flex justify-content-between align-items-center">
                <span class="fw-bold text-dark">Tổng thanh toán:</span>
                <span class="price-number fs-5 fw-bold text-primary-custom">{{ number_format($order->total_price ?? 7900000, 0, ',', '.') }} đ</span>
            </div>
        </div>
    </div>

   <!-- Thông Tin Giao Nhận & Thiệp -->
    <div class="row g-4 align-items-stretch">
        <div class="col-md-6">
            <div class="glass-blur-card p-4 h-100 shadow-sm rounded-4 d-flex flex-column justify-content-between">
                <h6 class="fw-bold mb-3 text-uppercase tracking-wider text-dark" style="font-size: 0.85rem; letter-spacing: 0.05em;">
                    Giao nhận hoa
                </h6>
                <div class="d-flex flex-column gap-2 small text-secondary">
                    <div>
                        <span class="text-muted">Người nhận:</span>
                        <strong class="d-block text-dark">{{ $order->recipient_name ?? 'Nguyễn Thị Bảo Anh' }}</strong>
                    </div>
                    <div>
                        <span class="text-muted">Điện thoại:</span>
                        <strong class="d-block text-dark">{{ $order->recipient_phone ?? '0901234567' }}</strong>
                    </div>
                    <div>
                        <span class="text-muted">Địa chỉ:</span>
                        <strong class="d-block text-dark">{{ $order->shipping_address ?? '180 Cao Lỗ, Phường 4, Quận 8, TP.HCM' }}</strong>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="glass-blur-card p-4 h-100 shadow-sm rounded-4 d-flex flex-column justify-content-between">
                <h6 class="fw-bold mb-3 text-uppercase tracking-wider text-dark" style="font-size: 0.85rem; letter-spacing: 0.05em;">
                    Nội dung thiệp
                </h6>
                <div class="p-3 rounded-3 bg-light border fst-italic text-dark small" style="border-style: dashed !important; border-color: rgba(123, 17, 19, 0.15) !important;">
                    "{{ $order->card_message ?? 'Chúc mừng sinh nhật em yêu! Chúc em luôn rạng rỡ và hạnh phúc.' }}"
                </div>
            </div> 
        </div>
    </div>

</div>
@endsection