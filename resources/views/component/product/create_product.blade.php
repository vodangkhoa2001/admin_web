@extends('layouts.app')

@section('title', 'Create Product')

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
            <h4 class="card-title">Thêm sản phẩm</h4>
            <p class="card-description">
                Thêm chi tiết sản phẩm mới
            </p>
            {{-- @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                         @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                         @endforeach
                    </ul>
                </div>
            @endif --}}
            <form class="forms-sample" action="{{ route('sanPham.store') }}" method="post"
                enctype="multipart/form-data"> @csrf
                <div class="form-group">
                    <label for="exampleInputName1">Mã sản phẩm</label>
                <input type="text" class="form-control" id="exampleInputName1" value="{{$finalId}}" disabled >
                <input type="hidden" class="form-control" id="exampleInputName1" value="{{$finalId}}" name="id">
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">Tên sản phẩm</label>
                    <input name="tensanpham" type="text" class="form-control" placeholder="Product Name">
                    @if ($errors->has('tensanpham'))
                            <div style="margin-top:5px" class="alert alert-danger ">
                                <h6>{{ $errors->first('tensanpham')}}</h6>
                            </div>
                        @endif
                </div>
                 {{-- @if($errors->has('tensanpham')){{ $errors->first('tensanpham')}}<br /> @endif --}}
                 <div class="form-group">
                    <label class="col-sm-10">Ảnh sản phẩm</label>
                    <div class="col-sm-10">
                        <input class="input-file" id="my-file" type="file" name="hinhanh">
                        <label tabindex="0" for="my-file" class="input-file-trigger"></label>
                        @if ($errors->has('hinhanh'))
                    <div style="margin-top:5px" class="alert alert-danger ">
                        <h6>{{ $errors->first('hinhanh')}}</h6>
                    </div>
                @endif
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleTextarea1">Mô tả</label>
                    <textarea class="form-control" name="mota" rows="10" style="height:100px;"></textarea>
                    @if ($errors->has('mota'))
                    <div style="margin-top:5px" class="alert alert-danger ">
                        <h6>{{ $errors->first('mota')}}</h6>
                    </div>
                @endif
                </div>
                <div class=" grid-margin stretch-card">
                    <div class=" card">
                        <div class="card-body">
                            <h4 class="card-title">Chọn nhà sản xuất và dòng sản phẩm</h4>
                            <div class="form-group">
                                <label for="exampleFormControlSelect">Nhà sản xuất</label>
                                <select class="form-control" name="nhasanxuat">
                                    <option value=''>Chọn thương hiệu</option>
                                    @foreach ($lstNhaSanXuat as $nhaSanXuat)
                                    <option value="{{ $nhaSanXuat->id }}">{{ $nhaSanXuat->TenNhaSanXuat }}</option>
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
                                <select class="form-control" name="dongsanpham">
                                    <option value=''>Chọn dòng sản phẩm</option>
                                    @foreach ($lstDongSanPham as $dongSanPham)
                                    <option value="{{ $dongSanPham->id }}">{{ $dongSanPham->TenDongSanPham }}</option>
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
                                <select class="form-control" name="mausac">
                                    <option value=''>Chọn màu sắc</option>
                                    @foreach ($lstMauSac as $mauSac)
                                    <option value="{{ $mauSac->id }}"> {{ $mauSac->TenMau}}</option>
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
                                <select class="form-control" name="ram">
                                    <option value=''>Chọn dung lượng RAM</option>
                                    @foreach ($lstRAM as $ram)
                                    <option value=" {{ $ram->id }} "> {{ $ram->TenRam }}
                                    </option>
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
                                <select class="form-control" name="manhinh">
                                    <option value=''>Chọn kích thước màn hình</option>
                                    @foreach ($lstManHinh as $manHinh)
                                    <option value=" {{ $manHinh->id }} "> {{ $manHinh->TenManHinh }}
                                    </option>
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
                                <select class="form-control" name="cpu">
                                    <option value=''>Chọn công nghệ CPU</option>
                                    @foreach ($lstCPU as $cpu)
                                    <option value=" {{ $cpu->id }} "> {{ $cpu->TenCPU }}
                                    </option>
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
                                <select class="form-control" name="ocung">
                                    <option value=''>Chọn dung lượng ổ cứng</option>
                                    @foreach ($lstOCung as $oCung)
                                    <option value=" {{ $oCung->id }} "> {{ $oCung->TenOCung }}
                                    </option>
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
                                <select class="form-control" name="carddohoa">
                                    <option value=''>Chọn card đồ họa</option>
                                    @foreach ($lstCardDoHoa as $cdh)
                                    <option value=" {{ $cdh->id }} "> {{ $cdh->TenCardDoHoa }}
                                    </option>
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
                        <h4 class="card-title">Thông tin giá bán</h4>
                        <div class="form-group">
                            <label>Giá nhập</label>
                            <input type="number" name="gianhap" value="{{ old('gianhap') }}"
                                class="form-control form-control-sm" placeholder="Price" aria-label="Price">
                                @if ($errors->has('gianhap'))
                    <div style="margin-top:5px" class="alert alert-danger ">
                        <h6>{{ $errors->first('gianhap')}}</h6>
                    </div>
                @endif
                            </div>
                        <div class="form-group">
                            <label>Giá bán</label>
                            <input type="number" name="giaban" value="{{ old('giaban') }}"
                                class=" form-control form-control-sm" placeholder="Price" aria-label="Price">
                                @if ($errors->has('giaban'))
                    <div style="margin-top:5px" class="alert alert-danger ">
                        <h6>{{ $errors->first('giaban')}}</h6>
                    </div>
                @endif
                            </div>
                        <div class="form-group">
                            <label>Số lượng</label>
                            <input type="number" name="soluong" class="form-control form-control-sm"
                                placeholder="Amount" aria-label="Amount">
                                @if ($errors->has('soluong'))
                    <div style="margin-top:5px" class="alert alert-danger ">
                        <h6>{{ $errors->first('soluong')}}</h6>
                    </div>
                @endif
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
                <div class="form-group">
                    <label for="exampleFormControlSelect">Tình trạng</label>
                    <select class="form-control" name="trangthai">
                            <option value="1"> Kinh doanh</option>
                            <option value="0"> Ngừng kinh doanh</option>
                    </select>
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
