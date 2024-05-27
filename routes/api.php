<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DayLetterController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;





/**
 * @group guest
 */
Route::middleware(['guest'])->group(function () {

    Route::post('/user', [UserController::class, 'store']);

    Route::post('/login', [AuthController::class, 'store']);

    Route::post('/password/forgot', [PasswordController::class, 'forgotPassword']);

    Route::post('/password/reset', [PasswordController::class,'newPassword']);

    Route::post('day-letter', [DayLetterController::class, 'store']);

    Route::get('day-letter', [DayLetterController::class, 'index']);

    Route::get('day-letter/{date}', [DayLetterController::class, 'show']);
});


/**
 * @group auth
 */
Route::middleware(['auth:sanctum'])->group(function () {

    Route::put('/user', [UserController::class, 'update']);

    Route::post('/password/update', [PasswordController::class, 'update']);

    Route::post('/logout', [AuthController::class, 'destroy']);
});
