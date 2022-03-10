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
            <h4 class="card-title">Thêm thương hiệu mới</h4>
            {{-- @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                         @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                         @endforeach
                    </ul>
                </div>
            @endif --}}
            <form class="forms-sample" action="{{ route('type.store') }}" method="post"
                enctype="multipart/form-data"> @csrf
                <div class="form-group">
                    <label for="exampleInputName1">Mã thương hiệu</label>
                <input type="text" class="form-control" id="exampleInputName1" value="{{$finalId}}" disabled >
                <input type="hidden" class="form-control" id="exampleInputName1" value="{{$finalId}}" name="id">
                </div>
                
                <div class="form-group">
                    <label for="exampleInputName1">Tên thương hiệu</label>
                    <input name="tendongsanpham" value="{{ old('tenthuonghieu') }}" type="text" class="form-control" placeholder="Type Name">
                    @if ($errors->any())
                        <div style="margin-top:5px" class="alert alert-danger ">
                            @if($errors->has('tendongsanpham')) <h6>{{ $errors->first('tendongsanpham')}}</h6>@endif
                        </div>
                    @endif
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