<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EventController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::middleware('auth')->group(function() {
    Route::get('dashboard', function() { return view('dashboard'); })->name('dashboard');
    // Events
    Route::resource('events', EventController::class);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

# AJAX request
Route::post('/attend-event/{event}', [EventController::class, 'attend'])->where('id', '[0-9]+');
Route::post('/unattend-event/{event}', [EventController::class, 'unattend'])->where('id', '[0-9]+');
