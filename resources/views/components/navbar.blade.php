<nav class="navbar shadow-sm sticky-top py-2">
    <div class="container d-flex align-items-center justify-content-between flex-wrap gap-2">
        
        <!-- Logo -->
        <a class="navbar-brand d-flex align-items-center gap-2 m-0 fw-bold fs-4 text-decoration-none" href="{{ route('home') }}">
            <i class="fa-solid fa-leaf text-primary-custom"></i> BAFlorist
        </a>

        <!-- Danh sách Menu  -->
        <ul class="nav d-flex align-items-center gap-1 gap-md-2 mb-0">
            <li class="nav-item">
                <a class="nav-link text-nowrap {{ request()->routeIs('home') ? 'active fw-bold' : '' }}" href="{{ route('home') }}">
                    Trang chủ
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-nowrap {{ request()->routeIs('products.*') ? 'active fw-bold' : '' }}" href="{{ route('products.index') }}">
                    Sản phẩm
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-nowrap {{ request()->routeIs('orders.*') ? 'active fw-bold' : '' }}" href="{{ route('orders.index') }}">
                    Đơn hàng
                </a>
            </li>    
            <!-- Danh mục Dropdown -->
            <li class="nav-item dropdown dropdown-hover">
                <a class="nav-link text-nowrap dropdown-toggle d-flex align-items-center gap-1" 
                   href="{{ route('products.index') }}" 
                   id="categoryDropdown" 
                   role="button" 
                   data-bs-toggle="dropdown" 
                   aria-expanded="false">
                    Danh mục <i class="fa-solid fa-chevron-down ms-1" style="font-size: 0.7rem;"></i>
                </a>
                
                <ul class="dropdown-menu border-0 shadow-lg rounded-4 p-2 glass-dropdown" aria-labelledby="categoryDropdown" style="max-height: 380px; overflow-y: auto;">
                    @forelse($categories ?? [] as $category)
                        <li>
                            <a class="dropdown-item rounded-3 py-2 px-3 d-flex align-items-center gap-2" 
                               href="{{ route('products.index', ['category' => $category->slug ?? $category->id]) }}">
                                <i class="fa-solid fa-spa text-primary-custom"></i> {{ $category->name }}
                            </a>
                        </li>
                    @empty
                        <li><a class="dropdown-item rounded-3 py-2 px-3" href="{{ route('products.index') }}">Hoa Sinh Nhật</a></li>
                        <li><a class="dropdown-item rounded-3 py-2 px-3" href="{{ route('products.index') }}">Hoa Khai Trương</a></li>
                        <li><a class="dropdown-item rounded-3 py-2 px-3" href="{{ route('products.index') }}">Hoa Tình Yêu & Kỷ Niệm</a></li>
                        <li><a class="dropdown-item rounded-3 py-2 px-3" href="{{ route('products.index') }}">Hoa Tốt Nghiệp</a></li>
                        <li><a class="dropdown-item rounded-3 py-2 px-3" href="{{ route('products.index') }}">Box Hoa / Hộp Hoa</a></li>
                    @endforelse
                    <li><hr class="dropdown-divider opacity-25 my-1"></li>
                    <li>
                        <a class="dropdown-item rounded-3 py-2 px-3 fw-bold d-flex align-items-center justify-content-between text-primary-custom" href="{{ route('products.index') }}">
                            <span>Tất cả các loại hoa</span>
                            <i class="fa-solid fa-arrow-right small"></i>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>

        <!-- KHUNG TÌM KIẾM THƯỜNG & AI -->
        <div class="d-none d-md-flex align-items-center gap-2 my-auto">
            <!-- thường -->
            <form action="{{ route('products.index') }}" method="GET" class="position-relative" style="min-width: 180px; max-width: 220px;">
                <input type="text" 
                       name="search" 
                       class="form-control form-control-sm rounded-pill ps-3 pe-5 border-0 bg-white shadow-sm" 
                       placeholder="Tìm loại hoa..." 
                       value="{{ request('search') }}"
                       style="height: 40px; font-size: 0.875rem; border: 1px solid rgba(123, 17, 19, 0.15) !important;">
                <button type="submit" 
                        class="btn btn-link position-absolute end-0 top-50 translate-middle-y me-2 p-0 border-0 text-primary-custom" 
                        title="Tìm kiếm">
                    <i class="fa-solid fa-magnifying-glass fs-6"></i>
                </button>
            </form>

            <!-- AI Search - Toast -->
            <div class="position-relative d-none d-lg-block">
                <button type="button" 
                        class="btn-primary-custom rounded-pill px-3 py-2 d-flex align-items-center gap-2 shadow-sm fw-semibold text-white border-0" 
                        data-bs-toggle="modal" 
                        data-bs-target="#aiSearchModal"
                        style="height: 40px; font-size: 0.85rem;"
                        title="Trợ lý AI tư vấn hoa">
                    <i class="fa-solid fa-wand-magic-sparkles text-warning"></i>
                    <span>AI Gợi Ý Hoa</span>
                </button>

                <!-- Toast -->
                <div id="aiToastPrompt" class="position-absolute top-100 start-50 translate-middle-x mt-2 px-3 py-1.5 bg-white text-dark rounded-pill shadow-lg border border-danger border-opacity-25 text-nowrap d-flex align-items-center gap-2 animate-toast-blink" style="font-size: 0.75rem; z-index: 1060; backdrop-filter: blur(8px);">
                    <span class="position-absolute bottom-100 start-50 translate-middle-x border-bottom border-white shadow-sm" style="border-width: 5px !important; border-color: transparent transparent white transparent !important; width: 0; height: 0;"></span>
                    <i class="fa-solid fa-wand-magic-sparkles text-danger animate-spin-slow"></i>
                    <span>Tìm mẫu hoa bằng AI?</span>
                    <button type="button" class="btn btn-primary-custom rounded-pill px-3 py-1 ms-1 fw-bold text-white border-0 shadow-none d-flex align-items-center justify-content-center" data-bs-toggle="modal" data-bs-target="#aiSearchModal" onclick="dismissAiToast()" style="font-size: 0.65rem; height: 24px; line-height: 1;">Thử ngay</button>
                </div>
            </div>
        </div>

        <!-- Các nút bên phải -->
        <div class="d-flex align-items-center gap-2 gap-md-3">
            <button type="button" 
                    class="btn btn-outline-custom rounded-circle d-flex d-lg-none align-items-center justify-content-center p-2 shadow-sm" 
                    data-bs-toggle="modal" 
                    data-bs-target="#aiSearchModal"
                    style="width: 40px; height: 40px;"
                    title="Trợ lý AI tư vấn hoa">
                <i class="fa-solid fa-wand-magic-sparkles text-primary-custom"></i>
            </button>

            <!-- Giỏ hàng -->
            <button class="btn rounded-circle position-relative p-2 d-flex align-items-center justify-content-center shadow-sm bg-white text-primary-custom" 
                    type="button" 
                    data-bs-toggle="offcanvas" 
                    data-bs-target="#cartOffcanvas" 
                    aria-controls="cartOffcanvas"
                    style="width: 40px; height: 40px; border: 1px solid rgba(123, 17, 19, 0.25) !important;">
                <i class="fa-solid fa-bag-shopping"></i>
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-primary-custom text-white" style="font-size: 0.65rem;">
                    {{ session('cart_count', isset($cartItems) ? count($cartItems) : 1) }}
                </span>
            </button>

            <!-- Tài khoản / User Icon -->
            @auth
                <a href="{{ route('profile.index') ?? '#' }}" class="btn btn-primary-custom rounded-pill px-3 text-nowrap shadow-sm d-flex align-items-center gap-1">
                    <i class="fa-solid fa-user me-1"></i> {{ Auth::user()->name }}
                </a>
            @else
                <div class="user-dropdown-wrapper">
                    <a href="{{ route('login') }}" class="user-icon-trigger text-decoration-none" aria-label="Tài khoản">
                        <i class="fa-regular fa-user"></i>
                    </a>
                    <div class="user-hover-menu shadow-lg">
                        <a href="{{ route('login') }}" class="dropdown-item text-decoration-none d-block">
                            <i class="fa-solid fa-arrow-right-to-bracket me-2"></i>Đăng nhập
                        </a>
                        <a href="{{ route('register') }}" class="dropdown-item text-decoration-none d-block">
                            <i class="fa-solid fa-user-plus me-2"></i>Đăng ký
                        </a>
                    </div>
                </div>
            @endauth
        </div>
    </div>
</nav>


<!-- KHUNG GIỎ HÀNG PHẢI -->
<div class="offcanvas offcanvas-end border-0 shadow-lg" tabindex="-1" id="cartOffcanvas" aria-labelledby="cartOffcanvasLabel" style="width: 420px; background-color: var(--bg-pastel);">
    <div class="offcanvas-header border-bottom py-3 px-4" style="border-color: rgba(123, 17, 19, 0.1) !important;">
        <h5 class="offcanvas-title fw-bold fs-5 d-flex align-items-center gap-2 text-primary-custom" id="cartOffcanvasLabel">
            <i class="fa-solid fa-bag-shopping text-primary-custom"></i> Giỏ hàng ({{ session('cart_count', 1) }})
        </h5>
        <button type="button" class="btn-close shadow-none" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>

    <div class="offcanvas-body px-4 py-3 d-flex flex-column">
        @php
            $miniCartItems = isset($cartItems) && count($cartItems) > 0 ? $cartItems : [
                (object)[
                    'id' => 1,
                    'name' => 'Hộp mica hoa hồng hồng Pink Letter',
                    'price' => 7900000,
                    'quantity' => 1,
                    'image' => 'https://images.unsplash.com/photo-1561181286-d3fee7d55364?q=80&w=300'
                ]
            ];
            $cartTotal = collect($miniCartItems)->sum(function($item) {
                return $item->price * $item->quantity;
            });
        @endphp

        @if(count($miniCartItems) > 0)
            <div class="flex-grow-1 overflow-y-auto">
                @foreach($miniCartItems as $item)
                    <div class="d-flex align-items-center justify-content-between pb-3 mb-3 border-bottom position-relative" style="border-color: rgba(123, 17, 19, 0.08) !important;">
                        <div class="d-flex align-items-center gap-3">
                            <img src="{{ $item->image ?? 'https://images.unsplash.com/photo-1561181286-d3fee7d55364?q=80&w=300' }}" 
                                 class="rounded-3 object-fit-cover shadow-sm border" 
                                 width="70" height="70" 
                                 alt="{{ $item->name }}">
                            <div>
                                <h6 class="fw-bold mb-1 text-dark" style="font-size: 0.9rem; line-height: 1.3;">{{ $item->name }}</h6>
                                <div class="fw-bold price-number mb-2 text-primary-custom" style="font-size: 0.92rem;">
                                    {{ number_format($item->price, 0, ',', '.') }} đ
                                </div>
                                <div class="input-group input-group-sm rounded-0" style="width: 105px;">
                                    <button class="btn btn-outline-secondary px-2 py-0 border-secondary-subtle rounded-0" type="button">-</button>
                                    <input type="text" class="form-control text-center p-0 bg-white border-secondary-subtle shadow-none fw-bold rounded-0" value="{{ $item->quantity }}" readonly style="font-size: 0.85rem;">
                                    <button class="btn btn-outline-secondary px-2 py-0 border-secondary-subtle rounded-0" type="button">+</button>
                                </div>
                            </div>
                        </div>
                        <div class="text-end d-flex flex-column align-items-end justify-content-between flex-shrink-0" style="height: 65px; min-width: 90px;">
                            <button type="button" class="btn btn-link text-muted p-0 border-0 shadow-none hover-danger lh-1" style="font-size: 0.85rem;" title="Xóa">
                                <i class="fa-solid fa-xmark"></i>
                            </button>
                            <span class="fw-bold price-number text-dark text-nowrap" style="font-size: 0.88rem;">
                                {{ number_format($item->price * $item->quantity, 0, ',', '.') }} đ
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="pt-3 border-top mt-auto" style="border-color: rgba(123, 17, 19, 0.1) !important;">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <span class="text-secondary fw-medium">Tổng cộng</span>
                    <span class="fw-bold fs-4 price-number text-primary-custom">
                        {{ number_format($cartTotal, 0, ',', '.') }} đ
                    </span>
                </div>
                
                <div class="d-grid gap-2">
                    <a href="{{ route('cart.index') ?? '#' }}" class="btn btn-outline-custom rounded-pill py-2.5 fw-semibold text-dark bg-white shadow-sm text-decoration-none text-center">
                        <i class="fa-solid fa-list-check me-1 text-primary-custom"></i> Xem chi tiết giỏ hàng
                    </a>
                    <a href="{{ route('checkout.index') ?? '#' }}" class="btn btn-primary-custom w-100 rounded-pill py-3 fw-bold text-uppercase shadow-sm text-decoration-none text-center" style="letter-spacing: 0.5px;">
                        Thanh toán <i class="fa-solid fa-arrow-right-long ms-2"></i>
                    </a>
                </div>
            </div>
        @else
            <div class="text-center py-5 my-auto">
                <i class="fa-solid fa-basket-shopping fs-1 text-muted mb-3 text-primary-custom"></i>
                <h6 class="fw-bold text-secondary">Giỏ hàng trống</h6>
                <p class="text-muted small">Hãy chọn thêm các mẫu hoa tươi tuyệt đẹp nhé.</p>
                <a href="{{ route('products.index') }}" class="btn btn-primary-custom rounded-pill px-4 mt-2">
                    Khám phá hoa tươi
                </a>
            </div>
        @endif
    </div>
