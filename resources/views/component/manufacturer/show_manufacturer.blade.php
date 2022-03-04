{{-- Kế thừa từ layout.app --}}
@extends('layouts.app')
@section('content')
<h1 class="text-center">Thông tin nhà sản xuất </h1>
<h2 style="display:flex;justify-content:space-between;width:200px;"><a href="{{route('manufacturer.edit',$manufacturer->id)}}"><button class="btn btn-primary" type="submit">Sửa</button></a>
</h2>
<form class="d-flex flex-column">
    <label><strong>Mã nhà sản xuất: </strong> {{ $manufacturer->id }} </label>  <br />
    <label><strong>Tên nhà sản xuất: </strong> {{ $manufacturer->TenNhaSanXuat }} </label>  <br />
    <label><strong>Trạng thái: </strong> @if ( $manufacturer->TrangThai_NhaSanXuat==0) Ngừng kinh doanh @endif @if ( $manufacturer->TrangThai_NhaSanXuat==1) Kinh doanh @endif</label>  <br />
</form>

@endsection