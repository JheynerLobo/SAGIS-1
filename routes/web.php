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
    return view('admin/administrarGraduados');
});

Route::view('/inicio', 'index')->name('inicio');
Route::view('/noticias', 'noticias')->name('noticias');
Route::view('/cursos', 'cursos')->name('cursos');
Route::view('/eventos', 'eventos')->name('eventos');
Route::view('/galeria', 'galeria')->name('galeria');
Route::view('/videos', 'videos')->name('videos');

Route::view('/graduados', 'admin/administrarGraduados')->name('graduados');
Route::view('/contenidos', 'admin/gestionarContenidos')->name('contenidos');



Route::view('/agregarGraduado', 'admin/CRUD_graduado/agregarGraduado')->name('agregarGraduado');
Route::view('/editarPassword', 'admin/CRUD_graduado/editarPassword')->name('editarPassword');
Route::view('/editarGraduado', 'admin/CRUD_graduado/editarGraduado')->name('editarGraduado');
Route::view('/estudiosPotsgrados', 'admin/CRUD_graduado/estudiosPotsgrados')->name('estudiosPotsgrados');
Route::view('/agregarEstudioPotsgrado', 'admin/CRUD_graduado/agregarEstudioPotsgrado')->name('agregarEstudioPotsgrado');
Route::view('/editarEstudioPotsgrado', 'admin/CRUD_graduado/editarEstudioPotsgrado')->name('editarEstudioPotsgrado');

Route::view('/verDatosCompletos', 'admin/CRUD_graduado/verDatosCompletos')->name('verDatosCompletos');

