@extends('layouts.app')

@section('title', 'Tra Cứu Đơn Hàng - BAFlorist')

@section('content')
<div class="container py-5" style="max-width: 650px;">
    
    <!-- TRANG DÙNG ĐỂ TRA ĐƠN HÀNG BẰNG MÃ - SDT => khi chưa login -->
    <div class="text-center mb-4">
        <h2 class="fw-bold mb-2 text-primary-custom" style="font-family: var(--font-heading);">
            Tra Cứu Đơn Hàng
        </h2>
        <p class="text-muted small mx-auto" style="max-width: 500px;">
            Nhập mã đơn hàng và số điện thoại mua hàng của bạn để kiểm tra trạng thái và thông tin chi tiết.
        </p>
    </div>

    <!-- Form Tra Cứu -->
    <div class="glass-blur-card p-4 p-md-5 shadow-sm rounded-4 bg-white border-0 mb-4" id="lookupFormCard">
        <form id="lookupForm" onsubmit="handleLookup(event)">
            
            <!-- Thông báo lỗi giả lập -->
            <div id="lookupError" class="alert alert-danger rounded-4 p-3 mb-3 small border-0 shadow-sm d-flex align-items-center gap-2" style="display: none;">
                <i class="fa-solid fa-circle-exclamation text-danger fs-5"></i>
                <div id="errorText">Không tìm thấy thông tin đơn hàng trùng khớp.</div>
            </div>

            <div class="mb-3">
                <label class="form-label small text-muted fw-semibold">Mã đơn hàng <span class="text-danger">*</span></label>
                <div class="input-group">
                    <span class="input-group-text bg-light border-0 rounded-start-pill px-3 text-muted">
                        <i class="fa-solid fa-hashtag"></i>
                    </span>
                    <input type="text" id="orderCode" class="form-control rounded-end-pill px-3 py-2.5 bg-light border-0 shadow-none small" placeholder="VD: BAF-20261018-001" value="BAF-20261018-001" required>
                </div>
                <div class="form-text text-muted" style="font-size: 0.75rem;">Mẹo: Nhập <code class="text-primary-custom">BAF-20261018-001</code> để xem thử kết quả mẫu.</div>
            </div>

            <div class="mb-4">
                <label class="form-label small text-muted fw-semibold">Số điện thoại người đặt <span class="text-danger">*</span></label>
                <div class="input-group">
                    <span class="input-group-text bg-light border-0 rounded-start-pill px-3 text-muted">
                        <i class="fa-solid fa-phone"></i>
                    </span>
                    <input type="tel" id="orderPhone" class="form-control rounded-end-pill px-3 py-2.5 bg-light border-0 shadow-none small" placeholder="VD: 0901234567" value="0901234567" required>
                </div>
            </div>

            <button type="submit" class="btn btn-primary-custom w-100 py-3 fw-bold text-uppercase fs-6 shadow-sm rounded-pill">
                Tra Cứu Ngay <i class="fa-solid fa-arrow-right-long ms-2"></i>
            </button>
        </form>
    </div>

    <!-- KẾT QUẢ TRA CỨU GIẢ LẬP -->
    <div id="lookupResultCard" style="display: none;">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <h5 class="fw-bold text-primary-custom mb-0" style="font-family: var(--font-heading);">Kết quả tìm kiếm</h5>
            <button class="btn btn-outline-secondary btn-sm rounded-pill px-3 small" onclick="resetLookup()">
                <i class="fa-solid fa-rotate-left me-1"></i> Tra cứu lại
            </button>
        </div>

        <div class="glass-blur-card p-4 shadow-sm rounded-4 border-0 bg-white">
            <div class="d-flex justify-content-between align-items-center pb-3 border-bottom flex-wrap gap-2" style="border-color: rgba(123, 17, 19, 0.08) !important;">
                <div class="d-flex align-items-center gap-3 flex-wrap">
                    <span class="fw-bold text-dark">
                        Mã đơn: <span class="text-primary-custom price-number" id="resCode">#BAF-20261018-001</span>
                    </span>
                    <span class="text-muted">|</span>
                    <small class="text-muted">Ngày đặt: <span class="fw-medium text-dark">18/10/2026 14:30</span></small>
                </div>
                <div>
                    <span class="badge bg-warning-subtle text-warning border border-warning-subtle px-3 py-2 rounded-pill fw-semibold">
                        Chờ xác nhận
                    </span>
                </div>
            </div>

            <!-- Sản phẩm trong đơn -->
            <div class="py-3">
                <div class="d-flex align-items-center justify-content-between py-2">
                    <div class="d-flex align-items-center gap-3">
                        <img src="https://images.unsplash.com/photo-1526047932273-341f2a7631f9?q=80&w=200" 
                             class="rounded-3 object-fit-cover shadow-sm border" width="55" height="55" alt="Hoa">
                        <div>
                            <h6 class="fw-bold text-dark mb-1" style="font-size: 0.92rem;">Bó hồng mẫu đơn Coral Dream</h6>
                            <small class="text-muted">SL: x1 &middot; Đơn giá: 4.500.000 ₫</small>
                        </div>
                    </div>
                    <div class="text-end fw-bold text-dark price-number" style="font-size: 0.95rem;">
                        4.500.000 ₫
                    </div>
                </div>
            </div>

            <!-- Thông tin thêm -->
            <div class="d-flex justify-content-between align-items-center pt-3 border-top flex-wrap gap-3">
                <div class="small text-muted">
                    <span>Người nhận: <strong class="text-dark">Bảo Anh</strong> (0901234567)</span><br>
                    <span>Giao hàng: Quận 1, TP. Hồ Chí Minh</span>
                </div>
                <div class="text-end">
                    <small class="text-muted d-block" style="font-size: 0.75rem;">Tổng thanh toán:</small>
                    <span class="fs-5 fw-bold price-number text-primary-custom">4.520.000 ₫</span>
                </div>
            </div>
        </div>
    </div>

    <div class="text-center mt-4">
        <p class="small text-muted mb-1">Cần hỗ trợ gấp về đơn hàng?</p>
        <a href="tel:0900000000" class="text-decoration-none fw-semibold text-primary-custom small">
            <i class="fa-solid fa-headset me-1"></i> Hotline: 090 000 0000
        </a>
    </div>

