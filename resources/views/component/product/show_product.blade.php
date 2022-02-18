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
    {{-- <label>Dòng sản phẩm: {{ $sanPham->dongSanPham->TenDongSanPham}}</label> <br />
    <label>Nhà sản xuất: {{ $sanPham->nhaSanXuat->TenNhaSanXuat }}</label> <br /> --}}
    <label><strong>Mô tả: </strong> {{ $sanPham->MoTa }}</label> <br />
    <label><strong>Số lượng: </strong> {{ $sanPham->SoLuong }}</label> <br />
    <label><strong>Giá nhập: </strong> {{ $sanPham->GiaNhap }}</label> <br />
    <label><strong>Giá bán: </strong> {{ $sanPham->GiaBan }}</label> <br />
    <div class="form-group row">
        <label><strong>Ảnh sản phẩm</strong></label>
        <img class="img-thumbnail" style="width:250px;max-height:250px;object-fit:contain;margin:17px;"
            src="{{ asset('product/images')}}/{{ $sanPham->HinhAnh }}">
    </div>
</form>

@endsection