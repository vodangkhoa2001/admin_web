@extends('layouts.app')
@section('title', 'List Graphics Card')

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
            <h4 class="card-title">Danh sách Card đồ họa</h4>
            <div>
                <a style="margin: 19px;" href="{{route('carddohoa.create')}}" class="btn btn-primary">Thêm Card đồ họa mới</a>
            </div>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>
                                Mã Card đồ họa
                            </th>
                            <th>
                                Tên Card đồ họa
                            </th>
                            <th>
                                Trạng thái
                            </th>
                            <th>

                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($carddohoa as $card)
                        <tr>
                            <td>
                                {{$card->id }}
                            </td>
                            <td>
                                {{$card->TenCardDoHoa}}
                            </td>
                            <td>
                                {{$card->TrangThai}}
                            </td>
                            <td>
                                <a href="{{route('carddohoa.edit',$card->id)}}"
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