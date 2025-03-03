<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    // Profile routes
    Route::controller(ProfileController::class)->group(function () {
        Route::get('/dashboard', 'show')->name('dashboard');
        Route::get('/profile', 'edit')->name('profile.edit');
        Route::patch('/profile', 'update')->name('profile.update');
        Route::delete('/profile', 'destroy')->name('profile.destroy');
    });
    
    // View other user profiles
    Route::get('/@{user:name}', [ProfileController::class, 'show'])->name('profile.show');
});
Route::group(['prefix'=> 'post'], function () {
    Route::get('/index', [PostController::class,'index'])->middleware('auth')->name('feeds');
    Route::get('/create', [PostController::class,'create'])->middleware('auth')->name('post.create');
    Route::get('/{post}/show', [PostController::class,'show'])->middleware('auth')->name('post.show');
});

require __DIR__ . '/auth.php';
