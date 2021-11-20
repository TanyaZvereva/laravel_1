<?php

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

use App\Http\Controllers\TodosController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/todo/', [TodosController::class, 'index']);
Route::get('/todo/create/', [TodosController::class, 'form']);
Route::post('/todo/create/', [TodosController::class, 'create']);
Route::get('/todo/{id}', [TodosController::class, 'view']);
Route::get('/todo/remove/{id}', [TodosController::class, 'remove']);


