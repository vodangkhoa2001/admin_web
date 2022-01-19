<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LoaiSanPham;
class LoaiSanPhamController extends Controller
{
    public function category()
    {
        $loaiSP = LoaiSanPham::all();
        return json_encode([
            'success' => true,
            'data' => $loaiSP
        ]);
    }
}
