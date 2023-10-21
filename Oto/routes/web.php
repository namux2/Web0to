<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;

Route::get('/', function () {
    return view('index');
})->name('index');

Route::group(['middleware' => 'guest'], function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::middleware(['checkrole:admin'])->group(function () {
        Route::get('/admin/dashboard', [DashboardController::class, 'showAdminDashboard'])->name('admin.dashboard');
        Route::get('/admin/listusers', [UserController::class, 'index'])->name('admin.users.index');
        Route::get('/admin/users/{id}/delete', [UserController::class, 'destroy'])->name('admin.users.destroy');
        Route::get('/admin/users/{id}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
        Route::put('/admin/users/{id}', [UserController::class, 'update'])->name('admin.users.update');
        Route::get('/upload-image-form', 'ProductController@showImageForm')->name('upload-image-form');
        Route::post('/upload-image', 'ProductController@uploadImage')->name('upload-image');
        
        Route::get('/admin/donhang', [ProductController::class, 'donHang'])->name('admin.donhang');
        Route::delete('/admin/donhang/{id}/delete', [ProductController::class, 'deleteDonHang'])->name('admin.donhang.delete');
        Route::get('/admin/donhang/{id}/edit', [ProductController::class, 'editDonHang'])->name('admin.donhang.edit');
        Route::put('/admin/donhang/{id}/update', [ProductController::class, 'updateDonHang'])->name('admin.donhang.update');

        Route::get('/admin/listproduct', [ProductController::class, 'indexAdmin'])->name('admin.products.index');
        Route::get('/admin/up_product', [ProductController::class, 'create'])->name('admin.products.create');
        Route::post('/admin/listproduct', [ProductController::class, 'store'])->name('admin.products.store');
        Route::get('/admin/products/{id}/edit', [ProductController::class, 'edit'])->name('admin.products.edit');
        Route::put('/admin/products/{id}', [ProductController::class, 'update'])->name('admin.products.update');
        Route::get('/admin/products/{id}/delete', [ProductController::class, 'destroy'])->name('admin.product.destroy');
    });

    Route::middleware(['checkrole:user'])->group(function () {
        Route::get('/index', [DashboardController::class, 'showUserDashboard'])->name('index');

    });
    Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');
    Route::get('/', [ProductController::class, 'indexPublic'])->name('index');
    Route::get('/search', [ProductController::class, 'search'])->name('search');
    Route::get('/danhmuc', [ProductController::class, 'loc']);

    Route::get('/danhmuc', [ProductController::class, 'danhmuc'])->name('danhmuc');
    Route::get('/cart', [CartController::class, 'showCart'])->name('cart.index');
    Route::post('/cart/add/{product}', [CartController::class, 'addToCart'])->name('cart.add');
    Route::get('/cart/remove/{product}', [CartController::class, 'removeFromCart'])->name('cart.remove');
    Route::post('/place-order', [CartController::class, 'placeOrder'])->name('place-order');

     Route::get('/upload-image', [ProductController::class, 'showUploadForm'])->name('image.upload');
    Route::post('/upload-image', [ProductController::class, 'uploadImage'])->name('image.upload.post');
    Route::get('/images/{filename}', [ProductController::class, 'showImage'])->name('image.show');
});
