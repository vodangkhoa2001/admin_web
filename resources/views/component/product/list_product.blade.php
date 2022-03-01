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
            <h4 class="card-title">Danh sách sản phẩm</h4>
            <div>
                <a style="margin: 19px;" href="{{ route('create-product')}}" class="btn btn-primary">Thêm sản phẩm
                    mới</a>
            </div>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>
                                Mã sản phẩm
                            </th>
                            <th>
                                Tên sản phẩm
                            </th>
                            <th>
                                Dòng sản phẩm
                            </th>
                            <th>
                                Nhà sản xuất
                            </th>
                            <th>
                                Số lượng
                            </th>
                            <th>
                                Giá nhập
                            </th>
                            <th>
                                Giá bán
                            </th>
                            <th>
                                Hình ảnh
                            </th>
                            <th>
                                Mô tả
                            </th>
                            <th>

                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($lstSanPham as $sanPham)
                        <tr>
                            <td>
                                {{ $sanPham->id }}
                            </td>
                            <td>
                                {{ $sanPham->TenSanPham }}
                            </td>
                            <td>
                                {{ $sanPham->MaDongSanPham }}
                            </td>
                            <td>
                                {{ $sanPham->MaNhaSanXuat }}
                            </td>
                            <td>
                                {{ $sanPham->SoLuong }}
                            </td>
                            <td>
                                {{ $sanPham->GiaNhap }}
                            </td>
                            <td>
                                {{ $sanPham->GiaBan }}
                            </td>
                            <td class="py-1">
                                <img src="{{ asset('product/images')}}/{{ $sanPham->HinhAnh }}">
                            </td>
                            <td>
                                {{ $sanPham->MoTa}}
                            </td>
                            <td>
                                <a href=""
                                    class="btn btn-sm btn btn-info"><span class="glyphicon glyphicon-pencil">Chi tiết</a>
                                <a href="{{ route('sanPham.edit',['sanPham'=>$sanPham]) }}"
                                    class="btn btn-sm btn-warning"><span class="glyphicon glyphicon-pencil">Sửa</a>
                                <a href="{{ route('sanPham.destroy',['sanPham'=>$sanPham]) }}"
                                    class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-trash">Xóa</a>
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

@endsection
@section('script')
@parent
@endsection