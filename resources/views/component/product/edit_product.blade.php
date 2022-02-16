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
            <h4 class="card-title">Chỉnh sửa sản phẩm</h4>
            <p class="card-description">
                Thông tin sản phẩm hiện tại
            </p>
            <form class="forms-sample" action="{{ route('sanPham.update',['sanPham'=>$sanPham])}}" method="post"
                enctype="multipart/form-data"> @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="exampleInputName1">Tên sản phẩm</label>
                    <input name="tensanpham" type="text" class="form-control" placeholder="Product Name"
                        value="{{ $sanPham->TenSanPham}}">
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label>Ảnh cũ của sản phẩm</label>
                            <img class="img-thumbnail" style="width:200px;max-height:200px;object-fit:contain;margin:17px;"
                                src="{{ asset('product/images')}}/{{ $sanPham->HinhAnh }}">
                            {{-- <input type="file" name="hinhanh" class="file-upload-default"> --}}
                            <input type="file" class="input-file" name="hinhanh"><br />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleTextarea1">Mô tả</label>
                    <textarea name="mota" class="form-control" rows="10"
                        style="height:100px;">{{ $sanPham->MoTa}}</textarea>
                </div>
                <div class=" grid-margin stretch-card">
                    <div class=" card">
                        <div class="card-body">
                            <h4 class="card-title">Nhà sản xuất & dòng sản phẩm</h4>
                            <div class="form-group">
                                <label for="exampleFormControlSelect">Nhà sản xuất</label>
                                <select class="form-control" name="nhasanxuat">
                                    <option value=''>Chọn nhà sản xuất</option>
                                    @foreach ($lstNhaSanXuat as $nhaSanXuat)
                                    <option value="{{ $nhaSanXuat->id }}" @if ($nhaSanXuat->id==$sanPham->MaNhaSanXuat)
                                        selected @endif> {{ $nhaSanXuat->TenNhaSanXuat }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect">Dòng sản phẩm</label>
                                <select class="form-control" name="dongsanpham">
                                    <option value=''>Chọn dòng sản phẩm</option>
                                    @foreach ($lstDongSanPham as $dongSanPham)
                                    <option value=" {{ $dongSanPham->id }} " @if($dongSanPham->id==$sanPham->MaDongSanPham) 
                                        selected @endif> {{ $dongSanPham->TenDongSanPham }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- <div class="form-group">
                                <label for="exampleFormControlSelect2">RAM</label>
                                <select class="form-control" id="exampleFormControlSelect2">
                                    <option>4GB</option>
                                    <option>8GB</option>
                                    <option>16GB</option>
                                    <option>32GB</option>
                                    <option>64GB</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect3">Disk Type</label>
                                <select class="form-control" id="exampleFormControlSelect3">
                                    <option>SSD</option>
                                    <option>HDD</option>
                                </select>
                            </div> --}}
                        </div>
                    </div>
                </div>
                <div class=" card">
                    <div class="card-body">
                        <h4 class="card-title">Thông tin giá và số lượng</h4>
                        <div class="form-group">
                            <label>Giá bán</label>
                            <input name="giaban" value="{{ $sanPham->GiaBan }}" type="number"
                                class="form-control form-control-sm" placeholder="Price" aria-label="Price">
                        </div>
                        <div class="form-group">
                            <label>Giá nhập</label>
                            <input name="gianhap" value="{{ $sanPham->GiaNhap }}" type="number"
                                class="form-control form-control-sm" placeholder="Price" aria-label="Price">
                        </div>
                        <div class="form-group">
                            <label>Số lượng</label>
                            <input name="soluong" value="{{ $sanPham->SoLuong }}" type="number"
                                class="form-control form-control-sm" placeholder="Amount" aria-label="Amount">
                        </div>
                        {{-- <div class="form-group">
                            <label>Color code</label>
                            <input type="text" class="form-control form-control-sm" placeholder="Color code"
                                aria-label="ColorCode">
                        </div> --}}
                    </div>
                </div>
                {{-- <div class="form-group">
                    <div class="form-check form-check-primary">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" checked>
                            Sell
                        </label>
                    </div>
                </div> --}}
                <div class="form-group mt-4">
                    <button type="submit" class="btn btn-primary me-2">Cập nhật</button>
                    <button href="{{route('list-product')}}" class="btn btn-light">Quay lại</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection