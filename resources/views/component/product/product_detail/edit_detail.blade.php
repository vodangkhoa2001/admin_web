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
            <h4 class="card-title">Chỉnh sửa chi tiết sản phẩm</h4>
            <form class="forms-sample" action="{{ route('ctsp.update',['ctsp'=>$ctsp])}}" method="post"
                enctype="multipart/form-data"> @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="exampleInputName1">Màu sắc</label>
                    <input name="mausac" type="text" class="form-control" placeholder="Màu sắc"
                        value="{{ $ctsp->MauSac}}">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect2">RAM</label>
                    <select class="form-control" name='ram'>
                        <option value='1'>4GB</option>
                        <option value='2'>8GB</option>
                        <option value='3'>16GB</option>
                        <option value='4'>32GB</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect3">Ổ Cứng</label>
                    <select class="form-control" name="ocung">
                        <option value='1'>SSD</option>
                        <option value='2'>HDD</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">Màn hình</label>
                    <input name="mausac" type="text" class="form-control" placeholder="Màu sắc"
                        value="{{ $ctsp->MauSac}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">Card đồ họa</label>
                    <input name="mausac" type="text" class="form-control" placeholder="Màu sắc"
                        value="{{ $ctsp->MauSac}}">
                </div>
                <div class="form-group">
                    <label for="exampleTextarea1">Mô tả</label>
                    <textarea name="mota" class="form-control" rows="10"
                        style="height:100px;">{{ $sanPham->MoTa}}</textarea>
                </div>
                <div class="form-group mt-4">
                    <button type="submit" class="btn btn-primary me-2">Cập nhật</button>
                    <button href="{{route('ctsp.show')}}" class="btn btn-light">Quay lại</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection