<?php
use Illuminate\Support\Facades\Route;
/**
 * Created by PhpStorm.
 * User: dawla
 * Date: 9/15/2023
 * Time: 8:23 AM
 */

 Route::get('/',[\App\Http\Controllers\Reseller\Dashboard::class,'index']);
 Route::get('/profile',[App\Http\Controllers\Reseller\Dashboard::class,'profile'])->name('reseller.profile');
 Route::post('/profile',[\App\Http\Controllers\Reseller\Dashboard::class,'updateProfile'])->name('reseller.updateProfile');
 Route::get('/settings',[\App\Http\Controllers\Reseller\Dashboard::class,'loginSettings'])->name('reseller.settings');
 Route::post('/settings',[\App\Http\Controllers\Reseller\Dashboard::class,'updatePassword'])->name('reseller.updateSettings');
 // Users

 Route::prefix('users')->group(function(){
     Route::get('list',[\App\Http\Controllers\Reseller\UserController::class,'index'])->name('users.list');
     Route::get('create',[\App\Http\Controllers\Reseller\UserController::class,'create'])->name('users.create');
     Route::post('store',[\App\Http\Controllers\Reseller\UserController::class,'store'])->name('users.store');
     Route::get('edit/{id}',[\App\Http\Controllers\Reseller\UserController::class,'edit'])->name('users.edit');
     Route::post('update/{id}',[\App\Http\Controllers\Reseller\UserController::class,'update'])->name('users.update');
 });

