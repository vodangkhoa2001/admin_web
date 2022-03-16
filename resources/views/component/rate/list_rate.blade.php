@extends('layouts.app')
@section('title', 'List Rate')

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
            <h4 class="card-title">Danh sách đánh giá</h4>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>
                                ID
                            </th>
                            <th>
                                Sản phẩm
                            </th>
                            <th>
                                Tài khoản
                            </th>
                            <th>
                                Số sao
                            </th>
                            <th>
                                Nội dung
                            </th>
                            <th>
                                Trả lời
                            </th>
                            <th>
                                Trạng Thái
                            </th>
                            <th>

                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($rate as $r)
                        <tr>
                            <td>
                                {{$r->id }}
                            </td>
                            <td>
                                {{$r->sanPham->TenSanPham}}
                            </td>
                            <td>
                                {{$r->taiKhoan->TenDangNhap}}
                            </td>
                            <td>
                                @if ($r->SoSao==1)
                                <i style="color: rgb(204,204,0)" class="menu-icon mdi mdi-star"></i>
                                @endif
                                @if ($r->SoSao==2)
                                <i style="color: rgb(204,204,0)" class="menu-icon mdi mdi-star"></i>
                                <i style="color: rgb(204,204,0)" class="menu-icon mdi mdi-star"></i>
                                @endif
                                @if ($r->SoSao==3)
                                <i style="color: rgb(204,204,0)" class="menu-icon mdi mdi-star"></i>
                                <i style="color: rgb(204,204,0)" class="menu-icon mdi mdi-star"></i>
                                <i style="color: rgb(204,204,0)" class="menu-icon mdi mdi-star"></i>
                                @endif
                                @if ($r->SoSao==4)
                                <i style="color: rgb(204,204,0)" class="menu-icon mdi mdi-star"></i>
                                <i style="color: rgb(204,204,0)" class="menu-icon mdi mdi-star"></i>
                                <i style="color: rgb(204,204,0)" class="menu-icon mdi mdi-star"></i>
                                <i style="color: rgb(204,204,0)" class="menu-icon mdi mdi-star"></i>
                                @endif
                                @if ($r->SoSao==5)
                                <i style="color: rgb(204,204,0)" class="menu-icon mdi mdi-star"></i>
                                <i style="color: rgb(204,204,0)" class="menu-icon mdi mdi-star"></i>
                                <i style="color: rgb(204,204,0)" class="menu-icon mdi mdi-star"></i>
                                <i style="color: rgb(204,204,0)" class="menu-icon mdi mdi-star"></i>
                                <i style="color: rgb(204,204,0)" class="menu-icon mdi mdi-star"></i>
                                @endif
                            </td>
                            <td>
                                {{$r->NoiDung}}
                            </td>
                            <td>
                                @if ($r->TraLoi==null)
                                    Chưa trả lời đánh giá
                                @else
                                {{$r->TraLoi}}
                                @endif
                            </td>
                            <td>
                                @if ( $r->TrangThai==0) Ngừng hoạt động @endif @if ( $r->TrangThai==1) Hoạt động @endif
                            </td>
                            <td>
                                @if ($r->TraLoi==null)
                                <a href="{{route('response_rate',$r->id)}}"
                                    class="btn btn-sm btn-success"><span class="menu-icon mdi mdi-reply"></a>
                                <a href="{{route('rate.edit',$r->id)}}"
                                    class="btn btn-sm btn-warning"><span class="">Cập nhật</a>
                                @else
                                <a href="{{route('rate.edit',$r->id)}}"
                                    class="btn btn-sm btn-warning"><span class="">Cập nhật</a>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="9">
                                 Không có đánh giá nào hết
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
{{$rate->appends(request()->all())->links()}}
@endsection
@section('script')
@parent
@endsection