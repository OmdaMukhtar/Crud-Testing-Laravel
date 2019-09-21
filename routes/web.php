<?php

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/todo', 'TodoController@index')->name('todo.index');
Route::get('/todo/create', 'TodoController@create')->name('todo.create');
Route::post('/todo', 'TodoController@store')->name('todo.store');
Route::delete('/todo/{todo}/', 'TodoController@destroy')->name('todo.destroy');
Route::get('/todo/{todo}/edit', 'TodoController@edit')->name('todo.edit');
Route::get('/todo/{todo}', 'TodoController@show')->name('todo.show');
Route::put('/todo/{todo}/', 'TodoController@update')->name('todo.update');
Route::post('/todo/{todo}/markTodo', 'TodoController@markTodo')->name('todo.markTodo');
