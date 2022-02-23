@extends('layouts.app')
@section('title', 'List Admin')

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
            <h4 class="card-title">Admins</h4>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>
                                Id
                            </th>
                            <th>
                                Username
                            </th>
                            <th>
                                Full Name
                            </th>
                            <th>
                                Phone
                            </th>
                            <th>
                                Status
                            </th>
                            <th>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- test --}}
                        @foreach ($lstTaiKhoan as $lst)
                        <tr>
                            <td>
                                {{$lst->id}}
                            </td>
                            <td>
                                {{$lst->TenDangNhap}}
                            </td>
                            <td>
                                {{$lst->HoTen}}
                            </td>
                            <td>
                                {{$lst->SDT}}
                            </td>
                            <td>
                                {{-- {{$lst->TrangThai_TaiKhoan}} --}}

                                @if ($lst->TrangThai_TaiKhoan==1)
                                active
                                <div></div>
                                @else
                                inactive
                                @endif
                            </td>
                            <td>
                                <a href="{{route('edit_product')}}" class="btn btn-sm btn-warning">Edit</a>
                                <a href="#" class="btn btn-sm btn-danger">Delete</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6">
                                không có dữ liệu
                            </td>
                        </tr>
                        @endforelse
                        {{-- test --}}
                        <tr>
                            <td>
                                2
                            </td>
                            <td class="py-1">
                                <img src="../../images/faces/face2.jpg" alt="image" />
                            </td>
                            <td>
                                Messsy Adam
                            </td>
                            <td>
                                <div class="progress">
                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 75%"
                                        aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </td>
                            <td>
                                $245.30
                            </td>
                            <td>
                                <a href="{{route('edit_product')}}" class="btn btn-sm btn-warning">Edit</a>
                                <a href="#" class="btn btn-sm btn-danger">Delete</a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                3
                            </td>
                            <td class="py-1">
                                <img src="../../images/faces/face3.jpg" alt="image" />
                            </td>
                            <td>
                                John Richards
                            </td>
                            <td>
                                <div class="progress">
                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 90%"
                                        aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </td>
                            <td>
                                $138.00
                            </td>
                            <td>
                                <a href="{{route('edit_product')}}" class="btn btn-sm btn-warning">Edit</a>
                                <a href="#" class="btn btn-sm btn-danger">Delete</a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                4
                            </td>
                            <td class="py-1">
                                <img src="../../images/faces/face4.jpg" alt="image" />
                            </td>
                            <td>
                                Peter Meggik
                            </td>
                            <td>
                                <div class="progress">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 50%"
                                        aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </td>
                            <td>
                                $ 77.99
                            </td>
                            <td>
                                <a href="{{route('edit_product')}}" class="btn btn-sm btn-warning">Edit</a>
                                <a href="#" class="btn btn-sm btn-danger">Delete</a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                5
                            </td>
                            <td class="py-1">
                                <img src="../../images/faces/face5.jpg" alt="image" />
                            </td>
                            <td>
                                Edward
                            </td>
                            <td>
                                <div class="progress">
                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 35%"
                                        aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </td>
                            <td>
                                $ 160.25
                            </td>
                            <td>
                                <a href="{{route('edit_product')}}" class="btn btn-sm btn-warning">Edit</a>
                                <a href="#" class="btn btn-sm btn-danger">Delete</a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                6
                            </td>
                            <td class="py-1">
                                <img src="../../images/faces/face6.jpg" alt="image" />
                            </td>
                            <td>
                                John Doe
                            </td>
                            <td>
                                <div class="progress">
                                    <div class="progress-bar bg-info" role="progressbar" style="width: 65%"
                                        aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </td>
                            <td>
                                $ 123.21
                            </td>
                            <td>
                                <a href="{{route('edit_product')}}" class="btn btn-sm btn-warning">Edit</a>
                                <a href="#" class="btn btn-sm btn-danger">Delete</a>
                            </td>
                        </tr>

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
