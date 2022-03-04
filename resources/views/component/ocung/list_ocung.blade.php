@extends('layouts.app')
@section('title', 'Danh Sách Ổ Cứng')

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
            <h4 class="card-title">Danh sách ổ cứng</h4>
            <div>
                <a style="margin: 19px;" href="{{route('oCung.create')}}" class="btn btn-primary">Thêm ổ cứng mới</a>
            </div>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>
                                Mã ổ cứng
                            </th>
                            <th>
                                Tên ổ cứng
                            </th>
                            <th>
                                Trạng thái
                            </th>
                            <th>

                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($oCung as $ocung)
                        <tr>
                            <td>
                                {{$ocung->id }}
                            </td>
                            <td>
                                {{$ocung->TenOCung}}
                            </td>
                            <td>
                                {{$ocung->TrangThai}}
                            </td>
                            <td>
                                <a href="{{route('oCung.edit',$ocung->id)}}"
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