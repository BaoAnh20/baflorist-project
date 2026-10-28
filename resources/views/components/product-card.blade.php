@props(['product'])

<div class="product-item h-100 d-flex flex-column text-start bg-transparent border-0 p-0">
    <!-- Khung ảnh sản phẩm vuông & khuyến mãi  -->
    <a href="{{ route('products.show', $product->id ?? 1) }}" class="product-img-wrapper overflow-hidden d-block mb-2 position-relative rounded-4 bg-light aspect-square">
        
        @php
            $hasDiscount = isset($product->original_price) && $product->original_price > ($product->price ?? 0);
            if (!$hasDiscount && isset($product->old_price) && $product->old_price > ($product->price ?? 0)) {
                $hasDiscount = true;
                $product->original_price = $product->old_price;
            }
            $discountPercent = $hasDiscount ? round((($product->original_price - $product->price) / $product->original_price) * 100) : 0;
        @endphp

        <!-- Hiển thị giảm giá nếu có khuyến mãi -->
        @if($hasDiscount)
            <span class="position-absolute top-0 start-0 m-2 badge rounded-pill px-2 py-1 fw-bold shadow-sm" style="background-color: var(--burgundy-primary); color: #fff; font-size: 0.68rem; z-index: 2;">
                -{{ $discountPercent }}%
            </span>
        @endif

        <img src="{{ isset($product->image_path) ? (filter_var($product->image_path, FILTER_VALIDATE_URL) ? $product->image_path : asset('storage/' . $product->image_path)) : 'https://images.unsplash.com/photo-1561181286-d3fee7d55364?q=80&w=800' }}" 
             class="product-img-zoom w-100 h-100 object-fit-cover rounded-4" 
             alt="{{ $product->name ?? 'Bó hoa tươi' }}" 
             onerror="this.src='https://images.unsplash.com/photo-1561181286-d3fee7d55364?q=80&w=800'">
    </a>

    <!-- Tên -->
    <h6 class="mb-1 fw-normal">
        <a href="{{ route('products.show', $product->id ?? 1) }}" class="text-decoration-none text-dark transition-all product-link-hover line-clamp-2" style="font-family: var(--font-body) !important; font-size: 0.88rem; line-height: 1.4;">
            {{ $product->name ?? 'Ohara Pastel Viences' }}
        </a>
    </h6>

    <!-- Cụm giá tiền -->
    <div class="d-flex align-items-baseline gap-2 mt-auto pt-1">
        <span class="fw-bold price-number text-primary-custom" style="font-size: 0.9rem; letter-spacing: -0.2px;">
            {{ number_format($product->price ?? 950000, 0, ',', '.') }}đ
        </span>
        @if($hasDiscount)
            <span class="text-muted text-decoration-line-through price-number" style="font-size: 0.78rem; opacity: 0.7;">
                {{ number_format($product->original_price, 0, ',', '.') }}đ
            </span>
        @endif
    </div>
</div>