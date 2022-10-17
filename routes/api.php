<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\EventController;
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
    Route::get('users/me', [AuthController::class, 'me']);

    // Event Module
    Route::apiResource('events', EventController::class)->except('index', 'show');
    Route::post('/attend-event/{event}', [EventController::class, 'attend'])->where('id', '[0-9]+');
    Route::post('/unattend-event/{event}', [EventController::class, 'unattend'])->where('id', '[0-9]+');
});

// Event Module
Route::apiResource('events', EventController::class)->only('index', 'show');
