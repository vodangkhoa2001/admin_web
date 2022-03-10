@extends('layouts.app')
@section('title', 'List User')

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
                  <h4 class="card-title">Users</h4>
                  <span>Tổng Số Tài Khoản : {{$accountCount}}</span>
                  <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>
                                Id
                                </th>
                                <th>
                                  Hình Ảnh
                                </th>
                                @if(Auth::User()->ID_LoaiTaiKhoan==3)
                                  <th>
                                    Tên Đăng Nhập
                                  </th>
                                @endif
                                <th>
                                Họ Tên
                                </th>
                                <th>
                                Số Điện Thoại
                                </th>
                                @if(Auth::User()->ID_LoaiTaiKhoan==3)
                                <th>
                                Chức Năng
                                </th>
                                @endif
                            </tr>
                          </thead>
                      <tbody>
                        @forelse($lstTaiKhoan as $lst)
                        <tr>
                            <td>
                                {{$lst->id}}
                            </td>
                            <td>
                              <img src="{{asset('user/images')}}/{{$lst->HinhAnh}}">
                          </td>
                          @if(Auth::User()->ID_LoaiTaiKhoan==3)
                            <td >
                                {{$lst->TenDangNhap}}
                            </td>
                            @endif
                            <td>
                                {{$lst->HoTen}}
                            </td>
                           
                            <td>
                               {{$lst->SDT}}
                            </td>
                            {{-- <td>
                               {{$lst->TrangThai_TaiKhoan}}
                                @if ($lst->TrangThai_TaiKhoan==1)
                                    active
                                    <div></div>
                                @else
                                    inactive
                                @endif --}}
                            </td>
                            @if(Auth::User()->ID_LoaiTaiKhoan==3)
                            <td>
                              
                              {{-- <a href="{{route('show-account',['id' => $lst->id])}}" class="btn btn-sm btn-warning">Edit</a> --}}
                              <a href="{{route('delete-account',['id' => $lst->id])}}" class="btn btn-sm btn-danger">Delete</a>
                            </td>
                            @endif
                        </tr>
                        @empty
                            <tr>
                                <td colspan="6">
                                    không có dữ liệu
                                </td>
                            </tr>
                            @endforelse
                            
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            {{$lstTaiKhoan->appends(request()->all())->links()}}
@endsection
@section('script')
@parent
@endsection