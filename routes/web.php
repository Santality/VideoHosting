<?php

use App\Http\Controllers\AdminController;
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

Route::get('/', [VideoController::class, 'index']);

Route::get('/reg', function () {
    return view('reg');
});

Route::get('/auth', function () {
    return view('auth');
});

Route::post('/registration', [UserController::class, 'signup']);

Route::get('/logout', [UserController::class, 'logout']);

Route::post('/authentication', [UserController::class, 'signin']);

Route::get('/admin', [AdminController::class, 'admin']);

Route::get('/profile', [UserController::class, 'profile']);

Route::get('/createPage', [VideoController::class, 'createPage']);

Route::post('/create', [VideoController::class, 'create']);

Route::get('/video/{id}', [VideoController::class, 'video']);

Route::post('/comment_create', [VideoController::class, 'comment']);

Route::get('/like/{id}', [VideoController::class, 'like']);

Route::get('/dislike/{id}', [VideoController::class, 'dislike']);

Route::post('/limit', [AdminController::class, 'limit']);
