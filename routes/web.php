<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\ItemController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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

Route::get('/', function () {return view('welcome');});
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/brands/{action}', [BrandController::class, 'index'])->name('brands');
Route::post('/brands/store', [BrandController::class, 'store']);
Route::post('/brands/edit', [BrandController::class, 'edit']);
Route::post('/brands/destroy', [BrandController::class, 'destroy']);
Route::post('/items/destroy', [ItemController::class, 'destroy']);
Route::post('/items/edit', [ItemController::class, 'edit']);

Auth::routes();
