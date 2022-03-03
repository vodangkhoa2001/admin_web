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
                <a style="margin: 19px;" href="{{route('create-color')}}" class="btn btn-primary">Thêm màu mới</a>
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

                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($lstMauSac as $mauSac)
                        <tr>
                            <td>
                                {{$mauSac->id }}
                            </td>
                            <td>
                                {{$mauSac->TenMau}}
                            </td>
                            <td>
                                <a href="{{route('edit-color',['id' =>$mauSac->id])}}"
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