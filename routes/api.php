<?php

use App\Http\Controllers\APITaiKhoanController;
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

Route:: group(['prefix'=>'products'], function(){
    Route::get('/all', [APIProducts::class,'getAllProduct']);
    Route::get('/newproduct/all', [APISanPhamController::class,'getNewProduct']);
    Route::get('/sellingproduct/all', [APISanPhamController::class,'sellingProduct']);
    Route::get('/{id}', [APISanPhamController::class,'getProductDetail']);
    Route::post('/create', [APISanPhamController::class,'create']);
    Route::put('/update/{id}', [APISanPhamController::class,'update']);
    Route::delete('/delete/{id}', [APISanPhamController::class,'delete']);
});


Route:: group(['prefix' => 'account'],function(){
    Route::post('register',[APITaiKhoanController::class],'register');
    Route::post('login',[APITaiKhoanController::class],'login');
    Route::get('{id}',[APITaiKhoanController::class],'info');
});
