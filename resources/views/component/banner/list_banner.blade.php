@extends('layouts.app')
@section('title', 'List Banner')

@section('navbar')
@parent
@endsection

@section('slidebar')
@parent
@endsection
@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Danh sách băng ron</h4>
            <div>
                <a style="margin: 19px;" href="{{route('banner.create')}}" class="btn btn-primary">Thêm băng ron mới</a>
            </div>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>
                                ID
                            </th>
                            <th>
                                Tên băng ron
                            </th>
                            <th>
                                Mô tả
                            </th>
                            <th>
                                Hình ảnh
                            </th>
                            <th>
                                Trạng thái
                            </th>
                            <th>

                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($banner as $banner)
                        <tr>
                            <td>
                                {{$banner->id }}
                            </td>
                            <td>
                                {{$banner->TenBanner}}
                            </td>
                            <td>
                                {{$banner->MoTa}}
                            </td>
                            <td class= "mx-auto d-block" >
                                <img src="{{ asset('images/banner')}}/{{ $banner->HinhAnh }}">
                            </td>
                            <td>
                                @if ( $banner->TrangThai==0) Ngừng hoạt động @endif @if ( $banner->TrangThai==1) Hoạt động @endif
                            </td>
                            <td>
                                <a href="{{route('banner.show',$banner->id)}}"
                                    class="btn btn-sm btn btn-info"><span style="font-size: 20px;" class="menu-icon mdi mdi-dots-horizontal"></a>
                                <a href="{{route('banner.edit',$banner->id)}}"
                                    class="btn btn-sm btn-warning"><span  style="font-size: 20px;" class="menu-icon mdi mdi-table-edit"></a>
                                <a href="{{route('banner.destroy',$banner->id)}}"
                                    class="btn btn-sm btn-danger"><span style="font-size: 20px;" class="menu-icon mdi mdi-delete"></a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="9">
                                Chưa có băng ron
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
@parent
@endsection