<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{AdminController, AuthenticationController, PageController};

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
Route::prefix('auth')->group(function() {
    Route::get('login', [AuthenticationController::class, 'loginPage'])->middleware('guest')->name('auth.login');
    Route::post('login', [AuthenticationController::class, 'login'])->name('auth.login.page');
    Route::post('logout', [AuthenticationController::class, 'logout'])->name('auth.logout');

});
Route::prefix('admin')->group(function() {
    Route::middleware('auth')->group(function() {
        Route::get('dashboard', [AdminController::class, 'dashboard']);
        Route::resource('pages', PageController::class);
    });
});