{{-- Kế thừa từ layout.app --}}
@extends('layouts.app')
@section('content')
<h1 class="text-center">Thông tin nhà sản xuất </h1>
<h2 style="display:flex;justify-content:space-between;width:200px;"><a href="{{route('manufacturer.edit',$manufacturer->id)}}"><button class="btn btn-primary" type="submit">Sửa</button></a>
</h2>
<form class="d-flex flex-column">
    <label><strong>Mã nhà sản xuất: </strong> {{ $manufacturer->id }} </label>  <br />
    <label><strong>Tên nhà sản xuất: </strong> {{ $manufacturer->TenNhaSanXuat }} </label>  <br />
    <label><strong>Số điện thoại: </strong> {{ $manufacturer->SDT_NhaSanXuat }} </label>  <br />
    <label><strong>Địa chỉ: </strong> {{ $manufacturer->DiaChiNhaSanXuat }} </label>  <br />
    <label><strong>Email nhà sản xuất: </strong> {{ $manufacturer->EmailNhaSanXuat }} </label>  <br />
    <label><strong>Số FAX: </strong> {{ $manufacturer->Fax }} </label>  <br />
    <label><strong>Trạng thái: </strong> @if ( $manufacturer->TrangThai_NhaSanXuat==0) Ngừng kinh doanh @endif @if ( $manufacturer->TrangThai_NhaSanXuat==1) Kinh doanh @endif</label>  <br />
    <div class="form-group mt-4">
        <a href="{{route('manufacturer.index')}}" class="btn btn-warning">Quay lại</a>
    </div>
</form>

@endsection