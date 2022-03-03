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
            <h4 class="card-title">Chỉnh sửa màu sắc</h4>
            <form class="forms-sample" action="{{ route('update-color',['id' =>$lstMauSac->id])}}" method="post"
                enctype="multipart/form-data"> @csrf
                @method('PATCH')
                <div class="form-group">
                    <label >Mã màu</label>
                    <input disable name="id" type="text" class="form-control"
                        value="{{ $lstMauSac->id}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">Tên màu sắc</label>
                    <input name="tenmausac" type="text" class="form-control" placeholder="Product Name"
                        value="{{ $lstMauSac->TenMau}}">
                </div>
                <div class="form-group">
                    <div class="form-check form-check-primary">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" checked>
                            Hoạt động
                        </label>
                    </div>
                </div>
                <div class="form-group mt-4">
                    <button type="submit" class="btn btn-primary me-2">Cập nhật</button>
                    <button href="{{route('list-color')}}" class="btn btn-light">Quay lại</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection