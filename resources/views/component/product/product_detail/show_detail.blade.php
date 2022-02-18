{{-- Kế thừa từ layout.app --}}
@extends('layouts.app')
@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Danh sách chi tiết sản phẩm</h4>
            <div>
                <a style="margin: 19px;" href="{{ route('ctsp.create')}}" class="btn btn-primary">Thêm chi tiết sản phẩm
                    mới</a>
            </div>
            <div>Mã sản phẩm: </div>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>
                                Mã sản phẩm
                            </th>
                            <th>
                                Màu sắc
                            </th>
                            <th>
                                Ram
                            </th>
                            <th>
                                Ổ cứng
                            </th>
                            <th>
                                Màn hình
                            </th>
                            <th>
                                Card đồ họa
                            </th>
                            <th>
                                Mô tả
                            </th>
                            <th>
                                Trạng thái
                            </th>
                            <th>

                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (is_array($lstCTSP) || is_object($lstCTSP)){                        
                        @forelse ($lstCTSP as $ctsp)
                        <tr>
                            <td>
                                {{ $ctsp->MaSanPham }}
                            </td>
                            <td>
                                {{ $ctsp->MauSac }}
                            </td>
                            <td>
                                {{ $ctsp->Ram }}
                            </td>
                            <td>
                                {{ $ctsp->OCung }}
                            </td>
                            <td>
                                {{ $ctsp->ManHinh }}
                            </td>
                            <td>
                                {{ $ctsp->CardDoHoa }}
                            </td>
                            <td>
                                {{ $ctsp->MoTa }}
                            </td>
                            <td>
                                {{ $ctsp->TrangThai_ChiTietSanPham}}
                            </td>
                            <td>
                                <a href="{{ route('ctsp.edit',['ctsp'=>$ctsp]) }}"
                                    class="btn btn-sm btn-warning"><span class="glyphicon glyphicon-pencil">Sửa</a>
                                <a href="{{ route('ctsp.destroy',['ctsp'=>$ctsp]) }}"
                                    class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-trash">Xóa</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="9">
                                Chưa có chi tiết sản phẩm
                            </td>
                        </tr>
                        @endforelse
                    }@else{
                        <td colspan="9">
                            Chưa có chi tiết sản phẩm
                        </td>
                    }
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection