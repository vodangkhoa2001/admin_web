@extends('layouts.app')
@section('title', 'Edit Manufacturer')

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
            <h4 class="card-title">Chỉnh sửa nhà sản xuất</h4>
            <form class="forms-sample" action="{{ route('manufacturer.update',$manufacturer->id)}}" method="post"
                enctype="multipart/form-data"> @csrf
                @method('PATCH')
                <div class="form-group">
                    <label >Mã nhà sản xuất</label>
                    <input disabled name="id" type="text" class="form-control"
                        value="{{ $manufacturer->id}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">Tên nhà sản xuất</label>
                    <input name="tennhasanxuat" type="text" class="form-control" placeholder="Product Name"
                        value="{{ $manufacturer->TenNhaSanXuat}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">Số điện thoại</label>
                    <input name="sdt" type="text" class="form-control" placeholder="Product Name"
                        value="{{ $manufacturer->SDT_NhaSanXuat}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">Địa chỉ</label>
                    <input name="diachi" type="text" class="form-control" placeholder="Product Name"
                        value="{{ $manufacturer->DiaChiNhaSanXuat}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">Email</label>
                    <input name="email" type="text" class="form-control" placeholder="Product Name"
                        value="{{ $manufacturer->EmailNhaSanXuat}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">Số FAX</label>
                    <input name="fax" type="text" class="form-control" placeholder="Product Name"
                        value="{{ $manufacturer->Fax}}">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect">Tình trạng</label>
                    <select class="form-control" name="trangthai">
                        @if ( $manufacturer->TrangThai_NhaSanXuat==1)
                            <option value="1" checked> Kinh doanh</option>
                            <option value="0"> Ngừng kinh doanh</option>
                        @endif
                        @if ( $manufacturer->TrangThai_NhaSanXuat==0)
                            <option value="0" checked> Ngừng kinh doanh</option>
                            <option value="1"> Kinh doanh</option>
                        @endif
                    </select>
                </div>
                <div class="form-group mt-4">
                    <button type="submit" class="btn btn-primary me-2">Cập nhật</button>
                    <a href="{{route('manufacturer.index')}}" class="btn btn-warning">Quay lại</a>
                </div>
            </form>
           
        </div>
    </div>
</div>
@endsection