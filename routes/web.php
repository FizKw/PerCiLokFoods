<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\Profile\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImageUploadController;
use App\Http\Controllers\ProductController;

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

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('home',[HomeController::class,'index'])->middleware('auth')->name('home');

Route::get('home/adminedit',[HomeController::class, 'adminedit'])->middleware(['auth','admin'])->name('adminedit');

Route::middleware('auth')->group(function () {
    Route::get('home/cartlist',[CartController::class,'show'])->name('cartlist');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::patch('/profile/avatar',[ImageUploadController::class, 'avatarUpdate'])->name('profile.avatar');
    Route::get('home/addtocart/{id}',[CartController::class,'add'])->name('addtocart');
    
    
});
Route::middleware(['auth', 'admin'])->prefix('home')->group(function () {
        Route::get('create', [ProductController::class,'create'])->name('products.create');
        Route::post('store', [ProductController::class,'store'])->name('products.store');
        Route::get('show/{id}', [ProductController::class,'show'])->name('products.show');
        Route::get('edit/{id}', [ProductController::class,'edit'])->name('products.edit');
        Route::patch('edit/{id}', [ProductController::class,'update'])->name('products.update');
        Route::delete('destroy/{id}', [ProductController::class,'destroy'])->name('products.destroy');
        Route::post('store/image',[ImageUploadController::class, 'foodImage'])->name('product.image');
        Route::patch('edit/food/{id}', [ImageUploadController::class, 'foodImage'])->name('food.image');
});

require __DIR__.'/auth.php';
