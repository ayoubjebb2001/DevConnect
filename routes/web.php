<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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

require __DIR__ . '/auth.php';
