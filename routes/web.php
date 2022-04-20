<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
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

Route::get('/', [TodoController::class,'index'])->name('todos.index');

Route::post('/todos', [TodoController::class,'store'])->name('todos.store');

Route::delete('/todos/{todo}', [TodoController::class,'destroy'])->name('todos.destroy');

Route::post('/todos/{todo}', [TodoController::class,'done'])->name('todos.done');

Route::post('/done-delete', [TodoController::class,'donedelete'])->name('todos.done-delete');
