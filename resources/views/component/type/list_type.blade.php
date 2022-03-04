@extends('layouts.app')
@section('title', 'List Product')

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
            <h4 class="card-title">Danh sách thương hiệu</h4>
            <div>
                <a style="margin: 19px;" href="{{route('type.create')}}" class="btn btn-primary">Thêm thương hiệu mới</a>
            </div>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>
                                Mã thương hiệu
                            </th>
                            <th>
                                Tên thương hiệu
                            </th>
                            <th>
                                Trạng thái
                            </th>
                            <th>

                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($type as $t)
                        <tr>
                            <td>
                                {{$t->id }}
                            </td>
                            <td>
                                {{$t->TenDongSanPham}}
                            </td>
                            <td>
                                {{$t->TrangThai_DongSanPham}}
                            </td>
                            <td>
                                <a href="{{route('type.edit',$t->id)}}"
                                    class="btn btn-sm btn-warning"><span class="glyphicon glyphicon-pencil">Cập nhật</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="9">
                                Chưa có màu mới
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