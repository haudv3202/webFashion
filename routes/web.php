<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Client\homeController;
use App\Http\Controllers\Client\productController;
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

Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('detail/{id}',[productController::class,'detail'])->name('product.detail');
Route::get('shop',[productController::class,'index'])->name('product.index');

require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
