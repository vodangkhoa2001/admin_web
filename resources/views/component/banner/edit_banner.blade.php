@extends('layouts.app')
@section('title', 'Edit Banner')

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
            <h4 class="card-title">Chỉnh sửa băng ron</h4>
            <form class="forms-sample" action="{{ route('banner.update',$banner->id)}}" method="post"
                enctype="multipart/form-data"> @csrf
                @method('PATCH')
                <div class="form-group">
                    <label >Mã băng ron</label>
                    <input disabled name="id" type="text" class="form-control"
                        value="{{ $banner->id}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">Tên băng ron</label>
                    <input name="tenbanner" type="text" class="form-control" placeholder="Tên băng ron"
                        value="{{ $banner->TenBanner}}">
                        @if ($errors->any())
                        <div style="margin-top:5px" class="alert alert-danger ">
                            @if($errors->has('tenbanner')) <h6>{{ $errors->first('tenbanner')}}</h6>@endif
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="exampleTextarea1">Mô tả</label>
                    <textarea name="mota" value="{{ old('mota') }}"class="form-control" rows="10"
                        style="height:100px;">{{ $banner->MoTa}}</textarea>
                        @if ($errors->has('mota'))
                            <div style="margin-top:5px" class="alert alert-danger ">
                                <h6>{{ $errors->first('mota')}}</h6>
                            </div>
                        @endif
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label>Ảnh băng ron cũ</label>
                            <img class="img-thumbnail" style="width:200px;max-height:200px;object-fit:contain;margin:17px;"
                                src="{{ asset('images/banner')}}/{{ $banner->HinhAnh }}">
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
                <div class="form-group">
                    <label for="exampleFormControlSelect">Tình trạng</label>
                    <select class="form-control" name="trangthai">
                        @if ( $banner->TrangThai==1)
                            <option value="1" checked> Hoạt động</option>
                            <option value="0"> Ngừng hoạt động</option>
                        @endif
                        @if ( $banner->TrangThai==0)
                            <option value="0" checked> Ngừng hoạt động</option>
                            <option value="1"> Hoạt động</option>
                        @endif
                    </select>
                </div>
                <div class="form-group mt-4">
                    <button type="submit" class="btn btn-primary me-2">Cập nhật</button>
                    <a href="{{route('banner.index')}}" class="btn btn-warning">Quay lại</a>
                </div>
            </form>
           
        </div>
    </div>
</div>
@endsection