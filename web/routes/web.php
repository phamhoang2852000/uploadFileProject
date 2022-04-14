<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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

Route::get('/login', [UserController::class, 'getLogin']);
Route::post('/login', [UserController::class, 'postLogin'])->name('login');
Route::get('/register', [UserController::class, 'getRegister']);
Route::post('/register', [UserController::class, 'postRegister'])->name('register');
Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', [UserController::class, 'index'])->name('home');
});
