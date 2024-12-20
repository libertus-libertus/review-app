<?php

use App\Http\Controllers\CastController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', function() {
    return view('bantuan');
});

Route::get('bantuan', [DashboardController::class, 'index'])->name('bantuan');

Route::middleware(['auth'])->group(function () {
    Route::get('profile', [UserProfileController::class, 'edit'])->name('profile.edit');
    Route::put('profile', [UserProfileController::class, 'update'])->name('profile.update');

    Route::resource('film', FilmController::class);
    Route::resource('cast', CastController::class);
    Route::resource('genre', GenreController::class);
    Route::post('film/{id}/review', [FilmController::class, 'storeReview'])->name('film.review.store');
    Route::post('film/{id}/review', [ReviewController::class, 'store'])->name('film.review.store');
});

Route::get('film', [FilmController::class, 'index'])->name('film.index');
Route::get('film/{film}', [FilmController::class, 'show'])->name('film.show');
Route::get('genre', [GenreController::class, 'index'])->name('genre.index');
Route::get('genre/{genre}', [GenreController::class, 'show'])->name('genre.show');

Auth::routes();
