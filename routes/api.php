<?php

use App\Http\Controllers\APISanPhamController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SanPhamController;
use App\Http\Controllers\APILoaiSanPhamController;
use App\Http\Controllers\APIHoaDonController;

use App\Http\Controllers\UserController;
use App\Http\Controllers\APITaiKhoanController;
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

Route::get('category', [APILoaiSanPhamController::class,'getAllProductType']);
Route::get('product', [SanPhamController::class,'listProduct']);

Route:: group(['prefix'=>'products'], function(){
    Route::get('/all', [APISanPhamController::class,'getAllProduct']);
    Route::get('/newproduct/all', [APISanPhamController::class,'getNewProduct']);
    Route::get('/sellingproduct/all', [APISanPhamController::class,'sellingProduct']);
    Route::get('/{id}', [APISanPhamController::class,'getProductDetail']);
    Route::post('/create', [APISanPhamController::class,'create']);
    Route::put('/update/{id}', [APISanPhamController::class,'update']);
    Route::delete('/delete/{id}', [APISanPhamController::class,'delete']);
    Route::get('/type/{id}',[APISanPhamController::class,'getProductByType']);
});


Route:: group(['prefix' => 'account'],function(){
    Route::post('register','App\Http\Controllers\APITaiKhoanController@SignUp');
    Route::post('login','App\Http\Controllers\APITaiKhoanController@login');
    Route::post('password','App\Http\Controllers\APITaiKhoanController@changePassword');
    Route::get('{id}','App\Http\Controllers\APITaiKhoanController@info');
    Route::post('edit-name/{id}','App\Http\Controllers\APITaiKhoanController@changeName');
    Route::post('edit-address/{id}','App\Http\Controllers\APITaiKhoanController@changeAddress');

});
Route:: group(['prefix' => 'invoice'],function(){
    Route::get('/{id}',[APIHoaDonController::class,'getHoaDon']);
});

