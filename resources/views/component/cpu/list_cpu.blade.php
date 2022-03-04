@extends('layouts.app')
@section('title', 'List CPU')

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
            <h4 class="card-title">Danh sách CPU</h4>
            <div>
                <a style="margin: 19px;" href="{{route('cpu.create')}}" class="btn btn-primary">Thêm CPU mới</a>
            </div>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>
                                Mã CPU
                            </th>
                            <th>
                                Tên CPU
                            </th>
                            <th>
                                Trạng thái
                            </th>
                            <th>

                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($cpu as $c)
                        <tr>
                            <td>
                                {{$c->id }}
                            </td>
                            <td>
                                {{$c->TenCPU}}
                            </td>
                            <td>
                                {{$c->TrangThai}}
                            </td>
                            <td>
                                <a href="{{route('cpu.edit',$c->id)}}"
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