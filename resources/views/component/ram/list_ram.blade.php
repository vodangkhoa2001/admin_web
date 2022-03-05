@extends('layouts.app')
@section('title', 'List RAM')

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
            <h4 class="card-title">Danh sách RAM</h4>
            <div>
                <a style="margin: 19px;" href="{{route('ram.create')}}" class="btn btn-primary">Thêm RAM mới</a>
            </div>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>
                                Mã RAM
                            </th>
                            <th>
                                Tên RAM
                            </th>
                            <th>
                                Trạng thái
                            </th>
                            <th>

                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($ram as $r)
                        <tr>
                            <td>
                                {{$r->id }}
                            </td>
                            <td>
                                {{$r->TenRam}}
                            </td>
                            <td>
                                @if ( $r->TrangThai==0) Ngừng kinh doanh @endif @if ( $r->TrangThai==1) Kinh doanh @endif
                            </td>
                            <td>
                                <a href="{{route('ram.edit',$r->id)}}"
                                    class="btn btn-sm btn-warning"><span class="glyphicon glyphicon-pencil">Cập nhật</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="9">
                                 Chưa hiển thị RAM
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