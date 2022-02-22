<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaiKhoanController;
use App\Http\Controllers\HoaDonController;
use Illuminate\Http\Request;
use App\Http\Controllers\UserController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
})-> name('admin');
Route::get('/product/create', function () {
    return view('component/product/create_product');
})-> name('create_product');
Route::get('/product/list', function () {
    return view('component/product/list_product');
})-> name('list_product');
Route::get('/product/edit', function () {
    return view('component/product/edit_product');
})-> name('edit_product');

//login
Route::get('/login', function () {
    return view('component/login/login');
})-> name('login');
Route::get('/register', function () {
    return view('component/login/register');
})-> name('register');
//post
Route::post('/login',[TaiKhoanController::class,'login'])-> name('xuli-login');
//list account
Route::get('/account/user',function(){
    return view('component/account/user');
})->name('list-user');
// Route::get('/account/admin',function(){
//     return view('component/account/admin');
// })->name('list-admin');

Route::get('/account/admin', [TaiKhoanController::class,'getTaiKhoan'])->name("list-admin");

// ----------------------Sản phẩm-------------------
Route::get('product/list', [SanPhamController::class,'index'])->name("list-product");
Route::get('product/create', [SanPhamController::class,'create'])->name("create-product");
Route::post('product/update', [SanPhamController::class,'update']);
Route::put('product/edit/{id}', [SanPhamController::class,'edit']);
Route::delete('product/delete/{id}', [SanPhamController::class,'deystroy']);
//Route::get('product/detail/{id}', [SanPhamController::class,'findProductDetailByProduct']);
// ----------------------Chi tiết sản phẩm--------------------
Route::get('product/detail/{id}', [ChiTietSanPhamController::class,'show']);
Route::get('product/detail/create/{id}', [ChiTietSanPhamController::class,'create']);
Route::put('product/detail/create/{id}', [ChiTietSanPhamController::class,'edit']);
Route::delete('product/detail/create/{id}', [ChiTietSanPhamController::class,'deystroy']);

//Route::resource('sanPham',SanPhamController::class);
Route::resource('sanPham', 'App\Http\Controllers\SanPhamController');
Route::resource('ctsp', ChiTietSanPhamController::class);
