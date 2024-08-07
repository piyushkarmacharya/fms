<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/create-admin', [AdminController::class,'createAdmin']);
Route::post('/login-admin', [AdminController::class,'loginAdmin']);
Route::post('/change-password-admin', [AdminController::class,'changePasswordAdmin']);