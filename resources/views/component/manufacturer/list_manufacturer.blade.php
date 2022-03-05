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
            <h4 class="card-title">Danh sách nhà sản xuất</h4>
            <div>
                <a style="margin: 19px;" href="{{route('manufacturer.create')}}" class="btn btn-primary">Thêm nhà sản xuất mới</a>
            </div>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>
                                Mã nhà sản xuất
                            </th>
                            <th>
                                Tên nhà sản xuất
                            </th>
                            <th>
                                Trạng thái
                            </th>
                            <th>

                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($manufacturer as $m)
                        <tr>
                            <td>
                                {{$m->id }}
                            </td>
                            <td>
                                {{$m->TenNhaSanXuat}}
                            </td>
                            <td>
                                @if ( $m->TrangThai_NhaSanXuat==0) Ngừng kinh doanh @endif @if ( $m->TrangThai_NhaSanXuat==1) Kinh doanh @endif
                            </td>
                            <td>
                                <a href="{{route('manufacturer.edit',$m->id)}}"
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