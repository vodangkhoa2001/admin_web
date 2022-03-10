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
                <p class="card-description">
                    tài khoản 
                </p>
                <form class="forms-sample" enctype="multipart/form-data" action="{{route("editTaiKhoanUser")}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputName1">ID</label>
                    <input type="text" class="form-control" id="exampleInputName1" value="{{$account->id}}" disabled >
                    <input type="hidden" class="form-control" id="exampleInputName1" value="{{$account->id}}" name="id">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Tên Đăng Nhập</label>
                        <input type="hidden" class="form-control" id="exampleInputName1" value="{{$account->TenDangNhap}}" name="TenDangNhap">
                        <input type="text" class="form-control" id="exampleInputName1" placeholder="Tên Đăng Nhập" value="{{$account->TenDangNhap}}" name="TenDangNhap" disabled>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Email</label>
                        <input type="email" class="form-control" id="exampleInputName1" placeholder="Email" value="{{$account->Email}}" name="Email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Số Điện Thoại</label>
                        <input type="text" class="form-control" id="exampleInputName1" placeholder="Số Điện Thoại" value="{{$account->SDT}}" name="SDT">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Địa Chỉ</label>
                        <input type="text" class="form-control" id="exampleInputName1" placeholder="Địa Chỉ" value="{{$account->DiaChi}}" name="DiaChi">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Họ Tên</label>
                        <input type="text" class="form-control" id="exampleInputName1" placeholder="Họ Tên" value="{{$account->HoTen}}" name="HoTen">
                    </div>
                    <div>
                        <label class="col-sm-10">Ảnh đại diện</label>   
                    </div>
                    <div class="form-group">
                       <img src="{{asset('admin/images')}}/{{$account->HinhAnh}}" style="width:130px ;height:130px;background-size:cover">
                    </div>
                    <div class="form-group">
                        <label class="col-sm-10">Ảnh đại diện</label>
                        <div class="col-sm-10">
                            <input class="input-file" id="my-file" type="file" name="HinhAnh">
                            <label tabindex="0" for="my-file" class="input-file-trigger"></label>
                        </div>
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
