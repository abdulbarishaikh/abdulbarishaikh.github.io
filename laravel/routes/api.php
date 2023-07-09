<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\Api\ProfessionalController;
use App\Http\Controllers\Api\EducationController;
use App\Http\Controllers\Api\ContactUsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->group( function () {
    Route::controller(ProjectController::class)->group(function () {
        Route::prefix('project')->group(function () {
            Route::get('/getProjects', 'index')->name('get-projects');
        });
    });
});
//projects
Route::get('/getProjects', [ProjectController::class,'index'])->name('get-projects');
Route::get('/getProjects/{id}', [ProjectController::class,'show'])->name('get-projects');
//professional
Route::get('/getProfessional', [ProfessionalController::class,'index'])->name('get-Professional');
Route::get('/getProfessional/{id}', [ProfessionalController::class,'show'])->name('get-Professional');
//education
Route::get('/getEducation', [EducationController::class,'index'])->name('get-Education');
Route::get('/getEducation/{id}', [EducationController::class,'show'])->name('get-Education');
Route::post('/addContactUs', [ContactUsController::class,'store'])->name('add-contact-us');

