<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [\App\Http\Controllers\SoundsController::class, 'index'])->name('sounds');

Route::get('/profile', [\App\Http\Controllers\ProfileController::class, 'index'])->name('profile');
Route::post('/profile', [\App\Http\Controllers\ProfileController::class, 'update']);

Route::get('/own-Sounds', [\App\Http\Controllers\OwnSoundsController::class, 'index'])->name('ownsounds');
Route::post('/own-Sounds', [\App\Http\Controllers\OwnSoundsController::class, 'addSound']);

Route::post('/play-Sound',[\App\Http\Controllers\PlaySoundController::class,'play']);
Route::get('/play-Sound',[\App\Http\Controllers\PlaySoundController::class,'index'])->name('play-Sound');

Route::get('/login', [\App\Http\Controllers\Auth\LoginController::class, 'index'])->name('login');

Route::get('/logout', [\App\Http\Controllers\Auth\LoginController::class,'logout'])->name('logout');

Auth::routes();