</div>




<!-- ================= MODAL TƯ VẤN AI ================= -->
<div class="modal fade" id="aiSearchModal" tabindex="-1" aria-labelledby="aiSearchModalLabel" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content rounded-4 border-0 shadow-lg bg-white overflow-hidden">
            
            <!-- Modal Robot -->
            <div class="modal-header border-0 pb-3 text-white px-4 pt-4 position-relative overflow-hidden" style="background: linear-gradient(135deg, var(--burgundy-dark) 0%, var(--burgundy-primary) 100%);">
                
                <!-- Hiệu ứng -->
                <div class="falling-petals-container position-absolute top-0 start-0 w-100 h-100 overflow-hidden pointer-events-none" style="z-index: 0; opacity: 0.35;">
                    <span class="petal p1">🌸</span>
                    <span class="petal p2">🍃</span>
                    <span class="petal p3">🌹</span>
                    <span class="petal p4">🌸</span>
                    <span class="petal p5">🍃</span>
                </div>

                <div class="d-flex align-items-center gap-3 z-1 position-relative">
                    <!-- Robot -->
                    <div class="robot-avatar-wrapper flex-shrink-0 animate-sway">
                        <svg width="56" height="56" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <line x1="32" y1="12" x2="32" y2="6" stroke="#fecdd3" stroke-width="2.5" stroke-linecap="round"/>
                            <circle cx="32" cy="4" r="3.5" fill="#f43f5e" class="animate-pulse"/>
                            <rect x="16" y="12" width="32" height="24" rx="8" fill="#ffffff" stroke="#e2e8f0" stroke-width="2"/>
                            <rect x="21" y="18" width="22" height="10" rx="4" fill="#0f172a"/>
                            <circle cx="26" cy="23" r="2" fill="#38bdf8" class="animate-ping"/>
                            <circle cx="38" cy="23" r="2" fill="#38bdf8"/>
                            <rect x="12" y="20" width="4" height="8" rx="2" fill="#cbd5e1"/>
                            <rect x="48" y="20" width="4" height="8" rx="2" fill="#cbd5e1"/>
                            <rect x="20" y="38" width="24" height="20" rx="6" fill="#ffffff" stroke="#e2e8f0" stroke-width="2"/>
                            <circle cx="32" cy="46" r="4" fill="#f43f5e" fill-opacity="0.2"/>
                            <path d="M42 46 C48 46, 52 42, 54 38" stroke="#ffffff" stroke-width="2.5" stroke-linecap="round"/>
                            <circle cx="55" cy="36" r="3.5" fill="#f43f5e"/>
                            <path d="M52 33 Q55 36, 58 33 Q55 30, 52 33 Z" fill="#fda4af"/>
                            <circle cx="52" cy="39" r="2.5" fill="#fb7185"/>
                        </svg>
                    </div>
                    <div>
                        <h5 class="modal-title fw-bold mb-1 text-white" id="aiSearchModalLabel" style="font-family: var(--font-heading);">Trợ Lý AI Tư Vấn Hoa</h5>
                        <p class="text-white-50 mb-0 small" style="letter-spacing: 0.2px;">Giúp bạn tìm thấy bó hoa phù hợp và ý nghĩa nhất.</p>
                    </div>
                </div>
                <button type="button" class="btn-close btn-close-white shadow-none z-1 position-relative" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Modal Body Form -->
            <form action="{{ route('products.index') }}" method="GET" id="aiSearchForm">
                <div class="modal-body p-4" style="background-color: var(--bg-pastel);">
                    
                    <!-- 1 Tìm hiểu tâm trạng, cảm xúc thông qua mô tả -->
                    <div class="mb-4 p-3 bg-white rounded-4 shadow-sm border border-opacity-10" style="border-color: rgba(123, 17, 19, 0.15);">
                        <label class="form-label fw-bold text-primary-custom d-flex align-items-center gap-2 mb-2" style="font-size: 0.95rem;">
                            <span>Bạn muốn gửi gắm điều gì?</span>
                        </label>
                        <p class="text-muted small mb-2">Có thể chọn nhanh mục đích dưới đây hoặc mô tả trực tiếp cảm xúc của bạn:</p>
                        
                        <!-- cảm xúc & mục đích -->
                        <div class="d-flex flex-wrap gap-1.5 mb-3">
                            <button type="button" class="btn btn-xs rounded-pill px-3 py-1.5 bg-light border shadow-none text-dark quick-chip" onclick="selectPurpose(this, 'Chúc mừng một cột mốc quan trọng/thành công')">🎉 Chúc mừng cột mốc</button>
                            <button type="button" class="btn btn-xs rounded-pill px-3 py-1.5 bg-light border shadow-none text-dark quick-chip" onclick="selectPurpose(this, 'Một bó hoa lãng mạng thích hợp để tỏ tình cảm')">❤️ Bày tỏ tình cảm</button>
                            <button type="button" class="btn btn-xs rounded-pill px-3 py-1.5 bg-light border shadow-none text-dark quick-chip" onclick="selectPurpose(this, 'Một bó hoa nhẹ nhàng thay cho lời cảm ơn')">💌 Cảm ơn hoặc xin lỗi</button>
                            <button type="button" class="btn btn-xs rounded-pill px-3 py-1.5 bg-light border shadow-none text-dark quick-chip" onclick="selectPurpose(this, 'Động viên, an ủi tinh thần')">🌿 Động viên, an ủi</button>
                            <button type="button" class="btn btn-xs rounded-pill px-3 py-1.5 bg-light border shadow-none text-dark quick-chip" onclick="selectPurpose(this, 'Tạo bất ngờ đặc biệt mang lại nụ cười')">✨ Tạo bất ngờ đặc biệt</button>
                        </div>

                        <textarea name="search" id="aiPromptInput" class="form-control rounded-3 p-3 bg-light border shadow-none text-dark" rows="2.5" placeholder="Ví dụ: 'Một bó hoa thích hợp tặng lễ tốt nghiệp...'" style="border-color: rgba(123, 17, 19, 0.15) !important; font-size: 0.9rem;"></textarea>
                    </div>

                    <!-- 2: Tìm hiểu phong cách User mong muốn  -->
                    <div class="mb-4 p-3 bg-white rounded-4 shadow-sm border border-opacity-10" style="border-color: rgba(123, 17, 19, 0.15);">
                        <label class="form-label fw-bold text-primary-custom d-flex align-items-center gap-2 mb-2" style="font-size: 0.95rem;">
                            <span>Phong cách bạn mong muốn</span>
                        </label>
                        <div class="row g-2">
                            <div class="col-md-6">
                                <select name="ai_style" class="form-select rounded-pill px-3 py-2 bg-light border shadow-none text-dark" style="border-color: rgba(123, 17, 19, 0.15) !important; font-size: 0.9rem;">
                                    <option value="">-- Chọn phong cách chủ đạo --</option>
                                    <option value="tinh_te">Tinh tế, thanh lịch (An toàn, dễ tặng)</option>
                                    <option value="ngot_ngao">Ngọt ngào, nhẹ nhàng (Tone pastel lãng mạn)</option>
                                    <option value="sang_trong">Sang trọng, cao cấp (Gây ấn tượng)</option>
                                    <option value="doc_dao">Độc đáo, sáng tạo (Phá cách, nổi bật)</option>
                                    <option value="toi_gian">Tự nhiên, tối giản (Rustic & mộc mạc)</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <select name="ai_budget" class="form-select rounded-pill px-3 py-2 bg-light border shadow-none text-dark" style="border-color: rgba(123, 17, 19, 0.15) !important; font-size: 0.9rem;">
                                    <option value="">-- Ngân sách thông minh (Tối ưu từ DB) --</option>
                                    <option value="duoi_500k">Dưới 500.000 đ (Tiết kiệm & cân bằng)</option>
                                    <option value="500k_1tr5">500.000 đ - 1.500.000 đ (Phổ biến & tinh tế)</option>
                                    <option value="1tr5_3tr">1.500.000 đ - 3.000.000 đ (Cao cấp & ấn tượng)</option>
                                    <option value="tren_3tr">Trên 3.000.000 đ (Đặc biệt sang trọng)</option>
                                </select>
                            </div>
                        </div>

                        <!-- Phong cách lời chúc & Ý nghĩa hoa -->
                        <div class="row g-2 mt-2">
                            <div class="col-md-6">
                                <input type="text" name="ai_recipient" class="form-control rounded-pill px-3 py-2 bg-light border shadow-none text-dark" placeholder="Người nhận (Mẹ, Vợ, Sếp nữ, Người yêu...)" style="border-color: rgba(123, 17, 19, 0.15) !important; font-size: 0.9rem;">
                            </div>
                            <div class="col-md-6">
                                <select name="ai_wish_style" class="form-select rounded-pill px-3 py-2 bg-light border shadow-none text-dark" style="border-color: rgba(123, 17, 19, 0.15) !important; font-size: 0.9rem;">
                                    <option value="">-- Phong cách lời chúc kèm thiệp --</option>
                                    <option value="chan_thanh">Chân thành & Ấm áp</option>
                                    <option value="lang_man">Lãng mạn & Ngọt ngào</option>
                                    <option value="trang_trong">Trang trọng & Lịch sự</option>
                                    <option value="ngan_gon">Ngắn gọn & Ý nghĩa</option>
                                    <option value="hai_huoc">Hài hước & Vui vẻ</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!--  3: AI sẽ giải thích kèm với các lựa chọn được đưa ra -->
                    <div class="p-3 bg-light rounded-4 border border-opacity-25" style="border-color: rgba(123, 17, 19, 0.2);">
                        <div class="d-flex align-items-center gap-2 text-primary-custom fw-bold mb-1" style="font-size: 0.9rem;">
                            <i class="fa-solid fa-circle-info"></i>
                            <span>Đề xuất phù hợp</span>
                        </div>
                        <p class="text-muted small mb-0" style="line-height: 1.5;">
                            Kết quả phù hợp sẽ hiển thị ở đây.
                        </p>
                    </div>

                </div>

                <!-- Modal Footer -->
                <div class="modal-footer border-0 px-4 py-3 bg-white d-flex align-items-center justify-content-between">
                    <span class="text-muted small fst-italic">🔒 Crafted care by BaoAnh.</span>
                    <div class="d-flex align-items-center gap-2">
                        <button type="button" class="btn btn-outline-custom rounded-pill px-4 py-2 fw-semibold text-secondary shadow-sm bg-white" data-bs-dismiss="modal" style="font-size: 0.9rem;">Hủy bỏ</button>
                        <button type="submit" class="btn-primary-custom rounded-pill px-5 py-2 text-white fw-bold shadow-sm border-0 d-flex align-items-center gap-2" style="font-size: 0.9rem;">
                            <i class="fa-solid fa-wand-magic-sparkles text-warning"></i>
                            <span>AI Phân Tích & Tìm Kiếm</span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>




