<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\Auth\LoginController;

use App\Http\Controllers\Admin\GraduateController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ReportController;


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

// Route::middleware('guest:admin')->group(function () {
Route::get('login', [LoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('login', [LoginController::class, 'login'])->name('admin.loggin');
// });

Route::post('logout', [LoginController::class, 'logout'])->name('admin.logout');

Route::get('home', [HomeController::class, 'home'])->name('admin.home');

Route::resource('graduates', GraduateController::class, ['as' => 'admin']);
Route::get('graduates/{graduate}/edit-password', [GraduateController::class, 'edit_password'])->name('admin.graduates.edit_password');
Route::patch('graduates/{graduate}/update-password', [GraduateController::class, 'update_password'])->name('admin.graduates.update_password');

Route::get('graduates/{graduate}/academic_studies/{academic}/edit', [GraduateController::class, 'edit_academic'])->name('admin.graduates.edit_academic');
Route::patch('graduates/{graduate}/academic_studies/{academic}/update', [GraduateController::class, 'update_academic'])->name('admin.graduates.update_academic');

Route::delete('graduates/{graduate}',[GraduateController::class, 'destroy'])->name('admin.graduates.destroy');

Route::resource('posts', PostController::class, ['as' => 'admin']);

Route::prefix('reports')->group(function () {
    Route::get('graduates', [ReportController::class, 'graduates'])->name('admin.reports.graduates');
    Route::get('statistics', [ReportController::class, 'statistics'])->name('admin.reports.statistics');
});
