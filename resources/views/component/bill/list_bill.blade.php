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
                  <h4 class="card-title">List Product</h4>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                            <th>
                                id
                            </th>
                            <th>
                            người dùng
                            </th>
                            <th>
                            Name
                            </th>
                            <th>
                            Amount
                            </th>
                            <th>
                            Price
                            </th>
                            <th>
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
                                {{$lst->MaTaiKhoan}}
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
                                {{$lst->TrangThai_HoaDon}}
                                @if ($lst->TrangThai_HoaDon==1)
                                    Chờ Xác Nhận
                                <div></div>
                                @elseif ($lst->TrangThai_HoaDon==2)
                                    đang giao
                                @elseif ($lst->TrangThai_HoaDon==3)
                                    đã giao
                                @else
                                    đã hủy
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