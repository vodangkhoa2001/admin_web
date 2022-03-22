@extends('layouts.app')
@section('title', 'List Bill Search')

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
                  <h4 class="card-title">Danh sách hóa đơn cần tìm</h4>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                            <th>
                                ID
                            </th>
                            <th>
                            Người Dùng
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
                          @forelse($billResult as $lst)
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
@endsection
@section('script')
@parent
@endsection