<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoListController;

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
    return view('welcome');
});


Route::get('/', [TodoListController::class, 'ViewList'])->name('show.list');
Route::post('/welcome/add', [TodoListController::class, 'AddList'])->name('add.list');
Route::get('/edit/{id}', [TodoListController::class, 'EditList'])->name('edit.list');
Route::post('/', [TodoListController::class, 'UpdateList'])->name('update.list');



