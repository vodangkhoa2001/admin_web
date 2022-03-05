{{-- Kế thừa từ layout.app --}}
@extends('layouts.app')
@section('content')
<h1 class="text-center">Thông tin ổ cứng </h1>
<h2 style="display:flex;justify-content:space-between;width:200px;"><a href="{{route('oCung.edit',$oCung->id)}}"><button class="btn btn-primary" type="submit">Sửa</button></a>
</h2>
<form class="d-flex flex-column">
    <label><strong>Mã ổ cứng: </strong> {{ $oCung->id }} </label>  <br />
    <label><strong>Tên ổ cứng: </strong> {{ $oCung->TenOCung }} </label>  <br />
    <label><strong>Trạng thái: </strong> @if ( $oCung->TrangThai==0) Ngừng kinh doanh @endif @if ( $oCung->TrangThai==1) Kinh doanh @endif</label>  <br />
    <div class="form-group mt-4">
        <a href="{{route('OCung.index')}}" class="btn btn-warning">Quay lại</a>
    </div>
</form>

@endsection