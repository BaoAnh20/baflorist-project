@extends('layouts.admin')

@section('title', 'Quản Lý Sản Phẩm & Danh Mục - BAFlorist Admin')
@section('page_title', 'Quản Lý Danh Mục & Mẫu Hoa')

@section('content')
<!--  TAB CHUYỂN ĐỔI SẢN PHẨM - DANH MỤC -->
<ul class="nav nav-pills mb-4 gap-2" id="adminTab" role="tablist">
    <li class="nav-item" role="presentation">
        <button class="nav-link active rounded-pill px-4 fw-bold text-white shadow-sm" id="products-tab" data-bs-toggle="pill" data-bs-target="#products-pane" type="button" role="tab" aria-controls="products-pane" aria-selected="true" style="background: rgba(56, 189, 248, 0.25); border: 1px solid rgba(56, 189, 248, 0.5);">
            <i class="fa-solid fa-spa me-2"></i> Quản Lý Mẫu Hoa
        </button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link rounded-pill px-4 fw-bold text-white shadow-sm" id="categories-tab" data-bs-toggle="pill" data-bs-target="#categories-pane" type="button" role="tab" aria-controls="categories-pane" aria-selected="false" style="background: rgba(255, 255, 255, 0.05); border: 1px solid rgba(255, 255, 255, 0.2);">
            <i class="fa-solid fa-list me-2"></i> </i> Quản Lý Danh Mục
        </button>
    </li>
</ul>

