<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\RateController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/create-admin', [AdminController::class,'createAdmin']);
Route::post('/login-admin', [AdminController::class,'loginAdmin']);
Route::post('/change-password-admin', [AdminController::class,'changePasswordAdmin']);

Route::post('/create-member', [MemberController::class,'createMember']);
Route::post('/login-member', [MemberController::class,'loginMember']);
Route::get('/read-member', [MemberController::class,'readMember']);
Route::post('/change-password-member', [MemberController::class,'changePasswordMember']);


Route::post("/create-booking",[BookingController::class,'createBooking']);
Route::get("/read-booking",[BookingController::class,'readBooking']);
Route::post("/approve-booking",[BookingController::class,'approveBooking']);

Route::post("/create-rate",[RateController::class,'createRate']);
