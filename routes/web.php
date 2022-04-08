<?php

use App\Http\Controllers\CatController;
use App\Http\Controllers\TestController;
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

Route::get('/index',[TestController::class, 'index']);
Route::get('/add-post',[TestController::class, 'create']);
Route::post('/add-post',[TestController::class, 'store']);
Route::get('/edit-post/{id}',[TestController::class, 'edit']);
Route::put('/update-post/{id}',[TestController::class, 'update']);
Route::delete('/delete-post/{id}',[TestController::class, 'destroy'])->name('delete');

Route::get('/cats',[CatController::class, 'index']);
Route::get('/add-cats',[CatController::class, 'create']);
Route::post('/add-cats',[CatController::class, 'store']);
Route::get('/edit-cats/{id}',[CatController::class, 'edit']);
Route::put('/update-cats/{id}',[CatController::class, 'update']);
Route::delete('/delete/cats/{id}',[CatController::class, 'destroy']);