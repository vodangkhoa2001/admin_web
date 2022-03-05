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
                <div class=" grid-margin stretch-card">
                    <div class=" card">
                        <div class="card-body">
                            <h4 class="card-title">Nhà sản xuất & dòng sản phẩm</h4>
                            <div class="form-group">
                                <label for="exampleFormControlSelect">Nhà sản xuất</label>
                                <select class="form-control"  name="nhasanxuat">
                                    <option  value=''>Chọn nhà sản xuất</option>
                                    @foreach ($lstNhaSanXuat as $nhaSanXuat)
                                    <option  value="{{ $nhaSanXuat->id }}" @if ($nhaSanXuat->id==$sanPham->MaNhaSanXuat)
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
                        </div>
                    </div>
                </div>
                <div class=" grid-margin stretch-card">
                    <div class=" card">
                        <div class="card-body">
                            <h4 class="card-title">Thông số kỹ thuật</h4>
                            <div class="form-group">
                                <label for="exampleFormControlSelect">Màu sắc</label>
                                <select class="form-control" name="mausac">
                                    <option value=''>Chọn màu sắc</option>
                                    @foreach ($lstMauSac as $mauSac)
                                    <option value="{{ $mauSac->id }}" @if ($mauSac->id==$sanPham->MaMau)
                                        selected @endif> {{ $mauSac->TenMau}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect">RAM</label>
                                <select class="form-control" name="ram">
                                    <option value=''>Chọn dung lượng RAM</option>
                                    @foreach ($lstRAM as $ram)
                                    <option value=" {{ $ram->id }} " @if($ram->id==$sanPham->MaRam) 
                                        selected @endif> {{ $ram->TenRam }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect">Màn hình</label>
                                <select class="form-control" name="manhinh">
                                    <option value=''>Chọn kích thước màn hình</option>
                                    @foreach ($lstManHinh as $manHinh)
                                    <option value=" {{ $manHinh->id }} " @if($manHinh->id==$sanPham->MaManHinh) 
                                        selected @endif> {{ $manHinh->TenManHinh }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect">CPU</label>
                                <select class="form-control" name="cpu">
                                    <option value=''>Chọn công nghệ CPU</option>
                                    @foreach ($lstCPU as $cpu)
                                    <option value=" {{ $cpu->id }} " @if($cpu->id==$sanPham->MaCPU) 
                                        selected @endif> {{ $cpu->TenCPU }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect">Ổ cứng</label>
                                <select class="form-control" name="ocung">
                                    <option value=''>Chọn dung lượng ổ cứng</option>
                                    @foreach ($lstOCung as $oCung)
                                    <option value=" {{ $oCung->id }} " @if($oCung->id==$sanPham->MaOCung) 
                                        selected @endif> {{ $oCung->TenOCung }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect">Card đồ họa</label>
                                <select class="form-control" name="carddohoa">
                                    <option value=''>Chọn card đồ họa</option>
                                    @foreach ($lstCardDoHoa as $cdh)
                                    <option value=" {{ $cdh->id }} " @if($cdh->id==$sanPham->MaCardDoHoa) 
                                        selected @endif> {{ $cdh->TenCardDoHoa }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
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
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleTextarea1">Mô tả</label>
                    <textarea name="mota" class="form-control" rows="10"
                        style="height:100px;">{{ $sanPham->MoTa}}</textarea>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect">Tình trạng</label>
                    <select class="form-control" name="trangthai">
                        @if ( $ram->TrangThai==1)
                            <option value="1" checked> Kinh doanh</option>
                            <option value="0"> Ngừng kinh doanh</option>
                        @endif
                        @if ( $ram->TrangThai==0)
                            <option value="0" checked> Ngừng kinh doanh</option>
                            <option value="1"> Kinh doanh</option>
                        @endif
                    </select>
                </div>
                <div class="form-group mt-4">
                    <button type="submit" class="btn btn-primary me-2">Cập nhật</button>
                    <a href="{{route('list-product')}}" class="btn btn-warning">Quay lại</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection