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
            <h4 class="card-title">Sắp xếp theo giá</h4>
            <div class="row">
                <div class="col-sm-2">
                    <form mothod ="get" id="form_order" action="{{ route('sortDESC-product') }}">
                        @csrf
                        <input class="btn btn-success" type="submit" name="ok" value="Giá giảm dần" />
                    </form>
                </div>
                <div class="col-sm-10">
                    <form mothod ="get" id="form_order" action="{{ route('sortASC-product') }}">
                        @csrf
                        <input class="btn btn-success" type="submit" name="ok" value="Giá tăng dần" />
                    </form>
                </div>
            </div>
            <h4 class="card-title">Sắp xếp theo dòng sản phẩm</h4>
            <div class="row">
                @foreach ($lstDongSanPham as $dongSanPham)
                @if($dongSanPham->TrangThai_DongSanPham==1)
                <div class="col">
                    <form mothod ="get" id="form_order" action="{{ route('sortType-product') }}">
                        @csrf
                        <input class="btn btn-dark" type="submit" name="ok" value="{{ $dongSanPham->TenDongSanPham }}" />
                    </form>
                </div>
                @endif
            @endforeach
            </div>
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
                        @forelse ($sortProduct as $sanPham)
                        <tr>
                            <td>
                                {{ $sanPham->id }}
                            </td>
                            <td>
                                {{ $sanPham->TenSanPham }}
                            </td>
                            <td>
                                {{ $sanPham->MaDongSanPham}}
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
                                <img src="{{ asset('images/product')}}/{{ $sanPham->HinhAnh }}">
                            </td>
                            <td >
                                <a href="{{route('sanPham.show',$sanPham->id)}}"
                                    class="btn btn-sm btn btn-info"><span style="font-size: 20px;" class="menu-icon mdi mdi-dots-horizontal"></a>
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
{{$lstSanPham->appends(request()->all())->links()}}
@endsection

{{-- Bắt sự kiện khi click vào select sắp xếp tăng dần, giảm dần --}}
@section('script')
<script type="text/javascript">
        $(document).ready(function(){
            $('#sort').on(change, function(){
                var url = $(this).val();
                //alert(url);
                if(url){
                    window.location = url;
                }
                return false;
            });
        });
</script>
@parent
@endsection
