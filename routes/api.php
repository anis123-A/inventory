<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\BookController;

Route::get('test', function () {
    return response()->json(['message' => 'OK']);
});

Route::apiResource('genres', GenreController::class);
Route::apiResource('books', BookController::class);