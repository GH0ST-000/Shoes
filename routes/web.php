<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});




Route::prefix('admin')->middleware(['admin'])->group(function () {

    Route::controller(AdminController::class)->group(function(){
        Route::get('login','index')->name('admin.login');
        Route::get('dashboard','dashboard')->name('admin.dashboard');
        Route::get('products','products')->name('admin.products');
        Route::get('orders','order')->name('admin.orders');
        Route::get('logout','Logout')->name('admin.logout');
    });


    Route::controller(ProductController::class)->group(function(){
        Route::get('add_product','Add')->name('admin.add_product');
        Route::post('store_product','store')->name('admin.store_product');
        Route::get('delete_product/{id}','delete')->name('admin.delete_product');

    });
    Route::controller(ImageController::class)->group(function(){
        Route::post('/upload-chunk', 'handleFileChunk')->name('admin.upload-chunk');
    });




});

require __DIR__.'/auth.php';
