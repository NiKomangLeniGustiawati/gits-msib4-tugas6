<?php

use App\Http\Controllers\loginController;
use App\Http\Controllers\ProductController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/product', [ProductController::class, 'index']);
Route::get('/product/add', [ProductController::class, 'create']);
Route::get('/product/{id}/edit', [ProductController::class, 'edit']);
Route::get('/product/{id}/delete', [ProductController::class, 'destroy']);

Route::post('/product', [ProductController::class, 'store']);
Route::put('/product/{id}', [ProductController::class, 'update']);

Route::get('/login', [loginController::class, 'index']);
Route::post('/product/login', [loginController::class, 'login']);