</div>
@endsection

@push('scripts')
<script>
    function handleLookup(event) {
        event.preventDefault();
        
        const code = document.getElementById('orderCode').value.trim();
        const phone = document.getElementById('orderPhone').value.trim();
        const errorBox = document.getElementById('lookupError');
        const resultCard = document.getElementById('lookupResultCard');
        const formCard = document.getElementById('lookupFormCard');

        // Giả lập dữ liệu đúng để test trên giao diện tĩnh
        const validCode = "BAF-20261018-001";
        const validPhone = "0901234567";

        if (code === validCode && phone === validPhone) {
            errorBox.style.display = 'none';
            document.getElementById('resCode').innerText = '#' + code;
            
            // Ẩn form, hiện kết quả tra cứu 
            formCard.style.display = 'none';
            resultCard.style.display = 'block';
        } else {
            // lỗi giả lập nếu nhập sai
            errorBox.style.display = 'flex';
            document.getElementById('errorText').innerText = `Không tìm thấy đơn hàng "${code}" với số điện thoại "${phone}". Vui lòng kiểm tra lại!`;
        }
    }

    function resetLookup() {
        document.getElementById('lookupFormCard').style.display = 'block';
        document.getElementById('lookupResultCard').style.display = 'none';
        document.getElementById('lookupError').style.display = 'none';
        document.getElementById('orderCode').value = '';
        document.getElementById('orderPhone').value = '';
    }
</script>
@endpush