{{-- Kế thừa từ layout.app --}}
@extends('layouts.app')
@section('content')
<h1 class="text-center">Thông tin CPU </h1>
<h2 style="display:flex;justify-content:space-between;width:200px;"><a href="{{route('cpu.edit',$cpu->id)}}"><button class="btn btn-primary" type="submit">Sửa</button></a>
</h2>
<form class="d-flex flex-column">
    <label><strong>Mã CPU: </strong> {{ $cpu->id }} </label>  <br />
    <label><strong>Tên CPU: </strong> {{ $cpu->TenCPU }} </label>  <br />
    <label><strong>Trạng thái: </strong> @if ( $cpu->TrangThai==0) Ngừng kinh doanh @endif @if ( $cpu->TrangThai==1) Kinh doanh @endif</label>  <br />
</form>

@endsection