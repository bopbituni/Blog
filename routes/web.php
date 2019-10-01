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

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::prefix('blog')->group(function () {
    Route::get('/index', 'BlogController@index')->name('blog.index');
    Route::get('/create', 'BlogController@create')->name('blog.create');
    Route::post('/create', 'BlogController@store')->name('blog.store');
    Route::get("/{id}/show", "BlogController@show")->name('blog.show');
    Route::post('/{id}/update', "BlogController@update")->name('blog.update');
    Route::get('/{id}/edit', "BlogController@edit")->name('blog.edit');
    Route::get("/{id}/delete", "BlogController@destroy")->name('blog.destroy');
});
