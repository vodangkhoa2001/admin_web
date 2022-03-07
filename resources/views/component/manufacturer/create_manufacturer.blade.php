@extends('layouts.app')

@section('title', 'Create Manufacturer')

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
            <h4 class="card-title">Thêm nhà sản xuất mới</h4>
            {{-- @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                         @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                         @endforeach
                    </ul>
                </div>
            @endif --}}
            <form class="forms-sample" action="{{ route('manufacturer.store') }}" method="post"
                enctype="multipart/form-data"> @csrf
                <div class="form-group">
                    <label for="exampleInputName1">Mã nhà sản xuất</label>
                <input type="text" class="form-control" id="exampleInputName1" value="{{$finalId}}" disabled >
                <input type="hidden" class="form-control" id="exampleInputName1" value="{{$finalId}}" name="id">
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">Tên nhà sản xuất</label>
                    <input name="tennhasanxuat" type="text" class="form-control" placeholder="Manufacturer Name">
                    @if ($errors->has('tennhasanxuat'))
                    <div style="margin-top:5px" class="alert alert-danger ">
                        <h6>{{ $errors->first('tennhasanxuat')}}</h6>
                    </div>
                @endif
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">Số điện thoại</label>
                    <input name="sdt" type="number" class="form-control" placeholder="Phone Number">
                    @if ($errors->has('sdt'))
                            <div style="margin-top:5px" class="alert alert-danger ">
                                <h6>{{ $errors->first('sdt')}}</h6>
                            </div>
                        @endif
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">Địa chỉ nhà sản xuất</label>
                    <input name="diachi" type="text" class="form-control" placeholder="Address">
                    @if ($errors->has('diachi'))
                            <div style="margin-top:5px" class="alert alert-danger ">
                                <h6>{{ $errors->first('diachi')}}</h6>
                            </div>
                        @endif
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">Email nhà sản xuất</label>
                    <input name="email" type="text" class="form-control" placeholder="Email">
                    @if ($errors->has('email'))
                            <div style="margin-top:5px" class="alert alert-danger ">
                                <h6>{{ $errors->first('email')}}</h6>
                            </div>
                        @endif
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">Số FAX</label>
                    <input name="fax" type="text" class="form-control" placeholder="FAX">
                    @if ($errors->has('fax'))
                            <div style="margin-top:5px" class="alert alert-danger ">
                                <h6>{{ $errors->first('fax')}}</h6>
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