{{-- Kế thừa từ layout.app --}}
@extends('layouts.app')
@section('content')
<h1 class="text-center">Thông tin RAM </h1>
<h2 style="display:flex;justify-content:space-between;width:200px;"><a href="{{route('ram.edit',$ram->id)}}"><button class="btn btn-primary" type="submit">Sửa</button></a>
</h2>
<form class="d-flex flex-column">
    <label><strong>Mã Ram: </strong> {{ $ram->id }} </label>  <br />
    <label><strong>Tên RAM: </strong> {{ $ram->TenRam }} </label>  <br />
    <label><strong>Trạng thái: </strong> @if ( $ram->TrangThai==0) Ngừng kinh doanh @endif @if ( $ram->TrangThai==1) Kinh doanh @endif</label>  <br />
</form>

@endsection