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
            <h4 class="card-title">Thêm màu mới</h4>
            {{-- @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                         @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                         @endforeach
                    </ul>
                </div>
            @endif --}}
            <form class="forms-sample" action="{{ route('store-color') }}" method="post"
                enctype="multipart/form-data"> @csrf
                <div class="form-group">
                    <label for="exampleInputName1">Mã màu</label>
                <input type="text" class="form-control" id="exampleInputName1" value="{{$finalId}}" disabled >
                <input type="hidden" class="form-control" id="exampleInputName1" value="{{$finalId}}" name="id">
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">Tên màu sắc</label>
                    <input name="tenmausac" type="text" class="form-control" placeholder="Color Name">
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