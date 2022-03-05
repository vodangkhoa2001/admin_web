@extends('layouts.app')
@section('title', 'Edit Ổ Cứng')

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
            <h4 class="card-title">Chỉnh sửa ổ cứng</h4>
            <form class="forms-sample" action="{{ route('oCung.update',$oCung->id)}}" method="post"
                enctype="multipart/form-data"> @csrf
                @method('PATCH')
                <div class="form-group">
                    <label >Mã ổ cứng</label>
                    <input disabled name="id" type="text" class="form-control"
                        value="{{ $oCung->id}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">Tên ổ cứng</label>
                    <input name="tenocung" type="text" class="form-control" placeholder="Tên ổ cứng"
                        value="{{ $oCung->TenOCung}}">
                </div>
                
                <div class="form-group">
                    <label for="exampleFormControlSelect">Tình trạng</label>
                    <select class="form-control" name="trangthai">
                        @if ( $oCung->TrangThai==1)
                            <option value="1" checked> Kinh doanh</option>
                            <option value="0"> Ngừng kinh doanh</option>
                        @endif
                        @if ( $oCung->TrangThai==0)
                            <option value="0" checked> Ngừng kinh doanh</option>
                            <option value="1"> Kinh doanh</option>
                        @endif
                    </select>
                </div>
                <div class="form-group mt-4">
                    <button type="submit" class="btn btn-primary me-2">Cập nhật</button>
                    <a href="{{route('oCung.index')}}" class="btn btn-warning">Quay lại</a>
                </div>
            </form>
           
        </div>
    </div>
</div>
@endsection