<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DayLetterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\RankingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;








/**
 * @group guest
 */
Route::middleware(['guest'])->group(function () {

    Route::get('/home', [HomeController::class, 'index']);

    Route::get('/home/words', [HomeController::class, 'answer']);

    Route::get('/ranking', [RankingController::class, 'index']);

    Route::post('/user', [UserController::class, 'store']);

    Route::post('/login', [AuthController::class, 'store']);

    Route::post('/password/forgot', [PasswordController::class, 'forgotPassword']);

    Route::post('/password/reset', [PasswordController::class,'newPassword']);

    Route::get('day-letter', [DayLetterController::class, 'index']);

    Route::get('user/{id}', [UserController::class, 'show']);
});


/**
 * @group auth
 */
Route::middleware(['auth:sanctum'])->group(function () {

    Route::put('/user', [UserController::class, 'update']);

    Route::delete('/user', [UserController::class, 'destroy']);

    Route::post('/password/update', [PasswordController::class, 'update']);

    Route::post('/home/score/{points}', [HomeController::class, 'score']);

    Route::post('/home/answer', [HomeController::class, 'store']);

    Route::get('/home/allow', [HomeController::class, 'canPlay']);

    Route::post('/logout', [AuthController::class, 'destroy']);
});
