<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;
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

Route::get('/', [WebController::class, 'login']);
Route::get('/login', [WebController::class, 'login']);
Route::post('/login', [WebController::class, 'logar']);

Route::prefix('usuario')->group(function () {
    Route::get('/criar', [WebController::class, 'createUser'])->middleware('auth');
    Route::post('/criar', [UserController::class, 'create'])->middleware('auth');
    Route::get('/editar', [WebController::class, 'viewUsers'])->middleware('auth');
    Route::get('/{id}/editar', [WebController::class, 'editUser'])->middleware('auth');
    Route::post('/{id}/editar', [UserController::class, 'update'])->middleware('auth');
    Route::delete('/delete/{id}', [UserController::class, 'delete'])->middleware('auth');
});



Route::get('/home', [WebController::class, 'home'])->middleware('auth')->name('home');
