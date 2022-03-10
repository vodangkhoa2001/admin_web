@extends('layouts.app')
@section('title', 'List Promote Product')

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
            <h4 class="card-title">Danh sách sản phẩm khuyến mãi</h4>
            <div>
                <a style="margin: 19px;" href="{{ route('promote.create')}}" class="btn btn-primary">Thêm sản phẩm
                    mới</a>
            </div>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>
                                ID
                            </th>
                            <th>
                                Tên sản phẩm khuyến mãi
                            </th>
                            <th>
                               Đơn giá khuyến mãi
                            </th>
                            <th>
                                Số lượng
                            </th>
                            <th>
                                Ngày bắt đầu
                            </th>
                            <th>
                                Ngày kết thúc
                            </th>
                            {{-- <th>
                                Mô tả
                            </th> --}}
                            <th>

                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($promote as $p)
                        <tr>
                            <td>
                                {{ $p->id}}
                            </td>
                            <td>
                                {{ $p->sanPham->TenSanPham }}
                            </td>
                            <td>
                                {{ number_format(( $p->DonGiaKhuyenMai), 0, ',', '.')." VNĐ"}}
                            </td>
                            <td>
                                {{ $p->SoLuongKhuyenMai }}
                            </td>
                            <td>
                                {{ $p->NgayBatDau }}
                            </td>
                            <td>
                                {{ $p->NgayKetThuc }}
                            </td>
                            {{-- <td>
                                {{ $p->MoTa }}
                            </td> --}}
                            <td>
                                <a href="{{route('promote.show',$p->id)}}"
                                    class="btn btn-sm btn btn-info"><span style="font-size: 20px;" class="menu-icon mdi mdi-dots-horizontal"></a>
                                <a href="{{ route('promote.edit',$p->id) }}"
                                    class="btn btn-sm btn-warning"><span  style="font-size: 20px;" class="menu-icon mdi mdi-table-edit"></a>
                                <a href="{{ route('promote.destroy',$p->id) }}"
                                    class="btn btn-sm btn-danger"><span style="font-size: 20px;" class="menu-icon mdi mdi-delete"></a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="9">
                                Không có sản phẩm khuyến mãi nào hết
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
{{$promote->appends(request()->all())->links()}}
@endsection
@section('script')
@parent
@endsection