{{-- Kế thừa từ layout.app --}}
@extends('layouts.app')
@section('content')
<h1 class="text-center">Thông tin màu sắc </h1>
<h2 style="display:flex;justify-content:space-between;width:200px;"><a href=""><button class="btn btn-primary" type="submit">Sửa</button></a>
</h2>
<form method="POST" action="">@csrf @method('DELETE')
    <button class="btn btn-danger" type="submit">Xóa</button>
</form>
<form class="d-flex flex-column">
    <label><strong>Mã màu sắc: </strong> {{ $lstMauSac->id }} </label>  <br />
    <label><strong>Tên màu sắc: </strong> {{ $lstMauSac->TenMau }} </label>  <br />
</form>

@endsection