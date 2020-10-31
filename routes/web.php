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

/* Route::get('/', function () {
    return view('welcome');
}); */


Route::get('/', [TodoController::class, 'index'])->name('todolist');
Route::get('/todos/{id}', [TodoController::class, 'show'])->name('show');
Route::get('/new-todos', [TodoController::class, 'create'])->name('create');
Route::post('/store-todo',[TodoController::class, 'store'])->name('putdata');
Route::post('/update-todo/{id}',[TodoController::class, 'update']);
Route::get('/todos/{id}/edit',[TodoController::class, 'edit'])->name('edit');
Route::get('/todos/{id}/delete',[TodoController::class, 'destroy'])->name('destroy');
Route::get('/todos/{id}/done',[TodoController::class, 'done'])->name('done');
