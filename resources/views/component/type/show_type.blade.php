{{-- Kế thừa từ layout.app --}}
@extends('layouts.app')
@section('content')
<h1 class="text-center">Thông tin thương hiệu </h1>
<h2 style="display:flex;justify-content:space-between;width:200px;"><a href="{{route('type.edit',$type->id)}}"><button class="btn btn-primary" type="submit">Sửa</button></a>
</h2>
<form class="d-flex flex-column">
    <label><strong>Mã thương hiệu: </strong> {{ $type->id }} </label>  <br />
    <label><strong>Tên thương hiệu: </strong> {{ $type->TenDongSanPham }} </label>  <br />
    <label><strong>Trạng thái: </strong> @if ( $type->TrangThai_DongSanPham==0) Ngừng kinh doanh @endif @if ( $type->TrangThai_DongSanPham==1) Kinh doanh @endif</label>  <br />
    <div class="form-group mt-4">
        <a href="{{route('type.index')}}" class="btn btn-warning">Quay lại</a>
    </div>
</form>

@endsection