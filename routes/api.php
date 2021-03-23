<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ForgetPasswordController;


Route::middleware('guest:api')->group(function() {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('forgot-password', [ForgetPasswordController::class, 'forgetPassword']);
    Route::post('reset-password', [ForgetPasswordController::class, 'resetPassword']);
});

Route::middleware('auth:api')->group(function() {
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    // Route::post('payload', [AuthController::class, 'payload']);
    Route::post('user', [AuthController::class, 'AuthenticateUser']);
});