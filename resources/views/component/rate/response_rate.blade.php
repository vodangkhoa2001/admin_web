@extends('layouts.app')

@section('title', 'Response Rate')

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
            <h4 class="card-title">Trả lời đánh giá</h4>
            <form class="forms-sample" action="{{ route('update_rate',$rate->id) }}" method="POST"
                enctype="multipart/form-data"> @csrf
                <div class="form-group">
                    <label><strong>ID: </strong> {{ $rate->id }} </label>  <br />
                    <label><strong>Tên sản phẩm: </strong> {{ $rate->sanPham->TenSanPham }} </label>  <br />
                    <label><strong>Tên tài khoản: </strong> {{ $rate->taiKhoan->TenDangNhap }} </label>  <br />
                    <label><strong>Trạng thái: </strong> @if ( $rate->TrangThai==0) Ngừng hoạt động @endif @if ( $rate->TrangThai==1) Hoạt động @endif</label>  <br />
                    <label class="mark"><strong>Số sao: </strong> {{ $rate->SoSao }}* (    
                                @if ($rate->SoSao==1)
                                <i style="color: rgb(204,204,0)" class="menu-icon mdi mdi-star"></i>
                                @endif
                                @if ($rate->SoSao==2)
                                <i style="color: rgb(204,204,0)" class="menu-icon mdi mdi-star"></i>
                                <i style="color: rgb(204,204,0)" class="menu-icon mdi mdi-star"></i>
                                @endif
                                @if ($rate->SoSao==3)
                                <i style="color: rgb(204,204,0)" class="menu-icon mdi mdi-star"></i>
                                <i style="color: rgb(204,204,0)" class="menu-icon mdi mdi-star"></i>
                                <i style="color: rgb(204,204,0)" class="menu-icon mdi mdi-star"></i>
                                @endif
                                @if ($rate->SoSao==4)
                                <i style="color: rgb(204,204,0)" class="menu-icon mdi mdi-star"></i>
                                <i style="color: rgb(204,204,0)" class="menu-icon mdi mdi-star"></i>
                                <i style="color: rgb(204,204,0)" class="menu-icon mdi mdi-star"></i>
                                <i style="color: rgb(204,204,0)" class="menu-icon mdi mdi-star"></i>
                                @endif
                                @if ($rate->SoSao==5)
                                <i style="color: rgb(204,204,0)" class="menu-icon mdi mdi-star"></i>
                                <i style="color: rgb(204,204,0)" class="menu-icon mdi mdi-star"></i>
                                <i style="color: rgb(204,204,0)" class="menu-icon mdi mdi-star"></i>
                                <i style="color: rgb(204,204,0)" class="menu-icon mdi mdi-star"></i>
                                <i style="color: rgb(204,204,0)" class="menu-icon mdi mdi-star"></i>
                                @endif
                    )
                    </label>  <br />
                    <label class="mark"><strong>Nội dung: </strong> {{ $rate->NoiDung }} </label>  <br />
                    <label for="exampleTextarea1"><strong>Trả lời đánh giá: </strong> </label>
                    <textarea name="traloidanhgia" value="{{ old('traloidanhgia') }}"class="form-control" rows="10"
                        style="height:100px;"></textarea>
                </div>
                <div class="form-group mt-4">
                    <button type="submit" class="btn btn-primary me-2">Trả lời</button>
                    <a href="{{route('rate.index')}}" class="btn btn-warning">Quay lại</a>
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