<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;

Route::get('/', [MovieController::class, 'index'])->name('movies.index');
Route::get('/movies/{id}', [MovieController::class, 'show'])->name('movies.show');
Route::get('/tv-shows', [MovieController::class, 'tvShows'])->name('shows.index');
Route::get('/actors', [MovieController::class, 'actors'])->name('actors.index');
