<?php

use App\Http\Controllers\APISanPhamController as APIProducts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SanPhamController;
use App\Http\Controllers\LoaiSanPhamController;
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



<<<<<<< HEAD
Route::get('account/infor/{id}',[UserController::class,'userInfo']);
=======
Route::post('account/login/user', [APITaiKhoanController::class,'login']);
Route::post('account/changepassword/user', [APITaiKhoanController::class,'changePassword']);

Route::get('account/{id}',[UserController::class,'userInfo']);
>>>>>>> dfe7465163aaeafa25396bf436d99c4d52a605b2
Route::post('account/sign-up',[UserController::class,'signUp']);
// Route::post('account/login',[UserUserController::class,'login']);
