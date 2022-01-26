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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route Todo
Route::group(['middleware' => 'auth'], function () {
    Route::resource('todo', 'TodoController');
    Route::put('todo/mark/done/{id}', 'TodoMarkAsDoneController@update')->name('todo.mark.done');
    Route::put('todo/mark/onprocess/{id}', 'TodoMarkAsOnProcessController@update')->name('todo.mark.onprocess');
});