<?php

use App\Http\Controllers\InstituteController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [StudentController::class, 'list'])->name('student.list');
Route::get('/new', [StudentController::class, 'new'])->name('student.new');
Route::post('/store', [StudentController::class, 'store'])->name('student.store');
Route::get('/edit/{student}', [StudentController::class, 'edit'])->name('student.edit');
Route::post('/update/{student}', [StudentController::class, 'update'])->name('student.update');
Route::delete('/delete/{student}', [StudentController::class, 'delete'])->name('student.delete');

Route::get('/institutes', [InstituteController::class, 'list'])->name('institute.list');
