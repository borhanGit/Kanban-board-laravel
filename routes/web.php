<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;


Route::get('/',[TaskController::class,'index']);
Route::post('/task-store',[TaskController::class,'store'])->name('task.store');
Route::get('/in-progress/{id}',[TaskController::class,'inProgress'])->name('in-progress');
Route::get('/done/{id}',[TaskController::class,'done'])->name('done');