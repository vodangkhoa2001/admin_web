@extends('layouts.app')
@section('title', 'Edit RAM')

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
            <h4 class="card-title">Chỉnh sửa màu sắc</h4>
            <form class="forms-sample" action="{{ route('ram.update',$ram->id)}}" method="post"
                enctype="multipart/form-data"> @csrf
                @method('PATCH')
                <div class="form-group">
                    <label >Mã RAM</label>
                    <input disabled name="id" type="text" class="form-control"
                        value="{{ $ram->id}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">Tên RAM</label>
                    <input name="tenram" type="text" class="form-control" placeholder="RAM Name"
                        value="{{ $ram->TenRam}}">
                
                        @if ($errors->any())
                        <div style="margin-top:5px" class="alert alert-danger ">
                            @if($errors->has('tenram')) <h6>{{ $errors->first('tenram')}}</h6>@endif
                        </div>
                    @endif
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
                    <a href="{{route('ram.index')}}" class="btn btn-warning">Quay lại</a>
                </div>
            </form>
           
        </div>
    </div>
</div>
@endsection