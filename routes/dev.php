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

Route::view('/', 'dev.pages.login');

Route::view('home', 'dev.pages.index')->name('dev.home');
Route::view('notices', 'dev.pages.notices')->name('dev.notices');
Route::view('courses', 'dev.pages.courses')->name('dev.courses');
Route::view('events', 'dev.pages.events')->name('dev.events');
Route::view('gallerys', 'dev.pages.gallerys')->name('dev.gallery');
Route::view('videos', 'dev.pages.videos')->name('dev.videos');

Route::view('graduates', 'dev.admin.pages.students.index')->name('dev.students');
Route::view('posts', 'dev.admin.pages.posts.index')->name('dev.posts');



Route::view('graduates/create', 'dev.admin.pages.students.create')->name('dev.students.create');
Route::view('graduates/update_password', 'dev.admin.pages.students.edit_password')->name('dev.students.edit_password');
Route::view('graduates/edit', 'dev.admin.pages.students.edit')->name('dev.students.edit');
Route::view('graduates/academics', 'dev.admin.pages.students.academic.index')->name('dev.students.academics.index');
Route::view('graduates/academics/create', 'dev.admin.pages.students.academic.create')->name('dev.students.academics.create');
Route::view('graduates/academics/edit', 'dev.admin.pages.students.academic.edit')->name('dev.students.academics.edit');

Route::view('graduates/all_information', 'dev.admin.pages.students.academic.full')->name('dev.students.academics.information');



Route::view('reports/statistics', 'dev.admin.pages.reports.statistics')->name('dev.reports.statistics') ; 
Route::view('reports/graduates', 'dev.admin.pages.reports.graduates')->name('dev.reports.graduates') ; 



Route::view('posts/create', 'dev.admin.pages.posts.create')->name('dev.posts.create');

Route::view('profile/view_profile', 'dev.admin.pages.profile.view_profile')->name('dev.profile.view_profile');
Route::view('profile/edit_profile', 'dev.admin.pages.profile.edit_profile')->name('dev.profile.edit_profile');
Route::view('profile/edit_password', 'dev.admin.pages.profile.edit_password')->name('dev.profile.edit_password');
