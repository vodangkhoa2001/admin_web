@extends('layouts.app')
@section('title', 'List Monitor')

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
            <h4 class="card-title">Danh sách tỉ lệ màn hình</h4>
            <div>
                <a style="margin: 19px;" href="{{route('monitor.create')}}" class="btn btn-primary">Thêm tỉ lệ màn hình mới</a>
            </div>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>
                                Mã màn hình
                            </th>
                            <th>
                                Tên màn hình
                            </th>
                            <th>
                                Trạng thái
                            </th>
                            <th>

                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($monitor as $m)
                        <tr>
                            <td>
                                {{$m->id }}
                            </td>
                            <td>
                                {{$m->TenManHinh}}
                            </td>
                            <td>
                                {{$m->TrangThai}}
                            </td>
                            <td>
                                <a href="{{route('monitor.edit',$m->id)}}"
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