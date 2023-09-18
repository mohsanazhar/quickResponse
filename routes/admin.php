<?php
use Illuminate\Support\Facades\Route;
/**
 * Created by PhpStorm.
 * User: dawla
 * Date: 9/15/2023
 * Time: 8:23 AM
 */

 Route::get('/',[\App\Http\Controllers\Admin\DashboardController::class,'index']);
 // Users

 Route::prefix('users')->group(function(){
     Route::get('list',[\App\Http\Controllers\Admin\UserController::class,'index'])->name('users.listUser');
     Route::get('create',[\App\Http\Controllers\Admin\UserController::class,'create'])->name('users.createNewUser');
     Route::post('store',[\App\Http\Controllers\Admin\UserController::class,'store'])->name('users.saveNewUser');
     Route::get('edit/{id}',[\App\Http\Controllers\Admin\UserController::class,'edit'])->name('users.editUser');
     Route::post('update/{id}',[\App\Http\Controllers\Admin\UserController::class,'update'])->name('users.updateUser');
 });
 //accounts
Route::prefix('accounts')->group(function(){
    Route::get('list',[\App\Http\Controllers\Admin\AccountsController::class,'index'])->name('accounts.list');
    Route::get('create',[\App\Http\Controllers\Admin\AccountsController::class,'create'])->name('accounts.create');
    Route::post('store',[\App\Http\Controllers\Admin\AccountsController::class,'store'])->name('accounts.store');
    Route::get('edit/{id}',[\App\Http\Controllers\Admin\AccountsController::class,'edit'])->name('accounts.edit');
    Route::post('update/{id}',[\App\Http\Controllers\Admin\AccountsController::class,'update'])->name('accounts.update');
});
