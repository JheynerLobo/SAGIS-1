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
    return view('index');
});

Route::view('/inicio', 'index')->name('inicio');
Route::view('/noticias', 'noticias')->name('noticias');
Route::view('/cursos', 'cursos')->name('cursos');
Route::view('/eventos', 'eventos')->name('eventos');
Route::view('/galeria', 'galeria')->name('galeria');
Route::view('/videos', 'videos')->name('videos');