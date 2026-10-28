@extends('layouts.app')

@section('title', 'Chính Sách Giao Hàng - BAFlorist')

@section('content')
<div class="container py-5" style="max-width: 920px;" id="categories">
    


    <!-- Header Tiêu đề -->
    <div class="text-center mb-5">
        <h2 class="fw-bold text-primary-custom mb-3" style="font-family: var(--font-heading);">Chính Sách Giao Hàng</h2>
        <p class="text-muted mx-auto small" style="max-width: 650px;">
            BAFlorist cam kết giao hoa đúng thời gian và địa điểm theo yêu cầu của khách hàng. Dưới đây là các thông tin chi tiết về chính sách giao hàng của chúng tôi.
        </p>
    </div>

    <!-- Nội dung hiển thị trực tiếp -->
    <div class="d-flex flex-column gap-4">

        <!-- 1. Khu vực giao hàng -->
        <div>
            <h5 class="fw-bold text-dark mb-3" style="font-family: var(--font-heading);">1. Khu vực giao hàng</h5>
            
            <div class="mb-3">
                <h6 class="fw-bold text-dark small mb-2">1.1. Nội thành TP.HCM</h6>
                <ul class="text-secondary small mb-0 ps-3 d-flex flex-column gap-1" style="line-height: 1.8;">
                    <li>Giao hàng trong ngày với đơn đặt trước 14:00.</li>
                    <li>Thời gian giao: 8:00 - 21:00 hàng ngày.</li>
                    <li>Có thể chọn khung giờ giao cụ thể (buổi sáng, chiều, tối).</li>
                </ul>
            </div>

            <div class="mb-3">
                <h6 class="fw-bold text-dark small mb-2">1.2. Các quận ngoại thành và tỉnh lân cận</h6>
                <ul class="text-secondary small mb-0 ps-3 d-flex flex-column gap-1" style="line-height: 1.8;">
                    <li>Bình Dương, Đồng Nai, Long An: Đặt trước 1 ngày.</li>
                    <li>Phí giao hàng tính theo khoảng cách thực tế.</li>
                </ul>
            </div>

            <div>
                <h6 class="fw-bold text-dark small mb-2">1.3. Các tỉnh thành khác</h6>
                <ul class="text-secondary small mb-0 ps-3 d-flex flex-column gap-1" style="line-height: 1.8;">
                    <li>Liên hệ trước để được tư vấn về khả năng giao hàng.</li>
                    <li>Thời gian giao: 2-3 ngày tùy khu vực.</li>
                    <li>Một số vùng sâu vùng xa có thể không hỗ trợ giao hàng.</li>
                </ul>
            </div>
        </div>

        <hr class="opacity-25 my-1">

        <!-- 2. Thời gian giao hàng -->
        <div>
            <h5 class="fw-bold text-dark mb-3" style="font-family: var(--font-heading);">2. Thời gian giao hàng</h5>
            <ul class="text-secondary small mb-3 ps-3 d-flex flex-column gap-2" style="line-height: 1.8;">
                <li><strong>Giao chuẩn giờ:</strong> Giao đúng khung giờ khách hàng yêu cầu (sai số ±30 phút).</li>
                <li><strong>Giao trong ngày:</strong> Giao bất kỳ lúc nào trong ngày từ 8:00 - 21:00.</li>
                <li><strong>Giao gấp:</strong> Đơn hàng cần giao trong vòng 2-3 giờ (phụ thu phí giao gấp).</li>
            </ul>
            <div class="p-3 rounded-3 bg-light border border-light text-muted small fst-italic">
                <strong>Lưu ý:</strong> Thời gian giao có thể chậm hơn 30-60 phút trong các trường hợp kẹt xe, thời tiết xấu hoặc địa chỉ khó tìm. BAFlorist sẽ thông báo ngay cho khách hàng nếu có chậm trễ.
            </div>
        </div>

        <hr class="opacity-25 my-1">

        <!-- 3. Phí giao hàng & Bảng biểu -->
        <div>
            <h5 class="fw-bold text-dark mb-2" style="font-family: var(--font-heading);">3. Phí giao hàng</h5>
            <p class="text-success fw-semibold small mb-3">
                <i class="fa-solid fa-gift me-1"></i> Miễn phí ship cho đơn từ 1.000.000đ (áp dụng khu vực nội thành TP.HCM).<br> 
            </p>

            <!-- Bảng phí giao hàng -->
            <div class="table-responsive rounded-3 border mb-3 bg-white shadow-sm">
                <table class="table table-hover table-striped mb-0 small text-center align-middle">
                    <thead style="background-color: var(--burgundy-subtle); color: var(--burgundy-dark);">
                        <tr>
                            <th class="py-2.5 text-start ps-3">Khu vực</th>
                            <th class="py-2.5">Phí giao hàng</th>
                            <th class="py-2.5 text-start ps-3">Khu vực</th>
                            <th class="py-2.5">Phí giao hàng</th>
                        </tr>
                    </thead>
                    <tbody class="text-secondary">
                        <tr>
                            <td class="text-start ps-3 fw-medium text-dark">Quận 1</td>
                            <td class="price-number text-primary-custom fw-semibold">30.000đ</td>
                            <td class="text-start ps-3 fw-medium text-dark">Quận 2</td>
                            <td class="price-number text-primary-custom fw-semibold">50.000đ</td>
                        </tr>
                        <tr>
                            <td class="text-start ps-3 fw-medium text-dark">Quận 3</td>
                            <td class="price-number text-primary-custom fw-semibold">30.000đ</td>
                            <td class="text-start ps-3 fw-medium text-dark">Quận 4</td>
                            <td class="price-number text-primary-custom fw-semibold">40.000đ</td>
                        </tr>
                        <tr>
                            <td class="text-start ps-3 fw-medium text-dark">Quận 5</td>
                            <td class="price-number text-primary-custom fw-semibold">50.000đ</td>
                            <td class="text-start ps-3 fw-medium text-dark">Quận 6</td>
                            <td class="price-number text-primary-custom fw-semibold">60.000đ</td>
                        </tr>
                        <tr>
                            <td class="text-start ps-3 fw-medium text-dark">Quận 7</td>
                            <td class="price-number text-primary-custom fw-semibold">60.000đ</td>
                            <td class="text-start ps-3 fw-medium text-dark">Quận 8</td>
                            <td class="price-number text-primary-custom fw-semibold">60.000đ</td>
                        </tr>
                        <tr>
                            <td class="text-start ps-3 fw-medium text-dark">Quận 9</td>
                            <td class="price-number text-primary-custom fw-semibold">70.000đ</td>
                            <td class="text-start ps-3 fw-medium text-dark">Quận 10</td>
                            <td class="price-number text-primary-custom fw-semibold">50.000đ</td>
                        </tr>
                        <tr>
                            <td class="text-start ps-3 fw-medium text-dark">Quận 11</td>
                            <td class="price-number text-primary-custom fw-semibold">60.000đ</td>
                            <td class="text-start ps-3 fw-medium text-dark">Quận 12</td>
                            <td class="price-number text-primary-custom fw-semibold">100.000đ</td>
                        </tr>
                        <tr>
                            <td class="text-start ps-3 fw-medium text-dark">TP. Thủ Đức</td>
                            <td class="price-number text-primary-custom fw-semibold">80.000đ</td>
                            <td class="text-start ps-3 fw-medium text-dark">Quận Tân Bình</td>
                            <td class="price-number text-primary-custom fw-semibold">50.000đ</td>
                        </tr>
                        <tr>
                            <td class="text-start ps-3 fw-medium text-dark">Quận Bình Thạnh</td>
                            <td class="price-number text-primary-custom fw-semibold">40.000đ</td>
                            <td class="text-start ps-3 fw-medium text-dark">Quận Bình Tân</td>
                            <td class="price-number text-primary-custom fw-semibold">70.000đ</td>
                        </tr>
                        <tr>
                            <td class="text-start ps-3 fw-medium text-dark">Quận Gò Vấp</td>
                            <td class="price-number text-primary-custom fw-semibold">60.000đ</td>
                            <td class="text-start ps-3 fw-medium text-dark">Quận Phú Nhuận</td>
                            <td class="price-number text-primary-custom fw-semibold">40.000đ</td>
                        </tr>
                        <tr>
                            <td class="text-start ps-3 fw-medium text-dark">Quận Nhà Bè</td>
                            <td class="price-number text-primary-custom fw-semibold">70.000đ</td>
                            <td class="text-start ps-3 fw-medium text-dark">Quận Tân Phú</td>
                            <td class="price-number text-primary-custom fw-semibold">80.000đ</td>
                        </tr>
                        <tr>
                            <td class="text-start ps-3 fw-medium text-dark">Huyện Hóc Môn</td>
                            <td class="price-number text-primary-custom fw-semibold">110.000đ</td>
                            <td class="text-start ps-3 fw-medium text-dark">Quận Bình Chánh</td>
                            <td class="text-muted fst-italic">Liên hệ</td>
                        </tr>
                        <tr>
                            <td class="text-start ps-3 fw-medium text-dark">Huyện Củ Chi</td>
                            <td class="text-muted fst-italic">Liên hệ</td>
                            <td class="text-start ps-3 fw-medium text-dark">Bình Dương / Đồng Nai</td>
                            <td class="text-muted fst-italic">Liên hệ</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <ul class="text-muted small mb-0 ps-3 d-flex flex-column gap-1" style="font-size: 0.85rem;">
                <li>Phí giao hàng thực tế sẽ được hiển thị khi đặt hàng dựa trên địa chỉ cụ thể.</li>
                <li>"Liên hệ" = Vui lòng liên hệ hotline/zalo để báo giá chính xác theo địa chỉ cụ thể.</li>
            </ul>
        </div>

        <hr class="opacity-25 my-1">

        <!-- 4. Quy trình giao hàng -->
        <div>
            <h5 class="fw-bold text-dark mb-3" style="font-family: var(--font-heading);">4. Quy trình giao hàng</h5>
            <div class="row g-3">
                <div class="col-md-3 col-6">
                    <div class="p-3 rounded-3 bg-white text-center h-100 border shadow-sm">
                        <span class="badge rounded-circle bg-primary-custom mb-2">1</span>
                        <h6 class="fw-bold text-dark small mb-1">Xác nhận</h6>
                        <small class="text-muted d-block" style="font-size: 0.75rem;">Liên hệ xác nhận thông tin sau khi đặt.</small>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="p-3 rounded-3 bg-white text-center h-100 border shadow-sm">
                        <span class="badge rounded-circle bg-primary-custom mb-2">2</span>
                        <h6 class="fw-bold text-dark small mb-1">Chuẩn bị</h6>
                        <small class="text-muted d-block" style="font-size: 0.75rem;">Florist thiết kế và bọc hoa cẩn thận.</small>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="p-3 rounded-3 bg-white text-center h-100 border shadow-sm">
                        <span class="badge rounded-circle bg-primary-custom mb-2">3</span>
                        <h6 class="fw-bold text-dark small mb-1">Giao hàng</h6>
                        <small class="text-muted d-block" style="font-size: 0.75rem;">Shipper gọi người nhận trước khi giao.</small>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="p-3 rounded-3 bg-white text-center h-100 border shadow-sm">
                        <span class="badge rounded-circle bg-primary-custom mb-2">4</span>
                        <h6 class="fw-bold text-dark small mb-1">Hoàn tất</h6>
                        <small class="text-muted d-block" style="font-size: 0.75rem;">Chụp ảnh xác nhận gửi cho người đặt.</small>
                    </div>
                </div>
            </div>
        </div>

        <hr class="opacity-25 my-1">

        <!-- 5. Trường hợp không giao được -->
        <div>
            <h5 class="fw-bold text-dark mb-3" style="font-family: var(--font-heading);">5. Trường hợp không giao được</h5>
            <p class="text-secondary small mb-2">Nếu không thể giao hàng vì lý do từ phía người nhận, BAFlorist sẽ xử lý như sau:</p>
            <ul class="text-secondary small mb-0 ps-3 d-flex flex-column gap-2" style="line-height: 1.8;">
                <li><strong>Người nhận không có mặt:</strong> Chờ tối đa 30 phút, sau đó liên hệ người đặt để dời lịch giao.</li>
                <li><strong>Người nhận từ chối nhận:</strong> Liên hệ người đặt để xác nhận, đơn hàng sẽ không được hoàn tiền.</li>
                <li><strong>Địa chỉ sai / Không tìm thấy:</strong> Liên hệ người đặt để cập nhật địa chỉ, có thể phát sinh phí giao lại.</li>
                <li><strong>Phí giao lại:</strong> Bằng 100% phí giao ban đầu.</li>
            </ul>
        </div>

        <hr class="opacity-25 my-1">

        <!-- 6. Giao hàng trong điều kiện đặc biệt -->
        <div>
            <h5 class="fw-bold text-dark mb-3" style="font-family: var(--font-heading);">6. Giao hàng trong điều kiện đặc biệt</h5>
            
            <div class="mb-3">
                <h6 class="fw-bold text-dark small mb-2">6.1. Thời tiết xấu</h6>
                <p class="text-secondary small mb-1">Trong trường hợp mưa lớn, bão hoặc thiên tai, chúng tôi sẽ liên hệ khách hàng để:</p>
                <ul class="text-secondary small mb-0 ps-3 d-flex flex-column gap-1" style="line-height: 1.8;">
                    <li>Dời lịch giao sang thời điểm thích hợp hơn.</li>
                    <li>Hoặc tiếp tục giao với biện pháp bảo vệ hoa đặc biệt (bọc chống nước kỹ càng).</li>
                </ul>
            </div>

            <div>
                <h6 class="fw-bold text-dark small mb-2">6.2. Ngày lễ lớn</h6>
                <p class="text-secondary small mb-0" style="line-height: 1.8;">
                    Vào các dịp Valentine, 8/3, 20/10, 20/11... lượng đơn hàng tăng cao có thể ảnh hưởng đến thời gian giao. BAFlorist khuyến khích quý khách đặt hàng sớm và linh hoạt về khung giờ nhận hoa.
                </p>
            </div>
        </div>

    </div>

</div>
@endsection