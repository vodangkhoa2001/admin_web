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
            <h4 class="card-title">Thêm chi tiết sản phẩm</h4>
            {{-- @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                         @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                         @endforeach
                    </ul>
                </div>
            @endif --}}
            <form class="forms-sample" action="{{ route('ctsp.store') }}" method="post"
                enctype="multipart/form-data"> @csrf
                <div class="form-group">
                    <label for="exampleInputName1">ID</label>
                <input type="text" class="form-control" id="exampleInputName1" value="{{$finalId}}" disabled >
                <input type="hidden" class="form-control" id="exampleInputName1" value="{{$finalId}}" name="id">
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">Màu sắc</label>
                    <input name="mausac" type="text" class="form-control" placeholder="Màu sắc">
                </div>
                 {{-- @if($errors->has('tensanpham')){{ $errors->first('tensanpham')}}<br /> @endif --}}

                    <div class="form-group">
                                <label for="exampleFormControlSelect2">RAM</label>
                                <select class="form-control" name='ram'>
                                    <option value="1">4GB</option>
                                    <option value="2">8GB</option>
                                    <option value="3">16GB</option>
                                    <option value="4">32GB</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect3">Ổ cứng</label>
                                <select class="form-control" name='ocung'>
                                    <option value="1">SSD</option>
                                    <option value="2">HDD</option>
                                </select>
                            </div>
                <div class="form-group">
                    <label for="exampleInputName1">Màn hình</label>
                    <input name="manhinh" type="text" class="form-control" placeholder="Màn hình">
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">Card đồ họa</label>
                    <input name="carddohoa" type="text" class="form-control" placeholder="Card đồ họa">
                </div>
                <div class="form-group">
                    <label for="exampleTextarea1">Mô tả</label>
                    <textarea class="form-control" name="mota" rows="10" style="height:100px;"></textarea>
                </div>
                <div class="form-group">
                    <div class="form-check form-check-primary">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" checked>
                            Hoạt động
                        </label>
                    </div>
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