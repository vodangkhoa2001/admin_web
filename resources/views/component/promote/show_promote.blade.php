{{-- Kế thừa từ layout.app --}}
@extends('layouts.app')
@section('content')
<h1 class="text-center">Thông tin sản phẩm khuyến mãi</h1>
<h2 style="display:flex;justify-content:space-between;width:200px;"><a href="{{ route('promote.edit',$promote->id) }}"><button class="btn btn-primary" type="submit">Sửa</button></a>
</h2>
<form method="POST" action="{{ route('promote.destroy',$promote->id)}}">@csrf @method('DELETE')
    <button class="btn btn-danger" type="submit">Xóa</button>
</form>
<form class="d-flex flex-column">
    <label><strong>Tên sản phẩm khuyến mãi:</strong> {{ $promote->sanPham->TenSanPham }} </label>  <br />
    <label><strong>Đơn giá giá khuyến mãi: </strong> {{ number_format(( $promote->DonGiaKhuyenMai), 0, ',', '.')." VNĐ"}}</label> <br />
    <label><strong>Số lượng khuyến mãi: </strong> {{ $promote->SoLuongKhuyenMai }}</label> <br />
    <label><strong>Ngày bắt đầu: </strong> {{ $promote->NgayBatDau}}</label> <br />
    <label><strong>Ngày kết thúc: </strong> {{ $promote->NgayKetThuc }}</label> <br />
    <label><strong>Mô tả: </strong> {{ $promote->MoTa }}</label> <br />
    <div class="form-group mt-4">
        <a href="{{route('promote.index')}}" class="btn btn-warning"><span style="font-size: 17px;" class="menu-icon mdi mdi-keyboard-return"></a>
    </div>
</form>

@endsection