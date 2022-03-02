<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
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

Route::get('create',[StudentController::class,'Create'])->name('create');
Route::post('store',[StudentController::class,'Store'])->name('store');
Route::get('index',[StudentController::class,'index'])->name('index');

Route::get('edit/{id}',[StudentController::class,'Edit'])->name('.edit');
Route::post('update/{id}',[StudentController::class,'update'])->name('update');
Route::get('delete/{id}',[StudentController::class,'delete'])->name('delete');