<div class="tab-content" id="adminTabContent">
    <!--  TAB 1: QUẢN LÝ SP  -->
    <div class="tab-pane fade show active" id="products-pane" role="tabpanel" aria-labelledby="products-tab">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-stretch align-items-md-center gap-3 mb-4">
            <div class="search-box position-relative" style="max-width: 350px; width: 100%;">
                <span class="position-absolute top-50 start-0 translate-middle-y ms-3 text-white-50">
                    <i class="fa-solid fa-search"></i>
                </span>
                <input type="text" class="form-control rounded-pill ps-5 pe-4 py-2 border-0 shadow-sm text-white bg-transparent border border-light border-opacity-25" placeholder="Tìm kiếm tên mẫu hoa, danh mục...">
            </div>
            
            <button type="button" class="btn btn-primary rounded-pill px-4 py-2 text-white fw-bold shadow-sm d-flex align-items-center justify-content-center gap-2" data-bs-toggle="modal" data-bs-target="#productModal" onclick="resetProductForm()">
                <i class="fa-solid fa-plus-circle fs-5"></i> <span>Thêm Mẫu Hoa Mới</span>
            </button>
        </div>

        <div class="card border-0 shadow-none bg-transparent p-0">
            <div class="table-responsive">
                <table class="table align-middle table-hover mb-0">
                    <thead>
                        <tr class="text-uppercase fs-7 border-bottom">
                            <th style="width: 90px; color: #38bdf8 !important;" class="py-3">Hình Ảnh</th>
                            <th class="py-3" style="color: #38bdf8 !important;">Tên Sản Phẩm</th>
                            <th class="py-3" style="color: #38bdf8 !important;">Danh Mục</th>
                            <th class="py-3" style="color: #38bdf8 !important;">Giá Bán</th>
                            <th class="text-end py-3" style="width: 190px; color: #38bdf8 !important;">Thao Tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr style="transition: background-color 0.2s;">
                            <td class="py-3">
                                <div class="position-relative overflow-hidden rounded-3 border border-light border-opacity-25 shadow-sm" style="width: 55px; height: 55px;">
                                    <img src="https://images.unsplash.com/photo-1526047932273-341f2a7631f9?q=80&w=200" class="w-100 h-100 object-fit-cover" alt="Mẫu hoa">
                                </div>
                            </td>
                            <td class="py-3">
                                <strong class="d-block mb-1 text-white">Hộp mica hoa hồng hồng Pink Letter</strong>
                                <small style="color: rgba(255, 255, 255, 0.75) !important;">Mã SKU: BAF-HD01</small>
                            </td>
                            <td class="py-3">
                                <span class="badge rounded-pill px-3 py-2 fw-semibold" style="background-color: rgba(56, 189, 248, 0.15); color: #38bdf8;">
                                    Hoa Sinh Nhật
                                </span>
                            </td>
                            <td class="py-3">
                                <span class="price-number fw-bold fs-6 text-white">7.900.000 đ</span>
                            </td>
                            <td class="text-end py-3">
                                <div class="d-flex justify-content-end gap-2">
                                    <button class="btn btn-sm btn-outline-light rounded-pill px-3 py-1.5 shadow-sm hover-scale" data-bs-toggle="modal" data-bs-target="#productModal" onclick="editProduct(1, 'Hộp mica hoa hồng hồng Pink Letter', 1, 7900000, 'Hộp hoa mica trong suốt kết hợp hoa hồng nhập khẩu cao cấp.')" title="Chỉnh sửa">
                                        <i class="fa-solid fa-pen-to-square me-1"></i> Sửa
                                    </button>
                                    <form action="{{ route('admin.products.destroy', 1) }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa mẫu hoa này khỏi hệ thống?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-light rounded-pill px-3 py-1.5 shadow-sm hover-scale text-danger border-danger" title="Xóa">
                                            <i class="fa-solid fa-trash me-1"></i> Xóa
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!--  TAB 2: QUẢN LÝ DANH MỤC  -->
    <div class="tab-pane fade" id="categories-pane" role="tabpanel" aria-labelledby="categories-tab">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <p class="small mb-0" style="color: rgba(255, 255, 255, 0.85) !important;">Quản lý các nhóm hoa tươi (Hoa Sinh Nhật, Khai Trương, Tình Yêu...)</p>
            <button type="button" class="btn btn-sm btn-primary px-4 py-2 fw-bold shadow-sm rounded-pill" data-bs-toggle="modal" data-bs-target="#categoryModal" onclick="resetCategoryForm()">
                <i class="fa-solid fa-plus me-1"></i> Thêm Danh Mục Mới
            </button>
        </div>

        <div class="card border-0 shadow-none bg-transparent p-0">
            <div class="table-responsive">
                <table class="table align-middle">
                    <thead>
                        <tr class="small border-bottom">
                            <th style="width: 80px; color: #38bdf8 !important;">STT</th>
                            <th style="color: #38bdf8 !important;">TÊN DANH MỤC</th>
                            <th style="color: #38bdf8 !important;">MÔ TẢ</th>
                            <th class="text-end" style="width: 180px; color: #38bdf8 !important;">THAO TÁC</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong style="color: #ffffff !important;">#1</strong></td>
                            <td><strong style="color: #ffffff !important;">Hoa Sinh Nhật</strong></td>
                            <td class="small" style="color: rgba(255, 255, 255, 0.85) !important;">Các mẫu hoa chúc mừng sinh nhật sang trọng, tươi thắm.</td>
                            <td class="text-end">
                                <div class="d-flex justify-content-end gap-1">
                                    <button class="btn btn-sm btn-outline-light px-3 rounded-pill" data-bs-toggle="modal" data-bs-target="#categoryModal" onclick="editCategory(1, 'Hoa Sinh Nhật', 'Các mẫu hoa chúc mừng sinh nhật sang trọng, tươi thắm.')">
                                        <i class="fa-solid fa-pen-to-square me-1"></i> Sửa
                                    </button>
                                    <form action="{{ route('admin.categories.destroy', 1) }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa danh mục này?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-light px-3 rounded-pill text-danger border-danger">
                                            <i class="fa-solid fa-trash me-1"></i> Xóa
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><strong style="color: #ffffff !important;">#2</strong></td>
                            <td><strong style="color: #ffffff !important;">Hoa Khai Trương</strong></td>
                            <td class="small" style="color: rgba(255, 255, 255, 0.85) !important;">Kệ hoa, lẵng hoa mừng khai trương may mắn, phát tài.</td>
                            <td class="text-end">
                                <div class="d-flex justify-content-end gap-1">
                                    <button class="btn btn-sm btn-outline-light px-3 rounded-pill" data-bs-toggle="modal" data-bs-target="#categoryModal" onclick="editCategory(2, 'Hoa Khai Trương', 'Kệ hoa, lẵng hoa mừng khai trương may mắn, phát tài.')">
                                        <i class="fa-solid fa-pen-to-square me-1"></i> Sửa
                                    </button>
                                    <form action="{{ route('admin.categories.destroy', 2) }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa danh mục này?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-light px-3 rounded-pill text-danger border-danger">
                                            <i class="fa-solid fa-trash me-1"></i> Xóa
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!--  MODAL 1: THÊM / SỬA SP  -->
<div class="modal fade" id="productModal" tabindex="-1" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content rounded-4 border-0 p-4 shadow-lg bg-white">
            <div class="modal-header border-0 pb-2">
                <div class="d-flex align-items-center gap-2">
                    <div class="rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px; background-color: rgba(2, 132, 199, 0.1);">
                        <i class="fa-solid fa-spa" style="color: #0284c7;"></i>
                    </div>
                    <h5 class="modal-title fw-bold mb-0 text-dark" id="prodModalTitle">Thêm Mẫu Hoa Mới</h5>
                </div>
                <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" id="productForm">
                @csrf
                <input type="hidden" name="_method" id="prodFormMethod" value="POST">
                
                <div class="modal-body pt-3">
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-dark">Tên mẫu hoa <span class="text-danger">*</span></label>
                        <input type="text" name="name" id="prodName" class="form-control rounded-pill px-4 py-2.5 bg-light border-0 shadow-none text-dark" placeholder="Nhập tên sản phẩm hoa..." required>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label small fw-bold text-dark">Danh mục <span class="text-danger">*</span></label>
                            <select name="category_id" id="prodCat" class="form-select rounded-pill px-4 py-2.5 bg-light border-0 shadow-none text-dark" required>
                                <option value="">-- Chọn danh mục --</option>
                                <option value="1">Hoa Sinh Nhật</option>
                                <option value="2">Hoa Khai Trương</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-bold text-dark">Giá bán (VNĐ) <span class="text-danger">*</span></label>
                            <input type="number" name="price" id="prodPrice" class="form-control rounded-pill px-4 py-2.5 bg-light border-0 shadow-none text-dark" placeholder="Ví dụ: 7900000" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label small fw-bold text-dark">Hình ảnh sản phẩm</label>
                        <input type="file" name="image" class="form-control rounded-pill px-4 py-2 bg-light border-0 shadow-none text-dark">
                        <small class="text-muted mt-1 d-block ps-2">Định dạng hỗ trợ: JPG, PNG, WEBP (Tối đa 2MB)</small>
                    </div>

                    <div class="mb-2">
                        <label class="form-label small fw-bold text-dark">Mô tả chi tiết sản phẩm</label>
                        <textarea name="description" id="prodDesc" class="form-control rounded-4 p-3 bg-light border-0 shadow-none text-dark" rows="3" placeholder="Nhập thành phần hoa, ý nghĩa, thông điệp..."></textarea>
                    </div>
                </div>

                <div class="modal-footer border-0 pt-3">
                    <button type="button" class="btn btn-light rounded-pill px-4 py-2 fw-semibold text-secondary shadow-sm" data-bs-dismiss="modal">Hủy bỏ</button>
                    <button type="submit" class="btn btn-primary rounded-pill px-5 py-2 text-white fw-bold shadow-sm">
                        Lưu Thay Đổi
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!--  MODAL 2: THÊM / SỬA DANH MỤC  -->
<div class="modal fade" id="categoryModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4 border-0 p-3 shadow-lg bg-white">
            <div class="modal-header border-0 pb-0">
                <h5 class="modal-title fw-bold text-dark" id="catModalTitle">Thêm Danh Mục Mới</h5>
                <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.categories.store') }}" method="POST" id="categoryForm">
                @csrf
                <input type="hidden" name="_method" id="catFormMethod" value="POST">
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label small fw-semibold text-dark">Tên danh mục <span class="text-danger">*</span></label>
                        <input type="text" name="name" id="catName" class="form-control px-3 py-2 bg-light border-0 shadow-none text-dark rounded-pill" placeholder="Nhập tên danh mục hoa" required>
                    </div>

                    <div class="mb-2">
                        <label class="form-label small fw-semibold text-dark">Mô tả ngắn</label>
                        <textarea name="description" id="catDesc" class="form-control p-3 bg-light border-0 shadow-none text-dark rounded-4" rows="3" placeholder="Nhập mô tả cho danh mục..."></textarea>
                    </div>
                </div>
                <div class="modal-footer border-0 pt-0">
                    <button type="button" class="btn btn-sm btn-outline-secondary px-4 rounded-pill shadow-sm" data-bs-dismiss="modal">Hủy bỏ</button>
                    <button type="submit" class="btn btn-sm btn-primary px-4 fw-bold rounded-pill shadow-sm">Lưu Thay Đổi</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .hover-scale {
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }
    .hover-scale:hover {
        transform: translateY(-2px);
    }
    .table-hover tbody tr:hover {
        background-color: rgba(255, 255, 255, 0.06) !important;
    }
    .nav-pills .nav-link.active {
        background: rgba(56, 189, 248, 0.3) !important;
        border-color: rgba(56, 189, 248, 0.7) !important;
    }
