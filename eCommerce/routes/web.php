<?php

use App\Http\Controllers\Shop\CartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Shop\HomeController;
use App\Http\Controllers\Shop\ProductController;
use App\Http\Controllers\Shop\UserController;

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

/**
 *
 * Shop-User login and registration Route
 */

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/user-registration', [UserController::class, 'userRegistration'])->name('user.registration');
Route::post('/save-user-registration', [UserController::class, 'saveUserRegistration'])->name('save.user.registration');
Route::get('/user-logout', [UserController::class, 'userLogout'])->name('user.logout');
Route::get('/user-login', [UserController::class, 'userLogin'])->name('user.login');
Route::post('/check-user-login', [UserController::class, 'checkUserLogin'])->name('check.user.login');

/**
 *
 * Shop-product details-view Route
 */

Route::get('/product-details-vue', [ProductController::class, 'productDetails'])->name('product.details.vue');

/**
 *
 * add-to-cart Route
 */

 Route::get('/add-to-cart', [CartController::class, 'getAddToCart'])->name('product.addToCart');
 Route::get('/product-shoppingCart', [CartController::class, 'getShoppingCart'])->name('product.shoppingCart');
 Route::get('/cart-checkout', [CartController::class, 'cartCheckout'])->name('cart.checkout');
 Route::get('/cart-increaseQty', [CartController::class, 'addQtyByOne'])->name('cart.increaseQty');
 Route::get('/cart-decreaseQty', [CartController::class, 'reduceQtyByOne'])->name('cart.decreaseQty');
 Route::get('/cancle-product', [CartController::class, 'cancleProduct'])->name('cancle.product');
 Route::get('/complete-payment', [CartController::class, 'completePayment'])->name('complete.payment');
