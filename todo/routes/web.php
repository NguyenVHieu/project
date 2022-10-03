<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoListController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[TodoListController::class, 'index']);
Route::get('/create',[TodoListController::class, 'create']);
Route::post('/store',[TodoListController::class, 'store']);
Route::get('/edit/{id}',[TodoListController::class, 'edit']);
Route::put('edit/{todoList}',[TodoListController::class, 'update'])-> name('update');
Route::delete('/{todoList}', [TodoListController::class, 'destroy'])-> name('destroy');


