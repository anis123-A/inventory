<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemController;
// Public Routes (Bisa diakses tanpa token)
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
// Protected Routes (Wajib menyertakan Token Sanctum)
Route::middleware('auth:sanctum')->group(function() { 
    // Route Categories 
    Route::apiResource('categories', CategoryController::class)->except(['destroy']);
    Route::delete('categories/{id}', [CategoryController::class, 'destroy'])->middleware('role:admin');
    // Route Items (Parameter diganti dari {item} menjadi {id} agar cocok dengan Controller kamu)
    Route::apiResource('items', ItemController::class)->except(['destroy']);
    Route::delete('items/{id}', [ItemController::class, 'destroy'])->middleware('role:admin');
});