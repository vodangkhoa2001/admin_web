{{-- Kế thừa từ layout.app --}}
@extends('layouts.app')
@section('content')
<h1 class="text-center">Thông tin sản phẩm </h1>
<h2 style="display:flex;justify-content:space-between;width:200px;"><a href="{{ route('sanPham.edit',['sanPham'=>$sanPham]) }}"><button class="btn btn-primary" type="submit">Sửa</button></a>
</h2>
<form method="POST" action="{{ route('sanPham.destroy',['sanPham'=>$sanPham])}}">@csrf @method('DELETE')
    <button class="btn btn-danger" type="submit">Xóa</button>
</form>
<form class="d-flex flex-column">
    <label><strong>Tên sản phẩm:</strong> {{ $sanPham->TenSanPham }} </label>  <br />
    <label><strong>Dòng sản phẩm: </strong> {{ $sanPham->dongSanPham->TenDongSanPham}}</label> <br />
    <label><strong>Nhà sản xuất: </strong>{{ $sanPham->nhaSanXuat->TenNhaSanXuat }}</label> <br />
    <label><strong>Số lượng: </strong> {{ $sanPham->SoLuong }}</label> <br />
    <label><strong>Giá nhập: </strong> {{ $sanPham->GiaNhap }}</label> <br />
    <label><strong>Giá bán: </strong> {{ $sanPham->GiaBan }}</label> <br />
    <label><strong>Màu sắc: </strong> {{ $sanPham->mauSac->TenMau }}</label> <br />
    <label><strong>Dung lượng RAM: </strong> {{ $sanPham->RAM->TenRam }}</label> <br />
    <label><strong>Card màn hình: </strong> {{ $sanPham->cardDoHoa->TenCardDoHoa }}</label> <br />
    <label><strong>Công nghệ CPU: </strong> {{ $sanPham->CPU->TenCPU }}</label> <br />
    <label><strong>Màn hình: </strong> {{ $sanPham->manHinh->TenManHinh }}</label> <br />
    <label><strong>Ổ cứng: </strong> {{ $sanPham->oCung->TenOCung }}</label> <br />
    <label><strong>Mô tả: </strong> {{ $sanPham->MoTa }}</label> <br />
    <label><strong>Trạng thái: </strong> @if ( $sanPham->TrangThai==0) Ngừng kinh doanh @endif @if ( $sanPham->TrangThai==1) Kinh doanh @endif</label>  <br />
    <div class="form-group row">
        <label><strong>Ảnh sản phẩm</strong></label>
        <img class="img-thumbnail" style="width:250px;max-height:250px;object-fit:contain;margin:17px;"
            src="{{ asset('product/images')}}/{{ $sanPham->HinhAnh }}">
    </div>
    <div class="form-group mt-4">
        <a href="{{route('sanPham.index')}}" class="btn btn-warning">Quay lại</a>
    </div>
</form>

@endsection