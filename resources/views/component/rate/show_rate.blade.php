{{-- Kế thừa từ layout.app --}}
@extends('layouts.app')
@section('content')
<h1 class="text-center">Thông tin đánh giá </h1>
<h2 style="display:flex;justify-content:space-between;width:200px;"><a href="{{route('rate.edit',$rate->id)}}"><button class="btn btn-primary" type="submit">Sửa</button></a>
</h2>
<form class="d-flex flex-column">
    <label><strong>ID: </strong> {{ $rate->id }} </label>  <br />
    <label><strong>Tên sản phẩm: </strong> {{ $rate->sanPham->TenSanPham }} </label>  <br />
    <label><strong>Tên tài khoản: </strong> {{ $rate->taiKhoan->TenDangNhap }} </label>  <br />
    <label><strong>Số sao: </strong> {{ $rate->SoSao }} </label>  <br />
    <label><strong>Nội dung đánh giá: </strong> {{ $rate->NoiDung }} </label>  <br />
    <label><strong>Trả lời đánh giá: </strong> @if ($rate->TraLoi==null)
        Chưa trả lời đánh giá
    @else
    {{ $rate->TraLoi }} 
    @endif</label>  <br />
    <label><strong>Trạng thái: </strong> @if ( $rate->TrangThai==0) Ngừng hoạt động @endif @if ( $rate->TrangThai==1) Hoạt động @endif</label>  <br />
    <div class="form-group mt-4">
        <a href="{{route('rate.index')}}" class="btn btn-warning">Quay lại</a>
    </div>
</form>

@endsection