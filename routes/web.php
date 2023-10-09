<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;



Route::get('/', [StudentController::class, 'index'])->name('index');
Route::post('/view', [StudentController::class, 'store'])->name('view');
Route::get('/create', [StudentController::class, 'create'])->name('create');
Route::get('/get-student-marks', [StudentController::class, 'getStudentMarks']);
Route::get('/delete/{id}', [StudentController::class, 'delete'])->name('students.delete');
Route::get('/update/{id}', [StudentController::class, 'update'])->name('students.update');
Route::patch('/update_sec/{id}', [StudentController::class, 'update_sec'])->name('update_sec');
Route::get('/getchart/{id}', [StudentController::class, 'getchart'])->name('getchart');
Route::patch('/getchart_sec/{id}', [StudentController::class, 'getchart_sec'])->name('getchart_sec');











