<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LoaiSanPham;
use App\Models\DongSanPham;
class LoaiSanPhamController extends Controller
{
    public function category()
    {
        $loaiSP = DongSanPham::all();
        return json_encode([
            'success' => true,
            'data' => $loaiSP
        ]);
    }
}