<!-- STYLES & SCRIPTS -->
@push('styles')
<style>
     /* ROBOT  */
    @keyframes robotSway {
        0%, 100% { transform: translateY(0) rotate(0deg); }
        25% { transform: translateY(-3px) rotate(-3deg); }
        75% { transform: translateY(-1px) rotate(3deg); }
    }
    .animate-sway {
        animation: robotSway 4s ease-in-out infinite;
        transform-origin: bottom center;
    }

    /* cánh hoa  */
    .falling-petals-container .petal {
        position: absolute;
        top: -20px;
        font-size: 14px;
        animation: fallPetals linear infinite;
        opacity: 0.7;
    }
    @keyframes fallPetals {
        0% { transform: translateY(-10px) translateX(0) rotate(0deg); opacity: 0; }
        20% { opacity: 0.8; }
        100% { transform: translateY(110px) translateX(30px) rotate(360deg); opacity: 0; }
    }
    .falling-petals-container .p1 { left: 10%; animation-duration: 5s; animation-delay: 0s; }
    .falling-petals-container .p2 { left: 35%; animation-duration: 6.5s; animation-delay: 1.5s; font-size: 11px; }
    .falling-petals-container .p3 { left: 60%; animation-duration: 5.5s; animation-delay: 0.8s; }
    .falling-petals-container .p4 { left: 80%; animation-duration: 7s; animation-delay: 2.2s; font-size: 12px; }
    .falling-petals-container .p5 { left: 92%; animation-duration: 4.8s; animation-delay: 0.4s; }

    @keyframes spinSlow {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
    @keyframes bounceSubtle {
        0%, 100% { transform: translate(-50%, 0); }
        50% { transform: translate(-50%, -3px); }
    }
    .animate-spin-slow {
        animation: spinSlow 3s linear infinite;
    }
    .animate-bounce-subtle {
        animation: bounceSubtle 2s ease-in-out infinite;
    }
    .quick-chip {
        color: #5c0d0f !important;
        background-color: #ffffff !important;
        border: 1px solid rgba(123, 17, 19, 0.12) !important;
        transition: all 0.2s ease;
    }
    .quick-chip:hover {
        background-color: var(--burgundy-subtle, #fdf2f2) !important;
        border-color: var(--burgundy-primary, #7b1113) !important;
        color: var(--burgundy-primary, #7b1113) !important;
    }

    /* Modal Responsive */
    #aiSearchModal .modal-dialog {
        max-width: 780px;
    }
    #aiSearchModal .modal-content {
        border-radius: 20px !important;
        box-shadow: 0 20px 50px rgba(50, 12, 20, 0.18);
    }
    #aiSearchModal .modal-header {
        background: linear-gradient(135deg, #4b1018 0%, #7b1113 100%) !important;
        padding: 22px 24px !important;
    }
    #aiSearchModal .modal-body {
        padding: 24px !important;
    }
    #aiSearchModal .modal-footer {
        padding: 16px 24px !important;
    }

    @media (max-width: 767.98px) {
        #aiSearchModal .modal-dialog {
            margin: 12px;
        }
        #aiSearchModal .modal-footer .btn {
            font-size: 0.85rem !important;
            padding-left: 12px !important;
            padding-right: 12px !important;
        }
    }
</style>
@endpush

@push('scripts')
<script>
    // ẩn toast khi người dùng tương tác
    function dismissAiToast() {
        const toast = document.getElementById('aiToastPrompt');
        if (toast) {
            toast.style.display = 'none';
        }
    }

    // Tự động điền nội dung mục đích / cảm xúc khi bấm vào các mục ở phần 1(các quick-chip )
    function selectPurpose(element, text) {
        const promptInput = document.getElementById('aiPromptInput');
        if (promptInput) {
            promptInput.value = text;
        }
        document.querySelectorAll('.quick-chip').forEach(el => {
            el.style.borderColor = 'rgba(123, 17, 19, 0.12)';
            el.style.color = '#5c0d0f';
            el.style.backgroundColor = '#ffffff';
        });
        element.style.borderColor = 'var(--burgundy-primary, #7b1113)';
        element.style.color = 'var(--burgundy-primary, #7b1113)';
        element.style.backgroundColor = 'var(--burgundy-subtle, #fdf2f2)';
    }

    // auto hide toast sau 5 giây không có tương tác
    setTimeout(() => {
        dismissAiToast();
    }, 5000);
</script>
@endpush