<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\PersonalDetailController;

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

Route::controller(LoginController::class)->group(function () {
    Route::get('/', 'index')->name('dashboard');
    Route::get('/', 'contact')->name('contact-us');
});
Route::controller(ProjectController::class)->group(function () {
    Route::prefix('project')->group(function () {
        Route::get('/list', 'index')->name('project-list');
        Route::get('/add', 'add')->name('project-add');
    });
});
Route::controller(EducationController::class)->group(function () {
    Route::prefix('education')->group(function () {
        Route::get('/list', 'index')->name('education-list');
        Route::get('/add', 'add')->name('education-add');
    });
});
Route::controller(PersonalDetailController::class)->group(function () {
    Route::prefix('personalDetail')->group(function () {
        Route::get('/list', 'index')->name('personalDetail-list');
        Route::get('/add', 'add')->name('personalDetail-add');
    });
});
