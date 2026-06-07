<?php
use App\Http\Controllers\Tasks;
use Illuminate\Support\Facades\Route;

Route::get('/', [Tasks::class,'index'])->name('tasks.index');
Route::get('/tasks/create',[Tasks::class,'create'])->name('tasks.create');
Route::post('/tasks/update',[Tasks::class,'store'])->name('tasks.store');
Route::post('/tasks/create',[Tasks::class,'create'])->name('tasks.create');
Route::get('/tasks/edit/{id}',[Tasks::class,'edit'])->name('tasks.edit');
Route::post('/tasks/update/{id}',[Tasks::class,'update'])->name('tasks.update');
Route::get('/tasks/sort', [Tasks::class,'sort'])->name('tasks.sort');
Route::get('/tasks/destroy/{id}', [Tasks::class,'destroy'])->name('tasks.destroy');


