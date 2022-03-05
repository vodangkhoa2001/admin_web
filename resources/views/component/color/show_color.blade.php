{{-- Kế thừa từ layout.app --}}
@extends('layouts.app')
@section('content')
<h1 class="text-center">Thông tin màu sắc </h1>
<h2 style="display:flex;justify-content:space-between;width:200px;"><a href="{{route('color.edit',$mauSac->id)}}"><button class="btn btn-primary" type="submit">Sửa</button></a>
</h2>
<form class="d-flex flex-column">
    <label><strong>Mã màu sắc: </strong> {{ $mauSac->id }} </label>  <br />
    <label><strong>Tên màu sắc: </strong> {{ $mauSac->TenMau }} </label>  <br />
    <label><strong>Trạng thái: </strong> @if ( $mauSac->TrangThai==0) Ngừng kinh doanh @endif @if ( $mauSac->TrangThai==1) Kinh doanh @endif</label>  <br />
    <div class="form-group mt-4">
        <a href="{{route('color.index')}}" class="btn btn-warning">Quay lại</a>
    </div>
</form>

@endsection