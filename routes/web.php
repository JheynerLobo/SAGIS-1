<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
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

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login'])->name('loggin');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('home', [HomeController::class, 'home'])->name('home');

Route::view('notices', 'pages.notices')->name('notices');
Route::view('courses', 'pages.courses')->name('courses');
Route::view('events', 'pages.events')->name('events');
Route::view('gallerys', 'pages.gallerys')->name('gallery');
Route::view('videos', 'pages.videos')->name('videos');