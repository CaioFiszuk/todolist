<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::controller(TaskController::class)->group(function(){
    Route::get('/', 'index')->name('index');
    Route::post('/create_task', 'createTask')->name('create.task');
    Route::get('/delete_task/{id}', 'deleteTask')->name('delete.task');
    Route::get('update_page/{id}', 'updatePage')->name('update.page');
    Route::post('update_task', 'updateTask')->name('update.task');
    Route::get('/done/{id}', 'done')->name('done');
    Route::get('/undone/{id}', 'undone')->name('undone');
    Route::get('/search', 'search')->name('search');
});
