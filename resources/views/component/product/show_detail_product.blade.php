{{-- Kế thừa từ layout.app --}}
@extends('layouts.app')
@section('content')
<h1 class="text-center">Thông tin chi tiết sản phẩm </h1>
<form class="d-flex flex-column">
    <label><strong>Tên sản phẩm:</strong> {{ $sanPham->TenSanPham }} </label>  <br />
    <label><strong>Số lượng: </strong> {{ $sanPham->SoLuong }}</label> <br />
    <label><strong>Giá nhập: </strong> {{ $sanPham->GiaNhap }}</label> <br />
    <label><strong>Giá bán: </strong> {{ $sanPham->GiaBan }}</label> <br />
    <label><strong>Dòng sản phẩm: </strong> {{ $sanPham->MaDongSanPham}}</label> <br />
    <label><strong>Nhà sản xuất: </strong> {{ $sanPham->MaNhaSanXuat }}</label> <br />
    <label><strong>Màu sắc: </strong> {{ $sanPham->MaMau }}</label> <br />
    <label><strong>Dung lượng RAM: </strong> {{ $sanPham->MaRam }}</label> <br />
    <label><strong>Card màn hình: </strong> {{ $sanPham->MaCardDoHoa }}</label> <br />
    <label><strong>Công nghệ CPU: </strong> {{ $sanPham->MaCPU }}</label> <br />
    <label><strong>Màn hình: </strong> {{ $sanPham->MaManHinh }}</label> <br />
    <label><strong>Ổ cứng: </strong> {{ $sanPham->MaOCung }}</label> <br />
    <label><strong>Mô tả: </strong> {{ $sanPham->MoTa }}</label> <br />
    <div class="form-group row">
        <label><strong>Ảnh sản phẩm: </strong></label>
        <img class="img-thumbnail" style="width:250px;max-height:250px;object-fit:contain;margin:17px;"
            src="{{ asset('product/images')}}/{{ $sanPham->HinhAnh }}">
    </div>
    <div class="form-group mt-4">
        <button href="{{route('list-product')}}" class="btn btn-light">Quay lại</button>
    </div>
</form>

@endsection