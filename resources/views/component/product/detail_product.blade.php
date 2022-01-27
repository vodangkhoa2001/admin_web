{{-- Kế thừa từ layout.app --}}
@extends('layouts.app')
@section('content')
<h1 class="text-center">Chi tiết sản phẩm </h1>
<h2><a href="{{ route('sanPham.edit',['sanPham'=>$sanPham]) }}">Sửa</a></h2>
<form method="POST" action="{{ route('sanPham.destroy',['sanPham'=>$sanPham])}}">@csrf @method('DELETE')
    <button class="btn btn-danger" type="submit">Xóa</button>
</form>
<label>Tên sản phẩm: </label>{{ $sanPham->TenSanPham }} <br />
{{-- <label>Dòng sản phẩm: </label>{{ $sanPham->dongSanPham->TenDongSanPham }} <br />
<label>Nhà sản xuất: </label>{{ $sanPham->nhaSanXuat->TenNhaSanXuat }} <br /> --}}
<label>Mô tả: </label>
<p> {{ $sanPham->MoTa }} </p> <br />
<label>Số lượng: </label>{{ $sanPham->SoLuong }} <br />
<label>Giá Nhập: </label>{{ $sanPham->GiaNhap }} <br />
<label>Giá Bán: </label>{{ $sanPham->GiaBan }} <br />
<label>Hình: </label><br />
<img class="img-thumbnail" style="width:100px;max-height:100px;object-fit:contain" src="{{ $sanPham->HinhAnh }}"><br />
@endsection