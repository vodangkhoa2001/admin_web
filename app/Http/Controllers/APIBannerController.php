<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class APIBannerController extends Controller
{
    public function getBanner()
    {
        $banner = DB::select('select * from banner');
        return response(["data" => $banner]);
    }
}
