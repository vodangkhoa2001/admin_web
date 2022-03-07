@extends('layouts.app')
@section('title', 'Edit Product')

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
            <h4 class="card-title">Chỉnh sửa thương hiệu</h4>
            <form class="forms-sample" action="{{ route('type.update',$type->id)}}" method="post"
                enctype="multipart/form-data"> @csrf
                @method('PATCH')
                <div class="form-group">
                    <label >Mã thương hiệu</label>
                    <input disabled name="id" type="text" class="form-control"
                        value="{{ $type->id}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">Tên thương hiệu</label>
                    <input name="tendongsanpham" type="text" class="form-control" placeholder="Type Name"
                        value="{{ $type->TenDongSanPham}}">
                    @if ($errors->any())
                        <div style="margin-top:5px" class="alert alert-danger ">
                            @if($errors->has('tendongsanpham')) <h6>{{ $errors->first('tendongsanpham')}}</h6>@endif
                        </div>
                    @endif
                </div>
                
                <div class="form-group">
                    <label for="exampleFormControlSelect">Tình trạng</label>
                    <select class="form-control" name="trangthai">
                        @if ( $type->TrangThai_DongSanPham==1)
                            <option value="1" checked> Kinh doanh</option>
                            <option value="0"> Ngừng kinh doanh</option>
                        @endif
                        @if ( $type->TrangThai_DongSanPham==0)
                            <option value="0" checked> Ngừng kinh doanh</option>
                            <option value="1"> Kinh doanh</option>
                        @endif
                    </select>
                </div>
                <div class="form-group mt-4">
                    <button type="submit" class="btn btn-primary me-2">Cập nhật</button>
                    <a href="{{route('type.index')}}" class="btn btn-warning">Quay lại</a>
                </div>
            </form>
           
        </div>
    </div>
</div>
@endsection