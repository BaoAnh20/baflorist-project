@extends('layouts.app')

@section('title', 'Chính Sách Đổi Trả - BAFlorist')

@section('content')
<div class="container py-5" style="max-width: 920px;">
    

    <!-- Header Tiêu đề -->
    <div class="text-center mb-5">
        <h2 class="fw-bold text-primary-custom mb-3" style="font-family: var(--font-heading);">Chính Sách Đổi Trả</h2>
        <p class="text-muted mx-auto small" style="max-width: 650px;">
            Trong trường hợp sản phẩm không đạt yêu cầu, chúng tôi sẵn sàng hỗ trợ đổi trả theo chính sách dưới đây.
        </p>
    </div>

    <!-- Nội dung hiển thị trực tiếp -->
    <div class="d-flex flex-column gap-4">

        <!-- 1. Đặc thù sản phẩm hoa tươi -->
        <div>
            <h5 class="fw-bold text-dark mb-3" style="font-family: var(--font-heading);">1. Đặc thù sản phẩm hoa tươi</h5>
                <p class="text-secondary small mb-2" style="line-height: 1.8;">
                    Hoa tươi là sản phẩm đặc biệt với tuổi thọ ngắn và đặc điểm tự nhiên riêng biệt. Do đó, chính sách đổi trả của chúng tôi được xây dựng phù hợp với đặc thù này:
            </p>
            <ul class="text-secondary small mb-0 ps-3 d-flex flex-column gap-1" style="line-height: 1.8;">
                <li>- Hoa tươi không thể hoàn trả sau khi đã giao thành công.</li>
                <li>- Màu sắc thực tế có thể khác biệt nhẹ so với hình ảnh do đặc tính tự nhiên của hoa.</li>
                <li>- Một số loại hoa có thể được thay thế bằng loại tương đương khi không có sẵn.</li>
            </ul>
        </div>

        <hr class="opacity-25 my-1">

        <!-- 2. Các trường hợp được đổi/hoàn tiền -->
        <div>
            <h5 class="fw-bold text-dark mb-3" style="font-family: var(--font-heading);">2. Các trường hợp được đổi/hoàn tiền</h5>
            <p class="text-secondary small mb-2" style="line-height: 1.8;">Quý khách được quyền yêu cầu đổi sản phẩm hoặc hoàn tiền 100% trong các trường hợp sau:</p>
            <ul class="text-secondary small mb-0 ps-3 d-flex flex-column gap-2" style="line-height: 1.8;">
                <li><strong>Sản phẩm không đúng mẫu:</strong> Thiết kế khác biệt hoàn toàn so với mẫu đã chọn (không phải do thay thế nguyên liệu đã thông báo).</li>
                <li><strong>Sai tone màu chủ đạo:</strong> Màu sắc chính của bó/lẵng hoa khác hoàn toàn so với yêu cầu.</li>
                <li><strong>Hoa bị hư hỏng:</strong> Hoa héo, dập nát, có dấu hiệu hư hỏng rõ ràng tại thời điểm giao.</li>
                <li><strong>Sai thông tin giao hàng:</strong> Giao nhầm địa chỉ hoặc sai người nhận do lỗi của BAFlorist.</li>
                <li><strong>Giao trễ nghiêm trọng:</strong> Giao trễ hơn 2 giờ so với thời gian cam kết mà không có thông báo trước.</li>
            </ul>
        </div>

        <hr class="opacity-25 my-1">

        <!-- 3. Các trường hợp không được đổi/hoàn tiền -->
        <div>
            <h5 class="fw-bold text-dark mb-3" style="font-family: var(--font-heading);">3. Các trường hợp không được đổi/hoàn tiền</h5>
            <ul class="text-secondary small mb-0 ps-3 d-flex flex-column gap-2" style="line-height: 1.8;">
                <li>Khách hàng thay đổi ý định sau khi đã xác nhận đơn hàng.</li>
                <li>Người nhận từ chối nhận hoa hoặc không có mặt tại địa chỉ giao.</li>
                <li>Hoa héo sau khi đã giao thành công do không được chăm sóc đúng cách.</li>
                <li>Khác biệt nhỏ về màu sắc, kích thước do đặc tính tự nhiên của hoa.</li>
                <li>Thay thế nguyên liệu đã được thông báo và khách hàng đồng ý.</li>
            </ul>
        </div>

        <hr class="opacity-25 my-1">

        <!-- 4. Quy trình khiếu nại -->
        <div>
            <h5 class="fw-bold text-dark mb-3" style="font-family: var(--font-heading);">4. Quy trình khiếu nại</h5>
            
            <div class="mb-3">
                <h6 class="fw-bold text-dark small mb-2">4.1. Thời hạn khiếu nại</h6>
                <ul class="text-secondary small mb-0 ps-3 d-flex flex-column gap-1" style="line-height: 1.8;">
                    <li>Trong vòng 1 giờ sau khi nhận hàng đối với vấn đề về chất lượng, mẫu mã.</li>
                    <li>Trong vòng 24 giờ đối với các vấn đề khác liên quan đến đơn hàng.</li>
                </ul>
            </div>

            <div>
                <h6 class="fw-bold text-dark small mb-2">4.2. Cách thức khiếu nại</h6>
                <div class="row g-3 mt-1">
                    <div class="col-md-3 col-6">
                        <div class="p-3 rounded-3 bg-white text-center h-100 border shadow-sm">
                            <span class="badge rounded-circle bg-primary-custom mb-2">1</span>
                            <h6 class="fw-bold text-dark small mb-1">Chụp ảnh</h6>
                            <small class="text-muted d-block" style="font-size: 0.75rem;">Ghi lại tình trạng sản phẩm ngay khi nhận.</small>
                        </div>
                    </div>
                    <div class="col-md-3 col-6">
                        <div class="p-3 rounded-3 bg-white text-center h-100 border shadow-sm">
                            <span class="badge rounded-circle bg-primary-custom mb-2">2</span>
                            <h6 class="fw-bold text-dark small mb-1">Liên hệ</h6>
                            <small class="text-muted d-block" style="font-size: 0.75rem;">Gửi qua Zalo OA/Email kèm mã đơn hàng.</small>
                        </div>
                    </div>
                    <div class="col-md-3 col-6">
                        <div class="p-3 rounded-3 bg-white text-center h-100 border shadow-sm">
                            <span class="badge rounded-circle bg-primary-custom mb-2">3</span>
                            <h6 class="fw-bold text-dark small mb-1">Xác nhận</h6>
                            <small class="text-muted d-block" style="font-size: 0.75rem;">Phản hồi trong vòng 2 giờ làm việc.</small>
                        </div>
                    </div>
                    <div class="col-md-3 col-6">
                        <div class="p-3 rounded-3 bg-white text-center h-100 border shadow-sm">
                            <span class="badge rounded-circle bg-primary-custom mb-2">4</span>
                            <h6 class="fw-bold text-dark small mb-1">Giải quyết</h6>
                            <small class="text-muted d-block" style="font-size: 0.75rem;">Đổi sản phẩm hoặc hoàn tiền theo thỏa thuận.</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <hr class="opacity-25 my-1">

        <!-- 5. Phương thức hoàn tiền -->
        <div>
            <h5 class="fw-bold text-dark mb-3" style="font-family: var(--font-heading);">5. Phương thức hoàn tiền</h5>
            <ul class="text-secondary small mb-3 ps-3 d-flex flex-column gap-2" style="line-height: 1.8;">
                <li><strong>Chuyển khoản ngân hàng:</strong> Hoàn tiền trong vòng 3-5 ngày làm việc.</li>
                <li><strong>Ví điện tử:</strong> Hoàn tiền trong vòng 1-2 ngày làm việc.</li>
                <li><strong>Voucher mua hàng:</strong> Cấp ngay sau khi xác nhận (giá trị tương đương + 10% bồi thường).</li>
            </ul>
            <div class="p-3 rounded-3 bg-light border border-light text-muted small fst-italic">
                <strong>Lưu ý:</strong> Số tiền hoàn trả bao gồm giá sản phẩm và phí giao hàng (nếu lỗi thuộc về BAFlorist).
            </div>
        </div>

        <hr class="opacity-25 my-1">

        <!-- 6. Đổi sản phẩm -->
        <div>
            <h5 class="fw-bold text-dark mb-3" style="font-family: var(--font-heading);">6. Đổi sản phẩm</h5>
            <p class="text-secondary small mb-2" style="line-height: 1.8;">Trong trường hợp sản phẩm không đạt yêu cầu và khách hàng muốn đổi:</p>
            <ul class="text-secondary small mb-0 ps-3 d-flex flex-column gap-1" style="line-height: 1.8;">
                <li>- Chúng tôi sẽ thiết kế và giao sản phẩm thay thế trong thời gian sớm nhất.</li>
                <li>- Miễn phí giao hàng cho sản phẩm đổi.</li>
                <li>- Thời gian giao lại tùy thuộc vào khả năng sản xuất và khu vực giao.</li>
            </ul>
        </div>

        <hr class="opacity-25 my-1">

        <!-- 7. Cam kết của BAFlorist -->
        <div>
            <h5 class="fw-bold text-dark mb-3" style="font-family: var(--font-heading);">7. Cam kết của BAFlorist</h5>
            <ul class="text-secondary small mb-0 ps-3 d-flex flex-column gap-2" style="line-height: 1.8;">
                <li>Xử lý mọi khiếu nại một cách công bằng và nhanh chóng.</li>
                <li>Luôn đặt sự hài lòng của khách hàng lên hàng đầu.</li>
                <li>Minh bạch trong quy trình giải quyết vấn đề.</li>
                <li>Học hỏi từ phản hồi để không ngừng cải thiện chất lượng.</li>
            </ul>
        </div>

    </div>

</div>
@endsection