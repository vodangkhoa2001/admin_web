{{-- Kế thừa từ layout.app --}}
@extends('layouts.app')
@section('content')
<h1 class="text-center">Thông tin tỉ lệ màn hình </h1>
<h2 style="display:flex;justify-content:space-between;width:200px;"><a href="{{route('monitor.edit',$monitor->id)}}"><button class="btn btn-primary" type="submit">Sửa</button></a>
</h2>
<form class="d-flex flex-column">
    <label><strong>Mã màn hình: </strong> {{ $monitor->id }} </label>  <br />
    <label><strong>Tên màn hình: </strong> {{ $monitor->TenManHinh }} </label>  <br />
    <label><strong>Trạng thái: </strong> @if ( $monitor->TrangThai==0) Ngừng kinh doanh @endif @if ( $monitor->TrangThai==1) Kinh doanh @endif</label>  <br />
</form>

@endsection