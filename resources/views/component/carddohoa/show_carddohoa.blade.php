{{-- Kế thừa từ layout.app --}}
@extends('layouts.app')
@section('content')
<h1 class="text-center">Thông tin Card đồ họa </h1>
<h2 style="display:flex;justify-content:space-between;width:200px;"><a href="{{route('carddohoa.edit',$carddohoa->id)}}"><button class="btn btn-primary" type="submit">Sửa</button></a>
</h2>
<form class="d-flex flex-column">
    <label><strong>Mã Card đồ họa: </strong> {{ $carddohoa->id }} </label>  <br />
    <label><strong>Tên Card đồ họa: </strong> {{ $carddohoa->TenCardDoHoa }} </label>  <br />
    <label><strong>Trạng thái: </strong> @if ( $carddohoa->TrangThai==0) Ngừng kinh doanh @endif @if ( $carddohoa->TrangThai==1) Kinh doanh @endif</label>  <br />
    <div class="form-group mt-4">
        <a href="{{route('carddohoa.index')}}" class="btn btn-warning">Quay lại</a>
    </div>
</form>

@endsection