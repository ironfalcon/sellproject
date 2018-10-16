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
})->name('main');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// продукция главная
Route::get('/productions', 'ProductController@index')->name('productions.index');
// продукция просмотр
Route::get('/productions/{id}/', 'ProductController@show')->name('productions.show');
// создание продукции
Route::get('/product/create', 'ProductController@create')->name('productions.create');
// сохранение нового продукта
Route::post('/product/store', 'ProductController@store')->name('productions.store');
