<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\Auth\SocialController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('loginn', [UserController::class, 'show'])->name('userlog');
Route::post('log', [UserController::class, 'login'])->name('loginn');



Route::get('auth/google', [SocialController::class, 'redirectToGoogle'])->name('google');
Route::get('auth/google/callback', [SocialController::class, 'handleGoogleCallback']);

Route::get('auth/facebook', [SocialController::class, 'redirectToFacebook'])->name('facebook');
Route::get('auth/facebook/callback', [SocialController::class, 'handleFacebookCallback']);

Route::post('second-page', [RegisteredUserController::class, 'one'])->name('registerOne');
Route::any('thirt-page', [RegisteredUserController::class, 'two'])->name('registerTwo');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/profile-show', [ProfileController::class, 'show'])->name('profile');
    Route::put('users/{id}', [ProfileController::class, 'update'])->name('users.update');



    Route::get('new-brand', [BrandController::class, 'index'])->name('addBrand');
    Route::post('add-brand', [BrandController::class, 'store'])->name('storeBrand');
    Route::get('brand', [BrandController::class, 'show'])->name('brand');
    Route::get('edit-brand/{id}', [BrandController::class, 'edit'])->name('editBrand');
    Route::post('update-brand/{id}', [BrandController::class, 'update'])->name('updateBrand');
    Route::get('c-brand/{id}', [BrandController::class, 'destroy'])->name('brandStatus');




    Route::get('new-product', [ProductController::class, 'index'])->name('addProduct');
    Route::post('add-product', [ProductController::class, 'store'])->name('storeProduct');
    Route::get('product', [ProductController::class, 'show'])->name('product');
    Route::get('edit-product/{id}', [ProductController::class, 'edit'])->name('editProduct');
    Route::post('update-product/{id}', [ProductController::class, 'update'])->name('updateProduct');
    Route::get('show-product/{id}', [ProductController::class, 'single'])->name('showProduct');
    Route::get('s-product/{id}', [ProductController::class, 'destroy'])->name('productStatus');




    Route::get('new-Discount', [DiscountController::class, 'index'])->name('addDiscount');
    Route::post('add-discount', [DiscountController::class, 'store'])->name('storeDiscount');
    Route::get('discount', [DiscountController::class, 'show'])->name('discount');
    Route::get('edit-discount/{id}', [DiscountController::class, 'edit'])->name('editDiscount');
    Route::post('update-discount/{id}', [DiscountController::class, 'update'])->name('updateDiscount');
    Route::get('s-discount/{id}', [DiscountController::class, 'destroy'])->name('discountStatus');


});

require __DIR__.'/auth.php';
