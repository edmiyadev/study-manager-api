<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TypeEducationController;
use App\Models\TypeEducation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::group(['prefix' => 'auth'], function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
});

Route::group(['prefix' => 'config'], function () {
    Route::get('/first-config', [TypeEducationController::class, 'index']);
    Route::get('/first-config/{typeEducation}', [TypeEducationController::class, 'show']);
});
