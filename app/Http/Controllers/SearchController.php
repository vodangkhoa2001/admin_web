<?php

namespace App\Http\Controllers;

use App\Models\SanPham;
use App\Models\TaiKhoan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Models\HoaDon;

class SearchController extends Controller
{
    public function getSearch(Request $request)
    {
        return view('component.product.search_product');
    }
    function getSearchAjax(Request $request)
    {
        $lstProduct = SanPham::where('TenSanPham', 'LIKE', '%'.$request->get('search').'%')->get();
        return response()->json($lstProduct);
        //return Redirect::route('sanPham.index',compact('lstProduct'));
    //     if($request->get('query'))
    //     {
    //         $query = $request->get('query');
    //         $data = DB::table('sanpham')
    //         ->where('TenSanPham', 'LIKE', "%{$query}%")
    //         ->get();
    //         $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
    //         foreach($data as $row)
    //         {
    //            $output .= '
    //            <li><a href="sanpham.Index"></a></li>
    //            ';
    //        }
    //        $output .= '</ul>';
    //        echo $output;
    //    }
    }
    public function searchResult(Request $request){
        $keyword = $request->input('search');
        $pResult = null;
        $nResult = null;
        if($keyword != null){
            $productResult = SanPham::productSearch($keyword, 5);
        }
        return view('component.product.search_product')->with(compact('productResult'));
    }
    public function searchResult1(Request $request){
        $keyword = $request->input('search');
        $pResult = null;
        $nResult = null;
        if($keyword != null){
            $billResult = HoaDon::Where('SELECT taikhoan.TenDangNhap FROM taikhoan,hoadon WHERE taikhoan.id=hoadon.MaTaiKhoan', 'like', '%' . $keyword . '%');
        }
        return view('component.bill.list_bill_search')->with(compact('billResult'));
    }

}