</style>
@endpush

@push('scripts')
<script>
    // Form Sản Phẩm
    function resetProductForm() {
        document.getElementById('prodModalTitle').innerText = 'Thêm Mẫu Hoa Mới';
        document.getElementById('productForm').action = "{{ route('admin.products.store') }}";
        document.getElementById('prodFormMethod').value = 'POST';
        document.getElementById('productForm').reset();
    }

    function editProduct(id, name, catId, price, description) {
        document.getElementById('prodModalTitle').innerText = 'Chỉnh Sửa Mẫu Hoa #' + id;
        document.getElementById('productForm').action = "/admin/products/" + id;
        document.getElementById('prodFormMethod').value = 'PUT';
        document.getElementById('prodName').value = name;
        document.getElementById('prodCat').value = catId;
        document.getElementById('prodPrice').value = price;
        document.getElementById('prodDesc').value = description;
    }

    // Form Danh Mục
    function resetCategoryForm() {
        document.getElementById('catModalTitle').innerText = 'Thêm Danh Mục Mới';
        document.getElementById('categoryForm').action = "{{ route('admin.categories.store') }}";
        document.getElementById('catFormMethod').value = 'POST';
        document.getElementById('categoryForm').reset();
    }

    function editCategory(id, name, description) {
        document.getElementById('catModalTitle').innerText = 'Chỉnh Sửa Danh Mục #' + id;
        document.getElementById('categoryForm').action = "/admin/categories/" + id;
        document.getElementById('catFormMethod').value = 'PUT';
        document.getElementById('catName').value = name;
        document.getElementById('catDesc').value = description;
    }
</script>
@endpush