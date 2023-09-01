<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [\App\Http\Controllers\Journal\SingleController::class, 'latest'])->name('home');

Route::get('entry/{slug}.html', \App\Http\Controllers\Journal\SingleController::class)->name('journal.entry');


Route::get('login', \App\Http\Controllers\Auth\LoginController::class)->name('login');
Route::post('login', [\App\Http\Controllers\Auth\LoginController::class, 'handle'])->name('login.handler');

Route::middleware('auth')->group(function () {
    Route::get('dashboard', \App\Http\Controllers\User\DashboardController::class)->name('dashboard');
    Route::get('editor/{id?}', \App\Http\Controllers\Journal\EditorController::class)->name('editor');
    Route::post('editor', [\App\Http\Controllers\Journal\EditorController::class, 'store'])->name('editor.publish');
});
