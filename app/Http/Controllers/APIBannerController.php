<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class APIBannerController extends Controller
{
    public function getBanner()
    {
        $banner = DB::select('select * from banner where TrangThai = 1');
        return response(["data" => $banner]);
    }
}
