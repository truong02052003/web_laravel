<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class,'index'])->name('home.index');
Route::get('/about', [HomeController::class,'about'])->name('home.about');
Route::get('/category/{cat}', [HomeController::class,'category'])->name('home.category');
Route::get('/product/{product}', [HomeController::class,'product'])->name('home.product');
Route::get('/favorite/{product}', [HomeController::class,'favorite'])->name('home.favorite');


Route::group(['prefix'=>'account'],function(){
    Route::get('/login', [AccountController::class,'login'])->name('account.login');
    Route::get('/logout', [AccountController::class,'logout'])->name('account.logout');
    Route::get('/veryfy-account/{email}', [AccountController::class,'veryfy'])->name('account.veryfy');
    Route::post('/login', [AccountController::class,'check_login']);

    Route::get('/register', [AccountController::class,'register'])->name('account.register');
    Route::get('/favorite', [AccountController::class,'favorite'])->name('account.favorite');
    Route::post('/register', [AccountController::class,'check_register']);
    

    Route::get('/profile', [AccountController::class,'profile'])->name('account.profile');
    Route::post('/profile', [AccountController::class,'check_profile']);

    Route::get('/change-password', [AccountController::class,'change_password'])->name('account.change_password');
    Route::post('/change-password', [AccountController::class,'check_change_password']);

    Route::get('/forgot-password', [AccountController::class,'forgot_password'])->name('account.forgot_password');
    Route::post('/forgot-password', [AccountController::class,'check_forgot_passwordd']);

    Route::get('/reset-password', [AccountController::class,'reset_password'])->name('account.reset_password');
    Route::post('/reset-password', [AccountController::class,'check_reset_passwordd']);


   
});
Route::group(['prefix'=>'cart'],function(){
    Route::get('/', [CartController::class,'index'])->name('cart.index');
    Route::get('/add{product}', [CartController::class,'add'])->name('cart.add');
    Route::get('/delete{product}', [CartController::class,'delete'])->name('cart.delete');
    Route::get('/update{product}', [CartController::class,'update'])->name('cart.update');
    Route::get('/clear', [CartController::class,'clear'])->name('cart.clear');

});

Route::group(['prefix'=>'order'],function(){
    Route::get('/checkout', [CheckoutController::class,'checkout'])->name('order.checkout');
    Route::get('/history', [CheckoutController::class,'history'])->name('order.history');
    Route::get('/detail/{order}', [CheckoutController::class,'detail'])->name('order.detail');
    Route::post('/checkout', [CheckoutController::class,'post_checkout']);
    Route::get('/verify/{token}', [CheckoutController::class,'verify'])->name('order.verify');

 
    
});

Route::group(['prefix'=>'admin','middleware'=>'auth'],function(){
    Route::get('/',[AdminController::class,'index'])->name('admin.index');
    Route::get('/logout',[AdminController::class,'logout'])->name('admin.logout');
    Route::get('/order',[OrderController::class,'index'])->name('order.index');
    Route::get('/order/detail/{order}',[OrderController::class,'show'])->name('order.show');
    Route::get('/order/update-status/{order}',[OrderController::class,'update'])->name('order.update');

    Route::resource('category',CategoryController::class);
    Route::resource('product',ProductController::class);
    Route::get('product-delete-image/{image}',[ProductController::class,'destroyImage'])->name('product.destroyImage');
});
Route::get('/admin/login',[AdminController::class,'login'])->name('admin.login');
Route::post('/admin/login',[AdminController::class,'check_login']);
