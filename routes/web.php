<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaiKhoanController;
use App\Http\Controllers\HoaDonController;
use App\Http\Controllers\SanPhamController;
use App\Http\Controllers\LoaiSanPhamController;
use App\Http\Controllers\NhaSanXuatController;
use App\Http\Controllers\MauSacController;
use App\Http\Controllers\RamController;
use App\Http\Controllers\OCungController;
use App\Http\Controllers\MonitorController;
use App\Http\Controllers\CardDoHoaController;
use App\Http\Controllers\CPUController;
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
Route::get('/logout',[TaiKhoanController::class,'logout'])-> name('xuli-logout');
//list account
Route::get('/account/user',function(){
    return view('component/account/user');
})->name('list-user');
// Route::get('/account/admin',function(){
//     return view('component/account/admin');
// })->name('list-admin');

Route::get('/account/admin', [TaiKhoanController::class,'getTaiKhoan'])->name("list-admin");

// ----------------------Sản phẩm-------------------
Route::get('product/index', [SanPhamController::class,'index'])->name("list-product");
// Route::get('product/detail/{id}', [SanPhamController::class,'detail'])->name("detail-product");
Route::get('product/add', [SanPhamController::class,'create'])->name("create-product");
Route::get('product/store', [SanPhamController::class,'store'])->name("store-product");
Route::post('product/update', [SanPhamController::class,'update'])->name("update-product");
Route::put('product/edit/{id}', [SanPhamController::class,'edit'])->name("edit-product");
Route::delete('product/delete/{id}', [SanPhamController::class,'deystroy'])->name("delete-product");

//Route::resource('sanPham',SanPhamController::class);
Route::resource('sanPham', SanPhamController::class);//tạo ra resource để khi gọi các phương thức trong controller chỉ cần sử dụng dấu chấm vd sanPham.create, sanPham.edit
//----------------------Màu sắc-------------------------
// Route::get('color/index', [MauSacController::class,'index'])->name('list-color');
// Route::get('color/create', [MauSacController::class,'create'])->name('create-color');
// Route::get('color/show{id}', [MauSacController::class,'show'])->name('show-color');
// Route::get('color/edit/{id}', [MauSacController::class,'edit'])->name('edit-color');
// Route::post('color/update{id}', [MauSacController::class,'update'])->name('update-color');
// Route::post('color/store', [MauSacController::class,'store'])->name('store-color');
Route::resource('color', MauSacController::class);
//--------------------------Ram----------------------------------
Route::resource('ram', RamController::class);
//--------------------------Ổ Cứng----------------------------------
Route::resource('oCung', OCungController::class);
//--------------------------Màn Hình----------------------------------
Route::resource('monitor', MonitorController::class);
//--------------------------Card Đồ Họa----------------------------------
Route::resource('carddohoa', CardDoHoaController::class);
//--------------------------CPU----------------------------------
Route::resource('cpu', CPUController::class);
//--------------------------Dòng sản phẩm----------------------------------
Route::resource('type', LoaiSanPhamController::class);
//--------------------------Nhà sản xuất----------------------------------
Route::resource('manufacturer', NhaSanXuatController::class);

//-------------------------------------------------------------
Route::middleware('auth')->group(function () {
        
    //bill
    Route::get('/bill', function () {
        return view('component/bill/list_bill');
    })-> name('list-bill');
    Route::get('/bill', [HoaDonController::class,'getHoaDon'])->name("list-HoaDon");


    //Them Tai Khoan
    Route::get('/account/admin', [TaiKhoanController::class,'getTaiKhoanAdmin'])->name("list-admin");

    //account
    Route::group(['prefix' => 'account'], function () {
        //hien thi tai khoan user
        Route::get('/user',function(){
            return view('component/account/user');
        })->name('list-user');
        
        //hien thi tai khoan admin
        Route::get('/admin', [TaiKhoanController::class,'getTaiKhoanAdmin'])->name("list-admin");
        Route::get('/user', [UserController::class,'getTaiKhoanUser'])->name("list-user");
        //tao tai khoan
        // Route::get('/create', function () {
        //     return view('component/account/create_admin');
        // })->name('create-account');
        
        Route::get('/create', [TaiKhoanController::class, 'create'])->name('admin-accounts-create');
        Route::post('/create', [TaiKhoanController::class, 'addAccount'])->name('admin-accounts-addAccount');
    //test
        Route::get('/id', [TaiKhoanController::class, 'taoiduser'])->name('admin-user-id');
        //edit tai khoan
        Route::post('/edit', [TaiKhoanController::class, 'editTaiKhoan'])->name('admin-accounts-editTaiKhoan');
    });
    //route chuyen trang 
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
    Route::get('/admin/profile', function () {
        return view('component/account/edit_admin');
    })-> name('profile');
    Route::get('/admin/changepassword', function () {
        return view('component/account/change_password');
    })-> name('change_password');
});
