<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/reviews', [ReviewController::class, 'index'])->name('reviews');
Route::get('/about', [AboutController::class, 'index'])->name('about');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/reviews/create', [ReviewController::class, 'create'])
        ->name('reviews.create');
    Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');
    Route::get('/myreviews', [ReviewController::class, 'showUserReviews'])->name('reviews.user');
    Route::get('/reviews/{id}', [ReviewController::class, 'showAllReviews'])
        ->whereNumber('id')
        ->name('reviews.show');
    Route::get('/myreviews', [ReviewController::class, 'showUserReviews'])->name('reviews.user');
    Route::delete('/reviews/{id}', [ReviewController::class, 'destroy'])->name('reviews.delete');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
