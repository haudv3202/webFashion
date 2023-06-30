<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth\userController;
Route::prefix('auth')->group(function(){
    Route::get('login',[userController::class,'index'])->name('auth.login');
    Route::post('login',[userController::class,'Login'])->name('auth.login');
    Route::get('register',[userController::class,'register'])->name('auth.register');
    Route::post('register',[userController::class,'handleUser'])->name('auth.registerUser');
    Route::prefix('account')->group(function(){
        Route::middleware('auth')->group(function() {
            Route::get('myaccount',[userController::class,'profile'])->name('auth.profile');
            Route::get('profile',[userController::class,'info'])->name('auth.info');
            Route::post('profile',[userController::class,'updateInfo'])->name('auth.update');
            Route::get('logout',[userController::class,'logout'])->name('auth.logout');
        });
    });
});




