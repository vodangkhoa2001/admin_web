<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SanPhamController;
use App\Http\Controllers\LoaiSanPhamController;
use App\Http\Controllers\UserController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('category', [LoaiSanPhamController::class,'category']);
Route::get('product', [SanPhamController::class,'listProduct']);
Route::get('product/detail/{id}', [SanPhamController::class,'detail']);
Route::post('product/create', [SanPhamController::class,'create']);


Route::get('account/{id}',[UserController::class,'userInfo']);
Route::post('account/sign-up',[UserController::class,'signUp']);
// Route::post('account/login',[UserUserController::class,'login']);
