<?php

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

Route::get('/task',function(){

    $data=App\task::all();

    return view('taskView')-> with('taskView',$data);
});

Route::post('/saveTask', 'TaskController@store');

Route::get('/markAsCompleted/{id}', 'TaskController@UpdateTaskAsCompleted');

Route::get('/markAsNotCompleted/{id}', 'TaskController@UpdateTaskAsNotCompleted');

Route::get('/deleteTask/{id}', 'TaskController@DeleteTask');

Route::get('/updateTask/{id}', 'TaskController@UpdateViewTask');

Route::post('/updateTask', 'TaskController@UpdateTask');
