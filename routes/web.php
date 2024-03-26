<?php

use App\Http\Controllers\AdController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController as AuthLoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HomeController as WebHomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductImageController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes();

// User page
Route::group([], function () {
    Route::get('/login', [AuthLoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login-post', [AuthLoginController::class, 'login'])->name('login.post');
    Route::post('/logout', [AuthLoginController::class, 'logout'])->name('logout');

    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'store'])->name('register.post');
});

Route::group([], function () {
    // Home
    Route::get('/', [WebHomeController::class, 'index'])->name('home');

    // Add to cart
    Route::post('/add-to-cart/{id}', [CartController::class, 'addToCart'])->name('addToCart');
    Route::get('/cart', [CartController::class, 'index'])->name('cart');
    Route::post('/updateCart/{id}', [CartController::class, 'update'])->name('update.cart');
    Route::delete('/deleteProductCart/{id}', [CartController::class, 'delete'])->name('delete.cart');

    // Product with category
    Route::get('/category/{id}', [WebHomeController::class, 'productWithCategory'])->name('productCategory');

    // Product detail
    Route::get('/product-detail/{id}', [WebHomeController::class, 'productDetail'])->name('product-detail');

    // Search
    Route::get('/search-product', [WebHomeController::class, 'search'])->name('search');

    // User information
    Route::get('/edit-user', [RegisterController::class, 'edit'])->name('edit-user');
    Route::put('/update-user/{id}', [RegisterController::class, 'update'])->name('edit-user-update');

    // Checkout
    Route::post('/checkout', [CheckoutController::class, 'checkout'])->name('checkout');
});




// Admin page
Route::group([], function () {
    Route::get('/admin/login', [LoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/admin/login', [LoginController::class, 'login'])->name('admin.login.post');
    Route::post('/admin/logout', [LoginController::class, 'logout'])->name('admin.logout');
});

Route::prefix('admin')->middleware(['auth:admin'])->group(function () {
    // dashboard
    Route::get('/', [HomeController::class, 'index'])->name('admin.home');

    // user
    Route::get('user', [UserController::class, 'index'])->name('admin.user.index');
    Route::get('user/create', [UserController::class, 'create'])->name('admin.user.create');
    Route::post('user', [UserController::class, 'store'])->name('admin.user.store');
    Route::get('user/{id}/edit', [UserController::class, 'edit'])->name('admin.user.edit');
    Route::put('user/{id}', [UserController::class, 'update'])->name('admin.user.update');
    Route::delete('user/{id}', [UserController::class, 'destroy'])->name('admin.user.delete');

    // admin
    Route::get('admin', [AdminController::class, 'index'])->name('admin.admin.index');
    Route::get('admin/create', [AdminController::class, 'create'])->name('admin.admin.create');
    Route::post('admin', [AdminController::class, 'store'])->name('admin.admin.store');
    Route::get('admin/{id}/edit', [AdminController::class, 'edit'])->name('admin.admin.edit');
    Route::put('admin/{id}', [AdminController::class, 'update'])->name('admin.admin.update');
    Route::delete('admin/{id}', [AdminController::class, 'destroy'])->name('admin.admin.delete');

    // ad
    Route::get('ad', [AdController::class, 'index'])->name('admin.ad.index');
    Route::get('ad/create', [AdController::class, 'create'])->name('admin.ad.create');
    Route::post('ad', [AdController::class, 'store'])->name('admin.ad.store');
    Route::get('ad/{id}/edit', [AdController::class, 'edit'])->name('admin.ad.edit');
    Route::put('ad/{id}', [AdController::class, 'update'])->name('admin.ad.update');
    Route::delete('ad/{id}', [AdController::class, 'destroy'])->name('admin.ad.delete');

    // category
    Route::get('category', [CategoryController::class, 'index'])->name('admin.category.index');
    Route::get('category/create', [CategoryController::class, 'create'])->name('admin.category.create');
    Route::post('category', [CategoryController::class, 'store'])->name('admin.category.store');
    Route::get('category/{id}/edit', [CategoryController::class, 'edit'])->name('admin.category.edit');
    Route::put('category/{id}', [CategoryController::class, 'update'])->name('admin.category.update');
    Route::delete('category/{id}', [CategoryController::class, 'destroy'])->name('admin.category.delete');

    // product
    Route::get('product', [ProductController::class, 'index'])->name('admin.product.index');
    Route::get('product/create', [ProductController::class, 'create'])->name('admin.product.create');
    Route::post('product', [ProductController::class, 'store'])->name('admin.product.store');
    Route::get('product/{id}/edit', [ProductController::class, 'edit'])->name('admin.product.edit');
    Route::put('product/{id}', [ProductController::class, 'update'])->name('admin.product.update');
    Route::delete('product/{id}', [ProductController::class, 'destroy'])->name('admin.product.delete');

    // product image
    Route::get('product-image/{id}', [ProductImageController::class, 'index'])->name('admin.product-image.index');
    Route::get('product-image/{id}/create', [ProductImageController::class, 'create'])->name('admin.product-image.create');
    Route::post('product-image/{id}', [ProductImageController::class, 'store'])->name('admin.product-image.store');
    Route::delete('product-image/{id}', [ProductImageController::class, 'destroy'])->name('admin.product-image.delete');

    // order
    Route::get('order', [OrderController::class, 'index'])->name('admin.order.index');
    Route::get('order-detail/{id}', [OrderController::class, 'edit'])->name('admin.order.edit');
    Route::put('order/{id}', [OrderController::class, 'update'])->name('admin.order.update');
});
