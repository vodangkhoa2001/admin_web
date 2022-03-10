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
            <h4 class="card-title">Sản phẩm cần tìm</h4>
            <div>
                <a style="margin: 19px;" href="{{ route('create-product')}}" class="btn btn-primary">Thêm sản phẩm
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
                                Tên sản phẩm
                            </th>
                            <th>
                                Dòng sản phẩm
                            </th>
                            {{-- <th>
                                Nhà sản xuất
                            </th> --}}
                            <th>
                                Số lượng
                            </th>
                            <th>
                                Giá bán
                            </th>
                            <th>
                                Hình ảnh
                            </th>
                            <th>

                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($productResult as $sanPham)
                        <tr>
                            <td>
                                {{ $sanPham->id }}
                            </td>
                            <td>
                                {{ $sanPham->TenSanPham }}
                            </td>
                            <td>
                                {{ $sanPham->dongSanPham->TenDongSanPham}}
                            </td>
                            {{-- <td>
                                {{ $sanPham->nhaSanXuat->TenNhaSanXuat }}
                            </td> --}}
                            <td>
                                {{ $sanPham->SoLuong }}
                            </td>
                            <td>
                                {{ number_format(( $sanPham->GiaBan), 0, ',', '.')." VNĐ"}}
                            </td>
                            <td class="py-1">
                                <img src="{{ asset('product/images')}}/{{ $sanPham->HinhAnh }}">
                            </td>
                            <td >
                                <a href="{{route('sanPham.show',$sanPham->id)}}"
                                    class="btn btn-sm btn btn-info"><span style="font-size: 20px;" class="menu-icon mdi mdi-dots-horizontal"></a>
                                <a href="{{ route('sanPham.edit',['sanPham'=>$sanPham]) }}"
                                    class="btn btn-sm btn-warning"><span  style="font-size: 20px;" class="menu-icon mdi mdi-table-edit"></a>
                                <a href="{{ route('sanPham.destroy',['sanPham'=>$sanPham]) }}"
                                    class="btn btn-sm btn-danger"><span style="font-size: 20px;" class="menu-icon mdi mdi-delete"></a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="9">
                                Không có sản phẩm nào hết
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
{{-- {{$lstSanPham->links("pagination::bootstrap-4")}} --}}
{{ $productResult->appends(Request::all())->links() }}
@endsection
@section('script')
@parent
@endsection