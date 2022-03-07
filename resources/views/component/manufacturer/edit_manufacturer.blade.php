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
                        @if ($errors->has('tennhasanxuat'))
                            <div style="margin-top:5px" class="alert alert-danger ">
                                <h6>{{ $errors->first('tennhasanxuat')}}</h6>
                            </div>
                        @endif
                    </div>
                <div class="form-group">
                    <label for="exampleInputName1">Số điện thoại</label>
                    <input name="sdt" type="text" class="form-control" placeholder="Product Name"
                        value="{{ $manufacturer->SDT_NhaSanXuat}}">
                        @if ($errors->has('sdt'))
                            <div style="margin-top:5px" class="alert alert-danger ">
                                <h6>{{ $errors->first('sdt')}}</h6>
                            </div>
                        @endif
                    </div>
                <div class="form-group">
                    <label for="exampleInputName1">Địa chỉ</label>
                    <input name="diachi" type="text" class="form-control" placeholder="Product Name"
                        value="{{ $manufacturer->DiaChiNhaSanXuat}}">
                        @if ($errors->has('diachi'))
                            <div style="margin-top:5px" class="alert alert-danger ">
                                <h6>{{ $errors->first('diachi')}}</h6>
                            </div>
                        @endif
                    </div>
                <div class="form-group">
                    <label for="exampleInputName1">Email</label>
                    <input name="email" type="text" class="form-control" placeholder="Product Name"
                        value="{{ $manufacturer->EmailNhaSanXuat}}">
                        @if ($errors->has('email'))
                            <div style="margin-top:5px" class="alert alert-danger ">
                                <h6>{{ $errors->first('email')}}</h6>
                            </div>
                        @endif
                    </div>
                <div class="form-group">
                    <label for="exampleInputName1">Số FAX</label>
                    <input name="fax" type="text" class="form-control" placeholder="Product Name"
                        value="{{ $manufacturer->Fax}}">
                        @if ($errors->has('fax'))
                            <div style="margin-top:5px" class="alert alert-danger ">
                                <h6>{{ $errors->first('fax')}}</h6>
                            </div>
                        @endif
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