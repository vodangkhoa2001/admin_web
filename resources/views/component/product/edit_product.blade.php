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
            <form class="forms-sample" action="{{ route('sanPham.update',['sanPham'=>$sanPham])}}" method="post"
                enctype="multipart/form-data"> @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="exampleInputName1">Tên sản phẩm</label>
                    <input name="tensanpham" value="{{ $sanPham->TenSanPham }}" type="text" class="form-control" placeholder="Product Name">
                        @if ($errors->has('tensanpham'))
                            <div style="margin-top:5px" class="alert alert-danger ">
                                <h6>{{ $errors->first('tensanpham')}}</h6>
                            </div>
                        @endif
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label>Ảnh cũ của sản phẩm</label>
                            <img class="img-thumbnail" style="width:200px;max-height:200px;object-fit:contain;margin:17px;"
                                src="{{ asset('product/images')}}/{{ $sanPham->HinhAnh }}">
                            {{-- <input type="file" name="hinhanh" class="file-upload-default"> --}}
                            <input type="file" class="input-file" name="hinhanh" ><br />
                            {{-- @if ($errors->has('hinhanh'))
                            <div style="margin-top:5px" class="alert alert-danger ">
                                <h6>{{ $errors->first('hinhanh')}}</h6>
                            </div>
                        @endif --}}
                        </div>
                    </div>
                </div>
                <div class=" grid-margin stretch-card">
                    <div class=" card">
                        <div class="card-body">
                            <h4 class="card-title">Nhà sản xuất & dòng sản phẩm</h4>
                            <div class="form-group">
                                <label for="exampleFormControlSelect">Nhà sản xuất</label>
                                <select class="form-control"  name="nhasanxuat" value="{{ old('nhasanxuat') }}">
                                    <option  value='' disabled selected>Chọn nhà sản xuất</option>
                                    @foreach ($lstNhaSanXuat as $nhaSanXuat)
                                        @if($nhaSanXuat->TrangThai_NhaSanXuat==1)
                                            <option  value="{{ $nhaSanXuat->id }}" @if ($nhaSanXuat->id==$sanPham->MaNhaSanXuat)
                                                selected @endif> {{ $nhaSanXuat->TenNhaSanXuat }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                                @if ($errors->has('nhasanxuat'))
                            <div style="margin-top:5px" class="alert alert-danger ">
                                <h6>{{ $errors->first('nhasanxuat')}}</h6>
                            </div>
                        @endif
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect">Dòng sản phẩm</label>
                                <select class="form-control" name="dongsanpham" value="{{ old('dongsanpham') }}">
                                    <option value='' disabled selected>Chọn dòng sản phẩm</option>
                                    @foreach ($lstDongSanPham as $dongSanPham)
                                        @if($dongSanPham->TrangThai_DongSanPham==1)
                                            <option value=" {{ $dongSanPham->id }} " @if($dongSanPham->id==$sanPham->MaDongSanPham) 
                                                selected @endif> {{ $dongSanPham->TenDongSanPham }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                                @if ($errors->has('dongsanpham'))
                                    <div style="margin-top:5px" class="alert alert-danger ">
                                        <h6>{{ $errors->first('dongsanpham')}}</h6>
                                    </div>
                                @endif
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
                                <select class="form-control" name="mausac" value="{{ old('mausac') }}">
                                    <option value='' disabled selected>Chọn màu sắc</option>
                                    @foreach ($lstMauSac as $mauSac)
                                        @if($mauSac->TrangThai==1)
                                            <option value="{{ $mauSac->id }}" @if ($mauSac->id==$sanPham->MaMau)
                                                selected @endif> {{ $mauSac->TenMau}}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                                @if ($errors->has('mausac'))
                            <div style="margin-top:5px" class="alert alert-danger ">
                                <h6>{{ $errors->first('mausac')}}</h6>
                            </div>
                        @endif
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect">RAM</label>
                                <select class="form-control" name="ram" value="{{ old('ram') }}">
                                    <option value='' disabled selected>Chọn dung lượng RAM</option>
                                    @foreach ($lstRAM as $ram)
                                        @if($ram->TrangThai==1)
                                            <option value=" {{ $ram->id }} " @if($ram->id==$sanPham->MaRam) 
                                                selected @endif> {{ $ram->TenRam }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                                @if ($errors->has('ram'))
                            <div style="margin-top:5px" class="alert alert-danger ">
                                <h6>{{ $errors->first('ram')}}</h6>
                            </div>
                        @endif
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect">Màn hình</label>
                                <select class="form-control" name="manhinh" value="{{ old('manhinh') }}">
                                    <option value='' disabled selected>Chọn kích thước màn hình</option>
                                    @foreach ($lstManHinh as $manHinh)
                                        @if($manHinh->TrangThai==1)
                                        <option value=" {{ $manHinh->id }} " @if($manHinh->id==$sanPham->MaManHinh) 
                                            selected @endif> {{ $manHinh->TenManHinh }}
                                        </option>
                                        @endif
                                    @endforeach
                                </select>
                                @if ($errors->has('manhinh'))
                            <div style="margin-top:5px" class="alert alert-danger ">
                                <h6>{{ $errors->first('manhinh')}}</h6>
                            </div>
                        @endif
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect">CPU</label>
                                <select class="form-control" name="cpu" value="{{ old('cpu') }}">
                                    <option value='' disabled selected>Chọn công nghệ CPU</option>
                                    @foreach ($lstCPU as $cpu)
                                        @if($cpu->TrangThai==1)
                                            <option value=" {{ $cpu->id }} " @if($cpu->id==$sanPham->MaCPU) 
                                                selected @endif> {{ $cpu->TenCPU }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                                @if ($errors->has('cpu'))
                            <div style="margin-top:5px" class="alert alert-danger ">
                                <h6>{{ $errors->first('cpu')}}</h6>
                            </div>
                        @endif
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect">Ổ cứng</label>
                                <select class="form-control" name="ocung" value="{{ old('ocung') }}">
                                    <option value='' disabled selected>Chọn dung lượng ổ cứng</option>
                                    @foreach ($lstOCung as $oCung)
                                        @if($oCung->TrangThai==1)
                                            <option value=" {{ $oCung->id }} " @if($oCung->id==$sanPham->MaOCung) 
                                                selected @endif> {{ $oCung->TenOCung }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                                @if ($errors->has('ocung'))
                            <div style="margin-top:5px" class="alert alert-danger ">
                                <h6>{{ $errors->first('ocung')}}</h6>
                            </div>
                        @endif
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect">Card đồ họa</label>
                                <select class="form-control" name="carddohoa" value="{{ old('carddohoa') }}">
                                    <option value='' disabled selected>Chọn card đồ họa</option>
                                    @foreach ($lstCardDoHoa as $cdh)
                                    @if($cdh->TrangThai==1)
                                        <option value=" {{ $cdh->id }} " @if($cdh->id==$sanPham->MaCardDoHoa) 
                                            selected @endif> {{ $cdh->TenCardDoHoa }}
                                        </option>
                                    @endif
                                    @endforeach
                                </select>
                                @if ($errors->has('carddohoa'))
                            <div style="margin-top:5px" class="alert alert-danger ">
                                <h6>{{ $errors->first('carddohoa')}}</h6>
                            </div>
                        @endif
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
                                @if ($errors->has('giaban'))
                            <div style="margin-top:5px" class="alert alert-danger ">
                                <h6>{{ $errors->first('giaban')}}</h6>
                            </div>
                        @endif
                            </div>
                        <div class="form-group">
                            <label>Giá nhập</label>
                            <input name="gianhap" value="{{ $sanPham->GiaNhap }}" type="number"
                                class="form-control form-control-sm" placeholder="Price" aria-label="Price">
                                @if ($errors->has('gianhap'))
                            <div style="margin-top:5px" class="alert alert-danger ">
                                <h6>{{ $errors->first('gianhap')}}</h6>
                            </div>
                        @endif
                            </div>
                        <div class="form-group">
                            <label>Số lượng</label>
                            <input name="soluong" value="{{ $sanPham->SoLuong }}" type="number"
                                class="form-control form-control-sm" placeholder="Amount" aria-label="Amount">
                                @if ($errors->has('soluong'))
                                <div style="margin-top:5px" class="alert alert-danger ">
                                    <h6>{{ $errors->first('soluong')}}</h6>
                                </div>
                            @endif
                            </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleTextarea1">Mô tả</label>
                    <textarea name="mota" value="{{ old('mota') }}"class="form-control" rows="10"
                        style="height:100px;">{{ $sanPham->MoTa}}</textarea>
                        @if ($errors->has('mota'))
                            <div style="margin-top:5px" class="alert alert-danger ">
                                <h6>{{ $errors->first('mota')}}</h6>
                            </div>
                        @endif
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect">Tình trạng</label>
                    <select class="form-control" name="trangthai" value="{{ old('trangthai') }}">
                        @if ( $sanPham->TrangThai==1)
                            <option value="1" checked> Kinh doanh</option>
                            <option value="0"> Ngừng kinh doanh</option>
                        @endif
                        @if ( $sanPham->TrangThai==0)
                            <option value="0" checked> Ngừng kinh doanh</option>
                            <option value="1"> Kinh doanh</option>
                        @endif
                    </select>
                </div>
                <div class="form-group mt-4">
                    <button type="submit" class="btn btn-primary me-2">Cập nhật</button>
                    <a href="{{route('list-product')}}" class="btn btn-warning"><span style="font-size: 17px;" class="menu-icon mdi mdi-keyboard-return"></a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection