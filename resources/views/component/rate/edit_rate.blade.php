@extends('layouts.app')
@section('title', 'Edit Rate')

@section('navbar')
@parent
@endsection

@section('slidebar')
@parent
@endsection
@section('script')
@parent
@endsection
@section('content')

<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Cập nhật trạng thái đánh giá</h4>
            <form class="forms-sample" action="{{ route('rate.update',$rate->id)}}" method="post"
                enctype="multipart/form-data"> @csrf
                @method('PATCH')
                <div class="form-group">
                    <label >ID</label>
                    <input disabled name="id" type="text" class="form-control"
                        value="{{ $rate->id}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">Tên sản phẩm</label>
                    @foreach ($sanPham as $sanpham)
                        @if ($sanpham->id==$rate->MaSanPham)
                            <input disabled name="tensanpham" type="text" class="form-control" placeholder=" Product Name"
                            value="{{ $sanpham->TenSanPham}}">
                        @endif
                    @endforeach
                </div>
                {{-- <div class="form-group">
                    <label for="exampleInputName1">Tài khoản</label>
                    @foreach ($taiKhoan as $taikhoan)
                        @if ($taikhoan->id==$rate->MaTaiKhoan)
                            <input disabled name="tentaikhoan" type="text" class="form-control" placeholder=" Product Name"
                            value="{{ $taikhoan->TenDangNhap}}">
                        @endif
                    @endforeach
                </div> --}}
                <div class="form-group">
                    <label>Số sao</label>
                    <input disabled name="sosao" value="{{ $rate->SoSao }}" type="number"
                        class="form-control form-control-sm" placeholder="Amount" aria-label="Amount">
                </div>
                <div class="form-group">
                    <label for="exampleTextarea1">Nội  dung đánh giá</label>
                    <textarea disabled name="noidung" value="{{ old('noidung') }}"class="form-control" rows="10"
                        style="height:100px;">{{ $rate->NoiDung}}</textarea>
                </div>
                <div class="form-group">
                    <label for="exampleTextarea1">Trả lời đánh giá</label>
                    <textarea name="traloidanhgia" value="{{ old('traloidanhgia') }}"class="form-control" rows="10"
                        style="height:100px;">{{ $rate->TraLoi}}</textarea>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect">Tình trạng</label>
                    <select class="form-control" name="trangthai">
                        @if ( $rate->TrangThai==1)
                            <option value="1" checked> Hoạt động</option>
                            <option value="0"> Ngừng hoạt động</option>
                        @endif
                        @if ( $rate->TrangThai==0)
                            <option value="0" checked> Ngừng hoạt động</option>
                            <option value="1"> Hoạt động</option>
                        @endif
                    </select>
                </div>
                <div class="form-group mt-4">
                    <button type="submit" class="btn btn-primary me-2">Cập nhật</button>
                    <a href="{{route('rate.index')}}" class="btn btn-warning">Quay lại</a>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection