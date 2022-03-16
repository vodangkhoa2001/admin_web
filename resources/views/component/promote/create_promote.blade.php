@extends('layouts.app')

@section('title', 'Create Product Promote')

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
            <h4 class="card-title">Thêm sản phẩm khuyến mãi</h4>
            <form class="forms-sample" action="{{ route('promote.store') }}" method="post"
                enctype="multipart/form-data"> @csrf
                <div class="form-group">
                    <label for="exampleInputName1">Mã khuyến mãi</label>
                <input type="text" class="form-control" id="exampleInputName1" value="{{$finalId}}" disabled >
                <input type="hidden" class="form-control" id="exampleInputName1" value="{{$finalId}}" name="id">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect">Chọn sản phẩm khuyến mãi</label>
                    <select class="form-control" value="{{ old('masanphamkhuyenmai') }}" name="masanphamkhuyenmai" >
                        <option value='' disabled>Chọn sản phẩm khuyến mãi</option>
                        @foreach ($sanPham as $sanpham)
                        <option value="{{ $sanpham->id }}" {{ (collect(old('masanphamkhuyenmai'))->contains($sanpham->id)) ? 'selected':'' }}>{{ $sanpham->TenSanPham }}</option>
                        @endforeach
                    </select>
                        @if ($errors->has('masanphamkhuyenmai'))
                         <div style="margin-top:5px" class="alert alert-danger ">
                                <h6>{{ $errors->first('masanphamkhuyenmai')}}</h6>
                        </div>
                         @endif
                </div>
                <div class="form-group">
                    <label>Đơn giá khuyến mãi</label>
                    <input type="number" name="dongiakhuyenmai" value="{{ old('dongiakhuyenmai') }}"
                        class="form-control form-control-sm" placeholder="Price" aria-label="Price">
                        @if ($errors->has('dongiakhuyenmai'))
                            <div style="margin-top:5px" class="alert alert-danger ">
                                <h6>{{ $errors->first('dongiakhuyenmai')}}</h6>
                            </div>
                        @endif
                </div>
                <div class="form-group">
                    <label>Số lượng khuyến mãi</label>
                    <input type="number" name="soluongkhuyenmai" value="{{ old('soluongkhuyenmai') }}"
                    class="form-control form-control-sm"
                        placeholder="Amount" aria-label="Amount">
                        @if ($errors->has('soluongkhuyenmai'))
                            <div style="margin-top:5px" class="alert alert-danger ">
                                <h6>{{ $errors->first('soluongkhuyenmai')}}</h6>
                            </div>
                        @endif
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect" >Ngày bắt đầu: </label>
                    <input style="width: 350px; height: 35px" class="w3-input w3-border w3-round-large" type="date"placeholder="YYYY-MM-DD" name="ngaybatdau" value="{{ old('ngaybatdau') }}">
                    @if ($errors->has('ngaybatdau'))
                        <div style="margin-top:5px" class="alert alert-danger ">
                            <h6>{{ $errors->first('ngaybatdau')}}</h6>
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect" >Ngày kết thúc: </label>
                    <input style="width: 350px; height: 35px" class="w3-input w3-border w3-round-large" type="date"placeholder="YYYY-MM-DD" name="ngayketthuc" value="{{ old('ngayketthuc') }}" >
                    @if ($errors->has('ngayketthuc'))
                        <div style="margin-top:5px" class="alert alert-danger ">
                            <h6>{{ $errors->first('ngayketthuc')}}</h6>
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="exampleTextarea1">Mô tả</label>
                    <input value="{{ old('mota') }}" class="form-control" name="mota" rows="10" style="height:100px;">
                    @if ($errors->has('mota'))
                    <div style="margin-top:5px" class="alert alert-danger ">
                        <h6>{{ $errors->first('mota')}}</h6>
                    </div>
                @endif
                </div>
                <div class="form-group mt-4">
                    <button type="submit" class="btn btn-primary me-2">Thêm</button>
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
