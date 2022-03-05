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
            <h4 class="card-title">Danh sách màu sắc</h4>
            <div>
                <a style="margin: 19px;" href="{{route('color.create')}}" class="btn btn-primary">Thêm màu mới</a>
            </div>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>
                                Mã màu
                            </th>
                            <th>
                                Tên màu
                            </th>
                            <th>
                                Trạng thái
                            </th>
                            <th>

                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($mauSac as $mau)
                        <tr>
                            <td>
                                {{$mau->id }}
                            </td>
                            <td>
                                {{$mau->TenMau}}
                            </td>
                            <td>
                                @if ( $mau->TrangThai==0) Ngừng kinh doanh @endif @if ( $mau->TrangThai==1) Kinh doanh @endif
                            </td>
                            <td>
                                <a href="{{route('color.edit',$mau->id)}}"
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