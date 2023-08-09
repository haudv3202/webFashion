<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\admincontroller;
use App\Http\Controllers\Admin\slideController;
use App\Http\Controllers\Admin\categoriesController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\brandsController;
use App\Http\Controllers\Admin\commentsController;
use App\Http\Controllers\Admin\newsletterController;
use App\Http\Controllers\Admin\infoNewletterController;
Route::middleware('auth')->group(function(){
    Route::prefix('admin')->group(function(){
        Route::get('dashboard',[admincontroller::class,'index'])->name('admin.dashboard');
        Route::get('slide',[slideController::class,'index'])->name('admin.slide');
        Route::get('addSlide',[slideController::class,'AddSlide'])->name('admin.slide.add');
        Route::get('editSlide/{id}',[slideController::class,'edit'])->name('admin.slide.edit');
        Route::post('editSlide',[slideController::class,'update'])->name('admin.slide.update');
        Route::post('addSlide',[slideController::class,'postSlide'])->name('admin.slide.PostSlide');
        Route::post('status',[slideController::class,'updateStatus'])->name('admin.slide.status');
        Route::delete('delete/slide/{id}',[slideController::class,'delete'])->name('admin.slide.delete');

        Route::prefix('categories')->group(function(){
            Route::get('',[categoriesController::class,'index'])->name('categories.index');
            Route::get('add',[categoriesController::class,'create'])->name('categories.add');
            Route::post('add',[categoriesController::class,'store'])->name('categories.store');
            Route::get('edit/{id}',[categoriesController::class,'edit'])->name('categories.edit');
            Route::post('update',[categoriesController::class,'update'])->name('categories.update');
            Route::post('status',[categoriesController::class,'updateStatus'])->name('categories.status');
            Route::delete('delete/{id}',[categoriesController::class,'delete'])->name('categories.delete');
        });

        Route::prefix('products')->group(function(){
            Route::get('',[ProductController::class,'index'])->name('products.index');
            Route::match(['get','post'],'addProduct',[ProductController::class,'create'])->name('products.create');
            Route::get('editProduct/{id}',[ProductController::class,'edit'])->name('products.edit');
            Route::post('updateProduct',[ProductController::class,'update'])->name('products.update');
            Route::post('status',[ProductController::class,'updateStatus'])->name('products.status');
            Route::delete('delete/{id}',[ProductController::class,'delete'])->name('products.delete');
        });

        Route::prefix('brands')->group(function(){
            Route::get('',[brandsController::class,'index'])->name('brands.index');
            Route::get('add',[brandsController::class,'create'])->name('brands.add');
            Route::post('add',[brandsController::class,'store'])->name('brands.store');
            Route::get('edit/{id}',[brandsController::class,'edit'])->name('brands.edit');
            Route::post('update',[brandsController::class,'update'])->name('brands.update');
            Route::post('status',[brandsController::class,'updateStatus'])->name('brands.status');
            Route::delete('delete/{id}',[brandsController::class,'delete'])->name('brands.delete');
        });

        Route::prefix('comments')->group(function(){
            Route::get('',[commentsController::class,'index'])->name('comments.index');
            Route::post('add',[commentsController::class,'create'])->name('comments.create');
            Route::delete('delete/{id}',[commentsController::class,'delete'])->name('comments.delete');
        });

        Route::prefix('newletter')->group(function(){
            Route::get('',[newsletterController::class,'index'])->name('newletter.index');
            Route::get('add',[newsletterController::class,'create'])->name('newletter.add');
            Route::post('add',[newsletterController::class,'store'])->name('newletter.store');
            Route::get('edit/{id}',[newsletterController::class,'edit'])->name('newletter.edit');
            Route::post('update',[newsletterController::class,'update'])->name('newletter.update');
            Route::post('status',[newsletterController::class,'updateStatus'])->name('newletter.status');
            Route::delete('delete/{id}',[newsletterController::class,'delete'])->name('newletter.delete');
        });

        Route::prefix('infoNewsletter')->group(function(){
            Route::get('',[infoNewletterController::class,'index'])->name('infoNewsletter.index');
            Route::post('',[infoNewletterController::class,'createPost'])->name('infoNewsletter.create');
            Route::delete('delete/{id}',[infoNewletterController::class,'delete'])->name('infoNewsletter.delete');
        });
    });
});
