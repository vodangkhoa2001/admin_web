<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TaiKhoanController;
use App\Http\Controllers\HoaDonController;
use App\Http\Controllers\SanPhamController;
use App\Http\Controllers\PromoteController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\LoaiSanPhamController;
use App\Http\Controllers\NhaSanXuatController;
use App\Http\Controllers\MauSacController;
use App\Http\Controllers\RamController;
use App\Http\Controllers\OCungController;
use App\Http\Controllers\MonitorController;
use App\Http\Controllers\CardDoHoaController;
use App\Http\Controllers\CPUController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\DanhGiaController;
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
Route::get('/admin/home', [DashboardController::class, 'index'])->name('dashboard');

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

// Route::get('/home', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/account/admin', [TaiKhoanController::class,'getTaiKhoan'])->name("list-admin");

// ----------------------S???n ph???m-------------------
Route::get('product/index', [SanPhamController::class,'index'])->name("list-product");
// Route::get('product/detail/{id}', [SanPhamController::class,'detail'])->name("detail-product");
Route::get('product/add', [SanPhamController::class,'create'])->name("create-product");
Route::get('product/store', [SanPhamController::class,'store'])->name("store-product");
Route::post('product/update', [SanPhamController::class,'update'])->name("update-product");
Route::put('product/edit/{id}', [SanPhamController::class,'edit'])->name("edit-product");
Route::delete('product/delete/{id}', [SanPhamController::class,'deystroy'])->name("delete-product");
//Route::resource('sanPham',SanPhamController::class);
Route::resource('sanPham', SanPhamController::class);//t???o ra resource ????? khi g???i c??c ph????ng th???c trong controller ch??? c???n s??? d???ng d???u ch???m vd sanPham.create, sanPham.edit
Route::get('/search', [SearchController::class,'searchResult'])->name("search-product");
Route::get('product/sortPriceDesc', [SanPhamController::class,'sortByPriceDESC'])->name("sortDESC-product");
Route::get('product/sortPriceAsc', [SanPhamController::class,'sortByPriceASC'])->name("sortASC-product");
Route::get('product/sortType', [SanPhamController::class,'sortByType'])->name("sortType-product");
// Route::get('search/name', [SearchController::class,'getSearchAjax'])->name("search-product");
//----------------------S???n ph???m khuy???n m??i-------------------------
Route::resource('promote', PromoteController::class);
//----------------------B??ng ron khuy???n m??i-------------------------
Route::resource('banner', BannerController::class);
//----------------------M??u s???c-------------------------
// Route::get('color/index', [MauSacController::class,'index'])->name('list-color');
// Route::get('color/create', [MauSacController::class,'create'])->name('create-color');
// Route::get('color/show{id}', [MauSacController::class,'show'])->name('show-color');
// Route::get('color/edit/{id}', [MauSacController::class,'edit'])->name('edit-color');
// Route::post('color/update{id}', [MauSacController::class,'update'])->name('update-color');
// Route::post('color/store', [MauSacController::class,'store'])->name('store-color');
Route::resource('color', MauSacController::class);
//--------------------------Ram----------------------------------
Route::resource('ram', RamController::class);
//--------------------------??? C???ng----------------------------------
Route::resource('oCung', OCungController::class);
//--------------------------M??n H??nh----------------------------------
Route::resource('monitor', MonitorController::class);
//--------------------------Card ????? H???a----------------------------------
Route::resource('carddohoa', CardDoHoaController::class);
//--------------------------CPU----------------------------------
Route::resource('cpu', CPUController::class);
//--------------------------D??ng s???n ph???m----------------------------------
Route::resource('type', LoaiSanPhamController::class);
//--------------------------Nh?? s???n xu???t----------------------------------
Route::resource('manufacturer', NhaSanXuatController::class);
//--------------------------????nh gi??----------------------------------
Route::resource('rate', DanhGiaController::class);
Route::get('rate/response/{id}',[DanhGiaController::class,'response'] )->name('response_rate');
Route::post('rate/update/{id}',[DanhGiaController::class,'store'] )->name('update_rate');

//-------------------------------------------------------------
Route::middleware('auth')->group(function () {
        
    //bill
    Route::get('/bill', function () {
        return view('component/bill/list_bill');
    })-> name('list-bill');
    Route::get('/bill/bill', [HoaDonController::class,'getHoaDon'])->name("list-HoaDon");

    Route::get('/bill/huy', [HoaDonController::class,'getHoaDonHuy'])->name("list-HoaDonHuy");
    Route::get('/bill/choxacnhan', [HoaDonController::class,'getHoaDonChoXacNhan'])->name("list-HoaDonChoXacNhan");
    Route::get('/bill/daxacnhan', [HoaDonController::class,'getHoaDonDaXacNhan'])->name("list-HoaDonDaXacNhan");
    Route::get('/bill/chovanchuyen', [HoaDonController::class,'getHoaDonChoVanChuyen'])->name("list-HoaDonChoVanChuyen");
    Route::get('/bill/dangvangchuyen', [HoaDonController::class,'getHoaDonDangVanChuyen'])->name("list-HoaDonDangVanChuyen");
    Route::get('/bill/dagiao', [HoaDonController::class,'getHoaDonDaGiao'])->name("list-HoaDonDaGiao");
    Route::get('/bill/{id}', [HoaDonController::class,'TrangThaiHoaDon'])->name("xacnhan-trangthai-hoadon");
    Route::get('/bill/huy/{id}', [HoaDonController::class,'HuyHoaDon'])->name("huy-hoadon");
    Route::get('/search/hd', [SearchController::class,'searchResult1'])->name("search-bill");
    


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

        //xoa tai khoan 
        Route::get('/delete/{id}', [TaiKhoanController::class,'delete'])->name("delete-account");
            //edit list account
        Route::get('/edit/{id}', [TaiKhoanController::class,'show'])->name("show-account");
        Route::post('/edit/account', [TaiKhoanController::class, 'editTaiKhoanUser'])->name('editTaiKhoanUser');
        
        Route::get('/create', [TaiKhoanController::class, 'create'])->name('admin-accounts-create');
        Route::post('/create', [TaiKhoanController::class, 'addAccount'])->name('admin-accounts-addAccount');
    //test
        Route::get('/id', [TaiKhoanController::class, 'taoiduser'])->name('admin-user-id');
        //edit tai khoan
        Route::post('/edit', [TaiKhoanController::class, 'editTaiKhoan'])->name('admin-accounts-editTaiKhoan');
        //doi mat khau 
        Route::post('/changepassword', [TaiKhoanController::class, 'changePassword'])->name('admin-accounts-changePassword');
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
