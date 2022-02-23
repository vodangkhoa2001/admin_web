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
                  @if(Auth::User()->ID_LoaiTaiKhoan==3)

                  <a href="{{route('admin-accounts-create')}}"><button  class="btn btn-sm btn-success">Thêm Mới Admin<i class="material-icons ">add_circle</i></button></a>

                  @endif
                  <span>Tổng Số Tài Khoản : {{$accountCount}}</span>

                  @if ( Session::has('success') )
	<div class="alert alert-success alert-dismissible" role="alert">
		<strong>{{ Session::get('success') }}</strong>

	</div>
@endif
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
                        {{-- test --}}
                        @forelse($lstTaiKhoan as $lst)
                        <tr>
                            <td>
                                {{$lst->id}}
                            </td>
                            <td>
                              <img src="{{asset('admin/images')}}/{{$lst->HinhAnh}}">
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

                              <a href="{{route('edit_product')}}" class="btn btn-sm btn-warning">Edit</a>
                              <a href="#" class="btn btn-sm btn-danger">Delete</a>
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

                        {{-- test --}}
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
        {{-- phan trang --}}
        {{$lstTaiKhoan->appends(request()->all())->links()}}

@endsection

@section('script')
@parent
@endsection
