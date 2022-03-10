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
                <h4 class="card-title">Tài Khoản </h4>
                @if ( Session::has('success') )
                <div class="alert alert-success alert-dismissible" role="alert">
                    <strong>{{ Session::get('success') }}</strong>
            
                </div>
            @endif
            @if ( Session::has('error') )
            <div class="alert alert-success alert-dismissible" role="alert">
                <strong>{{ Session::get('error') }}</strong>
        
            </div>
        @endif
                <p class="card-description">
                    tài khoản 
                </p>
                <form class="forms-sample"  action="{{route("admin-accounts-changePassword")}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputName1">ID</label>
                    <input type="text" class="form-control" id="exampleInputName1" value="{{Auth::User()->id}}" disabled >
                    <input type="hidden" class="form-control" id="exampleInputName1" value="{{Auth::User()->id}}" name="id">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Tên Đăng Nhập</label>
                        <input type="hidden" class="form-control" id="exampleInputName1" value="" name="TenDangNhap">
                        <input type="text" class="form-control" id="exampleInputName1" placeholder="Tên Đăng Nhập" value="{{Auth::User()->TenDangNhap}}" name="TenDangNhap" disabled>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Mật Khẩu Cũ</label>
                        <input type="password" class="form-control" id="exampleInputName1" placeholder="Mật Khẩu Cũ" value="" name="MatKhauCu">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Mật Khẩu Mới</label>
                        <input type="password" class="form-control" id="exampleInputName1" placeholder="Mật Khẩu Mới" value="" name="MatKhauMoi">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Xác Nhận Mật Khẩu Mới</label>
                        <input type="password" class="form-control" id="exampleInputName1" placeholder="Xác Nhận Mật Khẩu Mới" value="" name="XacNhanMatKhau">
                    </div>
                    
                    <div class="form-group mt-4">
                        <button type="submit" class="btn btn-primary me-2">Lưu</button>
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
