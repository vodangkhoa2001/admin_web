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
                  
                    <h4 class="card-title ">Danh sách hóa đơn</h4>
                    {{-- <form class="search-form" action="{{ route('search-bill') }}" method="get">
                      <div class="row">
                        <input style="margin-left:17px;" type="search" name="search" value="{{ old('search') }}" class="col-sm-10" placeholder="Nhập tên tài khoản cần tìm" title="Search here">
                        <input style="margin-left:3px;"class="col-sm-1" type="submit" name="ok" value="search" />
                      </div>
                    </form> --}}
                  
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                            <th>
                                ID
                            </th>
                            <th>
                            Tên đăng nhập
                            </th>
                            <th>
                            Địa Chỉ
                            </th>
                            <th>
                            Số Điện Thoại
                            </th>
                            <th>
                            Giá
                            </th>
                            <th>
                                Trạng Thái
                            </th>
                        </tr>
                      </thead>
                      <tbody> 
                          @forelse($lsthoadon as $lst)
                        <tr>
                            <td>
                                {{$lst->id}}
                            </td>
                            <td>
                                {{$lst->taiKhoan->TenDangNhap}}
                          </td>
                            <td >
                                {{$lst->DiaChiGiaoHang}}
                            </td>
                            <td>
                                {{$lst->SDT_GiaoHang}}
                            </td>
                           
                            <td>
                               {{$lst->TongTien}}
                            </td>
                            <td>
                               
                                @if ($lst->TrangThai_HoaDon==2)
                                Chờ Vận Chuyển
                             @elseif ($lst->TrangThai_HoaDon==3)
                                Đang Vận Chuyển
                             @elseif ($lst->TrangThai_HoaDon==4)
                                Đã Giao
                                @elseif ($lst->TrangThai_HoaDon==1)
                                Chờ Xác Nhận
                             @else
                                <div class="text-danger">
                                 Đã Hủy
                             </div>
                             @endif
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
                            <td> 
                              {{-- <a href="{{route('edit_product')}}" class="btn btn-sm btn-warning">Edit</a>
                              <a href="#" class="btn btn-sm btn-danger">Delete</a> --}}
                            </td>
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
            {{$lsthoadon->appends(request()->all())->links()}}
@endsection
@section('script')
@parent
@endsection