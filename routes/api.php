<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\EventController;
use App\Http\Controllers\Api\UserController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Authorization
Route::controller(AuthController::class)->group(function() {
    Route::post('register', 'register');
    Route::post('login', 'login');
});

Route::middleware('auth:sanctum')->group(function() {
    // User Module
    Route::get('users/me', [UserController::class, 'getMe']);
    Route::put('users/me', [UserController::class, 'updateMe']);
    Route::apiResource('users', UserController::class)->except('index', 'show', 'destroy');

    // Event Module
    Route::apiResource('events', EventController::class)->except('index', 'show');
    Route::post('/attend-event/{event}', [EventController::class, 'attend'])->where('id', '[0-9]+');
    Route::post('/unattend-event/{event}', [EventController::class, 'unattend'])->where('id', '[0-9]+');
});

// Event Module
Route::apiResource('events', EventController::class)->only('index', 'show');
Route::apiResource('users', UserController::class)->only('index', 'show');
