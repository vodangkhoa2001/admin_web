{{-- Kế thừa từ layout.app --}}
@extends('layouts.app')
@section('content')
<h1 class="text-center">Thông tin băng ron </h1>
<h2 style="display:flex;justify-content:space-between;width:200px;"><a href="{{route('banner.edit',$banner->id)}}"><button class="btn btn-primary" type="submit">Sửa</button></a>
</h2>
<form method="POST" action="{{ route('banner.destroy',$banner->id)}}">@csrf @method('DELETE')
    <button class="btn btn-danger" type="submit">Xóa</button>
</form>
<form class="d-flex flex-column">
    <div class="form-group row">
        <img class="img-thumbnail" style="width:1000px;max-height:500px;object-fit:contain;margin:17px;"
            src="{{ asset('images/banner')}}/{{ $banner->HinhAnh }}">
    </div>
    <label><strong>Mã băng ron: </strong> {{ $banner->id }} </label>  <br />
    <label><strong>Tên băng ron: </strong> {{ $banner->TenBanner }} </label>  <br />
    <label><strong>Tên băng ron: </strong> {{ $banner->MoTa }} </label>  <br />
    <label><strong>Trạng thái: </strong> @if ( $banner->TrangThai==0) Ngừng hoạt động @endif @if ( $banner->TrangThai==1) Hoạt động @endif</label>  <br />
    <div class="form-group mt-4">
        <a href="{{route('banner.index')}}" class="btn btn-warning">Quay lại</a>
    </div>
</form>

@endsection