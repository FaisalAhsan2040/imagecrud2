<?php

use App\Http\Controllers\StudentController;
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

Route::get('create',[StudentController::class,'Create'])->name('_create');
Route::post('store',[StudentController::class,'Store'])->name('_store');
Route::get('index',[StudentController::class,'Index'])->name('_index');
Route::get('edit/{id}',[StudentController::class,'Edit'])->name('_edit');
Route::post('update',[StudentController::class,'Update'])->name('_update');

Route::get('delete',[StudentController::class,'Delete'])->name('_delete');




