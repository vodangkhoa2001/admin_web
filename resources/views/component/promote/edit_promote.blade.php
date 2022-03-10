@extends('layouts.app')
@section('title', 'Edit Promote Product')

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
            <h4 class="card-title">Chỉnh sửa sản phẩm khuyến mãi</h4>
            <form class="forms-sample" action="{{ route('promote.update',$promote->id)}}" method="post"
                enctype="multipart/form-data"> @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="exampleFormControlSelect">Chọn sản phẩm khuyến mãi</label>
                    <select class="form-control" name="masanphamkhuyenmai" value="{{ old('masanphamkhuyenmai') }}">
                        @foreach ($sanPham as $sanpham)
                            <option value=" {{ $sanpham->id }} " @if($sanpham->id==$promote->MaSanPhamKhuyenMai) 
                                    selected @endif> {{ $sanpham->TenSanPham }}
                            </option>
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
                    <input type="number" name="dongiakhuyenmai" value="{{ $promote->DonGiaKhuyenMai}}"
                        class="form-control form-control-sm" placeholder="Price" >
                        @if ($errors->has('dongiakhuyenmai'))
                            <div style="margin-top:5px" class="alert alert-danger ">
                                <h6>{{ $errors->first('dongiakhuyenmai')}}</h6>
                            </div>
                        @endif
                </div>
                <div class="form-group">
                    <label>Số lượng khuyến mãi</label>
                    <input type="number" name="soluongkhuyenmai" value="{{ $promote->SoLuongKhuyenMai }}" class="form-control form-control-sm"
                        placeholder="Amount" aria-label="Amount">
                        @if ($errors->has('soluongkhuyenmai'))
                            <div style="margin-top:5px" class="alert alert-danger ">
                                <h6>{{ $errors->first('soluongkhuyenmai')}}</h6>
                            </div>
                        @endif
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect" >Ngày bắt đầu: </label>
                    <input style="width: 350px; height: 35px" value="{{ $promote->NgayBatDau }}"  class="w3-input w3-border w3-round-large" type="date"placeholder="YYYY-MM-DD" name="ngaybatdau">
                    @if ($errors->has('ngaybatdau'))
                        <div style="margin-top:5px" class="alert alert-danger ">
                            <h6>{{ $errors->first('ngaybatdau')}}</h6>
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect" >Ngày kết thúc: </label>
                    <input style="width: 350px; height: 35px" value="{{ $promote->NgayKetThuc }}" class="w3-input w3-border w3-round-large" type="date"placeholder="YYYY-MM-DD" name="ngayketthuc">
                    @if ($errors->has('ngayketthuc'))
                        <div style="margin-top:5px" class="alert alert-danger ">
                            <h6>{{ $errors->first('ngayketthuc')}}</h6>
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="exampleTextarea1">Mô tả</label>
                    <textarea class="form-control" name="mota" value="{{ old('mota') }}" rows="10" style="height:100px;">{{ $promote->MoTa}}</textarea>
                    @if ($errors->has('mota'))
                    <div style="margin-top:5px" class="alert alert-danger ">
                        <h6>{{ $errors->first('mota')}}</h6>
                    </div>
                @endif
                </div>
                <div class="form-group mt-4">
                    <button type="submit" class="btn btn-primary me-2">Cập nhật</button>
                    <a href="{{route('promote.index')}}" class="btn btn-warning"><span style="font-size: 17px;" class="menu-icon mdi mdi-keyboard-return"></a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection