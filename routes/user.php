<?php
use Illuminate\Support\Facades\Route;
/**
 * Created by PhpStorm.
 * User: dawla
 * Date: 9/15/2023
 * Time: 8:23 AM
 */

 Route::get('/',[\App\Http\Controllers\User\UserDashboardController::class,'index']);
 Route::get('/profile',[\App\Http\Controllers\User\UserDashboardController::class,'profile'])->name('users.profile');
 Route::post('/profile',[\App\Http\Controllers\User\UserDashboardController::class,'profile'])->name('users.updateProfile');
 Route::get('/settings',[\App\Http\Controllers\User\UserDashboardController::class,'settings'])->name('users.settings');
 Route::post('/settings',[\App\Http\Controllers\User\UserDashboardController::class,'updateSettings'])->name('users.updateSettings');
 // Users

 Route::prefix('recipients')->group(function(){
     Route::get('list',[\App\Http\Controllers\User\RecipientsController::class,'index'])->name('recipients.list');
     Route::get('create',[\App\Http\Controllers\User\RecipientsController::class,'create'])->name('recipients.create');
     Route::post('store',[\App\Http\Controllers\User\RecipientsController::class,'store'])->name('recipients.store');
     Route::get('edit/{id}',[\App\Http\Controllers\User\RecipientsController::class,'edit'])->name('recipients.edit');
     Route::post('update/{id}',[\App\Http\Controllers\User\RecipientsController::class,'update'])->name('recipients.update');
 });
 //accounts
Route::prefix('messages')->group(function(){
    Route::get('list',[\App\Http\Controllers\User\MessageControler::class,'index'])->name('messages.list');
    Route::get('create',[\App\Http\Controllers\User\MessageControler::class,'create'])->name('messages.create');
    Route::post('store',[\App\Http\Controllers\User\MessageControler::class,'store'])->name('messages.store');
    Route::get('edit/{id}',[\App\Http\Controllers\User\MessageControler::class,'edit'])->name('messages.edit');
    Route::post('update/{id}',[\App\Http\Controllers\User\MessageControler::class,'update'])->name('messages.update');
});
