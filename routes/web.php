<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('website.index');
});
Route::get('/dashboard/test', function () {
    return view('user.test');
});
Route::get('/dashboard/edit-data', function () {
    return view('user.user-data');
})->name('edit-user-data');

Route::get('/worker-dashboard', function () {
    return view('user.worker');
})->name('view.worker');

Route::get('/dashboard', function () {
    return view('user.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
