<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\VideoController;
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

Route::get('/', function () {
    return view('index');
});

Route::get('/reg', function () {
    return view('reg');
});

Route::get('/auth', function () {
    return view('auth');
});

Route::post('/registration', [UserController::class, 'signup']);

Route::get('/logout', [UserController::class, 'logout']);

Route::post('/authentication', [UserController::class, 'signin']);

Route::get('/admin', function () {
    return view('admin.index');
});

Route::get('/profile', [UserController::class, 'profile']);

Route::get('/createPage', [VideoController::class, 'createPage']);

Route::post('/create', [VideoController::class, 'create']);