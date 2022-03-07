@extends('layouts.app')
@section('title', 'Edit Graphics Card')

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
            <h4 class="card-title">Chỉnh sửa Card đồ họa</h4>
            <form class="forms-sample" action="{{ route('carddohoa.update',$carddohoa->id)}}" method="post"
                enctype="multipart/form-data"> @csrf
                @method('PATCH')
                <div class="form-group">
                    <label >Mã Card đồ họa</label>
                    <input disabled name="id" type="text" class="form-control"
                        value="{{ $carddohoa->id}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">Tên Card đồ họa</label>
                    <input name="tencarddohoa" type="text" class="form-control" placeholder="Graphics Card Name"
                        value="{{ $carddohoa->TenCardDoHoa}}">
                        @if ($errors->any())
                        <div style="margin-top:5px" class="alert alert-danger ">
                            @if($errors->has('tencarddohoa')) <h6>{{ $errors->first('tencarddohoa')}}</h6>@endif
                        </div>
                    @endif
                    </div>
                
                <div class="form-group">
                    <label for="exampleFormControlSelect">Tình trạng</label>
                    <select class="form-control" name="trangthai">
                        @if ( $carddohoa->TrangThai==1)
                            <option value="1" checked> Kinh doanh</option>
                            <option value="0"> Ngừng kinh doanh</option>
                        @endif
                        @if ( $carddohoa->TrangThai==0)
                            <option value="0" checked> Ngừng kinh doanh</option>
                            <option value="1"> Kinh doanh</option>
                        @endif
                    </select>
                </div>
                <div class="form-group mt-4">
                    <button type="submit" class="btn btn-primary me-2">Cập nhật</button>
                    <a href="{{route('carddohoa.index')}}" class="btn btn-warning">Quay lại</a>
                </div>
            </form>
           
        </div>
    </div>
</div>
@endsection