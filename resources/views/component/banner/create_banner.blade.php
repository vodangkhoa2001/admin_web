@extends('layouts.app')

@section('title', 'Create Banner')

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
            <h4 class="card-title">Thêm băng ron mới</h4>
            <form class="forms-sample" action="{{ route('banner.store') }}" method="post"
                enctype="multipart/form-data"> @csrf
                <div class="form-group">
                    <label for="exampleInputName1">Mã băng ron</label>
                <input type="text" class="form-control" id="exampleInputName1" value="{{$finalId}}" disabled >
                <input type="hidden" class="form-control" id="exampleInputName1" value="{{$finalId}}" name="id">
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">Tên băng ron</label>
                    <input name="tenbanner" type="text" class="form-control" placeholder="Banner Name">
                    @if ($errors->has('tenbanner'))
                        <div style="margin-top:5px" class="alert alert-danger ">
                            @if($errors->has('tenbanner')) <h6>{{ $errors->first('tenbanner')}}</h6>@endif
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
                <div class="form-group">
                    <label class="col-sm-10">Ảnh băng ron</label>
                    <div class="col-sm-10">
                        <input name="hinhanh" value="{{ old('hinhanh') }}"  class="input-file" id="my-file" type="file" >
                        <label tabindex="0" for="my-file" class="input-file-trigger">{{ old('hinhanh') }}</label>
                        @if ($errors->has('hinhanh'))
                            <div style="margin-top:5px" class="alert alert-danger ">
                                <h6>{{ $errors->first('hinhanh')}}</h6>
                            </div>
                         @endif
                    </div>
                </div>
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