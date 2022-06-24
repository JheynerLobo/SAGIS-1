<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CommandController;
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

Route::get('notices', [HomeController::class, 'notices'])->name('notices');
Route::get('notices/{id}', [HomeController::class, 'showNotice'])->name('notices.show');

Route::get('courses', [HomeController::class, 'courses'])->name('courses');
Route::get('courses/{id}', [HomeController::class, 'showCourse'])->name('courses.show');

Route::get('events', [HomeController::class, 'events'])->name('events');
Route::get('events/{id}', [HomeController::class, 'showEvent'])->name('events.show');

Route::get('gallerys', [HomeController::class, 'gallerys'])->name('gallerys');
Route::get('gallerys/{id}', [HomeController::class, 'showGallery'])->name('gallerys.show');

Route::get('videos', [HomeController::class, 'videos'])->name('videos');
Route::get('videos/{id}', [HomeController::class, 'showVideo'])->name('videos.show');



/** Commands  */

Route::prefix('commands')->group(function () {
    Route::get('optimize', [CommandController::class, 'runOptimize']);
    Route::get('migrate', [CommandController::class, 'runMigrateFresh']);
});
