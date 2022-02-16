@extends('layouts.app')

@section('title', 'Create Account')

@section('navbar')
    @parent
@endsection

@section('slidebar')
    @parent
@endsection

@section('content')

    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Tạo Tài Khoản Admin</h4>
                <p class="card-description ">
                    {{-- <span>{{ Session::get('error') }}</span> --}}

                    @if ( Session::has('error') )
	<div class="alert alert-danger alert-dismissible" role="alert">
		<strong>{{ Session::get('error') }}</strong>
		
	</div>
@endif
                </p>
                <form class="forms-sample" enctype="multipart/form-data" action="{{route("admin-accounts-addAccount")}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputName1">ID</label>
                    <input type="text" class="form-control" id="exampleInputName1" value="{{$finalId}}" disabled >
                    <input type="hidden" class="form-control" id="exampleInputName1" value="{{$finalId}}" name="id">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Tên Đăng Nhập</label>
                        <input type="text" class="form-control" id="exampleInputName1" placeholder="Tên Đăng Nhập" name="TenDangNhap">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Email</label>
                        <input type="email" class="form-control" id="exampleInputName1" placeholder="Email" name="Email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Số Điện Thoại</label>
                        <input type="text" class="form-control" id="exampleInputName1" placeholder="Số Điện Thoại" name="SDT">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Địa Chỉ</label>
                        <input type="text" class="form-control" id="exampleInputName1" placeholder="Địa Chỉ" name="DiaChi">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Họ Tên</label>
                        <input type="text" class="form-control" id="exampleInputName1" placeholder="Họ Tên" name="HoTen">
                    </div>

                    <div class="form-group">
                        <label class="col-sm-10">Ảnh đại diện</label>
                        <div class="col-sm-10">
                            <input class="input-file" id="my-file" type="file" name="HinhAnh">
                            <label tabindex="0" for="my-file" class="input-file-trigger"></label>
                        </div>
                    </div>
                    <div class="form-group mt-4">
                        <button type="submit" class="btn btn-primary me-2">Tạo</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
@parent
@endsection
