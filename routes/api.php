<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;



/**
 * @group guest
 */
Route::middleware(['guest'])->group(function () {
    Route::post('login', [AuthController::class, 'store']);
});


/**
 * @group auth
 */
Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('logout', [AuthController::class, 'destroy']);
});
