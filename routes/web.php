<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{AdminController, AuthenticationController};

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

Route::get('/', [AdminController::class, 'dashboard']);
Route::prefix('admin')->group(function() {
    Route::get('login', [AuthenticationController::class, 'loginPage'])->name('login');

    Route::middleware('auth')->group(function() {
        Route::get('dashboard', [AdminController::class, 'dashboard']);
    });
});