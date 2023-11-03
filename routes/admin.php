<?php
use Illuminate\Support\Facades\Route;
/**
 * Created by PhpStorm.
 * User: dawla
 * Date: 9/15/2023
 * Time: 8:23 AM
 */

 Route::get('/',[\App\Http\Controllers\Admin\DashboardController::class,'index']);
 Route::get('/profile',[\App\Http\Controllers\Admin\DashboardController::class,'profile'])->name('admin.profile');
 Route::post('/update-profile',[\App\Http\Controllers\Admin\DashboardController::class,'updateProfile'])->name('admin.updateProfile');
 Route::get('/login-settings',[\App\Http\Controllers\Admin\DashboardController::class,'loginSettings'])->name('admin.loginSettings');
 Route::post('/login-settings',[\App\Http\Controllers\Admin\DashboardController::class,'updatePassword'])->name('admin.updatePassword');

 // settings
 Route::get('/general-settings',[\App\Http\Controllers\Admin\DashboardController::class,'generalSettings'])->name('admin.general_settings');
 Route::post('/save-settings',[\App\Http\Controllers\Admin\DashboardController::class,'saveSettings'])->name('admin.saveSettings');

 // Users

 Route::prefix('users')->group(function(){
     Route::get('list',[\App\Http\Controllers\Admin\UserController::class,'index'])->name('users.listUser');
     Route::get('reseller-list',[\App\Http\Controllers\Admin\UserController::class,'reseller_list'])->name('users.reseller_list');
     Route::get('create',[\App\Http\Controllers\Admin\UserController::class,'create'])->name('users.createNewUser');
     Route::post('store',[\App\Http\Controllers\Admin\UserController::class,'store'])->name('users.saveNewUser');
     Route::get('edit/{id}',[\App\Http\Controllers\Admin\UserController::class,'edit'])->name('users.editUser');
     Route::post('update/{id}',[\App\Http\Controllers\Admin\UserController::class,'update'])->name('users.updateUser');
     Route::get('update-status/{type}/{status}/{id}',[\App\Http\Controllers\Admin\UserController::class,'updateStats'])->name('users.updateStatus');
     Route::get('delete/{id}',[\App\Http\Controllers\Admin\UserController::class,'delete'])->name('users.delete');
     Route::get('reseller-payments',[\App\Http\Controllers\Admin\UserController::class,'reseller_payments'])->name('users.resellerPayments');
 });
 //accounts
Route::prefix('accounts')->group(function(){
    Route::get('list',[\App\Http\Controllers\Admin\AccountsController::class,'index'])->name('accounts.list');
    Route::get('create',[\App\Http\Controllers\Admin\AccountsController::class,'create'])->name('accounts.create');
    Route::post('store',[\App\Http\Controllers\Admin\AccountsController::class,'store'])->name('accounts.store');
    Route::get('edit/{id}',[\App\Http\Controllers\Admin\AccountsController::class,'edit'])->name('accounts.edit');
    Route::post('update/{id}',[\App\Http\Controllers\Admin\AccountsController::class,'update'])->name('accounts.update');
});
// reseller funds
Route::prefix('funds')->group(function(){
    Route::get('list',[\App\Http\Controllers\Admin\UserController::class,'funds_list'])->name('admin.funds.list');
    Route::get('create',[\App\Http\Controllers\Admin\UserController::class,'funds_create'])->name('admin.funds.create');
    Route::post('store',[\App\Http\Controllers\Admin\UserController::class,'funds_store'])->name('admin.funds.store');
    Route::post('log',[\App\Http\Controllers\Admin\UserController::class,'funds_log'])->name('admin.funds.log');
    Route::get('status/{status}/{id}',[\App\Http\Controllers\Admin\UserController::class,'funds_status'])->name('admin.funds.status');
});
