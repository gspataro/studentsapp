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
Route::get('/student/view/{student}', [StudentController::class, 'view'])->name('student.view');
Route::get('/student/new', [StudentController::class, 'edit'])->name('student.new');
Route::get('/student/edit/{student}', [StudentController::class, 'edit'])->name('student.edit');
Route::post('/student/store/{student?}', [StudentController::class, 'store'])->name('student.store');
Route::delete('/student/delete/{student}', [StudentController::class, 'delete'])->name('student.delete');

Route::get('/institutes', [InstituteController::class, 'list'])->name('institute.list');
Route::get('/institutes/view/{institute}', [InstituteController::class, 'single'])->name('institute.single');
Route::get('/institutes/new', [InstituteController::class, 'edit'])->name('institute.new');
Route::get('/institutes/edit/{institute}', [InstituteController::class, 'edit'])->name('institute.edit');
Route::post('/institutes/store/{institute?}', [InstituteController::class, 'store'])->name('institute.store');
Route::delete('/institutes/delete/{institute}', [InstituteController::class, 'delete'])->name('institute.delete');
