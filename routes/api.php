<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;




/**
 * @group guest
 */
Route::middleware(['guest'])->group(function () {

    Route::post('/user', [UserController::class, 'store']);

    Route::post('/login', [AuthController::class, 'store']);
});


/**
 * @group auth
 */
Route::middleware(['auth:sanctum'])->group(function () {

    Route::put('/user', [UserController::class, 'update']);

    Route::post('/password/update', [PasswordController::class, 'update']);

    Route::post('/logout', [AuthController::class, 'destroy']);
});
