<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaiKhoanController;


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

// Route::get('/account/admin',function(){
//     return view('component/account/admin');
// })->name('list-admin');

//account
Route::group(['prefix' => 'account'], function () {
//hien thi tai khoan user
Route::get('/user',function(){
    return view('component/account/user');
})->name('list-user');

//hien thi tai khoan admin
Route::get('/admin', [TaiKhoanController::class,'getTaiKhoanAdmin'])->name("list-admin");

//tao tai khoan
// Route::get('/create', function () {
//     return view('component/account/create_admin');
// })->name('create-account');

Route::get('/create', [TaiKhoanController::class, 'create'])->name('admin-accounts-create');
Route::post('/create', [TaiKhoanController::class, 'addAccount'])->name('admin-accounts-addAccount');

});

//Them Tai Khoan
Route::get('/account/admin', [TaiKhoanController::class,'getTaiKhoanAdmin'])->name("list-admin");
//
